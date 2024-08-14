@props([
    'content' => ''
])
<div x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne"
     x-collapse>
    <div class="p-4 text-sm sm:text-base text-pretty">
       {{$content}}
        {{--                Check our <a href="#" class="underline underline-offset-2 text-blue-700 dark:text-blue-600">documentation</a> for additional information.--}}
    </div>
</div>
