<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;

class CreateAdminController extends Controller
{
    public function create()
    {
        return view('create-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:anggota',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,super admin',
        ]);

        $user = Anggota::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Admin created successfully.');
    }
}
