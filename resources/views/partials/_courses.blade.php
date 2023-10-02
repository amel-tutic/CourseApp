<link rel="stylesheet" href="{{asset('css/home/courses.css')}}">

<div class="headingCourses">
<h1>Most recent courses</h1>
</div>

<div class="mainCourses">

<div class="newCourses">
    
    @foreach($courses as $course)

        @php
            $isnew = $course->created_at->diffInDays(now()) >= 7;

          
        @endphp

        @if (!$isnew)
            <div class="courseCard">

                <img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" style="width: 15em">

                <h3>{{$course->title}}</h3>

                <p>{{$course->description}}</p>

                @auth
                @if(auth()->user()->role == 'student')
                <form class="enrollbutton" method="POST" action="/enroll?course={{$course->id}}&userid={{auth()->user()->id}}">
                @csrf
                <button>Enroll</button>    
                </form>
                @endif
                @endauth
                
            </div>
        @endif

    @endforeach

</div>
</div>