<?php

use App\Models\Setting;
use App\Models\Klasifikasi;
use App\Models\Kualifikasi;
use App\Models\SubKlasifikasi;

function logoHeader()
{
    return Setting::where('nama', 'header')->first()->file;
}

function kualifikasi()
{
    return Kualifikasi::get();
}

function klasifikasi()
{
    return Klasifikasi::get();
}

function subklasifikasi()
{
    return SubKlasifikasi::get();
}
function tenor($bulan)
{
    if ($bulan == 1) {
        return 30;
    } elseif ($bulan == 3) {
        return 90;
    } elseif ($bulan == 6) {
        return 180;
    } elseif ($bulan == 9) {
        return 270;
    } elseif ($bulan == 12) {
        return 365;
    }
}
