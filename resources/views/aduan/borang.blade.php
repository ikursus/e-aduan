@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('aduan.store') }}">
    @csrf

    <div class="card">
        <div class="card-header">Borang Aduan</div>
        <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Nama Pengadu</label>
            <input type="text" class="form-control" name="nama_pengadu">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Pengadu</label>
            <input type="email" class="form-control" name="email_pengadu">
        </div>
        <div class="mb-3">
            <label class="form-label">Aduan</label>
            <textarea name="aduan" class="form-control"></textarea>
        </div>

        </div>
        <div class="card-footer">
            <a href="{{ route('aduan.index') }}" class="btn btn-dark">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
