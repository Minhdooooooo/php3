<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('loaitin') || !Schema::hasTable('tin')) {
            return;
        }

        DB::table('loaitin')->upsert([
            ['id' => 1, 'tenLoai' => 'Thể thao', 'slug' => 'the-thao', 'anHien' => 1, 'thuTu' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'tenLoai' => 'Âm nhạc', 'slug' => 'am-nhac', 'anHien' => 1, 'thuTu' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'tenLoai' => 'Ẩm thực', 'slug' => 'am-thuc', 'anHien' => 1, 'thuTu' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'tenLoai' => 'Công nghệ', 'slug' => 'cong-nghe', 'anHien' => 1, 'thuTu' => 4, 'created_at' => now(), 'updated_at' => now()],
        ], ['id'], ['tenLoai', 'slug', 'anHien', 'thuTu', 'updated_at']);

        DB::table('tin')->upsert([
            [
                'id' => 1,
                'idLT' => 1,
                'tieuDe' => 'Tổng hợp kết quả bóng đá cuối tuần',
                'slug' => 'tong-hop-ket-qua-bong-da-cuoi-tuan',
                'tomTat' => 'Cập nhật các trận đấu đáng chú ý tại các giải hàng đầu châu Âu.',
                'noiDung' => '<p>Bản tin tổng hợp kết quả bóng đá cuối tuần, bao gồm thống kê nổi bật và nhận định chiến thuật.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1518091043644-c1d4457512c6?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-18 08:15:00',
                'xem' => 1580,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'idLT' => 1,
                'tieuDe' => 'Lịch thi đấu bóng rổ NBA ngày mai',
                'slug' => 'lich-thi-dau-bong-ro-nba-ngay-mai',
                'tomTat' => 'Danh sách cặp đấu tâm điểm và khung giờ theo giờ Việt Nam.',
                'noiDung' => '<p>Lịch thi đấu NBA ngày mai cùng thông tin lực lượng của các đội bóng.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-17 19:40:00',
                'xem' => 1120,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'idLT' => 2,
                'tieuDe' => 'Top album mới đang được yêu thích',
                'slug' => 'top-album-moi-dang-duoc-yeu-thich',
                'tomTat' => 'Tổng hợp 5 album mới nhận được đánh giá cao trong tuần.',
                'noiDung' => '<p>Danh sách album mới và điểm nhấn của từng sản phẩm âm nhạc.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-18 14:30:00',
                'xem' => 970,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'idLT' => 2,
                'tieuDe' => 'Lịch biểu diễn live show tháng 4',
                'slug' => 'lich-bieu-dien-live-show-thang-4',
                'tomTat' => 'Những đêm nhạc lớn tại Hà Nội và TP.HCM.',
                'noiDung' => '<p>Lịch live show tháng 4 và cách đặt vé sớm để nhận ưu đãi.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-16 21:05:00',
                'xem' => 860,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'idLT' => 3,
                'tieuDe' => '5 món ăn dễ nấu cho bữa tối',
                'slug' => '5-mon-an-de-nau-cho-bua-toi',
                'tomTat' => 'Gợi ý thực đơn nhanh gọn cho gia đình 4 người.',
                'noiDung' => '<p>Hướng dẫn nấu 5 món ăn dễ nấu, tiết kiệm thời gian và cân bằng dinh dưỡng.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-18 11:00:00',
                'xem' => 1320,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'idLT' => 3,
                'tieuDe' => 'Quán phở ngon ở trung tâm thành phố',
                'slug' => 'quan-pho-ngon-o-trung-tam-thanh-pho',
                'tomTat' => 'Góc review các quán phở có nước dùng đậm vị.',
                'noiDung' => '<p>Danh sách quán phở để thử cuối tuần, có địa chỉ và mức giá tham khảo.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-17 07:45:00',
                'xem' => 1180,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'idLT' => 4,
                'tieuDe' => 'Hướng dẫn tạo API bằng Laravel Query Builder',
                'slug' => 'huong-dan-tao-api-bang-laravel-query-builder',
                'tomTat' => 'Cách tổ chức endpoint danh sách theo loại và chi tiết bài viết.',
                'noiDung' => '<p>Bài viết trình bày cách xây dựng API cho website tin tức bằng Laravel và MySQL.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-19 09:20:00',
                'xem' => 2010,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'idLT' => 4,
                'tieuDe' => 'Mẹo tối ưu truy vấn MySQL cho bảng lớn',
                'slug' => 'meo-toi-uu-truy-van-mysql-cho-bang-lon',
                'tomTat' => 'Tổng hợp 6 mẹo index và tối ưu where/order by.',
                'noiDung' => '<p>Phân tích cách tối ưu query MySQL và cách đọc explain để nâng hiệu năng.</p>',
                'hinh' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&w=1200&q=80',
                'ngayDang' => '2026-03-19 15:50:00',
                'xem' => 1740,
                'anHien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['id'], ['idLT', 'tieuDe', 'slug', 'tomTat', 'noiDung', 'hinh', 'ngayDang', 'xem', 'anHien', 'updated_at']);
    }
}