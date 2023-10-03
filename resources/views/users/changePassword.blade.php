<link rel="stylesheet" href={{ asset('css/users/changepassword.css') }}>

<x-layout>
    <div class="mainCP">
        <div class="infoCP">

    <div class="headingCP">
    <h1>Change your password</h1>
    </div>

    <form method="POST" action="/users/changePassword/{{$user->id}}">
        @csrf
        @method('PUT')

        <label for="currentPassword">
            Current Password: <input type="password" name="currentpassword">
        </label> <br> <br>

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

        <button class="buttonCP">Change</button>
    </form>

</div>
</div>
</x-layout>