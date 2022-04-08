<div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
    {{-- <select wire:model="fYear" wire:onchange="changeYear($event.target.value)" >
        <option value=""> -- Select Year -- </option>
        @foreach ($years as $year)
            <option value="{{$year}}">{{$year}}</option>
        @endforeach
    </select> --}}
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="rounded-lg border shadow-md p-4 sm:p-8 bg-white  dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center space-x-4 py-2">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                       Market Cap 
                    </p>
                    <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                        As on {{$mcap_date->format('dS F Y')}} 
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    {{ number_format($mcap, 0, '.', ',')}} Cr 
                </div>
            </div>
          
        </div>
        <div class="rounded-lg border shadow-md p-4 sm:p-8 bg-white  dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center space-x-4 py-2">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                       Networth
                    </p>
                    <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                        As on {{$mcap_date->format('dS F Y')}} 
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    {{ number_format($networth, 0, '.', ',')}} Cr 
                </div>
            </div>
          
        </div>
        <div class="rounded-lg border shadow-md p-4 sm:p-8 bg-white  dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center space-x-4 py-2">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                       Throughput 
                    </p>
                    <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                        upto 31st December, 2021
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    657 TBTU 
                </div>
            </div>
          
        </div>
    </div>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $multiColumnChart->reactiveKey() }}"
                :column-chart-model="$multiColumnChart"
            />
        </div>
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $multiColumnRevenueChart->reactiveKey() }}"
                :column-chart-model="$multiColumnRevenueChart"
            />
        </div>
        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-column-chart
                key="{{ $multiColumnExpenseChart->reactiveKey() }}"
                :column-chart-model="$multiColumnExpenseChart"
            />
        </div>
        {{-- <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-line-chart
                key="{{ $PBTChartModel->reactiveKey() }}"
                :line-chart-model="$PBTChartModel"
            />
        </div> --}}
        <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Financial Results</h5>
                <a href="https://petronetlng.in/audited-fin-result.php" target="_blank" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </a>
           </div>
           <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   <a href="https://petronetlng.in/PDF/FRQ32122.pdf" target="_blank"> Quarter 3 </a>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Ended 31st Dec 2021
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="https://petronetlng.in/PDF/FRQ32122.pdf" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500"> Open </a>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   <a href="https://petronetlng.in/PDF/2398_001_101121.pdf" target="_blank" class=""> Quarter 2 </a>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Ended 30th Sept 2021
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="https://petronetlng.in/PDF/2398_001_101121.pdf" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500"> Open </a>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   <a href="https://petronetlng.in/PDF/Financial%20Results%20Q1'21-22(Fin).pdf" target="_blank"> Quarter 1 </a>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Ended 30th June 2021
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="https://petronetlng.in/PDF/Financial%20Results%20Q1'21-22(Fin).pdf" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500"> Open </a>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   <a href="https://petronetlng.in/PDF/AFR31032021_F.pdf" target="_blank"> Quarter 4 & Year </a>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Ended 31st March 2021
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="https://petronetlng.in/PDF/AFR31032021_F.pdf" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500"> Open </a>
                            </div>
                        </div>
                    </li>
                </ul>
           </div>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        {{-- <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
            <livewire:livewire-line-chart
                key="{{ $RevenueChartModel->reactiveKey() }}"
                :line-chart-model="$RevenueChartModel"
            />
        </div> --}}

    </div>
    
</div>
