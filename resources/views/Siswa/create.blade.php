@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tambah Siswa</h2>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}">
            @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="rombel" class="form-label">Rombel</label>
            <input type="text" name="rombel" class="form-control @error('rombel') is-invalid @enderror" value="{{ old('rombel') }}">
            @error('rombel') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                <option value="" selected disabled>Pilih Kelas</option>
                <option value="X" {{ old('kelas') == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ old('kelas') == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ old('kelas') == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
            @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="rayon" class="form-label">Rayon</label>
            <input type="text" name="rayon" class="form-control @error('rayon') is-invalid @enderror" value="{{ old('rayon') }}">
            @error('rayon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
