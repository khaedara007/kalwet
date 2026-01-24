<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
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
        <h1>Laporan</h1>
        <div class="alert alert-warning">
            Laporan belum diimplementasikan. Fitur ekspor akan ditambahkan nanti.
        </div>
        <a href="<?php echo site_url('admin'); ?>" class="btn btn-primary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
