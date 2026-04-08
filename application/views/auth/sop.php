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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>

    <style>
        :root {
            --primary-blue: #1e88e5;
            --dark-blue: #1565c0;
            --light-blue: #64b5f6;
            --accent-yellow: #ffd600;
            --bg-gradient: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        }

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

        .sop-title {
            font-size: 16px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
            line-height: 1.4;
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

        .btn-pdf-close {
            background: #dc3545;
            color: white;
        }

        .btn-pdf-close:hover {
            background: #c82333;
            color: white;
        }

        .pdf-scroll-container {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            background: #525659;
            padding: 20px;
            position: relative;
        }

        .pdf-pages-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            min-height: 100%;
        }

        .pdf-page-canvas {
            display: block;
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 100%;
            height: auto;
        }

        .pdf-page-label {
            color: #999;
            font-size: 12px;
            text-align: center;
            margin-top: -10px;
            margin-bottom: 10px;
        }

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

            .pdf-scroll-container {
                padding: 10px;
            }

            .pdf-pages-wrapper {
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <header class="header-modern">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 d-flex align-items-center gap-3">
                    <a href="<?php echo site_url('/'); ?>">
                        <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET" class="header-logo">
                    </a>
                    <div>
                        <div class="header-subtitle">Sistem Informasi Pelayanan</div>
                        <h1 class="header-title">KELURAHAN KALINYAMAT WETAN</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-lg-end text-md-end">
                    <a href="<?php echo site_url('home'); ?>" class="btn header-btn header-btn-register">
                        <i></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4 mb-5 animate-fade-in">
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

        <div class="search-container">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="search-box-sop" id="searchSop" placeholder="Cari SOP berdasarkan nama atau kode...">
        </div>

        <div class="no-result" id="noResult">
            <i class="bi bi-search"></i>
            <h5>Tidak ditemukan</h5>
            <p class="text-muted">SOP yang Anda cari tidak ditemukan.</p>
        </div>

        <div id="sopContainer">
            <div class="sop-grid">
                <?php
                // Array SOP dengan nama file yang benar
                $sop_files = array(
                    array('file' => 'SOP-Waris.pdf', 'code' => '', 'title' => 'SOP Tata Cara Legalisasi Surat Keterangan Waris', 'search' => 'waris surat keterangan waris'),
                    array('file' => 'SOP-Taksiran-Harga-Tanah.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Keterangan Taksiran Harga Tanah', 'search' => 'taksiran harga tanah'),
                    array('file' => 'SOP-Keterangan-Ghoib.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Keterangan Tidak Diketahui Keberadaannya (Ghoib)', 'search' => 'ghoib tidak diketahui'),
                    array('file' => 'SOP-Keterangan Satu Nama.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Keterangan Satu Nama', 'search' => 'satu nama'),
                    array('file' => 'SOP-Kesaksian-Kelahiran.pdf', 'code' => '', 'title' => 'SOP Tata Cara Pelayanan Surat Keterangan Kesaksian Kelahiran', 'search' => 'kesaksian kelahiran'),
                    array('file' => 'SOP-Kesaksian-Kematian.pdf', 'code' => '', 'title' => 'SOP Tata Cara Pelayanan Surat Keterangan Kesaksian Kematian', 'search' => 'kesaksian kematian'),
                    array('file' => 'SOP-PBG.pdf', 'code' => '', 'title' => 'SOP Tata Cara Legalisasi Persetujuan Bangunan Gedung (PBG)', 'search' => 'pbg bangunan gedung'),
                    // Tambahkan SOP-SKTM jika ada
                    array('file' => 'SOP-SKTM.pdf', 'code' => '', 'title' => 'SOP Surat Keterangan Tidak Mampu (SKTM)', 'search' => 'sktm tidak mampu'),
                    array('file' => 'SOP-SKCK.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Keterangan Catatan Kepolisian (SKCK)', 'search' => 'surat pengantar skck'),
                    array('file' => 'SOP-Ijin-Hajatan.pdf', 'code' => '', 'title' => 'SOP Tata Cara Pelayanan Surat Pengantar ljin Keramaian/Hajatan', 'search' => 'surat ijin hajatan'),
                    array('file' => 'SOP-Kehilangan.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Pengantar Kehilangan', 'search' => 'pengantar kehilangan'),
                    array('file' => 'SOP-Domisili-Usaha.pdf', 'code' => '', 'title' => 'SOP Tata Cara Pelayanan Surat Keterangan Domisili Tempat Usaha', 'search' => 'surat keterangan domisili usaha'),
                    array('file' => 'SOP-Bawa-Nikah.pdf', 'code' => '', 'title' => 'SOP Tata Cara Penerbitan Surat Keterangan Bawa Nikah', 'search' => 'surat bawa nikah'),
                    array('file' => 'SOP-Keterangan-lain.pdf', 'code' => '', 'title' => 'SOP Tata Cara Pelayanan Surat Keterangan Lain-lain', 'search' => 'surat keterangan lain'),
                );

                // Generate data PDF base64
                $pdfDataStore = array();
                foreach ($sop_files as $sop) {
                    $file_path = FCPATH . 'assets/uploads/sop/' . $sop['file'];
                    $base64_data = '';

                    if (file_exists($file_path) && is_readable($file_path)) {
                        $content = file_get_contents($file_path);
                        if ($content !== false && strlen($content) > 0) {
                            $base64_data = base64_encode($content);
                        }
                    }

                    $pdfDataStore[$sop['file']] = $base64_data;

                    // Tampilkan card hanya jika file ada
                    if (!empty($base64_data)) {
                ?>
                        <div class="sop-card" onclick="previewSop('<?php echo $sop['file']; ?>', '<?php echo $sop['code']; ?>', '<?php echo $sop['title']; ?>')" data-search="<?php echo $sop['search']; ?>">
                            <span class="pdf-badge"><i class="bi bi-file-earmark-pdf"></i>PDF</span>
                            <span class="sop-code"><?php echo $sop['code']; ?></span>
                            <h5 class="sop-title"><?php echo $sop['title']; ?></h5>
                            <div class="sop-meta">
                                <span class="sop-status"><i class="bi bi-check-circle-fill"></i> Aktif</span>
                                <span class="sop-action"><i class="bi bi-eye"></i> Preview</span>
                            </div>
                        </div>
                <?php
                    } else {
                        // Debug: tampilkan error di console
                        echo '<script>console.error("File tidak ditemukan: ' . $sop['file'] . ' (path: ' . $file_path . ')");</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade modal-pdf" id="pdfModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
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

                <div class="modal-body">
                    <div class="pdf-toolbar">
                        <div class="pdf-info">
                            <span class="pdf-filename" id="pdfFilename">document.pdf</span>
                            <span class="pdf-badge-modal">PDF</span>
                            <span id="pageCount" style="color: #666; font-size: 13px; margin-left: 10px;"></span>
                        </div>
                        <div class="pdf-actions">
                            <button type="button" class="btn-pdf-action btn-pdf-close" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i> Tutup
                            </button>
                        </div>
                    </div>

                    <div class="pdf-scroll-container" id="pdfScrollContainer">
                        <div class="pdf-loading" id="pdfLoading">
                            <i class="bi bi-arrow-repeat"></i>
                            <p>Memuat PDF...</p>
                        </div>

                        <div class="pdf-error" id="pdfError">
                            <i class="bi bi-file-earmark-x"></i>
                            <h5>Gagal Memuat PDF</h5>
                            <p id="errorMessage">File PDF tidak dapat dimuat.</p>
                            <button class="btn btn-primary mt-2" onclick="retryLoadPdf()">
                                <i class="bi bi-arrow-clockwise me-2"></i>Coba Lagi
                            </button>
                        </div>

                        <div class="pdf-pages-wrapper" id="pdfPagesWrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Data PDF dari PHP
        const pdfDataStore = <?php echo json_encode($pdfDataStore); ?>;

        let currentPdfBase64 = '';
        let currentFilename = '';
        let pdfModal;
        let currentPdf = null;
        let currentScale = 1.5;
        let totalPages = 0;

        document.addEventListener('DOMContentLoaded', function() {
            pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
            document.getElementById('pdfModal').addEventListener('hidden.bs.modal', cleanupPdf);

            document.addEventListener('keydown', function(e) {
                if (document.getElementById('pdfModal').classList.contains('show')) {
                    if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'p')) {
                        e.preventDefault();
                        return false;
                    }
                }
            });
        });

        function cleanupPdf() {
            currentPdf = null;
            currentScale = 1.5;
            totalPages = 0;

            const wrapper = document.getElementById('pdfPagesWrapper');
            wrapper.innerHTML = '';

            document.getElementById('pdfLoading').style.display = 'flex';
            document.getElementById('pdfError').classList.remove('active');
            document.getElementById('pageCount').textContent = '';
            document.getElementById('zoomLevel').textContent = '100%';
        }

        function previewSop(filename, code, title) {
            currentFilename = filename;
            currentPdfBase64 = pdfDataStore[filename];

            // Debug info
            console.log('Preview file:', filename);
            console.log('Data exists:', !!currentPdfBase64);
            console.log('Data length:', currentPdfBase64 ? currentPdfBase64.length : 0);

            if (!currentPdfBase64 || currentPdfBase64 === '') {
                alert('File PDF tidak ditemukan atau kosong: ' + filename + '\n\nPastikan file ada di folder assets/uploads/sop/');
                return;
            }

            document.getElementById('modalSopTitle').textContent = title;
            document.getElementById('modalSopCode').textContent = code;
            document.getElementById('pdfFilename').textContent = filename;

            pdfModal.show();
            setTimeout(() => loadPdfAllPages(currentPdfBase64), 300);
        }

        async function loadPdfAllPages(base64Data) {
            const loading = document.getElementById('pdfLoading');
            const error = document.getElementById('pdfError');
            const wrapper = document.getElementById('pdfPagesWrapper');

            loading.style.display = 'flex';
            error.classList.remove('active');
            wrapper.innerHTML = '';

            try {
                // Validasi base64
                if (!base64Data || base64Data.length === 0) {
                    throw new Error('Data PDF kosong');
                }

                // Convert base64 to Uint8Array
                let uint8Array;
                try {
                    const raw = window.atob(base64Data);
                    uint8Array = new Uint8Array(raw.length);
                    for (let i = 0; i < raw.length; i++) {
                        uint8Array[i] = raw.charCodeAt(i);
                    }
                } catch (e) {
                    throw new Error('Gagal decode base64: ' + e.message);
                }

                // Load PDF
                const loadingTask = pdfjsLib.getDocument({
                    data: uint8Array,
                    cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/cmaps/',
                    cMapPacked: true,
                    useSystemFonts: false
                });

                currentPdf = await loadingTask.promise;

                if (!currentPdf || currentPdf.numPages === 0) {
                    throw new Error('PDF kosong atau tidak valid (0 halaman)');
                }

                totalPages = currentPdf.numPages;
                document.getElementById('pageCount').textContent = '(' + totalPages + ' halaman)';

                // Render SEMUA halaman
                for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                    await renderPageToWrapper(pageNum, wrapper);
                }

                loading.style.display = 'none';
                document.getElementById('zoomLevel').textContent = Math.round(currentScale * 100) + '%';

            } catch (err) {
                console.error('PDF Error:', err);
                loading.style.display = 'none';
                document.getElementById('errorMessage').textContent = 'Error: ' + (err.message || 'Gagal memuat PDF');
                error.classList.add('active');
            }
        }

        async function renderPageToWrapper(pageNum, wrapper) {
            try {
                const page = await currentPdf.getPage(pageNum);
                const viewport = page.getViewport({
                    scale: currentScale
                });

                const pageContainer = document.createElement('div');
                pageContainer.style.display = 'flex';
                pageContainer.style.flexDirection = 'column';
                pageContainer.style.alignItems = 'center';

                const canvas = document.createElement('canvas');
                canvas.className = 'pdf-page-canvas';
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const ctx = canvas.getContext('2d');

                await page.render({
                    canvasContext: ctx,
                    viewport: viewport
                }).promise;

                const label = document.createElement('div');
                label.className = 'pdf-page-label';
                label.textContent = 'Halaman ' + pageNum + ' dari ' + totalPages;

                pageContainer.appendChild(canvas);
                pageContainer.appendChild(label);
                wrapper.appendChild(pageContainer);

            } catch (err) {
                console.error('Error rendering page ' + pageNum, err);
            }
        }

        function zoomIn() {
            if (currentScale < 3.0) {
                currentScale += 0.25;
                reRenderAllPages();
                document.getElementById('zoomLevel').textContent = Math.round(currentScale * 100) + '%';
            }
        }

        function zoomOut() {
            if (currentScale > 0.5) {
                currentScale -= 0.25;
                reRenderAllPages();
                document.getElementById('zoomLevel').textContent = Math.round(currentScale * 100) + '%';
            }
        }

        async function reRenderAllPages() {
            if (!currentPdf) return;

            const wrapper = document.getElementById('pdfPagesWrapper');
            wrapper.innerHTML = '';

            for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                await renderPageToWrapper(pageNum, wrapper);
            }
        }

        function retryLoadPdf() {
            if (currentPdfBase64) loadPdfAllPages(currentPdfBase64);
        }

        document.getElementById('searchSop').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.sop-card');
            let hasResult = false;

            cards.forEach(card => {
                const searchData = card.getAttribute('data-search');
                if (searchData.includes(searchTerm)) {
                    card.style.display = 'block';
                    hasResult = true;
                } else {
                    card.style.display = 'none';
                }
            });

            document.getElementById('noResult').style.display = hasResult ? 'none' : 'block';
        });

        document.getElementById('pdfModal').addEventListener('contextmenu', e => {
            e.preventDefault();
            return false;
        });
    </script>
</body>

</html>