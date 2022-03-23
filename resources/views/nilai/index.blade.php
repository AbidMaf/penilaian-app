{{-- @extends('nilai.update') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    {{-- @section('header') --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <title>Document</title>
    {{-- @endsection --}}
</head>
<body>
    {{-- @section('navbar') --}}
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" class="navbar-brand">SPOT</a>
        </div>
    </nav>
    {{-- @endsection --}}
    <h1 class="h1">Nilai Mata Kuliah {{ $mataKuliah->nama_matkul }}</h1>
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="table-responsive shadow-sm">
                <table class="table table-stripped">
                    <thead class="table-dark">
                        <tr>
                            <th rowspan="2" class="text-center align-middle">#</th>
                            <th rowspan="2" class="text-center align-middle">NIM</th>
                            <th rowspan="2" class="text-center align-middle">Nama</th>
                            <th colspan="6" class="text-center align-middle">Nilai</th>
                            <th rowspan="2" class="text-center align-middle">Aksi</th>
                        </tr>
                        <tr>
                            <th>Tugas</th>
                            <th>Kuis</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Total</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @if (is_null($nilai))
                            <td colspan="9">Belum ada nilai</td>
                        @else
                            @foreach ($nilai as $p)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $p->npm }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->ntugas}}</td>
                                    <td>{{ $p->nquiz }}</td>
                                    <td>{{ $p->nuts }}</td>
                                    <td>{{ $p->nuas }}</td>
                                    <td>{{ $total = nilaiTotal($p->ntugas, $p->nquiz, $p->nuts, $p->nuas) }}</td>
                                    <td>{{ predikatNilai($total) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" onclick="window.location='/hapusNilai/{{ $p->id_nilai }}'" class="btn btn-danger"><i class="fa fa-trash-o" style="font-size: 24px"></i>&nbspHapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @php
                                 $i++;
                            @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-white shadow-sm rounded p-3">
                <form method="post" class="row g-3 needs-validation" action="/{{ $mataKuliah->kd_matkul }}/tambahNilai">
                    @csrf
                    <div class="col">
                        <label for="NimNama" class="form-label">Nim-Nama</label>
                        <select class="form-control select-picker" id="NimNama" name="npm" data-live-search="true" required>
                            @foreach ($mahasiswa as $q)
                            <option value="{{ $q->npm }}">{{ $q->npm }}-{{ $q->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="Ntugas" class="form-label">Nilai Tugas</label>
                        <input type="number" class="form-control" id="Ntugas" name="tugas">
                    </div>
                    <div class="col-6">
                        <label for="Nkuis" class="form-label">Nilai Kuis</label>
                        <input type="number" class="form-control" id="Nkuis" name="kuis">
                    </div>
                    <div class="col-6">
                        <label for="Nuts" class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" id="Nuts" name="uts">
                    </div>
                    <div class="col-6">
                        <label for="Nuas" class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" id="Nuas" name="uas">
                    </div>
                    <div class="col mt-3">
                        <input type="submit" value="Submit" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function (){
        $('.select-picker').selectpicker();
    });
</script>

