<link rel="stylesheet" href="{{asset('css/courses.css')}}">

<x-layout>



    <form method="POST" action="/lessons/{{$lesson->id}}?course={{$lesson->course_id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <h2>Edit: <a href="/lessons/{{$lesson->id}}">{{$lesson->title}}</a> </h2>
    
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title" value="{{$lesson->title}}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="description">Description:</label>
        <input type="textarea" name="description" placeholder="description" value="{{$lesson->description}}">
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="content">Content:</label>
        <textarea type="text" name="content" placeholder="content">{{$lesson->content}}</textarea>
        @error('content')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="image">Image:</label>
        <input type="file" name="image" placeholder="image">
    
        <img class="image"
         src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">
    
    
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <button type="submit">Update</button>
    
    </form>

</x-layout>