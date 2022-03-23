<?php

use App\Http\Controllers\LoginController;

if (!function_exists(function: 'checkSession')) {
    
    
}

function checkSession()
    {
        if (!Session::get('nid')) {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

function nilaiTotal($tugas, $quiz, $uts, $uas)
{
    $bobotTugas = (($tugas + $quiz) / 2) * 0.25;
    $bobotUTS = $uts * 0.35;
    $bobotUAS = $uas * 0.45;
    $total = $bobotTugas + $bobotUTS + $bobotUAS;
    return round($total, 2);
}

function between($val, $min, $max) {
    return ($val <= $max && $val >= $min);
}

function predikatNilai($nilai) {
    $predikat;
    if (between($nilai, 90, 100)) {
        $predikat = "A";
    }
    elseif(between($nilai, 89, 85)) {
        $predikat = "A-";
    }
    elseif (between($nilai, 80, 84)) {
        $predikat = "B+";
    }
    elseif (between($nilai, 75, 79)) {
        $predikat = "B";
    }
    elseif (between($nilai, 70, 74)) {
        $predikat = "B-";
    }
    elseif (between($nilai, 65, 69)) {
        $predikat = "C+";
    }
    elseif (between($nilai, 60, 64)) {
        $predikat = "C";
    }
    elseif (between($nilai, 55, 59)) {
        $predikat = "D";
    }
    elseif ($nilai < 55) {
        $predikat = "E";
    }
    return $predikat;
}

function predikatNilaiColor($nilai) {
    $color;
    if (between($nilai, 70, 100)) {
        $color = "text-success";
    }
    elseif(between($nilai, 60, 69)) {
        $color = "text-warning";
    }
    elseif ($nilai < 55 && between($nilai, 55, 59)) {
        $color = "text-danger";
    }
    return $color;
}
