@extends('layouts.induk')

@section('isi-kandungan')
<form method="POST" action="{{ route('expenses.update', $expense->id) }}">
@csrf
@method('PATCH')


<div class="card">
    <div class="card-header">Borang Kemaskini Expenses</div>
    <div class="card-body">

    @include('expenses.borang')

    <div class="card-footer">
        <a href="{{ route('expenses.index') }}" class="btn btn-dark">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection
