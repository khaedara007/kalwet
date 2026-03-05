<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-dark" style="background-color:#ffffff;">
        <div class="container">

            <img src="<?php echo base_url('assets/logo.png') ?>" style="height:60px;" alt=" ...">
            <div class="ms-auto">
                <a class="btn btn-primary me-3" href="<?php echo site_url('profil'); ?>">Profil Kelurahan</a>
                <a class="btn btn-primary me-3" href="<?php echo site_url('login'); ?>">Masuk</a>
                <a class="btn btn-primary" href="<?php echo site_url('register'); ?>">Daftar</a>
            </div>
        </div>
    </nav>
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
    </secion>
</body>

</html>