@extends('layouts.app')
@section('title', 'Students List')
@section('content')

<div class="container">
    <header class="page-title"><h1>Student-List</h1></header>

    <div class="grid-container">
            @forelse ($students as $student)
                <div class="card">
                    <div class="card-body">
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
                        <a href="" class="btn btn-icon">Modifier <i class="fa-solid fa-pen"></i></a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Supprimer <i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Aucun étudiant trouvé.</p>
            @endforelse
        </div>
</div>


@endsection