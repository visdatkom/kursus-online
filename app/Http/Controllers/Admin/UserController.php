<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all user with paginate and serarch
        $users = User::with('roles')
            ->search('name')
            ->latest()
            ->paginate(10);

        // get all role
        $roles = Role::get();

        // passing $users and $roles into view
        return view('admin.user.index', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // reassign role into user
        $user->syncRoles($request->roles);

        // return back to views with toastr
        return back()->with('toast_success', 'User Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // delete user by id
        $user->delete();

        // return back to view with toastr
        return back()->with('toast_success', 'User Deleted');
    }
}
