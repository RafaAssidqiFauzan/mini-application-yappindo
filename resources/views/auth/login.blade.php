<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light min-vh-100 d-flex align-items-center py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        
                        <div class="text-center mb-4">
                            <i class="bi bi-box-seam text-primary fs-1"></i>
                            <h4 class="fw-bold text-dark mt-2 mb-0">Selamat Datang</h4>
                            <small class="text-muted">Masuk ke akun Anda</small>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 py-2 px-3 small mb-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger rounded-3 py-2 px-3 small mb-3">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small text-muted">Alamat Email</label>
                                <input type="email" name="email" class="form-control" placeholder="user@gmail.com" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <button class="btn btn-primary w-100 fw-semibold mb-3" type="submit">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                            </button>
                            <div class="text-center">
                                <span class="small text-muted">Belum punya akun?</span>
                                <a href="{{ route('register') }}" class="text-decoration-none small fw-semibold">Daftar Akun</a>
                            </div>
                            <!-- Atau Link Teks Biasa di Bawah Form -->
                            <p class="text-center mt-3">
                                <a href="{{ route('landing') }}" class="text-decoration-none">
                                    &larr; Kembali ke Halaman Utama
                                </a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
