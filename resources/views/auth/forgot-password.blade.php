<x-layout>

    <form method="POST" action="/forgot-password">
        @csrf

        <label for="email">Enter your email: </label> <br>
        <input type="email" name="email" placeholder="example@email.com">
        @error('email')
        <p class="error">{{$message}}</p>
        @enderror

        <button>Submit</button>

    </form>
    
</x-layout>