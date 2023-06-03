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
        Schema::create('penerimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama_penerima');
            $table->string('nik');
            $table->string('nohp');
            $table->string('batas_tgl');
            $table->string('desk_kondisi');
            $table->integer('qty');
            $table->enum('status', ['Pending', 'Selesai']);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('penerimas');
    }
};