<link rel="stylesheet" href={{ asset('css/users/manage.css') }}>

<x-layout>
    <div class="usersManage">
  
        <h2>Manage Users</h2>
   

    <table>
        <tbody>

            @unless(count($users) == 0)

            @foreach ($users as $user)

                <tr>

                    <td>
                        <p>{{$user->name}}</p>
                    </td>

                    <td>
                        <p>{{$user->email}}</p>
                    </td>

                    <td>
                        <p>{{$user->role}}</p>
                    </td>

                    <td>
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
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
</x-layout>