<link rel="stylesheet" href="{{asset('css/create.css')}}">

<x-layout>

    <form method="POST" action="/questions/create?course={{request('course')}}">
        @csrf
    
        <h2>Create a new question for the course {{request('course')}}</h2>
    
        <label for="question">Question:</label>
        <input type="text" name="question" placeholder="question" value="{{old('question')}}">
        @error('question')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="answer">Answer:</label>
        <input type="textarea" name="answer" placeholder="answer" value="{{old('answer')}}">
        @error('answer')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option1">Option 1:</label>
        <input type="textarea" name="option1" placeholder="option 1" value="{{old('option1')}}">
        @error('option1')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option2">Option 2:</label>
        <input type="textarea" name="option2" placeholder="option 2" value="{{old('option2')}}">
        @error('option2')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option3">Option 3:</label>
        <input type="textarea" name="option3" placeholder="option 3" value="{{old('option3')}}">
        @error('option3')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>

        <label for="difficulty">Difficulty: (easy, medium, or hard)</label>
        <input type="textarea" name="difficulty" placeholder="difficulty" value="{{old('difficulty')}}">
        @error('difficulty')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>

        <label for="points">Points: </label>
        <input type="number" name="points" placeholder="points" value="{{old('points')}}">
        @error('points')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>
    
        <button type="submit">Create</button>
    
    </form>

</x-layout>