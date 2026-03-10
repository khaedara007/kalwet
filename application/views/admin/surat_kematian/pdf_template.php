<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            line-height: 1.1;
            margin: 14px;
        }

        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 30px;
            position: relative;
            /* Penting untuk positioning logo */
        }

        /* Logo di pojok kiri atas */
        .logo-pemerintah {
            position: absolute;
            left: 0;
            top: 0;
            width: 70px;
            /* Sesuaikan ukuran */
            height: 80px;
            /* Sesuaikan ukuran */
        }

        .logo-pemerintah img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Wrapper untuk teks header agar tetap center */
        .header-text {
            margin-left: 100px;
            /* Beri ruang untuk logo */
            margin-right: 100px;
        }

        .header h2 {
            margin: 0;
            font-size: 14pt;
            text-transform: uppercase;
        }

        .header h1 {
            margin: 5px 0;
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header p {
            margin: 1px 0;
            font-size: 10pt;
        }

        .title {
            text-align: center;
            margin: 10px 0;
        }

        .title h5 {
            text-decoration: underline;
            margin: 0;
            font-size: 12pt;
        }

        .nomor {
            text-align: center;
            margin-bottom: 10px;
            font-size: 11pt;
        }

        .content {
            text-align: justify;
        }

        .indent {
            text-indent: 50px;
        }

        table.data {
            width: 100%;
            margin: 0px 0;
        }

        table.data td {
            padding: 3px 0;
            vertical-align: top;
        }

        table.data .label {
            width: 35%;
        }

        table.data .separator {
            width: 5%;
        }

        .signature {
            margin-top: 5x;
            width: 100%;
        }

        .signature td {
            width: 50%;
            vertical-align: top;
        }

        .signature-right {
            text-align: center;
        }

        .ttd {
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Logo Pemerintah di Pojok Kiri Atas -->
        <div class="logo-pemerintah">
            <img src="<?php echo base_url('assets/logotegal.png'); ?>" alt="Logo Pemerintah">
        </div>

        <!-- Teks Header -->
        <div class="header-text">
            <h2>PEMERINTAH KOTA TEGAL</h2>
            <h2>KECAMATAN TEGAL SELATAN</h2>
            <h1>KELURAHAN KALINYAMAT WETAN</h1>
            <p>Jl. Sultan Hasanudin No.34 Telp. (0283) 311468 Tegal 52136</p>
        </div>
    </div>

    <div class="title">
        <h5>SURAT KETERANGAN KEMATIAN</h5>
    </div>
    <div class="nomor">Nomor: <?php echo $surat->nomor_surat; ?></div>

    <div class="content">
        <p class="indent">
            Yang bertanda tangan di bawah ini, Kepala Kelurahan Kalinyamat Wetan Kecamatan Tegal Selatan
            Kota Tegal, dengan ini menerangkan bahwa:
        </p>

        <table class="data">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="bold uppercase"><?php echo $surat->nama_meninggal; ?></td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="separator">:</td>
                <td><?php echo $surat->nik_meninggal; ?></td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="separator">:</td>
                <td><?php echo $surat->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="separator">:</td>
                <td><?php echo $surat->umur; ?> Tahun</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td class="separator">:</td>
                <td><?php echo $surat->agama; ?></td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="separator">:</td>
                <td><?php echo $surat->alamat; ?></td>
            </tr>
        </table>

        <p class="indent">Telah meninggal dunia pada:</p>

        <table class="data">
            <tr>
                <td class="label">Hari</td>
                <td class="separator">:</td>
                <td><?php echo $surat->hari_meninggal; ?></td>
            </tr>
            <tr>
                <td class="label">Tanggal</td>
                <td class="separator">:</td>
                <td><?php echo $tanggal_meninggal_formatted; ?></td>
            </tr>
            <tr>
                <td class="label">Bertempat di</td>
                <td class="separator">:</td>
                <td><?php echo $surat->tempat_meninggal; ?></td>
            </tr>
            <tr>
                <td class="label">Penyebab Kematian</td>
                <td class="separator">:</td>
                <td><?php echo $surat->penyebab_kematian; ?></td>
            </tr>
        </table>

        <p class="indent">Surat keterangan ini dibuat berdasarkan keterangan pelapor:</p>

        <table class="data">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="bold"><?php echo $surat->nama_pelapor; ?></td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td class="separator">:</td>
                <td><?php echo $surat->nik_pelapor; ?></td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="separator">:</td>
                <td><?php echo $surat->umur_pelapor; ?> Tahun</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="separator">:</td>
                <td><?php echo $surat->pekerjaan_pelapor; ?></td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="separator">:</td>
                <td><?php echo $surat->alamat_pelapor; ?></td>
            </tr>
            <tr>
                <td class="label">Hubungan Pelapor dengan yang meninggal</td>
                <td class="separator">:</td>
                <td><?php echo $surat->hubungan_pelapor; ?></td>
            </tr>
        </table>


    </div>

    <table class="signature">
        <tr>
            <td></td>
            <td class="signature-right">
                <p>Tegal, <?php echo $tanggal_cetak_formatted; ?></p>

                <?php if (strtolower($surat->jabatan) == 'lurah'): ?>
                    <!-- Format untuk Lurah -->
                    <p><?php echo $surat->jabatan; ?> Kalinyamat Wetan</p>

                    <div class="ttd"><?php echo $surat->nama_penandatangan; ?></div>
                    <p>NIP. <?php echo $surat->nip; ?></p>

                <?php else: ?>
                    <!-- Format untuk Sekretaris/Kepala Seksi (An. Lurah) -->
                    <div class="an-lurah">An. Lurah Kalinyamat Wetan</div>
                    <div class="jabatan-lengkap"><?php echo $surat->jabatan; ?></div>

                    <div class="ttd"><?php echo $surat->nama_penandatangan; ?></div>
                    <p>NIP. <?php echo $surat->nip; ?></p>

                <?php endif; ?>

            </td>
        </tr>
    </table>
</body>

</html>