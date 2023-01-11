<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiDangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_dang', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_dung_id');
            $table->integer('the_loai_id');
            $table->integer('danh_muc_id');
            $table->integer('khu_vuc_id');
            $table->string('tieu_de');
            $table->string('noi_dung');
            $table->string('dia_chi');
            $table->boolean('trang_thai'); // tìm thấy hay chưa
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_dang');
    }
}
