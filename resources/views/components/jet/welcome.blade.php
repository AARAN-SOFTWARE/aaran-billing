<div>
    <div class="text-gray-800 font-inter">
        <main class="min-h-screen transition-all main">
            <button type="button" class="sidebar-toggle"></button>
            <div class="sidebar-overlay"></div>
            {{$slot}}
        </main>
        <x-web.dashboard.style/>
        <x-web.dashboard.script/>
    </div>
</div>
