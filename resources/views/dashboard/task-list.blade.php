@extends('layouts.app')

@section('title', 'Daftar Task')
@section('page', 'Daftar Task')
@section('additional-css')
@endsection
@section('additional_head')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png') }}">
<title>@yield('title', 'Dashboard Admin PCU CHOIR')</title>
<!-- Fonts and icons -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('assets/admin/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is an easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
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
    .action-buttons {
        display: flex;
        flex-direction: column;
    }
    @media (min-width: 576px) {
        .action-buttons {
            flex-direction: row;
        }
    }
    .action-buttons a {
        margin: 2px 0;
    }
    @media (min-width: 576px) {
        .action-buttons a {
            margin: 2px 2px 2px 0;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Daftar Task</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kegiatan</th>
                    <th>Jenis Kegiatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td data-label="ID">{{ $task->id }}</td>
                        <td data-label="Nama Kegiatan">{{ $task->nama_kegiatan }}</td>
                        <td data-label="Jenis Kegiatan">{{ $task->jenis_kegiatan }}</td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <a href="{{ route('absensi.check', ['taskId' => $task->id]) }}" class="btn btn-primary btn-sm mb-1">Check Absensi</a>
                                <a href="{{ route('absensi.sheetReport', ['taskId' => $task->id]) }}" class="btn btn-secondary btn-sm mb-1">Report Absensi</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
