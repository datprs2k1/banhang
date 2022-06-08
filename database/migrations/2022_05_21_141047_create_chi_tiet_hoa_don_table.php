<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hoa_don');
            $table->unsignedBigInteger('id_san_pham');
            $table->unsignedInteger('so_luong');
            $table->foreign('id_hoa_don')->references('id')->on('hoa_don')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('chi_tiet_hoa_don');
    }
}
