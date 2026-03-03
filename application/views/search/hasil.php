<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - SIMPEL AWET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Tombol Kembali -->
                <a href="<?php echo site_url('/'); ?>" class="btn btn-outline-primary mb-4">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
                </a>

                <h3 class="fw-bold mb-4">
                    <i class="bi bi-search me-2"></i>
                    Hasil Pencarian: "<?php echo htmlspecialchars($keyword); ?>"
                </h3>

                <?php if (empty($hasil)): ?>
                    <!-- Tidak ada hasil -->
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Tidak ditemukan layanan dengan kata kunci "<strong><?php echo htmlspecialchars($keyword); ?></strong>"
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6 class="fw-bold">Layanan yang tersedia:</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Surat Keterangan Tidak Mampu</li>
                                <li class="list-group-item">Surat Keterangan Domisili</li>
                                <li class="list-group-item">Surat Keterangan Penghasilan Orang Tua</li>
                                <li class="list-group-item">Surat Keterangan Belum Menikah</li>
                                <li class="list-group-item">Surat Keterangan Belum Memiliki Rumah</li>
                                <li class="list-group-item">Surat Izin Hajatan</li>
                                <li class="list-group-item">Surat Pengantar SKCK</li>
                                <li class="list-group-item">Surat Keterangan Satu Nama</li>
                                <li class="list-group-item">Surat Pengantar Kehilangan Dokumen</li>
                                <li class="list-group-item">Surat Keterangan Kematian (Offline)</li>
                                <li class="list-group-item">Surat Keterangan Kelahiran (Offline)</li>
                                <li class="list-group-item">Surat Kesaksian Kematian (Offline)</li>
                                <li class="list-group-item">Surat Kesaksian Kelahiran (Offline)</li>
                            </ul>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Ada hasil -->
                    <div class="row g-3">
                        <?php foreach ($hasil as $row): ?>
                            <div class="col-12">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="card-title fw-bold"><?php echo $row['nama_layanan']; ?></h5>
                                                <p class="card-text text-muted"><?php echo $row['deskripsi']; ?></p>

                                                <small class="text-muted">
                                                    <strong>Persyaratan:</strong>
                                                    <?php
                                                    // Fix typo 'persyarpsi' menjadi 'persyaratan'
                                                    $syarat = isset($row['persyaratan']) ? $row['persyaratan'] : $row['persyarpsi'];
                                                    echo $syarat;
                                                    ?>
                                                </small>
                                            </div>
                                            <a href="<?php echo site_url($row['link']); ?>" class="btn btn-primary">
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</body>

</html>