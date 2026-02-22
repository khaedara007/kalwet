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
                <div class="col-xl-10">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">SELAMAT DATANG DI LAYANAN ONLINE <br> KELURAHAN KALINYAMAT WETAN</h1>
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
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <!-- SKTM -->
                <div class="col-lg-4">
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
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
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
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
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
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
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
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
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
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
                    <div class="card f  eatures-icons-item mx-auto mb-5 mb-lg-0 mb-lg-2">
                        <!-- Icons -->
                        <div class="features-icons-icon d-flex justify-content-center mb-0">
                            <i class="bi bi-house" style="font-size: 3rem;" style="font-size: 3rem;"></i>
                        </div>
                        <!-- Content -->
                        <div class="card-body"></i>
                            <h5 class="card-title">Surat Izin Hajatan</h5>
                            <p class="card-text">
                                - Surat Pengantar RT RW<br>
                                - KTP dan Kartu Keluarga Pemohon
                            </p>
                            <a href="<?php echo site_url('service/submit/skih'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/slide2.jpeg');
                    min-height: 60vh;
                    background-position: center;
                    background-repeat: no-repeat;">
                </div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>PROFIL KELURAHAN</h2>
                    <p><strong>Alamat :</strong><br>
                        Jl. Sultan Hasanudin No. 34 Kelurahan Kalinyamat Wetan</p><br>
                    <p><strong>Jam layanan : </strong><br>
                        Senin - Kamis, 07:30 WIB - 16:30 WIB <br>
                        Jum'at, 07.30 WIB - 14.30 WIB </p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-1 text-white showcase-img"
                    style="background-image: url('assets/kelurahan.jpeg');
                    min-height: 60vh;
                    background-position: center;
                    background-repeat: no-repeat;">
                </div>
                <div class="col-lg-6 order-lg-2 my-auto showcase-text">
                    <div class="container py-5">

                        <!-- BATAS DESA -->
                        <div class="col-md-12 section-box">
                            <h2>BATAS KELURAHAN</h2><br>

                            <div class="row">
                                <div class="col-6">
                                    <div class="arah"><strong>Utara</strong></div>
                                    <div>Desa Pacul</div>

                                    <div class="arah mt-4"><strong>Selatan</strong></div>
                                    <div>Desa Bengle</div>
                                </div>

                                <div class="col-6">
                                    <div class="arah"><strong>Timur</strong></div>
                                    <div>Desa Cangkring</div>

                                    <div class="arah mt-4"><strong>Barat</strong></div>
                                    <div>Desa Kaligayam</div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- LUAS & PENDUDUK -->
                        <div class="col-md-12 section-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="judul"><strong>Luas Desa :</strong></div>
                                    <div class="fs-5">1.374.060 m²</div>
                                </div>
                                <div class="col-6">
                                    <div class="judul"><strong>Jumlah Penduduk :</strong></div>
                                    <div class="fs-5">8.610 Jiwa</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Updated For Bootstrap 5</h2>
                <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Easy to Use & Customize</h2>
                <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
            </div>
        </div>
        </div>
    </section>
    <!-- Testimonials-->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">What people are saying...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                        <h5>Margaret E.</h5>
                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                        <h5>Fred S.</h5>
                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                        <h5>Sarah W.</h5>
                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
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
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
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