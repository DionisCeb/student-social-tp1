@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')

<div class="container">
    <header class="page-title"><h1>@lang('Student List')</h1></header>

    <div class="grid-container">
            @forelse ($students as $student)
                <div class="card">
                    <div class="card-body flex-col gap10">
    
                        <div class="card-image">
                            <img src="{{ asset('img/profile/profile.webp')}}" alt="profile-image">
                        </div>
                        
                        <h5 class="card-title">{{ $student->name }}</h5>
                        <div class="card-text">
                            <div><strong>@lang('Address'):</strong> {{ $student->address }}</div>
                            <div><strong>@lang('Phone'):</strong> {{ $student->phone }}</div>
                            <div><strong>@lang('Email'):</strong> {{ $student->email }}</div>
                            <div><strong>@lang('Birth Date'):</strong> {{ $student->birth_date }}</div>
                            <div><strong>@lang('City'):</strong> {{ $student->city->name }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-icon">@lang('View') <i class="fa-solid fa-eye"></i></a>
                    </div>
                </div>
            @empty
                <p>Aucun étudiant trouvé.</p>
            @endforelse
        </div>
</div>


@endsection