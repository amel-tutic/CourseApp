<x-layout>

    <link rel="stylesheet" href="{{asset('css/courses.css')}}">
        
    <h1>{{$question->question}}</h1>
    
    <span>Option 0 (answer):</span> <p>{{$question->answer}}</p>

    <span>Option 1:</span> <p>{{$question->option1}}</p>

    <span>Option 2:</span> <p>{{$question->option2}}</p>

    <span>Option 3:</span> <p>{{$question->option3}}</p> <br> <br>

    <span>Difficulty:</span> <p>{{$question->difficulty}}</p>
    <span>Points:</span> <p>{{$question->points}}</p>
    
    </x-layout>
    