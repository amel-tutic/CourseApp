<x-layout>


    <h2>Prepare to be tested!</h2>

    <p>Choose the difficulty to proceed, and choose carefully</p>

    <form method="POST" action="/questions/test/generate?course={{$course}}">
    @csrf

    <input type="radio" name="diff" value="easy"> <label for="easy">Easy</label>
    <input type="radio" name="diff" value="medium"> <label for="medium">Medium</label>
    <input type="radio" name="diff" value="hard"> <label for="hard">Hard</label>

        <br> <br>

    <button>Proceed</button>

    </form>

</x-layout>