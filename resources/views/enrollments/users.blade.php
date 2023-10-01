<x-layout>

    <header>
        <h2>Users that are currently enrolled on this course: </h2>
    </header>


    <table>

        
        @unless(count($users) == 0)
        @foreach ($users as $user)
        <tr>
            
        <td>
          <h3>{{$user->name}}</h3>
        </td>

        </tr>
        @endforeach

        @else
        <td>
            <p>No students have enrolled on your course yet.</p>
        </td>
        @endunless
    </table>

</x-layout>