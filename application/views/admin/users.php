<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo site_url('admin'); ?>">Dashboard</a>
                <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">Permohonan Layanan</a>
                <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Kelola Pengguna</h1>
        <?php if (!empty($users)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Telepon</th>
                            <th>Peran</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $u): ?>
                            <tr>
                                <td><?php echo $u->id; ?></td>
                                <td><?php echo $u->name; ?></td>
                                <td><?php echo $u->nik; ?></td>
                                <td><?php echo $u->phone; ?></td>
                                <td><?php echo $u->role; ?></td>
                                <td><?php echo $u->status; ?></td>
                                <td><?php echo $u->created_at; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Tidak ada pengguna ditemukan.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>