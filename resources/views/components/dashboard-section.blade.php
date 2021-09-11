@if($canaccess)
<div class="rounded-xl overflow-hidden flex shadow hover:shadow-md max-w-sm bg-white cursor-pointer h-28 {{$color}}">
    <div class="text-xs text-primary mb-2 text-sm">
        <a class="flex items-center">
            <x-icon name="{{$icon}}" class="h-20 w-20"/>               
        </a>
    </div>  
    <p class="text-base mb-2 font-bold truncate w-full p-2"><a href="{{$link}}" class="text-xl">{{$text}}</a></p>    
</div>
@endif
