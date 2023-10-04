<link rel="stylesheet" href={{ asset('css/questions/test.css') }}>

<x-layout>
    <div class="mainTest">
        <div class="infoTest">

    <h2>Prepare to be tested!</h2>

    <p>Choose the difficulty to proceed: </p>

    <form method="POST" action="/questions/test/generate?course={{$course}}">
    @csrf

    <input type="radio" name="diff" value="easy"> <label for="easy">Easy</label>
    <input type="radio" name="diff" value="medium"> <label for="medium">Medium</label>
    <input type="radio" name="diff" value="hard"> <label for="hard">Hard</label>

        <br> <br>

    <button class="buttonTest">Proceed</button>

    </form>

    <a href="/enroll/manage?userid={{{auth()->user()->id}}}">
        <button class="backTest" style="background-color: #192d2e; color:white; padding:0.5em; position:absolute; left:10; top:100;">
            <i class="fa-solid fa-arrow-left"></i> Back</button>
    </a>

</div>
</div>
</x-layout>