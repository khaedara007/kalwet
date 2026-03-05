<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permohonan Berhasil - SIMPEL AWET</title>
    <link rel="icon" href="<?php echo base_url('assets/logoico.ico'); ?>" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #e6eef7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-container {
            text-align: center;
            padding: 2rem;
        }

        .success-icon {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            box-shadow: 0 20px 60px rgba(40, 167, 69, 0.3);
            animation: scale-in 0.5s ease;
        }

        @keyframes scale-in {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-icon i {
            font-size: 5rem;
            color: white;
        }

        .success-title {
            color: #114B82;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .success-message {
            color: #6c757d;
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        .nomor-antrian {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            color: white;
            padding: 1.5rem 2.5rem;
            border-radius: 15px;
            display: inline-block;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(17, 75, 130, 0.2);
        }

        .nomor-antrian-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
        }

        .nomor-antrian-value {
            font-size: 2rem;
            font-weight: 700;
            font-family: monospace;
        }

        .info-box {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            text-align: left;
        }

        .info-box h5 {
            color: #114B82;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f3f5;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item i {
            color: #ffd700;
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }

        .btn-dashboard {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 1rem 3rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .btn-dashboard:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(17, 75, 130, 0.3);
            color: white;
        }

        .btn-track {
            background: white;
            color: #114B82;
            border: 2px solid #114B82;
            border-radius: 50px;
            padding: 1rem 2rem;
            font-weight: 600;
            margin-left: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-track:hover {
            background: #114B82;
            color: white;
        }

        .pulse-ring {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid rgba(40, 167, 69, 0.3);
            animation: pulse-ring 2s ease-out infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="success-container">

            <!-- Success Icon -->
            <div style="position: relative; display: inline-block;">
                <div class="pulse-ring"></div>
                <div class="success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>
            </div>

            <!-- Title -->
            <h1 class="success-title">Terima Kasih!</h1>

            <!-- Message -->
            <p class="success-message">
                Permohonan layanan Anda telah berhasil dikirim.
                Petugas kami akan segera memverifikasi dokumen Anda.
            </p>

            <!-- Nomor Antrian -->
            <?php if (isset($nomor_antrian)): ?>
                <div class="nomor-antrian">
                    <div class="nomor-antrian-label">Nomor Permohonan Anda</div>
                    <div class="nomor-antrian-value">#<?php echo str_pad($nomor_antrian, 4, '0', STR_PAD_LEFT); ?></div>
                </div>
            <?php endif; ?>

            <!-- Info -->
            <div class="info-box">
                <h5><i class="bi bi-info-circle-fill"></i>Informasi Penting</h5>
                <div class="info-item">
                    <i class="bi bi-clock"></i>
                    <span>Permohonan akan diproses pada jam kerja,
                        Pengajuan yang masuk di luar jam kerja akan diproses pada hari kerja berikutnya</span>
                </div>
                <div class="info-item">
                    <i class="bi bi-download"></i>
                    <span>Dokumen bisa diunduh setelah disetujui</span>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <a href="<?php echo site_url('dashboard'); ?>" class="btn-dashboard">
                    <i class="bi bi-house-door-fill"></i>Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>