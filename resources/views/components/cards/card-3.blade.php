@props([
    'list' => null,
])

@foreach($list as $index => $row)
    <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-[25rem] p-2">
        <div class="p-3">
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="h-5 w-5 text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                </svg>
                <h5 class="ml-2 text-slate-800 text-xl font-semibold">
                    {{$row->bank->vname}}
                </h5>
            </div>

            <div class="block text-slate-600 leading-normal font-light mb-2 my-2 space-y-2 ml-8 w-80">
                <span class="text-slate-800 font-merri font-semibold tracking-wider">Recent</span>

                <li>
                    A/C No :
                    <span class="text-gray-800 font-lex">{{ $row->account_no }}</span>
                </li>
                <li>
                    IFSC Code :
                    <span class="text-gray-800 font-lex">{{ $row->ifsc_code }}</span>
                </li>
                <li class="capitalize">
                    Branch :
                    <span class="text-gray-800 font-lex">{{ $row->branch }}</span>
                </li>
                <li>
                    A/C Type :
                    <span class="text-blue-500">{{ $row->account_type_name }}</span>
                </li>

            </div>

            <!-- Copy All Button -->
            <div class="flex justify-end">
                <button @click="
                    const details = `Bank Name: {{ $row->bank_name }}\nA/C No: {{ $row->account_no }}\nIFSC Code: {{ $row->ifsc_code }}\nBranch:
                    {{ $row->branch }}\nA/C Type: {{ $row->account_type_name }}`;
                    navigator.clipboard.writeText(details);"
                        class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="size-5 fill-gray-500">
                        <path fill-rule="evenodd"
                              d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 0 1-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0 1 13.5 1.5H15a3 3 0 0 1 2.663 1.618ZM12 4.5A1.5 1.5 0 0 1 13.5 3H15a1.5 1.5 0 0 1 1.5 1.5H12Z"
                              clip-rule="evenodd"/>
                        <path
                            d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 0 1 9 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0 1 16.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625v-12Z"/>
                        <path
                            d="M10.5 10.5a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963 5.23 5.23 0 0 0-3.434-1.279h-1.875a.375.375 0 0 1-.375-.375V10.5Z"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
@endforeach


