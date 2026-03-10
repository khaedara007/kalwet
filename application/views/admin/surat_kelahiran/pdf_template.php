<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kelahiran</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            line-height: 0.8;
            margin: 10px;
        }

        /* Header dengan Logo */
        .header {
            text-align: center;
            border-bottom: 2px double #000;
            padding-bottom: 15px;
            margin-bottom: 15px;
            position: relative;
        }

        .logo-pemerintah {
            position: absolute;
            left: 0;
            top: 0;
            width: 75px;
            height: 85px;
        }

        .logo-pemerintah img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .header-text {
            margin-left: 100px;
        }

        .header h2 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header h1 {
            margin: 5px 0;
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header p {
            margin: 3px 0;
            font-size: 10pt;
        }

        /* Judul Surat */
        .title {
            text-align: center;
            margin: 25px 0 10px 0;
        }

        .title h2 {
            margin: 0;
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nomor {
            text-align: center;
            margin-bottom: 25px;
            font-size: 11pt;
            font-weight: bold;
        }

        /* Isi Surat */
        .content {
            text-align: justify;
        }

        .pembukaan {
            text-indent: 50px;
            margin-bottom: 15px;
        }

        /* Tabel Data */
        table.data {
            width: 100%;
            margin: 5px 0;
            border-collapse: collapse;
        }

        table.data td {
            padding: 4px 0;
            vertical-align: top;
            font-size: 11.5pt;
        }

        table.data .label {
            width: 30%;
            padding-left: 30px;
        }

        table.data .separator {
            width: 3%;
        }

        table.data .value {
            width: 67%;
        }

        .bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
        }

        /* Sub Judul */
        .sub-judul {
            margin: 10px 0 10px 0;
            text-indent: 50px;
        }

        /* Data Orang Tua */
        .orang-tua-title {
            margin: 10px 0 10px 0;
            text-align: center;
            font-weight: bold;
        }

        /* Pelapor */
        .pelapor-section {
            margin-top: 10px;
        }

        /* Tanda Tangan */
        .signature {
            margin-top: 20px;
            width: 100%;
        }

        .signature-table {
            width: 100%;
        }

        .signature-left {
            width: 60%;
        }

        .signature-right {
            width: 40%;
            text-align: center;
        }

        .ttd-content {
            margin-top: 20px;
        }

        .an-lurah {
            font-size: 11pt;
            margin-bottom: 0;
        }

        .jabatan-lengkap {
            font-size: 11pt;
            margin-bottom: 60px;
        }

        .ttd-nama {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 0;
            font-size: 12pt;
        }

        .ttd-nip {
            margin-top: 5px;
            font-size: 11pt;
        }

        /* Stempel */
        .stempel-area {
            position: relative;
            height: 100px;
        }

        .stempel {
            position: absolute;
            right: 20px;
            top: -20px;
            width: 120px;
            height: 120px;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <!-- Header dengan Logo -->
    <div class="header">
        <div class="logo-pemerintah">
            <img src="<?php echo base_url('assets/logotegal.png'); ?>" alt="Logo Pemerintah">
        </div>

        <div class="header-text">
            <h2>PEMERINTAH KOTA TEGAL</h2>
            <h2>KECAMATAN TEGAL SELATAN</h2>
            <h1>KELURAHAN KALINYAMAT WETAN</h1>
            <p>Jalan Sultan Hasanudin No. 34 Telp (0283) 311468 TEGAL 52136</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="title">
        <h2>SURAT KETERANGAN KELAHIRAN</h2>
    </div>
    <div class="nomor">NO : <?php echo $surat->nomor_surat; ?></div>

    <!-- Isi Surat -->
    <div class="content">
        <p class="pembukaan">
            Yang bertanda tangan di bawah ini, menerangkan bahwa pada :
        </p>

        <!-- Data Kelahiran -->
        <table class="data">
            <tr>
                <td class="label">Hari</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->hari_lahir; ?></td>
            </tr>
            <tr>
                <td class="label">Tanggal</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $tanggal_lahir_formatted; ?></td>
            </tr>
            <tr>
                <td class="label">Pukul</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->pukul_lahir; ?> WIB</td>
            </tr>
            <tr>
                <td class="label">Bertempat di</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->tempat_lahir; ?></td>
            </tr>
        </table>

        <p class="sub-judul">
            Telah lahir seorang anak <span class="bold"><?php echo $surat->jenis_kelamin_bayi; ?></span> :
        </p>

        <!-- Data Bayi -->
        <table class="data">
            <tr>
                <td class="label">Bernama</td>
                <td class="separator">:</td>
                <td class="value bold uppercase"><?php echo $surat->nama_bayi; ?></td>
            </tr>
        </table>

        <!-- Data Ibu -->
        <p class="orang-tua-title">Dari Seorang Ibu</p>
        <table class="data">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="value bold uppercase"><?php echo $surat->nama_ibu; ?></td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->nik_ibu; ?></td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->umur_ibu; ?> Tahun</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->pekerjaan_ibu; ?></td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->alamat_ibu; ?></td>
            </tr>
        </table>

        <!-- Data Ayah -->
        <p class="orang-tua-title">Istri dari</p>
        <table class="data">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="value bold uppercase"><?php echo $surat->nama_ayah; ?></td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->nik_ayah; ?></td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->umur_ayah; ?> Tahun</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->pekerjaan_ayah; ?></td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="separator">:</td>
                <td class="value"><?php echo $surat->alamat_ayah; ?></td>
            </tr>
        </table>

        <!-- Data Pelapor -->
        <div class="pelapor-section">
            <p class="pembukaan">
                Surat Keterangan ini dibuat berdasarkan keterangan pelapor :
            </p>

            <table class="data">
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td class="separator">:</td>
                    <td class="value bold uppercase"><?php echo $surat->nama_pelapor; ?></td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="separator">:</td>
                    <td class="value"><?php echo $surat->nik_pelapor; ?></td>
                </tr>
                <tr>
                    <td class="label">Umur</td>
                    <td class="separator">:</td>
                    <td class="value"><?php echo $surat->umur_pelapor; ?> Tahun</td>
                </tr>
                <tr>
                    <td class="label">Pekerjaan</td>
                    <td class="separator">:</td>
                    <td class="value"><?php echo $surat->pekerjaan_pelapor; ?></td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="separator">:</td>
                    <td class="value"><?php echo $surat->alamat_pelapor; ?></td>
                </tr>
            </table>
        </div>

        <!-- Hubungan Pelapor -->
        <p style="margin-top: 15px;">
            <span style="display: inline-block; width: 220px;">Hubungan Pelapor dengan bayi</span>
            <span>: <?php echo $surat->hubungan_pelapor; ?></span>
        </p>
    </div>

    <!-- Tanda Tangan -->
    <table class="signature">
        <tr>
            <td class="signature-left">
                <!-- Area untuk stempel jika diperlukan -->
            </td>
            <td class="signature-right">
                <div class="ttd-content">
                    <p>Tegal, <?php echo $tanggal_cetak_formatted; ?></p>

                    <?php if (strtolower($surat->jabatan) == 'lurah'): ?>
                        <!-- Format untuk Lurah -->
                        <p><?php echo $surat->jabatan; ?> Kalinyamat Wetan</p>
                        <div style="margin-top: 60px;">
                            <p class="ttd-nama"><?php echo $surat->nama_penandatangan; ?></p>
                            <p class="ttd-nip">NIP. <?php echo $surat->nip; ?></p>
                        </div>

                    <?php else: ?>
                        <!-- Format untuk Sekretaris/Kepala Seksi (An. Lurah) -->
                        <p class="an-lurah">An. Lurah Kalinyamat Wetan</p>
                        <p class="jabatan-lengkap"><?php echo $surat->jabatan; ?></p>

                        <div class="stempel-area">
                            <!-- Stempel bisa ditambahkan di sini -->
                            <p class="ttd-nama" style="margin-top: 0;"><?php echo $surat->nama_penandatangan; ?></p>
                            <p class="ttd-nip">NIP. <?php echo $surat->nip; ?></p>
                        </div>

                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>

</body>

</html>