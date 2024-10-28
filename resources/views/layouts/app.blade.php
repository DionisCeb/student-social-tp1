<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>@yield('title')</title>
</head>
    <nav>
        <div class="nav-logo">
            <a href="{{ url('/') }}">Welcome</a>
        </div>
        <div class="nav-links">
            <a href="{{ route('student.index') }}">Student List</a>
            <a href="">Student Create</a>
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
</body>
</html>