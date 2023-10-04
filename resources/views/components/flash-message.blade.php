<link rel="stylesheet" href="/css/layout.css">

@if(session()->has('message'))
<div class="flashDiv">
    <div class="flash-message" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="background-color:#b0d0ef;">
        <p class="flash-p" style="color:black;">
            {{session('message')}}
        </p>
    </div>
</div>
@endif