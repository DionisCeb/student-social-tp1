@extends('layouts.app')
@section('title', 'Students Show')
@section('content')

<div class="container">
    Student-List

    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Date de Naissance</th>
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->adresse }}</td>
                        <td>{{ $etudiant->telephone }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ $etudiant->date_naissance }}</td>
                        <td>{{ $etudiant->ville->nom }}</td> <!-- Display city name -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Aucun étudiant trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</div>


@endsection