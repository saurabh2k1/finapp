<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Market Cap & Networth
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <span class="text-blue-600"></span>
            <div class="flex flex-row-reverse flex-end">
            @can('create', App\Models\Financial::class)
            <button wire:click="create()" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Create New Record
            </button>
            @endcan
            <div class="p-2">
                <select name="perPage" class="form-select form-select-xs appearance-none  text-sm rounded transition ease-in-out px-2 py-1" wire:model="perPage">
                    <option value="5" selected="selected">5 per page</option>
                    <option value="9">9 per page</option>
                    <option value="12">12 per page</option>
                    <option value="18">18 per page</option>
                    <option value="21">21 per page</option>
                    <option value="24">24 per page</option>
                </select>
              </div>
            @if($isOpen)
                @include('livewire.mcap.create')
            @endif
            </div>
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden shadow-md sm:rounded-lg">
                        <table class="min-w-full">
                          <thead class="bg-gray-900 dark:bg-gray-700">
                            <tr class="text-white dark:text-gray-400">
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">As on quarter ended</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">No of Shares <br>(In Crore)</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Market Price / Share <br> (Rs / Share)</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Market Capitalisation <br> (Rs in Crore)</th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Net worth <br> (Rs in Crore)</th>
                                <th scope="col" class="relative py-3 px-6">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white hover:bg-gray-300">
                              @foreach ($mcaps as $row)
                                  <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->ason_date->format('dS F Y')}}</td>
                                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $row->share_no}}</td>
                                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{  number_format($row->share_price, 2, '.', ',')}}</td>
                                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ number_format($row->mcap, 0, '.', ',')}}</td>
                                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ number_format($row->networth, 0, '.', ',')}}</td>
                                      <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        @can('create', App\Models\Financial::class)
                                        <button wire:click="edit({{ $row->id}})" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                        @endcan
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                        </table>
                        {{ $mcaps->links()}}
                        {{-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>