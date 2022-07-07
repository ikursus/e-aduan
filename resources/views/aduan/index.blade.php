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
                            <img src="{{ asset('/upload/' . $aduan->fail) }}" style="max-width: 100px">
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
        <a href="{{ route('aduan.export') }}" class="btn btn-dark">Export Aduan</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import-aduan">
            Import Aduan
        </button>

        <!-- Modal -->
        <form method="POST" action="{{ route('aduan.import') }}" enctype="multipart/form-data">
            @csrf

            <div class="modal fade" id="import-aduan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Fail Excell</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="file" name="aduan_import" class="form-control">

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
