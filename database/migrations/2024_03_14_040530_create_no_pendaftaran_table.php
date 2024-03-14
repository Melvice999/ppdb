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
        Schema::create('no_pendaftaran', function (Blueprint $table) {
            $table->string('no_pendaftaran', 10)->primary();
            $table->string('nik');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('calon_siswa');
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no_pendaftaran');
    }
};
