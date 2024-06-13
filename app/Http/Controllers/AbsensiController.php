<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ManageTask;
use App\Models\Latihan;
use App\Models\Attendance;
use App\Models\Anggota;
use App\Models\Absensi;


class AbsensiController extends Controller
{
    public function updateAbsensi(Request $request)
    {
        $latihanIds = $request->input('latihan_ids');
        $absensi = $request->input('absensi'); // expecting a 2D array

        if (is_null($latihanIds) || empty($absensi)) {
            return redirect()->back()->with('error', 'Invalid input data');
        }

        $anggotaIds = [];

        // Fetch all anggota IDs (assuming $anggota contains all anggota)
        $anggota = Anggota::all();
        foreach ($anggota as $member) {
            $anggotaIds[] = $member->id;
        }

        // Initialize result strings for each latihanId
        $resultStrings = [];

        // Initialize all attendance data with 0 (not present)
        foreach ($latihanIds as $latihanId) {
            $resultStrings[$latihanId] = [];
            foreach ($anggotaIds as $memberId) {
                $resultStrings[$latihanId][$memberId] = "[$memberId;0]";
            }
        }

        // Update attendance data based on the input
        foreach ($absensi as $latihanId => $members) {
            foreach ($members as $memberId => $attendanceStatus) {
                $attendanceStatus = $attendanceStatus === "hadir" ? '1' : '0';
                $resultStrings[$latihanId][$memberId] = "[$memberId;$attendanceStatus]";
            }
        }

        // Iterate through all latihan_ids and update their absensi columns
        foreach ($latihanIds as $latihanId) {
            if (isset($resultStrings[$latihanId])) {
                // Combine the result strings into the desired format
                $finalResultString = '(' . implode(',', $resultStrings[$latihanId]) . ')';
                $latihan = Latihan::find($latihanId);

                if ($latihan) {
                    // Update the absensi column
                    $latihan->absensi = $finalResultString;
                    $latihan->save();
                } else {
                    return redirect()->back()->with('error', "Latihan with ID $latihanId not found");
                }
            }
        }

        return redirect()->back()->with('success', 'Absensi updated successfully');
    }

         

    public function showAttendanceForm()
    {
        $task = Tas k::find(1); // Example: Get the specific task
        $anggota = Member::all(); // Example: Get all members
        $latihan = Latihan::all(); // Example: Get all latihan
        $check_attd = [];
    
        // Populate check_attd based on current attendance status
        foreach ($latihan as $latih) {
            $absensiString = trim($latih->absensi, '[]');
            $absensiArray = explode('],[', $absensiString);
            foreach ($absensiArray as $item) {
                $pair = explode(',', trim($item, '[]'));
                $check_attd[$latih->id][$pair[0]] = $pair[1];
                dd($check_attd);
            }
        }
    
        return view('check', compact('task', 'anggota', 'latihan', 'check_attd'));
    }
    
    public function showCheckForm($taskId)
    {
        $task = ManageTask::with('anggota')->findOrFail($taskId);
        # dapatkan anggota secara individu, task-> anggota
        # explode anggota -> pake ,

        $anggotaIds = explode(',', $task->list_id_anggota);
        $anggota = Anggota::whereIn('id', $anggotaIds)->get();
        // dd($anggota);
        $latihan = Latihan::where('task_id', $taskId)->get();
        // dd($latihan);
        return view('absensi.check', compact('task', 'latihan', 'anggota'));
    }

    public function showSheetReport($taskId)
    {
        $task = ManageTask::findOrFail($taskId);
        $latihan = Latihan::where('task_id', $taskId)->get();
        $anggotaIds = explode(',', $task->list_id_anggota);
        $anggota = Anggota::whereIn('id', $anggotaIds)->get();

        $check_attd = [];
        foreach ($latihan as $latih) {
            $absensiData = $latih->absensi;
            preg_match_all('/\[(\d+);(\d+)\]/', $absensiData, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $memberId = $match[1];
                $status = $match[2];
                $check_attd[$latih->id][$memberId] = $status;
            }
        }

        return view('absensi.sheet-report', compact('task', 'latihan', 'anggota', 'check_attd'));
    }

    
    public function submitCheckForm(Request $request, $taskId)
    {
        $task = ManageTask::findOrFail($taskId);

        // Dapatkan anggota sebagai array dari list_id_anggota
        $anggotaIds = explode(',', $task->list_id_anggota);

         // Reset all statuses to alpha first
         foreach ($anggotaIds as $anggotaId) {
            foreach ($request->input('attd', []) as $latihan_id => $attendance) {
                Absensi::updateOrCreate(
                    ['anggota_id' => $anggotaId, 'latihan_id' => $latihan_id],
                    ['status' => 'alpha']
                );
            }
        }
        
        // Update hadir status
        foreach ($request->input('attd', []) as $latihan_id => $attendance) {
            foreach ($attendance as $anggota_id => $status) {
                Absensi::updateOrCreate(
                    ['anggota_id' => $anggota_id, 'latihan_id' => $latihan_id],
                    ['status' => 'hadir']
                );
            }
        }
    
        return redirect()->route('absensi.check', ['taskId' => $taskId])->with('success', 'Absensi telah diperbarui');
    }


}
