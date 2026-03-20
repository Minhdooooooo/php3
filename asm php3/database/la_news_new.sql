CREATE DATABASE IF NOT EXISTS la_news
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE la_news;
SET NAMES utf8mb4;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS tin;
DROP TABLE IF EXISTS loaitin;
DROP TABLE IF EXISTS sessions;
DROP TABLE IF EXISTS cache_locks;
DROP TABLE IF EXISTS cache;
DROP TABLE IF EXISTS failed_jobs;
DROP TABLE IF EXISTS job_batches;
DROP TABLE IF EXISTS jobs;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE sessions (
  id VARCHAR(255) NOT NULL,
  user_id BIGINT UNSIGNED NULL,
  ip_address VARCHAR(45) NULL,
  user_agent TEXT NULL,
  payload LONGTEXT NOT NULL,
  last_activity INT NOT NULL,
  PRIMARY KEY (id),
  KEY sessions_user_id_index (user_id),
  KEY sessions_last_activity_index (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE cache (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  expiration INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY cache_expiration_index (expiration)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE cache_locks (
  `key` VARCHAR(255) NOT NULL,
  owner VARCHAR(255) NOT NULL,
  expiration INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY cache_locks_expiration_index (expiration)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE jobs (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  queue VARCHAR(255) NOT NULL,
  payload LONGTEXT NOT NULL,
  attempts TINYINT UNSIGNED NOT NULL,
  reserved_at INT UNSIGNED NULL,
  available_at INT UNSIGNED NOT NULL,
  created_at INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  KEY jobs_queue_reserved_at_available_at_index (queue, reserved_at, available_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE job_batches (
  id VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  total_jobs INT NOT NULL,
  pending_jobs INT NOT NULL,
  failed_jobs INT NOT NULL,
  failed_job_ids LONGTEXT NOT NULL,
  options MEDIUMTEXT NULL,
  cancelled_at INT NULL,
  created_at INT NOT NULL,
  finished_at INT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE failed_jobs (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  uuid VARCHAR(255) NOT NULL,
  connection TEXT NOT NULL,
  queue TEXT NOT NULL,
  payload LONGTEXT NOT NULL,
  exception LONGTEXT NOT NULL,
  failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY failed_jobs_uuid_unique (uuid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE loaitin (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tenLoai VARCHAR(120) NOT NULL,
  slug VARCHAR(150) NULL,
  anHien TINYINT(1) NOT NULL DEFAULT 1,
  thuTu INT UNSIGNED NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_loaitin_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tin (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  idLT INT UNSIGNED NOT NULL,
  tieuDe VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NULL,
  tomTat TEXT NULL,
  noiDung LONGTEXT NULL,
  hinh VARCHAR(255) NULL,
  ngayDang DATETIME NOT NULL,
  xem INT UNSIGNED NOT NULL DEFAULT 0,
  anHien TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_tin_slug (slug),
  KEY idx_tin_idlt_ngaydang (idLT, ngayDang),
  KEY idx_tin_xem (xem),
  CONSTRAINT fk_tin_loaitin FOREIGN KEY (idLT) REFERENCES loaitin (id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO loaitin (id, tenLoai, slug, anHien, thuTu, created_at, updated_at) VALUES
  (1, 'Thể thao', 'the-thao', 1, 1, NOW(), NOW()),
  (2, 'Âm nhạc', 'am-nhac', 1, 2, NOW(), NOW()),
  (3, 'Ẩm thực', 'am-thuc', 1, 3, NOW(), NOW()),
  (4, 'Công nghệ', 'cong-nghe', 1, 4, NOW(), NOW());

INSERT INTO tin (id, idLT, tieuDe, slug, tomTat, noiDung, hinh, ngayDang, xem, anHien, created_at, updated_at) VALUES
  (1, 1, 'Tổng hợp kết quả bóng đá cuối tuần', 'tong-hop-ket-qua-bong-da-cuoi-tuan', 'Cập nhật các trận đấu đáng chú ý tại các giải hàng đầu châu Âu.', '<p>Bản tin tổng hợp kết quả bóng đá cuối tuần, bao gồm thống kê nổi bật và nhận định chiến thuật.</p>', 'https://images.unsplash.com/photo-1518091043644-c1d4457512c6?auto=format&fit=crop&w=1200&q=80', '2026-03-18 08:15:00', 1580, 1, NOW(), NOW()),
  (2, 1, 'Lịch thi đấu bóng rổ NBA ngày mai', 'lich-thi-dau-bong-ro-nba-ngay-mai', 'Danh sách cặp đấu tâm điểm và khung giờ theo giờ Việt Nam.', '<p>Lịch thi đấu NBA ngày mai cùng thông tin lực lượng của các đội bóng.</p>', 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=1200&q=80', '2026-03-17 19:40:00', 1120, 1, NOW(), NOW()),
  (3, 2, 'Top album mới đang được yêu thích', 'top-album-moi-dang-duoc-yeu-thich', 'Tổng hợp 5 album mới nhận được đánh giá cao trong tuần.', '<p>Danh sách album mới và điểm nhấn của từng sản phẩm âm nhạc.</p>', 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=1200&q=80', '2026-03-18 14:30:00', 970, 1, NOW(), NOW()),
  (4, 2, 'Lịch biểu diễn live show tháng 4', 'lich-bieu-dien-live-show-thang-4', 'Những đêm nhạc lớn tại Hà Nội và TP.HCM.', '<p>Lịch live show tháng 4 và cách đặt vé sớm để nhận ưu đãi.</p>', 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=1200&q=80', '2026-03-16 21:05:00', 860, 1, NOW(), NOW()),
  (5, 3, '5 món ăn dễ nấu cho bữa tối', '5-mon-an-de-nau-cho-bua-toi', 'Gợi ý thực đơn nhanh gọn cho gia đình 4 người.', '<p>Hướng dẫn nấu 5 món ăn dễ nấu, tiết kiệm thời gian và cân bằng dinh dưỡng.</p>', 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&w=1200&q=80', '2026-03-18 11:00:00', 1320, 1, NOW(), NOW()),
  (6, 3, 'Quán phở ngon ở trung tâm thành phố', 'quan-pho-ngon-o-trung-tam-thanh-pho', 'Góc review các quán phở có nước dùng đậm vị.', '<p>Danh sách quán phở để thử cuối tuần, có địa chỉ và mức giá tham khảo.</p>', 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1200&q=80', '2026-03-17 07:45:00', 1180, 1, NOW(), NOW()),
  (7, 4, 'Hướng dẫn tạo API bằng Laravel Query Builder', 'huong-dan-tao-api-bang-laravel-query-builder', 'Cách tổ chức endpoint danh sách theo loại và chi tiết bài viết.', '<p>Bài viết trình bày cách xây dựng API cho website tin tức bằng Laravel và MySQL.</p>', 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1200&q=80', '2026-03-19 09:20:00', 2010, 1, NOW(), NOW()),
  (8, 4, 'Mẹo tối ưu truy vấn MySQL cho bảng lớn', 'meo-toi-uu-truy-van-mysql-cho-bang-lon', 'Tổng hợp 6 mẹo index và tối ưu where/order by.', '<p>Phân tích cách tối ưu query MySQL và cách đọc explain để nâng hiệu năng.</p>', 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&w=1200&q=80', '2026-03-19 15:50:00', 1740, 1, NOW(), NOW());

ALTER TABLE loaitin AUTO_INCREMENT = 5;
ALTER TABLE tin AUTO_INCREMENT = 9;