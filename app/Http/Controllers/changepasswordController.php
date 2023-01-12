<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class ChangePasswordController extends Controller
{
    


public function __invoke(Request $request)
{
    $validatedData = $request->validate([
        'oldpassword' => 'required',
        'password' => 'required|confirmed',
    ]);

    $user = Auth::user();
    if (Hash::check($validatedData['oldpassword'], $user->password)) {
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        Auth::logout();

        return redirect()->route('login')->with('success', 'Password changed successfully!');
    } else {
        return redirect()->back()->withErrors(['oldpassword' => 'Wrong current password']);
    }
}


public function changePassword()
{
    return view('userprofile.changepassword');
}

}
