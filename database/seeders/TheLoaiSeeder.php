<?php

namespace Database\Seeders;

use App\Models\TheLoai;
use Illuminate\Database\Seeder;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TheLoai::create(['ten'=>'Tìm đồ','admin'=>0]);
        TheLoai::create(['ten'=>'Trả đồ','admin'=>0]);
        TheLoai::create(['ten'=>'Cảnh báo','admin'=>1]);
        TheLoai::create(['ten'=>'Mẹo tìm đồ','admin'=>1]);
    }
}
