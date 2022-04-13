<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKelasMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('mahasiswa', function (Blueprint $table) {
                $table->dropColumn('kelas'); //menghapus kolom kelas
                $table->unsignedBigInteger('kelas_id')->nullable(); //menambah kolom kelas_id
                $table->foreign('kelas_id')->references('id')->on('kelas'); //menambahkan key dikolom kelas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('kelas');
            $table->dropForeign(['kelas_id']);
        });
    }
}
