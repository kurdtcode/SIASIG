<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Partitur;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('dashboard.tables', ['anggota' => Anggota::all(), 'partitur' => Partitur::all()]);
    }

    public function showAnggota()
    {
        return view('dashboard.tables', ['anggota' => Anggota::all(), 'partitur' => null]);
    }

    public function showPartitur()
    {
        return view('dashboard.tables', ['anggota' => null, 'partitur' => Partitur::all()]);
    }
}
