<?php

namespace Database\Seeders;

use App\Models\NguoiDung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<6;$i++){
            NguoiDung::create([
                "ho_ten" =>"user{$i}",
                "mat_khau" =>hash::make("1234567{$i}"),
                "email" =>"nguoidung{$i}@gmail.com",
                "so_dien_thoai"=>"",
                //"ngay_sinh"=>"2002/5/12",
                "gioi_tinh"=>1,
                "admin"=>0,
                "anh_dai_dien"=>""
            ]);
           }
           NguoiDung::create([
            "ho_ten" =>"admin",
            "mat_khau" =>hash::make("12345678"),
            "email" =>"admin@gmail.com",
            "so_dien_thoai"=>"",
            //"ngay_sinh"=>"2002/5/12",
            "gioi_tinh"=>1,
            "admin"=>1,
            "anh_dai_dien"=>""
        ]);
    }
}
