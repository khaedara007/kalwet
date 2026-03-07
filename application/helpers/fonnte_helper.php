<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('send_wa_fonnte')) {
    function send_wa_fonnte($target, $message)
    {
        $ci = &get_instance();
        $token = $ci->config->item('fonnte_token'); // Simpan di config

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $token
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }
}

if (!function_exists('format_phone_wa')) {
    function format_phone_wa($phone)
    {
        // Hapus semua karakter non-angka
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika diawali 0, ganti jadi 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        return $phone;
    }
}
