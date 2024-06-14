<!DOCTYPE html>
<html>
<head>
    <title>Manage Task PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Manage Task</h1>
    <table>
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
        <tbody>
            @foreach($tasks1 as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->nama_kegiatan }}</td>
                    <td>{{ $task->jenis_kegiatan }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>{{ $task->list_NRP_anggota }}</td>
                    <td>{{ $task->list_id_partitur }}</td>
                    <td>{{ $task->jumlah_latihan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
