<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!Schema::hasTable('loaitin') || !Schema::hasTable('tin')) {
            return;
        }

        DB::table('loaitin')->upsert([
            ['id' => 9, 'tenLoai' => 'Cong nghe', 'slug' => 'cong-nghe'],
            ['id' => 12, 'tenLoai' => 'Doi song', 'slug' => 'doi-song'],
            ['id' => 15, 'tenLoai' => 'The thao', 'slug' => 'the-thao'],
        ], ['id'], ['tenLoai', 'slug']);

        DB::table('tin')->upsert([
            [
                'id' => 1,
                'idLT' => 9,
                'tieuDe' => 'AI trong doanh nghiep 2026',
                'tomTat' => 'Tong hop xu huong AI moi nhat cho doanh nghiep vua va nho.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve AI trong doanh nghiep nam 2026.</p>',
                'ngayDang' => '2026-03-15 09:00:00',
                'xem' => 5400,
            ],
            [
                'id' => 2,
                'idLT' => 9,
                'tieuDe' => 'Bao mat du lieu ca nhan',
                'tomTat' => 'Nhung diem can biet de bao ve thong tin tren internet.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve bao mat du lieu ca nhan.</p>',
                'ngayDang' => '2026-03-14 08:30:00',
                'xem' => 4200,
            ],
            [
                'id' => 3,
                'idLT' => 9,
                'tieuDe' => '5 cong cu lap trinh phai biet',
                'tomTat' => 'Danh sach cong cu giup tang toc quy trinh phat trien.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve cong cu lap trinh.</p>',
                'ngayDang' => '2026-03-13 10:10:00',
                'xem' => 3980,
            ],
            [
                'id' => 4,
                'idLT' => 9,
                'tieuDe' => 'Xay dung API voi Laravel',
                'tomTat' => 'Huong dan tong quan cach to chuc API va query builder.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve xay dung API voi Laravel.</p>',
                'ngayDang' => '2026-03-12 14:20:00',
                'xem' => 6100,
            ],
            [
                'id' => 5,
                'idLT' => 9,
                'tieuDe' => 'Toi uu truy van MySQL',
                'tomTat' => 'Ky thuat index va toi uu cau lenh cho bang lon.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve toi uu truy van MySQL.</p>',
                'ngayDang' => '2026-03-11 16:15:00',
                'xem' => 4870,
            ],
            [
                'id' => 6,
                'idLT' => 9,
                'tieuDe' => 'Cloud native cho ung dung web',
                'tomTat' => 'Khai niem co ban ve container va tu dong hoa deploy.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve cloud native.</p>',
                'ngayDang' => '2026-03-10 11:25:00',
                'xem' => 3450,
            ],
            [
                'id' => 7,
                'idLT' => 12,
                'tieuDe' => 'Song toi gian de giam ap luc',
                'tomTat' => 'Goi y nhung thay doi nho de can bang cong viec va cuoc song.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve song toi gian.</p>',
                'ngayDang' => '2026-03-15 07:45:00',
                'xem' => 5100,
            ],
            [
                'id' => 8,
                'idLT' => 12,
                'tieuDe' => 'Quan ly tai chinh ca nhan',
                'tomTat' => '3 buoc lap ngan sach de theo doi chi tieu hieu qua.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve quan ly tai chinh ca nhan.</p>',
                'ngayDang' => '2026-03-14 19:40:00',
                'xem' => 5750,
            ],
            [
                'id' => 9,
                'idLT' => 12,
                'tieuDe' => 'Thoi quen buoi sang hieu qua',
                'tomTat' => 'Cach xay dung routine giup bat dau ngay moi nang luong.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve thoi quen buoi sang.</p>',
                'ngayDang' => '2026-03-13 06:20:00',
                'xem' => 4550,
            ],
            [
                'id' => 10,
                'idLT' => 12,
                'tieuDe' => 'An uong lanh manh tai nha',
                'tomTat' => 'Thuc don can bang de duy tri suc khoe ben vung.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve an uong lanh manh.</p>',
                'ngayDang' => '2026-03-12 18:05:00',
                'xem' => 3900,
            ],
            [
                'id' => 11,
                'idLT' => 12,
                'tieuDe' => 'Ky nang giao tiep noi cong so',
                'tomTat' => 'Mau cau truc giup trinh bay ro rang, ngan gon.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve giao tiep noi cong so.</p>',
                'ngayDang' => '2026-03-11 09:50:00',
                'xem' => 3320,
            ],
            [
                'id' => 12,
                'idLT' => 12,
                'tieuDe' => 'Nghi ngoai troi cuoi tuan',
                'tomTat' => 'Goi y cac hoat dong nhe de tai tao nang luong.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve nghi ngoai troi.</p>',
                'ngayDang' => '2026-03-10 20:10:00',
                'xem' => 2890,
            ],
            [
                'id' => 13,
                'idLT' => 15,
                'tieuDe' => 'Tong hop ket qua vong dau',
                'tomTat' => 'Diem lai nhung tran dau dang chu y trong tuan.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve ket qua vong dau.</p>',
                'ngayDang' => '2026-03-09 22:00:00',
                'xem' => 2600,
            ],
            [
                'id' => 14,
                'idLT' => 15,
                'tieuDe' => 'Lich thi dau cuoi tuan',
                'tomTat' => 'Cac cap dau tam diem trong hai ngay toi.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve lich thi dau cuoi tuan.</p>',
                'ngayDang' => '2026-03-08 21:30:00',
                'xem' => 2400,
            ],
            [
                'id' => 15,
                'idLT' => 9,
                'tieuDe' => 'Xu huong frontend hien dai',
                'tomTat' => 'Nhung thay doi dang anh huong den cach xay dung giao dien.',
                'noiDung' => '<p>Noi dung chi tiet bai viet ve xu huong frontend hien dai.</p>',
                'ngayDang' => '2026-03-07 13:35:00',
                'xem' => 3710,
            ],
        ], ['id'], ['idLT', 'tieuDe', 'tomTat', 'noiDung', 'ngayDang', 'xem']);
    }
}

