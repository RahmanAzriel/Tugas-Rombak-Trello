@extends('layouts.app')

@section('content')
<div class="hero-section" style="height: 100vh; display: flex; justify-content: center; align-items: center; text-align: center; padding: 0 20px; background: linear-gradient(to right, #4facfe, #00f2fe); color: #fff;">
    <div>
        <h1 class="hero-title" style="font-size: 3rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; animation: fadeIn 2s ease-in-out;">Welcome to Our Website</h1>
        <h1 class="hero-title" style="font-size: 3rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; animation: fadeIn 2s ease-in-out;">{{ Auth::user()->name }} Berstatus Sebagai : {{ Auth::user()->role }}</h1>
        <p class="hero-subtitle" style="font-size: 1.5rem; margin: 20px 0; animation: fadeIn 2.5s ease-in-out;">A modern platform designed to help you achieve your goals.</p>
        <a href="/dashboard" class="btn btn-custom" style="background-color: #fff; color: #4facfe; font-size: 1.2rem; font-weight: bold; padding: 10px 30px; border-radius: 30px; text-transform: uppercase; transition: all 0.3s ease-in-out;">Get Started</a>
    </div>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Cek apakah ada pesan sukses atau error dari session
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan!',
            text: "{{ session('error') }}",
            timer: 2000,
            showConfirmButton: false
        });
    @endif
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-custom:hover {
        background-color: #4facfe;
        color: #fff;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
