@extends('layouts.app')

@section('title', 'Tabel Cek Absensi')
@section('page', 'Tabel Cek Absensi')
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
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
<style>
    .table-responsive {
        overflow-x: auto;
    }
    @media (max-width: 768px) {
        .table thead th {
            display: none;
        }
        .table tbody td {
            display: block;
            width: 100%;
            text-align: right;
            border-right: 1px solid #dee2e6;
        }
        .table tbody td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
        .table tbody tr {
            display: block;
            margin-bottom: 0.625em;
        }
    }
    .modal-dialog {
        max-width: 90%;
    }
    .btn-submit {
        margin: 10px auto;
    }
    .table-container {
        margin-left: 260px; /* Adjust this value according to your sidebar width */
    }
</style>
@endsection

@section('content')
<div class="container-fluid table-container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('updateAbsensi') }}" method="post">
                    @csrf
                    @foreach ($latihan as $latih)
                        <input type="hidden" name="latihan_ids[]" value="{{ $latih->id }}">
                    @endforeach
                    <button type="submit" class="btn btn-success btn-submit">Submit Attendance</button>
                    <table class="table table-hover table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                @foreach ($latihan as $latih)
                                    <th>
                                        <a href="#" data-toggle="modal" data-target="#modal{{ $latih->id }}">
                                            {{ $latih->nama_latihan }}
                                        </a>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $index => $member)
                                <tr>
                                    <td data-label="NRP">{{ $member->NRP }}</td>
                                    <td data-label="Nama">{{ $member->name }}</td>
                                    @foreach ($latihan as $latih)
                                        <td data-label="{{ $latih->nama_latihan }}">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" 
                                                    name="absensi[{{ $latih->id }}][{{ $member->id }}]" 
                                                    type="checkbox" 
                                                    @if (isset($check_attd[$latih->id][$member->id]) && $check_attd[$latih->id][$member->id] == 'hadir') 
                                                        checked 
                                                    @endif 
                                                    value="hadir">
                                                <input type="hidden" 
                                                    name="attendance[{{ $latih->id }}][{{ $member->id }}]" 
                                                    value="@if (isset($check_attd[$latih->id][$member->id]) && $check_attd[$latih->id][$member->id] == 'hadir') 1 @else 0 @endif">
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    @foreach ($latihan as $latih)
        <div class="modal fade" id="modal{{ $latih->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $latih->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $latih->id }}">{{ $latih->nama_latihan }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $latih->deskripsi }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal for Result -->
    <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="resultMessage">
                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @elseif (session('error'))
                        <p>{{ session('error') }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('additional_scripts')
<script>
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.nextElementSibling.value = '1';
                this.setAttribute('disabled', 'true');
            } else {
                this.nextElementSibling.value = '0';
            }
        });
    });

    $(document).ready(function() {
        @if (session('success') || session('error'))
            $('#resultModal').modal('show');
        @endif
    });
</script>
@endsection
@endsection
