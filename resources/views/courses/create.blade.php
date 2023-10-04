<link rel="stylesheet" href="{{asset('css/courses/create.css')}}">

<x-layout>

<div class="createMain">

<form method="POST" action="/courses" enctype="multipart/form-data">
    @csrf

    <h2>Create a new Course</h2>

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

    <label for="tags"><b>Tags (Comma seperated):</b></label>
    <input type="text" name="tags" placeholder="tags" value="{{old('tags')}}">
    @error('tags')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="duration"><b>Duration:</b></label>
    <input type="number" name="duration" placeholder="duration" value="{{old('duration')}}">
    @error('duration')
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

</div>

<a href="/courses/manage">
    <button class="backCreate"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>