@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('users.store') }}">
@csrf


<div class="card">
    <div class="card-header">Borang Tambah User</div>
    <div class="card-body">

    @include('users.borang')

    <div class="card-footer">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection
