<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('dashboard.tables-anggota', compact('anggota'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'NRP' => 'required|unique:anggota,NRP',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
            'jenis_suara' => 'required',
        ]);

        // Simpan data ke tabel anggota
        $anggota = new Anggota();
        $anggota->NRP = $request->NRP;
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->role = $request->role;
        $anggota->jenis_suara = $request->jenis_suara;
        $anggota->save();

        // Simpan data ke tabel users
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->usertype = $request->role;
        $user->save();

        return redirect()->route('anggota.create')->with('success', 'Anggota created successfully.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('edit-anggota', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'NRP' => 'required|unique:anggota,NRP,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'jenis_suara' => 'required',
        ]);

        // Update data di tabel anggota
        $anggota = Anggota::findOrFail($id);
        $anggota->NRP = $request->NRP;
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->role = $request->role;
        $anggota->jenis_suara = $request->jenis_suara;
        $anggota->save();

        // Update data di tabel users
        $user = User::where('email', $anggota->email)->first();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->usertype = $request->role;
            $user->save();
        }

        return redirect()->route('dashboard.tables-anggota')->with('success', 'Anggota updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data di tabel anggota
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        // Hapus data di tabel users
        $user = User::where('email', $anggota->email)->first();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('dashboard.tables-anggota')->with('success', 'Anggota deleted successfully.');
    }
}
