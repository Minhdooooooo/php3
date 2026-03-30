CREATE DATABASE IF NOT EXISTS la5
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE la5;

DROP TABLE IF EXISTS tin;
DROP TABLE IF EXISTS loaitin;

CREATE TABLE loaitin (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tenLoai VARCHAR(120) NOT NULL,
  slug VARCHAR(150) NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_loaitin_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tin (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tieuDe VARCHAR(255) NOT NULL,
  tomTat TEXT NULL,
  urlHinh VARCHAR(255) NULL,
  ngayDang DATETIME NULL,
  noiDung LONGTEXT NULL,
  idLT INT UNSIGNED NOT NULL,
  xem INT UNSIGNED NOT NULL DEFAULT 0,
  noiBat TINYINT UNSIGNED NOT NULL DEFAULT 0,
  anHien TINYINT UNSIGNED NOT NULL DEFAULT 1,
  tags VARCHAR(2000) NULL,
  lang VARCHAR(10) NOT NULL DEFAULT 'vi',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY (id),
  KEY idx_tin_idlt_ngaydang (idLT, ngayDang),
  KEY idx_tin_xem (xem),
  CONSTRAINT fk_tin_loaitin FOREIGN KEY (idLT) REFERENCES loaitin (id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO loaitin (id, tenLoai, slug) VALUES
  (1, 'Xa hoi', 'xa-hoi'),
  (3, 'Du lich', 'du-lich'),
  (9, 'Cong nghe', 'cong-nghe');

INSERT INTO tin (tieuDe, tomTat, urlHinh, ngayDang, noiDung, idLT, xem, noiBat, anHien, tags, lang, created_at, updated_at) VALUES
  ('Hoang hon tren song Me Kong', 'Ben ghe da thi xa Savannakhet, thu phu mien Trung va Ha Lao cua dat nuoc Hoa Cham Pa, nguoc dong len den mat song Me Kong.', '', NOW(), 'Noi dung chi tiet bai viet 1', 1, 10, 0, 1, 'song,du lich', 'vi', NOW(), NOW()),
  ('Tan cung noi dau', 'Ten em la Thanh Truc. Cau chuyen ve em, ve co be mo coi ca cha lan me, mang trong minh can benh mau...', '', NOW(), 'Noi dung chi tiet bai viet 2', 3, 15, 0, 1, 'doi song', 'vi', NOW(), NOW());
