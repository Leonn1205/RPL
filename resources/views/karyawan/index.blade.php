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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->id_karyawan }}</td>
                    <td>{{ $karyawan->nama_karyawan }}</td>
                    <td>{{ $karyawan->email }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', [$perusahaan->id_perusahaan, $karyawan->id_karyawan]) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('karyawan.destroy', [$perusahaan->id_perusahaan, $karyawan->id_karyawan]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
