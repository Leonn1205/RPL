@extends('layouts.app2')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>Selamat Datang di Sistem Manajemen Perusahaan</h1>
        <p class="text-muted">Kelola perusahaan, karyawan, dan penggajian dengan mudah dan efisien.</p>
    </div>

    <div class="row">
        <!-- Card untuk Perusahaan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-buildings display-3 text-primary"></i>
                    <h4 class="mt-3">Manajemen Perusahaan</h4>
                    <p class="text-muted">Kelola data perusahaan, tambahkan informasi perusahaan baru, dan perbarui detailnya.</p>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-primary">Kelola Perusahaan</a>
                </div>
            </div>
        </div>

        <!-- Card untuk Karyawan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-people display-3 text-success"></i>
                    <h4 class="mt-3">Manajemen Karyawan</h4>
                    <p class="text-muted">Lihat, tambahkan, dan kelola data karyawan yang terdaftar di perusahaan Anda.</p>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-success">Kelola Karyawan</a>
                </div>
            </div>
        </div>

        <!-- Card untuk Penggajian -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-cash-coin display-3 text-warning"></i>
                    <h4 class="mt-3">Manajemen Penggajian</h4>
                    <p class="text-muted">Atur dan kelola pembayaran gaji karyawan secara cepat dan akurat.</p>
                    <a href="{{ route('penggajian.index') }}" class="btn btn-warning">Kelola Penggajian</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center">
        <p class="text-muted">&copy; {{ date('Y') }} Sistem Manajemen Perusahaan. Semua hak dilindungi.</p>
    </div>
</div>
@endsection
