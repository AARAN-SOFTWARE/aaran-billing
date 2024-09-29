@props([
    'bg_image' => 'no image',
    'title'=>'Check This',
    'slogan' => 'Check This'
])

<li {{ $attributes->class(['flex flex-col items-center justify-center w-full sm:h-screen h-full shrink-0 snap-start relative']) }}>
    <div style="background-image: url({{$bg_image}});"
         class="w-full md:h-screen h-full sm:bg-cover bg-contain bg-no-repeat mx-auto flex-col brightness-75 flex justify-center relative">
    </div>
    <div
            class="absolute bottom-1 left-10 w-auto h-10/12 flex-col text-white font-roboto p-5 my-5  px-10">
        <div
                class="sm:text-6xl sm:capitalize sm:drop-shadow-lg">
            {{$title}}
        </div>
        <div
                class="sm:text-2xl text-xs mt-3 text-white">
            {{\Illuminate\Support\Str::words($slogan,15)}}
        </div>

    </div>
</li>
