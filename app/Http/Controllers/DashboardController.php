<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Pinjaman;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "title" => "Dashboard",
            "pemohon" => count(Pemohon::all()),
            "pinjaman" => count(Pinjaman::all()),
            "alternatif" => count(Alternatif::all()),
        ]);
    }
}
