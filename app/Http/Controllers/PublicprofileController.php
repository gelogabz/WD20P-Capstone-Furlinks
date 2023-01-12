<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

use App\Models\Applications;
use App\Models\Dogs;
use App\Models\Breed;
use App\Models\Userprofile;
use DB;

class PublicprofileController extends Controller
{
    public function show($id)
    {
        $userprofile = DB::table('userprofiles')
            ->select(
                'userprofiles.id',
                'userprofiles.user_id',
                'userprofiles.profile_pic',
                'userprofiles.firstname',
                'userprofiles.lastname',
                'userprofiles.about',
                'userprofiles.gender',
                'userprofiles.city',
                'userprofiles.province',
                'users.name as user_name'
            )
            ->join ('users', 'users.id', '=', 'userprofiles.user_id')
            ->where('userprofiles.user_id', '=', $id)
            ->first();
        
        $dogsposted = DB::table('dogs')
            ->select(
                'dogs.id',
                'dogs.name',
                'dogs.gender',
                'dogs.pic',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name'
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('dogs.user_id', '=', $id)
            ->where('dogs.status_id', '!=', 3)
            ->simplePaginate(8);

        $dogsrehomed = DB::table('adoptions')
            ->select(
                'adoptions.id',
                'adoptions.dog_id',
                'adoptions.user_id',
                'adoptions.created_at',
                
                'users.name as username',
                'userprofiles.profile_pic as profile_pic',

                'dogs.name as name',
                'dogs.pic as pic',

                'adoptions.turnoverpic as turnoverpic',
            )
            ->join('users', 'users.id', '=', 'adoptions.user_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'adoptions.user_id')
            ->join('dogs', 'dogs.id', '=', 'adoptions.dog_id')
            ->where('adoptions.user_id', $id)
            ->simplePaginate(8);

        return view('users.profile')
        ->with('user', $userprofile)
        ->with('dogsposted', $dogsposted)
        ->with('dogsrehomed', $dogsrehomed);
    }
}
