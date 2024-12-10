@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-center">Daftar Siswa</h2>
        <div>
            <a href="{{ route('print.kepsek.siswa.index') }}" class="btn btn-success me-2" id="printPdf">Print PDF</a>
            <a href="{{ route('print.siswa.excel') }}" class="btn btn-success" id="printExcel">Print Excel</a>
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIS</th>
                        <th>Rombel</th>
                        <th>Kelas</th>
                        <th>Rayon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa as $item)
                        <tr>
                            <td>{{ ($siswa->currentPage() - 1) * $siswa->perPage() + $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['nis'] }}</td>
                            <td>{{ $item['rombel'] }}</td>
                            <td>{{ $item['kelas'] }}</td>
                            <td>{{ $item['rayon'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $siswa->links() }}
            </div>
        </div>
    </div>
</div>

<script>
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
                window.location.href = "{{ route('print.siswa.index') }}"; // Redirect to the print route
            }
        });
    });

    document.getElementById('printExcel').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Print',
            text: 'Apakah Anda yakin ingin mencetak Excel?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Cetak!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('print.siswa.excel') }}"; // Redirect to the print route
            }
        });
    });

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>

@endsection
