@extends('layouts.app')
@section('title', 'Article Edit')
@section('content')


<div class="container height-center flex-col gap20">
    <form method="POST" class="form">
        @csrf 
    
        <div class="form-control">
            <label for="title_en">@lang('Title') (EN)</label>
            <input type="text" name="title_en" id="title_en"  value="{{ old('title_en', $translation_en->title ?? '') }}">
            @if($errors->has('title_en'))
                <div class="form-error-input">
                    {{ $errors->first('title_en') }}
                </div>      
            @endif
        </div>
        <div class="form-control">
            <label for="content_en">@lang('Content') (EN)</label>
            <textarea name="content_en" id="content_en">{{ old('content_en', $translation_en->content ?? '') }}</textarea>
            @if($errors->has('content_en'))
                <div class="form-error-input">
                    {{ $errors->first('content_en') }}
                </div>      
            @endif
        </div>

        <div class="form-control">
            <label for="title_fr">@lang('Title') (FR)</label>
            <input type="text" name="title_fr" id="title_fr" value="{{ old('title_fr', $translation_fr->title ?? '') }}">
            @if($errors->has('title_fr'))
                <div class="form-error-input">
                    {{ $errors->first('title_fr') }}
                </div>      
            @endif
        </div>
        <div class="form-control">
            <label for="content_fr">@lang('Content') (FR)</label>
            <textarea name="content_fr" id="content_fr" class="form-control">{{ old('content_fr', $translation_fr->content ?? '') }}</textarea>
            @if($errors->has('content_fr'))
                <div class="form-error-input">
                    {{ $errors->first('content_fr') }}
                </div>      
            @endif
        </div>

        <div class="form-control">
            <label for="date">@lang('Date'):</label>
            <input type="date" name="publication_date" id="publication_date" class="form-control" value="{{ old('date', $article->publication_date) }}" required>
            @if($errors->has('date'))
                <div class="form-error-input">
                    {{ $errors->first('date') }}
                </div>      
            @endif
        </div>
    
    
        <button type="submit" class="btn btn-primary">@lang('Update')</button>
    </form>  
</div>

@endsection