-- Database schema for Kelurahan Service Application

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'citizen',
  `status` varchar(32) NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unik_nik` (`nik`)
);

CREATE TABLE IF NOT EXISTS `service_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_code` varchar(64) NOT NULL,
  `service_name` varchar(191) NOT NULL,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Insert initial service types
INSERT INTO `service_types` (`service_code`, `service_name`, `description`, `is_active`, `created_at`) VALUES
('sktm', 'Surat Keterangan Tidak Mampu (SKTM)', 'Surat Keterangan Tidak Mampu', 1, NOW()),
('domisili', 'Surat Keterangan Domisili', 'Surat Domisili', 1, NOW()),
('satu_nama', 'Surat Keterangan Satu Nama', 'Surat Keterangan Satu Nama', 1, NOW()),
('penghasilan_ortu', 'Surat Keterangan Penghasilan Orang Tua', 'Surat Penghasilan Orang Tua', 1, NOW());

CREATE TABLE IF NOT EXISTS `service_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kk_number` varchar(64) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text,
  `service_type` varchar(64) DEFAULT NULL,
  `additional_notes` text,
  `upload_suratrtrw` varchar(255) DEFAULT NULL,
  `upload_kk` varchar(255) DEFAULT NULL,
  `completed_document` varchar(255) DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'under_review',
  `revision_notes` text,
  `submitted_at` datetime DEFAULT NULL,
  `processed_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Add column for second document if not exists
ALTER TABLE `service_requests` ADD COLUMN `upload_kk` VARCHAR(255) DEFAULT NULL AFTER `uploaded_document`;
-- Rename columns to new names
ALTER TABLE `service_requests` CHANGE `uploaded_document` `upload_suratrtrw` VARCHAR(255) DEFAULT NULL;
ALTER TABLE `service_requests` CHANGE `uploaded_document2` `upload_kk` VARCHAR(255) DEFAULT NULL;
