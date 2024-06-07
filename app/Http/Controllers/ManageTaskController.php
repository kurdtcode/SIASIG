<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageTask;
use App\Models\Anggota;
use App\Models\Partitur;

class ManageTaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks1 = ManageTask::all();
        $anggota = Anggota::all();
        $partitur = Partitur::all();
        $selectedAnggota = $request->session()->get('selectedAnggota', []);
        $selectedPartitur = $request->session()->get('selectedPartitur', []);
        return view('dashboard.manage-task', compact('tasks1', 'anggota', 'partitur', 'selectedAnggota', 'selectedPartitur'));
    }

    public function addAnggota(Request $request)
    {
        $selectedAnggota = $request->session()->get('selectedAnggota', []);
        
        if (!in_array($request->id, $selectedAnggota)) {
            $selectedAnggota[] = $request->id;
        }
        $request->session()->put('selectedAnggota', $selectedAnggota);

        return redirect()->route('dashboard.manage_task');
    }

    public function addPartitur(Request $request)
    {
        $selectedPartitur = $request->session()->get('selectedPartitur', []);
        if (!in_array($request->id, $selectedPartitur)) {
            $selectedPartitur[] = $request->id;
        }
        $request->session()->put('selectedPartitur', $selectedPartitur);

        return redirect()->route('dashboard.manage_task');
    }

    public function store(Request $request)
    {
        // dd($request->session()->get('selectedAnggota'));
        $task = new ManageTask();
        $task->nama_kegiatan = $request->nama_kegiatan;
        $task->jenis_kegiatan = $request->jenis_kegiatan;
        $task->waktu = $request->waktu;
        $task->list_id_anggota = implode(',', $request->session()->get('selectedAnggota', []));
        $task->list_id_partitur = implode(',', $request->session()->get('selectedPartitur', []));
        $task->list_id_latihan = $request->list_id_latihan;
        $task->save();

        $request->session()->forget(['selectedAnggota', 'selectedPartitur']);

        return redirect()->route('dashboard.manage_task');
    }

    public function edit($id)
    {
        $task = ManageTask::findOrFail($id);
        return view('manage_task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = ManageTask::findOrFail($id);
        $task->nama_kegiatan = $request->nama_kegiatan;
        $task->jenis_kegiatan = $request->jenis_kegiatan;
        $task->waktu = $request->waktu;
        $task->list_id_anggota = implode(',', $request->session()->get('selectedAnggota', []));
        $task->list_id_partitur = implode(',', $request->session()->get('selectedPartitur', []));
        $task->list_id_latihan = $request->list_id_latihan;
        $task->save();

        $request->session()->forget(['selectedAnggota', 'selectedPartitur']);

        return redirect()->route('dashboard.manage_task');
    }

    public function destroy($id)
    {
        $task = ManageTask::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard.manage_task');
    }

    public function removeAnggota(Request $request, $NRP)
    {
        $selectedAnggota = $request->session()->get('selectedAnggota', []);
        if (($key = array_search($NRP, $selectedAnggota)) !== false) {
            unset($selectedAnggota[$key]);
        }
        $request->session()->put('selectedAnggota', $selectedAnggota);

        return redirect()->route('dashboard.manage_task');
    }

    public function removePartitur(Request $request, $id)
    {
        $selectedPartitur = $request->session()->get('selectedPartitur', []);
        if (($key = array_search($id, $selectedPartitur)) !== false) {
            unset($selectedPartitur[$key]);
        }
        $request->session()->put('selectedPartitur', $selectedPartitur);

        return redirect()->route('dashboard.manage_task');
    }
}
