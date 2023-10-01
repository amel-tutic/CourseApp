<x-layout>

    <h2>Change your password</h2>

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

        <button>Change</button>
    </form>

</x-layout>