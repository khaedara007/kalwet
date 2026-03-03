<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Management - SIMPEL AWET</title>
    <!-- Admin CSS -->
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-shield-check me-2"></i>Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('admin'); ?>">Dashboard</a>
                <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">Permohonan Layanan</a>
                <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary"><i class="bi bi-people-fill me-2"></i>Kelola Pengguna</h2>
            <a href="<?php echo site_url('admin'); ?>" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (!empty($users)): ?>
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">NIK</th>
                                    <th width="15%">Telepon</th>
                                    <th width="10%">Peran</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Dibuat</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($users as $u): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                                    style="width: 35px; height: 35px; font-weight: bold;">
                                                    <?php echo strtoupper(substr($u->name, 0, 1)); ?>
                                                </div>
                                                <div class="fw-bold"><?php echo $u->name; ?></div>
                                            </div>
                                        </td>
                                        <td><span class="font-monospace"><?php echo $u->nik; ?></span></td>
                                        <td>
                                            <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $u->phone); ?>"
                                                target="_blank" class="text-decoration-none">
                                                <i class="bi bi-whatsapp text-success me-1"></i><?php echo $u->phone; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($u->role == 'admin'): ?>
                                                <span class="badge bg-danger">Admin</span>
                                            <?php else: ?>
                                                <span class="badge bg-info">User</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status_class = [
                                                'active' => 'bg-success',
                                                'pending' => 'bg-warning text-dark',
                                                'rejected' => 'bg-danger'
                                            ];
                                            $status_label = [
                                                'active' => 'Aktif',
                                                'pending' => 'Pending',
                                                'rejected' => 'Ditolak'
                                            ];
                                            $class = isset($status_class[$u->status]) ? $status_class[$u->status] : 'bg-secondary';
                                            $label = isset($status_label[$u->status]) ? $status_label[$u->status] : $u->status;
                                            ?>
                                            <span class="badge <?php echo $class; ?> status-badge">
                                                <?php echo $label; ?>
                                            </span>
                                        </td>
                                        <td><?php echo date('d M Y', strtotime($u->created_at)); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- TOMBOL HAPUS -->
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btn-action"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?php echo $u->id; ?>"
                                                    title="Hapus User">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>

                                            <!-- MODAL KONFIRMASI HAPUS -->
                                            <div class="modal fade" id="deleteModal<?php echo $u->id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title">
                                                                <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus akun ini?</p>
                                                            <div class="alert alert-light border">
                                                                <strong>Nama:</strong> <?php echo $u->name; ?><br>
                                                                <strong>NIK:</strong> <?php echo $u->nik; ?><br>
                                                                <strong>No. HP:</strong> <?php echo $u->phone; ?>
                                                            </div>
                                                            <p class="text-danger mb-0">
                                                                <i class="bi bi-info-circle me-1"></i>
                                                                Tindakan ini tidak dapat dibatalkan!
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="<?php echo site_url('admin/delete_user/' . $u->id); ?>"
                                                                class="btn btn-danger">
                                                                <i class="bi bi-trash me-2"></i>Ya, Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info d-flex align-items-center">
                <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                <div>Belum ada pengguna terdaftar dalam sistem.</div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>