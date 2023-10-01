<x-layout>


    <header class="mt-3">
    <h2>Welcome to the final test.</h2>
    </header>

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

        <p>{{$question->question}}</p> <span>{{$question->difficulty}}</span>
        @foreach($options as $option)   
        <input type="radio" name="answers[{{$question->id}}]" value="{{$option}}"> <label>{{$option}}</label>
        @endforeach

        <br> <br>

    @endforeach

    <button>Submit</button>

    
    @else
    <p>No questions matching the criteria</p>
    @endunless
    
</form>

</x-layout>