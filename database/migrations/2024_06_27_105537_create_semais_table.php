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
        Schema::create('semais', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pohon');
            $table->date('tgl_tanam');
            $table->enum('kondisi', ['1', '2', '3']);
            $table->text('note')->nullable();
            $table->json('data')->nullable();
            $table->foreignId('jenis_pohon_id')->references('id')->on('jenis_pohons')->onDelete('cascade');
            $table->foreignId('lokasi_pohon_id')->references('id')->on('lokasi_pohons')->onDelete('cascade');
            $table->foreignId('kategori_pohon_id')->references('id')->on('kategori_pohons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semais');
    }
};
