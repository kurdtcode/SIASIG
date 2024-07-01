<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('dashboard.tables-anggota', compact('anggota'));
    }

    public function store(Request $request)
    {
        $anggota = new Anggota();
        $anggota->NRP = $request->NRP;
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->role = $request->role;
        $anggota->jenis_suara = $request->jenis_suara;
        $anggota->save();

        return redirect()->route('dashboard.tables-anggota');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('edit-anggota', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->NRP = $request->NRP;
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->role = $request->role;
        $anggota->jenis_suara = $request->jenis_suara;
        $anggota->save();

        return redirect()->route('dashboard.tables-anggota');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('dashboard.tables-anggota');
    }
}
