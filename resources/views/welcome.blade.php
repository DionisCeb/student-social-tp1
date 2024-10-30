@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')
<div class="home container flex-col-center gap20 height100">
    <header>
        <h1>Bienvenue sur l'application Student Network</h1>
    </header>
    <h2>Il s'agit d'une application réseau pour étudiants, où vous pouvez voir, modifier et supprimer des étudiants</h2>
    <div class="btn-container">
        <a href="{{ route('student.index') }}" class="btn">Afficher la liste des étudiants</a>
    </div>
</div>
@endsection