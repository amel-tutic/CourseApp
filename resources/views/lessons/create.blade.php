<link rel="stylesheet" href="{{asset('css/lessons/create.css')}}">
<x-layout>
<div class="createMain">
    <form method="POST" action="/lessons/create?course={{request('course')}}" enctype="multipart/form-data">
        @csrf
    
        <h2>Create a new Lesson for course {{request('course')}}</h2>
    
        <label for="title"><b>Title:</b></label>
        <input type="text" name="title" placeholder="title" value="{{old('title')}}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="description"><b>Description:</b></label>
        <input type="textarea" name="description" placeholder="description" value="{{old('description')}}">
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="content"><b>Content:</b></label>
        <textarea name="content" value="{{old('content')}}" rows="5" cols="20"></textarea>
        @error('content')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="image"><b>Image:</b></label>
        <input type="file" name="image" placeholder="image">
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
    
        <button class="buttonCreate" type="submit">Create</button>
    
    </form>
    
    <a href="/lessons/manage?course={{request('course')}}">
    <button class="backCreate"><i class="fa-solid fa-arrow-left"></i> Back</button>
    </a>



</div>
</x-layout>