<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kegiatan LPMK - SIAPLKK</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --biru-utama: #1e88e5;
            --biru-gelap: #1565c0;
            --biru-muda: #e3f2fd;
            --kuning: #fbc02d;
        }

        body {
            background-color: #f4f7fb;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        /* ===== HEADER BIRU ===== */
        .hero-header {
            background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
            padding: 40px 0 60px;
            color: #fff;
            text-align: center;
        }

        .hero-header img.logo {
            max-height: 80px;
            margin-bottom: 20px;
        }

        .hero-header h1 {
            font-weight: 800;
            letter-spacing: 1px;
            font-size: 1.8rem;
        }

        .hero-header p.sub {
            font-size: 1rem;
            opacity: .95;
        }

        .btn-hero {
            border: 1.5px solid rgba(255, 255, 255, .8);
            color: #fff;
            border-radius: 50px;
            padding: 8px 22px;
            margin: 5px;
            font-size: .95rem;
            text-decoration: none;
            transition: .3s;
        }

        .btn-hero:hover {
            background: #fff;
            color: var(--biru-gelap);
        }

        .btn-hero i {
            margin-right: 6px;
        }

        /* ===== JUDUL SEKSI ===== */
        .section-title {
            text-align: center;
            margin: 60px 0 30px;
            color: var(--biru-gelap);
            font-weight: 800;
            letter-spacing: 1px;
        }

        .section-title::before {
            content: "";
            display: inline-block;
            width: 6px;
            height: 28px;
            background: var(--kuning);
            border-radius: 4px;
            margin-right: 12px;
            vertical-align: middle;
        }

        .section-sub {
            text-align: center;
            color: #666;
            margin-top: -15px;
            margin-bottom: 45px;
        }

        /* ===== KARTU KEGIATAN ===== */
        .card-kegiatan {
            background: #fff;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(30, 136, 229, .12);
            transition: transform .3s, box-shadow .3s;
            height: 100%;
        }

        .card-kegiatan:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(30, 136, 229, .25);
        }

        /* strip gradient biru + judul RT */
        .card-head {
            background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
            color: #fff;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card-head .rt-badge {
            background: #fff;
            color: var(--biru-gelap);
            font-weight: 800;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .card-head h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.05rem;
        }

        .card-kegiatan .foto {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .card-body-kegiatan {
            padding: 20px 22px 24px;
        }

        /* badge pill seperti "PENGERTIAN" pada contoh */
        .badge-pill {
            display: inline-block;
            background: var(--biru-muda);
            color: var(--biru-gelap);
            font-weight: 700;
            font-size: .75rem;
            letter-spacing: 1px;
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 14px;
        }

        .badge-pill i {
            margin-right: 5px;
        }

        .judul-kegiatan {
            font-weight: 800;
            color: #1565c0;
            font-size: 1.15rem;
            margin-bottom: 8px;
        }

        .tanggal {
            color: #f57c00;
            font-size: .85rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .tanggal i {
            margin-right: 5px;
        }

        .narasi {
            color: #555;
            font-size: .95rem;
            line-height: 1.7;
        }

        .btn-baca {
            display: inline-block;
            background: linear-gradient(135deg, #2196f3, #1976d2);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 9px 26px;
            font-size: .9rem;
            font-weight: 600;
            text-decoration: none;
            transition: .3s;
        }

        .btn-baca:hover {
            background: linear-gradient(135deg, #1976d2, #0d47a1);
            color: #fff;
        }

        /* kondisi belum ada kegiatan */
        .kosong {
            text-align: center;
            color: #90a4ae;
            padding: 60px 0;
        }
    </style>
</head>

<body>

    <!-- ================= HEADER ================= -->
    <div class="hero-header">

        <img src="<?php echo base_url('assets/lkk.png'); ?>" alt="SIAPLKK" class="logo">
        <h1><i class="bi bi-calendar2-event"></i> KEGIATAN LPMK</h1>
        <p class="sub">Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan - Kota Tegal</p>

        <a href="<?php echo site_url('lkk'); ?>" class="btn-hero">
            <i class="bi bi-house"></i> Kembali
        </a>
        <a href="#daftarKegiatan" class="btn-hero">
            <i class="bi bi-list-ul"></i> Lihat Kegiatan
        </a>
    </div>

    <!-- ================= DAFTAR KEGIATAN ================= -->
    <div class="container" id="daftarKegiatan">
        <h2 class="section-title">KEGIATAN LPMK</h2>
        <p class="section-sub">Dokumentasi kegiatan Lembaga Pemberdayaan Masyarakat Kelurahan dalam pembangunan partisipatif</p>

        <div class="row g-4 pb-5">

            <?php if (!empty($kegiatan)) : ?>
                <?php foreach ($kegiatan as $k) : ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-kegiatan">

                            <!-- kepala kartu: badge RT -->
                            <div class="card-head">
                                <div class="rt-badge">
                                    <?php echo !empty($k->rt) ? 'RT ' . $k->rt : 'RT'; ?>
                                </div>
                                <h5><?php echo !empty($k->rw) ? 'RW ' . $k->rw : 'Lingkungan RT'; ?></h5>
                            </div>

                            <!-- foto kegiatan -->
                            <img src="<?php echo base_url('assets/foto_kegiatan/' . $k->foto); ?>"
                                class="foto"
                                alt="<?php echo $k->judul; ?>"
                                onerror="this.src='<?php echo base_url('assets/img/no-image.png'); ?>'">

                            <div class="card-body-kegiatan">

                                <!-- badge pill kategori -->
                                <span class="badge-pill">
                                    <i class="bi bi-collection"></i>
                                    <?php echo !empty($k->kategori) ? strtoupper($k->kategori) : 'KEGIATAN'; ?>
                                </span>

                                <!-- judul kegiatan -->
                                <div class="judul-kegiatan"><?php echo $k->judul; ?></div>

                                <!-- tanggal -->
                                <div class="tanggal">
                                    <i class="bi bi-calendar3"></i>
                                    <?php echo date('d F Y', strtotime($k->tanggal)); ?>
                                </div>

                                <!-- narasi -->
                                <p class="narasi">
                                    <?php echo character_limiter(strip_tags($k->narasi), 200); ?>
                                </p>

                                <a href="<?php echo site_url('kegiatan/detail/' . $k->id); ?>"
                                    class="btn-baca mt-2">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="kosong">
                    <i class="bi bi-inbox" style="font-size:3rem;"></i>
                    <p class="mt-3">Belum ada kegiatan yang ditampilkan.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>