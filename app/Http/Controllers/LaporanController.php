<?php

namespace App\Http\Controllers;

use App\Models\Pendataan;
use App\Models\Penerima;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.Index');
    }

    public function darahmasuk_tahunan(Request $request)
    {
        $tahun = $request->tahun;
        $data = Pendataan::whereYear('created_at', '=', $tahun)->get();
        return view('Laporan.Masuk_tahun', compact('data', 'tahun'));
    }
    public function darahmasuk_bulanan(Request $request)
    {
        $bulan = $request->bulan;
        $data = Pendataan::whereMonth('created_at', '=', $bulan)->get();
        return view('Laporan.Masuk_bulan', compact('data', 'bulan'));
    }

    public function darahkeluar_tahunan(Request $request)
    {
        $tahun = $request->tahun;
        $data = Penerima::whereYear('created_at', '=', $tahun)->get();
        return view('Laporan.Keluar_tahun', compact('data', 'tahun'));
    }
    public function darahkeluar_bulanan(Request $request)
    {
        $bulan = $request->bulan;
        $data = Penerima::whereMonth('created_at', '=', $bulan)->get();
        return view('Laporan.Keluar_bulan', compact('data', 'bulan'));
    }
}