<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageTask;
use App\Models\Anggota;
use App\Models\Partitur;
use App\Models\Latihan;

class ManageTaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks1 = ManageTask::all();
        $anggota = Anggota::all();
        $partitur = Partitur::all();
        $selectedAnggota = $request->session()->get('selectedAnggota', []);
        $selectedPartitur = $request->session()->get('selectedPartitur', []);

        foreach ($tasks1 as $task) {
            $listIdAnggota = explode(',', $task->list_id_anggota);
            $listNRPAnggota = array_map(function($id) use ($anggota) {
                return $anggota->find($id)->NRP ?? $id;
            }, $listIdAnggota);

            $task->list_NRP_anggota = implode(', ', $listNRPAnggota);
        }

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
        // Simpan task terlebih dahulu
        $task = new ManageTask();
        $task->nama_kegiatan = $request->nama_kegiatan;
        $task->jenis_kegiatan = $request->jenis_kegiatan;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->list_id_anggota = implode(',', $request->session()->get('selectedAnggota', []));
        $task->list_id_partitur = implode(',', $request->session()->get('selectedPartitur', []));
        $task->jumlah_latihan = $request->jumlah_latihan;
        $task->save();
    
        $list_id_anggota = explode(',', $task->list_id_anggota);
    
        // Buat data latihan berdasarkan jumlah_latihan
        for ($i = 0; $i < $request->jumlah_latihan; $i++) {
            $latihan = new Latihan();
            $latihan->nama_latihan = 'Latihan ' . ($i + 1);
            $latihan->task_id = $task->id;
            $latihan->anggota = $task->list_id_anggota;
    
            $absensi = [];
            foreach ($list_id_anggota as $id_anggota) {
                $absensi[] = $id_anggota . ':0'; // Default to 0 (tidak hadir/alpha)
            }
            $latihan->absensi = implode(',', $absensi);
    
            $latihan->save();
        }
    
        $request->session()->forget(['selectedAnggota', 'selectedPartitur']);
    
        return redirect()->route('dashboard.manage_task');
    }

    public function edit($id)
    {
        $task = ManageTask::findOrFail($id);
        $anggota = Anggota::all();
    
        // Pemetaan ID anggota ke NRP
        $listIdAnggota = explode(',', $task->list_id_anggota);
        $listNRPAnggota = array_map(function($id) use ($anggota) {
            return $anggota->find($id)->NRP ?? $id;
        }, $listIdAnggota);
        $task->list_NRP_anggota = implode(', ', $listNRPAnggota);
    
        return view('manage_task.edit', compact('task', 'anggota', 'partitur'));
    }

    public function update(Request $request, $id)
    {
        $task = ManageTask::findOrFail($id);
        $task->nama_kegiatan = $request->nama_kegiatan;
        $task->jenis_kegiatan = $request->jenis_kegiatan;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->list_id_anggota = $request->input('list_id_anggota', $task->list_id_anggota);
        $task->list_id_partitur = $request->input('list_id_partitur', $task->list_id_partitur);
        $task->list_id_latihan = $request->input('list_id_latihan', $task->list_id_latihan);
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
        if (($key = array_search($id, $selectedAnggota)) !== false) {
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
