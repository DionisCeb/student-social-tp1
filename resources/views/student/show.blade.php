@extends('layouts.app')
@section('title', 'Détails')
@section('content')


<div class="main">
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
                <div><strong>@lang('Address'):</strong> {{ $student->address }}</div>
                <div><strong>@lang('Phone'):</strong> {{ $student->phone }}</div>
                <div><strong>@lang('Email'):</strong> {{ $student->email }}</div>
                <div><strong>@lang('Birth Date'):</strong> {{ $student->birth_date }}</div>
                <div><strong>@lang('City'):</strong> {{ $student->city->name }}</div>
            </div>
        </div>
    </div>
    
    <section class="profile-actions">
        <div class="forum-container">
            @if(Auth::check() && Auth::id() === $student->user_id)
            <form action="{{ route('article.store', ['student' => $student->id]) }}" class="form" method="POST">
                @csrf
                <header class="page-title"><h1>@lang('Create Article')</h1></header>
                <div class="form-control">
                    <label for="publication_date">@lang('Publication Date')</label>
                    <input type="date" name="publication_date" id="publication_date">
                    @if($errors->has('publication_date'))
                        <div class="form-error-input">
                            {{ $errors->first('publication_date') }}
                        </div>
                    @endif
                </div>
    
                <div class="form-control">
                    <label for="title_en">@lang('Title') (EN)</label>
                    <input type="text" name="title_en" id="title_en">
                    @if($errors->has('title_en'))
                        <div class="form-error-input">
                            {{ $errors->first('title_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-control">
                    <label for="content_en">@lang('Content') (EN)</label>
                    <textarea name="content_en" id="content_en"></textarea>
                    @if($errors->has('content_en'))
                        <div class="form-error-input">
                            {{ $errors->first('content_en') }}
                        </div>
                    @endif
                </div>
    
                <div class="form-control">
                    <label for="title_fr">@lang('Title') (FR)</label>
                    <input type="text" name="title_fr" id="title_fr">
                    @if($errors->has('title_fr'))
                        <div class="form-error-input">
                            {{ $errors->first('title_fr') }}
                        </div>
                    @endif
                </div>
                <div class="form-control">
                    <label for="content_fr">@lang('Content') (FR)</label>
                    <textarea name="content_fr" id="content_fr" class="form-control"></textarea>
                    @if($errors->has('content_fr'))
                        <div class="form-error-input">
                            {{ $errors->first('content_fr') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">@lang('Create Article')</button>
            </form>
    
    
            @endif
        </div>
        @if(Auth::check() && Auth::id() === $student->user_id)
        <!--File upload form-->
        <div class="forum-container">
            <form  action="{{ route('file.upload', ['student' => $student->id]) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                <header class="page-title"><h1>@lang('Upload')</h1></header>
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
            @endif
        </div>
    </section>
    
    <section class="uploaded-files">
        <div class="uploaded-files-container">
            <header class="page-title"><h1>@lang('Uploaded Files')</h1></header>
            <article class="flex-col gap20">
    
                    <table id="files-table" class="table">
                        <thead>
                            <tr>
                                <th>@lang('Title')</th>
                                <th>@lang('Author')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Download')</th>
                                @if ($student->files->contains(function ($file) {
                                    return Auth::id() === $file->student->user_id;
                                }))
                                    <th>@lang('Edit')</th>
                                    <th>@lang('Delete')</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->title }}</td>
                                    <td>{{ $file->student->name }}</td>
                                    <td>{{ $file->upload_date }}</td>
                                    <td>
                                        <a href="{{ route('file.download', ['file' => $file->id]) }}" class="" download>
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                    </td>
                                    @if (Auth::id() === $file->student->user_id)
                                        <td><a href="{{ route('file.edit', ['file' => $file->id]) }}"><i class="fa-solid fa-pen"></i></a></td>
                                        <td>
                                            <form action="{{ route('file.destroy', ['file' => $file->id]) }}" method="POST" onsubmit="return confirm('@lang('Delete File')');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="" id="open-popup"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <!-- Custom Pagination -->
                    <div class="pagination-container mt-4">
                        <ul class="pagination flex justify-center">
                            {{-- Previous Page Link --}}
                            @if ($files->onFirstPage())
                                <li class="disabled">
                                    <span>&laquo; @lang('Previous')</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $files->previousPageUrl() }}#files-table" class="text-gray-700 hover:text-gray-900">&laquo; @lang('Previous')</a>
                                </li>
                            @endif
    
                            {{-- Page Indexes --}}
                            @foreach ($files->links()->elements[0] as $page => $url)
                                {{-- Skip "first" and "last" buttons --}}
                                @if (is_numeric($page))
                                    <li class="{{ $page == $files->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}#files-table" class="py-1 px-3 text-gray-700 hover:text-gray-900 {{ $page == $files->currentPage() ? 'bg-blue-500 text-white' : '' }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
    
                            {{-- Next Page Link --}}
                            @if ($files->hasMorePages())
                                <li>
                                    <a href="{{ $files->nextPageUrl() }}#files-table" class="text-gray-700 hover:text-gray-900">@lang('Next') &raquo;</a>
                                </li>
                            @else
                                <li class="disabled">
                                    <span>@lang('Next') &raquo;</span>
                                </li>
                            @endif
                        </ul>
                    </div>
            </article>
        </div>
    </section>
    
    <section class="forum" id="forum">
        <header class="page-title"><h1>Forum</h1></header>
        <div class="grid-container row-2">
            @foreach ($student->articles as $article)
    
            @php
                $translation_en = $article->translation('en');
                $translation_fr = $article->translation('fr');
            @endphp
            <div class="forum-article">
                <!-- English Article -->
                @if ($translation_en)
                    <div class="article_en">
                        <div class="article-title">{{ $translation_en->title }}</div>
                        <div class="article-description">{{ $translation_en->content }}</div>
                        <div class="article-date">@lang('Date'): {{ $article->publication_date }}</div>
                        <div class="article-author">@lang('Author'): {{ $article->student->user->name }}</div>
                    </div>
    
                @else
                    <div class="article_en">
                        <div class="article-title">@lang('No translation available')</div>
                    </div>
                @endif
    
                 <!-- French Article -->
                @if ($translation_fr)
                    <div class="article_fr hide">
                        <div class="article-title">{{ $translation_fr->title }}</div>
                        <div class="article-description">{{ $translation_fr->content }}</div>
                        <div class="article-date">@lang('Date'): {{ $article->publication_date }}</div>
                        <div class="article-author">@lang('Author'): {{ $article->student->user->name }}</div>
                    </div>
                @else
                    <div class="article_fr hide">
                        <div class="article-title">@lang('No translation available')</div>
                    </div>
                @endif
    
                <!-- Toggle Button -->
                @if ($translation_fr)
                    <button class="btn" id="translateBtn">@lang('Translate')</button>
                @else
                    <div class="article-title">@lang('No translation available')</div>
                @endif
    
    
                @if(Auth::check() && Auth::id() === $student->user_id)
                    <div class="profile-links flex gap20 mt-20">
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-icon">@lang('Edit') <i class="fa-solid fa-pen"></i></a>
                        <!-- Delete Button -->
    
                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon danger" id="open-popup">@lang('Delete') <i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                 @endif
                </div>
            @endforeach
    
        </div>
    </section>
</div>



<script>
   let forums = document.querySelectorAll('.forum-article');

// Loop through all articles
forums.forEach((forum) => {
    let article_en = forum.querySelector('.article_en');
    let article_fr = forum.querySelector('.article_fr');
    let translateBtn = forum.querySelector('.btn');

    // Function to toggle visibility
    function toggleTranslation() {
        if (article_fr.classList.contains('hide')) {
            // Show French, hide English
            article_fr.classList.remove('hide');
            article_en.classList.add('hide');
        } else {
            // Show English, hide French
            article_fr.classList.add('hide');
            article_en.classList.remove('hide');
        }
    }

    // Add event listener for each button
    translateBtn.addEventListener('click', toggleTranslation);
}); 
</script>



   



@endsection