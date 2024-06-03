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
    public function index()
    {
        // Menampilkan dashboard utama
        return view('dashboard.index');
    }

    public function tables()
    {
        // Menampilkan tabel partitur dan anggota
        $anggota = Anggota::all();
        $partitur = Partitur::all();
        return view('dashboard.tables', compact('anggota', 'partitur'));
    }

    public function manageTask()
    {
        // Menampilkan halaman untuk mengatur tugas dan latihan
        $tugas = Tugas::all();
        $latihan = Latihan::all();
        return view('dashboard.manage-task', compact('tugas', 'latihan'));
    }

    public function proposal()
    {
        // Menampilkan halaman untuk mengelola proposal
        $proposals = Proposal::all();
        return view('dashboard.proposal', compact('proposals'));
    }

    public function portofolio()
    {
        // Menampilkan halaman untuk mengelola portofolio
        return view('dashboard.portofolio');
    }

    public function signOut()
    {
        // Logout dan kembali ke halaman utama
        auth()->logout();
        return redirect('/');
    }
}
