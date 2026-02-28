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
<!-- Navigation-->
<header class="header-modern">
    <!-- Top Bar -->
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center py-0">

            <!-- Logo & Title -->
            <div class="col-lg-8 col-md-8 d-flex align-items-center gap-8">
                <a href="<?php echo site_url('/'); ?>">
                    <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                </a>
                <div>
                    <div class="header-subtitle fw-bold">Sistem Informasi Pelayanan</div>
                    <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                </div>
            </div>



            <!-- Buttons -->
            <div class="col-lg-4 col-md-4 text-end">
                <a href="<?php echo site_url('dashboard'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Kembali
                </a>
                <a href="<?php echo site_url('auth/logout'); ?>" class="btn header-btn header-btn-register">
                    <i class="bi bi-person-plus me-1"></i>Keluar
                </a>
            </div>

        </div>
    </div>
</header>

<body>
    <div class="container mt-4">

        <!-- Form Header -->
        <div class="form-header">
            <h3><i class="bi bi-file-earmark-plus me-2"></i>Ajukan Permohonan Layanan</h3>
            <p>Silakan lengkapi formulir di bawah ini dengan data yang valid</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-card">
                    <div class="form-card-header">
                        <h4><i class="bi bi-person-vcard"></i>Formulir Pemohon</h4>
                    </div>
                    <div class="form-card-body">

                        <?php if (!empty($success)): ?>
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle-fill me-2"></i><?php echo $success; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                            <!-- Data Pribadi -->
                            <div class="section-divider">
                                <span><i class="bi bi-person me-1"></i>DATA PRIBADI</span>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        <i class="bi bi-person-fill"></i>Nama Lengkap
                                        <span class="required-badge">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nik" class="form-label">
                                        <i class="bi bi-credit-card-fill"></i>NIK
                                        <span class="required-badge">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="16 digit NIK" maxlength="16" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kk_number" class="form-label">
                                        <i class="bi bi-people-fill"></i>Nomor KK
                                        <span class="required-badge">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="kk_number" name="kk_number" placeholder="16 digit Nomor KK" maxlength="16" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">
                                        <i class="bi bi-telephone-fill"></i>Nomor Telepon
                                        <span class="required-badge">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="08xxxxxxxxxx" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label">
                                        <i class="bi bi-calendar-fill"></i>Tanggal Lahir
                                        <span class="required-badge">*</span>
                                    </label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="service_type" class="form-label">
                                        <i class="bi bi-grid-fill"></i>Jenis Layanan
                                        <span class="required-badge">*</span>
                                    </label>
                                    <select class="form-select" id="service_type" name="service_type" required>
                                        <option value="" disabled selected>Pilih jenis layanan...</option>
                                        <?php foreach ($types as $t): ?>
                                            <option value="<?php echo $t->service_code; ?>" <?php echo ($t->service_code == $jenis_layanan) ? 'selected' : ''; ?>>
                                                <?php echo $t->service_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">
                                    <i class="bi bi-geo-alt-fill"></i>Alamat Lengkap
                                    <span class="required-badge">*</span>
                                </label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap sesuai KTP" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="additional_notes" class="form-label">
                                    <i class="bi bi-chat-left-text-fill"></i>Tujuan Permohonan
                                </label>
                                <textarea class="form-control" id="additional_notes" name="additional_notes" rows="2" placeholder="Contoh: Untuk pengajuan beasiswa, pengaktifan BPJS PBI, dll"></textarea>
                            </div>

                            <!-- Upload Dokumen -->
                            <div class="section-divider">
                                <span><i class="bi bi-cloud-upload me-1"></i>UPLOAD DOKUMEN</span>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-file-earmark-text-fill"></i>Surat Pengantar RT/RW
                                        <span class="required-badge">*</span>
                                    </label>
                                    <div class="file-upload-wrapper">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <span class="file-label">Klik atau drag file</span>
                                        <span class="file-types">PDF, JPG, PNG</span>
                                        <input type="file" id="upload_suratrtrw" name="upload_suratrtrw" accept=".pdf,.jpg,.jpeg,.png" required onchange="showFileName(this, 'label-rtrw')">
                                    </div>
                                    <small id="label-rtrw" class="text-muted d-block mt-2"></small>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-people-fill"></i>Kartu Keluarga
                                        <span class="required-badge">*</span>
                                    </label>
                                    <div class="file-upload-wrapper">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <span class="file-label">Klik atau drag file</span>
                                        <span class="file-types">PDF, JPG, PNG</span>
                                        <input type="file" id="upload_kk" name="upload_kk" accept=".pdf,.jpg,.jpeg,.png" required onchange="showFileName(this, 'label-kk')">
                                    </div>
                                    <small id="label-kk" class="text-muted d-block mt-2"></small>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-person-vcard-fill"></i>KTP
                                        <span class="required-badge">*</span>
                                    </label>
                                    <div class="file-upload-wrapper">
                                        <i class="bi bi-cloud-arrow-up"></i>
                                        <span class="file-label">Klik atau drag file</span>
                                        <span class="file-types">PDF, JPG, PNG</span>
                                        <input type="file" id="upload_ktp" name="upload_ktp" accept=".pdf,.jpg,.jpeg,.png" required onchange="showFileName(this, 'label-ktp')">
                                    </div>
                                    <small id="label-ktp" class="text-muted d-block mt-2"></small>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-back">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-send-fill me-2"></i>Ajukan Permohonan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Show selected filename
        function showFileName(input, labelId) {
            const label = document.getElementById(labelId);
            if (input.files && input.files[0]) {
                label.textContent = '✓ ' + input.files[0].name;
                label.classList.add('text-success');
            }
        }
    </script>
</body>

</html>