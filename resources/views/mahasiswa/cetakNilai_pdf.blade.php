<!DOCTYPE html>
<html>
    <head>
        <title>Kartu Hasil Studi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
        </style>
    </head>
    <body>
        <center>
            <h3 class="text-center mb-5">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h3>
            <h2 class="text-center mb-4">KARTU HASIL STUDI (KHS)</h2>
        </center>
        <div class="container">
            <p><b>Nama : </b> {{ $nilai->mahasiswa->nama }}</p>
            <p><b>NIM : </b> {{ $nilai->mahasiswa->nim }}</p>
            <p><b>Kelas : </b> {{ $nilai->mahasiswa->kelas->nama_kelas }}</p>
        <table class="table table-bordered" style="width:95%;margin:0 auto;">
        <tr>
            <th>Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
            @foreach ($nilai as $biji)
                <tr>
                    <td>{{ $biji->matakuliah->nama_matkul }}</td>&emsp
                    <td>{{ $biji->matakuliah->sks}}</td>&emsp
                    <td>{{ $biji->matakuliah->semester }}</td>&emsp
                    <td>{{ $biji->nilai }}</td>&emsp
                </tr>
            @endforeach
        </table>
</body>
</html>