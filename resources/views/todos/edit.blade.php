@extends('layout.layout')

@section('title', 'Edit Task')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-elegant fade-in-up">
            <div class="card-header-elegant">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1"><i class="fas fa-edit mr-2"></i>Edit Task</h3>
                        <p class="mb-0 opacity-90">Perbarui informasi task Anda</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-light btn-elegant">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('update', $todo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label-elegant">Judul Task</label>
                        <input type="text" name="judul" class="form-control form-control-elegant" 
                               value="{{ $todo->judul }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label-elegant">Keterangan</label>
                        <textarea name="keterangan" class="form-control form-control-elegant" rows="4">{{ $todo->keterangan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label-elegant">Tanggal Target Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control form-control-elegant" 
                               value="{{ $todo->tanggal_selesai ? $todo->tanggal_selesai->format('Y-m-d') : '' }}">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="selesai" class="custom-control-input" id="selesai" 
                                   {{ $todo->selesai ? 'checked' : '' }}>
                            <label class="custom-control-label form-label-elegant" for="selesai">
                                <i class="fas {{ $todo->selesai ? 'fa-check-circle text-success' : 'fa-clock text-warning' }} mr-2"></i>
                                Tandai sebagai selesai
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-elegant btn-block py-3">
                            <i class="fas fa-save mr-2"></i>Perbarui Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection