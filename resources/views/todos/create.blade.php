@extends('layout.layout')

@section('title', 'Tambah Task Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-elegant fade-in-up">
            <div class="card-header-elegant">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1"><i class="fas fa-plus-circle mr-2"></i>Tambah Task Baru</h3>
                        <p class="mb-0 opacity-90">Buat task baru dengan detail yang lengkap</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-light btn-elegant">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label-elegant">Judul Task</label>
                        <input type="text" name="judul" class="form-control form-control-elegant" required 
                               placeholder="Masukkan judul task yang jelas...">
                    </div>

                    <div class="form-group">
                        <label class="form-label-elegant">Keterangan</label>
                        <textarea name="keterangan" class="form-control form-control-elegant" rows="4" 
                                  placeholder="Tambahkan deskripsi atau catatan penting..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label-elegant">Tanggal Target Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control form-control-elegant">
                        <small class="form-text text-muted">Opsional - tetapkan deadline untuk task ini</small>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success btn-elegant btn-block py-3">
                            <i class="fas fa-save mr-2"></i>Simpan Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection