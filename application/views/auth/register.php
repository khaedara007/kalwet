<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - SIMPEL AWET</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
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

        .register-container {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            margin: auto;
        }

        /* Logo Container */
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

        .register-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .register-header {
            background: linear-gradient(135deg, #114B82 0%, #1e6db5 100%);
            padding: 3.5rem 2rem 2rem;
            text-align: center;
            position: relative;
        }

        .register-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
        }

        .register-header h3 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 1.5rem;
            position: relative;
        }

        .register-header p {
            color: rgba(255, 255, 255, 0.85);
            margin: 0.5rem 0 0;
            font-size: 0.9rem;
            position: relative;
        }

        .register-body {
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

        .password-strength {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .password-strength-text {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            color: #6c757d;
        }

        .btn-register {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.3);
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

        .btn-login {
            background: white;
            color: #114B82;
            border: 2px solid #114B82;
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

        .btn-login:hover {
            background: #114B82;
            color: white;
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
            margin-top: 0.75rem;
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

        .terms-text {
            font-size: 0.8rem;
            color: #6c757d;
            text-align: center;
            margin-top: 1rem;
        }

        .terms-text a {
            color: #114B82;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="register-container">

        <!-- Logo Container -->
        <div class="logo-container">
            <img src="<?php echo base_url('assets/logo.png'); ?>" alt="SIMPEL AWET">
        </div>

        <!-- Register Card -->
        <div class="register-card">

            <!-- Header -->
            <div class="register-header">
                <h3>Buat Akun Baru</h3>
                <p>Daftar untuk mengakses layanan SIMPEL AWET</p>
            </div>

            <!-- Body -->
            <div class="register-body">

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

                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo site_url('auth/do_register'); ?>" id="registerForm">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                    <!-- Nama Lengkap -->
                    <div class="form-floating">
                        <i class="bi bi-person-fill input-icon"></i>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap</label>
                    </div>

                    <!-- NIK -->
                    <div class="form-floating">
                        <i class="bi bi-credit-card-fill input-icon"></i>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK (16 digit)" maxlength="16" minlength="16" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <label for="nik">NIK (16 digit)</label>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-floating">
                        <i class="bi bi-telephone-fill input-icon"></i>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <label for="phone">Nomor Telepon</label>
                    </div>

                    <!-- Password -->
                    <div class="form-floating">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required onkeyup="checkPasswordStrength(this.value)">
                        <label for="password">Kata Sandi</label>
                        <i class="bi bi-eye-slash password-toggle" onclick="togglePassword()"></i>
                    </div>

                    <!-- Password Strength -->
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="password-strength-text" id="strengthText"></div>

                    <!-- Register Button -->
                    <button type="submit" class="btn btn-register mt-3">
                        <i class="bi bi-person-plus-fill"></i>Daftar Sekarang
                    </button>

                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>sudah punya akun?</span>
                </div>

                <!-- Login Button -->
                <a href="<?php echo site_url('login'); ?>" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>Masuk ke Akun
                </a>

                <!-- Back Link -->
                <a href="<?php echo site_url('home'); ?>" class="btn-back">
                    <i class="bi bi-arrow-left"></i>Kembali ke Beranda
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
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');

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

        // Check Password Strength
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            let strength = 0;
            if (password.length >= 6) strength++;
            if (password.length >= 10) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            const colors = ['#dc3545', '#ffc107', '#28a745', '#198754'];
            const texts = ['Lemah', 'Sedang', 'Kuat', 'Sangat Kuat'];

            let color = colors[Math.min(strength, 3)];
            let text = texts[Math.min(strength, 3)];
            let width = Math.min((strength / 4) * 100, 100);

            strengthBar.style.width = width + '%';
            strengthBar.style.background = color;
            strengthText.textContent = text ? 'Kekuatan: ' + text : '';
            strengthText.style.color = color;
        }
    </script>
</body>

</html>