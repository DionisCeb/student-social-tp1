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


<nav>

<div class="nav-logo">
        <a href="{{ url('/') }}"><img src="https://img.icons8.com/?size=100&id=44842&format=png&color=000000" alt="home-page"></a>
    </div>   
<div class="page-links">
    <a href="{{ route('student.index') }}" class="nav-btn">Liste des étudiants</a>
    <a href="{{ route('student.create') }}" class="nav-btn">Création d'étudiant</a>
</div>
<div class="contact-us">
    <div class="contact-us">
        <a href="{{ route('student.index') }}" class="btn">Se connecter</a>
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
        <a class="btn" href="{{ route('student.index') }}">Authentification</a>
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