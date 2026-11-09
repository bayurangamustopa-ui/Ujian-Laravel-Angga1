-- Export database ujian_laravel (struktur + contoh data)
-- Alternatif: jalankan `php artisan migrate` lalu export dari phpMyAdmin.
CREATE DATABASE IF NOT EXISTS ujian_laravel;
USE ujian_laravel;

DROP TABLE IF EXISTS siswas;
DROP TABLE IF EXISTS kelas;

CREATE TABLE kelas (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  kode_kelas VARCHAR(20) NOT NULL UNIQUE,
  nama_kelas VARCHAR(50) NOT NULL,
  tingkat VARCHAR(20) NOT NULL,
  tahun_ajaran VARCHAR(20) NOT NULL,
  wali_kelas VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
) ENGINE=InnoDB;

CREATE TABLE siswas (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  kelas_id BIGINT UNSIGNED NOT NULL,
  nis VARCHAR(20) NOT NULL UNIQUE,
  nama_lengkap VARCHAR(100) NOT NULL,
  jenis_kelamin ENUM('L','P') NOT NULL,
  tempat_lahir VARCHAR(100) NULL,
  tanggal_lahir DATE NULL,
  alamat TEXT NULL,
  no_hp VARCHAR(20) NULL,
  email VARCHAR(255) NULL,
  asal_sekolah VARCHAR(150) NOT NULL,
  jurusan VARCHAR(100) NOT NULL,
  nama_ayah VARCHAR(100) NULL,
  nama_ibu VARCHAR(100) NULL,
  no_hp_wali VARCHAR(20) NULL,
  status ENUM('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  CONSTRAINT siswas_kelas_id_foreign FOREIGN KEY (kelas_id) REFERENCES kelas(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

INSERT INTO kelas (kode_kelas,nama_kelas,tingkat,tahun_ajaran,wali_kelas,created_at,updated_at) VALUES
('TI25','X TI 25','X','2026/2027','Bu Rina',NOW(),NOW()),
('RPL1','X RPL 1','X','2026/2027','Pak Dodi',NOW(),NOW());

INSERT INTO siswas (kelas_id,nis,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,no_hp,email,asal_sekolah,jurusan,nama_ayah,nama_ibu,no_hp_wali,status,created_at,updated_at) VALUES
(1,'250001','Angga','L','Bandung','2008-05-10','Kudang, Jawa Barat','081200000001','angga@example.com','SMPN 1','Teknik Informatika','Bapak Angga','Ibu Angga','081200000002','Aktif',NOW(),NOW()),
(2,'250002','Siti Aisyah','P','Garut','2008-08-17','Garut, Jawa Barat','081200000003','siti@example.com','SMPN 2','Rekayasa Perangkat Lunak','Bapak Siti','Ibu Siti','081200000004','Aktif',NOW(),NOW());
