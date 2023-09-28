<link rel="stylesheet" href="/css/courses.css">

<x-layout>
    <x-card>

        <header>
            <h1>Manage Courses</h1>
        </header>

        <table>
            <tbody>
                @unless ($courses->isEmpty())   
                @foreach ($courses as $course)
                <tr>
                    <td>
                        <a href="/courses/{{$course->id}}">{{$course->title}}</a>
                    </td>
                    <td>
                        <a href="/courses/{{$course->id}}/edit">Edit</a>
                    </td>
                    <td>
                        <button id="deleteButton">Delete</button>
    
                        <div id="confirmDeleteWindow">
                            <form method="POST" action="/courses/{{$course->id}}">
                             @csrf
                             @method('DELETE')
                                <button type="submit">
                                 Confirm
                                </button>
                                </form>
                            <button id="cancelButton">Cancel</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>You don't have any courses.</td>
                </tr>
                @endunless
            </tbody>
        </table>

    </x-card>
</x-layout>

<script>
   
    var myVariable = false;
    var myVariable2 = true
   
    function updateDivVisibility() {
        var myDiv = document.getElementById("confirmDeleteWindow");
        if (myVariable) {
            myDiv.style.display = "flex";
        } else {
            myDiv.style.display = "none"; 
        }
    }
    updateDivVisibility();

    var changeValueButton = document.getElementById("deleteButton");
    changeValueButton.addEventListener("click", function() {
        
        myVariable = true;
        
        updateDivVisibility();
    });
    var changeValueButtonSecond =  document.getElementById("cancelButton");
    changeValueButtonSecond.addEventListener("click", function() {
        
        myVariable = false;
        updateDivVisibility();
    });
</script>