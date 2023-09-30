<x-layout>

    <h2>Register</h2>
    <p>Create an account to add or enroll in courses</p>

    <form method="POST" action="/users?role={{request('role')}}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" placeholder="name" value="{{old('name')}}">
    @error('name')
        <p class="error">{{$message}}</p>
    @enderror

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

    <label for="password2">Confirm password:</label>
    <input type="password" name="password_confirmation" placeholder="confirm password" value="">
    @error('password_confirmation')
        <p class="error">{{$message}}</p>
    @enderror

        <br> <br>

        @if (!request('role'))
            <label for="role">Choose desired role:</label> <br>
            <input type="radio" name="crole" id="student" value="student"> <label for="student">Student</label> <br>
            <input type="radio" name="crole" id="professor" value="professor"> <label for="professor">Professor</label> <br>
        @endif

        <br> <br>

    <button type="submit">Sign Up</button>

    <br> <br> <br>

    <div>
        <p>Already have an account?</p>
        <a href="/login">Login</a>
    </div>

    </form>

</x-layout>