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
        $idtofind = Auth::id();
        $userprofiles = Userprofile::all()
            ->where('user_id', $idtofind);
        return view('userprofiles.showprofile')->with('userprofiles', $userprofiles);
    }

    
    public function create(){
        return view ('userprofile.create');


    public function create()
    {
        return view('userprofiles.create');

    }

    public function store(Request $request){
        $this->validate($request, array(
        ));1

        $userprofile = new Userprofile;
        $userprofile->user_id = Auth::user()->id;

        if ($file = $request->file('profile_pic')) {
            $filename = date('YmdHis') . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $userprofile['profile_pic'] = "$filename";
        };

        $userprofile->profile_pic = $userprofile['profile_pic'];
        $userprofile->firstname = $request->firstname;
        $userprofile->lastname = $request->lastname;
        $userprofile->mobile_no = $request->mobile_no;
        $userprofile->about = $request->about;
        $userprofile->gender = $request->gender;
        $userprofile->address1 = $request->address1;
        $userprofile->address2 = $request->address2;
        $userprofile->city = $request->city;
        $userprofile->province = $request->province;
        $userprofile->hometype = $request->hometype;
        $userprofile->funds = $request->funds;
        $userprofile->allowed = $request->allowed;
        $userprofile->withpets = $request->withpets;
        $userprofile->allergy = $request->allergy;
        $userprofile->allvaxed = $request->allvaxed;
        $userprofile->allneut = $request->allneut;
        $userprofile->euthanized = $request->euthanized;
        $userprofile->lostpet = $request->lostpet;
        $userprofile->cats = $request->cats;
        $userprofile->dogs = $request->dogs;
        $userprofile->priresp = $request->priresp;
        $userprofile->finresp = $request->finresp;
        $userprofile->lefthome = $request->lefthome;
        $userprofile->hours = $request->hours;
        $userprofile->save();

        return redirect()->back()
        ->with('success', 'User profile successfully created.');
       
    }

    // $userid = Auth::id(); //Harvs/Pao - PLS check if this will work, need to pass ID of logged-in user to show profile data from db

    public function show($userid)
    {
        $idtofind = Auth::id();
        $userdata = Userprofile::table('userprofiles')
            ->select(
                'userprofiles.profile_pic',
                'userprofiles.firstname',
                'userprofiles.lastname',
                'userprofiles.mobile_no',
                'userprofiles.about',
                'userprofiles.gender',
                'userprofiles.address1',
                'userprofiles.address2',
                'userprofiles.city',
                'userprofiles.province',
                'userprofiles.hometype',
                'userprofiles.funds',
                'userprofiles.allowed',
                'userprofiles.withpets',
                'userprofiles.allergy',
                'userprofiles.allvaxed',
                'userprofiles.allneut',
                'userprofiles.euthanized',
                'userprofiles.lostpet',
                'userprofiles.cats',
                'userprofiles.dogs',
                'userprofiles.priresp',
                'userprofiles.finresp',
                'userprofiles.lefthome',
                'userprofiles.hours',
            )
            ->where('user_id', '=', $idtofind)
            ->first();
        return view('userprofiles.myprofile')->with('userprofiles', $userdata);
    }
 
    public function edit($userid)
    {
        $idtofind = Auth::id();
        $userdata = DB::table('userprofiles')
            ->select(
                'userprofiles.profile_pic',
                'userprofiles.firstname',
                'userprofiles.lastname',
                'userprofiles.mobile_no',
                'userprofiles.about',
                'userprofiles.gender',
                'userprofiles.address1',
                'userprofiles.address2',
                'userprofiles.city',
                'userprofiles.province',
                'userprofiles.hometype',
                'userprofiles.funds',
                'userprofiles.allowed',
                'userprofiles.withpets',
                'userprofiles.allergy',
                'userprofiles.allvaxed',
                'userprofiles.allneut',
                'userprofiles.euthanized',
                'userprofiles.lostpet',
                'userprofiles.cats',
                'userprofiles.dogs',
                'userprofiles.priresp',
                'userprofiles.finresp',
                'userprofiles.lefthome',
                'userprofiles.hours',
            )
            ->where('user_id', '=', $idtofind)
            ->first();
        return view('userprofiles.editprofile')->with('userprofiles', $userdata);
    }

    public function update(Request $request, $userid)
    {
        $this->validate($request, array(

<<<<<<< Updated upstream
        ));
=======
        $userprofiles = Userprofile::find($userid);
>>>>>>> Stashed changes

        $userprofiles = Userprofiles::find($userid);
        
        if ($file = $request->file('profile_pic')) {
            $filename = date('YmdHis') . "." . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['profile_pic'] = "$filename";
        } else {
            unset($input['pic']);
        };
        $userprofiles->profile_pic = $input['profile_pic'];
        $userprofiles->firstname = $request->input('firstname');
        $userprofiles->lastname = $request->input('lastname');
        $userprofiles->mobile_no = $request->input('mobile_no');
        $userprofiles->about = $request->input('about');
        $userprofiles->gender = $request->input('gender');
        $userprofiles->address1 = $request->input('address1');
        $userprofiles->address2 = $request->input('address2');
        $userprofiles->city = $request->input('city');
        $userprofiles->province = $request->input('province');
        $userprofiles->hometype = $request->input('hometype');
        $userprofiles->funds = $request->input('funds');
        $userprofiles->allowed = $request->input('allowed');
        $userprofiles->withpets = $request->input('withpets');
        $userprofiles->allergy = $request->input('allergy');
        $userprofiles->allvaxed = $request->input('allvaxed');
        $userprofiles->allneut = $request->input('allneut');
        $userprofiles->euthanized = $request->input('euthanized');
        $userprofiles->lostpet = $request->input('lostpet');
        $userprofiles->cats = $request->input('cats');
        $userprofiles->dogs = $request->input('dogs');
        $userprofiles->priresp = $request->input('priresp');
        $userprofiles->finresp = $request->input('finresp');
        $userprofiles->lefthome = $request->input('lefthome');
        $userprofiles->hours = $request->input('hours');
        $userprofiles->save();

        return redirect()->back()
            ->with('success', 'Profile successfully updated.');
    }

}