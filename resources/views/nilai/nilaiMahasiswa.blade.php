<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" class="navbar-brand">SPOT</a>
        </div>
    </nav>
    
    <div class="row d-flex justify-content-center">
        <div class="col-md-9 shadow-sm rounded pt-5 pb-5">
            <p class="lead mb-3">
                NIM&nbsp: <b>{{ $mahasiswa->npm }}</b> <br>
                Nama&nbsp: <b>{{ $mahasiswa->name }}</b>
            </p>
            <p class="text-center">Nilai keseluruhan</p>
            <h1 class="h1 text-center {{ predikatNilaiColor($Nnilai[0]->totalNilai) }}">
                {{ predikatNilai($Nnilai[0]->totalNilai) }}
            </h1>
            <p class="text-center mb-5">Nilai Total: <b>{{ $Nnilai[0]->totalNilai }}</b></p>
            <hr class="mb-5">
            <h5 class="h5 mb-3">Nilai Mata Kuliah:</h5>
            
            @foreach ($nilai as $p)
            <div class="row d-flex justify-content-between pl-2 pr-2 mb-2">
                <div class="col">
                    {{ $p->nama_matkul }}
                </div>
                <div class="col text-md-right">
                    {{ nilaiTotal($p->ntugas, $p->nquiz, $p->nuts, $p->nuas) }} <b class="{{ predikatNilaiColor(nilaiTotal($p->ntugas, $p->nquiz, $p->nuts, $p->nuas)) }}">({{ predikatNilai(nilaiTotal($p->ntugas, $p->nquiz, $p->nuts, $p->nuas)) }})</b>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>