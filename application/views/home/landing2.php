<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <style>
        /* Custom Styles untuk Section Alur Pelayanan */
        .alur-section {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            position: relative;
            overflow: hidden;
        }

        .alur-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .alur-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
        }

        .step-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .step-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #114B82;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .benefit-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            border-left: 4px solid #ffd700;
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }

        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .pulse-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 215, 0, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(255, 215, 0, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 215, 0, 0);
            }
        }

        .connector-line {
            position: absolute;
            top: 50%;
            left: 100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.5), transparent);
            transform: translateY(-50%);
            z-index: 0;
        }

        @media (max-width: 991px) {
            .connector-line {
                display: none;
            }
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* Profil & Batas Kelurahan Styles */
        .profil-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
        }

        .profil-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(17, 75, 130, 0.1);
            border: 1px solid rgba(17, 75, 130, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .profil-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(17, 75, 130, 0.15);
        }

        .profil-icon-box {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .batas-card {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            border-radius: 20px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .batas-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .arah-item {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .arah-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .arah-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 215, 0, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #114B82;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stats-box {
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            border-radius: 20px;
            padding: 2rem;
            color: #114B82;
            text-align: center;
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            line-height: 1;
        }

        .image-hover-zoom {
            overflow: hidden;
            border-radius: 20px;
        }

        .image-hover-zoom img {
            transition: transform 0.5s ease;
        }

        .image-hover-zoom:hover img {
            transform: scale(1.1);
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #114B82, #ffd700);
            border-radius: 2px;
        }

        /* Rating Section Styles */
        .rating-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .rating-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(17, 75, 130, 0.1);
            border: none;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            gap: 10px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 3rem;
            color: #ddd;
            transition: all 0.2s ease;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffd700;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
            transform: scale(1.1);
        }

        .rating-stats {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            border-radius: 15px;
            color: white;
        }

        .rating-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .rating-fill {
            height: 100%;
            background: #ffd700;
            border-radius: 10px;
            transition: width 0.5s ease;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-dark" style="background-color:#114B82;">
        <div class="container">

            <img src="<?php echo base_url('assets/logo.png') ?>" style="height:45px;" alt=" ...">
            <div class="ms-auto">
                <a class="btn btn-primary me-3" href="<?php echo site_url('login'); ?>">Masuk</a>
                <a class="btn btn-primary" href="<?php echo site_url('register'); ?>">Daftar</a>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="awal">SELAMAT DATANG SISTEM INFORMASI PELAYANAN <br> KELURAHAN KALINYAMAT WETAN</h1>
                        <!-- Signup form-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->

                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center py-5">
        <div class="container">
            <div class="row">
                <h1 class="display-5 fw-bold text-dark section-title">LAYANAN DAN PERSYARATAN ADMINISTRASI
                    <hr>
                </h1>
                <!-- SKTM -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-file-earmark-text" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Keterangan Tidak Mampu</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/sktm'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
                <!-- SKD -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-geo-alt" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Keterangan Domisili</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/skd'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
                <!-- SKPO -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-cash-stack" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Keterangan Penghasilan Orang Tua</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/skpo'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
                <!-- SKBM -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-person" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Keterangan Belum Menikah</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/skbm'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
                <!-- SKBR -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-house" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Keterangan Belum <br>Memiliki Rumah</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/skbr'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
                <!-- SKIH -->
                <div class="col-lg-4">
                    <div class="card mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="d-flex justify-content-center mb-0">
                            <i class="bi bi-calendar-event" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Izin Hajatan</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/sih'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>

    <!-- SECTION BARU: ALUR PELAYANAN INTERAKTIF -->
    <section class="alur-section py-5 text-white">
        <div class="container position-relative" style="z-index: 1;">
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
                        <h5 class="fw-bold mb-2">Akses Website</h5>
                        <p class="opacity-100 mb-0">Buka website resmi SIMPEL AWET melalui HP atau komputer Anda.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.2s;">2️⃣</div>
                        <h5 class="fw-bold mb-2">Daftar / Login</h5>
                        <p class="opacity-100 mb-0">Buat akun baru atau login jika sudah terdaftar.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.4s;">3️⃣</div>
                        <h5 class="fw-bold mb-2">Verifikasi Akun</h5>
                        <p class="opacity-100 mb-0">Admin memverifikasi data Anda sebagai warga Kelurahan.</p>
                    </div>
                    <div class="connector-line d-none d-lg-block"></div>
                </div>

                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.6s;">4️⃣</div>
                        <h5 class="fw-bold mb-2">Pilih Layanan</h5>
                        <p class="opacity-100 mb-0">Pilih jenis layanan sesuai kebutuhan Anda.</p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="col-lg-4 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 0.8s;">5️⃣</div>
                        <h5 class="fw-bold mb-2">Isi Form & Upload</h5>
                        <p class="opacity-100 mb-0">Lengkapi formulir dan unggah persyaratan, lalu klik Ajukan.</p>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="col-lg-4 col-md-6 position-relative">
                    <div class="step-card text-center">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 1s;">6️⃣</div>
                        <h5 class="fw-bold mb-2">Proses oleh Admin</h5>
                        <p class="opacity-100 mb-0">Permohonan diverifikasi dan diproses oleh petugas.</p>
                    </div>
                </div>

                <!-- Step 7 -->
                <div class="col-lg-4 col-md-12 position-relative">
                    <div class="step-card text-center border-warning">
                        <div class="step-number mx-auto floating-icon" style="animation-delay: 1.2s; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">7️⃣</div>
                        <h5 class="fw-bold mb-2">Unduh Hasil</h5>
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
                                    <span class="fw-semibold">Tidak perlu datang ke kantor</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">Bisa diakses 24 jam</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">Proses transparan</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-item d-flex align-items-center gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="fw-semibold">Hemat waktu & biaya</span>
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

    <!-- Image Showcases-->
    <!-- Profil & Batas Kelurahan Section -->
    <section class="profil-section py-5">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark section-title">PROFIL KELURAHAN</h2>
                <p class="text-muted">Mengenal Lebih Dekat Kalinyamat Wetan</p>
            </div>

            <div class="row g-4 align-items-stretch">

                <!-- Kolom Kiri: Gambar -->
                <div class="col-lg-6">
                    <div class="image-hover-zoom h-100">
                        <img src="assets/slide2.jpeg" class="w-100 h-100 object-fit-cover" style="min-height: 400px; object-fit: cover;" alt="Kelurahan Kalinyamat Wetan">
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
                        <h2 class="fw-bold mb-2">BATAS WILAYAH</h2>
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
                    <h3 class="fw-bold section-title">PETA LOKASI</h3>
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
        <section class="rating-section py-5">
            <div class="container">

                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold text-dark section-title">PENILAIAN PELAYANAN</h2>
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

                            <?php if ($this->session->userdata('logged_in')): ?>
                                <!-- User sudah login -->
                                <form action="<?php echo site_url('rating/submit'); ?>" method="POST" id="ratingForm">
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
                                    </div>

                                    <div class="mb-3">
                                        <textarea name="komentar" class="form-control rounded-3" rows="3" placeholder="Komentar anda (opsional)..." maxlength="500"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3">
                                        <i class="bi bi-send-fill me-2"></i>Kirim Rating
                                    </button>
                                </form>

                                <!-- Notifikasi sudah pernah rating -->
                                <?php if ($this->session->userdata('sudah_rating')): ?>
                                    <div class="alert alert-success mt-3 text-center">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        Terima kasih! Anda sudah memberi rating.
                                    </div>
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

                            <?php
                            // Data dummy - nanti diambil dari database
                            $total_rating = 128;
                            $avg_rating = 4.2;
                            $distribusi = [
                                5 => 85,
                                4 => 25,
                                3 => 10,
                                2 => 5,
                                1 => 3
                            ];
                            ?>

                            <div class="text-center mb-4">
                                <div class="display-1 fw-bold text-warning"><?php echo number_format($avg_rating, 1); ?></div>
                                <div class="mb-2">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="bi bi-star-fill <?php echo $i <= round($avg_rating) ? 'text-warning' : 'text-white-50'; ?> fs-4"></i>
                                    <?php endfor; ?>
                                </div>
                                <div class="opacity-75">dari <?php echo $total_rating; ?> pengguna</div>
                            </div>

                            <!-- Progress bar per bintang -->
                            <?php for ($i = 5; $i >= 1; $i--):
                                $persen = ($total_rating > 0) ? ($distribusi[$i] / $total_rating) * 100 : 0;
                            ?>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 small" style="width: 60px;"><?php echo $i; ?> <i class="bi bi-star-fill small"></i></span>
                                    <div class="flex-grow-1 rating-bar">
                                        <div class="rating-fill" style="width: <?php echo $persen; ?>%"></div>
                                    </div>
                                    <span class="ms-2 small" style="width: 40px; text-align: right;"><?php echo $distribusi[$i]; ?></span>
                                </div>
                            <?php endfor; ?>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                        <!-- Signup form-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:required">Email Address is required.</div>
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">Email Address Email is not valid.</div>
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                        </form>
                    </div>
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