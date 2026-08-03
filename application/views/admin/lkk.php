<?php
// ============================================================
// FILE: application/views/admin/lkk.php
// View lengkap untuk Manajemen SK LKK
// =========================================================
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($title) ? $title : 'Manajemen SK LKK'; ?> - SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1976d2;
            --dark-blue: #1565c0;
            --success-green: #2e7d32;
            --warning-orange: #ed6c02;
            --danger-red: #d32f2f;
            --bg-light: #f0f4f8;
            --card-bg: #ffffff;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg-light);
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
        }

        /* Page Header */

        .main-content {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            color: #1565c0;
            font-size: 32px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        .page-header h2 {
            font-weight: 700;
            margin: 0;
        }

        .page-header p {
            opacity: 0.9;
            margin: 5px 0 0;
        }

        /* Stats Cards */
        .stat-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.blue {
            background: #e3f2fd;
            color: var(--primary-blue);
        }

        .stat-icon.green {
            background: #e8f5e9;
            color: var(--success-green);
        }

        .stat-icon.orange {
            background: #fff3e0;
            color: var(--warning-orange);
        }

        .stat-icon.purple {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .stat-info h4 {
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
        }

        .stat-info p {
            margin: 0;
            color: #6c757d;
            font-size: 0.85rem;
        }

        /* Cards */
        .upload-card,
        .history-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .upload-card .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 2px solid var(--primary-blue);
            padding: 20px 25px;
        }

        .history-card .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 2px solid var(--warning-orange);
            padding: 20px 25px;
        }

        .card-header h5 {
            font-weight: 700;
            margin: 0;
        }

        .upload-card .card-header h5 {
            color: var(--primary-blue);
        }

        .history-card .card-header h5 {
            color: var(--warning-orange);
        }

        /* Form */
        .form-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.15);
        }

        .input-group-text {
            background: var(--primary-blue);
            color: white;
            border: 2px solid var(--primary-blue);
            border-radius: 10px 0 0 10px;
        }

        /* File Upload */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px 20px;
            border: 3px dashed #c5cae9;
            border-radius: 12px;
            background: #f8f9ff;
            color: var(--primary-blue);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .file-input-label:hover {
            border-color: var(--primary-blue);
            background: #e8eaf6;
        }

        .file-input-label i {
            font-size: 2.5rem;
        }

        .file-input-label.has-file {
            border-color: var(--success-green);
            background: #e8f5e9;
            color: var(--success-green);
        }

        /* Buttons */
        .btn-upload {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(25, 118, 210, 0.3);
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(25, 118, 210, 0.4);
            color: white;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .filter-tab {
            padding: 8px 18px;
            border-radius: 50px;
            border: 2px solid #e9ecef;
            background: white;
            color: #6c757d;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .filter-tab:hover {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
        }

        .filter-tab.active {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            border-color: var(--primary-blue);
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
        }

        /* Table */
        .table-history {
            margin: 0;
        }

        .table-history thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #495057;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 15px;
        }

        .table-history tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-history tbody tr:hover {
            background: #f8f9ff;
        }

        /* Badges */
        .badge-sk {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-sk.rt {
            background: #e3f2fd;
            color: #1565c0;
        }

        .badge-sk.rw {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-sk.karang-taruna {
            background: #fce4ec;
            color: #c2185b;
        }

        .badge-sk.lpmk {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .badge-sk.pkk {
            background: #fff3e0;
            color: #e65100;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-status.aktif {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-status.nonaktif {
            background: #ffebee;
            color: #c62828;
        }

        .version-badge {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* File Info */
        .file-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #ffebee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d32f2f;
            font-size: 1.2rem;
        }

        .file-name {
            font-weight: 600;
            color: #212529;
            font-size: 0.9rem;
        }

        .file-size {
            font-size: 0.8rem;
            color: #6c757d;
        }

        /* Action Buttons */
        .btn-action-sm {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-view {
            background: #e3f2fd;
            color: var(--primary-blue);
        }

        .btn-view:hover {
            background: var(--primary-blue);
            color: white;
        }

        .btn-download {
            background: #e8f5e9;
            color: var(--success-green);
        }

        .btn-download:hover {
            background: var(--success-green);
            color: white;
        }

        .btn-delete {
            background: #ffebee;
            color: var(--danger-red);
        }

        .btn-delete:hover {
            background: var(--danger-red);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #c5cae9;
            margin-bottom: 20px;
        }

        .empty-state h5 {
            color: #6c757d;
            font-weight: 600;
        }

        .empty-state p {
            color: #9e9e9e;
            font-size: 0.9rem;
        }

        /* Modal */
        .modal-content {
            border-radius: 16px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            border: none;
            padding: 20px 25px;
        }

        .modal-title {
            font-weight: 700;
        }

        /* Timeline */
        .history-timeline {
            position: relative;
            padding-left: 30px;
        }

        .history-timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e0e0e0;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #f0f0f0;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .timeline-dot {
            position: absolute;
            left: -26px;
            top: 5px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--primary-blue);
            border: 3px solid white;
            box-shadow: 0 0 0 2px var(--primary-blue);
        }

        .timeline-item.old .timeline-dot {
            background: #bdbdbd;
            box-shadow: 0 0 0 2px #bdbdbd;
        }

        .timeline-date {
            font-size: 0.8rem;
            color: #9e9e9e;
            margin-bottom: 5px;
        }

        .timeline-content {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
        }

        .timeline-content.old {
            background: #fafafa;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .filter-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-shield-check me-2"></i>Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="<?php echo site_url('admin'); ?>">Dashboard</a>
                    <a class="nav-link active" href="<?php echo site_url('admin/sk_lkk'); ?>">SK LKK</a>
                    <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="main-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Manajemen SK LKK</h1>
                <p class="page-subtitle">Kelola SK LKK Kelurahan Kalinyamat Wetan</p>
            </div>
            <div class="date-info">
                <div class="date"><?php echo date('l, d F Y'); ?></div>
                <a href="<?php echo site_url('admin'); ?>" class="btn btn-light">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>

        </div>

        <!-- Stats Row -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="stat-info">
                        <h4><?php echo isset($total_sk) ? $total_sk : 0; ?></h4>
                        <p>Total SK Terupload</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon green"><i class="bi bi-check-circle"></i></div>
                    <div class="stat-info">
                        <h4><?php echo isset($sk_aktif) ? $sk_aktif : 0; ?></h4>
                        <p>SK Aktif</p>
                    </div>
                </div>
            </div>
            <!-- PERUBAHAN
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon orange"><i class="bi bi-clock-history"></i></div>
                    <div class="stat-info">
                        <h4><?php echo isset($total_perubahan) ? $total_perubahan : 0; ?></h4>
                        <p>Total Perubahan</p>
                    </div>
                </div>
            </div>
-->
            <div class="col-lg-4 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon purple"><i class="bi bi-calendar-check"></i></div>
                    <div class="stat-info">
                        <h4><?php echo isset($sk_terbaru) ? $sk_terbaru : '-'; ?></h4>
                        <p>Upload Terakhir</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <!-- Upload Form -->
            <div class="col-lg-4">
                <div class="upload-card">
                    <div class="card-header">
                        <h5><i class="bi bi-cloud-upload-fill me-2"></i>Upload SK Baru</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?php echo site_url('admin/upload_sk_lkk'); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
                            <?php if ($this->config->item('csrf_protection') === TRUE): ?>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <?php endif; ?>
                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-tag-fill me-1 text-primary"></i>Jenis LKK</label>
                                <select class="form-select" name="jenis_lkk" id="jenisLkk" required>
                                    <option value="" disabled selected>Pilih Jenis LKK</option>
                                    <option value="rt">RT dan RW</option>
                                    <option value="karang-taruna">Karang Taruna</option>
                                    <option value="lpmk">LPMK</option>
                                    <option value="pkk">PKK</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-hash me-1 text-primary"></i>Nomor SK</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-file-earmark"></i></span>
                                    <input type="text" class="form-control" name="nomor_sk" placeholder="Nomor SK" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-calendar-range me-1 text-primary"></i>Periode</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="periode_mulai" placeholder="Tahun Mulai" min="2000" max="2099" required>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="periode_selesai" placeholder="Tahun Selesai" min="2000" max="2099" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><i class="bi bi-chat-text-fill me-1 text-primary"></i>Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label"><i class="bi bi-paperclip me-1 text-primary"></i>File SK (PDF)</label>
                                <div class="file-input-wrapper">
                                    <input type="file" name="file_sk" id="fileSk" accept=".pdf" required onchange="updateFileLabel(this)">
                                    <label for="fileSk" class="file-input-label" id="fileLabel">
                                        <div>
                                            <i class="bi bi-cloud-arrow-up"></i>
                                            <div class="mt-2 fw-bold">Klik untuk upload file PDF</div>
                                            <div class="small opacity-75">Maksimal 10MB</div>
                                        </div>
                                    </label>
                                </div>
                                <div id="filePreview" class="mt-2 d-none">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="file-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                                        <div>
                                            <div class="file-name" id="fileName">-</div>
                                            <div class="file-size" id="fileSize">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-upload w-100">
                                <i class="bi bi-upload me-2"></i>Upload SK
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- History List -->
            <div class="col-lg-8">
                <div class="history-card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5><i class="bi bi-clock-history me-2"></i>Riwayat SK</h5>
                        <span class="badge bg-primary rounded-pill"><?php echo isset($total_sk) ? $total_sk : 0; ?> Dokumen</span>
                    </div>
                    <div class="card-body p-0">
                        <!-- Filter Tabs -->
                        <div class="p-3 border-bottom">
                            <div class="filter-tabs">
                                <a href="<?php echo site_url('admin/sk_lkk'); ?>" class="filter-tab <?php echo !isset($filter) || $filter == 'all' ? 'active' : ''; ?>">
                                    <i class="bi bi-grid-fill me-1"></i>Semua
                                </a>
                                <a href="<?php echo site_url('admin/sk_lkk_filter/rt'); ?>" class="filter-tab <?php echo isset($filter) && $filter == 'rt' ? 'active' : ''; ?>">
                                    <i class="bi bi-house-door me-1"></i>RT dan RW
                                </a>
                                <a href="<?php echo site_url('admin/sk_lkk_filter/rw'); ?>" class="filter-tab <?php echo isset($filter) && $filter == 'rw' ? 'active' : ''; ?>">
                                    <i class="bi bi-people me-1"></i>RW
                                </a>
                                <a href="<?php echo site_url('admin/sk_lkk_filter/karang-taruna'); ?>" class="filter-tab <?php echo isset($filter) && $filter == 'karang-taruna' ? 'active' : ''; ?>">
                                    <i class="bi bi-heart me-1"></i>Karang Taruna
                                </a>
                                <a href="<?php echo site_url('admin/sk_lkk_filter/lpmk'); ?>" class="filter-tab <?php echo isset($filter) && $filter == 'lpmk' ? 'active' : ''; ?>">
                                    <i class="bi bi-briefcase me-1"></i>LPMK
                                </a>
                                <a href="<?php echo site_url('admin/sk_lkk_filter/pkk'); ?>" class="filter-tab <?php echo isset($filter) && $filter == 'pkk' ? 'active' : ''; ?>">
                                    <i class="bi bi-person-hearts me-1"></i>PKK
                                </a>
                            </div>
                        </div>

                        <?php if (!empty($sk_list)): ?>
                            <div class="table-responsive">
                                <table class="table table-history">
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Nomor SK</th>
                                            <th>Periode</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $jenis_labels = [
                                            'rt' => ['label' => 'RT dan RW', 'class' => 'rt', 'icon' => 'house-door'],
                                            'rw' => ['label' => 'RW', 'class' => 'rw', 'icon' => 'people'],
                                            'karang-taruna' => ['label' => 'Karang Taruna', 'class' => 'karang-taruna', 'icon' => 'heart'],
                                            'lpmk' => ['label' => 'LPMK', 'class' => 'lpmk', 'icon' => 'briefcase'],
                                            'pkk' => ['label' => 'PKK', 'class' => 'pkk', 'icon' => 'person-hearts']
                                        ];

                                        foreach ($sk_list as $sk):
                                            $j = isset($jenis_labels[$sk->jenis_lkk]) ? $jenis_labels[$sk->jenis_lkk] : ['label' => $sk->jenis_lkk, 'class' => '', 'icon' => 'file'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <span class="badge-sk <?php echo $j['class']; ?>">
                                                        <i class="bi bi-<?php echo $j['icon']; ?> me-1"></i><?php echo $j['label']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="fw-bold text-dark"><?php echo $sk->nomor_sk; ?></div>
                                                    <div class="small text-muted"><?php echo date('d M Y', strtotime($sk->created_at)); ?></div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border">
                                                        <i class="bi bi-calendar3 me-1"></i>
                                                        <?php echo $sk->periode_mulai; ?> - <?php echo $sk->periode_selesai; ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <?php if ($sk->status == 'aktif'): ?>
                                                        <span class="badge-status aktif"><i class="bi bi-check-circle-fill me-1"></i>Aktif</span>
                                                    <?php else: ?>
                                                        <span class="badge-status nonaktif"><i class="bi bi-x-circle-fill me-1"></i>Nonaktif</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="file-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                                                        <div>
                                                            <div class="file-name text-truncate" style="max-width: 120px;"><?php echo $sk->file_name; ?></div>
                                                            <div class="file-size"><?php echo $sk->file_size; ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <a href="<?php echo base_url($sk->file_path); ?>" target="_blank" class="btn-action-sm btn-view" title="Lihat">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('admin/download_sk/' . $sk->id); ?>" class="btn-action-sm btn-download" title="Download">
                                                            <i class="bi bi-download"></i>
                                                        </a>
                                                        <button type="button" class="btn-action-sm btn-delete" data-bs-toggle="modal" data-bs-target="#historyModal<?php echo $sk->id; ?>" title="History">
                                                            <i class="bi bi-clock-history"></i>
                                                        </button>
                                                        <button type="button" class="btn-action-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $sk->id; ?>" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>Belum ada dokumen SK</h5>
                                <p>Upload dokumen SK pertama Anda menggunakan form di sebelah kiri</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Modals -->
    <?php if (!empty($sk_list)): ?>
        <?php foreach ($sk_list as $sk): ?>
            <div class="modal fade" id="historyModal<?php echo $sk->id; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-clock-history me-2"></i>Riwayat Perubahan SK
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-light rounded-3">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; font-size: 1.5rem;">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1"><?php echo $sk->nomor_sk; ?></h6>
                                    <?php
                                    $j = isset($jenis_labels[$sk->jenis_lkk]) ? $jenis_labels[$sk->jenis_lkk] : ['label' => $sk->jenis_lkk, 'class' => ''];
                                    ?>
                                    <span class="badge-sk <?php echo $j['class']; ?>"><?php echo $j['label']; ?></span>
                                    <span class="badge bg-light text-dark border ms-2">
                                        Periode <?php echo $sk->periode_mulai; ?> - <?php echo $sk->periode_selesai; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="history-timeline">
                                <!-- Current Version -->
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-date">
                                        <i class="bi bi-calendar-event me-1"></i><?php echo date('d M Y H:i', strtotime($sk->created_at)); ?>
                                        <span class="badge bg-success ms-2">Versi Terbaru</span>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-bold mb-2">SK v<?php echo $sk->versi; ?></h6>
                                                <p class="mb-2 text-muted"><?php echo $sk->keterangan ?: 'Tidak ada keterangan'; ?></p>
                                                <div class="d-flex gap-2">
                                                    <a href="<?php echo base_url($sk->file_path); ?>" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-eye me-1"></i>Lihat
                                                    </a>
                                                    <a href="<?php echo site_url('admin/download_sk/' . $sk->id); ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download me-1"></i>Download
                                                    </a>
                                                </div>
                                            </div>
                                            <span class="version-badge">v<?php echo $sk->versi; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Old Versions -->
                                <?php if (!empty($sk->history)): ?>
                                    <?php foreach ($sk->history as $hist): ?>
                                        <div class="timeline-item old">
                                            <div class="timeline-dot"></div>
                                            <div class="timeline-date">
                                                <i class="bi bi-calendar-event me-1"></i><?php echo date('d M Y H:i', strtotime($hist->created_at)); ?>
                                            </div>
                                            <div class="timeline-content old">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h6 class="fw-bold mb-2 text-muted">SK v<?php echo $hist->versi; ?></h6>
                                                        <p class="mb-2 text-muted"><?php echo $hist->keterangan ?: 'Tidak ada keterangan'; ?></p>
                                                        <div class="d-flex gap-2">
                                                            <a href="<?php echo base_url($hist->file_path); ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                                <i class="bi bi-eye me-1"></i>Lihat
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-secondary">v<?php echo $hist->versi; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="text-center text-muted py-4">
                                        <i class="bi bi-info-circle me-1"></i>Belum ada riwayat perubahan sebelumnya
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal<?php echo $sk->id; ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus dokumen SK ini?</p>
                            <div class="alert alert-light border">
                                <strong>Nomor SK:</strong> <?php echo $sk->nomor_sk; ?><br>
                                <strong>Jenis:</strong> <?php echo $j['label']; ?><br>
                                <strong>Periode:</strong> <?php echo $sk->periode_mulai; ?> - <?php echo $sk->periode_selesai; ?>
                            </div>
                            <p class="text-danger mb-0">
                                <i class="bi bi-info-circle me-1"></i>
                                Tindakan ini tidak dapat dibatalkan!
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="<?php echo site_url('admin/delete_sk/' . $sk->id); ?>" class="btn btn-danger">
                                <i class="bi bi-trash me-2"></i>Ya, Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateFileLabel(input) {
            const label = document.getElementById('fileLabel');
            const preview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (file.type !== 'application/pdf') {
                    alert('File harus berformat PDF!');
                    input.value = '';
                    return;
                }

                if (file.size > 10 * 1024 * 1024) {
                    alert('Ukuran file maksimal 10MB!');
                    input.value = '';
                    return;
                }

                label.classList.add('has-file');
                label.innerHTML = `
                    <div>
                        <i class="bi bi-check-circle-fill text-success"></i>
                        <div class="mt-2 fw-bold text-success">File siap diupload</div>
                        <div class="small">${file.name}</div>
                    </div>
                `;

                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                preview.classList.remove('d-none');
            }
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            const jenis = document.getElementById('jenisLkk').value;
            if (!jenis) {
                e.preventDefault();
                alert('Silakan pilih jenis LKK terlebih dahulu!');
                return false;
            }
        });
    </script>
</body>

</html>