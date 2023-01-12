<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class ChangePasswordController extends Controller
{
    public function CPassword(){
        return view ('userprofile.changepassword');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData= $request->$request->validate([
            'oldpassword'=> 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){

            $user = User::find(Auth::id());
            $user-> password = Hash ::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password is change Successfully');
        }else
        {
            return redirect()->back()->with('error','Current Password is Invalid');
        }
    }

//     public function update(Request $request)
// {
//     $validatedData = $request->validate([
//         'oldpassword' => 'required',
//         'password' => 'required|confirmed',
//     ]);

//     $user = Auth::user();
//     if (Hash::check($validatedData['oldpassword'], $user->password)) {
//         $user->password = Hash::make($validatedData['password']);
//         $user->save();

    
    // public function update(Request $request, $id)
    // {

    //     $changepassword = User::find($id);
    //     $input = $request->all();
    //     $changepassword->update($input);
        
    //     return redirect('/');
    // }

    

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
