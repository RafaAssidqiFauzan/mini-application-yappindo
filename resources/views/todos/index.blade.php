<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .todo-completed {
            text-decoration: line-through;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 text-center fw-bold"><i class="bi bi-check2-square me-2"></i>My TODO List</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('todos.store') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Tambah tugas baru..." value="{{ old('title') }}" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-plus-circle me-1"></i> Tambah
                                </button>
                            </div>
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </form>

                        <ul class="list-group">
                            @forelse($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="me-3">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm border-0 p-0 text-decoration-none">
                                                @if($todo->is_completed)
                                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                                @else
                                                    <i class="bi bi-circle text-secondary fs-4"></i>
                                                @endif
                                            </button>
                                        </form>
                                        <span class="{{ $todo->is_completed ? 'todo-completed' : '' }} fs-5">
                                            {{ $todo->title }}
                                        </span>
                                    </div>

                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus todo ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item text-center py-4 text-muted">
                                    Belum ada tugas. Tambahkan todo baru di atas!
                                </li>
                            @endforelse
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
