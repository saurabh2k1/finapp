@push('css')
<style>
input:checked ~ .dot {
    transform: translateX(100%);
    background-color: #48bb78;
  }
  
  /* Toggle B */
  input:checked ~ .dot {
    transform: translateX(100%);
    background-color: #48bb78;
  }
  </style>
@endpush
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
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                            <label for="csvFile" class="block text-gray-700 text-sm font-bold mb-2">CSV File Upload</label>
                            <input wire:model="csvFile" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="csvFile" id="csvFile" type="file">
                            @error('tdate') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    {{-- </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <label for="toggle-example" class="flex relative items-center mb-4 cursor-pointer">
                            <input type="checkbox" id="toggle-example" class="sr-only">
                            <div class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">File contains header row?</span>
                        </label>
                        
                    </div> --}}
                    <div class="flex -mx-3 mb-6">--</div>
                    <div class="flex -mx-3 mb-6">
                        <button wire:click.prevent="templateDownload()" type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Download Template</button>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="bulkUpload()" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeBulk()" type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>



        </div>
    </div>
</div>