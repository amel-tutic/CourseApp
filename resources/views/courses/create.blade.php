<link rel="stylesheet" href="/css/create.css">

<x-layout>
<form method="POST" action="/courses">
    @csrf

    <h2>Create a new Course</h2>

    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="title">
    @error('title')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="description">Description:</label>
    <input type="textarea" name="description" placeholder="description">
    @error('description')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="tags">Tags (Comma seperated):</label>
    <input type="text" name="tags" placeholder="tags">
    @error('tags')
        <p class="error">{{$message}}</p>
    @enderror

    <br> <br>

    <label for="duration">Duration:</label>
    <input type="number" name="duration" placeholder="duration">
    @error('duration')
        <p class="error">{{$message}}</p>
    @enderror

    <button type="submit">Create</button>

</form>
</x-layout>