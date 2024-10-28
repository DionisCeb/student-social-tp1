@extends('layouts.app')
@section('title', 'Student Details')
@section('content')


<div class="profile">
    <div class="profile-image">
        <img src="{{ asset('img/profile/profile.webp')}}" alt="profile-image">
    </div>
    <div class="profile-body">
        <h2 class="profile-name">{{ $student->name }}</h2>
        <p class="profile-info">
            <div><strong>Adresse:</strong> {{ $student->address }}</div>
            <div><strong>Téléphone:</strong> {{ $student->phone }}</div>
            <div><strong>Email:</strong> {{ $student->email }}</div>
            <strong>Date de Naissance:</strong> {{ $student->birth_date }}
            <strong>Ville:</strong> {{ $student->city->name }}
        </p>
    </div>         
</div>


@endsection