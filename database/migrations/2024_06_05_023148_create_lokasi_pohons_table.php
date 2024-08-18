<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiPohonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lokasi_pohons', function (Blueprint $table) {
            $table->id();
            // $table->string('blok');
            $table->string('jalur_pohon');
            $table->string('plot_pohon');
            $table->string('koordinat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_pohons');
    }
}
