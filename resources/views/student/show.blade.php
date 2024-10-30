@extends('layouts.app')
@section('title', 'Student Details')
@section('content')


<div class="profile">
    <div class="profile-image">
        <img src="{{ asset('img/profile/profile.webp')}}" alt="profile-image">
        <div class="profile-links flex-col gap20 mt-20">
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-icon">Modifier <i class="fa-solid fa-pen"></i></a>
            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-icon danger" >Supprimer <i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
    <div class="profile-body">
        <h2 class="profile-name">{{ $student->name }}</h2>
        <div class="profile-info">
            <div><strong>Adresse:</strong> {{ $student->address }}</div>
            <div><strong>Téléphone:</strong> {{ $student->phone }}</div>
            <div><strong>Email:</strong> {{ $student->email }}</div>
            <div><strong>Date de Naissance:</strong> {{ $student->birth_date }}</div>
            <div><strong>Ville:</strong> {{ $student->city->name }}</div>
        </div>
    </div>         
</div>


@endsection