<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form action="" class="w-full max-w-lg">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year</label>
                            <select wire:model="year" name="year" id="year" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="2021-22">2021-22</option>
                                <option value="2020-21">2020-21</option>
                            </select>
                            @error('year') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="Quater / Year" class="block text-gray-700 text-sm font-bold mb-2">Quater</label>
                            <select wire:model="qtr" name="qtr" id="qtr" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                                <option value="">--Select--</option>
                                <option value="Q1">Q1</option>
                                <option value="Q2">Q2</option>
                                <option value="Q3">Q3</option>
                                <option value="Q4">Q4</option>
                                <option value="H1">H1</option>
                                <option value="H2">H2</option>
                                <option value="full">full year</option>
                            </select>
                            @error('qtr') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="PAT" class="block text-gray-700 text-sm font-bold mb-2">PAT (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="PAT" placeholder="Enter PAT value in INR" wire:model="PAT">
                            @error('PAT') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="PBT" class="block text-gray-700 text-sm font-bold mb-2">PBT (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="PBT" placeholder="Enter PBT value in INR" wire:model="PBT">
                            @error('PBT') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="EBITDA" class="block text-gray-700 text-sm font-bold mb-2">EBITDA (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="EBITDA" placeholder="Enter EBITDA value in INR" wire:model="EBITDA">
                            @error('EBITDA') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="revenue" class="block text-gray-700 text-sm font-bold mb-2">Revenue (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="revenue" placeholder="Enter revenue value in INR" wire:model="revenue">
                            @error('revenue') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="margin" class="block text-gray-700 text-sm font-bold mb-2">Gross Margin (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="margin" placeholder="Enter margin value in INR" wire:model="margin">
                            @error('margin') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="expense" class="block text-gray-700 text-sm font-bold mb-2">Expense (in INR)</label>
                            <input type="text" class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expense" placeholder="Enter expense value in INR" wire:model="expense">
                            @error('expense') <span class="text-red-500">{{ $message }}</span>@enderror
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