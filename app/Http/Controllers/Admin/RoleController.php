<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all role with paginate and serarch
        $roles = Role::when(request()->search, function($search){
            $search = $search->where('name', 'like', '%'. request()->search. '%');
        })->paginate(10);

        // get all permission
        $permissions = Permission::all();

        // passing $roles and $permissions into view
        return view('admin.role.index', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request name
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        // insert new role into database
        $role = Role::create($request->all());

        // assign permission into role
        $role->givePermissionTo($request->permissions);

        // return back to view with toastr
        return back()->with('toast_success', 'Role Created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // validate request name and permissions
        $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

        // update role by id
        $role->update($request->all());

        // reassign permission into role
        $role->syncPermissions($request->permissions);

        // return back to view with toastr
        return back()->with('toast_success', 'Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // delete role by id
        $role->delete();

        // return back to view with toastr
        return back()->with('toast_success', 'Role Deleted');
    }
}
