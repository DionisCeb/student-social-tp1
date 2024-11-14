@extends('layouts.app')
@section('title', 'Article Edit')
@section('content')


<div class="container height-center flex-col gap20">
    <form method="POST" class="form">
        @csrf 
    
        <div class="form-control">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            @if($errors->has('title'))
                <div class="form-error-input">
                    {{ $errors->first('title') }}
                </div>      
            @endif
        </div>
    
    
    
        <div class="form-control">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
            @if($errors->has('content'))
                <div class="form-error-input">
                    {{ $errors->first('content') }}
                </div>      
            @endif
        </div>

        <div class="form-control">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $article->publication_date) }}" required>
            @if($errors->has('date'))
                <div class="form-error-input">
                    {{ $errors->first('date') }}
                </div>      
            @endif
        </div>
    
    
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>  
</div>

@endsection