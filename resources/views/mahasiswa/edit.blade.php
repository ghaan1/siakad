@extends('mahasiswa.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Mahasiswa
            </div>
            <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" id="myForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->nim }}" aria-describedby="Nim" >
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama" >
        </div>
        <div class="form-group">
            <label for="Kelas">Kelas</label>
            <input type="Kelas" name="Kelas" class="form-control" id="Kelas" value="{{ $Mahasiswa->kelas }}" aria-describedby="Kelas" >
        </div>
        <div class="form-group">
            <label for="Jurusan">Jurusan</label>
            <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="Jurusan" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection