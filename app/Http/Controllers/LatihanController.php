<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function updateAbsensi(Request $request, $id)
    {
        $latihan = Latihan::find($id);
        $anggota_absensi = explode(',', $latihan->absensi);

        foreach ($anggota_absensi as &$absen) {
            list($id_anggota, $status) = explode(':', $absen);
            $status = in_array($id_anggota, $request->absensi) ? 1 : 0;
            $absen = $id_anggota . ':' . $status;
        }

        $latihan->absensi = implode(',', $anggota_absensi);
        $latihan->save();

        return redirect()->route('dashboard.manage_task')->with('success', 'Absensi updated successfully.');
    }
}
