@props([
'transactions' => [],
])
<div class="sm:w-4/12 w-auto h-auto bg-white p-5 rounded-lg border-t-2 border-[#23B7E5] hover:shadow-md">

    <div class="flex justify-between">
        <div class="space-y-2">
            <div class="flex-col gap-1 font-semibold">
                <div class="text-md ">Sales</div>
                <div class="text-2xl text-[#23B7E5]">{{$transactions['total_sales']}}</div>
            </div>
            <div class="flex-col flex gap-1 font-semibold">
                <span class="text-xs text-gray-500 ">this month</span>
                <span class="text-[#23B7E5] text-sm ">{{$transactions['month_sales']}}</span>
            </div>
        </div>

        <div class="w-16 h-16 mr-5 mt-1">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" class="">
                <circle style="fill:#23B7E5;" cx="256" cy="256" r="256" />
                <path style="fill:#1EA8A4;" d="M258.008,511.974c125.381-0.965,229.297-92.051,250.165-211.687l-184.52-184.518l-12.812-0.228
                                l-48.042,2.234l24.35,24.35L198.42,202.44l-63.371,49.138l108.785,108.785l-102.472,34.964L258.008,511.974z" />
                <polygon style="fill:#FFC61B;" points="289.618,197.653 289.618,247.072 215.49,247.072 215.49,296.489 141.362,296.489
                                141.362,395.328 215.49,395.328 289.618,395.328 363.746,395.328 363.746,197.653 " />
                <rect x="141.36" y="296.495" style="fill:#F9B54C;" width="74.128" height="98.832" />
                <rect x="178.717" y="296.495" style="fill:#F4A200;" width="36.776" height="98.832" />
                <rect x="215.488" y="247.07" style="fill:#DD9007;" width="74.128" height="148.256" />
                <rect x="253.707" y="247.07" style="fill:#D18600;" width="35.914" height="148.256" />
                <rect x="289.616" y="197.646" style="fill:#F9B54C;" width="74.128" height="197.68" />
                <rect x="327.404" y="197.646" style="fill:#F4A200;" width="36.34" height="197.68" />
                <path style="fill:#324A5E;" d="M319.104,113.295l-48.809-7.73c-4.222-0.681-8.206,2.215-8.875,6.447
                                c-0.669,4.232,2.217,8.206,6.447,8.875l30.127,4.772l-161.14,115.098c-3.486,2.491-4.294,7.335-1.805,10.821
                                c1.515,2.12,3.899,3.25,6.32,3.25c1.56,0,3.136-0.469,4.501-1.445l161.458-115.326l-4.83,30.494
                                c-0.671,4.232,2.217,8.206,6.447,8.875c0.41,0.066,0.821,0.098,1.224,0.098c3.75,0,7.047-2.725,7.651-6.546l7.73-48.809
                                C326.222,117.938,323.334,113.964,319.104,113.295z" />
                <path style="fill:#2B3B4E;" d="M134.835,251.208c0.078,0.122,0.128,0.253,0.212,0.371c1.515,2.12,3.899,3.25,6.32,3.25
                                c1.56,0,3.136-0.469,4.501-1.445l161.458-115.326l-4.83,30.494c-0.671,4.232,2.217,8.206,6.447,8.875
                                c0.41,0.066,0.821,0.098,1.224,0.098c3.75,0,7.047-2.725,7.651-6.546l7.73-48.809c0.334-2.108-0.217-4.151-1.374-5.754
                                L134.835,251.208z" />
            </svg>
        </div>
    </div>

    <div class="pt-5">
        <div>
            <h2>Monthly Sales Totals</h2>

            @if($monthlyTotals->isEmpty())
            <p>No sales data available for this company.</p>
            @else
            <canvas id="myChart" style="width:100%; max-width:600px;"></canvas>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var xValues = @json($monthlyTotals -> pluck('month')); // Get months dynamically
                    var yValues = @json($monthlyTotals -> pluck('total')); // Get totals dynamically

                    var barColors = Array(xValues.length).fill("#23B7E5"); // Set color for each bar

                    new Chart("myChart", {
                        type: "bar"
                        , data: {
                            labels: xValues.map(month => monthNames[month - 1]), // Convert month numbers to names
                            datasets: [{
                                data: yValues
                                , backgroundColor: barColors
                            , }]
                        }
                        , options: {
                            legend: {
                                display: false
                            }
                            , scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });

                // Month names for better readability
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            </script>
            @endif
        </div>

    </div>
</div>
