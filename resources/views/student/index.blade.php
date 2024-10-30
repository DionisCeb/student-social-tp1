@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')

<div class="container">
    <header class="page-title"><h1>Liste des étudiants</h1></header>

    <div class="grid-container">
            @forelse ($students as $student)
                <div class="card">
                    <div class="card-body flex-col gap10">
    
                        <div class="card-image">
                            <img src="{{ asset('img/profile/profile.webp')}}" alt="profile-image">
                        </div>
                        
                        <h5 class="card-title">{{ $student->name }}</h5>
                        <div class="card-text">
                            <div><strong>Adresse:</strong> {{ $student->address }}</div>
                            <div><strong>Téléphone:</strong> {{ $student->phone }}</div>
                            <div><strong>Email:</strong> {{ $student->email }}</div>
                            <div><strong>Date de Naissance:</strong> {{ $student->birth_date }}</div>
                            <div><strong>Ville:</strong> {{ $student->city->name }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-icon">Voir <i class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
            @empty
                <p>Aucun étudiant trouvé.</p>
            @endforelse
        </div>
</div>


@endsection