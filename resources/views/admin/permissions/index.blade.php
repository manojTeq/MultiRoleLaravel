<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end">
                    <a href="{{ route('admin.permissions.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create Permission</a>
                </div>
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>Name</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{$permission->name}}
                                </div>
                            </td>                           
                            <td>                                 
                                <div class="flex justify-end">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">edit</a>
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>       
                                        </form>
                                    </div>                              
                                </div>                                
                            </td>                                                                               
                                              
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>