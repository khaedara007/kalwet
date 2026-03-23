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
        /* Table Styles */
        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #198754 0%, #20c997 100%);
            color: white;
            padding: 25px;
        }

        .custom-table {
            width: 100%;
            margin-bottom: 0;
        }

        .custom-table thead th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px;
            border-bottom: 2px solid #e9ecef;
            white-space: nowrap;
        }

        .custom-table tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }

        .custom-table tbody tr:hover {
            background: #f8f9fa;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Applicant Cell */
        .applicant-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .applicant-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .applicant-info h6 {
            margin: 0;
            font-weight: 600;
            color: #212529;
        }

        .applicant-info small {
            color: #6c757d;
            font-size: 12px;
        }

        /* Service Badge */
        .service-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #e3f2fd;
            color: #1976d2;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        /* Date Cell */
        .date-cell {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .date-main {
            font-weight: 500;
            color: #212529;
        }

        .date-sub {
            font-size: 12px;
            color: #6c757d;
        }

        /* Status Badge */
        .status-completed {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #d1e7dd;
            color: #0f5132;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Document Buttons */
        .doc-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .doc-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 10px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            text-decoration: none;
            color: #495057;
            font-size: 12px;
            transition: all 0.2s ease;
        }

        .doc-btn:hover {
            border-color: #198754;
            color: #198754;
            background: #f8f9fa;
        }

        .doc-btn.result {
            background: #198754;
            color: white;
            border-color: #198754;
        }

        .doc-btn.result:hover {
            background: #157347;
        }

        /* Search & Filter Bar */
        .filter-bar {
            background: white;
            padding: 20px 25px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            padding: 10px 15px 10px 40px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            font-size: 14px;
            width: 100%;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .filter-select {
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            font-size: 14px;
            min-width: 150px;
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
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

        /* Pagination */
        .pagination-container {
            padding: 20px 25px;
            background: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Empty State */
        .empty-table {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-table i {
            font-size: 64px;
            color: #dee2e6;
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .table-responsive {
                border-radius: 16px;
            }
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

    <div class="container mt-4 mb-5 animate-fade-in">
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
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="fw-bold text-success mb-1">
                    <i class="bi bi-clock-history me-2"></i>Riwayat Pelayanan
                </h2>
                <p class="text-muted mb-0">Daftar permohonan yang telah selesai diproses</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="<?php echo site_url('admin/export_history'); ?>" class="btn btn-success">
                    <i class="bi bi-download me-2"></i>Export Excel
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4"><?php echo count($history); ?></div>
                    <small class="text-muted">Total Selesai</small>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <div class="fw-bold fs-4">
                        <?php
                        $this_month = 0;
                        foreach ($history as $h) {
                            if (date('m-Y', strtotime($h->completed_at)) == date('m-Y')) $this_month++;
                        }
                        echo $this_month;
                        ?>
                    </div>
                    <small class="text-muted">Bulan Ini</small>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-table me-2"></i>Data Riwayat
                        </h5>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="opacity-75">
                            <i class="bi bi-info-circle me-1"></i>
                            Klik pada dokumen untuk melihat detail
                        </small>
                    </div>
                </div>
            </div>

            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama, NIK, atau jenis layanan...">
                </div>
                <select class="filter-select" id="filterService">
                    <option value="">Semua Layanan</option>
                    <option value="sktm">SK Tidak Mampu</option>
                    <option value="skd">SK Domisili</option>
                    <option value="sksn">SK Satu Nama</option>
                    <option value="skpo">SK Penghasilan</option>
                    <option value="skbm">SK Belum Menikah</option>
                    <option value="skbr">SK Belum Rumah</option>
                    <option value="sih">Izin Hajatan</option>
                    <option value="skck">Pengantar SKCK</option>
                    <option value="spkd">Kehilangan Dokumen</option>
                    <option value="skm">SK Kematian</option>
                    <option value="skl">SK Kelahiran</option>
                </select>
                <select class="filter-select" id="filterMonth">
                    <option value="">Semua Bulan</option>
                    <?php for ($i = 0; $i < 12; $i++):
                        $month = date('m-Y', strtotime("-$i months"));
                        $month_label = date('F Y', strtotime("-$i months"));
                    ?>
                        <option value="<?php echo $month; ?>"><?php echo $month_label; ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="custom-table" id="historyTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemohon</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($history)): ?>
                            <?php
                            $no = 1;
                            $service_names = array(
                                'sktm' => 'SK Tidak Mampu',
                                'skd' => 'SK Domisili',
                                'sksn' => 'SK Satu Nama',
                                'skpo' => 'SK Penghasilan Ortu',
                                'skbm' => 'SK Belum Menikah',
                                'skbr' => 'SK Belum Punya Rumah',
                                'sih' => 'Izin Hajatan',
                                'skck' => 'Pengantar SKCK',
                                'spkd' => 'Kehilangan Dokumen',
                                'skm' => 'SK Kematian',
                                'skl' => 'SK Kelahiran'
                            );

                            foreach ($history as $h):
                                $service_name = isset($service_names[$h->service_type]) ? $service_names[$h->service_type] : $h->service_type;

                                // Count documents
                                $doc_count = 0;
                                $doc_fields = [
                                    'upload_suratrtrw',
                                    'upload_kk',
                                    'upload_ktp',
                                    'upload_pbb',
                                    'upload_aktal',
                                    'upload_aktan',
                                    'upload_identitaslain',
                                    'upload_ktpp',
                                    'upload_ktps1',
                                    'upload_ktps2',
                                    'upload_suketdok'
                                ];
                                foreach ($doc_fields as $field) {
                                    if (!empty($h->$field)) $doc_count++;
                                }
                            ?>
                                <tr data-service="<?php echo $h->service_type; ?>"
                                    data-month="<?php echo date('m-Y', strtotime($h->completed_at)); ?>"
                                    data-search="<?php echo strtolower($h->name . ' ' . $h->nik . ' ' . $service_name); ?>">
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <div class="applicant-cell">
                                            <div class="applicant-avatar">
                                                <?php echo strtoupper(substr($h->name, 0, 1)); ?>
                                            </div>
                                            <div class="applicant-info">
                                                <h6><?php echo $h->name; ?></h6>
                                                <small>NIK: <?php echo $h->nik; ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="service-badge">
                                            <i class="bi bi-file-earmark-text"></i>
                                            <?php echo $service_name; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-main"><?php echo date('d M Y', strtotime($h->submitted_at)); ?></span>
                                            <span class="date-sub"><?php echo date('H:i', strtotime($h->submitted_at)); ?> WIB</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-cell">
                                            <span class="date-main"><?php echo date('d M Y', strtotime($h->completed_at)); ?></span>
                                            <span class="date-sub"><?php echo date('H:i', strtotime($h->completed_at)); ?> WIB</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-completed">
                                            <i class="bi bi-check-circle-fill"></i>
                                            SELESAI
                                        </span>
                                    </td>
                                    <td>
                                        <div class="doc-btn-group">
                                            <?php if ($doc_count > 0): ?>
                                                <button class="doc-btn" onclick="showDocuments(<?php echo $h->id; ?>)">
                                                    <i class="bi bi-folder"></i>
                                                    <?php echo $doc_count; ?> Dokumen
                                                </button>
                                            <?php endif; ?>

                                            <?php if (!empty($h->completed_document)): ?>
                                                <a href="<?php echo base_url('assets/uploads/completed/' . $h->completed_document); ?>"
                                                    target="_blank" class="doc-btn result">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                    Hasil
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Hidden Document Modal Content -->
                                <div id="docs-<?php echo $h->id; ?>" style="display: none;">
                                    <div class="list-group">
                                        <?php
                                        $documents = array(
                                            'upload_suratrtrw' => array('icon' => 'bi-envelope', 'label' => 'Surat Pengantar RT/RW'),
                                            'upload_kk' => array('icon' => 'bi-people', 'label' => 'Kartu Keluarga'),
                                            'upload_ktp' => array('icon' => 'bi-person-vcard', 'label' => 'KTP'),
                                            'upload_pbb' => array('icon' => 'bi-house-fill', 'label' => 'PBB'),
                                            'upload_aktal' => array('icon' => 'bi-file-text', 'label' => 'Akta Kelahiran'),
                                            'upload_aktan' => array('icon' => 'bi-heart', 'label' => 'Akta Nikah'),
                                            'upload_identitaslain' => array('icon' => 'bi-folder', 'label' => 'Identitas Lain'),
                                            'upload_ktpp' => array('icon' => 'bi-person', 'label' => 'KTP Pelapor'),
                                            'upload_ktps1' => array('icon' => 'bi-person-check', 'label' => 'KTP Saksi 1'),
                                            'upload_ktps2' => array('icon' => 'bi-person-check-fill', 'label' => 'KTP Saksi 2'),
                                            'upload_suketdok' => array('icon' => 'bi-file-medical', 'label' => 'Surat Keterangan Dokter')
                                        );

                                        foreach ($documents as $field => $doc):
                                            if (!empty($h->$field)):
                                        ?>
                                                <a href="<?php echo base_url('assets/uploads/documents/' . $h->$field); ?>"
                                                    target="_blank" class="list-group-item list-group-item-action d-flex align-items-center gap-2">
                                                    <i class="bi <?php echo $doc['icon']; ?> text-primary"></i>
                                                    <?php echo $doc['label']; ?>
                                                    <i class="bi bi-box-arrow-up-right ms-auto text-muted small"></i>
                                                </a>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">
                                    <div class="empty-table">
                                        <i class="bi bi-inbox"></i>
                                        <h5>Belum Ada Data</h5>
                                        <p class="text-muted">Belum ada permohonan yang selesai diproses.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if (!empty($history)): ?>
                <div class="pagination-container">
                    <small class="text-muted">
                        Menampilkan <strong><?php echo count($history); ?></strong> data
                    </small>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary btn-sm" disabled>
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="btn btn-success btn-sm">1</button>
                        <button class="btn btn-outline-secondary btn-sm" disabled>
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Document Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-folder me-2"></i>Dokumen Lampiran
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" id="modalContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            filterTable();
        });

        // Filter by service
        document.getElementById('filterService').addEventListener('change', function() {
            filterTable();
        });

        // Filter by month
        document.getElementById('filterMonth').addEventListener('change', function() {
            filterTable();
        });

        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const serviceFilter = document.getElementById('filterService').value;
            const monthFilter = document.getElementById('filterMonth').value;
            const rows = document.querySelectorAll('#historyTable tbody tr[data-service]');

            rows.forEach(function(row) {
                const searchData = row.getAttribute('data-search');
                const service = row.getAttribute('data-service');
                const month = row.getAttribute('data-month');

                const matchSearch = searchData.includes(searchTerm);
                const matchService = !serviceFilter || service === serviceFilter;
                const matchMonth = !monthFilter || month === monthFilter;

                if (matchSearch && matchService && matchMonth) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Show documents modal
        function showDocuments(id) {
            const content = document.getElementById('docs-' + id).innerHTML;
            document.getElementById('modalContent').innerHTML = content;
            new bootstrap.Modal(document.getElementById('documentModal')).show();
        }
    </script>
</body>

</html>