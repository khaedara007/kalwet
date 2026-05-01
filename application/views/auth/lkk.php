<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur RT/RW - Kelurahan Kalinyamat Wetan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/template1/css/styles.css') ?>" rel="stylesheet" />
    <!-- Custom CSS SIMPEL AWET -->
    <link href="<?php echo base_url('assets/template1/css/custom.css') ?>" rel="stylesheet" />
    <style>
        :root {
            --primary-blue: #1976d2;
            --dark-blue: #1565c0;
            --accent-yellow: #ffd600;
            --bg-light: #f0f4f8;
            --card-bg: #ffffff;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg-light);
        }

        /* Hero Section - Sesuai tema biru website */
        .hero-section {
            position: relative;
            height: 280px;
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
        }

        .hero-content h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 20px;
        }

        .btn-struktur {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 28px;
            border-radius: 50px;
            font-weight: 500;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-struktur:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Section Title */
        .section-title {
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* RW Cards Grid - Sesuai kartu lurah */
        .rw-section {
            padding: 20px 0 60px;
        }

        .rw-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .rw-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
        }

        .rw-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(25, 118, 210, 0.15);
        }

        /* Header card biru seperti kartu lurah */
        .rw-card-header {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            padding: 25px 20px 20px;
            text-align: center;
            position: relative;
        }

        .rw-icon-circle {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .rw-icon-circle i {
            font-size: 1.8rem;
            color: var(--primary-blue);
        }

        .rw-card-header h3 {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
        }

        .rw-card-body {
            padding: 25px;
        }

        .rw-info {
            margin-bottom: 12px;
            color: #495057;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .rw-info i {
            color: var(--primary-blue);
            margin-top: 3px;
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .rw-info strong {
            color: var(--text-dark);
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
        }

        .rw-periode {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e3f2fd;
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 20px;
            margin-top: 5px;
        }

        .btn-lihat-rt {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 20px;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-lihat-rt:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.3);
        }

        /* Modal RT */
        .modal-rt .modal-dialog {
            max-width: 600px;
        }

        .modal-rt .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-rt .modal-header {
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
            color: white;
            border-bottom: none;
            padding: 20px 30px;
        }

        .modal-rt .modal-title {
            font-weight: 700;
            font-size: 1.3rem;
        }

        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .modal-rt .modal-body {
            padding: 30px;
            background: #f8f9fa;
            max-height: 70vh;
            overflow-y: auto;
        }

        /* RT Item dalam Modal */
        .rt-item {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .rt-item:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .rt-item:last-child {
            margin-bottom: 0;
        }

        .rt-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e3f2fd;
        }

        .rt-icon-circle {
            width: 45px;
            height: 45px;
            background: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rt-icon-circle i {
            font-size: 1.2rem;
            color: var(--primary-blue);
        }

        .rt-header h5 {
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
            font-size: 1.15rem;
        }

        .rt-detail {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 10px;
            color: #495057;
            font-size: 0.95rem;
        }

        .rt-detail i {
            color: var(--primary-blue);
            margin-top: 3px;
            font-size: 0.9rem;
            width: 20px;
            text-align: center;
        }

        .rt-detail strong {
            color: var(--text-dark);
            font-weight: 600;
        }

        /* Badge periode */
        .periode-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e3f2fd;
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 20px;
            margin-top: 5px;
        }

        /* Scrollbar custom */
        .modal-rt .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-rt .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .modal-rt .modal-body::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 240px;
                border-radius: 0 0 20px 20px;
            }

            .hero-content h1 {
                font-size: 1.6rem;
            }

            .rw-grid {
                grid-template-columns: 1fr;
            }

            .modal-rt .modal-dialog {
                margin: 10px;
                max-width: 100%;
            }
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
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><i class="bi bi-building me-2"></i>Data Resmi Struktur RT/RW , LPMK dan Karang Taruna</h1>
                <p>Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan - Kota Tegal<br></p>
                <button class="btn-struktur" onclick="scrollToRW()">
                    <i class="bi bi-people-fill"></i> Lihat Struktur
                </button>
            </div>
        </div>
    </section>

    <!-- RW Section -->
    <section class="rw-section" id="rwSection">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Struktur RT/RW</h2>
                    <p class="section-subtitle">Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan</p>
                </div>
            </div>

            <div class="rw-grid">
                <?php
                // Data RW dan RT
                $data_rw = [
                    [
                        'rw' => 'RW 1',
                        'ketua_rw' => 'ENDAR SUWARMAN',
                        'sekretaris_rw' => 'PAKHRUROJI',
                        'bendahara_rw' => 'YUDI PRASETYO',
                        'periode' => '2026-2030',
                        'rt' => [
                            [
                                'rt' => 'RT 1',
                                'ketua' => 'RADI HANTONO',
                                'sekretaris' => 'RISKI ROMADHONI',
                                'bendahara' => 'HARI SUHARTO',
                                'alamat' => 'Jl. Slamet Gg. Elbahar No 13',
                                'hp' => '082138624827',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 2',
                                'ketua' => 'SUPRIYATIN',
                                'sekretaris' => 'TEMU MUGIANTO',
                                'bendahara' => 'SOLIKHUN',
                                'alamat' => 'Jl. SLAMET GG ELBAHAR NO 19',
                                'hp' => '087788426201',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 3',
                                'ketua' => 'ABDUL HARIS M',
                                'sekretaris' => 'SUHARI',
                                'bendahara' => 'RUKUN DIHARTO',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 4',
                                'ketua' => 'SUPRAYOGI',
                                'sekretaris' => 'CASMUN',
                                'bendahara' => 'AHMAD IRVAN PITIR',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 5',
                                'ketua' => 'SARWONO',
                                'sekretaris' => 'WAHID ABDULLOH',
                                'bendahara' => 'MOH. ARRIZA Z',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ]
                        ]
                    ],
                    [
                        'rw' => 'RW 2',
                        'ketua_rw' => 'KUSNADI',
                        'sekretaris_rw' => 'AGUNG NUGROHO S',
                        'bendahara_rw' => 'GILANG LIDYAHATLAND',
                        'periode' => '2026-2030',
                        'rt' => [
                            [
                                'rt' => 'RT 1',
                                'ketua' => 'TARMUDI',
                                'sekretaris' => 'KUSTOMO',
                                'bendahara' => 'KARTONO',
                                'alamat' => 'Jl. Kalibuntu No 5',
                                'hp' => '081234567890',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 2',
                                'ketua' => 'RISTONO',
                                'sekretaris' => 'ABDUL ROCHMAN',
                                'bendahara' => 'RATIM',
                                'alamat' => 'Jl. Kalibuntu Gg. Mawar',
                                'hp' => '082345678901',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 3',
                                'ketua' => 'AGUS HARYOSO',
                                'sekretaris' => 'FERI MAHFUDI',
                                'bendahara' => 'MOH. ABDUL ROZAK',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 4',
                                'ketua' => 'TARMO',
                                'sekretaris' => 'EKO YULIANTO',
                                'bendahara' => 'SURATNO',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 5',
                                'ketua' => 'HJ. NURBAETI',
                                'sekretaris' => 'TONINGSIH',
                                'bendahara' => 'WARSINAH',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ]
                        ]
                    ],
                    [
                        'rw' => 'RW 3',
                        'ketua_rw' => 'SUNARTO',
                        'sekretaris_rw' => 'SOFIYAH',
                        'bendahara_rw' => 'SALAMUN',
                        'periode' => '2026-2030',
                        'rt' => [
                            [
                                'rt' => 'RT 1',
                                'ketua' => 'DUROCHMAN',
                                'sekretaris' => 'MOH. TRI MULYONO',
                                'bendahara' => 'ADITIA INDRAWAN',
                                'alamat' => 'Jl. KH. Mukhlas No 10',
                                'hp' => '083456789012',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 2',
                                'ketua' => 'SUPARDI',
                                'sekretaris' => 'MOH PANJI GUMILANG PRADANA',
                                'bendahara' => 'RIO INDRAYANA',
                                'alamat' => 'Jl. KH. Mukhlas Gg. Melati',
                                'hp' => '084567890123',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 3',
                                'ketua' => 'KARTONO',
                                'sekretaris' => 'RUSTANDING',
                                'bendahara' => 'SUGRI',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 4',
                                'ketua' => 'SEGER WARSITO',
                                'sekretaris' => 'NIKO HENDRI IRAWAN',
                                'bendahara' => 'SIMAN',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 5',
                                'ketua' => 'SRI WAHYONO',
                                'sekretaris' => 'HARYANIH',
                                'bendahara' => 'NINING SUPRIYATININGSIH',
                                'alamat' => 'KALIBUNTU BARAT',
                                'hp' => '085692315565',
                                'periode' => '2026-2030'
                            ]
                        ]
                    ],
                    [
                        'rw' => 'RW 4',
                        'ketua_rw' => 'ARIF HARTONO',
                        'sekretaris_rw' => 'MOH. HAMZAH',
                        'bendahara_rw' => 'VERAWATI',
                        'periode' => '2026-2030',
                        'rt' => [
                            [
                                'rt' => 'RT 1',
                                'ketua' => 'SUNITA',
                                'sekretaris' => 'YAYU HIDYA PRASTYANI',
                                'bendahara' => 'HENI TRIANA',
                                'alamat' => 'Jl. KH. Zaenal Arifin No 15',
                                'hp' => '085678901234',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 2',
                                'ketua' => 'WARNINGSIH',
                                'sekretaris' => 'MUHAMAD RIDWAN KHOLIL',
                                'bendahara' => 'AHMAD JAENI',
                                'alamat' => 'Jl. KH. Zaenal Arifin Gg. Anggrek',
                                'hp' => '086789012345',
                                'periode' => '2026-2030'
                            ],
                            [
                                'rt' => 'RT 3',
                                'ketua' => 'WARSIDIK',
                                'sekretaris' => 'DARSONO',
                                'bendahara' => 'HERU SANTOSO',
                                'alamat' => 'Jl. KH. Zaenal Arifin Gg. Anggrek',
                                'hp' => '086789012345',
                                'periode' => '2026-2030'
                            ]
                        ]
                    ]
                ];

                foreach ($data_rw as $index => $rw) {
                ?>
                    <div class="rw-card">
                        <div class="rw-card-header">
                            <div class="rw-icon-circle">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3><?php echo $rw['rw']; ?></h3>
                        </div>

                        <div class="rw-card-body">
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Ketua RW</strong>
                                    <?php echo $rw['ketua_rw']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Sekretaris</strong>
                                    <?php echo $rw['sekretaris_rw']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Bendahara</strong>
                                    <?php echo $rw['bendahara_rw']; ?>
                                </div>
                            </div>

                            <div class="rw-periode">
                                <i class="bi bi-calendar3"></i>
                                <span><?php echo $rw['periode']; ?></span>
                            </div>

                            <button class="btn-lihat-rt" onclick="showRT(<?php echo $index; ?>)">
                                <i class="bi bi-eye"></i> Lihat RT
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <br>
            <br>
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Struktur LPMK dan Karang Taruna</h2>
                    <p class="section-subtitle">Kelurahan Kalinyamat Wetan - Kecamatan Tegal Selatan</p>
                </div>
            </div>
            <div class="rw-grid">
                <?php
                // Data LPMK DAN KATAR
                $data_lpmk = [
                    [
                        'lpmk' => 'LPMK',
                        'ketua_lpmk' => 'EDI MARJONI, S.Pd',
                        'sekretaris_lpmk' => 'DIYAH EMININGSIH',
                        'bendahara_lpmk' => 'SUHARTI',
                        'seksi_trantib' => 'SODIKIN',
                        'seksi_fkub' => 'MUIN',
                        'seksi_olahraga' => 'IWAN PRAKOSO',
                        'seksi_sosial' => 'WARIDI',
                        'periode' => '2026-2030',

                    ],
                    [
                        'lpmk' => 'KARANG TARUNA',
                        'ketua_lpmk' => 'PANGGARJITO DWI CAHYO',
                        'sekretaris_lpmk' => 'ZAENAL ARIFIN',
                        'bendahara_lpmk' => 'BUNGA AMELIA WINDASARI',
                        'bidang_kerohanian' => 'FIKRAH FIRJATULLAH',
                        'bidang_kelompok' => 'JUWITA REVINA',
                        'bidang_usaha' => 'NAELA SAWAIS SABILA',
                        'bidang_lingkungan' => 'WIANDIRA NAJUNDA PUTRI',
                        'bidang_olahraga' => 'AGUNG NUGROHO SAPUTRO',
                        'bidang_pendidikan' => 'MOHAMMAD TAUFIQQROHMAN',
                        'periode' => '2026-2030'

                    ]
                ];

                foreach ($data_lpmk as $index => $lpmk) {
                ?>
                    <div class="rw-card">
                        <div class="rw-card-header">
                            <div class="rw-icon-circle">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3><?php echo $lpmk['lpmk']; ?></h3>
                        </div>

                        <div class="rw-card-body">
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Ketua</strong>
                                    <?php echo $lpmk['ketua_lpmk']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Sekretaris</strong>
                                    <?php echo $lpmk['sekretaris_lpmk']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Bendahara</strong>
                                    <?php echo $lpmk['bendahara_lpmk']; ?>
                                </div>
                            </div>
                            <!--
                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Seksi Trantib</strong>
                                    <?php echo $lpmk['seksi_trantib']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Seksi FKUB</strong>
                                    <?php echo $lpmk['seksi_fkub']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Seksi Olahraga</strong>
                                    <?php echo $lpmk['seksi_olahraga']; ?>
                                </div>
                            </div>

                            <div class="rw-info">
                                <i class="bi bi-person-fill"></i>
                                <div>
                                    <strong>Seksi Sosial</strong>
                                    <?php echo $lpmk['seksi_sosial']; ?>
                                </div>
                            </div>

                            <div class="rw-periode">
                                <i class="bi bi-calendar3"></i>
                                <span><?php echo $lpmk['periode']; ?></span>
                            </div>
-->
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Modal Daftar RT -->
    <div class="modal fade modal-rt" id="modalRT" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRTTitle">
                        <i class="bi bi-house-door-fill me-2"></i>Daftar RT
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalRTBody">
                    <!-- Content akan diisi oleh JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Data RW/RT dari PHP
        const rwData = <?php echo json_encode($data_rw); ?>;

        function scrollToRW() {
            document.getElementById('rwSection').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function showRT(rwIndex) {
            const rw = rwData[rwIndex];
            const modalTitle = document.getElementById('modalRTTitle');
            const modalBody = document.getElementById('modalRTBody');

            // Set title
            modalTitle.innerHTML = `<i class="bi bi-house-door-fill me-2"></i>Daftar RT ${rw.rw}`;

            // Build content
            let html = '';

            rw.rt.forEach(rt => {
                html += `
                    <div class="rt-item">
                        <div class="rt-header">
                            <div class="rt-icon-circle">
                                <i class="bi bi-house-fill"></i>
                            </div>
                            <h5>${rt.rt}</h5>
                        </div>
                        
                        <div class="rt-detail">
                            <i class="bi bi-person-fill"></i>
                            <div><strong>Ketua RT:</strong> ${rt.ketua}</div>
                        </div>
                        
                        <div class="rt-detail">
                            <i class="bi bi-person-badge"></i>
                            <div><strong>Sekretaris:</strong> ${rt.sekretaris}</div>
                        </div>
                        
                        <div class="rt-detail">
                            <i class="bi bi-cash-stack"></i>
                            <div><strong>Bendahara:</strong> ${rt.bendahara}</div>
                        </div>
                                                
                        <div class="periode-badge">
                            <i class="bi bi-calendar3"></i>
                            <span>Masa Jabatan: ${rt.periode}</span>
                        </div>
                    </div>
                `;
            });

            modalBody.innerHTML = html;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modalRT'));
            modal.show();
        }
    </script>

</body>

</html>