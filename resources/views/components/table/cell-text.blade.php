@props([
    'left' => false,
    'center' => false,
    'right' => false,
])
<td {{$attributes->class(['p-4 border-r border-neutral-300', 'text-left'=>$left,
    'text-center'=>$center,
    'text-right'=>$right,])}}>
    {{$slot}}
</td>
