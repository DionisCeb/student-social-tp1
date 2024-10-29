@extends('layouts.app')
@section('title', 'Students List')
@section('content')


<div class="container height-center">
    <form action="{{ route('student.store') }}" method="POST" class="form">
        @csrf  <!-- Laravel CSRF token protection -->
    
        <div class="form-control">
            <label for="name">Name:</label>
            <input type="text" placeholder="Enter Student Name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <div class="form-error-input">
                    {{ $errors->first('name') }}
                </div>      
            @endif
        </div>
        
    
        <div class="form-control">
            <label for="address">Address:</label>
            <input type="text" placeholder="Enter Student Address" name="address" value="{{ old('address') }}" required>
            @if($errors->has('address'))
                <div class="form-error-input">
                    {{ $errors->first('address') }}
                </div>      
            @endif
        </div>
    
        <div class="form-control">
            <label for="city">City:</label>
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
            <label for="birth_date">Birth Date:</label>
            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required> 
            @if($errors->has('birth_date'))
                <div class="form-error-input">
                    {{ $errors->first('birth_date') }}
                </div>      
            @endif

        </div>
    
        <div class="form-control">
            <label for="phone">Phone:</label>
            <input type="tel" placeholder="ex: 4222121233" name="phone" value="{{ old('phone') }}" required>
            @if($errors->has('phone'))
                <div class="form-error-input">
                    {{ $errors->first('phone') }}
                </div>      
            @endif
        </div>
    
        <div class="form-control">
            <label for="email">Email:</label>
            <input type="email" placeholder="ex: random@gmail.com" name="email" value="{{ old('email') }}" required>
            @if($errors->has('email'))
                <div class="form-error-input">
                    {{ $errors->first('email') }}
                </div>      
            @endif
        </div>
    
        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>
</div>
@endsection