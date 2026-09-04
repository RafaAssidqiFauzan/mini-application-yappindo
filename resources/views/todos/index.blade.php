<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris Barang</title>

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Sidebar & Layout Styles -->
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-light: #f8fafc;
        }

        body {
            background-color: var(--bg-light);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-brand {
            padding: 1.5rem 1.25rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            list-style: none;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 0.25rem;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #64748b;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .sidebar-nav .nav-link:hover {
            color: var(--primary-color);
            background-color: #e0e7ff;
        }

        .sidebar-nav .nav-link.active {
            color: #ffffff;
            background-color: var(--primary-color);
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
        }

        .sidebar-nav .nav-link i {
            font-size: 1.2rem;
        }

        /* Page Content Wrapper */
        #page-content-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin 0.25s ease-out;
        }

        /* Top Navbar */
        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 1.5rem;
        }

        /* Responsive Sidebar Toggle */
        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                margin-left: calc(-1 * var(--sidebar-width));
            }

            #page-content-wrapper {
                margin-left: 0;
            }

            body.sb-expanded #sidebar-wrapper {
                margin-left: 0;
            }

            body.sb-expanded #page-content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar Start -->
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <i class="bi bi-box-seam-fill text-primary fs-3"></i>
                <span>InventarisKu</span>
            </div>

            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="{{ route('todos.index') }}" class="nav-link active">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <!-- Profil & Logout Mobile/Desktop di Sidebar Bawah -->
            <div class="position-absolute bottom-0 start-0 w-100 p-3 border-top bg-light">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; flex-shrink: 0;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="text-truncate">
                            <p class="mb-0 fw-semibold text-dark small text-truncate">{{ Auth::user()->name }}</p>
                            <span class="text-muted small" style="font-size: 0.75rem;">Pengguna</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Page Content Start -->
        <div id="page-content-wrapper" class="w-100">
            <!-- Top Navbar -->
            <nav class="navbar top-navbar sticky-top">
                <div class="container-fluid px-0">
                    <button class="btn btn-light border-0 d-lg-none" id="sidebarToggle">
                        <i class="bi bi-list fs-4"></i>
                    </button>

                    <span class="navbar-text ms-2 fw-semibold text-dark d-none d-sm-inline">
                        Dashboard Inventaris
                    </span>

                    <div class="ms-auto d-flex align-items-center gap-3">
                        <span class="text-muted small d-none d-md-inline">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold rounded-2 px-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Main Content Container (Penuh Ke Kanan) -->
            <main class="container-fluid p-4 flex-grow-1">
                <div class="card border-0 shadow-sm rounded-4 w-100">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4">
                            <div>
                                <h4 class="fw-bold mb-0 text-dark">Daftar Inventaris Barang</h4>
                                <small class="text-muted">Manajemen & Pengecekan Stok Barang</small>
                            </div>
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 fw-semibold align-self-start align-self-sm-center">
                                {{ $todos->where('is_completed', false)->count() }} Belum Dicheck
                            </span>
                        </div>

                        <!-- Flash Message -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 py-2 px-3 small mb-3" role="alert">
                                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                                <button type="button" class="btn-close py-2" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Form Create New Item -->
                        <form action="{{ route('todos.store') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="row g-2 mb-2">
                                <div class="col-md-7">
                                    <input type="text" name="title" class="form-control shadow-none @error('title') is-invalid @enderror" placeholder="Nama barang..." required>
                                </div>
                                <div class="col-md-5">
                                    <select name="category" class="form-select shadow-none @error('category') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Kategori Barang</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Peralatan Kantor">Peralatan Kantor</option>
                                        <option value="Aksesoris">Aksesoris</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 fw-semibold" type="submit">
                                <i class="bi bi-plus-lg me-1"></i> Tambah Barang
                            </button>
                        </form>

                        <hr class="my-4 text-secondary opacity-25">

                        <!-- Tabel Inventaris Barang -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 5%;">No</th>
                                        <th scope="col" style="width: 35%;">Nama Barang</th>
                                        <th scope="col" style="width: 20%;">Kategori</th>
                                        <th scope="col" style="width: 15%;">Status</th>
                                        <th scope="col" class="text-center" style="width: 25%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($todos as $index => $todo)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <span class="{{ $todo->is_completed ? 'text-decoration-line-through text-muted' : 'text-dark fw-medium' }}">
                                                    {{ $todo->title }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2.5 py-1">
                                                    {{ $todo->category }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($todo->is_completed)
                                                    <span class="badge bg-success-subtle text-success">Selesai</span>
                                                @else
                                                    <span class="badge bg-warning-subtle text-warning">Belum Check</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-1">
                                                    <!-- Edit Modal Trigger -->
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $todo->id }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>

                                                    <!-- Update Status Form -->
                                                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm {{ $todo->is_completed ? 'btn-success' : 'btn-outline-success' }}" title="Update status">
                                                            <i class="bi {{ $todo->is_completed ? 'bi-check-circle-fill' : 'bi-check-circle' }}"></i>
                                                        </button>
                                                    </form>

                                                    <!-- Delete Modal Trigger -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $todo->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $todo->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0">
                                                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-header border-0 pb-0">
                                                            <h5 class="modal-title fw-bold">Edit Barang & Kategori</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body py-3">
                                                            <div class="mb-3">
                                                                <label class="form-label small text-muted">Nama Barang</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $todo->title }}" required>
                                                            </div>
                                                            <div>
                                                                <label class="form-label small text-muted">Kategori</label>
                                                                <select name="category" class="form-select" required>
                                                                    <option value="Elektronik" {{ $todo->category == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                                                    <option value="Peralatan Kantor" {{ $todo->category == 'Peralatan Kantor' ? 'selected' : '' }}>Peralatan Kantor</option>
                                                                    <option value="Aksesoris" {{ $todo->category == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                                                    <option value="Lainnya" {{ $todo->category == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0 pt-0">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $todo->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-danger">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body py-3">
                                                        Apakah Anda yakin ingin menghapus <strong>"{{ $todo->title }}"</strong>?
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted small">
                                                <i class="bi bi-box-seam fs-2 d-block mb-1 text-secondary opacity-50"></i>
                                                Belum ada data inventaris barang.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </main>
        </div>
        <!-- Page Content End -->
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    document.body.classList.toggle('sb-expanded');
                });
            }
        });
    </script>
</body>
</html>
