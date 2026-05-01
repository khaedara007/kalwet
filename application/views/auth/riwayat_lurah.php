<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Lurah - Admin SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <link href="<?php echo base_url('assets/template1/css/admin.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <!-- Custom CSS SIMPEL AWET -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <style>
        /* Warna tema SIMPEL AWET - Biru Kelurahann */
        :root {
            --primary-blue: #1e88e5;
            --dark-blue: #1565c0;
            --light-blue: #64b5f6;
            --accent-yellow: #ffd600;
            --bg-gradient: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
        }

        /* Header Section */
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

        .page-header-custom::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 214, 0, 0.2);
            border-radius: 50%;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card-custom {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(30, 136, 229, 0.15);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary-blue);
        }

        .stat-card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(30, 136, 229, 0.25);
        }

        .stat-icon-custom {
            width: 60px;
            height: 60px;
            background: var(--bg-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
        }

        /* Lurah Cards Grid */
        .lurah-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .lurah-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
        }

        .lurah-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(30, 136, 229, 0.2);
        }

        .lurah-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: var(--bg-gradient);
            z-index: 0;
        }

        .lurah-image-container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding-top: 40px;
        }

        .lurah-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            background: #f0f0f0;
        }

        .lurah-image-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            background: var(--bg-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .lurah-image-placeholder i {
            font-size: 50px;
            color: white;
        }

        .lurah-info {
            padding: 20px 25px 25px;
            text-align: center;
        }

        .lurah-name {
            font-size: 20px;
            font-weight: 700;
            color: #1565c0;
            margin-bottom: 5px;
        }

        .lurah-period {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e3f2fd;
            color: #1976d2;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .lurah-period i {
            color: var(--accent-yellow);
        }

        /* Current Lurah Badge */
        .current-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-yellow);
            color: #1565c0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Empty State */
        .empty-lurah {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-lurah i {
            font-size: 80px;
            color: #bbdefb;
            margin-bottom: 20px;
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
    <!-- Navbar -->


    <div class="container mt-4 mb-5 animate-fade-in">

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert"
                style="border-radius: 12px; background: #d4edda; border-left: 4px solid #28a745;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                    <div><?php echo $this->session->flashdata('success'); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Page Header -->
        <div class="page-header-custom">
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">
                        <i class="bi bi-person-badge-fill me-2"></i>Riwayat Lurah Kalinyamat Wetan
                    </h2>
                    <p class="mb-0 opacity-75">Daftar Lurah Kelurahan Kalinyamat Wetan dari masa ke masa</p>
                </div>
            </div>
        </div>

        <!-- Lurah Cards - DATA HARDCODED DI SINI -->
        <div class="lurah-grid">

            <!-- LURAH 1 - AKTIF -->
            <div class="lurah-card">
                <div class="current-badge">
                    <i class="bi bi-check-circle-fill me-2"></i>LURAH AKTIF
                </div>

                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah8.png'); ?>"
                        alt="H. AHMAD SYAIFUDIN, S.Sos" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <!-- Placeholder jika foto tidak ada -->
                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">MARI, S.AP., N.LP</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2023 - Sekarang
                    </div>
                </div>
            </div>

            <!-- LURAH 2 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah7.png'); ?>"
                        alt="Drs. H. SUPRIYADI" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">TRI PRASETYO YUDHI UTOMO, S.STP., MM. </h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2021 - 2023
                    </div>

                    <p class="text-muted small mb-0" style="line-height: 1.5;">

                    </p>
                </div>
            </div>

            <!-- LURAH 3 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah6.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">MUHAMMAD GHOZALI, S.IP., M.Si.</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2017 - 2021
                    </div>
                </div>
            </div>

            <!-- LURAH 4 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah5.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">YANTA, SH</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2016 - 2017
                    </div>
                </div>
            </div>

            <!-- LURAH 5 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah4.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">URIP SETIYANTO, S.IP</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2014 - 2016
                    </div>
                </div>
            </div>

            <!-- LURAH 6 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah3.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">KAPRAWI</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2007 - 2014
                    </div>
                </div>
            </div>

            <!-- LURAH 7 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTiI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah2.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">ARIS SUROSO, SH., MM.</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2005 - 2007
                    </div>
                </div>
            </div>

            <!-- LURAH 8 -->
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/lurah1.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">NANANG BEDJO, BA</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        2002 - 2005
                    </div>
                </div>
            </div>

            <!-- TAMBAHKAN LURAH BARU DI BAWAH INI -->
            <!-- Copy template di atas dan sesuaikan nama, tahun, foto, dan keterangan -->

        </div>

    </div>

    <!-- Page Header -->
    <div class="container mt-4 mb-5 animate-fade-in">
        <div class="page-header-custom">
            <div class="row align-items-center position-relative" style="z-index: 1;">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">
                        <i class="bi bi-person-badge-fill me-2"></i>Riwayat Kepala Desa Kalinyamat Wetan
                    </h2>
                    <p class="mb-0 opacity-75">Daftar Kepala Desa Kalinyamat Wetan sebelum perubahan status menjadi Kelurahan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5 animate-fade-in">
        <!-- Lurah Cards - DATA HARDCODED DI SINI -->
        <div class="lurah-grid">
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/kepdes5.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">WASMAD EDI SUSILO</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        1998 - 2002
                    </div>
                </div>
            </div>
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/kepdes4.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">SUHARI</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        1989 - 1997
                    </div>
                </div>
            </div>
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/kepdes3.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">MUAWIYAH GUFRON</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        1988
                    </div>
                </div>
            </div>
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/kepdes2.jpeg'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">WARTONO</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        1972 - 1982
                    </div>
                </div>
            </div>
            <div class="lurah-card">
                <div class="lurah-image-container">
                    <!-- GANTI FOTO: Upload ke assets/uploads/lurah/ dan ubah nama file di bawah -->
                    <img src="<?php echo base_url('assets/kepdes1.png'); ?>"
                        alt="H. MUKHLIS, S.Pd" class="lurah-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div class="lurah-image-placeholder" style="display: none;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                </div>

                <div class="lurah-info">
                    <h4 class="lurah-name">SUDARYO</h4>

                    <div class="lurah-period">
                        <i class="bi bi-calendar3"></i>
                        Kepala Desa Pertama - 1971
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>