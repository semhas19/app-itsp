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
        Schema::create('penebangans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pohon');
            $table->integer('tinggi_pohon');
            $table->integer('keliling_pohon');
            $table->integer('diameter_pohon');
            $table->float('volume_pohon', 20, 2);
            $table->date('tgl_tebang');
            $table->enum('kondisi', ['1', '2', '3']);
            $table->text('note')->nullable();
            $table->json('data')->nullable();
            $table->foreignId('lokasi_pohon_id')->references('id')->on('lokasi_pohons')->onDelete('cascade');
            $table->foreignId('jenis_pohon_id')->references('id')->on('jenis_pohons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penebangans');
    }
};
