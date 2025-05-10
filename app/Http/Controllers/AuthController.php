<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthSubmitRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //Untuk Login 
    public function index(): View
    {
        return view('auth.login');
    }

    public function submit(UserAuthSubmitRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => 'admin'])) {
            $request->session()->regenerate();
            return Redirect()->intended('/admin/home');
        } else if (Auth::guard('petugas')->attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => 'petugas'])) {
            $request->session()->regenerate();
            return Redirect()->intended('/petugas/home');
        } else if (Auth::guard('mahasiswa')->attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => 'mahasiswa'])) {
            $request->session()->regenerate();
            return Redirect()->intended('/mahasiswa/home');
        } else {
            return Redirect(route('login'))->with('error', 'Email atau password salah');
        }
    }

    public function register(): View
    {
        return view('auth.register');
    }

    //untuk register
    public function submitregister(Request $request)
{
    
    $request->merge(['role' => 'mahasiswa']);
    $request->validate([
        
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:admin,petugas,mahasiswa',
        'password' => 'required|confirmed|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => bcrypt($request->password)

    ]);
    
    
    Auth::login($user);
    return redirect()->route('mahasiswa.dashboard.index')->with('success', 'Berhasil Register');
}

    //Untuk Logout
    public function logout(): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        } else if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }
        return Redirect(route('login'))->with('success', 'Berhasil Logout');
    }
}
