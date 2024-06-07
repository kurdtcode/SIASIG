<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png')}}">
    <title>Tables Partitur</title>
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
    <style>
        .main-content {
            margin-left: 270px; /* Adjust this value based on your sidebar width */
            padding: 20px; /* Optional, for additional spacing */
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
              <a class="nav-link text-white" href="{{ route('dashboard.tables-anggota') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">table_view</i>
                  </div>
                  <span class="nav-link-text ms-1">Tabel Anggota</span>
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-primary" href="{{ route('dashboard.tables-partitur') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Table Partitur</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('dashboard.manage_task') }}">
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
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="main-content container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tabel Partitur</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Tabel Partitur</h6>
            </nav>
        </div>
    </nav>

    <!-- Konten lain -->
    <div class="main-content">
        <h1 class="mt-5">Daftar Partitur</h1>
          <!-- Tombol Tambah Partitur -->
        <div class="mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Partitur</button>
        </div>

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
                        <td>{{ $partitur->link_youtube }}</td>
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

    <!-- Tambahkan script JS Bootstrap atau JS lainnya yang diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
