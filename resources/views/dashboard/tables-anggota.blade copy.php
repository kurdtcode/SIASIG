<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png')}}">
    <title>Tables Anggota</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets/admin/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/admin/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        .main-content {
            margin-left: 80px; /* Adjust this value based on your sidebar width */
            padding: 20px; /* Optional, for additional spacing */
        }
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
            .sidenav {
                width: 100%;
            }
        }
    </style>
</head>
<body class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
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
              <a class="nav-link text-white active bg-gradient-primary" href="{{ route('dashboard.tables-anggota') }}">
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
              <a class="nav-link text-white" href="{{ route('dashboard.manageTask') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">receipt_long</i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Task</span>
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
            <a class="nav-link text-white " href="../pages/profile.html">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/sign-in.html">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">login</i>
              </div>
              <span class="nav-link-text ms-1">Sign In</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="../pages/sign-up.html">
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
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-gradient-primary w-100">Sign Out</button>
          </form>
        </div>
      </div>
    </aside>

    <!-- Navbar baru -->
    <nav class="navbar navbar-main navbar-expand-lg px-10 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="main-content container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tabel Anggota</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Tabel Anggota</h6>
            </nav>
        </div>
    </nav>

    <div class="main-content">
        <div class="container">
            <h1 class="mt-5">Daftar Anggota</h1>
            <!-- Tombol Tambah Anggota -->
            <div class="mb-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Anggota</button>
            </div>

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
                                                <input type="text" class="form-control" id="nrp{{ $member->id }}" name="nrp" value="{{ $member->nrp }}" required>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
