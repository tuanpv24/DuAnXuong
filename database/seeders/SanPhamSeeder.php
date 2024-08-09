<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; //Sử dụng thư viện bên ngoài
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; //Sử dụng thư viện bên ngoài

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Thêm dữ liệu mẫu
        // DB::table('tên_bảng')->các phương thức();
        DB::table('san_phams')->insert([
            [
                'ma_san_pham' => "SP-" . Str::random(6),
                'ten_san_pham' => 'Giày adidas Run 80S Nam - Xám Navy',
                'gia' => 16000000,
                'so_luong' => 100,
                'mo_ta' => "Giày adidas Run 80S Nam - Xám Navy chính hãng",
                'ngay_nhap' => Carbon::now(),
                // 'trang_thai' => 1,
                'danh_muc_id' => 1,
            ],
            [
                'ma_san_pham' => "SP-" . Str::random(6),
                'ten_san_pham' => 'Giày Nike Air Max SC Nam - Trắng Xanh Dương',
                'gia' => 14000000,
                'so_luong' => 60,
                'mo_ta' => "Giày Nike Air Max SC Nam - Trắng Xanh Dương chính hãng",
                'ngay_nhap' => Carbon::now(),
                // 'trang_thai' => 1,
                'danh_muc_id' => 2,
            ]
        ]);
    }
}
