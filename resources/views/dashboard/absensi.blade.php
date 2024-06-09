@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Absensi</h2>
    @foreach ($latihans as $latihan)
    <form action="{{ route('update.absensi', $latihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        @php
            $anggota_absensi = explode(',', $latihan->absensi);
        @endphp
        <h4>{{ $latihan->nama_latihan }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Anggota</th>
                    <th>Hadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota_absensi as $absen)
                @php
                    list($id_anggota, $status) = explode(':', $absen);
                @endphp
                <tr>
                    <td>{{ $id_anggota }}</td>
                    <td>
                        <input type="checkbox" name="absensi[]" value="{{ $id_anggota }}" {{ $status == 1 ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Absensi</button>
    </form>
    @endforeach
</div>
@endsection
