@extends('layouts.app')
@section('title', 'Modifier l'étudiant')
@section('content')


<div class="container height-center">
    <form action="{{ route('student.update', $student->id) }}" method="POST" class="form">
        @csrf  
    
        <div class="form-control">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
            @if($errors->has('name'))
                <div class="form-error-input">{{ $errors->first('name') }}</div>
            @endif
        </div>

    <div class="form-control">
        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address', $student->address) }}" required>
        @if($errors->has('address'))
            <div class="form-error-input">{{ $errors->first('address') }}</div>
        @endif
    </div>

    <div class="form-control">
        <label for="city">City:</label>
        <select name="city_id" required>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('city_id'))
            <div class="form-error-input">{{ $errors->first('city_id') }}</div>
        @endif
    </div>

    <div class="form-control">
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" required>
        @if($errors->has('birth_date'))
            <div class="form-error-input">{{ $errors->first('birth_date') }}</div>
        @endif
    </div>

    <div class="form-control">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" value="{{ old('phone', $student->phone) }}" required>
        @if($errors->has('phone'))
            <div class="form-error-input">{{ $errors->first('phone') }}</div>
        @endif
    </div>

    <div class="form-control">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
        @if($errors->has('email'))
            <div class="form-error-input">{{ $errors->first('email') }}</div>
        @endif
    </div>
    
        <button type="submit" class="btn btn-primary">Modifier l'etudiant</button>
    </form>
</div>
@endsection