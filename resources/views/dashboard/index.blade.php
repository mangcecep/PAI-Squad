@extends('layouts.dashboard')

@section('content')

<div class="title">Dashboard</div>
<div class="subtitle">Home</div>

<div class="cards">

    <div class="card blue">
        <div class="card-title">Jumlah Siswa</div>
        <div class="card-value">0 Orang</div>
        <div class="card-link">></div>
    </div>

    <div class="card yellow">
        <div class="card-title">Jumlah Guru</div>
        <div class="card-value">0 Orang</div>
        <div class="card-link">></div>
    </div>

    <div class="card green">
        <div class="card-title">Jumlah Siswa Yang Tidak Hadir</div>
        <div class="card-value">0 Orang</div>
        <div class="card-link">></div>
    </div>

    <div class="card red">
        <div class="card-title">Jumlah Siswa Yang Hadir</div>
        <div class="card-value">0 Orang</div>
        <div class="card-link">></div>
    </div>

</div>

@endsection
