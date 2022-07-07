@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('budgets.store') }}">
@csrf
{{ csrf_field() }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="card">
    <div class="card-header">Borang Tambah Budget</div>
    <div class="card-body">

    @include('budgets.borang')

    <div class="card-footer">
        <a href="{{ route('budgets.index') }}" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection
