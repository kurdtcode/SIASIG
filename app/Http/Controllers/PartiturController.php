<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partitur;
use Illuminate\Support\Facades\Log;

class PartiturController extends Controller
{
    public function index()
    {
        $item = Partitur::all();
        return view('dashboard.tables-partitur', compact('item'));
    }

    public function store(Request $request)
    {
        $partitur = new Partitur();
        $partitur->judul = $request->judul;
        $partitur->pembuat_aransemen = $request->pembuat_aransemen;
        $partitur->komposer = $request->komposer;
        $partitur->genre_lagu = $request->genre_lagu;
        $partitur->link_youtube = $request->link_youtube;
        $partitur->kebutuhan_instrumen = $request->kebutuhan_instrumen;
        $partitur->tingkat_kesulitan = $request->tingkat_kesulitan;
        $partitur->kebutuhan_solo = $request->kebutuhan_solo;
        $partitur->jenis_suara = $request->jenis_suara;
        $partitur->save();

        return redirect()->route('dashboard.tables-partitur');
    }

    public function update(Request $request, $id)
    {
        $partitur = Partitur::findOrFail($id);
        $partitur->judul = $request->judul;
        $partitur->pembuat_aransemen = $request->pembuat_aransemen;
        $partitur->komposer = $request->komposer;
        $partitur->genre_lagu = $request->genre_lagu;
        $partitur->link_youtube = $request->link_youtube;
        $partitur->kebutuhan_instrumen = $request->kebutuhan_instrumen;
        $partitur->tingkat_kesulitan = $request->tingkat_kesulitan;
        $partitur->kebutuhan_solo = $request->kebutuhan_solo;
        $partitur->jenis_suara = $request->jenis_suara;
        $partitur->save();

        return redirect()->route('dashboard.tables-partitur');
    }

    public function destroy($id)
    {
        $partitur = Partitur::findOrFail($id);
        $partitur->delete();

        return redirect()->route('dashboard.tables-partitur');
    }
}
