@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('users.update', $user->id) }}">
@method('PATCH')
@csrf

<div class="card">
    <div class="card-header">Kemaskini User - {{ $user->name }}</div>
    <div class="card-body">

    @include('users.borang')

    <div class="card-footer">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection
