<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Userprofile;

use App\Models\Dogs;
use App\Models\Users;
use App\Models\UserProfiles;

use DB;

class DogprofileController extends Controller
{
    public function index()
    {
        $idtofind = Auth::id();
        $dogs = DB::table('dogs')
            ->select(
                'dogs.id',
                'dogs.user_id',
                'dogs.created_at',
                'dogs.name',
                'dogs.gender',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
                'dogs.pic',
                'dogs.size',
                'dogs.color',
                'dogs.location',
                'dogs.neutered',
                'dogs.birthdate',
                'dogs.rescued',
                'dogs.rescuedate',
                'dogs.fee',
                'dogs.feenotes',
                'dogs.status_id',
                'status.name as status_name')
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('dogs.user_id', '=', $idtofind)
            ->where('dogs.status_id', '!=', 3)
            ->simplePaginate(8);

        return view('privpages.dogsposted')->with('dogs', $dogs);
    }

    public function create()
    {
        $breed = DB::table('breed')
            ->select('id', 'name')
            ->get();

        $idtofind = Auth::id();

        $userprofiles = DB::table('userprofiles')
            ->where('user_id', '=', $idtofind)
            ->get();

        if ($userprofiles->isEmpty())
            {
            return redirect('/dogsposted')
            ->with('noprofile', '  A completed user profile is required for posting a dog for adoption.');
            }
        else {
            return view('dogprofile.createprofile')->with('breed', $breed);
            }
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'gender' => 'required',
            'breed_id1' => 'required',
            'pic' => 'required',
            'size' => 'required',
            'color' => 'required',
            'location' => 'required',
            'neutered' => 'required',
            'rescued' => 'required',
            'fee' => 'required',
            'feenotes' => 'required',
        ));

        $dog = new Dogs;
        $dog->name = $request->name;
        $dog->gender = $request->gender;
        $dog->age_yr = $request->age_yr;
        $dog->age_month = $request->age_month;
        $dog->breed_id1 = $request->breed_id1;
        $dog->breed_id2 = $request->breed_id2;

        if ($file = $request->file('pic')) {
            $filename = date('YmdHis') . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['pic'] = "$filename";
        };

        $dog->pic = $input['pic'];
        $dog->size = $request->size;
        $dog->color = $request->color;
        $dog->location = $request->location;
        $dog->neutered = $request->neutered;
        $dog->birthdate = $request->birthdate;
        $dog->rescued = $request->rescued;
        $dog->rescuedate = $request->rescuedate;
        $dog->fee = $request->fee;
        $dog->feenotes = $request->feenotes;

        $dog->user_id = Auth::user()->id;
        $dog->status_id = 1;
        $dog->save();

        return redirect('/dogsposted')
            ->with('success', 'Dog posted successfully.');
    }

    public function show($id)
    {
        $singleDog = DB::table('dogs')
            ->select(
                'dogs.id',
                'dogs.created_at',
                'dogs.name',
                'dogs.gender',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
                'dogs.pic',
                'dogs.size',
                'dogs.color',
                'dogs.location',
                'dogs.neutered',
                'dogs.birthdate',
                'dogs.rescued',
                'dogs.rescuedate',
                'dogs.fee',
                'dogs.feenotes',
                'dogs.status_id',
                'status.name as status_name',
                'users.name as username',
                'userprofiles.profile_pic as profile_pic',
                'userprofiles.city as city',
                'userprofiles.province as province',
                'userprofiles.about as about',
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'dogs.user_id')
            ->join('users', 'users.id', '=', 'dogs.user_id')
            ->where('dogs.id', $id)
            ->first();

        $applications = DB::table('applications')
            ->where('dog_id', $id)
            ->get();

        return view('dogprofile.dogdetails')
            ->with('dogs', $singleDog)
            ->with('applications', $applications);
    }


    public function edit($id)
    {
        $editDog = DB::table('dogs')
            ->select(
                'dogs.id',
                'dogs.name',
                'dogs.gender',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
                'dogs.pic',
                'dogs.size',
                'dogs.color',
                'dogs.location',
                'dogs.neutered',
                'dogs.birthdate',
                'dogs.rescued',
                'dogs.rescuedate',
                'dogs.fee',
                'dogs.feenotes',
                'dogs.status_id',
                'status.name as status_name',
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('dogs.id', $id)
            ->first();

            $breed = DB::table('breed')
            ->select('id', 'name')
            ->get();

        return view('dogprofile.editdog')->with('dogs', $editDog)->with('breed',$breed);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'gender' => 'required',
            'breed_id1' => 'required',
            'pic' => 'required',
            'size' => 'required',
            'color' => 'required',
            'location' => 'required',
            'neutered' => 'required',
            'rescued' => 'required',
            'fee' => 'required',
            'feenotes' => 'required',
        ));

        $dogs = Dogs::find($id);

        $dogs->gender = $request->input('gender');
        $dogs->age_yr = $request->input('age_yr');
        $dogs->age_month = $request->input('age_month');
        $dogs->breed_id1 = $request->input('breed_id1');
        $dogs->breed_id2 = $request->input('breed_id2');
        $dogs->name = $request->input('name');
        $dogs->location = $request->input('location');
        $dogs->rescued = $request->input('rescued');
        $dogs->rescuedate = $request->input('rescuedate');
        $dogs->birthdate = $request->input('birthdate');
        $dogs->neutered = $request->input('neutered');
        $dogs->size = $request->input('size');
        $dogs->color = $request->input('color');
        $dogs->fee = $request->input('fee');
        $dogs->feenotes = $request->input('feenotes');
        if ($file = $request->file('pic')) {
            $filename = date('YmdHis') . "." . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['pic'] = "$filename";
        } else {
            unset($input['pic']);
        };
        $dogs->pic = $input['pic'];
        $dogs->save();

        return redirect('/dogsposted')
            ->with('success', 'Dog profile successfully updated.');
    }

    public function destroy($id)
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }
}
