<link rel="stylesheet" href="{{asset('css/questions/create.css')}}">

<x-layout>
    <div class="mainCreate">
        <div class="infoCreate">

    <form method="POST" action="/questions/create?course={{request('course')}}">
        @csrf
    
        <h2>Create a new question for course {{request('course')}}</h2>
    
        <label for="question"><b>Question:</label>
        <input type="text" name="question" placeholder="question" value="{{old('question')}}">
        @error('question')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="answer"><b>Answer:</b></label>
        <input type="textarea" name="answer" placeholder="answer" value="{{old('answer')}}">
        @error('answer')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option1"><b>Option 1:</b></label>
        <input type="textarea" name="option1" placeholder="option 1" value="{{old('option1')}}">
        @error('option1')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option2"><b>Option 2:</b></label>
        <input type="textarea" name="option2" placeholder="option 2" value="{{old('option2')}}">
        @error('option2')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option3"><b>Option 3:</b></label>
        <input type="textarea" name="option3" placeholder="option 3" value="{{old('option3')}}">
        @error('option3')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>

        <label for="difficulty"><b>Difficulty: (easy, medium, or hard)</b></label>
        <input type="textarea" name="difficulty" placeholder="difficulty" value="{{old('difficulty')}}">
        @error('difficulty')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>

        <label for="points"><b>Points:</b> </label>
        <input type="number" name="points" placeholder="points" value="{{old('points')}}">
        @error('points')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>
    
        <button type="submit" style="background-color: #192d2e; color:white; padding:0.5em;">Create</button>
    
    </form>

        </div>
    </div>

    <a href="/questions/manage?course={{request('course')}}">
        <button class="backCreate"><i class="fa-solid fa-arrow-left"></i> Back</button>
    </a>
</x-layout>