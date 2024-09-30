<div class="bg-white">

    <x-slot name="header">Show</x-slot>
    <div class="w-7/12 mx-auto ">

        <div class="w-full h-auto flex flex-col my-14 gap-5">

            <div class="text-6xl capitalize">
                {{$blog->vname}}
            </div>

            <div class="text-gray-500 uppercase">
                <span>{{ \Aaran\Blog\Models\Post::type($blog->blogcategory_id)}}</span>
                <span>| {{\Aaran\Blog\Models\Post::tagName($blog->blogtag_id)}}</span>
                <span class="uppercase">| {{$blog->visibility==0?'Private':'Public'}}</span>
            </div>

            <img
                src="{{URL(\Illuminate\Support\Facades\Storage::url('/images/'.$blog->image))}}"
                alt="{{$blog->image}}" class="h-[35rem] w-full"/>


            <div class="text-gray-500 inline-flex ">
                <div class="flex gap-1.5 justify-center ">
                    <x-icons.icon :icon="'clock'" class="w-5 h-5"/>
                    <span>{{ $blog->created_at->diffForHumans() }} |</span>
                </div>
                <span>&nbsp;By,{{ $blog->user->name }}</span>

            </div>

            <div class="text-gray-700">
                {{$blog->body}}
            </div>
        </div>


    </div>

</div>
