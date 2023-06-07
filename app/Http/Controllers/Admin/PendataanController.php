<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Models\Pendonor;
use App\Models\Penerima;
use App\Models\Pendataan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PendataanController extends Controller
{
    public function pendonor()
    {
        $p = Pendataan::get();
        return view('Admin.Pendataan.Pendonor', compact('p'));
    }

    public function penerima()
    {
        $pen = Penerima::get();
        return view('Admin.Pendataan.Penerima', compact('pen'));
    }

    public function darahMasuk()
    {
        $donor = User::doesntHave('roles')->get();
        $kat = Kategori::get();
        return view('Admin.Pendataan.Pendataan_masuk', compact('donor', 'kat'));
    }

    public function edit(Pendataan $pendataan)
    {
        $donor = User::doesntHave('roles')->get();
        $kat = Kategori::get();
        return view('Admin.Pendataan.Pendataan_masuk_edit', compact('donor', 'kat', 'pendataan'));
    }

    public function update(Request $request, Pendataan $pendataan)
    {
        $request->validate([
            'user_id'       => 'required',
            'kategori_id'   => 'required',
            'qty'           => 'required',
        ]);

        $pendataan = Pendataan::find($pendataan->id);
        $pendataan->user_id     = $request->user_id;
        $pendataan->kategori_id = $request->kategori_id;
        $pendataan->qty         = $request->qty;
        $pendataan->status      = 'Darah Masuk';
        $pendataan->save();

        $kategori                   = Kategori::find($pendataan->kategori_id);
        $kategori->stock_darah      = ($kategori->stock_darah - $request->stock_lama) + $pendataan->qty;
        $kategori->save();

        if ($pendataan) {
            Session::flash('message', "Pendataan Darah Masuk Berhasil");
            return redirect()->route('pendataan.pendonor');
        } else {
            Session::flash('message', "Pendataan Darah Masuk Gagal");
            return Redirect::back();
        }
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
            return redirect()->route('pendataan.pendonor');
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

    public function pedit(Penerima $penerima)
    {
        $kat = Kategori::get();
        return view('Admin.Pendataan.Pendataan_keluar_edit', compact('kat', 'penerima'));
    }

    public function pupdate(Request $request, Penerima $penerima)
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

        $penerima = Penerima::find($penerima->id);
        $penerima->kategori_id         = $request->kategori_id;
        $penerima->nama_penerima       = $request->nama_penerima;
        $penerima->nik                 = $request->nik;
        $penerima->nohp                = $request->nohp;
        $penerima->batas_tgl           = $request->batas_tgl;
        $penerima->desk_kondisi        = $request->desk_kondisi;
        $penerima->qty                 = $request->qty;
        $penerima->save();

        if ($penerima) {
            Session::flash('message', "Pendataan Darah Keluar Berhasil DiUpdate");
            return redirect()->route('pendataan.penerima');
        } else {
            Session::flash('message', "Pendataan Darah Keluar Gagal DiUpdate");
            return redirect()->back();
        }
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
            return redirect()->route('pendataan.penerima');
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

    public function delete(Pendataan $pendataan)
    {
        $kategori                   = Kategori::find($pendataan->kategori_id);
        $kategori->stock_darah      = $kategori->stock_darah - $pendataan->qty;
        $kategori->save();

        $pendataan->delete();
        if ($pendataan) {
            Session::flash('message', "Pendataan Darah Masuk Berhasil Terhapus");
            return redirect()->route('pendataan.pendonor');
        } else {
            Session::flash('message', "Pendataan Darah Masuk Gagal Terhapus");
            return Redirect::back();
        }
    }

    public function pdelete(Penerima $penerima)
    {
        $penerima->delete();
        if ($penerima) {
            Session::flash('message', "Pendataan Darah Keluar Berhasil Terhapus");
            return redirect()->route('pendataan.penerima');
        } else {
            Session::flash('message', "Pendataan Darah Keluar Gagal Terhapus");
            return Redirect::back();
        }
    }
}