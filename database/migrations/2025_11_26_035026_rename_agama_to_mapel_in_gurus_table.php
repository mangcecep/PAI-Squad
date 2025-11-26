<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('gurus', function (Blueprint $table) {
            // ubah nama kolom agama -> mapel
            $table->renameColumn('agama', 'mapel');
        });
    }

    public function down()
    {
        Schema::table('gurus', function (Blueprint $table) {
            // rollback: mapel -> agama
            $table->renameColumn('mapel', 'agama');
        });
    }
};
