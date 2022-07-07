@extends('layouts.induk')

@section('isi-kandungan')
<div class="card">
    <div class="card-header">{{ $title ?? "Senarai Expenses" }}</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TARIKH</th>
                    <th>KOD</th>
                    <th>AMAUN</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @isset($senaraiExpenses)

                @foreach ($senaraiExpenses as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tarikh }}</td>
                        <td>{{ $item->kod_budget }}</td>
                        <td>{{ $item->amaun }}</td>
                        <td>
                            <a href="{{ route('expenses.show', $item->id) }}" class="btn btn-primary">LIHAT</a>
                            <a href="{{ route('expenses.edit', $item->id) }}" class="btn btn-info">KEMASKINI</a>

                            <form method="POST" action="{{ route('expenses.destroy', $item->id) }}">
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

        {{ $senaraiExpenses->links() }}
    </div>
    <div class="card-footer">
        <a href="{{ route('expenses.create') }}" class="btn btn-primary">Tambah Expenses</a>
    </div>
</div>
@endsection
