<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Partitur;
use App\Models\Tugas;
use App\Models\Latihan;
use App\Models\Proposal;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('dashboard.index', compact('anggota'));
    }

    /**
     * Menampilkan halaman tabel
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        $partitur = Partitur::all();
        return view('dashboard.tables', compact('partitur'));
    }

    /**
     * Menampilkan halaman manajemen tugas
     *
     * @return \Illuminate\View\View
     */
    public function manageTask()
    {
        $tugas = Tugas::all();
        return view('dashboard.manage-task', compact('tugas'));
    }

    /**
     * Menampilkan halaman proposal
     *
     * @return \Illuminate\View\View
     */
    public function proposal()
    {
        $proposal = Proposal::all();
        return view('dashboard.proposal', compact('proposal'));
    }

    /**
     * Menampilkan halaman portofolio
     *
     * @return \Illuminate\View\View
     */
    public function portofolio()
    {
        $latihan = Latihan::all();
        return view('dashboard.portofolio', compact('latihan'));
    }
}