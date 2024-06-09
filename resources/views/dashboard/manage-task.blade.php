@extends('layouts.app')

@section('title', 'Manage Task')
@section('page', 'Manage Task')
@section('additional-css')
@section('additional_head')
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png')}}">
  <title>@yield('title', 'Dashboard Admin PCU CHOIR')</title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/admin/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/admin/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
<style>
    .main-content {
        margin-left: 270px; /* Adjust this value based on your sidebar width */
        padding: 20px; /* Optional, for additional spacing */
    }
    @media (max-width: 991.98px) {
        .main-content {
            margin-left: 0;
        }
    }
    .form-group {
        position: relative;
    }

    .form-control[type="date"] {
        padding-right: 80%; /* Menambahkan padding untuk memberi ruang pada indikator kalender */
    }
    .form-group label {
        font-weight: bold;
    }
    .form-group input, .form-group select {
        margin-bottom: 15px;
    }

    .btn-success, .btn-primary {
        margin-top: 15px;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

</style>
@endsection
@section('content')

    <div class="container-fluid">
        <!-- Daftar Anggota Terkait -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Daftar Anggota Terkait</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_task.addAnggota') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control" id="anggota-select" name="id" required>
                            @foreach($anggota as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success ml-3"><i class="fa fa-plus"></i> Tambah Anggota</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="anggota-table" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama Anggota</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($selectedAnggota))
                                @foreach($selectedAnggota as $id)
                                    @php
                                        $member = $anggota->firstWhere('id', $id);
                                    @endphp
                                    @if($member)
                                        <tr>
                                            <td>{{ $member->NRP }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>
                                                <form action="{{ route('manage_task.removeAnggota', $member->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada anggota yang dipilih.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Daftar Partitur Terkait -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Daftar Partitur Terkait</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_task.addPartitur') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <select class="form-control" id="partitur-select" name="id" required>
                            @foreach($partitur as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }} - {{ $item->komposer }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success ml-3"><i class="fa fa-plus"></i> Tambah Partitur</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="partitur-table" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Pembuat Aransemen</th>
                                <th>Komposer</th>
                                <th>Link YouTube</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($selectedPartitur))
                                @foreach($selectedPartitur as $id)
                                    @php
                                        $item = $partitur->firstWhere('id', $id);
                                    @endphp
                                    @if($item)
                                        <tr>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->pembuat_aransemen }}</td>
                                            <td>{{ $item->komposer }}</td>
                                            <td><a href="{{ $item->link_youtube }}" target="_blank">{{ $item->link_youtube }}</a></td>
                                            <td>
                                                <form action="{{ route('manage_task.removePartitur', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada partitur yang dipilih.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Form Input -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Input Data</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_task.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kegiatan">Jenis Kegiatan</label>
                        <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" required>
                            <option value="Pelayanan">Pelayanan</option>
                            <option value="Lomba">Lomba</option>
                            <option value="Internal">Internal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_latihan">Jumlah Latihan</label>
                        <input type="number" class="form-control" id="jumlah_latihan" name="jumlah_latihan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Tabel Hasil -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Hasil Manage Task</h4>
            </div>
            <a href="{{ route('export.tasks.pdf') }}" class="btn btn-primary">Export to PDF</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="tasks1-table" class="table table-bordered table-hover table-striped">
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
                                <th>Action</th>
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
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $task->id }}">Edit</button>

                                        <!-- Tombol Delete -->
                                        <form action="{{ route('manage_task.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $task->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $task->id }}">Edit Manage Task</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('manage_task.update', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nama_kegiatan">Nama Kegiatan</label>
                                                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $task->nama_kegiatan }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                                        <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" required>
                                                            <option value="Pelayanan" {{ $task->jenis_kegiatan == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                                                            <option value="Lomba" {{ $task->jenis_kegiatan == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                                                            <option value="Internal" {{ $task->jenis_kegiatan == 'Internal' ? 'selected' : '' }}>Internal</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="start_date">Tanggal Mulai</label>
                                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $task->start_date }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_date">Tanggal Selesai</label>
                                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $task->end_date }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="list_NRP_anggota">NRP Anggota</label>
                                                        <input type="text" class="form-control" id="list_NRP_anggota" name="list_NRP_anggota" value="{{ $task->list_NRP_anggota }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="list_id_partitur">List ID Partitur</label>
                                                        <input type="text" class="form-control" id="list_id_partitur" name="list_id_partitur" value="{{ $task->list_id_partitur }}" readonly>
                                                    </div>
                                                    <input type="hidden" name="list_id_anggota" value="{{ $task->list_id_anggota }}">
                                                    <input type="hidden" name="list_id_partitur" value="{{ $task->list_id_partitur }}">
                                                    <input type="hidden" name="list_id_latihan" value="{{ $task->list_id_latihan }}">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
