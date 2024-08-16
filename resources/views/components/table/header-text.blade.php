@props([
    'fill' => 'question-circle',
    'display' => 'hidden',
    'left' => false,
    'center' => false,
    'right' => false,
])
<th scope="col" {{$attributes->class(['p-4 border-r border-neutral-300', 'text-left'=>$left,
    'text-center'=>$center,
    'text-right'=>$right,
    ])}}>

    <div class="inline-flex items-center gap-x-1">
        <span>{{$slot}}</span><span><button><x-icons.icon-fill :iconfill="$fill" :width="'16px'"
           :height="'16px'" class="mt-1.5 {{$display}}" /></button></span>
    </div>
</th>
