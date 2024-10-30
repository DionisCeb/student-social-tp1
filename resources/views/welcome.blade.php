@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="home container flex-col-center gap20 height100">
    <header>
        <h1>Welcome to Student Network App</h1>
    </header>
    <h2>This is a student Network App, where you can see, edit and delete students</h2>
    <div class="btn-container">
        <a href="{{ route('student.index') }}" class="btn">Display the student list</a>
    </div>
</div>
@endsection