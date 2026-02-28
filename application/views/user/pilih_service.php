<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Permohonan Layanan</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
</head>
<!-- Navigation-->
<header class="header-modern">
    <!-- Top Bar -->
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center py-0">

            <!-- Logo & Title -->
            <div class="col-lg-8 col-md-8 d-flex align-items-center gap-8">
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                </a>
                <div>
                    <div class="header-subtitle fw-bold">Sistem Informasi Pelayanan</div>
                    <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                </div>
            </div>



            <!-- Buttons -->
            <div class="col-lg-4 col-md-4 text-end">
                <a href="<?php echo site_url('dashboard'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Kembali
                </a>
                <a href="<?php echo site_url('auth/logout'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-person-plus me-1"></i>Keluar
                </a>
            </div>

        </div>
    </div>
</header>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center mb-8">
                        <h2 class="fw-bold text-dark section-title">PILIH PERMOHONAN LAYANAN</h2>
                    </div>
                    <!-- Layanan dan Persyaratan Administrasi -->
                    <section class="layanan-section py-5">
                        <div class="container position-relative" style="z-index: 1;">
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
                                                <li>Surat Ket. Dokter (Jika di RS)</li>
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
                                                <li>Surat Ket. Dokter (Jika di RS)</li>
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
                </div>
</body>

</html>