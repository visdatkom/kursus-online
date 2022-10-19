<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('member.profile.index', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
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
