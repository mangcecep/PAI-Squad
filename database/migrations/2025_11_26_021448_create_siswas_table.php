<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable(); 
        $table->string('nis')->unique();
        $table->string('nama');
        $table->string('kelas');
        $table->string('jurusan');
        $table->string('alamat')->nullable();
        $table->timestamps();
    });
}

};

