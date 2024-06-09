<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageTask;
use App\Models\Anggota; 
use App\CustomPDF;

class TaskController extends Controller
{
    public function exportToPDF()
    {
        $tasks = ManageTask::all(); // Fetch all tasks from the manage_task table

        // Create new PDF document
        $pdf = new CustomPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Laporan Kegiatan');
        $pdf->SetSubject('Tasks');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Add content
        $html = '<h1>Manage Task Report</h1>';
        $html .= '<table border="1" cellspacing="3" cellpadding="4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kegiatan</th>
                            <th>Jenis Kegiatan</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>List NRP Anggota</th>
                            <th>List ID Partitur</th>
                            <th>Jumlah Latihan</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($tasks as $task) {
            $html .= '<tr>
                        <td>' . $task->id . '</td>
                        <td>' . $task->nama_kegiatan . '</td>
                        <td>' . $task->jenis_kegiatan . '</td>
                        <td>' . $task->start_date . '</td>
                        <td>' . $task->end_date . '</td>
                        <td>' . $task->list_NRP_anggota. '</td>
                        <td>' . $task->list_id_partitur . '</td>
                        <td>' . $task->jumlah_latihan . '</td>
                      </tr>';
        }

        $html .= '  </tbody>
                  </table>';

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('manage_tasks.pdf', 'D'); // D for download, I for inline view
    }

    private function getNRPs($list_id_anggota)
    {
        $ids = explode(',', $list_id_anggota);
        $nrps = Member::whereIn('id', $ids)->pluck('nrp')->toArray();
        return $nrps;
    }
    
    public function index()
    {
        $tasks = ManageTask::all();
        return view('dashboard.task-list', compact('tasks'));
    }
}
