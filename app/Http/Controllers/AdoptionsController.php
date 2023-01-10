<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Applications;
use App\Models\Adoptions;
use App\Models\Dogs;
use DB;

class AdoptionsController extends Controller
{
    public function create($id)
    {
        $apply = DB::table('applications')
            ->select(
                'applications.id',
                'applications.user_id',
                'applications.dog_id',
                'applications.created_at',
                'applications.appstatus',
                'appstatus.name as appstatus_name',

                'users.name as username',
                'users.email as email',
                'userprofiles.firstname as firstname',
                'userprofiles.lastname as lastname',
                'userprofiles.profile_pic as profile_pic',
                'userprofiles.mobile_no as mobile_no',
                'userprofiles.address1 as address1',
                'userprofiles.address2 as address2',
                'userprofiles.city as city',
                'userprofiles.province as province',

            )
            ->join('users', 'users.id', '=', 'applications.user_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'applications.user_id')
            ->join('appstatus', 'appstatus.id', '=', 'applications.appstatus')
            ->join('dogs', 'dogs.id', '=', 'applications.dog_id')
            ->where('applications.dog_id', $id)
            ->where('applications.appstatus', 5)
            ->first();

            $dogs = DB::table('dogs')
            ->select('dogs.pic',
                'dogs.id',
                'dogs.name',
                'dogs.gender',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
                'dogs.created_at'
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->where('dogs.id', $id)
            ->first();

        return view('adoptions.create')->with('applications', $apply)->with('dogs', $dogs);
    }

}
