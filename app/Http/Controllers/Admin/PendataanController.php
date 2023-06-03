<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Pendonor;
use App\Models\Penerima;
use App\Models\Pendataan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PendataanController extends Controller
{
    public function index()
    {
        $p = Pendataan::get();
        $pen = Penerima::get();
        return view('Admin.Pendataan.Index', compact('p', 'pen'));
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

    public function darahKeluar()
    {
        $kat = Kategori::get();
        return view('Admin.Pendataan.Pendataan_keluar', compact('kat'));
    }

    public function store_dklr(Request $request)
    {
        $request->validate([
            'kategori_id'         => 'required',
            'nama_penerima'       => 'required',
            'nik'                 => 'required',
            'nohp'                => 'required',
            'batas_tgl'           => 'required',
            'desk_kondisi'        => 'required',
            'qty'                 => 'required',
        ]);

        $penerima = new Penerima();
        $penerima->kategori_id         = $request->kategori_id;
        $penerima->nama_penerima       = $request->nama_penerima;
        $penerima->nik                 = $request->nik;
        $penerima->nohp                = $request->nohp;
        $penerima->batas_tgl           = $request->batas_tgl;
        $penerima->desk_kondisi        = $request->desk_kondisi;
        $penerima->qty                 = $request->qty;
        $penerima->status              = 'Pending';
        $penerima->save();

        if ($penerima) {
            Session::flash('message', "Pendataan Darah Keluar Berhasil");
            return redirect()->route('pendataan.index');
        } else {
            Session::flash('message', "Pendataan Darah Keluar Gagal");
            return Redirect::back();
        }
    }

    public function store_dklr_endproses(Penerima $penerima)
    {
        $darahDutuhkan = $penerima->qty;
        $cekDarah = Kategori::find($penerima->kategori_id);
        if ($cekDarah->stock_darah < $darahDutuhkan) {
            Alert::alert('Darurat', 'Stok Darah Tidak Mencukupi', 'warning');
            return Redirect::back();
        } else {
            $kategori = Kategori::find($penerima->kategori_id);
            $kategori->stock_darah = $kategori->stock_darah - $penerima->qty;
            $kategori->save();

            $penerima->status = 'Selesai';
            $penerima->save();
            Alert::alert('Berhasil', 'Proses Telah Selesai', 'success');
            return Redirect::back();
        }
    }
}