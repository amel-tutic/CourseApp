<x-layout>

    <header>
        <h2>Your profile</h2>
    </header>

    <span>Name: {{$user->name}}</span> <br> <br>

    <span>Email: {{$user->email}}</span> <br> <br>

    <span>Role: {{$user->role}}</span> <br> <br>

   <a href="/users/changePassword/{{$user->id}}">Change password</a>


</x-layout>