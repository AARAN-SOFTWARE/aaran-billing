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
    <div>
        <div x-data="dragDrop()" class="w-full max-w-4xl mx-auto">
            <h3 class="text-lg font-bold mb-2">Drag and Drop Items</h3>
            <div class="flex space-x-4">
                <ul class="bg-white border rounded-lg p-4 space-y-2 flex-1" @dragover.prevent @drop="drop($event, 'from')">
                    <h4 class="font-semibold">Container 1</h4>
                    <template x-for="item in itemsFrom" :key="item">
                        <li class="draggable bg-gray-200 p-2 rounded cursor-pointer"
                            draggable="true"
                            @dragstart="startDrag($event, item)"
                            @dragend="endDrag($event)"
                            x-bind:class="{ 'dragging': draggingItem === item }"
                            x-text="item"></li>
                    </template>
                </ul>
                <ul class="bg-white border rounded-lg p-4 space-y-2 flex-1" @dragover.prevent @drop="drop($event, 'to')">
                    <h4 class="font-semibold">Container 2</h4>
                    <template x-for="item in itemsTo" :key="item">
                        <li class="draggable bg-gray-200 p-2 rounded cursor-pointer"
                            draggable="true"
                            @dragstart="startDrag($event, item)"
                            @dragend="endDrag($event)"
                            x-bind:class="{ 'dragging': draggingItem === item }"
                            x-text="item"></li>
                    </template>
                </ul>
            </div>
        </div>

        <script>
            function dragDrop() {
                return {
                    itemsFrom: ['Item 1', 'Item 2', 'Item 3'],
                    itemsTo: ['Item 4', 'Item 5'],
                    draggingItem: null,

                    startDrag(event, item) {
                        this.draggingItem = item;
                        event.dataTransfer.effectAllowed = 'move';
                        event.dataTransfer.setData('text/plain', item);
                    },

                    endDrag(event) {
                        this.draggingItem = null;
                    },

                    drop(event, target) {
                        const itemText = event.dataTransfer.getData('text/plain');
                        const draggingFromContainer = this.itemsFrom.includes(itemText);
                        const targetContainer = target === 'from' ? this.itemsFrom : this.itemsTo;

                        if (targetContainer.includes(itemText)) {
                            // Rearranging within the same container
                            const targetItem = event.target.closest('li');
                            if (targetItem) {
                                const targetIndex = targetContainer.indexOf(targetItem.innerText);
                                const draggingIndex = targetContainer.indexOf(itemText);
                                if (targetIndex !== draggingIndex) {
                                    // Remove the dragging item from its original position
                                    if (draggingFromContainer) {
                                        this.itemsFrom.splice(draggingIndex, 1);
                                        this.itemsFrom.splice(targetIndex, 0, itemText);
                                    } else {
                                        this.itemsTo.splice(draggingIndex, 1);
                                        this.itemsTo.splice(targetIndex, 0, itemText);
                                    }
                                }
                            }
                        } else {
                            // Moving to a different container
                            if (draggingFromContainer) {
                                this.itemsFrom = this.itemsFrom.filter(i => i !== itemText);
                                this.itemsTo.push(itemText);
                            } else {
                                this.itemsTo = this.itemsTo.filter(i => i !== itemText);
                                this.itemsFrom.push(itemText);
                            }
                        }
                    }
                };
            }
        </script>
    </div>
</div>
