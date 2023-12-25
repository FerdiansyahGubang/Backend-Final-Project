<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_user');
            $table->unsignedBigInteger('id_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('stock_barang');
            $table->timestamp('date')->useCurrent(); // Gunakan waktu saat ini ketika baris dimasukkan
            $table->timestamps();

            // Definisikan foreign key ke tabel users
            $table->foreign('id_user')->references('id_user')->on('users');

            // Definisikan foreign key ke tabel barang
            $table->foreign('id_barang')->references('id_barang')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
