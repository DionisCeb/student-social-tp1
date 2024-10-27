@extends('layouts.app')
@section('title', 'Students List')
@section('content')

<div class="container">
    <header class="page-title"><h1>Student-List</h1></header>

    <div class="grid-container">
            @forelse ($etudiants as $etudiant)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $etudiant->nom }}</h5>
                        <div class="card-text">
                            <div><strong>Adresse:</strong> {{ $etudiant->address }}</div>
                            <div><strong>Téléphone:</strong> {{ $etudiant->phone }}</div>
                            <div><strong>Email:</strong> {{ $etudiant->email }}</div>
                            <div><strong>Date de Naissance:</strong> {{ $etudiant->birth_date }}</div>
                            <div><strong>Ville:</strong> {{ $etudiant->ville->name }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('student.show', $etudiant->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Supprimer</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Aucun étudiant trouvé.</p>
            @endforelse
        </div>
</div>


@endsection