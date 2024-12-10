@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>

    <form action="{{ route('user.update', $users->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $users->name }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $users->email }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" value="{{ $users->nip }}" required>
            @error('nip')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $users->jabatan }}" required>
        </div>

        <div class="form-group">
            <label for="mapel">Mapel</label>
            <select name="mapel" class="form-control" id="mapel" required>
                <option value="">Pilih Mapel</option>
                <option value="IPA" {{ $users->mapel == 'IPA' ? 'selected' : '' }}>IPA</option>
                <option value="IPS" {{ $users->mapel == 'IPS' ? 'selected' : '' }}>IPS</option>
                <option value="MTK" {{ $users->mapel == 'MTK' ? 'selected' : '' }}>MTK</option>
                <option value="PROD" {{ $users->mapel == 'PROD' ? 'selected' : '' }}>PROD</option>
            </select>
            @error('mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" id="role" required>
                <option value="">Pilih Role</option>
                <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $users->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="laboran" {{ $users->role == 'laboran' ? 'selected' : '' }}>Laboran</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
