<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Pendonor;
use App\Models\Pendataan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PendataanController extends Controller
{
    public function index()
    {
        $p = Pendataan::get();
        return view('Admin.Pendataan.Index', compact('p'));
    }

    public function darahMasuk()
    {
        $donor = Pendonor::get();
        $kat = Kategori::get();
        return view('Admin.Pendataan.Pendataan_masuk', compact('donor', 'kat'));
    }

    public function store_dmk(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'kategori_id'   => 'required',
            'qty'           => 'required',
        ]);

        $pendataan = new Pendataan();
        $pendataan->user_id     = $request->user_id;
        $pendataan->kategori_id = $request->kategori_id;
        $pendataan->qty         = $request->qty;
        $pendataan->status      = 'Darah Masuk';
        $pendataan->save();

        $kategori                   = Kategori::find($pendataan->kategori_id);
        $kategori->stock_darah      = $kategori->stock_darah + $pendataan->qty;
        $kategori->save();

        if ($pendataan) {
            Session::flash('message', "Pendataan Darah Masuk Berhasil");
            return redirect()->route('pendataan.index');
        } else {
            Session::flash('message', "Pendataan Darah Masuk Gagal");
            return Redirect::back();
        }
    }
}