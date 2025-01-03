@extends('layouts.app')

@section('content')
    <h1>Daftar Karyawan Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Nomor Rekening</th>
                <th>Tanggal Penggajian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($karyawan->isEmpty())
                <tr>
                    <td colspan="7">Tidak ada karyawan untuk perusahaan ini.</td>
                </tr>
            @else
                @foreach ($karyawan as $karyawan)
                    <tr>
                        <td>{{ $karyawan->id_karyawan }}</td>
                        <td>{{ $karyawan->nama_karyawan }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->jabatan }}</td>
                        <td>{{ $karyawan->no_rekening }}</td>
                        <td>{{ $karyawan->tanggal_penggajian }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Perusahaan</a>
@endsection
