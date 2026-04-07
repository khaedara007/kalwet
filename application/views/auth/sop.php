<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOP Pelayanan - Admin SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- PDF.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>

    <style>
        /* Warna tema SIMPEL AWET */
        :root {
            --primary-blue: #1e88e5;
            --dark-blue: #1565c0;
            --light-blue: #64b5f6;
            --accent-yellow: #ffd600;
            --bg-gradient: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        }

        /* Header */
        .page-header-custom {
            background: var(--bg-gradient);
            color: white;
            padding: 40px 30px;
            border-radius: 16px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .page-header-custom::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        /* Search Box */
        .search-container {
            position: relative;
            max-width: 500px;
            margin-bottom: 30px;
        }

        .search-box-sop {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e3f2fd;
            border-radius: 50px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .search-box-sop:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(30, 136, 229, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-blue);
            font-size: 20px;
        }

        /* Category Section */
        .category-section {
            margin-bottom: 40px;
        }

        .category-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #e3f2fd;
        }

        .category-icon {
            width: 45px;
            height: 45px;
            background: var(--bg-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
        }

        .category-title h4 {
            color: #1565c0;
            font-weight: 700;
            margin: 0;
        }

        .category-count {
            background: #e3f2fd;
            color: #1976d2;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-left: auto;
        }

        /* SOP Cards Grid */
        .sop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .sop-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .sop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(30, 136, 229, 0.2);
            border-color: var(--light-blue);
        }

        .sop-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--bg-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sop-card:hover::before {
            opacity: 1;
        }

        .sop-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 28px;
            color: var(--primary-blue);
        }

        .sop-title {
            font-size: 16px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .sop-code {
            display: inline-block;
            background: #f5f5f5;
            color: #666;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-family: monospace;
            margin-bottom: 10px;
        }

        .sop-desc {
            font-size: 13px;
            color: #6c757d;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .sop-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
        }

        .sop-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #28a745;
            font-weight: 500;
        }

        .sop-action {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--primary-blue);
            font-size: 13px;
            font-weight: 600;
        }

        .sop-card:hover .sop-action {
            color: var(--dark-blue);
        }

        /* PDF Badge */
        .pdf-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* PDF Preview Modal - FIXED */
        .modal-pdf .modal-dialog {
            max-width: 95vw;
            width: 95vw;
            height: 90vh;
            margin: 5vh auto;
        }

        .modal-pdf .modal-content {
            height: 100%;
            border-radius: 16px;
            border: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .modal-pdf .modal-header {
            background: var(--bg-gradient);
            color: white;
            border-bottom: none;
            padding: 15px 25px;
            flex-shrink: 0;
        }

        .modal-pdf .modal-title {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
        }

        .modal-pdf .modal-body {
            padding: 0;
            flex: 1;
            overflow: hidden;
            background: #f0f0f0;
            display: flex;
            flex-direction: column;
        }

        /* PDF Toolbar */
        .pdf-toolbar {
            background: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            gap: 15px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }

        .pdf-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .pdf-filename {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .pdf-badge-modal {
            background: #dc3545;
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .pdf-actions {
            display: flex;
            gap: 10px;
        }

        .btn-pdf-action {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-pdf-download {
            background: #28a745;
            color: white;
        }

        .btn-pdf-download:hover {
            background: #218838;
            color: white;
        }

        .btn-pdf-newtab {
            background: #6c757d;
            color: white;
        }

        .btn-pdf-newtab:hover {
            background: #5a6268;
            color: white;
        }

        .btn-pdf-close {
            background: #dc3545;
            color: white;
        }

        .btn-pdf-close:hover {
            background: #c82333;
            color: white;
        }

        /* PDF Viewer Container */
        .pdf-viewer-container {
            flex: 1;
            overflow: auto;
            background: #525659;
            position: relative;
        }

        /* PDF.js Canvas */
        #pdf-canvas {
            display: block;
            margin: 20px auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            background: white;
        }

        /* PDF Navigation */
        .pdf-nav {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 1000;
        }

        .pdf-nav button {
            background: transparent;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.2s;
        }

        .pdf-nav button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .pdf-nav button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pdf-page-info {
            font-size: 14px;
            min-width: 80px;
            text-align: center;
        }

        /* Loading State */
        .pdf-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .pdf-loading i {
            font-size: 48px;
            color: white;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Error State */
        .pdf-error {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            padding: 20px;
        }

        .pdf-error.active {
            display: flex;
        }

        .pdf-error i {
            font-size: 64px;
            color: #dc3545;
        }

        .pdf-error h5 {
            color: white;
        }

        .pdf-error p {
            color: #ccc;
        }

        /* No Result */
        .no-result {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 16px;
            display: none;
        }

        .no-result i {
            font-size: 64px;
            color: #dee2e6;
            margin-bottom: 15px;
        }

        /* Stats Row */
        .stats-sop {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-sop-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-sop-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .modal-pdf .modal-dialog {
                max-width: 100vw;
                width: 100vw;
                height: 100vh;
                margin: 0;
            }

            .modal-pdf .modal-content {
                border-radius: 0;
            }

            .pdf-toolbar {
                padding: 10px;
            }

            .pdf-actions {
                width: 100%;
                justify-content: center;
            }

            .btn-pdf-action {
                padding: 6px 12px;
                font-size: 12px;
            }

            .pdf-nav {
                bottom: 10px;
                padding: 8px 15px;
            }
        }

        /* Zoom controls */
        .pdf-zoom {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 20px;
        }

        .pdf-zoom button {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: var(--bg-gradient);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo site_url('auth/admin'); ?>">
                <img src="<?php echo base_url('assets/logo.png'); ?>" alt="Logo" height="40" class="me-2">
                <div>
                    <small class="d-block text-warning" style="font-size: 10px; letter-spacing: 1px;">SISTEM INFORMASI PELAYANAN</small>
                    <span class="fw-bold">KELURAHAN KALINYAMAT WETAN</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto align-items-center">
                    <a class="nav-link" href="<?php echo site_url('auth/admin'); ?>">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard
                    </a>
                    <a class="nav-link" href="<?php echo site_url('auth/admin_requests'); ?>">
                        <i class="bi bi-folder-check me-1"></i>Permohonan
                    </a>
                    <a class="nav-link" href="<?php echo site_url('auth/admin_history'); ?>">
                        <i class="bi bi-clock-history me-1"></i>Riwayat
                    </a>

                    <!-- DROPDOWN DATA MASTER -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-database me-1"></i>Data Master
                        </a>
                        <ul class="dropdown-menu">
                            <li><span class="dropdown-header">Profil</span></li>
                            <li>
                                <a class="dropdown-item" href="<?php echo site_url('auth/riwayat_lurah'); ?>">
                                    <i class="bi bi-person-badge text-primary"></i>Riwayat Lurah
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><span class="dropdown-header">Dokumen</span></li>
                            <li>
                                <a class="dropdown-item active" href="<?php echo site_url('auth/sop_pelayanan'); ?>">
                                    <i class="bi bi-file-earmark-text text-success"></i>SOP Pelayanan
                                </a>
                            </li>
                        </ul>
                    </li>

                    <a class="nav-link text-warning ms-2" href="<?php echo site_url('auth/logout'); ?>">
                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5 animate-fade-in">

        <!-- Header -->
        <div class="page-header-custom">
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>SOP Pelayanan
                    </h2>
                    <p class="mb-0 opacity-75">Standar Operasional Prosedur Pelayanan Kelurahan Kalinyamat Wetan</p>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-sop">
            <div class="stat-sop-card">
                <div class="stat-sop-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4">11</div>
                    <small class="text-muted">Total SOP</small>
                </div>
            </div>
            <div class="stat-sop-card">
                <div class="stat-sop-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4">11</div>
                    <small class="text-muted">SOP Aktif</small>
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-box-sop" id="searchSop"
                placeholder="Cari SOP berdasarkan nama atau kode...">
        </div>

        <!-- No Result Message -->
        <div class="no-result" id="noResult">
            <i class="bi bi-search"></i>
            <h5>Tidak ditemukan</h5>
            <p class="text-muted">SOP yang Anda cari tidak ditemukan.</p>
        </div>

        <!-- SOP Categories -->
        <div id="sopContainer">

            <!-- KATEGORI: SURAT KETERANGAN -->
            <div class="category-section" data-category="surat-keterangan">
                <div class="category-title">
                    <div class="category-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h4>Surat Keterangan</h4>
                    <span class="category-count">7 SOP</span>
                </div>

                <div class="sop-grid">

                    <!-- SOP 1: SKTM -->
                    <div class="sop-card" onclick="previewSop('SOP-SKTM.pdf', 'SOP-SK-001', 'Surat Keterangan Tidak Mampu')" data-search="sktm surat keterangan tidak mampu">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <span class="sop-code">SOP-SK-001</span>
                        <h5 class="sop-title">Surat Keterangan Tidak Mampu (SKTM)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan tidak mampu untuk pengajuan bantuan sosial dan beasiswa.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 2: SKD -->
                    <div class="sop-card" onclick="previewSop('sop_skd.pdf', 'SOP-SK-002', 'Surat Keterangan Domisili')" data-search="skd surat keterangan domisili">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-house"></i>
                        </div>
                        <span class="sop-code">SOP-SK-002</span>
                        <h5 class="sop-title">Surat Keterangan Domisili (SKD)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan domisili untuk keperluan administrasi penduduk.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 3: SKSN -->
                    <div class="sop-card" onclick="previewSop('sop_sksn.pdf', 'SOP-SK-003', 'Surat Keterangan Satu Nama')" data-search="sksn surat keterangan satu nama">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <span class="sop-code">SOP-SK-003</span>
                        <h5 class="sop-title">Surat Keterangan Satu Nama (SKSN)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan satu nama untuk penyeragaman data kependudukan.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 4: SKPO -->
                    <div class="sop-card" onclick="previewSop('sop_skpo.pdf', 'SOP-SK-004', 'Surat Keterangan Penghasilan Orang Tua')" data-search="skpo surat keterangan penghasilan orang tua">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-cash"></i>
                        </div>
                        <span class="sop-code">SOP-SK-004</span>
                        <h5 class="sop-title">Surat Keterangan Penghasilan Orang Tua (SKPO)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan penghasilan untuk keperluan beasiswa dan bantuan.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 5: SKBM -->
                    <div class="sop-card" onclick="previewSop('sop_skbm.pdf', 'SOP-SK-005', 'Surat Keterangan Belum Menikah')" data-search="skbm surat keterangan belum menikah">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <span class="sop-code">SOP-SK-005</span>
                        <h5 class="sop-title">Surat Keterangan Belum Menikah (SKBM)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan status belum menikah untuk keperluan nikah dan lainnya.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 6: SKBR -->
                    <div class="sop-card" onclick="previewSop('sop_skbr.pdf', 'SOP-SK-006', 'Surat Keterangan Belum Memiliki Rumah')" data-search="skbr surat keterangan belum memiliki rumah">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <span class="sop-code">SOP-SK-006</span>
                        <h5 class="sop-title">Surat Keterangan Belum Memiliki Rumah (SKBR)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan belum memiliki rumah untuk pengajuan perumahan rakyat.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 7: SKM -->
                    <div class="sop-card" onclick="previewSop('sop_skm.pdf', 'SOP-SK-007', 'Surat Keterangan Kematian')" data-search="skm surat keterangan kematian">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-heartbreak"></i>
                        </div>
                        <span class="sop-code">SOP-SK-007</span>
                        <h5 class="sop-title">Surat Keterangan Kematian (SKM)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan kematian untuk keperluan administrasi ahli waris.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- KATEGORI: SURAT IZIN & PENGANTAR -->
            <div class="category-section" data-category="surat-izin">
                <div class="category-title">
                    <div class="category-icon">
                        <i class="bi bi-file-earmark-check"></i>
                    </div>
                    <h4>Surat Izin & Pengantar</h4>
                    <span class="category-count">3 SOP</span>
                </div>

                <div class="sop-grid">

                    <!-- SOP 8: SIH -->
                    <div class="sop-card" onclick="previewSop('sop_sih.pdf', 'SOP-SI-001', 'Surat Izin Hajatan')" data-search="sih surat izin hajatan">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-music-note-beamed"></i>
                        </div>
                        <span class="sop-code">SOP-SI-001</span>
                        <h5 class="sop-title">Surat Izin Hajatan (SIH)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat izin hajatan untuk kegiatan pernikahan dan hajatan masyarakat.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 9: SKCK -->
                    <div class="sop-card" onclick="previewSop('sop_skck.pdf', 'SOP-SP-001', 'Surat Pengantar SKCK')" data-search="skck surat pengantar skck">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <span class="sop-code">SOP-SP-001</span>
                        <h5 class="sop-title">Surat Pengantar SKCK</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat pengantar untuk pengurusan SKCK di Polsek/Polres.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                    <!-- SOP 10: SPKD -->
                    <div class="sop-card" onclick="previewSop('sop_spkd.pdf', 'SOP-SP-002', 'Surat Pengantar Kehilangan Dokumen')" data-search="spkd surat pengantar kehilangan dokumen">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-file-earmark-x"></i>
                        </div>
                        <span class="sop-code">SOP-SP-002</span>
                        <h5 class="sop-title">Surat Pengantar Kehilangan Dokumen (SPKD)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat pengantar kehilangan dokumen untuk laporan kepolisian.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- KATEGORI: AKTA & PENCATATAN SIPIL -->
            <div class="category-section" data-category="akta">
                <div class="category-title">
                    <div class="category-icon">
                        <i class="bi bi-file-earmark-richtext"></i>
                    </div>
                    <h4>Akta & Pencatatan Sipil</h4>
                    <span class="category-count">1 SOP</span>
                </div>

                <div class="sop-grid">

                    <!-- SOP 11: SKL -->
                    <div class="sop-card" onclick="previewSop('sop_skl.pdf', 'SOP-AK-001', 'Surat Keterangan Kelahiran')" data-search="skl surat keterangan kelahiran">
                        <span class="pdf-badge">
                            <i class="bi bi-file-earmark-pdf"></i>PDF
                        </span>
                        <div class="sop-icon">
                            <i class="bi bi-balloon"></i>
                        </div>
                        <span class="sop-code">SOP-AK-001</span>
                        <h5 class="sop-title">Surat Keterangan Kelahiran (SKL)</h5>
                        <p class="sop-desc">
                            Prosedur pembuatan surat keterangan kelahiran untuk pengurusan akta lahir di Dukcapil.
                        </p>
                        <div class="sop-meta">
                            <span class="sop-status">
                                <i class="bi bi-check-circle-fill"></i> Aktif
                            </span>
                            <span class="sop-action">
                                <i class="bi bi-eye"></i> Preview
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Info Upload PDF -->
        <div class="alert alert-info mt-5" style="border-radius: 16px; border: none; background: #e3f2fd;">
            <div class="d-flex align-items-start">
                <i class="bi bi-info-circle-fill fs-4 me-3 text-primary"></i>
                <div>
                    <h6 class="fw-bold text-primary mb-2">Petunjuk Upload File SOP:</h6>
                    <p class="mb-2 small text-muted">
                        Upload file PDF SOP ke folder berikut:
                    </p>
                    <code class="d-block bg-white p-2 rounded mb-2" style="font-size: 12px;">
                        assets/uploads/sop/
                    </code>
                    <p class="mb-0 small text-muted">
                        Nama file harus sesuai: <strong>sop_sktm.pdf</strong>, <strong>sop_skd.pdf</strong>, dst.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- PDF PREVIEW MODAL dengan PDF.js -->
    <div class="modal fade modal-pdf" id="pdfModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <div class="modal-title">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                        <div>
                            <div id="modalSopTitle">SOP Title</div>
                            <small id="modalSopCode" class="opacity-75">SOP-XXX</small>
                        </div>
                    </div>
                    <div class="pdf-zoom">
                        <button onclick="zoomOut()" title="Zoom Out"><i class="bi bi-zoom-out"></i></button>
                        <span id="zoomLevel">100%</span>
                        <button onclick="zoomIn()" title="Zoom In"><i class="bi bi-zoom-in"></i></button>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <!-- Toolbar -->
                    <div class="pdf-toolbar">
                        <div class="pdf-info">
                            <span class="pdf-filename" id="pdfFilename">document.pdf</span>
                            <span class="pdf-badge-modal">PDF</span>
                        </div>
                        <div class="pdf-actions">
                            <a href="#" id="btnDownload" class="btn-pdf-action btn-pdf-download" download>
                                <i class="bi bi-download"></i>
                                Download
                            </a>
                            <a href="#" id="btnNewTab" class="btn-pdf-action btn-pdf-newtab" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                                Buka Tab Baru
                            </a>
                            <button type="button" class="btn-pdf-action btn-pdf-close" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                                Tutup
                            </button>
                        </div>
                    </div>

                    <!-- PDF Viewer dengan PDF.js -->
                    <div class="pdf-viewer-container" id="pdfViewerContainer">
                        <!-- Loading -->
                        <div class="pdf-loading" id="pdfLoading">
                            <i class="bi bi-arrow-repeat"></i>
                            <p>Memuat PDF...</p>
                        </div>

                        <!-- Error -->
                        <div class="pdf-error" id="pdfError">
                            <i class="bi bi-file-earmark-x"></i>
                            <h5>PDF Tidak Ditemukan</h5>
                            <p>File PDF mungkin belum diupload atau telah dihapus.</p>
                            <button class="btn btn-primary mt-2" onclick="retryLoadPdf()">
                                <i class="bi bi-arrow-clockwise me-2"></i>Coba Lagi
                            </button>
                            <br><br>
                            <a href="#" id="errorDownloadLink" class="btn btn-success" download>
                                <i class="bi bi-download me-2"></i>Download Langsung
                            </a>
                        </div>

                        <!-- Canvas untuk render PDF -->
                        <canvas id="pdf-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Fixed -->
        <div class="pdf-nav" id="pdfNav" style="display: none;">
            <button onclick="prevPage()" id="btnPrev" title="Halaman Sebelumnya">
                <i class="bi bi-chevron-left"></i>
            </button>
            <span class="pdf-page-info">
                <span id="currentPage">1</span> / <span id="totalPages">1</span>
            </span>
            <button onclick="nextPage()" id="btnNext" title="Halaman Selanjutnya">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Base URL untuk PDF - PASTIKAN INI BENAR
        const basePdfUrl = '<?php echo base_url("assets/uploads/sop/"); ?>';
        let currentPdfUrl = '';
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;
        let scale = 1.5;
        let pdfModal;

        // Elemen DOM
        const canvas = document.getElementById('pdf-canvas');
        const ctx = canvas.getContext('2d');

        document.addEventListener('DOMContentLoaded', function() {
            pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));

            document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function() {
                cleanupPdf();
            });
        });

        function cleanupPdf() {
            pdfDoc = null;
            currentPage = 1;
            totalPages = 0;
            document.getElementById('pdfLoading').style.display = 'flex';
            document.getElementById('pdfError').classList.remove('active');
            document.getElementById('pdfNav').style.display = 'none';
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            canvas.style.display = 'none';
        }

        function retryLoadPdf() {
            if (currentPdfUrl) {
                loadPdf(currentPdfUrl);
            }
        }

        function previewSop(filename, code, title) {
            // BERSIHKAN URL - hapus base_url jika sudah ada
            currentPdfUrl = basePdfUrl + filename;

            // Debug: cek URL di console
            console.log('PDF URL:', currentPdfUrl);

            document.getElementById('modalSopTitle').textContent = title;
            document.getElementById('modalSopCode').textContent = code;
            document.getElementById('pdfFilename').textContent = filename;
            document.getElementById('btnDownload').href = currentPdfUrl;
            document.getElementById('btnNewTab').href = currentPdfUrl;
            document.getElementById('errorDownloadLink').href = currentPdfUrl;

            pdfModal.show();

            setTimeout(() => {
                loadPdf(currentPdfUrl);
            }, 300);
        }

        // FIX UTAMA: Gunakan fetch dulu untuk cek file, baru render
        async function loadPdf(url) {
            try {
                document.getElementById('pdfLoading').style.display = 'flex';
                document.getElementById('pdfError').classList.remove('active');
                canvas.style.display = 'none';

                // SOLUSI 1: Coba dengan PDF.js dulu (untuk file kecil)
                const loadingTask = pdfjsLib.getDocument({
                    url: url,
                    withCredentials: false,
                    cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/cmaps/',
                    cMapPacked: true,
                });

                pdfDoc = await loadingTask.promise;

                // Jika berhasil, render dengan PDF.js
                totalPages = pdfDoc.numPages;
                document.getElementById('totalPages').textContent = totalPages;
                document.getElementById('currentPage').textContent = '1';

                if (totalPages > 1) {
                    document.getElementById('pdfNav').style.display = 'flex';
                }

                canvas.style.display = 'block';
                await renderPage(1);
                document.getElementById('pdfLoading').style.display = 'none';

            } catch (error) {
                console.error('PDF.js error:', error);

                // SOLUSI 2: Fallback ke iframe dengan Google Docs Viewer
                console.log('Trying iframe fallback...');
                useIframeViewer(url);
            }
        }



        async function renderPage(pageNum) {
            if (!pdfDoc) return;

            try {
                const page = await pdfDoc.getPage(pageNum);

                const containerWidth = document.getElementById('pdfViewerContainer').clientWidth - 40;
                const viewport = page.getViewport({
                    scale: 1
                });
                scale = (containerWidth / viewport.width) * 1.5; // 1.5x untuk kualitas lebih baik

                if (scale < 0.8) scale = 0.8;
                if (scale > 3) scale = 3;

                const scaledViewport = page.getViewport({
                    scale: scale
                });

                canvas.height = scaledViewport.height;
                canvas.width = scaledViewport.width;

                const renderContext = {
                    canvasContext: ctx,
                    viewport: scaledViewport
                };

                await page.render(renderContext).promise;

                currentPage = pageNum;
                document.getElementById('currentPage').textContent = currentPage;
                document.getElementById('zoomLevel').textContent = Math.round(scale * 100) + '%';

                document.getElementById('btnPrev').disabled = currentPage <= 1;
                document.getElementById('btnNext').disabled = currentPage >= totalPages;

            } catch (error) {
                console.error('Render error:', error);
            }
        }

        function prevPage() {
            if (currentPage > 1) {
                renderPage(currentPage - 1);
            }
        }

        function nextPage() {
            if (currentPage < totalPages) {
                renderPage(currentPage + 1);
            }
        }

        function zoomIn() {
            scale += 0.25;
            if (scale > 3) scale = 3;
            renderPage(currentPage);
        }

        function zoomOut() {
            scale -= 0.25;
            if (scale < 0.5) scale = 0.5;
            renderPage(currentPage);
        }

        // Search functionality
        document.getElementById('searchSop').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.sop-card');
            const categories = document.querySelectorAll('.category-section');
            let hasResult = false;

            cards.forEach(function(card) {
                const searchData = card.getAttribute('data-search');
                if (searchData.includes(searchTerm)) {
                    card.style.display = 'block';
                    hasResult = true;
                } else {
                    card.style.display = 'none';
                }
            });

            categories.forEach(function(cat) {
                const visibleCards = cat.querySelectorAll('.sop-card[style*="block"]');
                const allCards = cat.querySelectorAll('.sop-card');

                if (searchTerm === '') {
                    cat.style.display = 'block';
                    allCards.forEach(c => c.style.display = 'block');
                    hasResult = true;
                } else {
                    cat.style.display = visibleCards.length > 0 ? 'block' : 'none';
                }
            });

            document.getElementById('noResult').style.display = hasResult ? 'none' : 'block';
            document.getElementById('sopContainer').style.display = hasResult ? 'block' : 'none';
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (document.getElementById('pdfModal').classList.contains('show')) {
                if (e.key === 'ArrowLeft') prevPage();
                if (e.key === 'ArrowRight') nextPage();
                if (e.key === 'Escape') pdfModal.hide();
            }
        });
    </script>
</body>

</html>