<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Technical Performance
    </h2>
</x-slot>
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <span class="text-blue-600">Technical Performance</span>
            <div class="flex flex-row-reverse flex-end">
                @can('create', App\Models\TechDaily::class)
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
            </div>
            <div class="my-1 px-1 w-full overflow-hidden lg:w-1/2">
               @if ($isOpen)
                <form action="" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <label for="period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Period</label>
                        <input wire:model="period" type="text" id="period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Period" required>
                    </div>
                    <div>
                        <label for="throughput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Throughput</label>
                        <input wire:model="throughput" type="text" id="throughput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Throughput in TBTU" required>
                    </div>
                        <button wire:click.prevent="store()" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{ $Data_id? 'Update': 'Create'}}</button>
                        <button wire:click.prevent="closeModal()" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Close</button>
                    </div>
                </form> 
               @endif
                
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                      <table class="min-w-full">
                        <thead class="bg-gray-900 dark:bg-gray-700">
                          <tr class="text-white dark:text-gray-400">
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">S. No.</th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Period</th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Throughput</th>
                            {{-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Role</th> --}}
                            {{-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Expense</th> --}}
                            <th scope="col" class="relative py-3 px-6">
                              <span class="sr-only">Action</span>
                          </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white hover:bg-gray-300">
                          @foreach ($techPerformances as $tech)
                          <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->index+1}}</td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $tech->period }}</td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $tech->throughput}}</td>
                            {{-- <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"><span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $user->role}}</span></td> --}}
                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                @can('create', App\Models\TechDaily::class)
                                <button wire:click="edit({{ $tech->id}})" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $techPerformances->links()}}
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
