@extends('layouts.induk')

@section('isi-kandungan')

<div class="card">
    <div class="card-body text-center">

        <h1>Selamat Datang ke {{ config('app.name') }}</h1>

        <div class="mt-5">
            <a href="{{ route('aduan.create') }}" class="btn btn-primary btn-lg">
                Hantar Aduan
            </a>
        </div>

    </div>
</div>

@endsection
