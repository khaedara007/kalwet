<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIMPEL AWET Dashbaord</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <!-- Custom CSS SIMPEL AWET -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <header class="header-modern">
        <!-- Top Bar -->
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center py-0">

                <!-- Logo & Title -->
                <div class="col-lg-7 col-md-7 d-flex align-items-center gap-8">
                    <a href="<?php echo site_url('/'); ?>">
                        <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                    </a>
                    <div>
                        <div class="header-subtitle fw-bold">Sistem Informasi Pelayanan</div>
                        <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="col-lg-5 col-md-5 text-end">
                    <?php if ($this->session->userdata('user')): ?>
                        <!-- Jika sudah login -->
                        <?php $user = $this->session->userdata('user'); ?>

                        <span class="me-3 fw-bold text-light">
                            <i class="bi bi-person-circle me-1"></i>Halo, <?php echo $user->name; ?>
                        </span>

                        <a href="<?php echo site_url('dashboard'); ?>" class="btn header-btn header-btn-register me-2">
                            <i class="bi bi-file-text me-1"></i>Permohonan Saya
                        </a>
                        <a href="<?php echo site_url('logout'); ?>" class="btn header-btn header-btn-login">
                            <i class="bi bi-box-arrow-right me-1"></i>Keluar
                        </a>

                    <?php else: ?>
                        <!-- Jika belum login -->
                        <a href="<?php echo site_url('login'); ?>" class="btn header-btn header-btn-login me-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
                        </a>
                        <a href="<?php echo site_url('register'); ?>" class="btn header-btn header-btn-register">
                            <i class="bi bi-person-plus me-1"></i>Daftar
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>
    <!-- Masthead-->
    <header class="masthead">
        <div class="masthead-overlay"></div>
        <div class="container position-relative h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-xl-10">
                    <div class="text-center text-white masthead-content">
                        <!-- Badge/Label -->
                        <div class="masthead-badge mb-3">
                            <span class="badge bg-warning text-dark px-4 py-2 rounded-pill fw-bold">
                                <i class="fas fa-star me-2"></i>Layanan Publik
                            </span>
                        </div>

                        <!-- Main Heading dengan Animasi -->
                        <h1 class="masthead-title display-4 fw-bold mb-4">
                            SELAMAT DATANG DI<br>
                            <span class="text-warning">SISTEM INFORMASI PELAYANAN</span><br>
                            <span class="fs-3 fw-light fw-bold">KELURAHAN KALINYAMAT WETAN</span>
                        </h1>

                        <!-- Deskripsi -->
                        <p class="masthead-subtitle lead mb-5 mx-auto" style="max-width: 700px;">
                            Melayani masyarakat dengan cepat, transparan, dan profesional.
                            Akses berbagai layanan administrasi kependudukan secara online.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="curve-separator">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0 120L1440 120L1440 60C1440 60 1320 0 1080 0C840 0 720 60 480 60C240 60 120 30 0 30L0 120Z" fill="white" />
                <path d="M0 120L1440 120L1440 90C1440 90 1320 30 1080 30C840 30 720 90 480 90C240 90 120 60 0 60L0 120Z" fill="rgba(255,255,255,0.5)" />
            </svg>
        </div>
    </header>
    <!-- Icons Grid-->
    <!-- Layanan dan Persyaratan Administrasi -->
    <section class="layanan-section py-5">
        <div class="container position-relative" style="z-index: 1;">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark section-title" style="font-size: 2rem !important;">LAYANAN DAN PERSYARATAN ADMINISTRASI</h2>
                <br>
                <span class="layanan-kategori">
                    <i class="bi bi-grid-3x3-gap-fill me-2"></i>Layanan Online
                </span>
                <p class="text-muted">Pilih layanan yang Anda butuhkan, ajukan secara online dengan mudah</p>
            </div>

            <div class="row g-4">

                <!-- SKTM -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Tidak Mampu</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/sktm'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKD -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Domisili</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skd'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKPO -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Penghasilan Orang Tua</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skpo'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKBM -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-person"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Belum Menikah</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skbm'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKBR -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-house"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Belum Memiliki Rumah</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skbr'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKIH -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <h5 class="layanan-title">Surat Izin Hajatan</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/sih'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKCK - BARU -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="layanan-title">Surat Pengantar SKCK</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skck'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKSN -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-file-earmark-person"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Satu Nama</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                                <li>Akta Kelahiran</li>
                                <li>Akta Nikah (Jika Sudah Menikah)</li>
                                <li>Berkas Identitas Yang Berbeda</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/sksn'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SPKD - BARU -->
                <div class="col-lg-4 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h5 class="layanan-title">Surat Pengantar Kehilangan Dokumen</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Pemohon</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/spkd'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>

                <!-- SKM -->
                <!--
                <div class="col-lg-6 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-person-x"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Kematian</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Yang Meninggal</li>
                                <li>KTP Pelapor</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Surat Ket. Dokter (Jika di RS)</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skm'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>
                -->
                <!-- SKL -->
                <!--
                <div class="col-lg-6 col-md-6">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge">Online</span>
                        <div class="layanan-icon-wrapper">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Kelahiran</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>Buku Nikah Orang Tua</li>
                                <li>KTP dan Kartu Keluarga Orang Tua</li>
                                <li>KTP Pelapor</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Surat Ket. Dokter (Jika di RS)</li>
                            </ul>
                        </div>
                        <a href="<?php echo site_url('service/submit/skl'); ?>" class="btn btn-layanan">
                            <i class="bi bi-send-fill me-2"></i>Ajukan Sekarang
                        </a>
                    </div>
                </div>
