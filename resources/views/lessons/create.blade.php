<link rel="stylesheet" href="{{asset('css/lessons/create.css')}}">
<x-layout>
<div class="createMain">
    <form method="POST" action="/lessons/create?course={{request('course')}}" enctype="multipart/form-data">
        @csrf
    
        <h2>Create a new Lesson for course {{request('course')}}</h2>
    
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title" value="{{old('title')}}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="description">Description:</label>
        <input type="textarea" name="description" placeholder="description" value="{{old('description')}}">
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="content">Content:</label>
        <textarea name="content" value="{{old('content')}}" rows="5" cols="20"></textarea>
        @error('content')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="image">Image:</label>
        <input type="file" name="image" placeholder="image">
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
    
        <button class="buttonCreate" type="submit">Create</button>
    
    </form>
    <div class="backPositionDiv">
    <a href="/lessons/manage?course={{request('course')}}">
    <button>Back</button>
    </a>
</div>


</div>
</x-layout>