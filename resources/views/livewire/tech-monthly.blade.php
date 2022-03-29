{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Physical Performance - Monthly Parameters
    </h2>
</x-slot> --}}
{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Physical Performance - Daily Parameters
    </h2>
</x-slot> --}}
<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            
            <span class="text-blue-600">Monthly Parameters</span>
          <div class="flex flex-row-reverse flex-end">
            
            
            <button wire:click="create()" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Create New Record
            </button>
            <div class="">
              <select name="plant_filter" class="form-select form-select-xs appearance-none  text-sm rounded transition ease-in-out px-2 py-1" wire:model="plant_filter">
                  <option value="" selected="selected">All</option>
                  <option value="Dahej">Dahej</option>
                  <option value="Kochi">Kochi</option>
               
              </select>
            </div>
            <div class="">
              <select name="perPage" class="form-select form-select-xs appearance-none  text-sm rounded transition ease-in-out px-2 py-1" wire:model="perPage">
                  <option value="5" selected="selected">5 per page</option>
                  <option value="9">9 per page</option>
                  <option value="12">12 per page</option>
                  <option value="18">18 per page</option>
                  <option value="21">21 per page</option>
                  <option value="24">24 per page</option>
              </select>
            </div>
          </div>
            @if($isOpen)
                @include('livewire.techmonthly.create')
            @endif


            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                          <table class="min-w-full">
                            <thead class="bg-gray-900 dark:bg-gray-700">
                              <tr class="text-white dark:text-gray-400">
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Month-Year</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Plant</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">throughput</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">highest sendout in a Day </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">highest truck no in a day</th>
                                
                                {{-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Expense</th> --}}
                                <th scope="col" class="relative py-3 px-6">
                                  <span class="sr-only">Action</span>
                              </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white hover:bg-gray-300">
                              @foreach ($techMonthlies as $tech_monthly)
                              <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ date("F", mktime(0, 0, 0, $tech_monthly->month, 1)) }} - {{ $tech_monthly->year}} </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $tech_monthly->plant }}</td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ number_format($tech_monthly->throughput, 2, '.', ',')}} TBTU</td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ number_format($tech_monthly->highest_sendout, 2, '.', ',')}} MMSCM <br> on {{ $tech_monthly->sendout_date->format('j-F-Y') }}</td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"> {{ $tech_monthly->highest_truck_no }} <br> on {{ $tech_monthly->truckload_date->format('j-F-Y') }}
                                  
                                </td>
                       
                               
                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                  <button wire:click="edit({{ $tech_monthly->id}})" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $techMonthlies->links()}}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>

