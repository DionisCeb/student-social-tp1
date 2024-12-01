@extends('layouts.app')
@section('title', 'User Login')
@section('content')


<div class="container height-center flex-col gap20">
    <form method="POST" class="form">
        @csrf 
        
    
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
    
    
        <button type="submit" class="btn btn-primary">@lang('Login')</button>
    </form>  
    <div class="form gap5 text-center font-20 ">
            <p>@lang("Don't have an account yet?")</p>
            <a href="{{ route('user.create') }}">@lang('Create Account')</a>
    </div>
</div>

@endsection