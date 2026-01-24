<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelurahan - Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">SIMPEL AWET (Sistem Informasi Pelayanan Kelurahan Kalinyamat Wetan)</a>
            <div class="navbar-nav ms-auto">
                <?php if (!empty($user)): ?>
                    <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
                    <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">Keluar</a>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo site_url('login'); ?>">Masuk</a>
                    <a class="nav-link" href="<?php echo site_url('register'); ?>">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Selamat datang di layanan online Kelurahan</h2>
                        <p class="card-text">Gunakan layanan ini untuk mengajukan permohonan administrasi masyarakat secara online. Pilih menu di bawah untuk memulai.</p>
                        <div>
                            <?php if (!empty($user)): ?>
                                <a class="btn btn-primary me-2" href="<?php echo site_url('service/submit'); ?>">Ajukan Permohonan Layanan</a>
                                <a class="btn btn-secondary" href="<?php echo site_url('dashboard'); ?>">Permohonan Saya</a>
                            <?php else: ?>
                                <a class="btn btn-primary me-2" href="<?php echo site_url('register'); ?>">Daftar</a>
                                <a class="btn btn-outline-primary" href="<?php echo site_url('login'); ?>">Masuk</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil Kelurahan</h5>
                        <p><strong>Alamat:</strong> [Masukkan alamat kelurahan]</p>
                        <p><strong>Jam layanan:</strong> Senin - Jumat, 08:00 - 15:00</p>
                        <p><strong>Kontak:</strong> [Nomor telepon kantor]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-muted py-3 mt-4">
        &copy; <?php echo date('Y'); ?> Kelurahan Service
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
