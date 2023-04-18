<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role index</a>
                </div>
                <div class="flex flex-col">
                   
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf
                        <div class="space-y-12">
                            

                            <div class="border-b border-gray-900/10 pb-12">                                 

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <!-- <div class="sm:col-span-6 pt-5"> -->
                                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Create</button>
                                    <!-- </div> -->

                                    
                                </div>
                            </div>

                            
                        </div>

                        
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>