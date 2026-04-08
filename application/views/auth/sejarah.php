<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sejarah Kelurahan - SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />

    <style>
        :root {
            --primary-blue: #1e88e5;
            --dark-blue: #1565c0;
            --light-blue: #64b5f6;
            --accent-yellow: #ffd600;
            --bg-gradient: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
            --gold: #d4af37;
            --dark-gold: #b8941f;
        }

        /* Hero Section Sejarah */
        .history-hero {
            background: linear-gradient(135deg, rgba(30, 136, 229, 0.95) 0%, rgba(21, 101, 192, 0.95) 100%),
                url('<?php echo base_url("assets/images/pattern-jawa.png"); ?>');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .history-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></svg>');
            background-size: 100px 100px;
            opacity: 0.3;
        }

        .history-hero-content {
            position: relative;
            z-index: 1;
        }

        .history-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .history-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .history-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            line-height: 1.8;
        }

        .timeline-image {
            width: 100%;
            height: 600px;
            border-radius: 22px;
            overflow: hidden;
            margin-bottom: 60px;
            background: #e9ecef;
        }

        .timeline-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .timeline-image:hover img {
            transform: scale(1.05);
        }

        /* Timeline Section */
        .timeline-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--bg-gradient);
            border-radius: 2px;
        }

        .section-desc {
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 30px auto 0;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-blue), var(--dark-blue));
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 50px;
            width: 50%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            padding-right: 60px;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
            padding-left: 60px;
        }

        .timeline-dot {
            position: absolute;
            width: 24px;
            height: 24px;
            background: white;
            border: 4px solid var(--primary-blue);
            border-radius: 50%;
            top: 0;
            z-index: 1;
        }

        .timeline-item:nth-child(odd) .timeline-dot {
            right: -12px;
        }

        .timeline-item:nth-child(even) .timeline-dot {
            left: -12px;
        }

        .timeline-content {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 20px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -20px;
            border-left-color: white;
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            left: -20px;
            border-right-color: white;
        }

        .timeline-year {
            display: inline-block;
            background: var(--bg-gradient);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .timeline-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 10px;
        }

        .timeline-text {
            color: #6c757d;
            line-height: 1.8;
        }

        /* Featured Section */
        .featured-section {
            padding: 80px 0;
            background: white;
        }

        .featured-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            padding: 40px;
            height: 100%;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .featured-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(30, 136, 229, 0.15);
        }

        .featured-icon {
            width: 70px;
            height: 70px;
            background: var(--bg-gradient);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: white;
            font-size: 32px;
        }

        .featured-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 15px;
        }

        .featured-text {
            color: #6c757d;
            line-height: 1.8;
        }

        /* Quote Section */
        .quote-section {
            padding: 100px 0;
            background: linear-gradient(135deg, rgba(30, 136, 229, 0.05) 0%, rgba(21, 101, 192, 0.05) 100%);
            position: relative;
        }

        .quote-box {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            position: relative;
        }

        .quote-icon {
            font-size: 60px;
            color: var(--primary-blue);
            opacity: 0.3;
            margin-bottom: 20px;
        }

        .quote-text {
            font-size: 1.5rem;
            font-style: italic;
            color: #212529;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .quote-author {
            font-weight: 700;
            color: var(--dark-blue);
            font-size: 1.1rem;
        }

        .quote-role {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Pahlawan Section */
        .pahlawan-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--dark-blue) 0%, #0d47a1 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .pahlawan-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .pahlawan-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold);
            color: #212529;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .pahlawan-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .pahlawan-text {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.8;
            max-width: 700px;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 300px;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            padding: 30px 20px 20px;
            color: white;
        }

        .gallery-title {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .gallery-desc {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .history-title {
                font-size: 2rem;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 60px !important;
                padding-right: 0 !important;
            }

            .timeline-dot {
                left: 10px !important;
                right: auto !important;
            }

            .timeline-content::before {
                left: -20px !important;
                right: auto !important;
                border-right-color: white !important;
                border-left-color: transparent !important;
            }

            .pahlawan-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
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
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="history-hero">
        <div class="container history-hero-content">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <div class="history-badge">
                        <i class="bi bi-clock-history"></i>
                        Sejarah & Budaya
                    </div>
                    <h1 class="history-title">Sejarah Kelurahan Kalinyamat Wetan</h1>
                    <p class="history-subtitle" style="margin-left: auto; margin-right: auto; text-align: center;">
                        Menelusuri jejak sejarah dari masa lalu yang kaya, berakar dari sosok legendaris
                        Ratu Kalinyamat hingga menjadi kelurahan modern di Kota Tegal, Jawa Tengah.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- FOTO -->


    <!-- Asal Usul Section -->
    <section class="timeline-section">
        <div class="container">
            <div class="section-header">
                <div class="timeline-image">
                    <img src="<?php echo base_url('assets/slide3.jpeg'); ?>"
                        alt="Ratu Kalinyamat"
                        onerror="this.style.display='none'">
                </div>
                <h2 class="section-title">Asal-Usul Nama</h2>
                <p class="section-desc">
                    Kelurahan Kalinyamat Wetan terletak di Kecamatan Tegal Selatan, Kota Tegal.
                    Nama "Kalinyamat" diambil dari Ratu Kalinyamat, tokoh perempuan berpengaruh abad ke-16.
                </p>
            </div>

            <div class="timeline">
                <!-- Timeline Item 1 -->
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">Abad ke-16</span>
                        <h3 class="timeline-title">Lahirnya Ratu Kalinyamat</h3>
                        <p class="timeline-text">
                            Ratu Kalinyamat, yang nama aslinya adalah <strong>Retna Kencana</strong>,
                            merupakan puteri Sultan Trenggana dari Kesultanan Demak. Ia lahir pada masa
                            kejayaan Kesultanan Demak dan dikenal sejak muda karena kecerdasan serta
                            keberaniannya.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">1549</span>
                        <h3 class="timeline-title">Tragedi dan Sumpah Pembalasan</h3>
                        <p class="timeline-text">
                            Setelah suaminya, <strong>Sultan Hadlirin</strong>, terbunuh oleh Arya Penangsang,
                            Ratu Kalinyamat bersumpah untuk membalas kematiannya. Peristiwa ini menjadi
                            titik balik dalam hidupnya dan mengubahnya menjadi pemimpin militer yang ditakuti.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">1550-1579</span>
                        <h3 class="timeline-title">Masa Kepemimpinan di Jepara</h3>
                        <p class="timeline-text">
                            Ratu Kalinyamat memimpin Jepara dengan kebijaksanaan. Di bawah kepemimpinannya,
                            Jepara berkembang menjadi pusat perdagangan dan kekuatan maritim yang penting,
                            menjalin hubungan dagang dengan Banten dan kerajaan-kerajaan lain.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">1579</span>
                        <h3 class="timeline-title">Wafatnya Ratu Kalinyamat</h3>
                        <p class="timeline-text">
                            Ratu Kalinyamat wafat pada tahun 1579, meninggalkan warisan yang besar dalam
                            sejarah penyebaran Islam dan perlawanan terhadap kolonialisme di Nusantara.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Warisan Sejarah</h2>
                <p class="section-desc">
                    Berbagai peninggalan bersejarah yang menjadi bukti kebesaran masa lalu
                    Kelurahan Kalinyamat Wetan dan sekitarnya.
                </p>
            </div>

            <div class="row g-4">
                <!-- Petilasan -->
                <div class="col-lg-4 col-md-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <h3 class="featured-title">Petilasan Ratu Kalinyamat</h3>
                        <p class="featured-text">
                            Peninggalan sejarah berupa tempat yang dipercaya sebagai lokasi Ratu Kalinyamat
                            duduk atau beristirahat selama pengembaraannya. Tempat ini menjadi bagian penting
                            dari sejarah dan budaya daerah.
                        </p>
                    </div>
                </div>

                <!-- Keraton Martoloyo -->
                <div class="col-lg-4 col-md-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-building-fill"></i>
                        </div>
                        <h3 class="featured-title">Keraton Martoloyo</h3>
                        <p class="featured-text">
                            Keraton yang dibangun untuk <strong>Martoloyo</strong>, Bupati Tegal yang diangkat
                            oleh Sultan Agung dari Mataram. Martoloyo adalah paman Sultan Agung sendiri,
                            menunjukkan betapa strategisnya daerah ini.
                        </p>
                    </div>
                </div>

                <!-- Kalinyamat Kulon -->
                <div class="col-lg-4 col-md-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-map-fill"></i>
                        </div>
                        <h3 class="featured-title">Kalinyamat Kulon</h3>
                        <p class="featured-text">
                            Kelurahan saudara yang terletak di Kecamatan Margadana, Kota Tegal.
                            Kedua kelurahan memiliki keterkaitan sejarah yang erat dengan sosok
                            Ratu Kalinyamat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="quote-section">
        <div class="container">
            <div class="quote-box">
                <div class="quote-icon">
                    <i class="bi bi-quote"></i>
                </div>
                <p class="quote-text">
                    "Ratu Kalinyamat membuktikan bahwa perempuan dapat menjadi pemimpin yang berani,
                    bijaksana, dan berpengaruh dalam sejarah bangsa. Perjuangannya melawan penjajahan
                    dan menyebarkan nilai-nilai Islam menjadi inspirasi bagi generasi penerus."
                </p>
                <div class="quote-author">Sejarawan Nusantara</div>
                <div class="quote-role">Studi tentang Peran Perempuan dalam Sejarah Islam Indonesia</div>
            </div>
        </div>
    </section>

    <!-- Peran Ratu Kalinyamat -->
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Peran Ratu Kalinyamat</h2>
                <p class="section-desc">
                    Kontribusi besar Ratu Kalinyamat dalam berbagai aspek kehidupan masyarakat Jawa
                    pada abad ke-16.
                </p>
            </div>

            <div class="row g-4">
                <!-- Agama -->
                <div class="col-lg-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-moon-stars-fill"></i>
                        </div>
                        <h3 class="featured-title">Penyebaran Agama Islam</h3>
                        <p class="featured-text">
                            Menggunakan seni dan budaya sebagai alat untuk menyebarkan agama Islam secara damai.
                            Membangun <strong>Masjid Mantingan</strong> di Jepara yang menjadi pusat kegiatan
                            keagamaan dan budaya Islam. Berhasil mengintegrasikan ajaran Islam ke dalam
                            kehidupan sehari-hari masyarakat Jawa.
                        </p>
                    </div>
                </div>

                <!-- Politik -->
                <div class="col-lg-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <h3 class="featured-title">Politik dan Pemerintahan</h3>
                        <p class="featured-text">
                            Terlibat dalam konflik internal Kesultanan Demak dan menjadi penguasa Jepara.
                            Memimpin pasukan melawan Arya Penangsang dan membantu kerajaan-kerajaan Islam
                            melawan Portugis. Menunjukkan kebijaksanaan memimpin dan strategi militer yang cemerlang.
                        </p>
                    </div>
                </div>

                <!-- Ekonomi -->
                <div class="col-lg-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3 class="featured-title">Pengembangan Ekonomi</h3>
                        <p class="featured-text">
                            Menjadikan Jepara pusat ekonomi penting dengan lokasi strategis sebagai hub perdagangan.
                            Menjalin hubungan dagang dengan berbagai wilayah termasuk Banten, meningkatkan
                            kemakmuran daerah dan kesejahteraan rakyat.
                        </p>
                    </div>
                </div>

                <!-- Internasional -->
                <div class="col-lg-6">
                    <div class="featured-card">
                        <div class="featured-icon">
                            <i class="bi bi-globe-asia-australia"></i>
                        </div>
                        <h3 class="featured-title">Pengaruh Internasional</h3>
                        <p class="featured-text">
                            Menjalin kerja sama dengan berbagai kerajaan maritim dan membantu kerajaan-kerajaan
                            Islam di Nusantara melawan dominasi Portugis. Hubungan diplomatik yang dibangun
                            memperkuat posisi Jepara di kancah internasional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pahlawan Nasional Section -->
    <section class="pahlawan-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="pahlawan-badge">
                        <i class="bi bi-star-fill"></i>
                        Pengakuan Tertinggi Negara
                    </div>
                    <h2 class="pahlawan-title">Gelar Pahlawan Nasional</h2>
                    <p class="pahlawan-text">
                        Pada tanggal <strong>10 November 2023</strong>, Presiden Joko Widodo menganugerahkan
                        gelar pahlawan nasional kepada Ratu Kalinyamat. Penghargaan ini menunjukkan betapa
                        pentingnya peran Ratu Kalinyamat dalam sejarah Indonesia, khususnya dalam penyebaran
                        agama Islam, pengembangan ekonomi, dan perlawanan terhadap kolonialisme.
                    </p>
                </div>
                <div class="col-lg-4 text-center">
                    <div style="font-size: 120px; opacity: 0.2;">
                        <i class="bi bi-award-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background: #1565c0; color: white; padding: 40px 0; text-align: center;">
        <div class="container">
            <p class="mb-2">&copy; 2024 Kelurahan Kalinyamat Wetan - Kota Tegal</p>
            <p style="opacity: 0.8; font-size: 0.9rem;">Sistem Informasi Pelayanan (SIMPEL AWET)</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>