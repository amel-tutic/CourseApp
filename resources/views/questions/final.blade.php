<link rel="stylesheet" href={{ asset('css/questions/final.css') }}>

<x-layout>
    <div class="mainFinal">
        <div class="infoFinal">
   
    <h2 style="margin-bottom: 1em;">Welcome to the final test.</h2>
   

    <form method="POST" action="/questions/final/evaluate?userid={{auth()->user()->id}}&course={{request('course')}}">
        @csrf

    @unless(count($allQuestions) == 0)

    @foreach ($allQuestions as $question)

        @php
            $options = [
                $question->answer,
                $question->option1,
                $question->option2,
                $question->option3,
    ];
                shuffle($options);
        @endphp

        <p>{{$question->question}}</p>  {{--<span>{{$question->difficulty}}</span>--}}
        @foreach($options as $option)   
        <input type="radio" name="answers[{{$question->id}}]" value="{{$option . ',' . $question->points}}"> <label>{{$option}}</label>
        @endforeach

        <br> <br>

    @endforeach

    <button class="buttonFinal">Submit</button>

    
    @else
    <p>No questions matching the criteria</p>
    @endunless
    
</form>

<a href="/enroll/manage/?userid={{auth()->user()->id}}">
    <button class="backFinal"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</div>
</div>
</x-layout>