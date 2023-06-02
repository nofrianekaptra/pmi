<?php

namespace App\Http\Controllers\user;

use App\Models\Pendonor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PendonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p = Pendonor::get();

        $cek_pendonor = Pendonor::where(['user_id' => Auth::id()])->first();
        return view('Pages.Pendonor', compact('p', 'cek_pendonor'));
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
        $pendonor = Pendonor::create([
            'user_id'       => Auth::id(),
            'nik'           => $request->nik,
            'nohp'          => $request->nohp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
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