@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Pengguna</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>
    <form action="{{ route('user.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari pengguna..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary ml-2" type="submit">Cari</button>
            <a href="{{ route('user.index') }}" class="btn btn-success ms-2 ml-2"><i class="bi bi-arrow-clockwise"></i></a> <!-- Cancel button -->
        </div>
    </form>

    {{-- SweetAlert Flash Messages --}}
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

    {{-- Card for User Table --}}
    <div class="card shadow">
        <div class="card-body">
            {{-- Tabel Pengguna --}}
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Mapel</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>  <!-- Menampilkan nomor urut -->
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nip }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td>{{ $user->mapel }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                {{-- Form Hapus dengan SweetAlert --}}
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert Delete Confirmation --}}
<script>
    function confirmDelete(event, form) {
        event.preventDefault(); // Mencegah form submit langsung

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form jika user konfirmasi
            }
        });

        return false;
    }
</script>
@endsection
