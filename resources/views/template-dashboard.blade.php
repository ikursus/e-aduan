@extends('layouts.induk')

@section('isi-kandungan')

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">

        <p>Selamat Datang!</p>

        <ul>
            <li><a href="{{ route('aduan.baru') }}">Aduan</a></li>
            <li><a href="<?php echo route('logout'); ?>">Logout</a></li>
        </ul>

        <?php

        $pelajar = [
            ['id' => 1, 'name' => 'ahmad'],
            ['id' => 2, 'name' => 'siti'],
            ['id' => 3, 'name' => 'ali'],
        ];

        foreach($pelajar as $key)
        {
            echo '<li>' . $key['name'] . '</li>';
        }

        ?>

        @php

        $pelajar = [
            ['id' => 1, 'name' => 'a'],
            ['id' => 2, 'name' => 'b'],
            ['id' => 3, 'name' => 'c'],
        ];

        @endphp

        @foreach($pelajar as $key)
        <li>{{ $key['name'] }}</li>
        @endforeach
    </div>
    <div class="card-footer">
    </div>
</div>

@endsection

@section('jsscript')
<script>
    alert('test')
</script>
@endsection
