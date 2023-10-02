<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="">
        <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ __("You're logged in!") }}
            </div>
              <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
          </div>
    </div>
    <div class="flex flex-row gap-4">
        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-3">
            <div class="flex items-center">
                <div class="flex justify-center items-center">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Your team's progress</h5>
                <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                </svg>
                <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    <div class="p-3 space-y-2">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                        <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                        <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                        <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                </div>
            </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
            <div class="grid grid-cols-3 gap-3 mb-2">
                <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                <dt id="pendingdata" class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Pending</dd>
                </dl>
                <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                <dt id="rfi" class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">R.F.I</dd>
                </dl>
                <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                <dt id="total" class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1"></dt>
                <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Total Count</dd>
                </dl>
            </div>
            <div id="more-details" class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                <dl class="flex items-center justify-between">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average task completion rate:</dt>
                <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg> 57%
                </dd>
                </dl>
                <dl class="flex items-center justify-between">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until sprint ends:</dt>
                <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">13 days</dd>
                </dl>
                <dl class="flex items-center justify-between">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Next meeting:</dt>
                <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">Thursday</dd>
                </dl>
            </div>
            </div>

            <!-- Radial Chart -->
            <div class="py-6" id="radial-chart"></div>

            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            <div class="flex justify-between items-center pt-5">
                <!-- Button -->
               <span> As of today {{ \Carbon\Carbon::parse()->now()->format('M d Y'); }}</span>
            </div>
            </div>
        </div>

        <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
            <div>
                <h5 id="finalcount" class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"></h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Inventory Level this week</p>
            </div>
            <div
                id="percent"
                class=" flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
            </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            </div>
        </div>




    </div>



</x-app-layout>

<script>
        // ApexCharts options and config
        window.addEventListener("load", function() {
            let inventories = {!! json_encode($inventories , JSON_HEX_TAG) !!};
            const cars = {!! json_encode($cars , JSON_HEX_TAG) !!};
    // console.log(cars);
            let total = 0
            for(const x in cars){
                total++;
            }

            console.log( 10 - inventories.length );

            if(inventories.length >= 7){
                return 0;
            }
            else{
                size = 7 - inventories.length;
                for (let index = 0; index < size ; index++) {
                    // console.log(index);
                        inventories.push({totalcount: 0, updated_at: "no-date"})

                }
            }

            let lastcount = inventories[6]['totalcount'];
            let finalcount = 0;
            for (let index = 0; index < 6 ; index++) {
                    finalcount += inventories[index]['totalcount']
            }
            let totalinvpercadd  = (Math.round((finalcount/total*100)* 100) / 100).toFixed(0);
            console.log(totalinvpercadd);

            const percent = $("#percent");
                  percent.html(totalinvpercadd + "  %");
            const finalcounttext = $("#finalcount");
                  finalcounttext.html(finalcount);

            let options = {
                chart: {
                height: "110%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
                },
                tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
                },
                fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
                },
                dataLabels: {
                enabled: false,
                },
                stroke: {
                width: 6,
                },
                grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
                },
                series: [
                {
                    name: "New Inventories",
                    data: [inventories[6]['totalcount'],inventories[5]['totalcount'],inventories[4]['totalcount'],inventories[3]['totalcount'],inventories[2]['totalcount'],inventories[1]['totalcount'],inventories[0]['totalcount'],],
                    color: "#1A56DB",
                },
                ],
                xaxis: {
                categories: [ inventories[6]['updated_at'],inventories[5]['updated_at'],inventories[4]['updated_at'],inventories[3]['updated_at'],inventories[2]['updated_at'], inventories[1]['updated_at'], inventories[0]['updated_at'],],
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                },
                yaxis: {
                show: false,
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }
            });

            const cars = {!! json_encode($cars , JSON_HEX_TAG) !!};
            // console.log(cars);
            let total = 0
            let passed = 0;
            let pending = 0;
            for(const x in cars){
                total++;
                if(cars[x].havebeenpassed==1){
                    passed++;
                }
                else if(cars[x].havebeenpassed==0){
                    pending++;
                }
            }

            var pendingdata = $("#pendingdata");
                pendingdata.text(pending);
            var rfi = $("#rfi");
                rfi.text(passed);
            var totalcount = $("#total");
                totalcount.text(total);

            let totalpassed = (Math.round((passed/total*100)* 100) / 100).toFixed(2);
            let totalpending = (Math.round((pending/total*100)* 100) / 100).toFixed(2);
            // console.log(passed);


    // ApexCharts options and config
            window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [100, totalpassed, totalpending],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                    chart: {
                    height: "1200px",
                    width: "100%",
                    type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                    },
                    plotOptions: {
                    radialBar: {
                        track: {
                        background: '#E5E7EB',
                        },
                        dataLabels: {
                        show: false,
                        },
                        hollow: {
                        margin: 0,
                        size: "32%",
                        }
                    },
                    },
                    grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -23,
                        bottom: -20,
                    },
                    },
                    labels: ["Total", "R.F.I", "Pending"],
                    legend: {
                    show: true,
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    },
                    tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                    },
                    yaxis: {
                    show: false,
                    labels: {
                        formatter: function (value) {
                        return value + '%';
                        }
                    }
                    }
                }
                }

                if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
                var chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
                chart.render();
                }
            });
  </script>
