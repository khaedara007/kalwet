<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SIMPEL AWET (Sistem Informasi Pelayanan Kelurahan Kalinyamat Wetan)</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('service/pilih_service'); ?>">Ajukan Permohonan</a>
                <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Permohonan Layanan Saya</h1>
        <?php if (!empty($requests)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
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
                                <td><?php echo $r->id; ?></td>
                                <td><?php echo $r->service_name; ?></td>
                                <td><?php echo $r->status; ?></td>
                                <td><?php echo $r->submitted_at; ?></td>
                                <td>
                                    <?php if ($r->status === 'completed' && $r->completed_document): ?>
                                        <a href="<?php echo base_url('assets/uploads/completed/' . $r->completed_document); ?>" target="_blank" class="btn btn-success btn-sm">Unduh</a>
                                    <?php elseif ($r->status === 'needs_revision'): ?>
                                        <span class="text-danger"><?php echo $r->revision_notes; ?></span>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Belum ada permohonan.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>