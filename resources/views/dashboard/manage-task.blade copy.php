<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png')}}">
    <title>Tables Anggota</title>
    <!-- Tambahkan link CSS Bootstrap atau CSS lainnya yang diperlukan -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--     Fonts and icons     -->
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    </style>
</head>
<body class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="{{ asset('assets/admin/img/logo-pcuchoir.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">PCU CHOIR</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="{{ route('dashboard.tables-anggota') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Tabel Anggota</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.tables-partitur') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Table Partitur</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white bg-gradient-primary" href="{{ route('dashboard.manage_task') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Manage Task</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.absensi') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">event_available</i>
                        </div>
                        <span class="nav-link-text ms-1">Absensi</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.proposal') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Proposal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard.portofolio') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Portofolio</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/profile.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/sign-in.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/sign-up.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Sign Out</a>
            </div>
        </div>
    </aside>

    <!-- Navbar baru -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="main-content container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Manage Task</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Manage Task</h6>
            </nav>
        </div>
    </nav>
    
    <div class="main-content box box-success">
   
        <!-- Daftar Anggota Terkait -->
        <div class="box-body">
            <h4>Daftar Anggota Terkait</h4>
            <div class="box-header">
                <form action="{{ route('manage_task.addAnggota') }}" method="POST">
                    @csrf
                    <select class="form-control" id="anggota-select" name="id" required>
                        @foreach($anggota as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Tambah Anggota</button>
                </form>
            </div>
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
        
        <!-- Daftar Partitur Terkait -->
        <div class="box-body">
            <h4>Daftar Partitur Terkait</h4>
            <div class="box-header">
                <form action="{{ route('manage_task.addPartitur') }}" method="POST">
                    @csrf
                    <select class="form-control" id="partitur-select" name="id" required>
                        @foreach($partitur as $item)
                            <option value="{{ $item->id }}">{{ $item->judul }} - {{ $item->komposer }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Tambah Partitur</button>
                </form>
            </div>
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
                                <td colspan="6" class="text-center">Belum ada partitur yang dipilih.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Form Input -->
        <div class="box-body">
            <form action="{{ route('manage_task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h4 for="nama_kegiatan">Nama Kegiatan</h4>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                </div>
                <div class="form-group">
                    <h4 for="jenis_kegiatan">Jenis Kegiatan</h4>
                    <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" required>
                        <option value="Pelayanan">Pelayanan</option>
                        <option value="Lomba">Lomba</option>
                        <option value="Internal">Internal</option>
                    </select>
                </div>
                <div class="form-group">
                    <h4 for="start_date">Tanggal Mulai</h4>
                    <div class="input-container">
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <h4 for="end_date">Tanggal Selesai</h4>
                    </div>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <h4 for="jumlah_latihan">Jumlah Latihan</h4>
                    <input type="number" class="form-control" id="jumlah_latihan" name="jumlah_latihan" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <!-- Tabel Hasil -->
        <div class="box-body">
            <h4>Hasil Manage Task</h4>
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

    <!-- Tambahkan script JS Bootstrap atau JS lainnya yang diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
