<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #f5f5f5 100%);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: white;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-menu {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        .navbar-menu a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .navbar-menu a:hover,
        .navbar-menu a.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }

        .navbar-menu a.logout {
            background: #e53935;
            color: white;
        }

        .navbar-menu a.logout:hover {
            background: #c62828;
        }

        /* Main Content */
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

        .date-info {
            text-align: right;
            color: #666;
        }

        .date-info .date {
            font-size: 16px;
            font-weight: 500;
        }

        .status-badge {
            background: #4caf50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 5px;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #1e88e5;
            color: white;
        }

        .btn-primary:hover {
            background: #1565c0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 136, 229, 0.3);
        }

        .btn-outline {
            background: white;
            color: #1e88e5;
            border: 2px solid #1e88e5;
        }

        .btn-outline:hover {
            background: #1e88e5;
            color: white;
        }

        .btn-warning {
            background: #ffa726;
            color: white;
        }

        .btn-warning:hover {
            background: #f57c00;
        }

        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            border-radius: 15px;
            padding: 25px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .stat-card.blue {
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
        }

        .stat-card.orange {
            background: linear-gradient(135deg, #ffa726 0%, #f57c00 100%);
        }

        .stat-card.green {
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
        }

        .stat-card.purple {
            background: linear-gradient(135deg, #ab47bc 0%, #8e24aa 100%);
        }

        .stat-icon {
            font-size: 40px;
            opacity: 0.3;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Content Card */
        .content-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header-custom h3 {
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body-custom {
            padding: 25px;
        }

        /* Search Box */
        .search-container {
            position: relative;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .search-container input:focus {
            outline: none;
            border-color: #1e88e5;
        }

        .search-container i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead th {
            background: #1e88e5;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s;
        }

        .data-table tbody tr:hover {
            background: #f8f9ff;
        }

        .data-table tbody td {
            padding: 15px;
            font-size: 14px;
            color: #555;
        }

        .data-table tbody tr:last-child {
            border-bottom: none;
        }

        /* Badges */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-primary {
            background: #e3f2fd;
            color: #1565c0;
        }

        .badge-success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        /* Buttons in Table */
        .btn-table {
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-pdf {
            background: #e53935;
            color: white;
        }

        .btn-pdf:hover {
            background: #c62828;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(229, 57, 53, 0.3);
        }

        .btn-view {
            background: #1e88e5;
            color: white;
        }

        .btn-view:hover {
            background: #1565c0;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: #666;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            margin-bottom: 25px;
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #4caf50;
        }

        .alert-danger {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #e53935;
        }

        .alert i {
            font-size: 20px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            color: #666;
            font-size: 13px;
        }

        .footer-brand {
            color: #1e88e5;
            font-weight: 600;
        }

        /* Info Text */
        .info-text {
            color: #888;
            font-size: 12px;
        }

        .primary-text {
            color: #1e88e5;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-menu {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="fas fa-shield-alt"></i>
            Admin Panel
        </div>
        <ul class="navbar-menu">
            <li><a href="<?php echo base_url('admin/suratkematian'); ?>" class="active"><i class="fas fa-file-alt"></i> Surat Kematian</a></li>
            <li><a href="<?php echo base_url('admin/requests'); ?>"><i class="fas fa-clipboard-list"></i> Permohonan</a></li>
            <li><a href="<?php echo base_url('admin/users'); ?>"><i class="fas fa-users"></i> Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/ratings'); ?>"><i class="fas fa-star"></i> Rating</a></li>
            <li><a href="<?php echo base_url('admin/logout'); ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Surat Keterangan Kematian</h1>
                <p class="page-subtitle">Kelola pembuatan dan cetak surat keterangan kematian</p>
            </div>
            <div class="date-info">
                <div class="date"><?php echo date('l, d F Y'); ?></div>
                <span class="status-badge"><i class="fas fa-circle" style="font-size: 8px;"></i> Online</span>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="<?php echo base_url('admin/suratkematian/create'); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Surat Baru
            </a>
            <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <!-- Alerts -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card orange">
                <div class="stat-value"><?php echo count($surat); ?></div>
                <div class="stat-label">Total Surat</div>
                <i class="fas fa-file-alt stat-icon"></i>
            </div>
            <div class="stat-card blue">
                <div class="stat-value">
                    <?php
                    $tahun_ini = 0;
                    foreach ($surat as $s) {
                        if ($s->tahun == date('Y')) $tahun_ini++;
                    }
                    echo $tahun_ini;
                    ?>
                </div>
                <div class="stat-label">Tahun <?php echo date('Y'); ?></div>
                <i class="fas fa-calendar stat-icon"></i>
            </div>
            <div class="stat-card green">
                <div class="stat-value">
                    <?php
                    $bulan_ini = 0;
                    foreach ($surat as $s) {
                        if (date('m-Y', strtotime($s->created_at)) == date('m-Y')) $bulan_ini++;
                    }
                    echo $bulan_ini;
                    ?>
                </div>
                <div class="stat-label">Bulan Ini</div>
                <i class="fas fa-calendar-alt stat-icon"></i>
            </div>
        </div>

        <!-- Data Table Card -->
        <div class="content-card">
            <div class="card-header-custom">
                <h3><i class="fas fa-list"></i> Daftar Surat Keterangan Kematian</h3>
                <span class="badge badge-primary"><?php echo count($surat); ?> Data</span>
            </div>
            <div class="card-body-custom">

                <!-- Search -->
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama almarhum, nomor surat, atau nama pelapor...">
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table class="data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Nomor Surat</th>
                                <th width="20%">Nama Almarhum</th>
                                <th width="12%">Tgl Meninggal</th>
                                <th width="18%">Nama Pelapor</th>
                                <th width="12%">Tgl Dibuat</th>
                                <th width="18%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($surat)): ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox"></i>
                                            <h4>Belum Ada Data</h4>
                                            <p>Belum ada surat kematian yang dibuat. Silakan buat surat pertama.</p>
                                            <a href="<?php echo base_url('admin/suratkematian/create'); ?>" class="btn btn-primary">
                                                <i class="fas fa-plus"></i> Buat Surat Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1;
                                foreach ($surat as $row): ?>
                                    <tr>
                                        <td class="primary-text">#<?php echo $no++; ?></td>
                                        <td>
                                            <span class="badge badge-primary"><?php echo $row->nomor_surat; ?></span>
                                        </td>
                                        <td>
                                            <strong><?php echo $row->nama_meninggal; ?></strong>
                                            <br>
                                            <span class="info-text"><i class="fas fa-id-card"></i> <?php echo $row->nik_meninggal; ?></span>
                                        </td>
                                        <td>
                                            <strong><?php echo date('d/m/Y', strtotime($row->tanggal_meninggal)); ?></strong>
                                            <br>
                                            <span class="info-text"><?php echo $row->hari_meninggal; ?></span>
                                        </td>
                                        <td>
                                            <strong><?php echo $row->nama_pelapor; ?></strong>
                                            <br>
                                            <span class="info-text"><i class="fas fa-user-tag"></i> <?php echo $row->hubungan_pelapor; ?></span>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y', strtotime($row->created_at)); ?>
                                            <br>
                                            <span class="info-text"><?php echo date('H:i', strtotime($row->created_at)); ?> WIB</span>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('admin/suratkematian/pdf/' . $row->id); ?>"
                                                class="btn-table btn-pdf" target="_blank">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </a>
                                            <a href="<?php echo base_url('admin/suratkematian/edit/' . $row->id); ?>"
                                                class="btn-table btn-view" title="Edit Surat">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <button class="btn-table btn-view"
                                                onclick="showDetail('<?php echo $row->nama_meninggal; ?>', '<?php echo $row->alamat; ?>', '<?php echo $row->tempat_meninggal; ?>', '<?php echo $row->penyebab_kematian; ?>')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2026 <span class="footer-brand">SIMPEL AWET</span> - Kelurahan Kalinyamat Wetan
            <br>
            <span style="color: #1e88e5;">Sistem Informasi Pelayanan Modern</span>
        </div>

    </div>

    <!-- Script -->
    <script>
        // Search Function
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(function(row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.indexOf(input) > -1 ? '' : 'none';
            });
        });

        // Detail Modal
        function showDetail(nama, alamat, tempat, penyebab) {
            alert('Detail Almarhum:\n\n' +
                'Nama: ' + nama + '\n\n' +
                'Alamat: ' + alamat + '\n\n' +
                'Tempat Meninggal: ' + tempat + '\n\n' +
                'Penyebab: ' + penyebab);
        }
    </script>

</body>

</html>