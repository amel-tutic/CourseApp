<x-layout>

    @php
        $correct = 0;
        $incorrect = 0;
    @endphp

    @unless (count($results) == 0)
        
    @foreach ($results as $result => $bool)
        @foreach ($questionres as $qres)
            @if ($qres->id == $result)
                <span>Question: </span> {{$qres->question}}  <br>
            @endif
        @endforeach
        @if ($bool == true)
            Your answer was correct. <br> <br> <br>
            @php
                $correct++;
            @endphp
        @else
            Your answer was incorrect. <br> <br> <br>
            @php
                $incorrect++;
            @endphp
        @endif

    @endforeach

    @else
    <p>No answers were given!</p>

    @endunless

    @php
        $resultsnumber = count($results);
    @endphp
    <h2>You answered {{$correct}} out of {{$resultsnumber}} well.</h2>

</x-layout>