<link rel="stylesheet" href={{ asset('css/questions/test.css') }}>

<x-layout>
    <div class="mainTest">
        <div class="infoTest">

    <h2>Prepare to be tested!</h2>

    <p>Choose the difficulty to proceed, and choose carefully</p>

    <form method="POST" action="/questions/test/generate?course={{$course}}">
    @csrf

    <input type="radio" name="diff" value="easy"> <label for="easy">Easy</label>
    <input type="radio" name="diff" value="medium"> <label for="medium">Medium</label>
    <input type="radio" name="diff" value="hard"> <label for="hard">Hard</label>

        <br> <br>

    <button class="buttonTest">Proceed</button>

    </form>

</div>
</div>
</x-layout>