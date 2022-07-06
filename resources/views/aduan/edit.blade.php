@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('aduan.update', $aduan->id) }}">
    @csrf
    @method('PATCH')

    <div class="card">
        <div class="card-header">Kemaskini Borang Aduan</div>
        <div class="card-body">

            @include('aduan.borang')

        </div>
        <div class="card-footer">
            <a href="{{ route('aduan.index') }}" class="btn btn-dark">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
