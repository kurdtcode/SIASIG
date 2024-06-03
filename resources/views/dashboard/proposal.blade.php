<!-- resources/views/dashboard/proposal.blade.php -->
@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Proposal</h1>
    <p>Ini adalah halaman untuk menambahkan, mengubah, dan menghapus performance baru serta menerima proposal dari halaman umum.</p>
    <h2>Proposals</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Deskripsi</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposals as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->waktu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
