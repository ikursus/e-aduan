@extends('layouts.induk')

@section('isi-kandungan')

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">

        <p>Selamat Datang!</p>

        {{-- {!! $scriptAlert !!} --}}
        {{ $scriptAlert }}

        <ul>
            <li><a href="{{ route('aduan.baru') }}">Aduan Baru</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>

    </div>
    <div class="card-footer">
    </div>
</div>

@endsection

@section('jsscript')

@endsection
