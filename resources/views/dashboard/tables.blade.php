@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Advanced Interaction Controls</h1>
    <p>Select a table to view:</p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="anggota-tab" data-toggle="tab" href="#anggota" role="tab" aria-controls="anggota" aria-selected="true">Anggota</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="partitur-tab" data-toggle="tab" href="#partitur" role="tab" aria-controls="partitur" aria-selected="false">Partitur</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
            <table id="anggotaTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NRP</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Jenis Suara</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggotas as $anggota)
                    <tr>
                        <td>{{ $anggota->NRP }}</td>
                        <td>{{ $anggota->name }}</td>
                        <td>{{ $anggota->email }}</td>
                        <td>{{ $anggota->role }}</td>
                        <td>{{ $anggota->jenis_suara }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="partitur" role="tabpanel" aria-labelledby="partitur-tab">
            <table id="partiturTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
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
                </thead>
                <tbody>
                    @foreach ($partiturs as $partitur)
                    <tr>
                        <td>{{ $partitur->id }}</td>
                        <td>{{ $partitur->judul }}</td>
                        <td>{{ $partitur->pembuat_aransemen }}</td>
                        <td>{{ $partitur->komposer }}</td>
                        <td>{{ $partitur->genre_lagu }}</td>
                        <td><a href="{{ $partitur->link_youtube }}" target="_blank">Link</a></td>
                        <td>{{ $partitur->kebutuhan_instrumen }}</td>
                        <td>{{ $partitur->tingkat_kesulitan }}</td>
                        <td>{{ $partitur->kebutuhan_solo ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $partitur->jenis_suara }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#anggotaTable').DataTable();
        $('#partiturTable').DataTable();
    });
</script>
@endsection
