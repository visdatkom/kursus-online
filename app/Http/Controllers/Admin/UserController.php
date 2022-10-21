<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            ->paginate(10)
            ->withQueryString();

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

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('admin.user.profile', compact('user'));
    }

    public function profileUpdate(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'github' => $request->github,
            'instagram' => $request->instagram,
            'about' => $request->about,
        ]);

        if($request->file('avatar')){
            Storage::disk('local')->delete('public/avatar/'.basename($user->avatar));

            $avatar = $request->file('avatar');
            $avatar->storeAs('public/avatar/', $avatar->hashName());

            $user->update([
                'avatar' => $avatar->hashName(),
            ]);
        }

        return back()->with('toast_succes', 'Profile Updated');
    }

    public function updatePassword(Request $request, User $user)
    {
        // validate request password
        $request->validate([
            'password' => 'confirmed|required|min:6',
        ]);

        // check old password by user password
        if(!(Hash::check($request->get('current_password'), $user->password))){
            // return back to view with toastr
            return back()->with('toast_error', 'Your Old Password Wrong');
        }else{
            // update old password by id
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        // return back to view with toastr
        return back()->with('toast_success', 'Password Changed');
    }
}
