<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Partitur;
use App\Models\Tugas;
use App\Models\Proposal;
use App\Models\Latihan;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Log::info('DashboardController@index accessed by user: ' . auth()->user()->id);
        $anggota = Anggota::all();
        return view('dashboard.index', compact('anggota'));
    }

    // Metode lainnya
    public function tables()
    {
        $partitur = Partitur::all();
        return view('dashboard.tables', compact('partitur'));
    }

    public function manageTask()
    {
        $tugas = Tugas::all();
        return view('dashboard.manage-task', compact('tugas'));
    }

    public function proposal()
    {
        $proposal = Proposal::all();
        return view('dashboard.proposal', compact('proposal'));
    }

    public function portofolio()
    {
        $latihan = Latihan::all();
        return view('dashboard.portofolio', compact('latihan'));
    }
}
