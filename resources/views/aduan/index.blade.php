@extends('layouts.induk')

@section('isi-kandungan')

<div class="card">
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PENGADU</th>
                    <th>EMAIL PENGADU</th>
                    <th>ADUAN</th>
                    <th>FAIL</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($senaraiAduan as $aduan)
                    <tr>
                        <td>{{ $aduan->id }}</td>
                        <td>{{ $aduan->nama_pengadu }}</td>
                        <td>{{ $aduan->email_pengadu }}</td>
                        <td>{{ $aduan->aduan }}</td>
                        <td>
                            @if(!is_null($aduan->fail))
                            <a href="{{ asset('/upload/' . $aduan->fail) }}" class="btn btn-success">LIHAT</a>
                            @else
                            TIADA FAIL
                            @endif
                        </td>
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
        <a href="{{ route('aduan.create') }}" class="btn btn-primary">Tambah Aduan</a>
    </div>
</div>
@endsection
