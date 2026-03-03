<?php
// application/helpers/whatsapp_helper.php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Kirim pesan WhatsApp menggunakan API (Contoh: Fonnte, Wablas, atau WhatsApp Business API)
 * 
 * @param string $phone Nomor HP tujuan (format: 628123456789)
 * @param string $message Pesan yang akan dikirim
 * @return bool
 */
function send_whatsapp($phone, $message)
{
    $ci = &get_instance();

    // Bersihkan nomor HP dari karakter non-angka
    $phone = preg_replace('/[^0-9]/', '', $phone);

    // Pastikan format nomor diawali dengan 62
    if (substr($phone, 0, 1) == '0') {
        $phone = '62' . substr($phone, 1);
    }
    if (substr($phone, 0, 2) != '62') {
        $phone = '62' . $phone;
    }

    // ============================================
    // PILIH SALAH SATU METODE API WHATSAPP:
    // ============================================

    // METODE 1: Menggunakan Fonnte (Recommended - Mudah)
    return send_fonnte($phone, $message);

    // METODE 2: Menggunakan Wablas
    // return send_wablas($phone, $message);

    // METODE 3: Menggunakan WhatsApp Business API (Official)
    // return send_wa_business_api($phone, $message);
}

/**
 * Kirim WA menggunakan Fonnte API
 * Daftar di: https://fonnte.com
 */
function send_fonnte($phone, $message)
{
    $token = 'YOUR_FONNTE_TOKEN'; // Ganti dengan token Anda

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', 'WhatsApp Error: ' . $err);
        return false;
    }

    $result = json_decode($response, true);
    return isset($result['status']) && $result['status'] == true;
}

/**
 * Kirim WA menggunakan Wablas API
 * Daftar di: https://wablas.com
 */
function send_wablas($phone, $message)
{
    $token = 'YOUR_WABLAS_TOKEN';
    $domain = 'https://solo.wablas.com'; // Sesuaikan domain

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $domain . '/api/send-message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
            'phone' => $phone,
            'message' => $message,
        )),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: ' . $token
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        log_message('error', 'WhatsApp Error: ' . $err);
        return false;
    }

    return true;
}

/**
 * Template pesan notifikasi akun disetujui
 */
function wa_template_account_approved($name, $login_url)
{
    return "🎉 *SELAMAT! AKUN ANDA TELAH DISETUJUI* 🎉\n\n"
        . "Halo *{$name}*,\n\n"
        . "Akun Anda di *SIMPEL AWET - Kelurahan Kalinyamatan Wetan* telah berhasil diverifikasi dan disetujui oleh admin.\n\n"
        . "✅ Status: *AKTIF*\n"
        . "✅ Anda sekarang dapat login ke sistem\n\n"
        . "🌐 *Link Login:*\n{$login_url}\n\n"
        . "Silakan login menggunakan nomor HP dan password yang telah Anda daftarkan.\n\n"
        . "Terima kasih atas kepercayaan Anda menggunakan layanan kami.\n\n"
        . "📞 *Bantuan:* Hubungi admin jika mengalami kendala\n\n"
        . "_Hormat kami,_\n"
        . "*Admin SIMPEL AWET*\n"
        . "Kelurahan Kalinyamatan Wetan";
}

/**
 * Template pesan notifikasi akun ditolak
 */
function wa_template_account_rejected($name, $reason = '')
{
    $message = "⚠️ *PEMBERITAHUAN AKUN* ⚠️\n\n"
        . "Halo *{$name}*,\n\n"
        . "Mohon maaf, akun Anda di *SIMPEL AWET* tidak dapat disetujui saat ini.\n\n"
        . "❌ Status: *DITOLAK*\n";

    if (!empty($reason)) {
        $message .= "📝 *Alasan:* {$reason}\n";
    }

    $message .= "\nSilakan periksa kembali data pendaftaran Anda atau hubungi admin untuk informasi lebih lanjut.\n\n"
        . "📞 *Kontak Admin:* [Nomor Admin]\n\n"
        . "_Hormat kami,_\n"
        . "*Admin SIMPEL AWET*";

    return $message;
}
