<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Userprofile;
use DB;

class UserprofileController extends Controller
{

    public function index()
    {
        // $idtofind = Auth::id();
        // $userprofile = DB::table('userprofiles')
        //     ->select(
        //         'userprofiles.id',
        //         'userprofiles.profilepic',
        //         'userprofiles.firstname',
        //         'userprofiles.lastname',
        //         'userprofiles.location',
        //         'userprofiles.about',
        //     )
        //     // ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
        //     // ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
        //     // ->join('status', 'status.id', '=', 'dogs.status_id')
        //     ->where('user_id', '=', $idtofind);

        // return view('pages.showprofile')->with('userprofiles', $userprofile);

        // $userprofile = Userprofile::all();
        // return view('pages.')->with('userprofiles', $userprofile);

        // orderBy ascending and descending
        // $dogprofiles = Dogprofile::orderBy('gender', 'asc')->get();
        // Pagination
        // $dogs = Dogs::orderBy('id', 'asc')
    }
    
    public function create(){
        return view ('userprofile.myprofile');
    }

    public function store(Request $request){
        $this->validate($request, array(

        ));

        $userprofile = new Userprofile;
        $userprofile->firstname = $request->firstname;
        $userprofile->lastname = $request->lastname;
        

        if ($file = $request->file('profile_pic')) {
            $filename = date('YmdHis') . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $userprofile['profile_pic'] = "$filename";
        };

        $userprofile->profile_pic = $userprofile['profile_pic'];
        
        $userprofile->location = $request->location;
        $userprofile->about = $request->about;
        

        $userprofile->user_id = Auth::user()->id;
       
        $userprofile->save();

        return redirect('/showprofile')
            ->with('success', 'Dog posted successfully.');
    }
    public function show($id)
    {
        $idtofind = Auth::id();
        $userprofile = DB::table('userprofiles')
            ->select(
                'userprofiles.id',
                'userprofiles.profilepic',
                'userprofiles.firstname',
                'userprofiles.lastname',
                'userprofiles.location',
                'userprofiles.about',
            )
            // ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            // ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            // ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('user_id', '=', $idtofind);

        return view('pages.showprofile')->with('userprofiles', $userprofile);
    }
    
}
