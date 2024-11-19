@extends('layouts.app')
@section('title', 'Détails')
@section('content')


<div class="profile">
    <div class="profile-image">
        <img src="{{ asset('img/profile/profile.webp')}}" alt="profile-image">
        @if(Auth::check() && Auth::id() === $student->user_id)
            <div class="profile-links flex-col gap20 mt-20">
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-icon">Modifier <i class="fa-solid fa-pen"></i></a>
                <!-- Delete Button -->
                <button class="btn btn-icon danger" id="open-popup">Supprimer <i class="fa-solid fa-trash"></i></button>

                <div id="popup" class="popup">
                    <div class="popup-content">
                        <h3>Etes-vous sûr de vouloir supprimer cet élève ?</h3>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="flex-col gap20">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon danger">
                                Supprimer <i class="fa-solid fa-trash"></i>
                            </button>
                            <button type="button" class="btn" id="close-popup">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="profile-body">
        <h2 class="profile-name">{{ $student->name }}</h2>
        <div class="profile-info">
            <div><strong>Adresse:</strong> {{ $student->address }}</div>
            <div><strong>Téléphone:</strong> {{ $student->phone }}</div>
            <div><strong>Email:</strong> {{ $student->email }}</div>
            <div><strong>Date de Naissance:</strong> {{ $student->birth_date }}</div>
            <div><strong>Ville:</strong> {{ $student->city->name }}</div>
        </div>
        <div class="forum-container">
            @if(Auth::check() && Auth::id() === $student->user_id)
            <form action="{{ route('article.store', ['student' => $student->id]) }}" class="form" method="POST">

                @csrf
                <div class="form-control">
                    <label for="date">Title:</label>
                    <input type="text" name="title">
                </div>
                <div class="form-control">
                    <label for="date">Content:</label>
                    <textarea name="content" id=""></textarea>
                </div>
                <div class="form-control">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="">
                </div>
                <button type="submit" class="btn btn-primary">Create Article</button>     
            </form>
            
                
            @endif
        </div>   
        @if(Auth::check() && Auth::id() === $student->user_id)
<!--File upload form-->
<div class="forum-container">
    <form  action="{{ route('file.upload', ['student' => $student->id]) }}" class="form" method="POST" enctype="multipart/form-data">
        <h2>@lang('Upload')</h2>
        @csrf
        <div class="form-control">
            <label for="title">@lang('Title'):</label>
            <input type="text" name="title">
            @if($errors->has('title'))
                <div class="form-error-input">
                    {{ $errors->first('title') }}
                </div>      
            @endif
        </div>
        <div class="form-control">
            <label for="upload_date">@lang('Date'):</label>
            <input type="date" name="upload_date" id="upload_date">
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
                <input type="file" name="file" id="file" style="display: none;">
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
@endif
</div>

<section class="uploaded-files">
    <div class="uploaded-files-container">
        <header class="page-title"><h1>@lang('Uploaded Files')</h1></header>
        <div class="flex gap20">
            @foreach ($student->files as $file)
                <div class="upload-doc">
                    <div class="delete-doc"><i class="fa-solid fa-trash"></i></div>
                    <div class="upload-bg">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <a href="{{ route('file.download', ['file' => $file->id]) }}" class="" download>
                        {{ $file->title }}
                        <i class="fa-solid fa-download"></i>
                    </a>
                        <span>@lang('Uploaded'): {{ $file->upload_date }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="forum">
    <header class="page-title"><h1>Forum</h1></header>
    <div class="grid-container row-2">
        @foreach ($student->articles as $article)
        <div class="forum-article">
            <div class="article-title">{{ $article->title }}</div>
            <div class="article-description">{{ $article->content }}</div>
            <div class="article-date">Date: {{ $article->publication_date }}</div>
            <div class="article-author">Author: {{ $student->name }}</div>

            @if(Auth::check() && Auth::id() === $student->user_id)
            <div class="profile-links flex gap20 mt-20">
                <a href="{{ route('article.edit', ['article' => $article->id]) }}" class="btn btn-icon">Edit <i class="fa-solid fa-pen"></i></a>
                <!-- Delete Button -->
                
                <form action="{{ route('article.destroy', ['article' => $article->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-icon danger" id="open-popup">Supprimer <i class="fa-solid fa-trash"></i></button>
                </form>

                
        @endif
        </div>
        @endforeach
    </div>
</section>

</div>
</div>   



   



@endsection