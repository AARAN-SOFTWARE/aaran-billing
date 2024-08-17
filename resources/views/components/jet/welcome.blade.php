<div>

    <div class="text-gray-800 font-inter">
        <main class="w-full  min-h-screen transition-all main">
            <button type="button" class="sidebar-toggle"></button>
            <div class="sidebar-overlay"></div>
            <div class="p-6">
                <x-web.dashboard.cards />
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 py-6">
                    <x-web.dashboard.statistics/>
                    <x-web.dashboard.earnings/>
                </div>
            </div>
        </main>

        <!-- Style & Script -->
        <x-web.dashboard.style/>
        <x-web.dashboard.script/>
    </div>
</div>
