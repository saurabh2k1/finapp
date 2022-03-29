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
                            <label for="tdate" class="block text-gray-700 text-sm font-bold mb-2">Reporting Date</label>
                            <input wire:model="tdate" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                            @error('tdate') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="plant" class="block text-gray-700 text-sm font-bold mb-2">Plant</label>
                            <select wire:model="plant" name="plant" id="plant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="Dahej">Dahej</option>
                                <option value="Kochi">Kochi</option>
                            </select>
                            @error('plant') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="capacity_utilisation" class="block text-gray-700 text-sm font-bold mb-2">Capacity Utilisation (%)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="capacity_utilisation" placeholder="Enter capacity_utilisation value" wire:model="capacity_utilisation">
                            @error('capacity_utilisation') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="power_consumption" class="block text-gray-700 text-sm font-bold mb-2">Specific Power Consumption (kWh/MMBTU)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="power_consumption" placeholder="Enter power_consumption value " wire:model="power_consumption">
                            @error('power_consumption') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="longterm_cargo_unloaded" class="block text-gray-700 text-sm font-bold mb-2">Longterm Cargo Unloaded</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="longterm_cargo_unloaded" placeholder="Enter longterm_cargo_unloaded value " wire:model="longterm_cargo_unloaded">
                            @error('longterm_cargo_unloaded') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="spot_cargo_unloaded" class="block text-gray-700 text-sm font-bold mb-2">Spot Cargo Unloaded</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="spot_cargo_unloaded" placeholder="Enter spot_cargo_unloaded value " wire:model="spot_cargo_unloaded">
                            @error('spot_cargo_unloaded') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="service_cargo_unloaded" class="block text-gray-700 text-sm font-bold mb-2">Service Cargo Unloaded </label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="service_cargo_unloaded" placeholder="Enter service_cargo_unloaded value in INR" wire:model="service_cargo_unloaded">
                            @error('service_cargo_unloaded') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="C2C3_throughput" class="block text-gray-700 text-sm font-bold mb-2">C2C3 Throughput (MT) </label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="C2C3_throughput" placeholder="Enter C2C3_throughput value in INR" wire:model="C2C3_throughput">
                            @error('C2C3_throughput') <span class="text-red-500">{{ $message }}</span>@enderror
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



        </div>
    </div>
</div>