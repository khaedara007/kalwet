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

        /* Main Content */
        .main-content {
            padding: 30px;
            max-width: 1200px;
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
            font-size: 28px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-back {
            background: white;
            color: #1e88e5;
            border: 2px solid #1e88e5;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #1e88e5;
            color: white;
        }

        /* Info Card */
        .info-card {
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 10px 30px rgba(30, 136, 229, 0.3);
        }

        .info-card i {
            font-size: 40px;
            opacity: 0.9;
        }

        .info-content h4 {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .info-content .nomor-surat {
            font-size: 24px;
            font-weight: 700;
            font-family: 'Courier New', monospace;
        }

        /* Form Container */
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .form-header h2 {
            font-size: 20px;
            font-weight: 600;
        }

        .form-header p {
            opacity: 0.9;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-body {
            padding: 30px;
        }

        /* Section */
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 25px;
            border-bottom: 2px dashed #e0e0e0;
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            color: #1565c0;
            font-size: 18px;
            font-weight: 600;
        }

        .section-title i {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-title.orange i {
            background: linear-gradient(135deg, #ffa726 0%, #f57c00 100%);
        }

        .section-title.green i {
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
        }

        .section-title.purple i {
            background: linear-gradient(135deg, #ab47bc 0%, #8e24aa 100%);
        }

        /* Form Grid */
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
            font-weight: 500;
            font-size: 14px;
        }

        label .required {
            color: #e53935;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-icon input,
        .input-icon select,
        .input-icon textarea {
            padding-left: 45px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .hint {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        /* Button Group */
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }

        .btn {
            padding: 14px 30px;
            border-radius: 10px;
            border: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-secondary {
            background: #f5f5f5;
            color: #666;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #42a5f5 0%, #1e88e5 100%);
            color: white;
            box-shadow: 0 5px 20px rgba(30, 136, 229, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 136, 229, 0.4);
        }

        /* Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #e53935;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
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
            <li><a href="<?php echo base_url('admin/logout'); ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </nav>

    <div class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title"><?php echo $title; ?></h1>
                <p class="page-subtitle">
                    <?php echo isset($is_edit) && $is_edit ? 'Perbarui data surat yang sudah ada' : 'Isi formulir dengan data yang benar dan lengkap'; ?>
                </p>
            </div>
            <a href="<?php echo base_url('admin/suratkematian'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

        <!-- Error Alert -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Info Card -->
        <div class="info-card">
            <i class="fas fa-file-signature"></i>
            <div class="info-content">
                <h4>Nomor Surat</h4>
                <div class="nomor-surat">
                    <?php
                    if (isset($is_edit) && $is_edit && isset($surat)) {
                        echo $surat->nomor_surat;
                    } else {
                        echo $nomor_surat;
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-edit"></i> <?php echo isset($is_edit) && $is_edit ? 'Form Edit Surat' : 'Formulir Surat Keterangan Kematian'; ?></h2>
                <p>Silakan lengkapi semua data dengan informasi yang akurat</p>
            </div>

            <div class="form-body">
                <!-- Form Action: Create atau Update -->
                <form action="<?php echo isset($is_edit) && $is_edit ? base_url('admin/suratkematian/update/' . $surat->id) : base_url('admin/suratkematian/store'); ?>" method="POST">

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <!-- Data Almarhum -->
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-user"></i>
                            <span>Data Almarhum/Almarhumah</span>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Nama Lengkap <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="nama_meninggal"
                                        value="<?php echo isset($surat) ? $surat->nama_meninggal : set_value('nama_meninggal'); ?>"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>NIK <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="nik_meninggal"
                                        value="<?php echo isset($surat) ? $surat->nik_meninggal : set_value('nik_meninggal'); ?>"
                                        placeholder="16 digit NIK" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin <span class="required">*</span></label>
                                <div class="input-icon">
                                    <select name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" <?php echo (isset($surat) && $surat->jenis_kelamin == 'Laki-laki') || set_select('jenis_kelamin', 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php echo (isset($surat) && $surat->jenis_kelamin == 'Perempuan') || set_select('jenis_kelamin', 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Umur (Tahun) <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="number" name="umur"
                                        value="<?php echo isset($surat) ? $surat->umur : set_value('umur'); ?>"
                                        placeholder="Umur dalam tahun" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Agama <span class="required">*</span></label>
                                <div class="input-icon">
                                    <select name="agama" required>
                                        <option value="">Pilih Agama</option>
                                        <?php $agama_list = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']; ?>
                                        <?php foreach ($agama_list as $a): ?>
                                            <option value="<?php echo $a; ?>" <?php echo (isset($surat) && $surat->agama == $a) || set_select('agama', $a) ? 'selected' : ''; ?>><?php echo $a; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label>Alamat Lengkap <span class="required">*</span></label>
                                <textarea name="alamat" placeholder="Masukkan alamat lengkap" required><?php echo isset($surat) ? $surat->alamat : set_value('alamat'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Data Kematian -->
                    <div class="form-section">
                        <div class="section-title orange">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Data Kematian</span>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Hari <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="hari_meninggal" id="hari"
                                        value="<?php echo isset($surat) ? $surat->hari_meninggal : set_value('hari_meninggal'); ?>"
                                        placeholder="Otomatis dari tanggal" required>
                                </div>
                                <p class="hint"><i class="fas fa-info-circle"></i> Otomatis terisi, bisa diubah</p>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Meninggal <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="date" name="tanggal_meninggal" id="tgl"
                                        value="<?php echo isset($surat) ? $surat->tanggal_meninggal : set_value('tanggal_meninggal'); ?>"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tempat Meninggal <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="tempat_meninggal"
                                        value="<?php echo isset($surat) ? $surat->tempat_meninggal : set_value('tempat_meninggal'); ?>"
                                        placeholder="Rumah Sakit/Rumah" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Penyebab Kematian <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="penyebab_kematian"
                                        value="<?php echo isset($surat) ? $surat->penyebab_kematian : set_value('penyebab_kematian'); ?>"
                                        placeholder="Sakit/kecelakaan/etc" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pelapor -->
                    <div class="form-section">
                        <div class="section-title green">
                            <i class="fas fa-user-friends"></i>
                            <span>Data Pelapor</span>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Nama Lengkap Pelapor <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="nama_pelapor"
                                        value="<?php echo isset($surat) ? $surat->nama_pelapor : set_value('nama_pelapor'); ?>"
                                        placeholder="Nama lengkap pelapor" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>NIK Pelapor <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="nik_pelapor"
                                        value="<?php echo isset($surat) ? $surat->nik_pelapor : set_value('nik_pelapor'); ?>"
                                        placeholder="16 digit NIK" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Umur Pelapor <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="number" name="umur_pelapor"
                                        value="<?php echo isset($surat) ? $surat->umur_pelapor : set_value('umur_pelapor'); ?>"
                                        placeholder="Umur dalam tahun" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Pekerjaan <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="pekerjaan_pelapor"
                                        value="<?php echo isset($surat) ? $surat->pekerjaan_pelapor : set_value('pekerjaan_pelapor'); ?>"
                                        placeholder="Pekerjaan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Hubungan <span class="required">*</span></label>
                                <div class="input-icon">
                                    <input type="text" name="hubungan_pelapor"
                                        value="<?php echo isset($surat) ? $surat->hubungan_pelapor : set_value('hubungan_pelapor'); ?>"
                                        placeholder="Contoh: Anak Kandung" required>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label>Alamat Pelapor <span class="required">*</span></label>
                                <textarea name="alamat_pelapor" placeholder="Masukkan alamat lengkap pelapor" required><?php echo isset($surat) ? $surat->alamat_pelapor : set_value('alamat_pelapor'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Penandatangan -->
                    <div class="form-section">
                        <div class="section-title purple">
                            <i class="fas fa-signature"></i>
                            <span>Penandatangan</span>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label>Pilih Penandatangan <span class="required">*</span></label>
                                <div class="input-icon">
                                    <i class="fas fa-user-tie"></i>
                                    <select name="penandatangan_id" required>
                                        <option value="">-- Pilih Penandatangan --</option>
                                        <?php foreach ($penandatangan as $p): ?>
                                            <option value="<?php echo $p->id; ?>" <?php echo (isset($surat) && $surat->penandatangan_id == $p->id) || set_select('penandatangan_id', $p->id) ? 'selected' : ''; ?>>
                                                <?php echo $p->jabatan; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/suratkematian'); ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <?php echo isset($is_edit) && $is_edit ? 'Update & Cetak PDF' : 'Generate PDF'; ?>
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; padding: 30px; color: #666; font-size: 13px;">
            © 2026 <span style="color: #1e88e5; font-weight: 600;">SIMPEL AWET</span> - Kelurahan Kalinyamat Wetan
        </div>

    </div>

    <script>
        document.getElementById('tgl').addEventListener('change', function() {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const d = new Date(this.value);
            if (!document.getElementById('hari').value) {
                document.getElementById('hari').value = hari[d.getDay()];
            }
        });
    </script>
</body>

</html>