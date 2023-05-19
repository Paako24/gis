<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $daerah = "semua";
        $jenis = "semua";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function surabayaRs()
    {
        $daerah = "surabaya";
        $jenis = "rs";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function surabayaPuskesmas()
    {
        $daerah = "surabaya";
        $jenis = "puskesmas";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function surabayaApotek()
    {
        $daerah = "surabaya";
        $jenis = "apotek";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function sidoarjoRs()
    {
        $daerah = "sidoarjo";
        $jenis = "rs";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function sidoarjoPuskesmas()
    {
        $daerah = "sidoarjo";
        $jenis = "puskesmas";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function sidoarjoApotek()
    {
        $daerah = "sidoarjo";
        $jenis = "apotek";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function gresikRs()
    {
        $daerah = "gresik";
        $jenis = "rs";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function gresikPuskesmas()
    {
        $daerah = "gresik";
        $jenis = "puskesmas";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function gresikApotek()
    {
        $daerah = "gresik";
        $jenis = "apotek";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }
}
