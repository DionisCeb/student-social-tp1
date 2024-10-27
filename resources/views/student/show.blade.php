@extends('layouts.app')
@section('title', 'Student Details')
@section('content')

Here would be specific student displayed
<div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $etudiant->nom }}</h5>
                <p class="card-text">
                    <strong>Adresse:</strong> {{ $etudiant->adresse }} <br>
                    <strong>Téléphone:</strong> {{ $etudiant->telephone }} <br>
                    <strong>Email:</strong> {{ $etudiant->email }} <br>
                    <strong>Date de Naissance:</strong> {{ $etudiant->date_naissance }} <br>
                    <strong>Ville:</strong> {{ $etudiant->ville->nom }}
                </p>
            </div>
            
        </div>


@endsection