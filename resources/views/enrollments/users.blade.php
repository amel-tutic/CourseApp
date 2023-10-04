<link rel="stylesheet" href={{ asset('css/enrollments/users.css') }}>

<x-layout>
    <div class="mainUsers">
        <div class="infoUsers">

        <h2 style="border-bottom: 1px solid black; margin-bottom:1em;">Users that are currently enrolled on this course: </h2>

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

</div>
</div>

<a href="/courses/manage">
    <button class="backUsers"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>