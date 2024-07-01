<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/admin/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
</head>
<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
          <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
              <div class="container-fluid ps-2 pe-0">
                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                  PCU Choir
                </a>
                <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </span>
                </button>
                <div class="collapse navbar-collapse" id="navigation">
                  <ul class="navbar-nav mx-auto">
                  </ul>
                  <ul class="navbar-nav d-lg-flex d-none">
                    <li class="nav-item">
                      <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Welcome!</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
          </div>
        </div>
      </div>
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('assets/admin/img/bg-sign-in.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign In</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label"></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign In</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        {{-- href="{{ route('register') }}" --}}
                                        <a  class="text-primary text-gradient font-weight-bold">Sign Up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a class="font-weight-bold text-white" target="_blank">PCU CHOIR</a>
                                for a better Choir.
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a class="nav-link text-white" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" target="_blank">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
