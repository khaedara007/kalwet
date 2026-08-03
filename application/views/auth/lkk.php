<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($title) ? $title : 'Struktur RT/RW - Kelurahan Kalinyamat Wetan'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <!-- Custom CSS SIMPEL AWET -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <style>
        :root {
            --primary-blue: #1976d2;
            --dark-blue: #1565c0;
            --accent-yellow: #ffd600;
            --bg-light: #f0f4f8;
            --card-bg: #ffffff;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg-light);
        }

        /* SK di dalam card pengertian */
        .sk-dalam-card {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px dashed #e0e0e0;
        }

        .sk-dalam-card .sk-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 6px 14px;
            border-radius: 20px;
            margin-bottom: 10px;
            background: #e8f5e9;
            color: #2e7d32;
        }

        .sk-dalam-card .sk-info-small {
            font-size: 0.85rem;
            color: #495057;
            margin-bottom: 8px;
        }

        .sk-dalam-card .sk-info-small strong {
            color: var(--text-dark);
            font-weight: 600;
        }

        .sk-dalam-card .btn-sk-small {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-decoration: none;
        }

        .sk-dalam-card .btn-sk-small:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            color: white;
        }

        .sk-dalam-card .badge-sk-aktif {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .sk-tidak-ada {
            font-size: 0.85rem;
            color: #9e9e9e;
            font-style: italic;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 280px;
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
        }

        .hero-content h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 20px;
        }

        .btn-struktur {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 28px;
            border-radius: 50px;
            font-weight: 500;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-struktur:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Section Title */
        .section-title {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* ===== PENGERTIAN & FUNGSI TUGAS ===== */
        .pengertian-section {
            padding: 40px 0 20px;
        }

        .pengertian-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
            position: relative;
        }

        .pengertian-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(25, 118, 210, 0.15);
        }

        .pengertian-card-header {
            padding: 25px 20px 20px;
            text-align: center;
            position: relative;
        }

        .pengertian-card-header.rw {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
        }

        .pengertian-card-header.rt {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
        }

        .pengertian-card-header.lpmk {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .pengertian-card-header.katar {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        /* SK Card Header - Dynamic Colors */
        .pengertian-card-header.sk-rt {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
        }

        .pengertian-card-header.sk-rw {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        }

        .pengertian-card-header.sk-karang-taruna {
            background: linear-gradient(135deg, #c2185b 0%, #880e4f 100%);
        }

        .pengertian-card-header.sk-lpmk {
            background: linear-gradient(135deg, #7b1fa2 0%, #4a148c 100%);
        }

        .pengertian-card-header.sk-pkk {
            background: linear-gradient(135deg, #80ffff 0%, #008B8B 100%);
        }

        .pengertian-card-header.pkk {
            background: linear-gradient(135deg, #74ecec 0%, #008B8B 100%);
        }

        .pengertian-card-header.pkk .pengertian-icon-circle i {
            color: #008B8B;
        }

        .pengertian-card-header.pkk~.pengertian-card-body .fungsi-list li::before {
            color: #008B8B;
        }

        .pengertian-icon-circle {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .pengertian-icon-circle i {
            font-size: 1.8rem;
        }

        .pengertian-card-header.rw .pengertian-icon-circle i {
            color: #1976d2;
        }

        .pengertian-card-header.rt .pengertian-icon-circle i {
            color: #0083b0;
        }

        .pengertian-card-header.lpmk .pengertian-icon-circle i {
            color: #667eea;
        }

        .pengertian-card-header.katar .pengertian-icon-circle i {
            color: #f5576c;
        }

        .pengertian-card-header.sk-rt .pengertian-icon-circle i {
            color: #1976d2;
        }

        .pengertian-card-header.sk-rw .pengertian-icon-circle i {
            color: #2e7d32;
        }

        .pengertian-card-header.sk-karang-taruna .pengertian-icon-circle i {
            color: #c2185b;
        }

        .pengertian-card-header.sk-lpmk .pengertian-icon-circle i {
            color: #7b1fa2;
        }

        .pengertian-card-header.sk-pkk .pengertian-icon-circle i {
            color: #e65100;
        }

        .pengertian-card-header h3 {
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            margin: 0;
        }

        .pengertian-card-body {
            padding: 25px;
        }

        .pengertian-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 6px 14px;
            border-radius: 20px;
            margin-bottom: 15px;
        }

        .pengertian-label.pengertian {
            background: #e3f2fd;
            color: var(--primary-blue);
        }

        .pengertian-label.fungsi {
            background: #fff3e0;
            color: #e65100;
        }

        .pengertian-text {
            color: #495057;
            font-size: 0.9rem;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .fungsi-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .fungsi-list li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 10px;
            color: #495057;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .fungsi-list li::before {
            content: '\F26B';
            font-family: 'bootstrap-icons';
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--primary-blue);
            font-size: 1rem;
            font-weight: bold;
        }

        .pengertian-card-header.rw~.pengertian-card-body .fungsi-list li::before {
            color: #1976d2;
        }

        .pengertian-card-header.rt~.pengertian-card-body .fungsi-list li::before {
            color: #0083b0;
        }

        .pengertian-card-header.lpmk~.pengertian-card-body .fungsi-list li::before {
            color: #667eea;
        }

        .pengertian-card-header.katar~.pengertian-card-body .fungsi-list li::before {
            color: #f5576c;
        }

        /* Accordion untuk mobile */
        .pengertian-accordion .accordion-item {
            border: none;
            border-radius: 16px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .pengertian-accordion .accordion-button {
            padding: 20px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            background: white;
        }

        .pengertian-accordion .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            color: white;
            box-shadow: none;
        }

        .pengertian-accordion .accordion-button:focus {
            box-shadow: none;
        }

        .pengertian-accordion .accordion-body {
            padding: 25px;
            background: white;
        }

        /* ===== SK LKK SECTION ===== */
        .sk-section {
            padding: 20px 0 40px;
        }

        .sk-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .sk-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(25, 118, 210, 0.15);
        }

        .sk-card-header {
            padding: 25px 20px 20px;
            text-align: center;
            position: relative;
        }

        .sk-card-header h3 {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
        }

        .sk-card-body {
            padding: 25px;
        }

        .sk-info {
            margin-bottom: 12px;
            color: #495057;
            font-size: 0.9rem;
        }

        .sk-info strong {
            color: var(--text-dark);
            font-weight: 600;
            display: block;
            margin-bottom: 4px;
        }

        .sk-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            margin-top: 5px;
        }

        .btn-sk {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            margin-top: 15px;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-sk:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.3);
            color: white;
        }

        .btn-sk-outline {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            margin-top: 10px;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-sk-outline:hover {
            background: var(--primary-blue);
            color: white;
        }

        /* ===== RW CARDS ===== */
        .rw-section {
            padding: 20px 0 60px;
        }

        .rw-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .rw-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
        }

        .rw-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(25, 118, 210, 0.15);
        }

        .rw-card-header {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            padding: 25px 20px 20px;
            text-align: center;
            position: relative;
        }

        .rw-icon-circle {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .rw-icon-circle i {
            font-size: 1.8rem;
            color: var(--primary-blue);
        }

        .rw-card-header h3 {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
        }

        .rw-card-body {
            padding: 25px;
        }

        .rw-info {
            margin-bottom: 12px;
            color: #495057;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .rw-info i {
            color: var(--primary-blue);
            margin-top: 3px;
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .rw-info strong {
            color: var(--text-dark);
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
        }

        .rw-periode {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e3f2fd;
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 20px;
            margin-top: 5px;
        }

        .btn-lihat-rt {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 20px;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-lihat-rt:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.3);
        }

        /* Modal RT */
        .modal-rt .modal-dialog {
            max-width: 600px;
        }

        .modal-rt .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-rt .modal-header {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            color: white;
            border-bottom: none;
            padding: 20px 30px;
        }

        .modal-rt .modal-title {
            font-weight: 700;
            font-size: 1.3rem;
        }

        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .modal-rt .modal-body {
            padding: 30px;
            background: #f8f9fa;
            max-height: 70vh;
            overflow-y: auto;
        }

        .rt-item {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .rt-item:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .rt-item:last-child {
            margin-bottom: 0;
        }

        .rt-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e3f2fd;
        }

        .rt-icon-circle {
            width: 45px;
            height: 45px;
            background: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rt-icon-circle i {
            font-size: 1.2rem;
            color: var(--primary-blue);
        }

        .rt-header h5 {
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
            font-size: 1.15rem;
        }

        .rt-detail {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 10px;
            color: #495057;
            font-size: 0.95rem;
        }

        .rt-detail i {
            color: var(--primary-blue);
            margin-top: 3px;
            font-size: 0.9rem;
            width: 20px;
            text-align: center;
        }

        .rt-detail strong {
            color: var(--text-dark);
            font-weight: 600;
        }

        .periode-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e3f2fd;
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 20px;
            margin-top: 5px;
        }

        .modal-rt .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-rt .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .modal-rt .modal-body::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 240px;
                border-radius: 0 0 20px 20px;
            }

            .hero-content h1 {
                font-size: 1.6rem;
            }

            .rw-grid {
                grid-template-columns: 1fr;
            }

            .modal-rt .modal-dialog {
                margin: 10px;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    // Load model SK LKK untuk card pengertian
    $CI = &get_instance();
    $CI->load->model('Sk_lkk_model');
    $semua_sk = $CI->Sk_lkk_model->get_all();

    // Kelompokkan SK berdasarkan jenis
    $sk_per_jenis = [];
    foreach ($semua_sk as $sk) {
        $jenis = isset($sk->jenis_lkk) ? $sk->jenis_lkk : 'rt';
        $sk_per_jenis[$jenis] = $sk;
    }
    ?>
    <header class="header-modern">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 d-flex align-items-center gap-3">
                    <a href="<?php echo site_url('/'); ?>">
                        <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                    </a>
                    <div>
                        <div class="header-subtitle">Sistem Informasi Pelayanan</div>
                        <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
                    <a href="<?php echo site_url('home'); ?>" class="btn header-btn header-btn-register">
                        <i></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><i class="bi bi-building me-2"></i>Data Resmi Struktur RT/RW, LPMK dan Karang Taruna</h1>
                <p>Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan - Kota Tegal<br></p>
                <button class="btn-struktur" onclick="scrollToPengertian()">
                    <i class="bi bi-info-circle"></i> Pengertian & Fungsi
                </button>
                <button class="btn-struktur ms-2" onclick="scrollToRW()">
                    <i class="bi bi-people-fill"></i> Lihat Struktur
                </button>
            </div>
        </div>
    </section>

    <!-- PENGERTIAN & FUNGSI TUGAS SECTION -->
    <section class="pengertian-section" id="pengertianSection">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Pengertian & Fungsi Tugas</h2>
                    <p class="section-subtitle">Memahami peran dan tanggung jawab RT, RW, LPMK, dan Karang Taruna</p>
                </div>
            </div>

            <!-- Desktop: Grid Cards -->
            <div class="row g-4 d-none d-lg-flex">

                <!-- RT & RW (GABUNG) -->
                <div class="col-lg-6 col-md-6">
                    <div class="pengertian-card">
                        <div class="pengertian-card-header rw">
                            <div class="pengertian-icon-circle">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3>RT & RW</h3>
                        </div>
                        <div class="pengertian-card-body">
                            <span class="pengertian-label pengertian"><i class="bi bi-book"></i> Pengertian</span>
                            <p class="pengertian-text">
                                <strong>RW</strong> adalah wadah pemersatu beberapa RT, unit administrasi terendah di tingkat kelurahan.<br><br>
                                <strong>RT</strong> adalah wadah pemersatu di tingkat terendah, beranggotakan warga dalam satu lingkungan geografis yang sama.
                            </p>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas RW</span>
                            <ul class="fungsi-list">
                                <li>Memfasilitasi koordinasi antar RT dalam wilayahnya</li>
                                <li>Menyelenggarakan musyawarah RW secara berkala</li>
                                <li>Mengumpulkan dan menyalurkan aspirasi warga ke kelurahan</li>
                                <li>Membantu kelurahan dalam pelaksanaan pembangunan</li>
                                <li>Mengawasi pelaksanaan program pemerintah di tingkat RW</li>
                                <li>Menjaga ketertiban dan keamanan lingkungan</li>
                            </ul>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas RT</span>
                            <ul class="fungsi-list">
                                <li>Mencatat data kependudukan warga di lingkungannya</li>
                                <li>Menyelenggarakan musyawarah RT secara rutin</li>
                                <li>Membantu warga dalam pengurusan administrasi</li>
                                <li>Mengkoordinasikan kegiatan gotong royong</li>
                                <li>Menjaga kebersihan dan kesehatan lingkungan</li>
                                <li>Melaporkan kondisi sosial warga ke RW</li>
                            </ul>

                            <!-- SK RT/RW -->
                            <div class="sk-dalam-card">
                                <?php
                                $sk_rtrw = isset($sk_per_jenis['rt']) ? $sk_per_jenis['rt'] : (isset($sk_per_jenis['rw']) ? $sk_per_jenis['rw'] : null);
                                if ($sk_rtrw && is_object($sk_rtrw)):
                                    $nomor = isset($sk_rtrw->nomor_sk) ? $sk_rtrw->nomor_sk : '-';
                                    $pm = isset($sk_rtrw->periode_mulai) ? $sk_rtrw->periode_mulai : '-';
                                    $ps = isset($sk_rtrw->periode_selesai) ? $sk_rtrw->periode_selesai : '-';
                                    $fp = isset($sk_rtrw->file_path) ? $sk_rtrw->file_path : '';
                                    $ver = isset($sk_rtrw->versi) ? $sk_rtrw->versi : '1';
                                ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <div class="sk-info-small"><strong>Nomor:</strong> <?php echo $nomor; ?></div>
                                    <div class="sk-info-small"><strong>Periode:</strong> <?php echo $pm; ?> - <?php echo $ps; ?></div>
                                    <?php if (!empty($fp)): ?>
                                        <a href="<?php echo base_url($fp); ?>" target="_blank" class="btn-sk-small w-100">
                                            <i class="bi bi-eye"></i> Lihat SK
                                        </a>
                                    <?php endif; ?>
                                    <div class="mt-2 text-center">
                                        <span class="badge-sk-aktif"><i class="bi bi-check-circle-fill"></i> v<?php echo $ver; ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <p class="sk-tidak-ada">Belum ada SK yang diupload</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LPMK -->
                <div class="col-lg-6 col-md-6">
                    <div class="pengertian-card">
                        <div class="pengertian-card-header lpmk">
                            <div class="pengertian-icon-circle">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                            <h3>LPMK</h3>
                        </div>
                        <div class="pengertian-card-body">
                            <span class="pengertian-label pengertian"><i class="bi bi-book"></i> Pengertian</span>
                            <p class="pengertian-text">
                                Lembaga Pemberdayaan Masyarakat Kelurahan (LPMK) adalah lembaga kemasyarakatan yang dibentuk untuk mewadahi partisipasi masyarakat dalam pembangunan kelurahan.
                            </p>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas</span>
                            <ul class="fungsi-list">
                                <li>Merencanakan program pembangunan kelurahan</li>
                                <li>Menggerakkan swadaya gotong royong masyarakat</li>
                                <li>Mengkoordinasikan kegiatan pemberdayaan ekonomi</li>
                                <li>Memfasilitasi peningkatan kualitas sumber daya manusia</li>
                                <li>Mengawasi pelaksanaan pembangunan di kelurahan</li>
                                <li>Menjalin kerja sama dengan pihak terkait</li>
                            </ul>

                            <!-- SK LPMK -->
                            <div class="sk-dalam-card">
                                <?php if (isset($sk_per_jenis['lpmk']) && is_object($sk_per_jenis['lpmk'])):
                                    $sk = $sk_per_jenis['lpmk'];
                                    $nomor = isset($sk->nomor_sk) ? $sk->nomor_sk : '-';
                                    $pm = isset($sk->periode_mulai) ? $sk->periode_mulai : '-';
                                    $ps = isset($sk->periode_selesai) ? $sk->periode_selesai : '-';
                                    $fp = isset($sk->file_path) ? $sk->file_path : '';
                                    $ver = isset($sk->versi) ? $sk->versi : '1';
                                ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <div class="sk-info-small"><strong>Nomor:</strong> <?php echo $nomor; ?></div>
                                    <div class="sk-info-small"><strong>Periode:</strong> <?php echo $pm; ?> - <?php echo $ps; ?></div>
                                    <?php if (!empty($fp)): ?>
                                        <a href="<?php echo base_url($fp); ?>" target="_blank" class="btn-sk-small w-100">
                                            <i class="bi bi-eye"></i> Lihat SK
                                        </a>
                                    <?php endif; ?>
                                    <div class="mt-2 text-center">
                                        <span class="badge-sk-aktif"><i class="bi bi-check-circle-fill"></i> v<?php echo $ver; ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <p class="sk-tidak-ada">Belum ada SK yang diupload</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Karang Taruna -->
                <div class="col-lg-6 col-md-6">
                    <div class="pengertian-card">
                        <div class="pengertian-card-header katar">
                            <div class="pengertian-icon-circle">
                                <i class="bi bi-heart-fill"></i>
                            </div>
                            <h3>Karang Taruna</h3>
                        </div>
                        <div class="pengertian-card-body">
                            <span class="pengertian-label pengertian"><i class="bi bi-book"></i> Pengertian</span>
                            <p class="pengertian-text">
                                Karang Taruna adalah organisasi kepemudaan yang bergerak di bidang kesejahteraan sosial, bertujuan mengembangkan potensi pemuda untuk kesejahteraan masyarakat.
                            </p>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas</span>
                            <ul class="fungsi-list">
                                <li>Mengembangkan kegiatan olahraga dan seni pemuda</li>
                                <li>Menyelenggarakan program kesejahteraan sosial</li>
                                <li>Memberdayakan pemuda dalam entrepreneurship</li>
                                <li>Menjaga kelestarian lingkungan hidup</li>
                                <li>Mengadakan pelatihan keterampilan pemuda</li>
                                <li>Membantu korban bencana dan warga kurang mampu</li>
                            </ul>

                            <!-- SK Karang Taruna -->
                            <div class="sk-dalam-card">
                                <?php if (isset($sk_per_jenis['karang-taruna']) && is_object($sk_per_jenis['karang-taruna'])):
                                    $sk = $sk_per_jenis['karang-taruna'];
                                    $nomor = isset($sk->nomor_sk) ? $sk->nomor_sk : '-';
                                    $pm = isset($sk->periode_mulai) ? $sk->periode_mulai : '-';
                                    $ps = isset($sk->periode_selesai) ? $sk->periode_selesai : '-';
                                    $fp = isset($sk->file_path) ? $sk->file_path : '';
                                    $ver = isset($sk->versi) ? $sk->versi : '1';
                                ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <div class="sk-info-small"><strong>Nomor:</strong> <?php echo $nomor; ?></div>
                                    <div class="sk-info-small"><strong>Periode:</strong> <?php echo $pm; ?> - <?php echo $ps; ?></div>
                                    <?php if (!empty($fp)): ?>
                                        <a href="<?php echo base_url($fp); ?>" target="_blank" class="btn-sk-small w-100">
                                            <i class="bi bi-eye"></i> Lihat SK
                                        </a>
                                    <?php endif; ?>
                                    <div class="mt-2 text-center">
                                        <span class="badge-sk-aktif"><i class="bi bi-check-circle-fill"></i> v<?php echo $ver; ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <p class="sk-tidak-ada">Belum ada SK yang diupload</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PKK -->
                <div class="col-lg- col-md-6">
                    <div class="pengertian-card">
                        <div class="pengertian-card-header pkk">
                            <div class="pengertian-icon-circle">
                                <i class="bi bi-person-hearts"></i>
                            </div>
                            <h3>PKK</h3>
                        </div>
                        <div class="pengertian-card-body">
                            <span class="pengertian-label pengertian"><i class="bi bi-book"></i> Pengertian</span>
                            <p class="pengertian-text">
                                Pemberdayaan dan Kesejahteraan Keluarga (PKK) adalah organisasi kemasyarakatan yang bergerak di bidang pemberdayaan perempuan dan kesejahteraan keluarga.
                            </p>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas</span>
                            <ul class="fungsi-list">
                                <li>Meningkatkan kesejahteraan keluarga melalui 10 program PKK</li>
                                <li>Memberdayakan perempuan dalam pembangunan</li>
                                <li>Menggerakkan ketahanan pangan keluarga</li>
                                <li>Meningkatkan kualitas kesehatan ibu dan anak</li>
                                <li>Mengembangkan kegiatan usaha ekonomi keluarga</li>
                                <li>Menjaga kelestarian lingkungan hidup</li>
                            </ul>

                            <!-- SK PKK -->
                            <div class="sk-dalam-card">
                                <?php if (isset($sk_per_jenis['pkk']) && is_object($sk_per_jenis['pkk'])):
                                    $sk = $sk_per_jenis['pkk'];
                                    $nomor = isset($sk->nomor_sk) ? $sk->nomor_sk : '-';
                                    $pm = isset($sk->periode_mulai) ? $sk->periode_mulai : '-';
                                    $ps = isset($sk->periode_selesai) ? $sk->periode_selesai : '-';
                                    $fp = isset($sk->file_path) ? $sk->file_path : '';
                                    $ver = isset($sk->versi) ? $sk->versi : '1';
                                ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <div class="sk-info-small"><strong>Nomor:</strong> <?php echo $nomor; ?></div>
                                    <div class="sk-info-small"><strong>Periode:</strong> <?php echo $pm; ?> - <?php echo $ps; ?></div>
                                    <?php if (!empty($fp)): ?>
                                        <a href="<?php echo base_url($fp); ?>" target="_blank" class="btn-sk-small w-100">
                                            <i class="bi bi-eye"></i> Lihat SK
                                        </a>
                                    <?php endif; ?>
                                    <div class="mt-2 text-center">
                                        <span class="badge-sk-aktif"><i class="bi bi-check-circle-fill"></i> v<?php echo $ver; ?></span>
                                    </div>
                                <?php else: ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <p class="sk-tidak-ada">Belum ada SK yang diupload</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Accordion -->
            <div class="accordion pengertian-accordion d-lg-none" id="accordionPengertian">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRW">
                            <i class="bi bi-people-fill me-2"></i> Rukun Warga (RW)
                        </button>
                    </h2>
                    <div id="collapseRW" class="accordion-collapse collapse" data-bs-parent="#accordionPengertian">
                        <div class="accordion-body">
                            <span class="pengertian-label pengertian"><i class="bi bi-book"></i> Pengertian</span>
                            <p class="pengertian-text">
                                RW adalah wadah pemersatu dan penyelenggara kegiatan kemasyarakatan yang beranggotakan beberapa RT, berfungsi sebagai unit administrasi terendah di tingkat kelurahan.
                            </p>
                            <span class="pengertian-label fungsi"><i class="bi bi-list-check"></i> Fungsi & Tugas</span>
                            <ul class="fungsi-list">
                                <li>Memfasilitasi koordinasi antar RT dalam wilayahnya</li>
                                <li>Menyelenggarakan musyawarah RW secara berkala</li>
                                <li>Mengumpulkan dan menyalurkan aspirasi warga ke kelurahan</li>
                                <li>Membantu kelurahan dalam pelaksanaan pembangunan</li>
                                <li>Mengawasi pelaksanaan program pemerintah di tingkat RW</li>
                                <li>Menjaga ketertiban dan keamanan lingkungan</li>
                            </ul>

                            <!-- SK RW -->
                            <div class="sk-dalam-card mt-3">
                                <?php if (isset($sk_per_jenis['rw'])):
                                    $sk = $sk_per_jenis['rw'];
                                ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <div class="sk-info-small"><strong>Nomor:</strong> <?php echo $sk->nomor_sk; ?></div>
                                    <div class="sk-info-small"><strong>Periode:</strong> <?php echo $sk->periode_mulai; ?> - <?php echo $sk->periode_selesai; ?></div>
                                    <a href="<?php echo base_url($sk->file_path); ?>" target="_blank" class="btn-sk-small w-100">
                                        <i class="bi bi-eye"></i> Lihat SK
                                    </a>
                                <?php else: ?>
                                    <span class="sk-label"><i class="bi bi-file-earmark-text"></i> SK Aktif</span>
                                    <p class="sk-tidak-ada">Belum ada SK yang diupload</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </section>

    <!-- RW Section -->
    <section class="rw-section" id="rwSection">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Struktur RT/RW</h2>
                    <p class="section-subtitle">Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan</p>
                </div>
            </div>

            <div class="rw-grid">
                <?php
                $data_rw = [
                    [
                        'rw' => 'RW 1',
                        'ketua_rw' => 'ENDAR SUWARMAN',
                        'sekretaris_rw' => 'PAKHRUROJI',
                        'bendahara_rw' => 'YUDI PRASETYO',
                        'periode' => '2026-2030',
                        'rt' => [
                            ['rt' => 'RT 1', 'ketua' => 'RADI HANTONO', 'sekretaris' => 'RISKI ROMADHONI', 'bendahara' => 'HARI SUHARTO', 'alamat' => 'Jl. Slamet Gg. Elbahar No 13', 'hp' => '082138624827', 'periode' => '2026-2030'],
                            ['rt' => 'RT 2', 'ketua' => 'SUPRIYATIN', 'sekretaris' => 'TEMU MUGIANTO', 'bendahara' => 'SOLIKHUN', 'alamat' => 'Jl. SLAMET GG ELBAHAR NO 19', 'hp' => '087788426201', 'periode' => '2026-2030'],
                            ['rt' => 'RT 3', 'ketua' => 'ABDUL HARIS M', 'sekretaris' => 'SUHARI', 'bendahara' => 'RUKUN DIHARTO', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 4', 'ketua' => 'SUPRAYOGI', 'sekretaris' => 'CASMUN', 'bendahara' => 'AHMAD IRVAN PITIR', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 5', 'ketua' => 'SARWONO', 'sekretaris' => 'WAHID ABDULLOH', 'bendahara' => 'MOH. ARRIZA Z', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030']
                        ]
                    ],
                    [
                        'rw' => 'RW 2',
                        'ketua_rw' => 'KUSNADI',
                        'sekretaris_rw' => 'AGUNG NUGROHO S',
                        'bendahara_rw' => 'GILANG LIDYAHATLAND',
                        'periode' => '2026-2030',
                        'rt' => [
                            ['rt' => 'RT 1', 'ketua' => 'TARMUDI', 'sekretaris' => 'KUSTOMO', 'bendahara' => 'KARTONO', 'alamat' => 'Jl. Kalibuntu No 5', 'hp' => '081234567890', 'periode' => '2026-2030'],
                            ['rt' => 'RT 2', 'ketua' => 'RISTONO', 'sekretaris' => 'ABDUL ROCHMAN', 'bendahara' => 'RATIM', 'alamat' => 'Jl. Kalibuntu Gg. Mawar', 'hp' => '082345678901', 'periode' => '2026-2030'],
                            ['rt' => 'RT 3', 'ketua' => 'AGUS HARYOSO', 'sekretaris' => 'FERI MAHFUDI', 'bendahara' => 'MOH. ABDUL ROZAK', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 4', 'ketua' => 'TARMO', 'sekretaris' => 'EKO YULIANTO', 'bendahara' => 'SURATNO', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 5', 'ketua' => 'HJ. NURBAETI', 'sekretaris' => 'TONINGSIH', 'bendahara' => 'WARSINAH', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030']
                        ]
                    ],
                    [
                        'rw' => 'RW 3',
                        'ketua_rw' => 'SUNARTO',
                        'sekretaris_rw' => 'SOFIYAH',
                        'bendahara_rw' => 'SALAMUN',
                        'periode' => '2026-2030',
                        'rt' => [
                            ['rt' => 'RT 1', 'ketua' => 'DUROCHMAN', 'sekretaris' => 'MOH. TRI MULYONO', 'bendahara' => 'ADITIA INDRAWAN', 'alamat' => 'Jl. KH. Mukhlas No 10', 'hp' => '083456789012', 'periode' => '2026-2030'],
                            ['rt' => 'RT 2', 'ketua' => 'SUPARDI', 'sekretaris' => 'MOH PANJI GUMILANG PRADANA', 'bendahara' => 'RIO INDRAYANA', 'alamat' => 'Jl. KH. Mukhlas Gg. Melati', 'hp' => '084567890123', 'periode' => '2026-2030'],
                            ['rt' => 'RT 3', 'ketua' => 'KARTONO', 'sekretaris' => 'RUSTANDING', 'bendahara' => 'SUGRI', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 4', 'ketua' => 'SEGER WARSITO', 'sekretaris' => 'NIKO HENDRI IRAWAN', 'bendahara' => 'SIMAN', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030'],
                            ['rt' => 'RT 5', 'ketua' => 'SRI WAHYONO', 'sekretaris' => 'HARYANIH', 'bendahara' => 'NINING SUPRIYATININGSIH', 'alamat' => 'KALIBUNTU BARAT', 'hp' => '085692315565', 'periode' => '2026-2030']
                        ]
                    ],
                    [
                        'rw' => 'RW 4',
                        'ketua_rw' => 'ARIF HARTONO',
                        'sekretaris_rw' => 'MOH. HAMZAH',
                        'bendahara_rw' => 'VERAWATI',
                        'periode' => '2026-2030',
                        'rt' => [
                            ['rt' => 'RT 1', 'ketua' => 'SUNITA', 'sekretaris' => 'YAYU HIDYA PRASTYANI', 'bendahara' => 'HENI TRIANA', 'alamat' => 'Jl. KH. Zaenal Arifin No 15', 'hp' => '085678901234', 'periode' => '2026-2030'],
                            ['rt' => 'RT 2', 'ketua' => 'WARNINGSIH', 'sekretaris' => 'MUHAMAD RIDWAN KHOLIL', 'bendahara' => 'AHMAD JAENI', 'alamat' => 'Jl. KH. Zaenal Arifin Gg. Anggrek', 'hp' => '086789012345', 'periode' => '2026-2030'],
                            ['rt' => 'RT 3', 'ketua' => 'WARSIDIK', 'sekretaris' => 'DARSONO', 'bendahara' => 'HERU SANTOSO', 'alamat' => 'Jl. KH. Zaenal Arifin Gg. Anggrek', 'hp' => '086789012345', 'periode' => '2026-2030']
                        ]
                    ]
                ];

                foreach ($data_rw as $index => $rw) {
                ?>
                    <div class="rw-card">
                        <div class="rw-card-header">
                            <div class="rw-icon-circle">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3><?php echo $rw['rw']; ?></h3>
                        </div>
                        <div class="rw-card-body">
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Ketua RW</strong>
                                    <?php echo $rw['ketua_rw']; ?>
                                </div>
                            </div>
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Sekretaris</strong>
                                    <?php echo $rw['sekretaris_rw']; ?>
                                </div>
                            </div>
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Bendahara</strong>
                                    <?php echo $rw['bendahara_rw']; ?>
                                </div>
                            </div>
                            <div class="rw-periode">
                                <i class="bi bi-calendar3"></i>
                                <span><?php echo $rw['periode']; ?></span>
                            </div>
                            <button class="btn-lihat-rt" onclick="showRT(<?php echo $index; ?>)">
                                <i class="bi bi-eye"></i> Lihat RT
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <br><br>

            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Struktur LPMK dan Karang Taruna</h2>
                    <p class="section-subtitle">Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan</p>
                </div>
            </div>

            <div class="rw-grid">
                <?php
                $data_lpmk = [
                    [
                        'lpmk' => 'LPMK',
                        'ketua_lpmk' => 'EDI MARJONI, S.Pd',
                        'sekretaris_lpmk' => 'DIYAH EMININGSIH',
                        'bendahara_lpmk' => 'SUHARTI',
                        'periode' => '2026-2030'
                    ],
                    [
                        'lpmk' => 'KARANG TARUNA',
                        'ketua_lpmk' => 'PANGGARJITO DWI CAHYO',
                        'sekretaris_lpmk' => 'ZAENAL ARIFIN',
                        'bendahara_lpmk' => 'BUNGA AMELIA WINDASARI',
                        'periode' => '2026-2030'
                    ]
                ];

                foreach ($data_lpmk as $lpmk) {
                ?>
                    <div class="rw-card">
                        <div class="rw-card-header">
                            <div class="rw-icon-circle">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3><?php echo $lpmk['lpmk']; ?></h3>
                        </div>
                        <div class="rw-card-body">
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Ketua</strong>
                                    <?php echo $lpmk['ketua_lpmk']; ?>
                                </div>
                            </div>
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Sekretaris</strong>
                                    <?php echo $lpmk['sekretaris_lpmk']; ?>
                                </div>
                            </div>
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Bendahara</strong>
                                    <?php echo $lpmk['bendahara_lpmk']; ?>
                                </div>
                            </div>
                            <div class="rw-periode">
                                <i class="bi bi-calendar3"></i>
                                <span><?php echo $lpmk['periode']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Modal Daftar RT -->
    <div class="modal fade modal-rt" id="modalRT" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRTTitle">
                        <i class="bi bi-house-door-fill me-2"></i>Daftar RT
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalRTBody"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const rwData = <?php echo json_encode($data_rw); ?>;

        function scrollToPengertian() {
            document.getElementById('pengertianSection').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function scrollToRW() {
            document.getElementById('rwSection').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function showRT(rwIndex) {
            const rw = rwData[rwIndex];
            const modalTitle = document.getElementById('modalRTTitle');
            const modalBody = document.getElementById('modalRTBody');

            modalTitle.innerHTML = `<i class="bi bi-house-door-fill me-2"></i>Daftar RT ${rw.rw}`;

            let html = '';
            rw.rt.forEach(rt => {
                html += `
                    <div class="rt-item">
                        <div class="rt-header">
                            <div class="rt-icon-circle">
                                <i class="bi bi-house-fill"></i>
                            </div>
                            <h5>${rt.rt}</h5>
                        </div>
                        <div class="rt-detail">
                            <i class="bi bi-person-fill"></i>
                            <div><strong>Ketua RT:</strong> ${rt.ketua}</div>
                        </div>
                        <div class="rt-detail">
                            <i class="bi bi-person-badge"></i>
                            <div><strong>Sekretaris:</strong> ${rt.sekretaris}</div>
                        </div>
                        <div class="rt-detail">
                            <i class="bi bi-cash-stack"></i>
                            <div><strong>Bendahara:</strong> ${rt.bendahara}</div>
                        </div>
                        <div class="periode-badge">
                            <i class="bi bi-calendar3"></i>
                            <span>Masa Jabatan: ${rt.periode}</span>
                        </div>
                    </div>
                `;
            });

            modalBody.innerHTML = html;
            const modal = new bootstrap.Modal(document.getElementById('modalRT'));
            modal.show();
        }
    </script>
</body>

</html>