
<div
    class="w-full divide-y divide-slate-300 overflow-hidden rounded-xl border border-slate-300 bg-slate-100/40 text-slate-700 dark:divide-slate-700 dark:border-slate-700 dark:bg-slate-800/50 dark:text-slate-300">
    <div x-data="{ isExpanded: false }" class="divide-y divide-slate-300 dark:divide-slate-700">
       <x-accordion.button :title="'hello'"/>
        <x-accordion.item :content="'this is an accordion'"/>
    </div>
</div>
