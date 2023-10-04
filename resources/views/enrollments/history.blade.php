 <link rel="stylesheet" href="{{asset('css/enrollments/history.css')}}">

<x-layout>
        <div class="mainHistory">   
            <div class="infoHistory">

            <h1>History of my courses</h1>
        

        <table>
            <tbody>
            @unless ($history->isEmpty()) 
            @foreach ($history as $record)
                
                <tr>
    
                    @foreach ($courses as $course)
    
                        @if ($course->id == $record->course_id)
                        <td style="padding: 2em;">
                            <a href="/courses/{{$course->id}}" style="text-decoration:none; color:black; font-size:larger;">
                            {{$course->title}}
                            </a>
                        </td>
                                                             
                        @endif
                    
                    @endforeach
                </tr>
    
            @endforeach
            
            @else
            <tr>
                <h2>You have not finished any courses yet!</h2>
            </tr>
            @endunless
        </tbody>
        </table>
    

        <div class="buttonHistory" style="margin-top: 2em;">
        <a href="/courses"><button style="background-color: #192d2e; color:white; padding:0.5em;">Find more courses!</button></a>
         </div>
    <a href="/enroll/manage?userid={{auth()->user()->id}}"><button class="backHistory"><i class="fa-solid fa-arrow-left"></i> Back</button></a>

</div>
</div>
</x-layout>