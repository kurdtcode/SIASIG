@extends('layouts.app')

@section('title', 'Tabel Partitur')
@section('page', 'Tabel Partitur')
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
                <h1 class="mt-5">Daftar Partitur</h1>
                <!-- Tombol Tambah Partitur -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Partitur</button>
            </div>
            <div class="card-body">
                <!-- Modal Tambah Partitur -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Partitur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('partitur.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pembuat_aransemen">Pembuat Aransemen</label>
                                        <input type="text" class="form-control" id="pembuat_aransemen" name="pembuat_aransemen" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="komposer">Komposer</label>
                                        <input type="text" class="form-control" id="komposer" name="komposer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre_lagu">Genre Lagu</label>
                                        <input type="text" class="form-control" id="genre_lagu" name="genre_lagu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link_youtube">Link YouTube</label>
                                        <input type="text" class="form-control" id="link_youtube" name="link_youtube" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kebutuhan_instrumen">Kebutuhan Instrumen</label>
                                        <input type="text" class="form-control" id="kebutuhan_instrumen" name="kebutuhan_instrumen" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
                                        <input type="text" class="form-control" id="tingkat_kesulitan" name="tingkat_kesulitan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kebutuhan_solo">Kebutuhan Solo</label>
                                        <input type="text" class="form-control" id="kebutuhan_solo" name="kebutuhan_solo" required>
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
                                <th>Judul</th>
                                <th>Pembuat Aransemen</th>
                                <th>Komposer</th>
                                <th>Genre Lagu</th>
                                <th>Link YouTube</th>
                                <th>Kebutuhan Instrumen</th>
                                <th>Tingkat Kesulitan</th>
                                <th>Kebutuhan Solo</th>
                                <th>Jenis Suara</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Asumsikan Anda memiliki variabel $item yang berisi data partitur -->
                            @foreach ($item as $partitur)
                            <tr>
                                <td>{{ $partitur->id }}</td>
                                <td>{{ $partitur->judul }}</td>
                                <td>{{ $partitur->pembuat_aransemen }}</td>
                                <td>{{ $partitur->komposer }}</td>
                                <td>{{ $partitur->genre_lagu }}</td>
                                <td><a href="{{ $partitur->link_youtube }}" target="_blank">{{ $partitur->link_youtube }}</a></td>
                                <td>{{ $partitur->kebutuhan_instrumen }}</td>
                                <td>{{ $partitur->tingkat_kesulitan }}</td>
                                <td>{{ $partitur->kebutuhan_solo }}</td>
                                <td>{{ $partitur->jenis_suara }}</td>
                                <td>{{ $partitur->created_at }}</td>
                                <td>{{ $partitur->updated_at }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $partitur->id }}">Edit</button>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('partitur.destroy', $partitur->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $partitur->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $partitur->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $partitur->id }}">Edit Partitur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('partitur.update', $partitur->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="judul{{ $partitur->id }}">Judul</label>
                                                    <input type="text" class="form-control" id="judul{{ $partitur->id }}" name="judul" value="{{ $partitur->judul }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pembuat_aransemen{{ $partitur->id }}">Pembuat Aransemen</label>
                                                    <input type="text" class="form-control" id="pembuat_aransemen{{ $partitur->id }}" name="pembuat_aransemen" value="{{ $partitur->pembuat_aransemen }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="komposer{{ $partitur->id }}">Komposer</label>
                                                    <input type="text" class="form-control" id="komposer{{ $partitur->id }}" name="komposer" value="{{ $partitur->komposer }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="genre_lagu{{ $partitur->id }}">Genre Lagu</label>
                                                    <input type="text" class="form-control" id="genre_lagu{{ $partitur->id }}" name="genre_lagu" value="{{ $partitur->genre_lagu }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link_youtube{{ $partitur->id }}">Link YouTube</label>
                                                    <input type="text" class="form-control" id="link_youtube{{ $partitur->id }}" name="link_youtube" value="{{ $partitur->link_youtube }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kebutuhan_instrumen{{ $partitur->id }}">Kebutuhan Instrumen</label>
                                                    <input type="text" class="form-control" id="kebutuhan_instrumen{{ $partitur->id }}" name="kebutuhan_instrumen" value="{{ $partitur->kebutuhan_instrumen }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tingkat_kesulitan{{ $partitur->id }}">Tingkat Kesulitan</label>
                                                    <input type="text" class="form-control" id="tingkat_kesulitan{{ $partitur->id }}" name="tingkat_kesulitan" value="{{ $partitur->tingkat_kesulitan }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kebutuhan_solo{{ $partitur->id }}">Kebutuhan Solo</label>
                                                    <input type="text" class="form-control" id="kebutuhan_solo{{ $partitur->id }}" name="kebutuhan_solo" value="{{ $partitur->kebutuhan_solo }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_suara{{ $partitur->id }}">Jenis Suara</label>
                                                    <input type="text" class="form-control" id="jenis_suara{{ $partitur->id }}" name="jenis_suara" value="{{ $partitur->jenis_suara }}" required>
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
