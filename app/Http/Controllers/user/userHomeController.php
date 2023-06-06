<?php

namespace App\Http\Controllers\user;

use App\Models\Kategori;
use App\Models\Pendonor;
use App\Models\Penerima;
use App\Models\Pendataan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function historiku()
    {
        $pen = Pendataan::where('user_id', Auth::id())->get();
        return view('Pages.Histori', compact('pen'));
    }
}