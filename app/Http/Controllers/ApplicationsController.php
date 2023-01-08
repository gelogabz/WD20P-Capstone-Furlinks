<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;

use App\Models\Dogs;
use DB;

class ApplicationsController extends Controller
{
    public function create($id)
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
            'status.name as status_name'
        )
        ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
        ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
        ->join('status', 'status.id', '=', 'dogs.status_id')
        ->where('dogs.id', $id)
        ->first();

        return view('applications.create')->with('dogs',$singleDog);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        ));

        $apply = new Applications;
        $apply->dog_id = $id;
        $apply->user_id = Auth::user()->id;
        $apply->save();

        return redirect()->back()
            ->with('success', 'Application successfully submitted.');
    }
    public function show($id)
    {
        $apply = DB::table('applications')

            ->select(
                'applications.id',
                'applications.user_id',
                'users.name as username',
                'userprofiles.firstname as firstname',
                'userprofiles.lastname as lastname',
                'userprofiles.profile_pic as profile_pic',
                // 'userprofiles.location as location',
                'userprofiles.mobile_no as mobile_no',
                'applications.dog_id',
                'dogs.pic as dog_pic',
                'applications.created_at',
                'applications.appstatus',
                'appstatus.name as appstatus_name',

            )
            ->join('users', 'users.id', '=', 'applications.user_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'applications.user_id')
            ->join('appstatus', 'appstatus.id', '=', 'applications.appstatus')
            ->join('dogs', 'dogs.id', '=', 'applications.dog_id')

            // $applications = Applications::orderBy('id', 'desc')->simplePaginate(4)
            ->where('dog_id', $id)
            ->get();

        // return view('applications.index', compact('apply'));
        return view('applications.index')->with('applications', $apply);
    }

    public function update(Request $request, $id)
    {
        $applications =  Applications::find($id);
        $applications->appstatus = $request->get('appstatus');
        $applications->save();
        return redirect()->back()
            ->with('success', 'Application status successfully updated.');
    }
}
