<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SIMPEL AWET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 50%, #0d3a5c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
            position: relative;
            overflow: hidden;
        }

        /* Background Decoration */
        body::before {
            content: '';
            position: absolute;
            top: 10%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: rgba(255, 215, 0, 0.08);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: 10%;
            left: -5%;
            width: 350px;
            height: 350px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .reset-container {
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
            margin: auto;
        }

        /* Logo Container - Background menyesuaikan logo */
        .logo-container {
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            padding: 12px 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .logo-container img {
            height: 55px;
            width: auto;
            display: block;
        }

        .reset-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .reset-header {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            padding: 3.5rem 2rem 2rem;
            text-align: center;
            position: relative;
        }

        .reset-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
        }

        .reset-header h3 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
            position: relative;
        }

        .reset-header p {
            color: rgba(255, 255, 255, 0.85);
            margin: 0.5rem 0 0;
            font-size: 0.9rem;
            position: relative;
        }

        .reset-body {
            padding: 2rem;
        }

        .form-floating {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .form-floating>.form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            height: 60px;
            padding-left: 3.5rem;
            font-size: 0.95rem;
        }

        .form-floating>.form-control:focus {
            border-color: #114B82;
            box-shadow: 0 0 0 0.25rem rgba(17, 75, 130, 0.1);
        }

        .form-floating>label {
            padding-left: 3.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .input-icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #114B82;
            font-size: 1.2rem;
            z-index: 2;
        }

        .password-toggle {
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            cursor: pointer;
            z-index: 2;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #114B82;
        }

        .btn-reset {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 1rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-reset:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(17, 75, 130, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #6c757d;
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            padding: 0 1rem;
        }

        .btn-back {
            background: #f8f9fa;
            color: #6c757d;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 0.875rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #e9ecef;
            color: #495057;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #842029;
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.1);
            color: #0f5132;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.85rem;
        }

        .features i {
            color: #ffd700;
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="reset-container">

        <!-- Logo -->
        <div class="logo-container">
            <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET">
        </div>

        <!-- Reset Card -->
        <div class="reset-card">

            <!-- Header -->
            <div class="reset-header">
                <h3>Lupa Password?</h3>
                <p>Masukkan nomor telepon dan password baru Anda</p>
            </div>

            <!-- Body -->
            <div class="reset-body">

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill"></i>
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo site_url('auth/reset_password'); ?>">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                    <!-- Phone Input -->
                    <div class="form-floating">
                        <i class="bi bi-telephone-fill input-icon"></i>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon" required>
                        <label for="phone">Nomor Telepon</label>
                    </div>

                    <!-- New Password -->
                    <div class="form-floating">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password Baru" required>
                        <label for="new_password">Password Baru</label>
                        <i class="bi bi-eye-slash password-toggle" onclick="togglePassword('new_password', this)"></i>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-floating">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                        <label for="confirm_password">Konfirmasi Password</label>
                        <i class="bi bi-eye-slash password-toggle" onclick="togglePassword('confirm_password', this)"></i>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-reset">
                        <i class="bi bi-check-lg"></i>Ubah Password
                    </button>

                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>atau</span>
                </div>

                <!-- Back to Login -->
                <a href="<?php echo site_url('login'); ?>" class="btn-back">
                    <i class="bi bi-arrow-left"></i>Kembali ke Login
                </a>

            </div>
        </div>

        <!-- Features -->
        <div class="features">
            <span><i class="bi bi-shield-check"></i>Aman</span>
            <span><i class="bi bi-lightning-fill"></i>Cepat</span>
            <span><i class="bi bi-check-circle-fill"></i>Mudah</span>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePassword(inputId, toggleIcon) {
            const passwordInput = document.getElementById(inputId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>

</html>