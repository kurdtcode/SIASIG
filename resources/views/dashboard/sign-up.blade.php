<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <h2>Laravel</h2>
        <ul class="list-unstyled">
            <li><a href="{{ route('logout') }}" class="text-white">Logout</a></li>
            <li><a href="{{ route('tables.type', 'anggota') }}" class="text-white">Anggota</a></li>
            <li><a href="{{ route('tables.type', 'partitur') }}" class="text-white">Partitur</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>TABEL {{ strtoupper($tableType) }}</h1>
        <table id="dataTable" class="display" style="width:100%">
            <thead>
                @if ($tableType === 'anggota')
                <tr>
                    <th>NRP</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Jenis Suara</th>
                </tr>
                @else
                <tr>
                    <th>Judul</th>
                    <th>Pembuat Aransemen</th>
                    <th>Komposer</th>
                    <th>Genre Lagu</th>
                    <th>Link YouTube</th>
                    <th>Kebutuhan Instrumen</th>
                    <th>Tingkat Kesulitan</th>
                    <th>Kebutuhan Solo</th>
                    <th>Jenis Suara</th>
                </tr>
                @endif
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    @if ($tableType === 'anggota')
                    <td>{{ $item->NRP }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->jenis_suara }}</td>
                    @else
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pembuat_aransemen }}</td>
                    <td>{{ $item->komposer }}</td>
                    <td>{{ $item->genre_lagu }}</td>
                    <td>{{ $item->link_youtube }}</td>
                    <td>{{ $item->kebutuhan_instrumen }}</td>
                    <td>{{ $item->tingkat_kesulitan }}</td>
                    <td>{{ $item->kebutuhan_solo }}</td>
                    <td>{{ $item->jenis_suara }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
