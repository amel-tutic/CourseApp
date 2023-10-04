<link rel="stylesheet" href="{{asset('css/questions/question.css')}}">

<x-layout>
    <div class="mainQuestion">
        <div class="infoQuestion">
        
    <h1 style="margin-bottom: 1em;">{{$question->question}}</h1>
    
    <span><b>Option 0 (answer):</b></span> <p>{{$question->answer}}</p>

    <span><b>Option 1:</b></span> <p>{{$question->option1}}</p>

    <span><b>Option 2:</b></span> <p>{{$question->option2}}</p>

    <span><b>Option 3:</b></span> <p>{{$question->option3}}</p> <br> <br>

    <span><b>Difficulty:</b></span> <p>{{$question->difficulty}}</p>
    <span><b>Points:</b></span> <p>{{$question->points}}</p>
    

</div>
</div>

<a href="/questions/manage?course={{$question->course_id}}">
    <button class="backQuestion"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>
    