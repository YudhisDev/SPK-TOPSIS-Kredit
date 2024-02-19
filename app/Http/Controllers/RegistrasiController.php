<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registrasi;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasion', [
            "title" => "Halaman Register",
            "active" => "register",
            "admin" => User::where('is_admin', true)->first()
        ]);
    }
    public function tambah(Request $request)
    {
        // code
    }
    public function store(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
            'is_admin' => ['required'],
            'keterangan' => ['required']
        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        // dd($credentials);
        Registrasi::create($credentials);

        $user = Registrasi::where('is_admin', TRUE)->first();
        if ($credentials['is_admin'] == TRUE) {
            User::create([
                'id_registrasi' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'is_admin' => $user['is_admin'],
                'created_at' => $user['created_at'],
                'updates_at' => $user['updated_at']
            ]);
            $request->session()->flash('success', 'Registrasi berhasil silahkan login');
            return redirect('/');
        }
        $request->session()->flash('success', 'Registrasi berhasil silahkan hubungi admin untuk divalidasi');

        return redirect('/');
    }
}
