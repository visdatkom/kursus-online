<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all permission with paginate and search
        $permissions = Permission::when(request()->search, function($search){
            $search = $search->where('name', 'like', '%'. request()->search. '%');
        })->latest()->paginate(10);

        // passing $permission into view
        return view('admin.permission.index', compact('permissions'));
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
            'name' => 'required|unique:permissions',
        ]);

        // insert new permission into database
        Permission::create($request->all());

        // return back to view with toastr
        return back()->with('toast_success', 'Permission created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        // validate request name
        $request->validate([
            'name' => 'required','unique:permissions,name'. $permission,
        ]);

        // update permission by id
        $permission->update($request->all());

        // return back to view with toastr
        return back()->with('toast_success', 'Permission Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // delete permission by id
        $permission->delete();

        // return back to view with toastr
        return back()->with('toast_success', 'Permission Deleted');
    }
}
