<link rel="stylesheet" href="{{asset('css/questions/edit.css')}}">

<x-layout>
    <div class="mainEdit">
        <div class="infoEdit">

    <form method="POST" action="/questions/{{$question->id}}?course={{$question->course_id}}">
        @csrf
        @method('PUT')
    
        <h2>Edit: <a href="/questions/{{$question->id}}" style="text-decoration: none; color:black;">{{$question->question}}</a> </h2>
    
        <label for="question"><b>Question:</b></label>
        <input type="text" name="question" placeholder="question" value="{{$question->question}}">
        @error('question')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>

        <label for="answer"><b>Answer:</b></label>
        <input type="textarea" name="answer" placeholder="answer" value="{{$question->answer}}">
        @error('answer')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option1"><b>Option 1:</b></label>
        <input type="textarea" name="option1" placeholder="option 1" value="{{$question->option1}}">
        @error('option1')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option2"><b>Option 2:</b></label>
        <input type="textarea" name="option2" placeholder="option 2" value="{{$question->option2}}">
        @error('option2')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="option3"><b>Option 3:</b></label>
        <input type="textarea" name="option3" placeholder="option 3" value="{{$question->option3}}">
        @error('option3')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>

        <label for="difficulty"><b>Difficulty</b></label>
        <input type="textarea" name="difficulty" placeholder="difficulty" value="{{$question->difficulty}}">
        @error('difficulty')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>

        <label for="points"><b>Points:</b></label>
        <input type="number" name="points" placeholder="points" value="{{old('points')}}">
        @error('points')
            <p class="error">{{$message}}</p>
        @enderror

        <br> <br>
    
        <button type="submit" style="background-color: #192d2e; color:white; padding:0.5em;">Update</button>
    
    </form>

</div>
</div>

<a href="/questions/manage?course={{request('course')}}">
    <button class="backEdit"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>