<link rel="stylesheet" href="{{asset('css/lessons/edit.css')}}">

<x-layout>
    <div class="mainEdit">
        

    <form method="POST" action="/lessons/{{$lesson->id}}?course={{$lesson->course_id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <h2>Edit:<a href="/lessons/{{$lesson->id}}" style="text-decoration: none; color:black;">
            {{$lesson->title}}
                </a> 
         </h2>
    
        <label for="title"><b>Title:</b></label>
        <input type="text" name="title" placeholder="title" value="{{$lesson->title}}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="description"><b>Description:</b></label>
        <input type="textarea" name="description" placeholder="description" value="{{$lesson->description}}">
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="content"><b>Content:</b></label>
        <textarea type="text" name="content" placeholder="content">{{$lesson->content}}</textarea>
        @error('content')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <label for="image"><b>Image:</b></label>
        <input type="file" name="image" placeholder="image">
    
        <img class="imageEdit"
         src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">
    
    
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
    
        <br> <br>
    
        <button class="buttonEdit" type="submit">Update</button>
    
    </form>


</div>

<a href="/lessons/manage?course={{request('course')}}">
    <button class="backEdit"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>
</x-layout>