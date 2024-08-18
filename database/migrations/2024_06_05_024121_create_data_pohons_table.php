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
        Schema::create('data_pohons', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pohon')->unique;
            $table->decimal('volume_pohon', 20, 4);
            $table->float('tinggi_pohon');
            $table->integer('tinggi_jalon'); //tinggi alat yang digunakan (Jalon/Galah)
            $table->float('diameter'); // diameter pohon
            $table->integer('h_top'); // tajuk tertinggi pohon
            $table->integer('h_pole'); // tinggi pohon tumbuh
            $table->integer('h_base'); // pangkal pohon
            $table->date('tgl_tanam');
            $table->date('tgl_pengukuran');
            $table->enum('kondisi', ['1', '2', '3']);
            $table->text('note')->nullable();
            $table->json('data')->nullable();
            $table->foreignId('lokasi_pohon_id')->references('id')->on('lokasi_pohons')->onDelete('cascade');
            $table->foreignId('jenis_pohon_id')->references('id')->on('jenis_pohons')->onDelete('cascade');
            $table->foreignId('kategori_pohon_id')->references('id')->on('kategori_pohons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pohons');
    }
};
