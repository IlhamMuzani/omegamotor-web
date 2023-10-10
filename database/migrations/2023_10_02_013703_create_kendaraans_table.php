<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreign('pembelian_id')->references('id')->on('pembelians')->onDelete('set null');
            $table->unsignedBigInteger('pembelian_id')->nullable();
            // $table->foreign('penjualan_id')->references('id')->on('penjualans')->onDelete('set null');
            // $table->unsignedBigInteger('penjualan_id')->nullable();
            $table->string('kode_kendaraan')->nullable();
            $table->string('qrcode_kendaraan')->nullable();
            $table->string('no_pol')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('tahun_kendaraan')->nullable();
            $table->string('warna')->nullable();
            $table->unsignedBigInteger('merek_id')->nullable();
            $table->foreign('merek_id')->references('id')->on('mereks')->onDelete('set null');
            $table->unsignedBigInteger('modelken_id')->nullable();
            $table->foreign('modelken_id')->references('id')->on('modelkens')->onDelete('set null');
            $table->unsignedBigInteger('tipe_id')->nullable();
            $table->foreign('tipe_id')->references('id')->on('tipes')->onDelete('set null');
            $table->string('transmisi')->nullable();
            $table->string('km_berjalan')->nullable();
            $table->string('gambar_stnk')->nullable();
            $table->string('gambar_notis')->nullable();
            $table->string('gambar_bpkb')->nullable();
            $table->string('gambar_dokumen')->nullable();
            $table->string('gambar_faktur')->nullable();
            $table->string('gambar_depan')->nullable();
            $table->string('gambar_belakang')->nullable();
            $table->string('gambar_kanan')->nullable();
            $table->string('gambar_kiri')->nullable();
            $table->string('gambar_dashboard')->nullable();
            $table->string('gambar_interior')->nullable();
            $table->string('tanggal_awal')->nullable();
            $table->string('tanggal_akhir')->nullable();
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
        Schema::dropIfExists('kendaraans');
    }
};