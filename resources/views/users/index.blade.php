@extends('layouts.induk')

@section('isi-kandungan')
<div class="card">
    <div class="card-header">{{ $title ?? "Senarai Users" }}</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>STATUS</th>
                    <th>ROLE</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @isset($senaraiUsers)

                @foreach ($senaraiUsers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">LIHAT</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">KEMASKINI</a>

                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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

        {{ $senaraiUsers->links() }}
    </div>
    <div class="card-footer">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>
</div>
@endsection
