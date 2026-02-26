<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('admin'); ?>">Dashboard</a>
                <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">Pengguna</a>
                <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Permohonan Layanan</h1>
        <?php if (!empty($requests)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pengguna</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Diajukan</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $r): ?>
                            <tr>
                                <td><?php echo $r->id; ?></td>
                                <td><?php echo $r->name; ?></td>
                                <td><?php echo $r->service_type; ?></td>
                                <td><?php echo $r->status; ?></td>
                                <td><?php echo $r->submitted_at; ?></td>
                                <td>
                                    <?php
                                    if (in_array($r->service_type, ['sktm', 'skd', 'skpo', 'skbm', 'skbr', 'sih'])) {
                                    ?>
                                        <?php if ($r->upload_suratrtrw): ?>
                                            <a href="<?php echo base_url('assets/uploads/documents/' . $r->upload_suratrtrw); ?>" target="_blank" class="btn btn-sm btn-info">Surat Pengantar</a>
                                        <?php endif; ?>
                                        <?php if ($r->upload_kk): ?>
                                            <a href="<?php echo base_url('assets/uploads/documents/' . $r->upload_kk); ?>" target="_blank" class="btn btn-sm btn-info ms-1">KK</a>
                                        <?php endif; ?>
                                        <?php if ($r->upload_ktp): ?>
                                            <a href="<?php echo base_url('assets/uploads/documents/' . $r->upload_ktp); ?>" target="_blank" class="btn btn-sm btn-info ms-1">KTP</a>
                                        <?php endif; ?>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($r->status === 'under_review'): ?>
                                        <a href="<?php echo site_url('admin/approve_request/' . $r->id); ?>" class="btn btn-success btn-sm">Setujui</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo $r->id; ?>">Tolak</button>
                                    <?php elseif ($r->status === 'in_process'): ?>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal<?php echo $r->id; ?>">Unggah Selesai</button>
                                    <?php else: ?>
                                        <?php echo ucfirst(str_replace('_', ' ', $r->status)); ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <!-- Reject Modal -->
                            <div class="modal fade" id="rejectModal<?php echo $r->id; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tolak Permohonan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="post" action="<?php echo site_url('admin/reject_request/' . $r->id); ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="reason<?php echo $r->id; ?>" class="form-label">Alasan penolakan</label>
                                                    <textarea class="form-control" id="reason<?php echo $r->id; ?>" name="reason" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload Modal -->
                            <div class="modal fade" id="uploadModal<?php echo $r->id; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Unggah Dokumen Selesai</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="post" action="<?php echo site_url('admin/upload_completed/' . $r->id); ?>" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                <div class="mb-3">
                                                    <label for="completed_document<?php echo $r->id; ?>" class="form-label">Pilih file PDF</label>
                                                    <input type="file" class="form-control" id="completed_document<?php echo $r->id; ?>" name="completed_document" accept=".pdf" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Unggah & Selesai</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Tidak ada permohonan ditemukan.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>