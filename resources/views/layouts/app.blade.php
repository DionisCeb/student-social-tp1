<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <script type="module" src="{{ asset('js/main.js')}}" defer></script>
    <title>@yield('title')</title>
</head>


<nav class="nav">

<div class="nav-logo">
        <a href="{{ url('/') }}"><img src="https://img.icons8.com/?size=100&id=44842&format=png&color=000000" alt="home-page"></a>
    </div>   
<div class="page-links">
    <a href="{{ route('student.index') }}" class="nav-btn">@lang('Student List')</a>
    <a href="{{ route('student.create') }}" class="nav-btn">@lang('Student Create')</a>
</div>
<div class="contact-us">
    @auth
        <div class="greet-user">
            <p>@lang('Welcome'), <strong>{{ Auth::user()->name }}</strong></p>

            @php
                // Retrieve the student record associated with the logged-in user
                $student = Auth::user()->student;
            @endphp

            @if($student)
                <a href="{{ route('student.show', $student->id) }}">
                    <img class="profile-nav" src="{{ asset('img/profile/profile.webp')}}" alt="profile-img">
                </a>
            @else
                <a href="{{ route('student.create') }}">
                    <img class="profile-nav" src="{{ asset('img/profile/profile.webp')}}" alt="profile-img">
                </a>
            @endif
        </div>
    @endauth


    <div class="dropdown">
        <!-- <button class="dropbtn btn">@lang('Language')</button> -->
        <img src="{{ asset('img/nav/language.png')}}" alt="language settings">
        <div class="dropdown-box">
            <a href="{{ route('lang', 'en') }}">@lang('English')</a>
            <a href="{{ route('lang', 'fr') }}">@lang('French')</a>
        </div>
    </div>

    <div class="contact-us">
        @auth
            <a href="{{route('logout')}}"><img src="{{ asset('img/nav/logout.png')}}" alt=""></a>
        @else
            <a href="{{route('login')}}"><img src="{{ asset('img/nav/login.png')}}" alt=""></a>
        @endauth
           
    </div>
    
</div>

<div class="hamburger">
    <span class="line"></span>
    <span class="line"></span>
    <span class="line"></span>
</div>

<div class="dropdown_menu">
    <li><a href="{{ route('student.index') }}" role="menuitem">Liste des étudiants</a></li>
    <li><a href="{{ route('student.create') }}" role="menuitem">Création d'étudiant</a></li>
    <div class="dropdown_menu--connection">
        <a class="btn" href="{{ route('student.index') }}">@lang('Login')</a>
    </div>
</div>
</nav>

<body>
    <main class="flex-center height100">
        <div class="structure">
            @if(session('success'))
                
                <div class="alert" id="alert-box" style="display: none;">
                    <p>{{ session('success') }}</p>
                    <button type="button" class="close" id="close-alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer class="footer flex-col gap20">
            <div class="page-links">
                <a class="nav-btn" href="{{ url('/') }}">Accueil</a>
                <span class="nav-btn">&middot;</span>
                <a class="nav-btn" href="{{ route('student.index') }}">Liste des étudiants</a>
                <span class="">&middot;</span>
                <a class="nav-btn" href="{{ route('student.create') }}">Création d'étudiant</a>
            </div>
        <div class="copyright"><div class="small m-0">Copyright &copy; Réalisé en 2024, par Dionis</div></div>
    </footer>

</body>
</html>