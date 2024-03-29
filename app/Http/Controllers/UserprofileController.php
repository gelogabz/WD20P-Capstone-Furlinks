<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use App\Models\Userprofile;

use DB;

class UserprofileController extends Controller
{

    public function index()
    {
        $idtofind = Auth::id();
        $userprofile = DB::table('userprofiles')
            ->select('profile_pic')
            ->where('user_id', '=', $idtofind)
            ->simplePaginate(1);
        return view('components.navbar')->with('userpic', $userprofile);
    }

    public function create()
    {
       
        return view('userprofile.profiletabs');

    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'firstname' => 'required',
            'lastname' => 'required',
            'about' => 'required',
            'profile_pic' => 'required',
            'mobile_no' => 'required',
            'gender' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'hometype' => 'required',
            'funds' => 'required',
            'allowed' => 'required',
            'withpets' => 'required',
            'allergy' => 'required',
            'allvaxed' => 'required',
            'allneut' => 'required',
            'euthanized' => 'required',
            'lostpet' => 'required',
            'cats' => 'required',
            'dogs' => 'required',
            'priresp' => 'required',
            'finresp' => 'required',
            'lefthome' => 'required',
            'hours' => 'required',
        )
        );

        $userprofile = new Userprofile;
        $userprofile->user_id = Auth::user()->id;
        $idtofind = Auth::user()->id;


        if ($file = $request->file('profile_pic')) {
            $filename = date('YmdHis') . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $userprofile['profile_pic'] = "$filename";
        }
        ;

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

        // return redirect('/showprofile')
        return redirect('userprofile/'.$idtofind)
            ->with('success', 'User profile successfully created.');
    }

    public function show($id)
    {
        $userprofile = DB::table('userprofiles')
            ->select(
                'userprofiles.id',
                'userprofiles.user_id',
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
            ->where('user_id', $id)
            ->first();
        
        if (Userprofile::where('user_id', '=', $id)->exists()) {
            return view('userprofile.showprofile')->with('userprofiles', $userprofile);
        }
        else {
            return view('userprofile.profiletabs');
        }
    }

    public function edit($id)
    {
        $userdata = DB::table('userprofiles')
            ->select(
                'userprofiles.id',
                'userprofiles.user_id',
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
            ->where('id', $id)
            ->first();
        return view('userprofile.editprofile')->with('userprofiles', $userdata);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array());

        $userprofiles = Userprofile::find($id);

        // $userprofiles = Userprofiles::find($userid);

        if ($file = $request->file('profile_pic')) {
            $filename = date('YmdHis') . "." . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['profile_pic'] = "$filename";
        } else {
            unset($input['profile_pic']);
        }
        ;
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

        $idtofind = Auth::id();
        
        return redirect('userprofile/'.$idtofind)
            ->with('success', 'Profile successfully updated.');
    }

 
}