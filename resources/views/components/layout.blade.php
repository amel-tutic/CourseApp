<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/layout.css') }}>
    <link rel="icon" href={{ asset('img/cube.png') }} type="image/x-icon">
    <title>Cubikly</title>
</head>
<body>
    <div id="layoutMain">
    <header>
        <div class="logo">
            <a href="/"><img src={{ asset('img/logoblueorange2.png') }} alt="Cubickly" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>

                @guest
                {{-- @if(auth()->user()->role == 'admin' || auth()->user()->role == 'professor') --}}
                <li><a href="/register?role=professor">Be a professor</a></li>
                <li><a href="/register?role=student">Be a student</a></li>
                {{-- @endif --}}
                @endguest
                
                <li><a href="/courses">Courses</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <div class="reglog">
           
            @auth
            <span class="welcome">Welcome {{auth()->user()->name}}</span>
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'professor')
            <a href="/courses/manage">Manage Courses</a>
            @else
            <a href="/enroll/manage?userid={{auth()->user()->id}}">My Courses</a>

            @endif

            <form method="POST" action="/logout">
                @csrf
                <button type="submit"> 
                    Logout
                </button>
            </form>
          

            @else
            <a href="/register">Register</a>
            <a href="/login">Login</a>

            @endauth
        </div>
    </header>
    
    <x-flash-message />

    <main>
        {{$slot}}
    </main>

    <footer>
        <p>&copy;2023 All Rights Reserved.</p>
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>