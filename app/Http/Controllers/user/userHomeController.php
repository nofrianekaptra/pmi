<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Penerima;
use Illuminate\Http\Request;

class userHomeController extends Controller
{
    public function index()
    {
        $kat = Kategori::get();
        $pen = Penerima::pending()->get();
        return view('Pages.Home', compact('kat', 'pen'));
    }

    public function pasien()
    {
        $pen = Penerima::get();
        return view('Pages.Pasien', compact('pen'));
    }
}