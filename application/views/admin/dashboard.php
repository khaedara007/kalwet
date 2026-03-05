<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Admin CSS -->
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>

<body>
    <!-- Navbar Modern -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo site_url('admin'); ?>">
                <i class="bi bi-shield-check me-2"></i>
                Admin Panel
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto align-items-center">
                    <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">
                        <i class="bi bi-folder-check me-1"></i>Permohonan
                    </a>
                    <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">
                        <i class="bi bi-people me-1"></i>Pengguna
                    </a>
                    <a class="nav-link position-relative" href="<?php echo site_url('admin/ratings'); ?>">
                        <i class="bi bi-star-fill me-1 text-warning"></i>Rating
                        <?php if (isset($quick_stats['total']) && $quick_stats['total'] > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 0.6rem;">
                                <?php echo $quick_stats['total']; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <a class="nav-link text-danger bg-danger bg-opacity-10 rounded ms-2" href="<?php echo site_url('admin/logout'); ?>">
                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <!-- FLASH MESSAGES -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('success'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('warning'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('error'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Header Dashboard -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary mb-0">Dashboard Admin</h2>
                <small class="text-muted">Kelola verifikasi akun dan layanan</small>
            </div>
            <div class="text-end">
                <small class="text-muted d-block"><?php echo date('l, d F Y'); ?></small>
                <span class="badge bg-success"><i class="bi bi-circle-fill me-1" style="font-size: 8px;"></i>Online</span>
            </div>
        </div>

        <!-- MENU BUTTONS -->
        <div class="mb-4">
            <a href="<?php echo site_url('admin/requests'); ?>" class="btn btn-primary btn-action me-2">
                <i class="bi bi-folder-check me-2"></i>Kelola Permohonan
            </a>
            <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-outline-primary btn-action me-2">
                <i class="bi bi-people me-2"></i>Data Pengguna
            </a>
            <a href="<?php echo site_url('admin/ratings'); ?>" class="btn btn-warning btn-action text-dark">
                <i class="bi bi-star-fill me-2"></i>Kelola Rating
            </a>
        </div>

        <!-- STATISTIK RATING SINGKAT -->
        <?php
        $this->load->model('Rating_model');
        $quick_stats = $this->Rating_model->getRatingStats();
        ?>
        <div class="row mb-4 g-3">
            <div class="col-md-4 col-sm-6">
                <div class="card stat-card bg-warning text-dark">
                    <div class="card-body text-center">
                        <i class="bi bi-star-fill fs-2 mb-2 opacity-75"></i>
                        <h3 class="mb-0 fw-bold"><?php echo number_format($quick_stats['average'], 1); ?></h3>
                        <small>Rata-rata Rating</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card stat-card bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="bi bi-chat-square-text fs-2 mb-2 opacity-75"></i>
                        <h3 class="mb-0 fw-bold"><?php echo $quick_stats['total']; ?></h3>
                        <small>Total Review</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card stat-card bg-success text-white">
                    <div class="card-body text-center">
                        <i class="bi bi-person-check fs-2 mb-2 opacity-75"></i>
                        <h3 class="mb-0 fw-bold"><?php echo count($pending_accounts); ?></h3>
                        <small>Akun Pending</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- AKUN PENDING -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold text-primary mb-0">
                <i class="bi bi-person-exclamation me-2"></i>Akun Pending Verifikasi
            </h4>
            <?php if (!empty($pending_accounts)): ?>
                <span class="badge bg-danger rounded-pill"><?php echo count($pending_accounts); ?> Menunggu</span>
            <?php endif; ?>
        </div>

        <?php if (!empty($pending_accounts)): ?>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">Nama Lengkap</th>
                                <th width="20%">NIK</th>
                                <th width="20%">Telepon</th>
                                <th width="15%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pending_accounts as $p): ?>
                                <tr>
                                    <td class="fw-bold text-muted"><?php echo $no++; ?></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <?php echo strtoupper(substr($p->name, 0, 1)); ?>
                                            </div>
                                            <div>
                                                <div class="fw-bold"><?php echo $p->name; ?></div>
                                                <small class="text-muted">ID: <?php echo $p->id; ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="font-monospace bg-light px-2 py-1 rounded"><?php echo $p->nik; ?></span>
                                    </td>
                                    <td>
                                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $p->phone); ?>"
                                            target="_blank"
                                            class="text-decoration-none d-flex align-items-center">
                                            <i class="bi bi-whatsapp text-success me-2 fs-5"></i>
                                            <?php echo $p->phone; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-clock me-1"></i>Pending
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- TOMBOL SETUJUI DENGAN KONFIRMASI WA -->
                                            <a href="<?php echo site_url('admin/verify_account/' . $p->id . '?action=approve'); ?>"
                                                class="btn btn-success btn-sm btn-action"
                                                onclick="return confirm('Setujui akun <?php echo $p->name; ?>?\n\nNotifikasi WhatsApp akan otomatis dikirim ke <?php echo $p->phone; ?>')"
                                                title="Setujui & Kirim WA">
                                                <i class="bi bi-check-lg me-1"></i>Setujui
                                            </a>

                                            <!-- TOMBOL TOLAK -->
                                            <a href="<?php echo site_url('admin/verify_account/' . $p->id . '?action=reject'); ?>"
                                                class="btn btn-outline-danger btn-sm btn-action"
                                                onclick="return confirm('Tolak akun <?php echo $p->name; ?>?\n\nUser akan diberitahu via WhatsApp.')"
                                                title="Tolak Akun">
                                                <i class="bi bi-x-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- INFO WHATSAPP -->
            <div class="alert alert-info mt-3 d-flex align-items-center">
                <i class="bi bi-info-circle-fill fs-4 me-3 text-primary"></i>
                <div>
                    <strong>Info:</strong> Ketika Anda klik "Setujui" atau "Tolak", sistem akan otomatis mengirim notifikasi WhatsApp ke nomor terdaftar.
                    <br>
                    <small class="text-muted">Pastikan koneksi WhatsApp API aktif.</small>
                </div>
            </div>

        <?php else: ?>
            <div class="alert alert-success border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-2 me-3 text-success"></i>
                    <div>
                        <h5 class="mb-1">Tidak ada akun pending</h5>
                        <p class="mb-0">Semua akun telah diverifikasi. Sistem berjalan lancar!</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- FOOTER -->
        <footer class="mt-5 mb-3 text-center text-muted">
            <small>
                &copy; <?php echo date('Y'); ?> SIMPEL AWET - Kelurahan Kalinyamatan Wetan
                <br>
                <span class="text-primary">Sistem Informasi Pelayanan Modern</span>
            </small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>