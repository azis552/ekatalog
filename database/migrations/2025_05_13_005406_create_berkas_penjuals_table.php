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
        Schema::create('berkas_penjuals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('user_id');
            $table->string('status');
            $table->string('keterangan');
            $table->string('tipe');
            $table->string('alamat');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_penjuals');
    }
};
