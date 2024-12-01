@props([
    'list' => null
])
<div class="w-10/12 mx-auto">
    @foreach($list as $row)

        <!-- Vertical Timeline #3 -->
        <div
            class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem]
        md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
            <!-- Item #1 -->
            <div class="relative">
                <div class="md:flex items-center md:space-x-4 mb-3">
                    <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                        <!-- Icon -->
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                            <svg class="fill-emerald-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                <path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"/>
                            </svg>
                        </div>
                        <!-- Date -->
                        <time
                            class="text-sm font-medium text-indigo-500 md:w-28">{{date('M d, Y', strtotime($row->created_at))}}</time>
                    </div>
                    <!-- Title -->
                    <div class="text-slate-500 ml-14"><span class="text-slate-900 font-bold">{{$row->vname}}</span>
                        <span class="text-blue-500 text-sm"> @  {{$row->user->name}}</span>
                    </div>
                </div>
                <!-- Card -->

                <div class="text-slate-500 ml-14 md:ml-44">
                    <a href="{{ route('logs',[$row->id]) }}">
                        {{$row->description}}
                    </a>
                </div>
            </div>

        </div>
        <!-- End: Vertical Timeline #3 -->
    @endforeach

</div>

