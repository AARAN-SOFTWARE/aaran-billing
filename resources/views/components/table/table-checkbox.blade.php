<div x-data="{ checkAll : false }" class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
    <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
        <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
        <tr>
            <th scope="col" class="p-4">
                <label for="checkAll" class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                    <div class="relative flex items-center">
                        <input type="checkbox" x-model="checkAll" id="checkAll" class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-white before:absolute before:inset-0 checked:border-blue-700 checked:before:bg-blue-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-blue-700 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:checked:border-blue-600 dark:checked:before:bg-blue-600 dark:focus:outline-slate-300 dark:checked:focus:outline-blue-600" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                </label>
            </th>
            <th scope="col" class="p-4">CustomerID</th>
            <th scope="col" class="p-4">Name</th>
            <th scope="col" class="p-4">Email</th>
            <th scope="col" class="p-4">Membership</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
        <tr>
            <td class="p-4">
                <label for="user2335" class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                    <div class="relative flex items-center">
                        <input type="checkbox" id="user2335" class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-white before:absolute before:inset-0 checked:border-blue-700 checked:before:bg-blue-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-blue-700 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:checked:border-blue-600 dark:checked:before:bg-blue-600 dark:focus:outline-slate-300 dark:checked:focus:outline-blue-600" :checked="checkAll" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                </label>
            </td>
            <td class="p-4">2335</td>
            <td class="p-4">Alice Brown</td>
            <td class="p-4">alice.brown@gmail.com</td>
            <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded-xl bg-transparent p-0.5 font-semibold text-blue-700 outline-blue-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-blue-600 dark:outline-blue-600">Edit</button></td>
        </tr>
        <tr>
            <td class="p-4">
                <label for="user2338" class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                    <div class="relative flex items-center">
                        <input type="checkbox" id="user2338" class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-white before:absolute before:inset-0 checked:border-blue-700 checked:before:bg-blue-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-blue-700 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:checked:border-blue-600 dark:checked:before:bg-blue-600 dark:focus:outline-slate-300 dark:checked:focus:outline-blue-600" :checked="checkAll" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                </label>
            </td>
            <td class="p-4">2338</td>
            <td class="p-4">Bob Johnson</td>
            <td class="p-4">johnson.bob@outlook.com</td>
            <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded-xl bg-transparent p-0.5 font-semibold text-blue-700 outline-blue-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-blue-600 dark:outline-blue-600">Edit</button></td>
        </tr>
        <tr>
            <td class="p-4">
                <label for="user2342" class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                    <div class="relative flex items-center">
                        <input type="checkbox" id="user2342" class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-white before:absolute before:inset-0 checked:border-blue-700 checked:before:bg-blue-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-blue-700 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:checked:border-blue-600 dark:checked:before:bg-blue-600 dark:focus:outline-slate-300 dark:checked:focus:outline-blue-600" :checked="checkAll" />
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                </label>
            </td>
            <td class="p-4">2342</td>
            <td class="p-4">Sarah Adams</td>
            <td class="p-4">s.adams@gmail.com</td>
            <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded-xl bg-transparent p-0.5 font-semibold text-blue-700 outline-blue-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-blue-600 dark:outline-blue-600">Edit</button></td>
        </tr>
        </tbody>
    </table>
</div>
