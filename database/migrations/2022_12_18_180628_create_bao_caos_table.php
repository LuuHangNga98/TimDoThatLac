<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoCaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_bao_cao_id');
            $table->integer('nguoi_dung_id');
            $table->integer('bai_dang_id');
            $table->integer('binh_luan_id');
            $table->string('noi_dung');
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
        Schema::dropIfExists('bao_cao');
    }
}
