@extends('layouts.app')
@section('title', 'Créer un étudiant')
@section('content')


<div class="container height-center">
    <form action="{{ route('student.store') }}" method="POST" class="form">
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
            <label for="address">@lang('Address'):</label>
            <input type="text" placeholder="Entrez l'adresse de l'étudiant" name="address" value="{{ old('address') }}" required>
            @if($errors->has('address'))
                <div class="form-error-input">
                    {{ $errors->first('address') }}
                </div>      
            @endif
        </div>
    
        <div class="form-control">
            <label for="city">@lang('City'):</label>
            <select name="city_id" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
            @if($errors->has('city'))
                <div class="form-error-input">
                    {{ $errors->first('city') }}
                </div>      
            @endif
        </div>
    
        <div class="form-control">
            <label for="birth_date">@lang('Birth Date') :</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required> 
            @if($errors->has('birth_date'))
                <div class="form-error-input">
                    {{ $errors->first('birth_date') }}
                </div>      
            @endif

        </div>
    
        <div class="form-control">
            <label for="phone">@lang('Phone'):</label>
            <input type="tel" placeholder="ex: 4222121233" name="phone" value="{{ old('phone') }}" required>
            @if($errors->has('phone'))
                <div class="form-error-input">
                    {{ $errors->first('phone') }}
                </div>      
            @endif
        </div>
    
        <div class="form-control">
            <label for="email">@lang('Email')::</label>
            <input type="email" placeholder="ex: random@gmail.com" name="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <div class="form-error-input">
                    {{ $errors->first('email') }}
                </div>      
            @endif
        </div>
    
        <button type="submit" class="btn btn-primary">@lang('Student Create')</button>
    </form>
</div>
@endsection