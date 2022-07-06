@extends('layouts.induk')

@section('isi-kandungan')

<div class="card mb-5">
    <div class="card-header">Maklumat {{ $user->name }}</div>
    <div class="card-body">

        <table class="table">
            <colgroup>
                <col style="width: 30%">
                <co style="width: 70%">
            </colgroup>
            <thead>
                <tr>
                    <th>PERKARA</th>
                    <th>BUTIRAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>NAMA PENGGUNA</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>EMEL PENGGUNA</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>TELEFON</td>
                    <td>{{ $user->phone }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-header">Senarai Aduan daripada {{ $user->name }}</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PENGADU</th>
                    <th>EMAIL PENGADU</th>
                    <th>ADUAN</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->senaraiAduan as $aduan)
                    <tr>
                        <td>{{ $aduan->id }}</td>
                        <td>{{ $aduan->nama_pengadu }}</td>
                        <td>{{ $aduan->email_pengadu }}</td>
                        <td>{{ $aduan->aduan }}</td>
                        <td>
                            <a href="{{ route('aduan.edit', $aduan->id) }}" class="btn btn-info">KEMASKINI</a>

                            <form method="POST" action="{{ route('aduan.destroy', $aduan->id) }}">
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">TIADA REKOD</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <a href="{{ route('aduan.index') }}" class="btn btn-dark">Kembali</a>
    </div>
</div>

@endsection
