<link rel="stylesheet" href={{ asset('css/questions/finished.css') }}>

<x-layout>
<div class="mainFinished">
    <div class="infoFinished">  


<h1>Congratulations, you have finished the course!</h1>


<a href="/enroll/manage?userid={{auth()->user()->id}}">
    <button class="backFinished">
        <i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

    </div>  
</div>
</x-layout>