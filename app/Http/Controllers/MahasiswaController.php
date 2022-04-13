<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     if (request('search')) {
    //         $paginate = Mahasiswa::where('nama', 'like', '%' . request('search') . '%')->paginate(5);
    //         return view('mahasiswa.index', ['paginate'=>$paginate]);
    //     } else {
    //     $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel
    //     $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(5);
    //     return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
    //     }
    // }

    public function index()
    {
        //yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
        $mahasiswa = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(3);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
        ]);
            // 'JenisKelamin'=> 'required',
            // 'Email'=> 'required',
            // 'Alamat'=> 'required',
            // 'TanggalLahir'=> 'required',
        //fungsi eloquent untuk menambah data
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        // $mahasiswa->save();
        
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        
        //Fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        // Mahasiswa::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        //return view('mahasiswa.detail', compact('Mahasiswa'));
        return view('mahasiswa.detail',['Mahasiswa'=>$Mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            // 'JenisKelamin'=> 'required',
            // 'Email'=> 'required',
            // 'Alamat'=> 'required',
            // 'TanggalLahir'=> 'required', 
        ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->save();
        
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        
        //Fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
    Mahasiswa::where('nim', $nim)->delete();
    return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    
}


