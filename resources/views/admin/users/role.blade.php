<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg p-2 bg-slate-100">
                <div class="flex">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Users index</a>
                </div>
                <div>User Name: {{ $user->name }}</div>
                <div>User Email: {{ $user->email }}</div>
            </div>

            <div class="mt-4 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Roles</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                        <!-- <spa>{{ $user_role->name }}</spa> -->
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" 
                        action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ $user_role->name }}</button>
                        </form>
                    @endforeach
                    @endif
                </div>
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                        @csrf                        
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                        <select name="role" id="role" autocomplete="role-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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

            <div class="mt-4 p-2 bg-slate-100">
                <h2 class="text-2xl font-semibold">Permissions</h2>
                <div class="flex space-x-2 mt-4 p-2">
                    @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                        <!-- <spa>{{ $user_permission->name }}</spa> -->
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" 
                        action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ $user_permission->name }}</button>
                        </form>
                    @endforeach
                    @endif
                </div>
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
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