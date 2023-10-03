<!DOCTYPE html>
<html lang="en">
<head>

    <script src="https://cdn.tiny.cloud/1/2vdpcukfvfp4kbfrc6pg65pmij26edjxcq840jqf4l3hn52m/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <meta name="viewport" content="width=1024, user-scalable=no">

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

        @auth
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
            </button>
            <ul class="dropdown-menu">
              <li>@if(auth()->user()->role == 'admin' || auth()->user()->role == 'professor')
                <a class="dropdown-item" href="/courses/manage">Manage Courses</a>
                @else
                <a class="dropdown-item" href="/enroll/manage?userid={{auth()->user()->id}}">My Courses</a>
    
                @endif
             </li>
              <li> @if(auth()->user()->role == 'admin') 
                <a class="dropdown-item" href="/users/manage">Manage Users</a>
            
            @endif
            </li>
              <li> <a class="dropdown-item" href="/users/profile/{{auth()->user()->id}}">My Profile</a></li>
            </ul>
          </div>
          @endauth

          @auth
            <span class="welcome">Welcome {{auth()->user()->name}}</span>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit"> 
                    Logout
                </button>
            </form>

            @else
            <div class="reglog">
            <a href="/register">Register</a>
            <a href="/login">Login</a>
            </div>
       
            @endauth
    </header>
    
    <x-flash-message />

    <main class="slotMain">
        {{$slot}}
    </main>

    <footer>
        <p>&copy;2023 All Rights Reserved.</p>
    </footer>

</div>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
  </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>