<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pelayanan - Admin SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Admin CSS -->
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom Styles untuk History */
        .history-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .history-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .history-header {
            background: linear-gradient(135deg, #198754 0%, #20c997 100%);
            color: white;
            padding: 20px;
            position: relative;
        }

        .history-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 30px;
            width: 20px;
            height: 20px;
            background: #20c997;
            transform: rotate(45deg);
        }

        .history-body {
            padding: 25px;
        }

        .applicant-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .applicant-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .service-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .date-info {
            display: flex;
            gap: 20px;
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .date-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6c757d;
        }

        .date-item i {
            color: #198754;
            font-size: 18px;
        }

        .documents-section {
            margin-top: 20px;
        }

        .documents-title {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .doc-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .doc-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            text-decoration: none;
            color: #495057;
            font-size: 13px;
            transition: all 0.2s ease;
        }

        .doc-item:hover {
            border-color: #198754;
            color: #198754;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
        }

        .doc-item i {
            font-size: 16px;
        }

        .status-completed {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .search-box {
            position: relative;
            margin-bottom: 30px;
        }

        .search-box input {
            padding: 15px 20px 15px 50px;
            border-radius: 12px;
            border: 2px solid #e9ecef;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: #198754;
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 18px;
        }

        .stats-bar {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-state i {
            font-size: 80px;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .timeline-dot {
            width: 12px;
            height: 12px;
            background: #198754;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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
                    <a class="nav-link" href="<?php echo site_url('admin/requests'); ?>">
                        <i class="bi bi-folder-check me-1"></i>Permohonan
                    </a>
                    <a class="nav-link active" href="<?php echo site_url('admin/history'); ?>">
                        <i class="bi bi-clock-history me-1"></i>Riwayat
                    </a>
                    <a class="nav-link text-danger bg-danger bg-opacity-10 rounded ms-2" href="<?php echo site_url('admin/logout'); ?>">
                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4 animate-fade-in">
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <div><?php echo $this->session->flashdata('success'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold text-success mb-2">
                        <i class="bi bi-clock-history me-2"></i>Riwayat Pelayanan
                    </h2>
                    <p class="text-muted mb-0">Daftar permohonan layanan yang telah selesai diproses</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="<?php echo site_url('admin/export_history'); ?>" class="btn btn-success">
                        <i class="bi bi-download me-2"></i>Export Excel
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="stats-bar">
            <div class="stat-box">
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4"><?php echo count($history); ?></div>
                    <small class="text-muted">Total Selesai</small>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4">
                        <?php
                        $this_month = 0;
                        foreach ($history as $h) {
                            if (date('m-Y', strtotime($h->completed_at)) == date('m-Y')) {
                                $this_month++;
                            }
                        }
                        echo $this_month;
                        ?>
                    </div>
                    <small class="text-muted">Bulan Ini</small>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-clock"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4">
                        <?php
                        $avg_days = 0;
                        if (count($history) > 0) {
                            $total_days = 0;
                            foreach ($history as $h) {
                                $start = strtotime($h->submitted_at);
                                $end = strtotime($h->completed_at);
                                $total_days += ceil(($end - $start) / (60 * 60 * 24));
                            }
                            $avg_days = round($total_days / count($history), 1);
                        }
                        echo $avg_days;
                        ?>
                    </div>
                    <small class="text-muted">Rata-rata Hari</small>
                </div>
            </div>
        </div>

        <!-- Search Box -->
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" id="searchHistory" placeholder="Cari berdasarkan nama, NIK, atau jenis layanan...">
        </div>

        <!-- History List -->
        <?php if (!empty($history)): ?>
            <div class="row" id="historyList">
                <?php foreach ($history as $h):
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

                    $service_icons = array(
                        'sktm' => 'bi-file-earmark-text',
                        'skd' => 'bi-house',
                        'sksn' => 'bi-person-badge',
                        'skpo' => 'bi-cash',
                        'skbm' => 'bi-heart',
                        'skbr' => 'bi-building',
                        'sih' => 'bi-music-note-beamed',
                        'skck' => 'bi-shield-check',
                        'spkd' => 'bi-file-earmark-x',
                        'skm' => 'bi-heartbreak',
                        'skl' => 'bi-balloon'
                    );

                    $service_name = isset($service_names[$h->service_type]) ? $service_names[$h->service_type] : $h->service_type;
                    $service_icon = isset($service_icons[$h->service_type]) ? $service_icons[$h->service_type] : 'bi-file-earmark';

                    // Hitung durasi proses
                    $start = strtotime($h->submitted_at);
                    $end = strtotime($h->completed_at);
                    $duration_days = ceil(($end - $start) / (60 * 60 * 24));
                ?>
                    <div class="col-lg-6 history-item"
                        data-name="<?php echo strtolower($h->name); ?>"
                        data-nik="<?php echo $h->nik; ?>"
                        data-service="<?php echo strtolower($service_name); ?>">
                        <div class="history-card">
                            <div class="history-header">
                                <div class="status-completed">
                                    <i class="bi bi-check-circle-fill"></i>
                                    SELESAI
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi <?php echo $service_icon; ?> fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 fw-bold"><?php echo $service_name; ?></h5>
                                        <small class="opacity-75">ID: #<?php echo $h->id; ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="history-body">
                                <!-- Applicant Info -->
                                <div class="applicant-info">
                                    <div class="applicant-avatar">
                                        <?php echo strtoupper(substr($h->name, 0, 1)); ?>
                                    </div>
                                    <div>
                                        <h5 class="mb-1 fw-bold"><?php echo $h->name; ?></h5>
                                        <div class="text-muted">
                                            <i class="bi bi-credit-card me-1"></i>
                                            <span class="font-monospace"><?php echo $h->nik; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date Info -->
                                <div class="date-info">
                                    <div class="date-item">
                                        <i class="bi bi-calendar-plus"></i>
                                        <div>
                                            <small class="d-block text-muted">Diajukan</small>
                                            <strong><?php echo date('d M Y', strtotime($h->submitted_at)); ?></strong>
                                        </div>
                                    </div>
                                    <div class="date-item">
                                        <i class="bi bi-calendar-check-fill"></i>
                                        <div>
                                            <small class="d-block text-muted">Selesai</small>
                                            <strong><?php echo date('d M Y', strtotime($h->completed_at)); ?></strong>
                                        </div>
                                    </div>
                                    <div class="date-item">
                                        <i class="bi bi-stopwatch"></i>
                                        <div>
                                            <small class="d-block text-muted">Durasi</small>
                                            <strong><?php echo $duration_days; ?> hari</strong>
                                        </div>
                                    </div>
                                </div>

                                <!-- Documents -->
                                <div class="documents-section">
                                    <div class="documents-title">
                                        <i class="bi bi-paperclip"></i>
                                        Berkas yang Diunggah:
                                    </div>
                                    <div class="doc-list">
                                        <?php
                                        $documents = array(
                                            'upload_suratrtrw' => array('icon' => 'bi-envelope', 'label' => 'Surat Pengantar'),
                                            'upload_kk' => array('icon' => 'bi-people', 'label' => 'KK'),
                                            'upload_ktp' => array('icon' => 'bi-person-vcard', 'label' => 'KTP'),
                                            'upload_pbb' => array('icon' => 'bi-house-fill', 'label' => 'PBB'),
                                            'upload_aktal' => array('icon' => 'bi-file-text', 'label' => 'Akta Lahir'),
                                            'upload_aktan' => array('icon' => 'bi-heart', 'label' => 'Akta Nikah'),
                                            'upload_identitaslain' => array('icon' => 'bi-folder', 'label' => 'Identitas Lain'),
                                            'upload_ktpp' => array('icon' => 'bi-person', 'label' => 'KTP Pelapor'),
                                            'upload_ktps1' => array('icon' => 'bi-person-check', 'label' => 'KTP Saksi 1'),
                                            'upload_ktps2' => array('icon' => 'bi-person-check-fill', 'label' => 'KTP Saksi 2'),
                                            'upload_suketdok' => array('icon' => 'bi-file-medical', 'label' => 'Surat Dokter')
                                        );

                                        foreach ($documents as $field => $doc):
                                            if (!empty($h->$field)):
                                        ?>
                                                <a href="<?php echo base_url('assets/uploads/documents/' . $h->$field); ?>"
                                                    target="_blank" class="doc-item">
                                                    <i class="bi <?php echo $doc['icon']; ?> text-success"></i>
                                                    <?php echo $doc['label']; ?>
                                                </a>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>

                                        <!-- Completed Document -->
                                        <?php if (!empty($h->completed_document)): ?>
                                            <a href="<?php echo base_url('assets/uploads/completed/' . $h->completed_document); ?>"
                                                target="_blank" class="doc-item" style="border-color: #198754; background: #d1e7dd;">
                                                <i class="bi bi-file-earmark-check-fill text-success"></i>
                                                <strong>Hasil Akhir</strong>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h4>Belum Ada Riwayat</h4>
                <p class="text-muted">Belum ada permohonan yang selesai diproses.</p>
                <a href="<?php echo site_url('admin/requests'); ?>" class="btn btn-success mt-3">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Permohonan
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Search functionality
        document.getElementById('searchHistory').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.history-item');

            items.forEach(function(item) {
                const name = item.getAttribute('data-name');
                const nik = item.getAttribute('data-nik');
                const service = item.getAttribute('data-service');

                if (name.includes(searchTerm) || nik.includes(searchTerm) || service.includes(searchTerm)) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.3s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>