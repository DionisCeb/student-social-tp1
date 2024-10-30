<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>@yield('title')</title>
</head>
<!-- <nav>
    <div class="nav-logo">
        <a href="{{ url('/') }}">Welcome</a>
    </div>   

    <div class="nav-links" id="nav-links">
        <a href="{{ route('student.index') }}">Student List</a>
        <a href="{{ route('student.create') }}">Student Create</a>
    </div>

    <div class="menu-icon">
        <img 
            src="https://img.icons8.com/?size=100&id=8113&format=png&color=000000" 
            id="burger-icon" 
            alt="Open Menu" 
            class="icon"
        />
        <img 
            src="https://img.icons8.com/?size=100&id=8112&format=png&color=000000" 
            id="close-icon" 
            alt="Close Menu" 
            class="icon hidden"
        />
    </div>
</nav> -->

<nav>

<div class="nav-logo">
        <a href="{{ url('/') }}"><img src="https://img.icons8.com/?size=100&id=44842&format=png&color=000000" alt="home-page"></a>
    </div>   
<div class="page-links">
    <a href="{{ route('student.index') }}" class="nav-btn">Student List</a>
    <a href="{{ route('student.create') }}" class="nav-btn">Student Create</a>
</div>
<div class="contact-us">
    <div class="contact-us">
        <a href="{{ route('student.index') }}" class="btn">Authentificate</a>
    </div>
</div>

<div class="hamburger">
    <span class="line"></span>
    <span class="line"></span>
    <span class="line"></span>
</div>

<div class="dropdown_menu">
    <li><a href="{{ route('student.index') }}" role="menuitem">Student List</a></li>
    <li><a href="{{ route('student.create') }}" role="menuitem">Student Create</a></li>
    <div class="dropdown_menu--connection">
        <a class="btn" href="{{ route('student.index') }}">Authentification</a>
    </div>
</div>
</nav>

<body>
    <main class="flex-center height100">
        <div class="structure">
            @if(session('success'))
                
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>


    <script>
        class Navigation {
            constructor() {
                this.mobileNav = document.querySelector(".hamburger");
                this.navbar = document.querySelector(".dropdown_menu");

                this.initEvents();
            }

            toggleNav() {
                this.navbar.classList.toggle("open");
                this.mobileNav.classList.toggle("hamburger-active");
            }

            initEvents() {
                if (this.mobileNav) {
                    this.mobileNav.addEventListener("click", () => this.toggleNav());
                }
            }
        }

        const navigation = new Navigation();
        


    </script>
</body>
</html>