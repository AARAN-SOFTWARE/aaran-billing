@props([
    'list' => null,
])

@foreach($list as $index=>$row)
    <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-[25rem] p-2">
        <div class="p-3">
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="h-5 w-5 text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                </svg>
                <div class="w-full flex justify-between">
                    <h5 class="ml-2 text-slate-800 text-xl font-semibold">
                        {{$row->bank_name}}
                    </h5>
                    <div>This Year :
                        <span>25000</span>
                    </div>
                </div>
            </div>

            <div class="block text-slate-600 leading-normal font-light my-2 ">
                Current Bal :
                <span class="text-teal-400">20555</span>
            </div>

            <div class="text-slate-600 leading-normal font-light">
                This Month :
                <span class="text-teal-400 ">20555</span>
            </div>


            <div class="block text-slate-600 leading-normal font-light mb-2 my-3">

                <div class="bg-gray-50 w-full overflow-hidden rounded-md border">
                    <table class="w-full text-xs text-center">
                        <tr class="bg-zinc-50 border-b">
                            <th class="py-2 border-r">Date</th>
                            <th class="border-r">A/C name</th>
                            <th class="border-r">O/P Bal</th>
                            <th class="border-r">Receipt</th>
                            <th>
                                <x-icons.icon :icon="'chevrons-up'" class="w-4 h-4"/>
                            </th>
                        </tr>
                        <tr class="bg-white hover:bg-teal-50">
                            <td class="py-2 border-r ">{{date('d-m-Y',strtotime($row->opening_date))}}</td>
                            <td class="border-r">{{ $row->vname}}</td>
                            <td class="border-r">{{ $row->opening_balance }}</td>
                            <td class="border-r">Fugit?</td>
                            <td>
                                <x-icons.icon :icon="'chevrons-down'" class="w-4 h-4"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="w-full flex justify-between">
                <a href="#" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                    View All
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <div>
                    <x-icons.icon :icon="'cog'" class="w-4 h-4"/>
                </div>
            </div>
        </div>

    </div>
@endforeach