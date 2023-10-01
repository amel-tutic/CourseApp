<link rel="stylesheet" href="{{asset('css/courses.css')}}">

<x-layout>

    <form method="POST" action="/questions/{{$question->id}}?course={{$question->course_id}}">
        @csrf
        @method('PUT')
    
        <h2>Edit: <a href="/questions/{{$question->id}}">{{$question->question}}</a> </h2>
    
        <label for="question">Question:</label>
        <input type="text" name="question" placeholder="question" value="{{$question->question}}">
        @error('question')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>

        <label for="answer">Answer:</label>
        <input type="textarea" name="answer" placeholder="answer" value="{{$question->answer}}">
        @error('answer')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option1">Option 1:</label>
        <input type="textarea" name="option1" placeholder="option 1" value="{{$question->option1}}">
        @error('option1')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option2">Option 2:</label>
        <input type="textarea" name="option2" placeholder="option 2" value="{{$question->option2}}">
        @error('option2')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option3">Option 3:</label>
        <input type="textarea" name="option3" placeholder="option 3" value="{{$question->option3}}">
        @error('option3')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>

        <label for="difficulty">Difficulty</label>
        <input type="textarea" name="difficulty" placeholder="difficulty" value="{{$question->difficulty}}">
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
    
        <button type="submit">Update</button>
    
    </form>

</x-layout>