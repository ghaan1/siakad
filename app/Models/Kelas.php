<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas'; //mendefinisikan bahwa model ini terkain dengan tabel kelas

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
