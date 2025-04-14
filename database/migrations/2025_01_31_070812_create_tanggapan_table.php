<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id('tanggapanID');
            $table->unsignedBigInteger('laporanID');
            $table->unsignedBigInteger('userID')->nullable()->constrained('users')->onDelete('set null'); // Menambahkan foreign key constraint yang nullable
            $table->text('tanggapan');
            $table->date('tanggal_tanggapan');
            $table->unsignedBigInteger('bidangID');
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
        Schema::dropIfExists('tanggapan');
    }
}
