<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Profil Saya</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Nama:</strong> <?php echo $user->name; ?></p>
                        <p><strong>NIK:</strong> <?php echo $user->nik; ?></p>
                        <p><strong>Telepon:</strong> <?php echo $user->phone; ?></p>
                        <p><strong>Status:</strong> <?php echo $user->status; ?></p>
                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>