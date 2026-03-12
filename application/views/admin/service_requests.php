<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permohonan Layanan - Admin SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Admin CSS -->
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex" href="<?php echo site_url('admin'); ?>">
                <i class="bi bi-shield-check me-2"></i>
                Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="<?php echo site_url('admin'); ?>">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                    <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">
                        <i class="bi bi-people me-1"></i>Pengguna
                    </a>
                    <a class="nav-link active" href="<?php echo site_url('admin/requests'); ?>">
                        <i class="bi bi-folder-check me-1"></i>Permohonan
                    </a>
                    <a class="nav-link text-danger bg-danger bg-opacity-10 rounded ms-2" href="<?php echo site_url('admin/logout'); ?>">
                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4 animate-fade-in">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('success'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('error'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold text-primary mb-2">
                        <i class="bi bi-inbox-fill me-2"></i>Permohonan Layanan
                    </h2>
                    <p class="text-muted mb-0">Kelola dan proses permohonan masyarakat</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <div class="stats-summary justify-content-md-end">
                        <?php
                        // PERBAIKAN: Gunakan anonymous function biasa, bukan arrow function
                        $waiting_count = 0;
                        $process_count = 0;
                        $completed_count = 0;

                        foreach ($requests as $req) {
                            if ($req->status === 'under_review') $waiting_count++;
                            elseif ($req->status === 'in_process') $process_count++;
                            elseif ($req->status === 'completed') $completed_count++;
                        }
                        ?>
                        <div class="stat-item">
                            <div class="stat-icon bg-warning text-dark">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div>
                                <div class="fw-bold"><?php echo $waiting_count; ?></div>
                                <small class="text-muted">Menunggu</small>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon bg-primary text-white">
                                <i class="bi bi-hourglass-split"></i>
                            </div>
                            <div>
                                <div class="fw-bold"><?php echo $process_count; ?></div>
                                <small class="text-muted">Diproses</small>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon bg-success text-white">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div>
                                <div class="fw-bold"><?php echo $completed_count; ?></div>
                                <small class="text-muted">Selesai</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 text-center">
            <button class="filter-btn active me-2" onclick="filterRequests('all')">
                <i class="bi bi-grid-fill me-2"></i>Semua
            </button>
            <button class="filter-btn me-2" onclick="filterRequests('under_review')">
                <i class="bi bi-clock me-2"></i>Menunggu
            </button>
            <button class="filter-btn me-2" onclick="filterRequests('in_process')">
                <i class="bi bi-hourglass-split me-2"></i>Diproses
            </button>
            <button class="filter-btn me-2" onclick="filterRequests('completed')">
                <i class="bi bi-check-circle me-2"></i>Selesai
            </button>
            <button class="filter-btn" onclick="filterRequests('needs_revision')">
                <i class="bi bi-arrow-counterclockwise me-2"></i>Revisi
            </button>
        </div>

        <?php if (!empty($requests)): ?>
            <div class="row">
                <?php foreach ($requests as $r):
                    $status_class = 'status-' . $r->status;

                    $service_icons = array(
                        'sktm' => 'bi-file-earmark-text',
                        'skd' => 'bi-file-earmark-text',
                        'skpo' => 'bi-file-earmark-text',
                        'skbm' => 'bi-file-earmark-text',
                        'skbr' => 'bi-file-earmark-text',
                        'sih' => 'bi-file-earmark-text',
                        'skck' => 'bi-file-earmark-text',
                        'spkd' => 'bi-file-earmark-text',
                        'sksn' => 'bi-file-earmark-text',
                        'skm' => 'bi-file-earmark-text',
                        'skl' => 'bi-file-earmark-text'
                    );

                    $service_names = array(
                        'sktm' => 'Surat Keterangan Tidak Mampu',
                        'skd' => 'Surat Keterangan Domisili',
                        'sksn' => 'Surat Keterangan Satu Nama',
                        'skpo' => 'Surat Keterangan Penghasilan Orang Tua',
                        'skbm' => 'Surat Keterangan Belum Menikah',
                        'skbr' => 'Surat Keterangan Belum Memiliki Rumah',
                        'sih' => 'Surat Izin Hajatan',
                        'skck' => 'Surat Pengantar SKCK',
                        'spkd' => 'Surat Pengantar Kehilangan Dokumen',
                        'skm' => 'Surat Keterangan Kematian',
                        'skl' => 'Surat Keterangan Kelahiran'
                    );

                    $icon = isset($service_icons[$r->service_type]) ? $service_icons[$r->service_type] : 'bi-file-earmark';
                    $service_name = isset($service_names[$r->service_type]) ? $service_names[$r->service_type] : $r->service_type;
                ?>
                    <div class="col-lg-6 request-item" data-status="<?php echo $r->status; ?>">
                        <div class="request-card">
                            <div class="request-header">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex gap-3">
                                        <div class="service-icon">
                                            <i class="bi <?php echo $icon; ?>"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold mb-1"><?php echo $service_name; ?></h5>
                                            <span class="status-badge <?php echo $status_class; ?>">
                                                <i class="bi bi-circle-fill" style="font-size: 8px;"></i>
                                                <?php
                                                $status_labels = array(
                                                    'under_review' => 'Menunggu Review',
                                                    'in_process' => 'Sedang Diproses',
                                                    'completed' => 'Selesai',
                                                    'needs_revision' => 'Perlu Revisi'
                                                );
                                                echo isset($status_labels[$r->status]) ? $status_labels[$r->status] : $r->status;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">ID: #<?php echo $r->id; ?></small>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            <?php echo date('d M Y', strtotime($r->submitted_at)); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="request-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="user-avatar me-3">
                                                <?php echo strtoupper(substr($r->name, 0, 1)); ?>
                                            </div>
                                            <div>
                                                <div class="fw-bold"><?php echo $r->name; ?></div>
                                                <small class="text-muted">Pemohon</small>
                                            </div>
                                        </div>
                                        <div class="info-row">
                                            <i class="bi bi-credit-card"></i>
                                            <span class="font-monospace"><?php echo $r->nik; ?></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="bi bi-whatsapp text-success"></i>
                                            <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $r->phone); ?>"
                                                target="_blank" class="text-decoration-none">
                                                <?php echo $r->phone; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if ($r->additional_notes): ?>
                                            <div class="bg-light rounded-3 p-3 mb-3">
                                                <small class="text-muted d-block mb-1">
                                                    <i class="bi bi-chat-left-text me-1"></i>Keperluan:
                                                </small>
                                                <p class="mb-0 small"><?php echo nl2br($r->additional_notes); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted d-block mb-2">
                                        <i class="bi bi-paperclip me-1"></i>Dokumen Lampiran:
                                    </small>
                                    <div class="d-flex flex-wrap">
                                        <?php
                                        $documents = array(
                                            'upload_suratrtrw' => array('icon' => 'bi-envelope', 'label' => 'Surat Pengantar'),
                                            'upload_kk' => array('icon' => 'bi-people', 'label' => 'KK'),
                                            'upload_ktp' => array('icon' => 'bi-person-vcard', 'label' => 'KTP'),
                                            'upload_pbb' => array('icon' => 'bi bi-house-fill', 'label' => 'PBB'),
                                            'upload_aktal' => array('icon' => 'bi-file-text', 'label' => 'Akta Lahir'),
                                            'upload_aktan' => array('icon' => 'bi-heart', 'label' => 'Akta Nikah'),
                                            'upload_identitaslain' => array('icon' => 'bi-folder', 'label' => 'Identitas Lain'),
                                            'upload_ktpp' => array('icon' => 'bi-person', 'label' => 'KTP Pelapor'),
                                            'upload_ktps1' => array('icon' => 'bi-person-check', 'label' => 'KTP Saksi 1'),
                                            'upload_ktps2' => array('icon' => 'bi-person-check-fill', 'label' => 'KTP Saksi 2'),
                                            'upload_suketdok' => array('icon' => 'bi-file-medical', 'label' => 'Surat Dokter')
                                        );

                                        foreach ($documents as $field => $doc):
                                            if (!empty($r->$field)):
                                        ?>
                                                <a href="<?php echo base_url('assets/uploads/documents/' . $r->$field); ?>"
                                                    target="_blank"
                                                    class="doc-btn btn btn-outline-primary">
                                                    <i class="bi <?php echo $doc['icon']; ?> me-1"></i>
                                                    <?php echo $doc['label']; ?>
                                                </a>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="request-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-clock-history me-1"></i>
                                        <?php
                                        $diff = time() - strtotime($r->submitted_at);
                                        $days = floor($diff / (60 * 60 * 24));
                                        echo $days > 0 ? "$days hari yang lalu" : "Hari ini";
                                        ?>
                                    </small>

                                    <div class="btn-group">
                                        <?php if ($r->status === 'under_review'): ?>
                                            <a href="<?php echo site_url('admin/approve_request/' . $r->id); ?>"
                                                class="btn btn-action btn-approve"
                                                onclick="return confirm('Setujui permohonan ini? Notifikasi WA akan dikirim ke <?php echo $r->name; ?>')">
                                                <i class="bi bi-check-lg me-2"></i>Setujui
                                            </a>
                                            <button class="btn btn-action btn-reject"
                                                data-bs-toggle="modal"
                                                data-bs-target="#rejectModal<?php echo $r->id; ?>">
                                                <i class="bi bi-x-lg me-2"></i>Tolak
                                            </button>

                                        <?php elseif ($r->status === 'in_process'): ?>
                                            <button class="btn btn-action btn-upload"
                                                data-bs-toggle="modal"
                                                data-bs-target="#uploadModal<?php echo $r->id; ?>">
                                                <i class="bi bi-upload me-2"></i>Unggah Selesai
                                            </button>

                                        <?php elseif ($r->status === 'completed'): ?>
                                            <span class="text-success fw-bold">
                                                <i class="bi bi-check-circle-fill me-2"></i>Selesai
                                            </span>
                                            <?php if ($r->completed_document): ?>
                                                <a href="<?php echo base_url('assets/uploads/completed/' . $r->completed_document); ?>"
                                                    target="_blank"
                                                    class="btn btn-outline-success btn-sm ms-2">
                                                    <i class="bi bi-download me-1"></i>Hasil
                                                </a>
                                            <?php endif; ?>

                                        <?php elseif ($r->status === 'needs_revision'): ?>
                                            <span class="text-danger fw-bold">
                                                <i class="bi bi-arrow-counterclockwise me-2"></i>Perlu Revisi
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reject Modal -->
                    <div class="modal fade" id="rejectModal<?php echo $r->id; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="bi bi-x-circle-fill me-2"></i>Tolak Permohonan
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- FORM TANPA CSRF -->
                                <form method="post" action="<?php echo site_url('admin/reject_request/' . $r->id); ?>">
                                    <div class="modal-body">
                                        <div class="alert alert-light border">
                                            <strong>Layanan:</strong> <?php echo $service_name; ?><br>
                                            <strong>Pemohon:</strong> <?php echo $r->name; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Alasan Penolakan</label>
                                            <textarea class="form-control" name="reason" rows="3"
                                                placeholder="Jelaskan alasan penolakan..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-x-lg me-2"></i>Tolak Permohonan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Modal -->
                    <div class="modal fade" id="uploadModal<?php echo $r->id; ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="bi bi-upload me-2"></i>Unggah Dokumen Selesai
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" action="<?php echo site_url('admin/upload_completed/' . $r->id); ?>"
                                    enctype="multipart/form-data">
                                    <?php if ($this->security->get_csrf_token_name()): ?>
                                        <input type="hidden"
                                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <?php endif; ?>
                                    <div class="modal-body">
                                        <div class="alert alert-light border">
                                            <strong>Layanan:</strong> <?php echo $service_name; ?><br>
                                            <strong>Pemohon:</strong> <?php echo $r->name; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">File Hasil (PDF)</label>
                                            <input type="file" class="form-control" name="completed_document"
                                                accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-lg me-2"></i>Unggah & Selesai
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h4>Tidak Ada Permohonan</h4>
                <p class="text-muted">Belum ada permohonan layanan yang masuk saat ini.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function filterRequests(status) {
            document.querySelectorAll('.filter-btn').forEach(function(btn) {
                btn.classList.remove('active');
            });
            event.target.closest('.filter-btn').classList.add('active');

            var items = document.querySelectorAll('.request-item');
            items.forEach(function(item) {
                if (status === 'all' || item.getAttribute('data-status') === status) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeInUp 0.5s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>