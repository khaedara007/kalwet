<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revisi Permohonan - SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-4">

        <!-- Page Header -->
        <div class="page-header animate-in">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="mb-2"><i class="bi bi-arrow-clockwise me-2"></i>Revisi Permohonan</h4>
                    <p class="mb-0 opacity-75">Perbaiki data dan dokumen untuk permohonan #<?php echo $request->id; ?></p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <span class="status-badge status-revision">
                        <i class="bi bi-exclamation-triangle-fill"></i> Perlu Revisi
                    </span>
                </div>
            </div>
        </div>

        <!-- Revision Alert -->
        <div class="revision-alert animate-in">
            <h5><i class="bi bi-exclamation-circle-fill me-2"></i>Alasan Penolakan</h5>
            <p class="mb-1 fw-bold text-dark"><?php echo $request->rejection_reason; ?></p>
            <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Silakan perbaiki data dan unggah ulang dokumen yang diperlukan.</small>
        </div>

        <!-- Main Card -->
        <div class="card main-card animate-in">
            <div class="card-header card-header-custom">
                <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Form Revisi Data</h5>
            </div>
            <div class="card-body p-4">

                <form method="post" action="<?php echo site_url('service/revise/' . $request->id); ?>" enctype="multipart/form-data" id="revisionForm">
                    <input type="hidden"
                        name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>">
                    <!-- DATA PRIBADI -->
                    <h6 class="section-title"><i class="bi bi-person me-2"></i>Data Pribadi</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control form-control-custom" name="name" value="<?php echo $request->name; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">NIK <span class="text-muted">(16 digit)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                <input type="text" class="form-control form-control-custom" name="nik" value="<?php echo $request->nik; ?>" maxlength="16" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">Nomor KK</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                                <input type="text" class="form-control form-control-custom" name="kk_number" value="<?php echo $request->kk_number; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">No. HP <span class="text-muted">(WhatsApp)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                <input type="text" class="form-control form-control-custom" name="phone" value="<?php echo $request->phone; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">Tanggal Lahir</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" class="form-control form-control-custom" name="date_of_birth" value="<?php echo $request->date_of_birth; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label form-label-custom">Jenis Layanan</label>
                            <div class="service-badge">
                                <i class="bi bi-tag-fill me-1"></i><?php echo $request->service_name_display; ?>
                            </div>
                            <small class="d-block text-muted mt-2"><i class="bi bi-lock-fill me-1"></i>Jenis layanan tidak dapat diubah</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label form-label-custom">Alamat Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <textarea class="form-control form-control-custom" name="address" rows="3" required><?php echo $request->address; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label form-label-custom">Keperluan / Keterangan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-chat-square-text"></i></span>
                            <textarea class="form-control form-control-custom" name="additional_notes" rows="3"><?php echo $request->additional_notes; ?></textarea>
                        </div>
                    </div>

                    <hr class="my-4" style="border-top: 2px dashed #e0e0e0; opacity: 0.5;">

                    <!-- DOKUMEN -->
                    <h6 class="section-title"><i class="bi bi-folder me-2"></i>Dokumen Lampiran</h6>

                    <?php
                    $documents = array(
                        'upload_suratrtrw' => ['label' => 'Surat Pengantar RT/RW', 'icon' => 'bi-envelope-paper'],
                        'upload_kk' => ['label' => 'Kartu Keluarga (KK)', 'icon' => 'bi-people-fill'],
                        'upload_ktp' => ['label' => 'KTP', 'icon' => 'bi-person-vcard'],
                        'upload_aktal' => ['label' => 'Akta Kelahiran', 'icon' => 'bi-baby'],
                        'upload_aktan' => ['label' => 'Akta Nikah', 'icon' => 'bi-heart-fill'],
                        'upload_identitaslain' => ['label' => 'Identitas Lain', 'icon' => 'bi-person-badge'],
                        'upload_ktpp' => ['label' => 'KTP Pelapor', 'icon' => 'bi-person-check'],
                        'upload_ktps1' => ['label' => 'KTP Saksi 1', 'icon' => 'bi-person-check-fill'],
                        'upload_ktps2' => ['label' => 'KTP Saksi 2', 'icon' => 'bi-person-check-fill'],
                        'upload_suketdok' => ['label' => 'Surat Keterangan Dokter', 'icon' => 'bi-file-medical']
                    );

                    $hasAnyDoc = false;

                    foreach ($documents as $field => $data):
                        $current = $request->$field;
                        $label = $data['label'];
                        $icon = $data['icon'];

                        if (!empty($current)):
                            $hasAnyDoc = true;
                    ?>
                            <div class="doc-item">
                                <label class="form-label fw-bold mb-3">
                                    <i class="bi <?php echo $icon; ?> me-2 text-warning"></i><?php echo $label; ?>
                                </label>

                                <div class="current-file">
                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                    <div class="flex-grow-1">
                                        <small class="text-muted d-block">File saat ini:</small>
                                        <a href="<?php echo base_url('assets/uploads/documents/' . $current); ?>" target="_blank" class="text-break">
                                            <i class="bi bi-box-arrow-up-right me-1"></i><?php echo $current; ?>
                                        </a>
                                    </div>
                                </div>

                                <small class="text-muted d-block mb-2"><i class="bi bi-arrow-repeat me-1"></i>Upload file baru untuk mengganti</small>

                                <div class="file-input-wrapper">
                                    <input type="file" id="<?php echo $field; ?>" name="<?php echo $field; ?>" accept=".pdf,.jpg,.jpeg,.png" onchange="updateFileName(this)">
                                    <label for="<?php echo $field; ?>" class="file-input-label">
                                        <i class="bi bi-cloud-arrow-up fs-4"></i>
                                        <span class="file-text">Klik untuk pilih file baru...</span>
                                    </label>
                                </div>
                                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Format: PDF/JPG/PNG, Maks 2MB</small>
                            </div>
                        <?php
                        endif;
                    endforeach;

                    if (!$hasAnyDoc):
                        ?>
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <h6 class="text-muted">Belum Ada Dokumen</h6>
                            <p class="small mb-0">Tidak ada dokumen yang diupload sebelumnya.</p>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-3 mt-4 pt-3">
                        <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-custom-secondary flex-fill">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-custom-primary flex-fill" id="submitBtn">
                            <i class="bi bi-send-fill me-2"></i>Kirim Revisi
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Branding -->
        <div class="footer-brand">
            <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-shield-check fs-4 text-warning"></i>
                <span>SIMPEL AWET - Kelurahan Kalinyamat Wetan</span>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update file name when selected
        function updateFileName(input) {
            const wrapper = input.closest('.file-input-wrapper');
            const textSpan = wrapper.querySelector('.file-text');
            const label = wrapper.querySelector('.file-input-label');

            if (input.files && input.files[0]) {
                textSpan.textContent = input.files[0].name;
                label.style.background = '#e8f5e9';
                label.style.borderColor = '#4caf50';
                label.style.color = '#2e7d32';
                label.innerHTML = '<i class="bi bi-check-circle-fill fs-4"></i><span>' + input.files[0].name + '</span>';
            }
        }

        // Show loading state on submit
        function showLoading(btn) {
            const form = document.getElementById('revisionForm');
            if (form.checkValidity()) {
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mengirim...';
                btn.disabled = true;
            }
        }

        // Add animation to elements on load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.doc-item');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>

</html>