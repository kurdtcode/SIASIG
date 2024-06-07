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

    public function showAnggota()
    {
        $data = Anggota::all();
        return view('dashboard.tables-anggota', ['data' => $data]);
    }

    public function showPartitur()
    {
        $data = Partitur::all();
        return view('dashboard.tables-partitur', ['data' => $data]);
    }

    public function manageTask()
    {
        $tugas = Tugas::all();
        return view('dashboard.manage-task', compact('tugas'));
    }

    public function proposal()
    {
        $proposals = Proposal::all();
        return view('dashboard.proposal', compact('proposals'));
    }

    public function portofolio()
    {
        $latihan = Latihan::all();
        return view('dashboard.portofolio', compact('latihan'));
    }
}
