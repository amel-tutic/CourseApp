<link rel="stylesheet" href={{ asset('css/questions/generate.css') }}>

<x-layout>
    <div class="mainGenerate">
        <div class="infoGenerate">

            <h2 style="margin-bottom: 1em;">Try answering all the questions:</h2>
   
    <form method="POST" action="/questions/test/evaluate?course={{$courseid}}">
        @csrf

    @unless($questions->isEmpty())

   
    @foreach ($questions as $question)

        @php
            $options = [
                $question->answer,
                $question->option1,
                $question->option2,
                $question->option3,
    ];
                shuffle($options);
        @endphp

        <p>{{$question->question}}</p>
        @foreach($options as $option)   
        <input type="radio" name="answers[{{$question->id}}]" value="{{$option}}"> <label>{{$option}}</label>
        @endforeach

        <br> <br>

    @endforeach

    <button class="buttonGenerate">Submit</button>

    
    @else
    <p>No questions matching the criteria</p>
    @endunless
    
</form>

</div>
</div>
</x-layout>