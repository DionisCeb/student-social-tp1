@extends('layouts.app')
@section('title', 'User Login')
@section('content')


<div class="container height-center">
    <form method="POST" class="form">
        @csrf 
        
    
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" placeholder="Entrez l'adresse e-mail de l'étudiant" name="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <div class="form-error-input">
                    {{ $errors->first('email') }}
                </div>      
            @endif
        </div>
    
    
    
        <div class="form-control">
            <label for="password">Password:</label>
            <input type="password" placeholder="" name="password" value="{{ old('password') }}" required>
            @if($errors->has('password'))
                <div class="form-error-input">
                    {{ $errors->first('password') }}
                </div>      
            @endif
        </div>
    
    
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div>
        <a href="{{ route('user.create') }}">Create account</a>
    </div>
</div>
@endsection