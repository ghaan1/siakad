<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mahasiswaMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhsmatkul = [
            [   'mahasiswa_id' => 2,
                'matakuliah_id'=>3,
                'nilai'=>'A',
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>4,
                'nilai'=>'A',
            ],
            [   'mahasiswa_id' => 3,
                'matakuliah_id'=>1,
                'nilai'=>'B',
            ],
            [   'mahasiswa_id' => 6,
                'matakuliah_id'=>2,
                'nilai'=>'B',
            ],
            [   'mahasiswa_id' => 7,
                'matakuliah_id'=>3,
                'nilai'=>'C',
            ],
            [   'mahasiswa_id' => 8,
                'matakuliah_id'=>3,
                'nilai'=>'C',
            ],
           
        ];
        DB::table('mahasiswa_matakuliah')->insert($mhsmatkul);
    }
}
