@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Pengguna</h1>
        <div>
            <a href="#" class="btn btn-success me-2" id="printPdf">Print PDF</a>
            <a href="#" class="btn btn-success" id="printExcel">Print Excel</a>
        </div>
    </div>

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
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Mapel</th>
                        <th>Role</th>
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

    // Print PDF and Excel with confirmation
    document.getElementById('printPdf').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Print',
            text: 'Apakah Anda yakin ingin mencetak PDF?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Cetak!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('print.user.index') }}"; // Redirect to the print route
            }
        });
    });

    document.getElementById('printExcel').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Print', // Added missing comma here
            text: 'Apakah Anda yakin ingin mencetak Excel?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Cetak!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location
                window.location.href = "{{ route('print.user.excel') }}"; // Redirect to the print route
            }
        });
    });
</script>

@endsection
