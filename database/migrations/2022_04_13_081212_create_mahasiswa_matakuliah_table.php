<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('mahasiswa_id');
                $table->unsignedBigInteger('matakuliah_id');
                $table->string('nilai', 5);
                $table->timestamps();
                $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa');
                $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
}