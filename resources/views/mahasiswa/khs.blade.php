@extends('mahasiswa.layout')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                <br>
                <h1>KARTU HASIL STUDI</h1>
        </div>
        </div>
    </div>

<div class="container">
  <p><b>Nama : </b> {{ $nilai->mahasiswa->nama }}</p>
  <p><b>NIM : </b> {{ $nilai->mahasiswa->nim }}</p>
  <p><b>Kelas : </b> {{ $nilai->mahasiswa->kelas->nama_kelas }}</p>
  <table class="table table-bordered">
    <tr>
      <th>Matakuliah</th>
      <th>SKS</th>
      <th>Semester</th>
      <th>Nilai</th>
    </tr>
    @if(!empty($nilai) && $nilai->count())
      @foreach($nilai as $row)
        <tr>
          <td>{{ $row->matakuliah->nama_matkul }}</td>
          <td>{{ $row->matakuliah->sks }}</td>
          <td>{{ $row->matakuliah->semester }}</td>
          <td>{{ $row->nilai }}</td>
        </tr>
      @endforeach
    @else
      <tr>
        <td class="text-center" colspan="10">There are no data.</td>
      </tr>
    @endif
  </table>
</div>
@endsection