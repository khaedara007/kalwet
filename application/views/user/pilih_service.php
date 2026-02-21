<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Permohonan Layanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SIMPEL AWET (Sistem Informasi Pelayanan Kelurahan Kalinyamat Wetan)</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Pilih Permohonan Layanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Surat Keterangan Tidak Mampu</h5>
                                        <p class="card-text">- Surat Pengantar RT RW<br> - KTP dan Kartu Keluarga Pemohon</p>
                                        <a href="<?php echo site_url('service/submit/sktm'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Surat Keterangan Domisili</h5>
                                        <p class="card-text">- Surat Pengantar RT RW<br> - KTP dan Kartu Keluarga Pemohon</p>
                                        <a href="<?php echo site_url('service/submit/skd'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Surat Keterangan Penghasilan Orang Tua</h5>
                                        <p class="card-text">- Surat Pengantar RT RW<br> - KTP dan Kartu Keluarga Pemohon</p>
                                        <a href="<?php echo site_url('service/submit/skpo'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Surat Keterangan Belum Menikah</h5>
                                        <p class="card-text">- Surat Pengantar RT RW<br> - KTP dan Kartu Keluarga Pemohon</p>
                                        <a href="<?php echo site_url('service/submit/skbm'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Surat Keterangan Satu Nama</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <a href="<?php echo site_url('service/submit/sksn'); ?>" class="btn btn-primary">Ajukan Permohonan</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>