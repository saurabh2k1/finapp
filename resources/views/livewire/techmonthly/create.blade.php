<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form action="" class="w-full max-w-lg">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year</label>
                            <select wire:model="year" name="year" id="year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                            </select>
                            @error('year') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="month" class="block text-gray-700 text-sm font-bold mb-2">Month</label>
                            <select wire:model="month" name="month" id="month" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            @error('month') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3">
                            <label for="plant" class="block text-gray-700 text-sm font-bold mb-2">Plant</label>
                            <select wire:model="plant" name="plant" id="plant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="Dahej">Dahej</option>
                                <option value="Kochi">Kochi</option>
                            </select>
                            @error('plant') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="throughput" class="block text-gray-700 text-sm font-bold mb-2">Throughput (TBTU)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="throughput" placeholder="Enter throughput value" wire:model="throughput">
                            @error('throughput') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="highest_sendout" class="block text-gray-700 text-sm font-bold mb-2">Highest Sendout (MMSCM)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="highest_sendout" placeholder="Enter highest_sendout value " wire:model="highest_sendout">
                            @error('highest_sendout') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="sendout_date" class="block text-gray-700 text-sm font-bold mb-2">Highest Sendout Date</label>
                            <input wire:model="sendout_date" id="sendout_date" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                            @error('sendout_date') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="highest_truck_no" class="block text-gray-700 text-sm font-bold mb-2">Highest Truck Load No</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="highest_truck_no" placeholder="Enter highest_truck_no value " wire:model="highest_truck_no">
                            @error('highest_truck_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="truckload_date" class="block text-gray-700 text-sm font-bold mb-2">Highest Truck Load Date</label>
                            <input wire:model="truckload_date" id="truckload_date" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                            @error('truckload_date') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
            <script>
                document.addEventListener('livewire:load', function () {
                    
                        $('#sendout_date').on('dp.change', function (e) {
                    
                            @this.set('sendout_date', e.target.value);
                        });
                });  
          </script> 


        </div>
    </div>
</div>