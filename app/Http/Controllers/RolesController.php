<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesController extends Controller
{

public function __construct(){
    $this->middleware(['permission:role-create'], ["only" => ["create", "store"]]); 
      $this->middleware(['permission:products-edit'], ["only" => ["edit", "update"]]); 
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', [
            'roles' =>  $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $permission = Permission::all();
           return view('roles.create',[
            'permission' =>         $permission,
           ]);
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'permissions' => 'nullable|array',
        'permissions.*' => 'exists:permissions,id',
    ]);

    $role = Role::create(['name' => $request->name]);

    if ($request->filled('permissions')) {
        // Fetch permission models by their IDs
        $permissions = Permission::whereIn('id', $request->permissions)->get();

        // Sync with the role
        $role->syncPermissions($permissions);
    }

    return redirect()->route('roles.index')->with('status', 'Role created successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
          $role = Role::findOrFail($id);

             return view('roles.show', [
                'role' =>   $role,
             ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $role = Role::findOrFail($id);
         $permission = Permission::all();
          $rolePermissions = $role->permissions->pluck('id')->toArray();
             return view('roles.edit', [
                'permission' =>   $permission,
                'role' =>   $role,
                'rolePermissions' =>   $rolePermissions,

             ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $request->validate([
        'name' => 'required|string|max:255',
        'permissions' => 'nullable|array',
        'permissions.*' => 'exists:permissions,id',
    ]);

    // Find the existing role
    $role = Role::findOrFail($id);

    // Update role name
    $role->name = $request->name;
    $role->save();

    // Update permissions
    if ($request->filled('permissions')) {
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
    } else {
        // If no permissions selected, detach all
        $role->syncPermissions([]);
    }

    return redirect()->route('roles.index')->with('status', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
 $roles = Role::findOrFail($id);
     $roles->delete();
     return redirect('/roles');
    }
}
