<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="" class="navbar-brand">SPOT</a>
        </div>
    </nav>
    <h1 class="h1">Welcome {{ $dosen->name }}</h1>
    <div class="container-lg">
        <div class="row justify-content-md-center">
            <div class="col-8">
                @php
                    $i=1;
                @endphp
                @foreach ($mataKuliah as $p)
                @if ($i % 3 == 0)
                    <div class="alert alert-success">
                @elseif ($i % 3 == 1)
                    <div class="alert alert-primary">
                @elseif ($i % 3 == 2)
                    <div class="alert alert-warning">
                @endif
                        <h4 class="alert-heading">{{ $p->kd_matkul }}</h4>
                        <p>{{ $p->nama_matkul }}</p>
                        <button type="button" onclick="window.location='{{ url($p->kd_matkul) }}'" class="btn btn-light w-100" s>Buka</button>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
    
</body>
</html>
