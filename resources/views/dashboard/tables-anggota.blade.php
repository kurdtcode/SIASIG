@extends('layouts.app')

@section('title', 'Tabel Anggota')
@section('page', 'Tabel Anggota')
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

    .form-group label {
        font-weight: bold;
    }
    .form-group input, .form-group select {
        margin-bottom: 15px;
    }

    .btn-primary, .btn-warning, .btn-danger {
        margin: 5px 0;
    }

    .table th, .table td {
        vertical-align: middle !important;
    }

</style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <h1 class="mt-5">Daftar Anggota</h1>
                <!-- Tombol Tambah Anggota -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Anggota</button>
            </div>
            <div class="card-body">
                <!-- Modal Tambah Anggota -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Anggota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('anggota.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="NRP">NRP</label>
                                        <input type="text" class="form-control" id="NRP" name="NRP" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_suara">Jenis Suara</label>
                                        <input type="text" class="form-control" id="jenis_suara" name="jenis_suara" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Jenis Suara</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->NRP }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->role }}</td>
                                <td>{{ $member->jenis_suara }}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>{{ $member->updated_at }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $member->id }}">Edit</button>
                                    <form action="{{ route('anggota.destroy', $member->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $member->id }}">Edit Anggota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('anggota.update', $member->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nrp{{ $member->id }}">NRP</label>
                                                    <input type="text" class="form-control" id="nrp{{ $member->id }}" name="NRP" value="{{ $member->NRP }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name{{ $member->id }}">Nama</label>
                                                    <input type="text" class="form-control" id="name{{ $member->id }}" name="name" value="{{ $member->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email{{ $member->id }}">Email</label>
                                                    <input type="email" class="form-control" id="email{{ $member->id }}" name="email" value="{{ $member->email }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role{{ $member->id }}">Role</label>
                                                    <input type="text" class="form-control" id="role{{ $member->id }}" name="role" value="{{ $member->role }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_suara{{ $member->id }}">Jenis Suara</label>
                                                    <input type="text" class="form-control" id="jenis_suara{{ $member->id }}" name="jenis_suara" value="{{ $member->jenis_suara }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