-->
            </div>

            <!-- Layanan Offline -->
            <div class="text-center mt-5 mb-6">
                <span class="layanan-kategori">
                    <i class="bi bi-building me-0"></i>
                    <h7>Layanan Offline (Datang ke Kantor)</h7>
                </span>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- SKM -->
                <div class="col-lg-5 col-md-3">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge offline">Offline</span>
                        <div class="layanan-icon-wrapper" style="background: #6c757d;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Kematian</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan Kartu Keluarga Yang Meninggal</li>
                                <li>KTP Pelapor</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Surat Ket. Dokter (Jika di Meninggal di Rumah Sakit)</li>
                            </ul>
                        </div>
                        <button class="btn btn-layanan-offline" disabled>
                            <i class="bi bi-building me-2"></i>Pengajuan di Kantor
                        </button>
                    </div>
                </div>
                <!-- SKL -->
                <div class="col-lg-5 col-md-3">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge offline">Offline</span>
                        <div class="layanan-icon-wrapper" style="background: #6c757d;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="layanan-title">Surat Keterangan Kelahiran</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>Buku Nikah Orang Tua</li>
                                <li>KTP dan Kartu Keluarga Orang Tua</li>
                                <li>KTP Pelapor</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Surat Ket. Dokter (Jika Lahir di Rumah Sakit)</li>
                            </ul>
                        </div>
                        <button class="btn btn-layanan-offline" disabled>
                            <i class="bi bi-building me-2"></i>Pengajuan di Kantor
                        </button>
                    </div>
                </div>
                <!-- SKKM -->
                <div class="col-lg-5 col-md-3">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge offline">Offline</span>
                        <div class="layanan-icon-wrapper" style="background: #6c757d;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="layanan-title">Surat Kesaksian Kematian</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP / KK Yang Meninggal</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Kartu Keluarga Saksi</li>
                                <li>Materai Rp. 10.000</li>
                            </ul>
                        </div>
                        <button class="btn btn-layanan-offline" disabled>
                            <i class="bi bi-building me-2"></i>Pengajuan di Kantor
                        </button>
                    </div>
                </div>

                <!-- SKKL -->
                <div class="col-lg-5 col-md-3">
                    <div class="layanan-card p-4">
                        <span class="layanan-badge offline">Offline</span>
                        <div class="layanan-icon-wrapper" style="background: #6c757d;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h5 class="layanan-title">Surat Kesaksian Kelahiran</h5>
                        <div class="layanan-syarat">
                            <div class="layanan-syarat-title">Persyaratan</div>
                            <ul class="layanan-syarat-list">
                                <li>Surat Pengantar RT RW</li>
                                <li>KTP dan KK Pemohon</li>
                                <li>KTP Saksi 2 Orang</li>
                                <li>Kartu Keluarga Saksi</li>
                                <li>Materai Rp. 10.000</li>
                            </ul>
                        </div>
                        <button class="btn btn-layanan-offline" disabled>
                            <i class="bi bi-building me-2"></i>Pengajuan di Kantor
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION BARU: ALUR PELAYANAN INTERAKTIF -->
    <section class="alur-section py-5 text-white">
        <div class="container position-relative" style="z-index: 1;">
            <div class="alur-logo-container">
                <div class="logo-ring"></div>
                <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="alur-logo">
            </div>
            <!-- Header -->
            <div class="text-center mb-5">
                <div class="d-flex justify-content-center gap-3 mb-3 flex-wrap">
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6 pulse-badge">✨ Mudah</span>
                    <span class="badge bg-info text-dark px-3 py-2 fs-6 pulse-badge">⚡ Cepat</span>
                    <span class="badge bg-success px-3 py-2 fs-6 pulse-badge">🔍 Transparan</span>
                    <span class="badge bg-primary px-3 py-2 fs-6 pulse-badge">💻 Online</span>
                </div>
                <h2 class="display-5 fw-bold mb-2">ALUR PELAYANAN SIMPEL AWET</h2>
                <hr>
                <p class="lead opacity-100">
                <h3> 7 Langkah Mudah Mengurus Administrasi </h3>
                </p>
            </div>

            <!-- Steps Grid -->
            <div class="row g-4 mb-5">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon">1️⃣</div>
                        <h4 class="fw-bold mb-2">Akses Website</h4>
                        <p class="opacity-100 mb-0">Buka website resmi SIMPEL AWET melalui HP atau komputer Anda.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.2s;">2️⃣</div>
                        <h4 class="fw-bold mb-2">Daftar / Login</h4>
                        <p class="opacity-100 mb-0">Buat akun baru atau login jika sudah terdaftar.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.4s;">3️⃣</div>
                        <h4 class="fw-bold mb-2">Verifikasi Akun</h4>
                        <p class="opacity-100 mb-0">Admin memverifikasi data Anda sebagai warga Kelurahan.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.6s;">4️⃣</div>
                        <h4 class="fw-bold mb-2">Pilih Layanan</h4>
                        <p class="opacity-100 mb-0">Pilih jenis layanan sesuai kebutuhan Anda.</p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="col-lg-4 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.8s;">5️⃣</div>
                        <h4 class="fw-bold mb-2">Isi Form & Upload</h4>
                        <p class="opacity-100 mb-0">Lengkapi formulir dan unggah persyaratan, lalu klik Ajukan.</p>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="col-lg-4 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 1s;">6️⃣</div>
                        <h4 class="fw-bold mb-2">Proses oleh Admin</h4>
                        <p class="opacity-100 mb-0">Permohonan diverifikasi dan diproses oleh petugas.</p>
                    </div>
                </div>

                <!-- Step 7 -->
                <div class="col-lg-4 col-md-12 position-relative">
                    <div class="step-card text-center border-warning">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 1.2s; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">7️⃣</div>
                        <h4 class="fw-bold mb-2">Unduh Hasil</h4>
                        <p class="opacity-100 mb-0">Dokumen dapat langsung diunduh dari akun Anda.</p>
                        <i class="bi bi-check-circle-fill text-warning fs-1 mt-2 d-block"></i>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white bg-opacity-10 rounded-4 p-4 p-lg-5 backdrop-blur">
                        <h3 class="text-center mb-4 fw-bold">
                            <i class="bi bi-lightbulb-fill text-warning me-2"></i>
                            Kenapa Pakai SIMPEL AWET?
                        </h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">
                                        <h4>Tidak perlu datang ke kantor</h4>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">
                                        <h4>Bisa diakses 24 jam</h4>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">
                                        <h4>Proses transparan</h4>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">
                                        <h4>Hemat waktu & biaya</h4>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="text-center mt-4">
                            <a href="<?php echo site_url('register'); ?>" class="btn btn-warning btn-lg fw-bold px-5 py-3 rounded-pill shadow-lg hover-scale">
                                <i class="bi bi-rocket-takeoff me-2"></i>
                                Mulai Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Lurah -->
    <section class="sambutan-section py-5">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center g-5">

                <!-- Kolom Foto -->
                <div class="col-lg-5 text-center position-relative">
                    <div class="foto-ring"></div>
                    <img src="<?php echo base_url('assets/lurah.jpeg'); ?>" alt="Kepala Lurah Kalinyamat Wetan" class="foto-lurah">
                </div>

                <!-- Kolom Teks -->
                <div class="col-lg-7">
                    <div class="sambutan-content">
                        <h2 class="sambutan-title">Sambutan Lurah Kalinyamat Wetan</h2>
                        <h2 class="sambutan-nama">MARI, S.AP</h2>

                        <div class="sambutan-text position-relative">
                            <i class="bi bi-quote quote-icon"></i>
                            <p class="mb-0">
                                Assalamu'alaikum Wr. Wb.<br><br>
                                Puji syukur kami panjatkan kehadirat Allah SWT atas karunia dan nikmat-Nya sehingga website SIMPEL AWET dapat hadir sebagai wujud komitmen kami dalam melayani masyarakat Kelurahan Kalinyamat Wetan. Sistem Informasi Pelayanan ini kami bangun untuk memudahkan warga dalam mengurus administrasi kependudukan dan pelayanan lainnya secara online, tanpa perlu datang ke kantor kelurahan.
                                Kami berharap pelayanan menjadi lebih <strong>mudah, cepat, transparan, dan akuntabel</strong>. Kami terus berupaya meningkatkan kualitas pelayanan demi kepuasan masyarakat. Silakan manfaatkan fasilitas ini dengan sebaik-baiknya.<br><br>
                                Wassalamu'alaikum Wr. Wb.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Image Showcases-->
    <!-- Profil & Batas Kelurahan Section -->
    <section class="profil-section py-5">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark section-title" style="font-size: 2rem !important;">PROFIL KELURAHAN</h2>
                <p class="text-muted">Mengenal Lebih Dekat Kalinyamat Wetan</p>
            </div>

            <div class="row g-4 align-items-stretch">

                <!-- Kolom Kiri: Gambar -->
                <div class="col-lg-6">
                    <div class="image-hover-zoom h-100">
                        <img src="assets/kelurahan.jpeg" class="w-100 h-100 object-fit-cover" style="min-height: 400px; object-fit: cover;" alt="Kelurahan Kalinyamat Wetan">
                    </div>
                </div>

                <!-- Kolom Kanan: Info Profil -->
                <div class="col-lg-6">
                    <div class="profil-card h-100 p-4 p-lg-5">
                        <div class="row g-4">

                            <!-- Alamat -->
                            <div class="col-12">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="profil-icon-box flex-shrink-0">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-primary mb-2">Alamat Kantor</h5>
                                        <p class="text-muted mb-0">Jl. Sultan Hasanudin No. 34 Kelurahan Kalinyamat Wetan, Kec. Tegal Selatan, Kota Tegal</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Jam Layanan -->
                            <div class="col-12">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="profil-icon-box flex-shrink-0">
                                        <i class="bi bi-clock-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-primary mb-2">Jam Layanan Selama Ramadhan</h5>
                                        <div class="text-muted">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Senin - Kamis</span>
                                                <span class="fw-semibold text-primary bg-light px-3 py-1 rounded-pill small">08:00 - 15:00 WIB</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>Jum'at</span>
                                                <span class="fw-semibold text-primary bg-light px-3 py-1 rounded-pill small">08:00 - 15:30 WIB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kontak -->
                            <div class="col-12">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="profil-icon-box flex-shrink-0">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-primary mb-2">Kontak</h5>
                                        <p class="text-muted mb-0">Silakan hubungi kami melalui media sosial resmi kelurahan</p>
                                        <div class="mt-2">
                                            <a href="https://www.youtube.com/@KalinyamatWetanGalsel" class="btn btn-sm btn-outline-danger me-2"><i class="bi bi-youtube"></i> YouTube</a>
                                            <a href="https://www.instagram.com/kalinyamat_wetan" class="btn btn-sm btn-outline-primary"><i class="bi bi-instagram"></i> Instagram</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Batas Kelurahan Section -->
            <div class="mt-5">
                <div class="batas-card p-4 p-lg-5">

                    <div class="text-center mb-4 position-relative">
                        <h2 class="display-5 fw-bold text-light section-title" style="font-size: 2rem !important;">BATAS WILAYAH</h2>
                        <p class="opacity-100 mb-0">
                        <h5>Letak Geografis Kelurahan Kalinyamat Wetan</h5>
                        </p>
                    </div>

                    <div class="row g-4 justify-content-center">

                        <!-- Utara -->
                        <div class="col-6 col-md-3">
                            <div class="arah-item text-center">
                                <div class="arah-icon mx-auto">
                                    <i class="bi bi-arrow-up"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Utara</h6>
                                <p class="mb-0 opacity-100">Kelurahan Tunon</p>
                            </div>
                        </div>

                        <!-- Timur -->
                        <div class="col-6 col-md-3">
                            <div class="arah-item text-center">
                                <div class="arah-icon mx-auto">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Timur</h6>
                                <p class="mb-0 opacity-100">Kelurahan Bandung</p>
                            </div>
                        </div>

                        <!-- Selatan -->
                        <div class="col-6 col-md-3">
                            <div class="arah-item text-center">
                                <div class="arah-icon mx-auto">
                                    <i class="bi bi-arrow-down"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Selatan</h6>
                                <p class="mb-0 opacity-100">Kabupaten Tegal</p>
                            </div>
                        </div>

                        <!-- Barat -->
                        <div class="col-6 col-md-3">
                            <div class="arah-item text-center">
                                <div class="arah-icon mx-auto">
                                    <i class="bi bi-arrow-left"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Barat</h6>
                                <p class="mb-0 opacity-100">Kelurahan Kalinyamat Kulon</p>
                            </div>
                        </div>

                    </div>

                    <!-- Stats: Luas & Penduduk -->
                    <div class="row g-4 mt-4">
                        <div class="col-md-6">
                            <div class="stats-box">
                                <i class="bi bi-map fs-2 mb-2 d-block"></i>
                                <div class="stats-number">0,89</div>
                                <div class="fw-semibold">km²</div>
                                <div class=" mt-1">
                                    <h3>Luas Wilayah</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="stats-box">
                                <i class="bi bi-people-fill fs-2 mb-2 d-block"></i>
                                <div class="stats-number">6.020</div>
                                <div class="fw-semibold">Jiwa</div>
                                <div class="mt-1">
                                    <h3>Jumlah Penduduk</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Peta Lokasi -->
            <div class="mt-5">
                <div class="text-center mb-4">
                    <h3 class="display-5 fw-bold text-dark section-title" style="font-size: 2rem !important;">PETA LOKASI</h3>
                </div>
                <div class="rounded-4 shadow overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d294.4014172347726!2d109.10912863721717!3d-6.893289445474666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb993ee765361%3A0x3d680d4946836c58!2sKantor%20Kelurahan%20Kalinyamat%20Wetan!5e0!3m2!1sen!2sjp!4v1771770779157!5m2!1sen!2sjp"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>

        <!-- Rating Pelayanan Section -->
        <section class="rating-section py-5" id="rating">
            <div class="container">

                <!-- FLASH MESSAGES - TAMBAHKAN INI DI ATAS -->
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-8">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <?php echo $this->session->flashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <?php echo $this->session->flashdata('error'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark section-title" style="font-size: 2rem !important;">PENILAIAN PELAYANAN</h2>
                    <p class="text-muted">Beri rating untuk pelayanan SIMPEL AWET</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Form Rating (Hanya untuk user yang login) -->
                    <div class="col-lg-6">
                        <div class="rating-card p-4 p-lg-5 h-100">
                            <h4 class="fw-bold text-primary mb-4 text-center">
                                <i class="bi bi-star-fill text-warning me-2"></i>
                                Beri Rating Anda
                            </h4>

                            <?php
                            // Cek login - sesuaikan dengan struktur session Anda
                            $user = $this->session->userdata('user');
                            $is_logged_in = !empty($user);

                            if ($is_logged_in):
                            ?>
                                <?php if (!empty($sudah_rating) && $sudah_rating): ?>
                                    <!-- Sudah pernah rating -->
                                    <div class="alert alert-success text-center py-4">
                                        <i class="bi bi-check-circle-fill fs-1 d-block mb-2"></i>
                                        <h5>Terima kasih!</h5>
                                        <p class="mb-0">Anda sudah memberikan rating untuk pelayanan kami.</p>
                                    </div>
                                <?php else: ?>
                                    <!-- Form Rating -->
                                    <form action="<?php echo site_url('rating/submit'); ?>" method="POST" id="ratingForm">
                                        <?php if ($this->security->get_csrf_token_name()): ?>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <?php endif; ?>
                                        <div class="text-center mb-4">
                                            <div class="star-rating">
                                                <input type="radio" id="star5" name="rating" value="5" required>
                                                <label for="star5"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="star4" name="rating" value="4">
                                                <label for="star4"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="star3" name="rating" value="3">
                                                <label for="star3"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="star2" name="rating" value="2">
                                                <label for="star2"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="star1" name="rating" value="1">
                                                <label for="star1"><i class="bi bi-star-fill"></i></label>
                                            </div>
                                            <small class="text-muted d-block mt-2">Klik bintang untuk memberi nilai</small>
                                            <div id="rating-text" class="fw-bold text-primary mt-1"></div>
                                        </div>

                                        <div class="mb-3">
                                            <textarea name="komentar" class="form-control rounded-3" rows="3"
                                                placeholder="Komentar anda (opsional)..." maxlength="500"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3">
                                            <i class="bi bi-send-fill me-2"></i>Kirim Rating
                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                <!-- User belum login -->
                                <div class="text-center py-4">
                                    <i class="bi bi-lock-fill text-muted fs-1 mb-3 d-block"></i>
                                    <p class="text-muted mb-3">Silakan login untuk memberi rating</p>
                                    <a href="<?php echo site_url('login'); ?>" class="btn btn-outline-primary px-4">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Login Sekarang
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Statistik Rating (Public) -->
                    <div class="col-lg-6">
                        <div class="rating-stats p-4 p-lg-5 h-100">
                            <h4 class="fw-bold mb-4 text-center">
                                <i class="bi bi-bar-chart-fill me-2"></i>
                                Statistik Rating
                            </h4>

                            <div class="text-center mb-4">
                                <div class="display-1 fw-bold text-warning">
                                    <?php echo number_format($rating_stats['average'] ?? 0, 1); ?>
                                </div>
                                <div class="mb-2">
                                    <?php
                                    $avg = round($rating_stats['average'] ?? 0);
                                    for ($i = 1; $i <= 5; $i++):
                                    ?>
                                        <i class="bi bi-star-fill <?php echo $i <= $avg ? 'text-warning' : 'text-secondary'; ?> fs-4"></i>
                                    <?php endfor; ?>
                                </div>
                                <div class="opacity-75">dari <?php echo $rating_stats['total'] ?? 0; ?> pengguna</div>
                            </div>

                            <!-- Progress bar per bintang -->
                            <?php
                            $total = $rating_stats['total'] ?? 0;
                            for ($i = 5; $i >= 1; $i--):
                                $count = $rating_stats['distribusi'][$i] ?? 0;
                                $persen = ($total > 0) ? ($count / $total) * 100 : 0;
                            ?>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 small" style="width: 60px;">
                                        <?php echo $i; ?> <i class="bi bi-star-fill small"></i>
                                    </span>
                                    <div class="flex-grow-1 rating-bar bg-light rounded">
                                        <div class="rating-fill bg-warning rounded" style="width: <?php echo $persen; ?>%; height: 20px;"></div>
                                    </div>
                                    <span class="ms-2 small" style="width: 40px; text-align: right;">
                                        <?php echo $count; ?>
                                    </span>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .star-rating {
                display: flex;
                flex-direction: row-reverse;
                justify-content: center;
                gap: 5px;
            }

            .star-rating input {
                display: none;
            }

            .star-rating label {
                cursor: pointer;
                font-size: 2.5rem;
                color: #ddd;
                transition: color 0.2s;
            }

            .star-rating input:checked~label,
            .star-rating label:hover,
            .star-rating label:hover~label {
                color: #ffc107;
            }

            .rating-bar {
                height: 20px;
                background-color: #e9ecef;
                border-radius: 10px;
                overflow: hidden;
            }

            .rating-fill {
                height: 100%;
                background-color: #ffc107;
                transition: width 0.3s ease;
            }
        </style>

        <script>
            // Tambahkan teks deskripsi saat memilih bintang
            document.querySelectorAll('.star-rating input').forEach(star => {
                star.addEventListener('change', function() {
                    const texts = {
                        1: 'Sangat Buruk',
                        2: 'Buruk',
                        3: 'Cukup',
                        4: 'Baik',
                        5: 'Sangat Baik'
                    };
                    document.getElementById('rating-text').textContent = texts[this.value];
                });
            });
        </script>
        <!-- Menu Pencarian -->
        <section class="search-section py-5 text-white text-center">
            <div class="container">
                <h3 class="mb-4 fw-bold">Cari Layanan atau Informasi</h3>

                <form action="<?php echo site_url('search'); ?>" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="search-box">
                                <input type="text" name="keyword" class="search-input" placeholder="Ketik nama layanan, dokumen, atau informasi..." required>
                                <button type="submit" class="search-btn">
                                    <i class="bi bi-search me-2"></i>Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="mt-3 small opacity-75">
                    Contoh: SKTM, Surat Domisili, Izin Hajatan
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Kelurahan Kalinyamat Wetan 2026. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="https://www.youtube.com/@KalinyamatWetanGalsel"><i class="bi-youtube fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&ved=2ahUKEwiAyL-FsO2SAxXNhlYBHb9iMLQQFnoECB8QAQ&url=https%3A%2F%2Fwww.instagram.com%2Fkalinyamat_wetan%2F&usg=AOvVaw3p7TjiCnask5We5c67wDBA&opi=89978449"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('assets/template1/js/scripts.js') ?>"></script>

</body>

</html>