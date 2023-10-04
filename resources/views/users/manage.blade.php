<link rel="stylesheet" href={{ asset('css/users/manage.css') }}>

@php
$flag = request('flag');
@endphp

<x-layout>

    @if($flag)

    <div class="windowoptionsDelete">
        <div class="optionsDelete">
            <h3>Are you sure?</h3>
        <form method="POST" action="/users/{{$flag}}">
         @csrf
         @method('DELETE')
    
             <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Confirm</button>
             
            </form>
            <a id="cancelButton" href="/users/manage">
                <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Cancel</button></a>
        </div>
        </div>  

    @else
    <div id="usersManage">
  
        <div class="headingManage" style="width:100%; display:flex; justify-content:center">
        <h2 style="border-bottom: 1px solid black; margin-bottom:1em;">Manage Users</h2>
        </div>
   

    <table class="courses-table">
        <tbody>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            @unless(count($users) == 0)

            @foreach ($users as $user)

                <tr>

                    <td class="button-cell">
                        <div class="full-width-button-container">
                        <p>{{$user->name}}</p>
                        </div>
                    </td>

                    <td class="button-cell">
                        <div class="full-width-button-container">
                        <p>{{$user->email}}</p>
                        </div>
                    </td>

                    <td class="button-cell">
                        <div class="full-width-button-container">
                        <p>{{$user->role}}</p>
                        </div>
                    </td>

                    <td class="button-cell">
                        <a href="/users/manage/?flag={{$user->id}}">
                            <button class="full-width-button">Delete</button>
                        </a>
                    </td>

                </tr>
                
            @endforeach

            @else    
            <tr>
                <td>
                    <p>There are no users in the system.</p>
                </td>
            </tr>

            @endunless

        </tbody>
    </table>

</div>

<a href="/courses">
    <button class="backManageUsers" style="background-color: #192d2e; color:white; padding:0.5em; position:absolute; left:10; top:100;">
        <i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

@endif

</x-layout>