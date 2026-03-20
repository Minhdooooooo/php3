CREATE DATABASE IF NOT EXISTS la_news
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE la_news;

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
  idLT INT UNSIGNED NOT NULL,
  tieuDe VARCHAR(255) NOT NULL,
  tomTat TEXT NULL,
  noiDung LONGTEXT NULL,
  ngayDang DATETIME NOT NULL,
  xem INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  KEY idx_tin_idlt_ngaydang (idLT, ngayDang),
  KEY idx_tin_xem (xem),
  CONSTRAINT fk_tin_loaitin FOREIGN KEY (idLT) REFERENCES loaitin (id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO loaitin (id, tenLoai, slug) VALUES
  (9, 'Công nghệ', 'cong-nghe'),
  (12, 'Đời sống', 'doi-song'),
  (15, 'Thể thao', 'the-thao');

INSERT INTO tin (idLT, tieuDe, tomTat, noiDung, ngayDang, xem) VALUES
  (9, 'AI trong doanh nghiệp 2026', 'Tổng hợp xu hướng AI mới nhất cho doanh nghiệp vừa và nhỏ.', '<p>Nội dung chi tiết bài viết về AI trong doanh nghiệp năm 2026.</p>', '2026-03-15 09:00:00', 5400),
  (9, 'Bảo mật dữ liệu cá nhân', 'Những điểm cần biết để bảo vệ thông tin trên internet.', '<p>Nội dung chi tiết bài viết về bảo mật dữ liệu cá nhân.</p>', '2026-03-14 08:30:00', 4200),
  (9, '5 công cụ lập trình phải biết', 'Danh sách công cụ giúp tăng tốc quy trình phát triển.', '<p>Nội dung chi tiết bài viết về công cụ lập trình.</p>', '2026-03-13 10:10:00', 3980),
  (9, 'Xây dựng API với Laravel', 'Hướng dẫn tổng quan cách tổ chức API và query builder.', '<p>Nội dung chi tiết bài viết về xây dựng API với Laravel.</p>', '2026-03-12 14:20:00', 6100),
  (9, 'Tối ưu truy vấn MySQL', 'Kỹ thuật index và tối ưu câu lệnh cho bảng lớn.', '<p>Nội dung chi tiết bài viết về tối ưu truy vấn MySQL.</p>', '2026-03-11 16:15:00', 4870),
  (9, 'Cloud native cho ứng dụng web', 'Khái niệm cơ bản về container và tự động hóa deploy.', '<p>Nội dung chi tiết bài viết về cloud native.</p>', '2026-03-10 11:25:00', 3450),
  (12, 'Sống tối giản để giảm áp lực', 'Gợi ý những thay đổi nhỏ để cân bằng công việc và cuộc sống.', '<p>Nội dung chi tiết bài viết về sống tối giản.</p>', '2026-03-15 07:45:00', 5100),
  (12, 'Quản lý tài chính cá nhân', '3 bước lập ngân sách để theo dõi chi tiêu hiệu quả.', '<p>Nội dung chi tiết bài viết về quản lý tài chính cá nhân.</p>', '2026-03-14 19:40:00', 5750),
  (12, 'Thói quen buổi sáng hiệu quả', 'Cách xây dựng routine giúp bắt đầu ngày mới năng lượng.', '<p>Nội dung chi tiết bài viết về thói quen buổi sáng.</p>', '2026-03-13 06:20:00', 4550),
  (12, 'Ăn uống lành mạnh tại nhà', 'Thực đơn cân bằng để duy trì sức khỏe bền vững.', '<p>Nội dung chi tiết bài viết về ăn uống lành mạnh.</p>', '2026-03-12 18:05:00', 3900),
  (12, 'Kỹ năng giao tiếp nơi công sở', 'Mẫu cấu trúc giúp trình bày rõ ràng, ngắn gọn.', '<p>Nội dung chi tiết bài viết về giao tiếp nơi công sở.</p>', '2026-03-11 09:50:00', 3320),
  (12, 'Nghỉ ngoài trời cuối tuần', 'Gợi ý các hoạt động nhẹ để tái tạo năng lượng.', '<p>Nội dung chi tiết bài viết về nghỉ ngoài trời.</p>', '2026-03-10 20:10:00', 2890),
  (15, 'Tổng hợp kết quả vòng đấu', 'Điểm lại những trận đấu đáng chú ý trong tuần.', '<p>Nội dung chi tiết bài viết về kết quả vòng đấu.</p>', '2026-03-09 22:00:00', 2600),
  (15, 'Lịch thi đấu cuối tuần', 'Các cặp đấu tâm điểm trong hai ngày tới.', '<p>Nội dung chi tiết bài viết về lịch thi đấu cuối tuần.</p>', '2026-03-08 21:30:00', 2400),
  (9, 'Xu hướng frontend hiện đại', 'Những thay đổi đang ảnh hưởng đến cách xây dựng giao diện.', '<p>Nội dung chi tiết bài viết về xu hướng frontend hiện đại.</p>', '2026-03-07 13:35:00', 3710);
