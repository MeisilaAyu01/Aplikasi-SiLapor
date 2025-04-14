<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('laporanID'); // Primary key
            $table->unsignedBigInteger('userID')->nullable(); // Foreign key untuk tabel users
            $table->string('nama_kegiatan');
            $table->string('image')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('lokasi')->nullable();
            $table->unsignedBigInteger('bidangID')->nullable();
            $table->text('tanggapan_laporan')->nullable(); // Tanggapan terhadap laporan
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
        Schema::dropIfExists('laporan');
    }
}
