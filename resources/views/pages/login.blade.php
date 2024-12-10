<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Menghapus margin dan padding default */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden; /* Pastikan tidak ada scrollbar */
            box-sizing: border-box;
        }

        /* Gambar latar belakang full screen */
        .full-background {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('https://images.pexels.com/photos/1485894/pexels-photo-1485894.jpeg?cs=srgb&dl=pexels-maoriginalphotography-1485894.jpg&fm=jpg');
            background-size: cover;
            background-position: center;
            z-index: -1; /* Agar gambar berada di belakang form */
        }

        /* Card Form di sebelah kanan dengan panjang 90% dari tinggi layar */
        .login-form-container {
            position: absolute;
            right: 3%; /* Memberikan jarak lebih dekat dari sisi kanan */
            top: 5%; /* Memberikan jarak dari atas */
            width: 28%; /* Lebar form dikurangi lebih kecil */
            height: 90vh; /* Panjang form 90% dari tinggi layar */
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Agar form tetap scrollable jika kontennya melebihi tinggi */
        }

        /* Styling form */
        .form-control {
            margin-bottom: 1rem;
            font-size: 0.9rem; /* Memperkecil ukuran font input */
        }

        /* Styling untuk header */
        h3 {
            text-align: center;
            color: #007bff;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styling untuk link daftar */
        .text-center small a {
            color: #007bff;
        }

    </style>
</head>
<body>
    <!-- Background gambar -->
    <div class="full-background"></div>

    <!-- Card Form login -->
    <div class="container">
        <div class="login-form-container">
            <h3>Login</h3>

            <!-- SweetAlert -->
            <script>
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: '{{ session('success') }}',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
            </script>

            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                    <div class="invalid-feedback">Email harus diisi</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                    <div class="invalid-feedback">Password harus diisi</div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
            </form>

            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="{{ route('register')}}">Daftar</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
