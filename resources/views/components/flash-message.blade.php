<link rel="stylesheet" href="/css/layout.css">

@if(session()->has('message'))
    <div class="flash-message" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <p class="flash-p">
            {{session('message')}}
        </p>
    </div>
@endif