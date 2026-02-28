<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submit Service Request</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (WAJIB ADA) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajukan Permohonan Layanan</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($success)) echo '<div class="alert alert-success">' . $success . '</div>'; ?>
                        <?php if (validation_errors()) echo '<div class="alert alert-danger">' . validation_errors() . '</div>'; ?>
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kk_number" class="form-label">Nomor KK</label>
                                    <input type="text" class="form-control" id="kk_number" name="kk_number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="service_type" class="form-label">Jenis Layanan</label>
                                    <select class="form-select" id="service_type" name="service_type" required>
                                        <?php foreach ($types as $t): ?>
                                            <option value="<?php echo $t->service_code; ?>" <?= ($t->service_code == $jenis_layanan) ? 'selected' : '' ?>><?php echo $t->service_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="additional_notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="additional_notes" name="additional_notes" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="upload_suratrtrw" class="form-label">Surat Pengantar RT dan RW (pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_suratrtrw" name="upload_suratrtrw" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_kk" class="form-label">Kartu Keluarga Yang Meninggal(pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_kk" name="upload_kk" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_ktp" class="form-label">KTP Yang Meninggal (pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_ktp" name="upload_ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_ktpp" class="form-label">KTP Pelapor(pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_ktpp" name="upload_ktpp" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_ktps1" class="form-label">KTP Saksi 1 (pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_ktps1" name="upload_ktps1" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_ktps2" class="form-label">KTP Saksi 2 (pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_ktps2" name="upload_ktps2" required>
                            </div>
                            <div class="mb-3">
                                <label for="upload_suketdok" class="form-label">Surat Keterangan Dokter (Jika Meninggal di Rumah Sakit) (pdf/jpg/png)</label>
                                <input type="file" class="form-control" id="upload_suketdok" name="upload_suketdok" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                            <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-secondary ms-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>