@extends('layouts.app')
@section('title', 'Créer un usager')
@section('content')


<div class="container height-center">
    <form method="POST" class="form">
        @csrf  
    
        <div class="form-control">
            <label for="name">@lang('Name'):</label>
            <input type="text" placeholder="Entrez le nom de l'étudiant" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <div class="form-error-input">
                    {{ $errors->first('name') }}
                </div>      
            @endif
        </div>
        
    
        <div class="form-control">
            <label for="email">@lang('Email')</label>
            <input type="text" placeholder="Entrez l'adresse e-mail de l'étudiant" name="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <div class="form-error-input">
                    {{ $errors->first('email') }}
                </div>      
            @endif
        </div>
    
    
    
        <div class="form-control">
            <label for="password">@lang('Password'):</label>
            <input type="password" placeholder="" name="password" value="{{ old('password') }}" required>
            @if($errors->has('password'))
                <div class="form-error-input">
                    {{ $errors->first('password') }}
                </div>      
            @endif
        </div>
    
    
        <button type="submit" class="btn btn-primary">@lang('Create Account')</button>
    </form>
</div>
@endsection