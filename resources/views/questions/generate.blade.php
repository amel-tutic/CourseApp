<x-layout>

   
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

    <button>Submit</button>

    
    @else
    <p>No questions matching the criteria</p>
    @endunless
    
</form>

</x-layout>