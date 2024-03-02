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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->integer('pendaftaran')->default(0);
            $table->integer('hasil_seleksi')->default(0);
            $table->string('j_informasi');
            $table->string('informasi');
            $table->string('wa');
            $table->string('ig');
            $table->string('fb');
            $table->string('yt');
            $table->string('web');
            $table->string('map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
