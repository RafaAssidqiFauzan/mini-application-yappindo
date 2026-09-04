<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Inventaris Barang</title>
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
                            <i class="bi bi-person-plus text-primary fs-1"></i>
                            <h4 class="fw-bold text-dark mt-2 mb-0">Daftar Akun Baru</h4>
                            <small class="text-muted">Buat akun untuk mengelola inventaris</small>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger rounded-3 py-2 px-3 small mb-3">
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small text-muted">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Anda" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted">Alamat Email</label>
                                <input type="email" name="email" class="form-control" placeholder="user@gmail.com" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                            </div>
                            <button class="btn btn-primary w-100 fw-semibold mb-3" type="submit">
                                <i class="bi bi-person-check me-1"></i> Daftar Akun
                            </button>
                            <div class="text-center">
                                <span class="small text-muted">Sudah punya akun?</span>
                                <a href="{{ route('login') }}" class="text-decoration-none small fw-semibold">Masuk di sini</a>
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
