<x-layout>

<x-card>
<link rel="stylesheet" href="/css/courses.css">

<img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">

<h1>{{$course->title}}</h1>

<p>{{$course->description}}</p>
</x-card>

<x-card>
    <a href="/courses/{{$course->id}}/edit">
        <button type="submit">Edit</button>
    </a>
    
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