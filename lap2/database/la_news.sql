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
  (9, 'Cong nghe', 'cong-nghe'),
  (12, 'Doi song', 'doi-song'),
  (15, 'The thao', 'the-thao');

INSERT INTO tin (idLT, tieuDe, tomTat, noiDung, ngayDang, xem) VALUES
  (9, 'AI trong doanh nghiep 2026', 'Tong hop xu huong AI moi nhat cho doanh nghiep vua va nho.', '<p>Noi dung chi tiet bai viet ve AI trong doanh nghiep nam 2026.</p>', '2026-03-15 09:00:00', 5400),
  (9, 'Bao mat du lieu ca nhan', 'Nhung diem can biet de bao ve thong tin tren internet.', '<p>Noi dung chi tiet bai viet ve bao mat du lieu ca nhan.</p>', '2026-03-14 08:30:00', 4200),
  (9, '5 cong cu lap trinh phai biet', 'Danh sach cong cu giup tang toc quy trinh phat trien.', '<p>Noi dung chi tiet bai viet ve cong cu lap trinh.</p>', '2026-03-13 10:10:00', 3980),
  (9, 'Xay dung API voi Laravel', 'Huong dan tong quan cach to chuc API va query builder.', '<p>Noi dung chi tiet bai viet ve xay dung API voi Laravel.</p>', '2026-03-12 14:20:00', 6100),
  (9, 'Toi uu truy van MySQL', 'Ky thuat index va toi uu cau lenh cho bang lon.', '<p>Noi dung chi tiet bai viet ve toi uu truy van MySQL.</p>', '2026-03-11 16:15:00', 4870),
  (9, 'Cloud native cho ung dung web', 'Khai niem co ban ve container va tu dong hoa deploy.', '<p>Noi dung chi tiet bai viet ve cloud native.</p>', '2026-03-10 11:25:00', 3450),
  (12, 'Song toi gian de giam ap luc', 'Goi y nhung thay doi nho de can bang cong viec va cuoc song.', '<p>Noi dung chi tiet bai viet ve song toi gian.</p>', '2026-03-15 07:45:00', 5100),
  (12, 'Quan ly tai chinh ca nhan', '3 buoc lap ngan sach de theo doi chi tieu hieu qua.', '<p>Noi dung chi tiet bai viet ve quan ly tai chinh ca nhan.</p>', '2026-03-14 19:40:00', 5750),
  (12, 'Thoi quen buoi sang hieu qua', 'Cach xay dung routine giup bat dau ngay moi nang luong.', '<p>Noi dung chi tiet bai viet ve thoi quen buoi sang.</p>', '2026-03-13 06:20:00', 4550),
  (12, 'An uong lanh manh tai nha', 'Thuc don can bang de duy tri suc khoe ben vung.', '<p>Noi dung chi tiet bai viet ve an uong lanh manh.</p>', '2026-03-12 18:05:00', 3900),
  (12, 'Ky nang giao tiep noi cong so', 'Mau cau truc giup trinh bay ro rang, ngan gon.', '<p>Noi dung chi tiet bai viet ve giao tiep noi cong so.</p>', '2026-03-11 09:50:00', 3320),
  (12, 'Nghi ngoai troi cuoi tuan', 'Goi y cac hoat dong nhe de tai tao nang luong.', '<p>Noi dung chi tiet bai viet ve nghi ngoai troi.</p>', '2026-03-10 20:10:00', 2890),
  (15, 'Tong hop ket qua vong dau', 'Diem lai nhung tran dau dang chu y trong tuan.', '<p>Noi dung chi tiet bai viet ve ket qua vong dau.</p>', '2026-03-09 22:00:00', 2600),
  (15, 'Lich thi dau cuoi tuan', 'Cac cap dau tam diem trong hai ngay toi.', '<p>Noi dung chi tiet bai viet ve lich thi dau cuoi tuan.</p>', '2026-03-08 21:30:00', 2400),
  (9, 'Xu huong frontend hien dai', 'Nhung thay doi dang anh huong den cach xay dung giao dien.', '<p>Noi dung chi tiet bai viet ve xu huong frontend hien dai.</p>', '2026-03-07 13:35:00', 3710);
