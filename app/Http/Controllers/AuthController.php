<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('Auth.Login');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            Alert::alert('Authentication Success', 'Anda Berhasil Login', 'success');
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.home');
            } else {
                return redirect('/');
            }
        } else {
            Alert::alert('Authentication Errors', 'Email / Password Anda Salah', 'error');
            return redirect()->back();
        }
    }

    public function showreg()
    {
        return view('Auth.Reg');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/');
        } else {
            Alert::alert('Register Errors', 'Terjadi Kesalahan!', 'error');
            return redirect()->back();
        }
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}