<x-user-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            @can('delete')<th>Action</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$user->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$user->email}}
                                </div>
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                    <!-- <a href="{{ route('admin.users.show', $user->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a> -->
                                    <!-- <a href="{{ route('admin.roles.edit', $role->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">edit</a> -->
                                    <!-- <a href="" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</a> -->
                                    @can('delete')
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-user-layout>