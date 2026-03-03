<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Rating - Admin</title>
    <!-- Admin CSS -->
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-shield-check me-2"></i>Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">
                    <i class="bi bi-clipboard-check me-1"></i>Permohonan
                </a>
                <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">
                    <i class="bi bi-people me-1"></i>Pengguna
                </a>
                <a class="nav-link active" href="<?php echo site_url('admin/ratings'); ?>">
                    <i class="bi bi-star-fill me-1"></i>Rating
                </a>
                <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">
                    <i class="bi bi-box-arrow-right me-1"></i>Keluar
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <!-- FLASH MESSAGES -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-0"><i class="bi bi-star-fill text-warning me-3"></i>Kelola Rating</h2>
                <p class="text-muted mb-0 mt-2">Pantau dan kelola penilaian layanan dari masyarakat</p>
            </div>
            <a href="<?php echo site_url('admin/reset_all_ratings'); ?>"
                class="btn btn-danger"
                onclick="return confirm('PERINGATAN: Semua rating akan dihapus permanen!\n\nYakin ingin reset semua rating?')">
                <i class="bi bi-trash-fill me-2"></i>Reset Semua
            </a>
        </div>

        <!-- STATISTIK -->
        <div class="row mb-4 g-4">
            <div class="col-md-4">
                <div class="card stat-card bg-warning text-dark h-100">
                    <i class="bi bi-star-fill stat-icon"></i>
                    <div class="card-body text-center position-relative">
                        <div class="stat-number"><?php echo number_format($stats['average'], 1); ?></div>
                        <p class="mb-3 fw-semibold">Rata-rata Rating</p>
                        <div class="stars-display">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="bi bi-star-fill <?php echo $i <= round($stats['average']) ? '' : 'text-white-50'; ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-info text-white h-100">
                    <i class="bi bi-chat-square-text stat-icon"></i>
                    <div class="card-body text-center position-relative">
                        <div class="stat-number"><?php echo $stats['total']; ?></div>
                        <p class="mb-3 fw-semibold">Total Review</p>
                        <i class="bi bi-people-fill fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-success text-white h-100">
                    <i class="bi bi-bar-chart-line stat-icon"></i>
                    <div class="card-body position-relative">
                        <h6 class="mb-3 fw-bold"><i class="bi bi-pie-chart me-2"></i>Distribusi Rating</h6>
                        <?php for ($i = 5; $i >= 1; $i--):
                            $persen = ($stats['total'] > 0) ? ($stats['distribusi'][$i] / $stats['total']) * 100 : 0;
                        ?>
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2 fw-bold" style="width: 35px;"><?php echo $i; ?> <i class="bi bi-star-fill small"></i></span>
                                <div class="flex-grow-1 progress" style="height: 12px;">
                                    <div class="progress-bar" style="width: <?php echo $persen; ?>%"></div>
                                </div>
                                <span class="ms-2 fw-bold" style="width: 30px;"><?php echo $stats['distribusi'][$i]; ?></span>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABEL RATING -->
        <div class="card rating-table">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-list-stars me-2"></i>Daftar Rating & Ulasan</h5>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($ratings)): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pengguna</th>
                                    <th>Rating</th>
                                    <th>Komentar</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ratings as $r): ?>
                                    <tr>
                                        <td><span class="badge bg-secondary">#<?php echo $r->id; ?></span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar">
                                                    <?php echo strtoupper(substr($r->nama, 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <strong><?php echo $r->nama; ?></strong>
                                                    <br><small class="text-muted"><?php echo $r->email ?? 'No email'; ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="stars-display mb-1">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <i class="bi bi-star-fill <?php echo $i <= $r->rating ? 'text-warning' : 'text-secondary'; ?>"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <span class="rating-badge"><?php echo $r->rating; ?>/5</span>
                                        </td>
                                        <td style="max-width: 300px;">
                                            <?php echo $r->komentar ? nl2br($r->komentar) : '<em class="text-muted"><i class="bi bi-dash-circle me-1"></i>Tidak ada komentar</em>'; ?>
                                        </td>
                                        <td>
                                            <i class="bi bi-clock text-muted me-1"></i>
                                            <?php echo date('d M Y', strtotime($r->created_at)); ?>
                                            <br><small class="text-muted"><?php echo date('H:i', strtotime($r->created_at)); ?> WIB</small>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('admin/delete_rating/' . $r->id); ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin hapus rating ini?')"
                                                title="Hapus Rating">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state text-center">
                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                        <h4 class="text-primary fw-bold">Belum Ada Rating</h4>
                        <p class="text-muted mb-0">Rating dari masyarakat akan muncul di sini</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="mt-4 mb-5">
            <a href="<?php echo site_url('admin'); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>