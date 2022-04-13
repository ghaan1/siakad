<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //misa kita update data mahasiswa yang ada saat ini milih TI 2A
        DB::table('mahasiswa')->update(['kelas_id' => 1]);
    }
}
