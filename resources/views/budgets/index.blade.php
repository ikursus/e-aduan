@extends('layouts.induk')

@section('isi-kandungan')
<div class="card">
    <div class="card-header">{{ $title ?? "Senarai Budgets" }}</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TAHUN</th>
                    <th>KOD</th>
                    <th>AMAUN ASAL</th>
                    <th>AMAUN BAKI</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @isset($senaraiBudgets)

                @foreach ($senaraiBudgets as $budget)
                    <tr>
                        <td>{{ $budget->id }}</td>
                        <td>{{ $budget->tahun }}</td>
                        <td>{{ $budget->kod_budget }}</td>
                        <td>{{ $budget->amaun }}</td>
                        <td>{{ $budget->baki->amaun }}</td>
                        <td>
                            <a href="{{ route('budgets.show', $budget->id) }}" class="btn btn-primary">LIHAT</a>
                            <a href="{{ route('budgets.edit', $budget->id) }}" class="btn btn-info">KEMASKINI</a>

                            <form method="POST" action="{{ route('budgets.destroy', $budget->id) }}">
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @endisset

            </tbody>
        </table>

        {{ $senaraiBudgets->links() }}
    </div>
    <div class="card-footer">
        <a href="{{ route('budgets.create') }}" class="btn btn-primary">Tambah Budget</a>
    </div>
</div>
@endsection
