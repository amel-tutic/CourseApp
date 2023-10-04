<link rel="stylesheet" href={{ asset('/css/users/profile.css') }}>

<x-layout>

    <div class="mainProfile">
        <div class="infoProfile">

        <div class="headingProfile">
        <h1 style="border-bottom: 1px solid black; margin-bottom:1em;">My profile</h1>
        </div>
   

    <span><b>Name:</b> {{$user->name}}</span> <br> <br>

    <span><b>Email:</b> {{$user->email}}</span> <br> <br>

    <span><b>Role:</b> {{$user->role}}</span> <br> <br>

   <a href="/users/changePassword/{{$user->id}}"><button class="buttonProfile">Change password</button></a>

</div>
</div>

<a href="/courses">
    <button class="backProfile" style="background-color: #192d2e; color:white; padding:0.5em; position:absolute; left:10; top:100;">
        <i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>