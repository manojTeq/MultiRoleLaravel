<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();   
        // dd($roles[0]->name);
        // $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate(['name' => ['required', 'min:3']]);
        // Role::create($validated);
        $role = Role::create(['name' =>$request->input('name'), 'guard_name' => 'web']);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index')->with('message', 'Role Created succesfully.');
        
    }

    public function edit($id)
    {
        // dd($id);
        // $user = User::all();
        $role = Role::find($id);
        $permission= Permission::all();

        foreach($role as $roles){
            $rolePermissions= Permission::select('roles.name as role_name','permissions.name as permission_name','permissions.guard_name as permission_guard','permissions.id as permission_id')
            ->join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->join('roles','role_has_permissions.role_id','=','roles.id')
            ->where("role_has_permissions.role_id", $role['id'])            
            ->get();
        }                

        $permissions = Permission::all();        
        return view('admin.roles.edit', compact('role', 'rolePermissions','permission','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        dd($validated);
        $role->update($validated);
        return redirect()->route('admin.roles.index')->with('message', 'Role Updated succesfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('message', 'Role deleted.');
    }

    public function givePermission(Request $request, Role $role)    
    {
        
        // dd($request->all());
        // if($role->syncPermissions($request->permission)){
        //     return back()->with('message', 'Permission exists.');
        // }  
        
        $role->syncPermissions($request->permission);   
        // $role->syncPermissions($request->input('permission'));                
        return back()->with('message', 'Permission added.');

        

    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);                 
            return back()->with('message', 'Permission revoked.');
        } 
        return back()->with('message', 'Permission not exists.');

    }
    
}
