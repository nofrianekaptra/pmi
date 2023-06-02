<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $k = Kategori::get();
        return view('Admin.Kategori.index', compact('k'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_d' => 'required|unique:kategoris',
            'keterangan' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->jenis_d = $request->jenis_d;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        if ($kategori) {
            Session::flash('message', "Data Berhasil DiTambahkan");
            return Redirect::back();
        } else {
            Session::flash('message', "Data Gagal DiTambahkan");
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $k = Kategori::get();
        return view('Admin.Kategori.index', compact('k', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'jenis_d' => 'required|unique:kategoris,jenis_d,' . $kategori->id,
            'keterangan' => 'required',
        ]);

        $kategori->jenis_d = $request->jenis_d;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        if ($kategori) {
            Session::flash('message', "Data Berhasil Terupdate");
            return Redirect::back();
        } else {
            Session::flash('message', "Data Gagal Terupdate");
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        if ($kategori) {
            Session::flash('message', "Data Berhasil Terhapus");
            return Redirect::back();
        } else {
            Session::flash('message', "Data Gagal Terhapus");
            return Redirect::back();
        }
    }
}