@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Tentang Aplikasi</h3>
        </div>
        <div class="card-body">
            <h4>Aplikasi</h4>
            <p>Aplikasi ini dibuat untuk mempermudah pengelolaan data pengguna secara efisien dan praktis.</p>

            <h4>Fitur Utama</h4>
            <ul>
                <li>Manajemen data pengguna dengan antarmuka yang mudah digunakan.</li>
                <li>Export data ke format PDF dan Excel.</li>
                <li>Notifikasi menggunakan SweetAlert untuk konfirmasi dan pesan sukses/gagal.</li>
            </ul>

            <h4>Tentang Pembuat</h4>
            <p>
                Nama: [Nama Anda] <br>
                Email: [Email Anda] <br>
                Keahlian: Software Development, Game Development, dan Fotografi <br>
                Portofolio: <a href="https://github.com/username" target="_blank">GitHub</a>
            </p>

            <h4>Kontribusi</h4>
            <p>Proyek ini adalah hasil kerja sama tim dengan fokus pada pengembangan aplikasi berbasis web menggunakan Laravel.</p>

            <h4>Lisensi</h4>
            <p>Aplikasi ini dilisensikan di bawah [Jenis Lisensi, contoh: MIT License] dan dapat digunakan dengan bebas sesuai ketentuan.</p>
        </div>
        <div class="card-footer text-center">
            <small>&copy; {{ date('Y') }} - Semua hak cipta dilindungi</small>
        </div>
    </div>
</div>
@endsection
