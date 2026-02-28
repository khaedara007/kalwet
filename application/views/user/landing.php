<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <!-- Custom CSS SIMPEL AWET -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <a href="<?php echo site_url('service/pilih_service'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Ajukan Permohonan
                </a>
                <a href="<?php echo site_url('auth/logout'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-person-plus me-1"></i>Keluar
                </a>
            </div>

        </div>
    </div>

</header>

<body>
    <div class="container mt-4 mb-5">

        <!-- Header -->
        <div class="page-header">
            <h2 class="page-title"><i class="bi bi-folder-check me-2"></i>Permohonan Layanan Saya</h2>
            <p class="page-subtitle">Kelola dan pantau status permohonan administrasi Anda</p>
        </div>

        <?php if (!empty($requests)): ?>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon pending"><i class="bi bi-hourglass-split"></i></div>
                        <div class="stat-number">
                            <?php
                            $count = 0;
                            foreach ($requests as $r) if ($r->status === 'under_review') $count++;
                            echo $count;
                            ?>
                        </div>
                        <div class="stat-label">Menunggu</div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon process"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="stat-number">
                            <?php
                            $count = 0;
                            foreach ($requests as $r) if ($r->status === 'in_process') $count++;
                            echo $count;
                            ?>
                        </div>
                        <div class="stat-label">Diproses</div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon completed"><i class="bi bi-check-circle"></i></div>
                        <div class="stat-number">
                            <?php
                            $count = 0;
                            foreach ($requests as $r) if ($r->status === 'completed') $count++;
                            echo $count;
                            ?>
                        </div>
                        <div class="stat-label">Selesai</div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon revision"><i class="bi bi-exclamation-triangle"></i></div>
                        <div class="stat-number">
                            <?php
                            $count = 0;
                            foreach ($requests as $r) if ($r->status === 'needs_revision') $count++;
                            echo $count;
                            ?>
                        </div>
                        <div class="stat-label">Perlu Revisi</div>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="table-card">
                <div class="table-card-header">
                    <h5 class="table-card-title"><i class="bi bi-list-ul me-2"></i>Daftar Permohonan</h5>
                    <a href="<?php echo site_url('service/pilih_service'); ?>" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>Buat Baru
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Layanan</th>
                                <th>Status</th>
                                <th>Diajukan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $r): ?>
                                <tr>
                                    <td>
                                        <span class="id-badge">#<?php echo str_pad($r->id, 4, '0', STR_PAD_LEFT); ?></span>
                                    </td>
                                    <td>
                                        <span class="service-name"><?php echo $r->service_name; ?></span>
                                        <span class="service-code"><?php echo isset($r->service_code) ? $r->service_code : 'LAY-' . $r->id; ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        if ($r->status === 'under_review') {
                                            $statusClass = 'status-pending';
                                            $statusLabel = 'Menunggu';
                                        } elseif ($r->status === 'in_process') {
                                            $statusClass = 'status-process';
                                            $statusLabel = 'Diproses';
                                        } elseif ($r->status === 'completed') {
                                            $statusClass = 'status-completed';
                                            $statusLabel = 'Selesai';
                                        } elseif ($r->status === 'needs_revision') {
                                            $statusClass = 'status-revision';
                                            $statusLabel = 'Perlu Revisi';
                                        } else {
                                            $statusClass = 'status-pending';
                                            $statusLabel = $r->status;
                                        }
                                        ?>
                                        <span class="status-badge <?php echo $statusClass; ?>">
                                            <?php echo $statusLabel; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="date-submitted">
                                            <i class="bi bi-calendar3"></i>
                                            <?php echo date('d M Y', strtotime($r->submitted_at)); ?>
                                            <small class="d-block text-muted">
                                                <?php echo date('H:i', strtotime($r->submitted_at)); ?> WIB
                                            </small>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($r->status === 'completed' && $r->completed_document): ?>
                                            <a href="<?php echo base_url('assets/uploads/completed/' . $r->completed_document); ?>"
                                                target="_blank" class="btn-action btn-download">
                                                <i class="bi bi-download"></i>Unduh
                                            </a>
                                        <?php elseif ($r->status === 'needs_revision'): ?>
                                            <a href="<?php echo site_url('service/revise/' . $r->id); ?>" class="btn-action btn-revise">
                                                <i class="bi bi-pencil-square"></i>Perbaiki
                                            </a>
                                            <div class="revision-note mt-2">
                                                <i class="bi bi-exclamation-circle me-1"></i>
                                                <?php echo $r->revision_notes; ?>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-muted"><i class="bi bi-clock me-1"></i>Proses...</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php else: ?>

            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-inbox"></i>
                </div>
                <h4 class="empty-title">Belum Ada Permohonan</h4>
                <p class="empty-text">Anda belum mengajukan layanan administrasi apapun.<br>Silakan buat permohonan pertama Anda sekarang.</p>
                <a href="<?php echo site_url('services'); ?>" class="btn-new-request">
                    <i class="bi bi-plus-lg"></i>Ajukan Permohonan Baru
                </a>
            </div>

        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>