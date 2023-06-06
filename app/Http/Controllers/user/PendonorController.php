<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendataan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PendonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pen = Pendataan::get();
        $cek = User::doesntHave('roles')->where('id', Auth::id())->first();
        return view('Pages.Pendonor', compact('pen', 'cek'));
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
        $validator = Validator::make($request->all(), [
            'nik'           => 'required',
            'nohp'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pendonor = User::find(Auth::id());
        $pendonor->nik = $request->nik;
        $pendonor->nohp = $request->nohp;
        $pendonor->save();

        return response()->json([
            'success' => true,
            'message' => 'Anda Telah Berhasil Mendaftar, Silahkan Ke Kantor PMI Untuk Lebih Lanjut',
            'data'    => $pendonor
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}