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
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <!-- Custom CSS SIMPEL AWET -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <!-- PDF.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>

    <style>
        /* Container untuk scroll */
        #pdfViewerContainer iframe {
            width: 100%;
            height: 100%;
            border: none;
            background: white;
            min-height: 600px;
        }

        #pdfViewerContainer {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            background: #525659;
        }

        #pdfViewerContainer canvas {
            max-width: 100%;
            height: auto;
        }

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
    <header class="header-modern">
        <div class="container">
            <div class="row align-items-center">

                <!-- Logo & Title -->
                <div class="col-lg-6 col-md-6 d-flex align-items-center gap-3">
                    <a href="<?php echo site_url('/'); ?>">
                        <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                    </a>
                    <div>
                        <div class="header-subtitle">Sistem Informasi Pelayanan</div>
                        <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="col-lg-6 col-md-6 text-lg-end text-md-end">

                    <a href="<?php echo site_url('home'); ?>" class="btn header-btn header-btn-register">
                        <i></i> Kembali
                    </a>

                </div>

            </div>
        </div>
    </header>


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

            <div class="sop-grid">

                <!-- SOP 1: SKTM -->
                <div class="sop-card" onclick="previewSop('SOP-Waris.pdf', 'SOP-SK-001', 'Surat Keterangan Tidak Mampu')" data-search="sktm surat keterangan tidak mampu">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-001</span>
                    <h5 class="sop-title">SOP Tata Cara Legalisasi Surat Keterangan Waris</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-Taksiran-Harga-Tanah.pdf', 'SOP-SK-002', 'Surat Keterangan Domisili')" data-search="skd surat keterangan domisili">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-002</span>
                    <h5 class="sop-title">SOP Tata Cara Penerbitan Surat Keterangan Taksiran Harga Tanah</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-Keterangan-Ghoib.pdf', 'SOP-SK-003', 'Surat Keterangan Satu Nama')" data-search="sksn surat keterangan satu nama">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-003</span>
                    <h5 class="sop-title">SOP Tata Cara Penerbitan Surat Keterangan Tidak Diketahui Keberadaannya (Ghoib)</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-Keterangan Satu Nama.pdf', 'SOP-SK-004', 'Surat Keterangan Penghasilan Orang Tua')" data-search="skpo surat keterangan penghasilan orang tua">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>
                    <span class="sop-code">SOP-SK-004</span>
                    <h5 class="sop-title">SOP Tata Cara Penerbitan Surat Keterangan Satu Nama</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-Kesaksian-Kelahiran.pdf', 'SOP-SK-005', 'Surat Keterangan Belum Menikah')" data-search="skbm surat keterangan belum menikah">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-005</span>
                    <h5 class="sop-title">SOP Tata Cara Pelayanan Surat Keterangan Kesaksian Kelahiran</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-Kesaksian-Kematian.pdf', 'SOP-SK-006', 'Surat Keterangan Belum Memiliki Rumah')" data-search="skbr surat keterangan belum memiliki rumah">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-006</span>
                    <h5 class="sop-title">SOP Tata Cara Pelayanan Surat Keterangan Kesaksian Kematian</h5>
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
                <div class="sop-card" onclick="previewSop('SOP-PBG.pdf', 'SOP-SK-007', 'Surat Keterangan Kematian')" data-search="skm surat keterangan kematian">
                    <span class="pdf-badge">
                        <i class="bi bi-file-earmark-pdf"></i>PDF
                    </span>

                    <span class="sop-code">SOP-SK-007</span>
                    <h5 class="sop-title">SOP Tata Cara Legalisasi Persetujuan Bangunan Gedung (PBG)</h5>
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
        // Base URL untuk PDF
        const basePdfUrl = '<?php echo base_url("assets/uploads/sop/"); ?>';
        let currentPdfUrl = '';
        let pdfModal;

        document.addEventListener('DOMContentLoaded', function() {
            pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));

            document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function() {
                cleanupPdf();
            });
        });

        function cleanupPdf() {
            const container = document.getElementById('pdfViewerContainer');
            const loading = document.getElementById('pdfLoading');
            const error = document.getElementById('pdfError');

            container.innerHTML = '';
            container.appendChild(loading);
            container.appendChild(error);

            loading.style.display = 'flex';
            error.classList.remove('active');
        }

        function previewSop(filename, code, title) {
            currentPdfUrl = basePdfUrl + filename;

            // DEBUG: Lihat URL di console browser (tekan F12)
            console.log('PDF URL:', currentPdfUrl);
            console.log('Base URL:', basePdfUrl);
            console.log('Filename:', filename);

            document.getElementById('modalSopTitle').textContent = title;
            document.getElementById('modalSopCode').textContent = code;
            document.getElementById('pdfFilename').textContent = filename;
            document.getElementById('btnDownload').href = currentPdfUrl;
            document.getElementById('btnNewTab').href = currentPdfUrl;
            document.getElementById('errorDownloadLink').href = currentPdfUrl;

            pdfModal.show();

            // SOLUSI: Langsung pakai iframe saja (paling reliable)
            setTimeout(() => {
                useIframeViewer(currentPdfUrl);
            }, 300);
        }

        // SOLUSI UTAMA: Iframe Viewer (paling compatible)
        function useIframeViewer(url) {
            const container = document.getElementById('pdfViewerContainer');
            const loading = document.getElementById('pdfLoading');
            const error = document.getElementById('pdfError');

            // Bersihkan container
            container.innerHTML = '';
            container.appendChild(loading);
            container.appendChild(error);

            loading.style.display = 'flex';
            error.classList.remove('active');

            // Buat iframe untuk PDF
            const iframe = document.createElement('iframe');
            iframe.src = url;
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.border = 'none';
            iframe.style.background = 'white';

            // Event: PDF loaded
            iframe.onload = function() {
                console.log('PDF loaded successfully via iframe');
                loading.style.display = 'none';
            };

            // Event: PDF error
            iframe.onerror = function() {
                console.log('PDF failed to load via iframe');
                loading.style.display = 'none';
                error.classList.add('active');
            };

            // Insert iframe
            container.insertBefore(iframe, loading);

            // Timeout: sembunyikan loading setelah 2 detik (asumsi berhasil)
            setTimeout(() => {
                loading.style.display = 'none';
            }, 2000);
        }

        // SOLUSI ALTERNATIF: PDF.js (jika iframe tidak work)
        async function tryPdfJsViewer(url) {
            try {
                document.getElementById('pdfLoading').style.display = 'flex';
                document.getElementById('pdfError').classList.remove('active');

                const loadingTask = pdfjsLib.getDocument({
                    url: url,
                    withCredentials: false
                });

                const pdf = await loadingTask.promise;
                const totalPages = pdf.numPages;

                const container = document.getElementById('pdfViewerContainer');
                const loading = document.getElementById('pdfLoading');
                const error = document.getElementById('pdfError');

                container.innerHTML = '';
                container.appendChild(loading);
                container.appendChild(error);

                const wrapper = document.createElement('div');
                wrapper.style.padding = '20px';
                wrapper.style.display = 'flex';
                wrapper.style.flexDirection = 'column';
                wrapper.style.gap = '20px';
                wrapper.style.alignItems = 'center';

                for (let i = 1; i <= totalPages; i++) {
                    const page = await pdf.getPage(i);
                    const scale = 1.5;
                    const viewport = page.getViewport({
                        scale: scale
                    });

                    const canvas = document.createElement('canvas');
                    canvas.style.boxShadow = '0 4px 20px rgba(0,0,0,0.3)';
                    canvas.style.background = 'white';
                    canvas.style.maxWidth = '100%';

                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    await page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;

                    const pageLabel = document.createElement('div');
                    pageLabel.textContent = 'Halaman ' + i + ' dari ' + totalPages;
                    pageLabel.style.textAlign = 'center';
                    pageLabel.style.color = '#666';
                    pageLabel.style.fontSize = '12px';
                    pageLabel.style.marginTop = '5px';

                    const pageWrapper = document.createElement('div');
                    pageWrapper.style.display = 'flex';
                    pageWrapper.style.flexDirection = 'column';
                    pageWrapper.style.alignItems = 'center';
                    pageWrapper.appendChild(canvas);
                    pageWrapper.appendChild(pageLabel);

                    wrapper.appendChild(pageWrapper);
                }

                container.insertBefore(wrapper, loading);
                loading.style.display = 'none';
                document.getElementById('zoomLevel').textContent = '150%';

            } catch (err) {
                console.error('PDF.js error:', err);
                // Fallback ke iframe
                useIframeViewer(url);
            }
        }

        function retryLoadPdf() {
            if (currentPdfUrl) {
                useIframeViewer(currentPdfUrl);
            }
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
    </script>
</body>

</html>