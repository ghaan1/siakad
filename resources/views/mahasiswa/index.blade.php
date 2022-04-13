
@extends('mahasiswa.layout')

@section('content')

<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
        </div>
        </div>
    </div>
    <!-- Start kode untuk form pencarian -->

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
@endif

    <form action="{{ route('mahasiswa.index') }}">
    <div class="form-group w-100 mb-3">
        <label for="search" class="d-block mr-2">Pencarian</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari Mahasiswa .." value="{{ request('search')}}">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
</form>


<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <!-- <th>JenisKelamin</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>TanggalLahir</th> -->
        <th width="280x">Action</th>
    </tr>
    @foreach ($paginate as $mhs)
    <tr>
        <td>{{ $mhs ->nim }}</td>
        <td>{{ $mhs ->nama }}</td>
        <!-- <td>{{ $mhs ->kelas }}</td> -->
        <td>{{ $mhs ->Kelas -> nama_kelas}}</td>
        <td>{{ $mhs ->jurusan }}</td>
        <!-- <td>{{ $mhs ->JenisKelamin }}</td> -->
        <!-- <td>{{ $mhs ->email }}</td>
        <td>{{ $mhs ->Alamat }}</td>
        <td>{{ $mhs ->TanggalLahir }}</td> -->
        <td>
        <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
{{$paginate-> links()}}


@endsection
