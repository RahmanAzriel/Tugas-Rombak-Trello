@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengguna</h1>

    {{-- Flash Message Success --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    {{-- Flash Message Error --}}
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    showConfirmButton: true
                });
            });
        </script>
    @endif

    {{-- Form Tambah Pengguna --}}
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NIP --}}
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" value="{{ old('nip') }}" required>
            @error('nip')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jabatan --}}
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ old('jabatan') }}" required>
            @error('jabatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Mapel --}}
        <div class="form-group">
            <label for="mapel">Mapel</label>
            <select name="mapel" class="form-control" id="mapel" required>
                <option value="" selected disabled>Pilih Mapel</option>
                <option value="IPA" {{ old('mapel') == 'IPA' ? 'selected' : '' }}>IPA</option>
                <option value="IPS" {{ old('mapel') == 'IPS' ? 'selected' : '' }}>IPS</option>
                <option value="MTK" {{ old('mapel') == 'MTK' ? 'selected' : '' }}>MTK</option>
                <option value="PROD" {{ old('mapel') == 'PROD' ? 'selected' : '' }}>PROD</option>
            </select>
            @error('mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Role --}}
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" id="role" required>
                <option value="" selected disabled>Pilih Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="laboran" {{ old('role') == 'laboran' ? 'selected' : '' }}>Laboran</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
