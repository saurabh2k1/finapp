<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Users Management
    </h2>
</x-slot>
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <button wire:click="create()" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Create New Record
            </button> 
            <div class="sort-item product">
                <select name="perPage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="perPage">
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
                @include('auth.register1')
            @endif
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                      <table class="min-w-full">
                        <thead class="bg-gray-900 dark:bg-gray-700">
                          <tr class="text-white dark:text-gray-400">
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase"></th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Name</th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Email</th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase">Role</th>
                            {{-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Expense</th> --}}
                            <th scope="col" class="relative py-3 px-6">
                              <span class="sr-only">Action</span>
                          </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white hover:bg-gray-300">
                          @foreach ($users as $user)
                          <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="Profile Photo"></td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $user->name}}</td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">{{ $user->email}}</td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"><span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $user->role}}</span></td>
                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                              <button wire:click="edit({{ $user->id}})" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $users->links()}}
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
