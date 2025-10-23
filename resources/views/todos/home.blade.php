@extends('layout.layout')

@section('title', 'MY TASK SPACE')

@section('content')
<div class="card-elegant fade-in-up">
    <!-- Header -->
    <div class="card-header-elegant">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-1"><i class="fas fa-tasks mr-2"></i>Task Manager</h2>
                <p class="mb-0 opacity-90">Kelola tugas Anda dengan gaya yang elegan</p>
            </div>
            <div class="col-md-4 text-md-right">
                <a href="{{ route('create') }}" class="btn btn-light btn-elegant pulse">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Task Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="card-body p-4">
        {{-- Alert Success --}}
        @if(session('success'))
            <div class="alert alert-success alert-elegant alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Statistics --}}
        @if($todos->count() > 0)
            @php
                $completed = $todos->where('selesai', true)->count();
                $pending = $todos->where('selesai', false)->count();
                $total = $todos->count();
                $completionRate = $total > 0 ? round(($completed / $total) * 100) : 0;
            @endphp
            
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3 rounded" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), transparent);">
                        <h3 class="mb-1 text-primary">{{ $total }}</h3>
                        <small class="text-muted">Total Task</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3 rounded" style="background: linear-gradient(135deg, rgba(78, 205, 196, 0.1), transparent);">
                        <h3 class="mb-1 text-success">{{ $completed }}</h3>
                        <small class="text-muted">Selesai</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3 rounded" style="background: linear-gradient(135deg, rgba(255, 230, 109, 0.1), transparent);">
                        <h3 class="mb-1 text-warning">{{ $pending }}</h3>
                        <small class="text-muted">Pending</small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center p-3 rounded" style="background: linear-gradient(135deg, rgba(118, 75, 162, 0.1), transparent);">
                        <h3 class="mb-1 text-secondary">{{ $completionRate }}%</h3>
                        <small class="text-muted">Progress</small>
                    </div>
                </div>
            </div>
        @endif

        {{-- Todo List --}}
        @if($todos->count() > 0)
            <div class="table-responsive">
                <table class="table table-elegant">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr class="{{ $todo->selesai ? 'status-completed' : 'status-pending' }}">
                                <td data-label="Task">
                                    <div class="font-weight-bold text-dark">{{ $todo->judul }}</div>
                                    <small class="text-muted">Dibuat: {{ $todo->created_at->format('d M Y') }}</small>
                                </td>
                                <td data-label="Deskripsi">
                                    {{ $todo->keterangan ?: '-' }}
                                </td>
                                <td data-label="Status">
                                    <span class="badge badge-elegant {{ $todo->selesai ? 'badge-success' : 'badge-warning' }}">
                                        <i class="fas {{ $todo->selesai ? 'fa-check' : 'fa-clock' }} mr-1"></i>
                                        {{ $todo->selesai ? 'Completed' : 'In Progress' }}
                                    </span>
                                </td>
                                <td data-label="Deadline">
                                    @if($todo->tanggal_selesai)
                                        <small class="{{ $todo->tanggal_selesai->isPast() && !$todo->selesai ? 'text-danger' : 'text-success' }}">
                                            <i class="fas fa-calendar-day mr-1"></i>
                                            {{ $todo->tanggal_selesai->format('d M Y') }}
                                        </small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td data-label="Aksi">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('edit', $todo->id) }}" class="btn btn-outline-primary btn-elegant btn-sm" 
                                           title="Edit Task">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('delete', $todo->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-elegant btn-sm" 
                                                    onclick="return confirm('Yakin ingin menghapus task ini?')"
                                                    title="Hapus Task">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h5>Belum Ada Task</h5>
                <p class="mb-4">Mulai dengan menambahkan task pertama Anda!</p>
                <a href="{{ route('create') }}" class="btn btn-primary btn-elegant">
                    <i class="fas fa-plus-circle mr-2"></i>Buat Task Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection