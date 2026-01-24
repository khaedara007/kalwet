<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">Permohonan Layanan</a>
                <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">Pengguna</a>
                <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Dashboard Admin</h1>
        <div class="mb-3">
            <a href="<?php echo site_url('admin/requests'); ?>" class="btn btn-primary me-2">Permohonan Layanan</a>
            <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-secondary">Pengguna</a>
        </div>
        <h2>Akun Pending</h2>
        <?php if (!empty($pending_accounts)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pending_accounts as $p): ?>
                            <tr>
                                <td><?php echo $p->id; ?></td>
                                <td><?php echo $p->name; ?></td>
                                <td><?php echo $p->nik; ?></td>
                                <td><?php echo $p->phone; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/verify_account/'.$p->id.'?action=approve'); ?>" class="btn btn-success btn-sm">Setujui</a>
                                    <a href="<?php echo site_url('admin/verify_account/'.$p->id.'?action=reject'); ?>" class="btn btn-danger btn-sm ms-1">Tolak</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Tidak ada akun pending.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
