<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light min-vh-100 d-flex flex-column justify-content-between">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('landing') }}">
                <i class="bi bi-box-seam me-2"></i>InventarisKu
            </a>
            <div class="d-flex gap-2">
                @auth
                    <a href="{{ route('todos.index') }}" class="btn btn-primary fw-semibold">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary fw-semibold">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container my-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3 fw-semibold">System Inventaris & Task App</span>
                <h1 class="display-5 fw-bold text-dark mb-3">Kelola & Cek Inventaris Barang Lebih Efisien</h1>
                <p class="lead text-muted mb-4">Aplikasi manajemen barang dan daftar tugas untuk membantu mengelompokkan stok barang berdasarkan kategori dengan mudah dan terintegrasi.</p>
                <div class="d-flex gap-3">
                    @auth
                        <a href="{{ route('todos.index') }}" class="btn btn-primary btn-lg fw-semibold">Buka Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg fw-semibold">Mulai Sekarang</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg fw-semibold">Masuk</a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="p-5 bg-white shadow-sm rounded-4 border">
                    <i class="bi bi-boxes text-primary display-1"></i>
                    <h5 class="fw-bold mt-3">InventarisKu</h5>
                    <p class="text-muted small mb-0">Lakukan penambahan barang, kategori, update status, dan penghapusan data secara aman.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-top py-3 text-center text-muted small">
        <div class="container">
            &copy; {{ date('Y') }} Inventaris App. All rights reserved.
        </div>
    </footer>

</body>
</html>
