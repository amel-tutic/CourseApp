<link rel="stylesheet" href="{{asset('css//users/login.css')}}">

<x-layout>

    <div class="mainLogin">
    <div class="infoLogin">

    <div class="headingLogin">
    <h2>Login</h2>
    <p>Log in to add or enroll in courses.</p>
    </div>

    <div class="formLogin">
    <form method="POST" action="/users/authenticate">
    @csrf

    <br> <br>

   
    <label for="Email">Email:</label>
    <input type="email" name="email" placeholder="email" value="{{old('email')}}">
    @error('email')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="password" value="">
    @error('password')
        <p class="error">{{$message}}</p>
    @enderror
   

    <br> <br>

    <button class="buttonLogin" type="submit">Sign In</button>

    <br> <br> <br>

    <div>
        <p>Don't have an account?</p>
        <a class="signupLogin" href="/register">Sign Up</a>
    </div>

    <br> <br>

    </form>
    </div>
</div>

</div>

</x-layout>