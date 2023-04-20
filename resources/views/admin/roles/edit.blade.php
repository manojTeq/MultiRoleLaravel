<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg p-2 bg-slate-100">
                <div class="flex">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role index</a>
                </div>
                <div class="flex flex-col">
                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">

                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" value="{{ $role->name }}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- <div class="sm:col-span-6 pt-5"> -->
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="mt-4 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Role Permissions</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                        <!-- <spa>{{ $role_permission->name }}</spa> -->
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" 
                        action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ $role_permission->name }}</button>
                        </form>
                    @endforeach
                    @endif
                </div>
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                        @csrf                        
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                        <select name="permission" id="permission" autocomplete="permission-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <!-- <div class="sm:col-span-6 pt-5"> -->
                                    <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
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