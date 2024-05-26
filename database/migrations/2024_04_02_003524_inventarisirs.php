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
        Schema::create('inventarisirs', function (Blueprint $table) {
            $table->id();
            // $table->string('id_inventaris');
            // Pastikan kolom ini ditambahkan dan tipe datanya sesuai dengan tipe data kolom yang direferensikan
            // $table->unsignedBigInteger('id_petugas');
            $table->string('nama');
            $table->string('kondisi');
            $table->text('keterangan');
            $table->integer('jumlah'); // Mengubah tipe data menjadi integer jika jumlah merupakan nilai numerik
            // $table->string('id_jenis'); // Pastikan ini sesuai dengan kebutuhan Anda
            $table->string('jenis'); // Kolom tambahan yang Anda sebutkan
            $table->date('tanggal_register'); // Mengubah tipe data menjadi date jika ini menyimpan data tanggal
            $table->string('id_ruang'); // Pastikan ini sesuai dengan kebutuhan Anda
            $table->string('kode_barang')->unique(); // Membuat kode_barang unik
        
            // Mendefinisikan foreign key
            // Pastikan ini dilakukan setelah kolom id_petugas didefinisikan
            // $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarisirs');
    }
};
