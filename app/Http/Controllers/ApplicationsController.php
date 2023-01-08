<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applications;

use App\Models\Dogs;
use DB;

class ApplicationsController extends Controller
{
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
