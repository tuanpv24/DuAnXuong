<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; //Sử dụng thư viện bên ngoài
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; //Sử dụng thư viện bên ngoài

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'ma_khach_hang' => "KH-" . Str::random(6),
                'name' => 'Lê Văn Long',
                'so_dien_thoai' => '0328518575',
                'email' => 'tuanpvph38554@fpt.edu.vn',
                'dia_chi' => 'Tân Minh, Thường Tín, Hà Nội',
                'vai_tro' => 2,
                'ngay_tao' => Carbon::now(), //Lấy ngày
                'mat_khau' => 'Tuan123@',
                'password' => Hash::make('Tuan123@'),
            ]
        ]);
        User::factory()->count(10)->create();
    }
}
