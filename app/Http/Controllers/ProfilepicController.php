<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profilepicture;

class ProfilepicController extends Controller
{
    public function create(){
        return view ('profilepicture.myprofile');
    }

    public function store(Request $request){
        $data = new Profilepicture();
        if ($request->file('image')){
            $file= $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('ProfilePicture'),$filename);
            $data['image'] = $filename;
        }
       $data->save();
       return redirect()->route('image.show');
    }

    public function show(){
        $imageData = Profilepicture::all();
        return view ('pages/myprofile')->with('imageData', $imageData);
    }
}
