@extends('layouts.app')
@section('title', 'Edit File')
@section('content')



<header class="page-title">
    <h1>@lang('Edit File')</h1>
</header>
    <div class="forum-container">
        <form  action="{{ route('file.update', ['file' => $file->id]) }}" class="form" method="POST" enctype="multipart/form-data">
            <h2>@lang('Upload')</h2>
            @csrf
            <div class="form-control">
                <label for="title">@lang('Title'):</label>
                <input type="text" name="title" value="{{ old('title', $file->title) }}">
                @if($errors->has('title'))
                    <div class="form-error-input">
                        {{ $errors->first('title') }}
                    </div>      
                @endif
            </div>
            <div class="form-control">
                <label for="upload_date">@lang('Date'):</label>
                <input type="date" name="upload_date" id="upload_date" value="{{ old('upload_date', $file->upload_date) }}">
                @if($errors->has('upload_date'))
                    <div class="form-error-input">
                        {{ $errors->first('upload_date') }}
                    </div>      
                @endif
            </div>
            <!--File uploader input--->
            <div class="form-control">
                <label for="file">@lang('File'):</label>
                <div class="file-upload-container">
                    <div class="file-upload-text">
                        <span>@lang('Drop Files Here')</span>
                    </div>
                    <div class="file-upload-or">
                        <span>@lang('Or')</span>
                    </div>
                    <div class="file-upload-browse">
                        <label for="file" class="btn-browse">@lang('Browse')</label>
                    </div>
                    <input type="file" name="file" id="upload">
                </div>
                @if($errors->has('file'))
                    <div class="form-error-input">
                        {{ $errors->first('file') }}
                    </div>      
                @endif
            </div>
            <button type="submit" class="btn btn-primary">@lang('Upload File')</button>     
            </div>
        </form>
</div>

@endsection