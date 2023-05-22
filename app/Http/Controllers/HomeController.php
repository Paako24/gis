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

    public function surabaya()
    {
        $daerah = "surabaya";
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

    public function surabayaKlinik()
    {
        $daerah = "surabaya";
        $jenis = "klinik";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function sidoarjo()
    {
        $daerah = "sidoarjo";
        $jenis = "semua";
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

    public function sidoarjoKlinik()
    {
        $daerah = "sidoarjo";
        $jenis = "klinik";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }

    public function gresik()
    {
        $daerah = "gresik";
        $jenis = "semua";
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

    public function gresikKlinik()
    {
        $daerah = "gresik";
        $jenis = "klinik";
        return view('layout.home', ['daerah' => $daerah, 'jenis' => $jenis]);
    }
}
