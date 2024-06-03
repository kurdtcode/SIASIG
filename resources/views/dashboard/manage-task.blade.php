<!-- resources/views/dashboard/manage-task.blade.php -->
@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Manage Task</h1>
    <p>Ini adalah halaman untuk mengatur setiap performance dari proposal.</p>
    <h2>Tugas</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Jenis Kegiatan</th>
                <th>Member yang Mengikuti</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugas as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->jenis_kegiatan }}</td>
                    <td>{{ $item->member_yang_mengikuti }}</td>
                    <td>{{ $item->waktu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
