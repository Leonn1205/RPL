@extends('layouts.app2')

@section('content')
    <h1>Daftar Karyawan Perusahaan: {{ $perusahaan->nama_perusahaan }}</h1>

    <a href="{{ route('adminperusahaan.create', $perusahaan->id_perusahaan) }}" class="btn btn-success mb-3">Tambah Karyawan</a>

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
                    <td colspan="5">Tidak ada karyawan untuk perusahaan ini.</td>
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
                        <td>
                            <a href="{{ route('adminperusahaan.edit', ['perusahaan' => $perusahaan->id_perusahaan, 'adminperusahaan' => $karyawan->id_karyawan]) }}"
                                class="btn btn-warning">Edit</a>
                            <form
                                action="{{ route('adminperusahaan.destroy', ['perusahaan' => $perusahaan->id_perusahaan, 'adminperusahaan' => $karyawan->id_karyawan]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
