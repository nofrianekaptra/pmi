<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pendataan;
use App\Models\Pendonor;
use App\Models\Penerima;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(): View
    {
        $users = User::get();
        $pendonors = Pendataan::get()->count();
        $penerimas = Penerima::get()->count();
        $totaldarah = Kategori::selectRaw("SUM(stock_darah) as darah")->get();
        return view('Admin.Dashboard', compact('users', 'pendonors', 'penerimas', 'totaldarah'));
    }

    public function settp()
    {
        return view('Admin.Change_pass');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}