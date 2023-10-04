<link rel="stylesheet" href="{{asset('css/courses/edit.css')}}">

<x-layout>
    <div class="editMain">
<form method="POST" action="/courses/{{$course->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Edit: {{$course->title}} </h2>

    <label for="title"><b>Title:</b></label>
    <input type="text" name="title" placeholder="title" value="{{$course->title}}">
    @error('title')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="description"><b>Description:</b></label>
    <input type="textarea" name="description" placeholder="description" value="{{$course->description}}">
    @error('description')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="tags"><b>Tags (Comma seperated):</b></label>
    <input type="text" name="tags" placeholder="tags" value="{{$course->tags}}">
    @error('tags')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="duration"><b>Duration:</b></label>
    <input type="number" name="duration" placeholder="duration" value="{{$course->duration}}">
    @error('duration')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="image"><b>Image:</b></label>
    <input type="file" name="image" placeholder="image">

    <img class="editimage"
     src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}">


    @error('image')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <button class="buttonUpdate" type="submit">Update</button>

</form>
</div>

<a href="/courses/manage">
    <button class="backEdit"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

</x-layout>