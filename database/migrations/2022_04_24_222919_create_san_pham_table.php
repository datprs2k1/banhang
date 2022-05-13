<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('hinh_anh');
            $table->string('mo_ta');
            $table->integer('gia_ban');
            $table->string('huong_dan_su_dung');
            $table->string('don_vi_tinh');
            $table->integer('so_luong');
            $table->foreignId('id_danh_muc')->references('id')->on('danh_muc')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_nha_cung_cap')->references('id')->on('nha_cung_cap')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
