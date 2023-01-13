<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\Dogs;
use App\Models\Breed;
use App\Models\Search;
use App\Models\Userprofile;
use DB;

class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dogs = DB::table('dogs')
            ->select(
                'dogs.id',
                'dogs.name',
                'dogs.gender',
                'dogs.age_yr',
                'dogs.age_month',
                'dogs.pic',
                'dogs.created_at',
                'dogs.updated_at',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->orderBy('id', 'DESC')
            ->take(4)->get();
            return view('welcome')->with('dogs', $dogs);
    }
    
    public function show($id)
    {
        $singleDog = DB::table('dogs')
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
                'status.name as status_name',
                'users.id as users_id',
                'users.name as users_name',
                'userprofiles.profile_pic as profile_pic',
                'userprofiles.about as about',
                'userprofiles.city as city',
                'userprofiles.province as province'
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->join('users', 'users.id', '=', 'dogs.user_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'dogs.user_id')
            ->where('dogs.id', $id)
            ->first();
            
        $ownerid = Dogs::where('dogs.id', '=', $id)
            ->select('dogs.user_id')
            ->first()->user_id;
        
        $dogsposted = DB::table('dogs')
            ->select('dogs.id', 'dogs.pic',)
            ->join('users', 'users.id', '=', 'dogs.user_id')
            ->where('dogs.user_id', "=", $ownerid)
            ->take(4)
            ->get();

        $idtofind = Auth::id();
        $applications = DB::table('applications')
            ->select()
            ->where('dog_id', '=', $id)
            ->where('user_id', '=', $idtofind)
            ->get();

        if ($applications->isEmpty())
        {$applicationstatus = '';}
        else {$applicationstatus = 'existing';};

        if ($idtofind == $ownerid)
        {$owned = 'yes';}
        else {$owned = 'no';};

        if (Userprofile::where('user_id', '=', $idtofind)->exists()) {
            $withprofile = 'complete';}
        else {$withprofile = 'inc';}


        return view('pages/dogdetailspublic')
            ->with('ownership', $owned)
            ->with('applicationstatus', $applicationstatus)
            ->with('withprofile', $withprofile)
            ->with('dogs', $singleDog)
            ->with('otherdogs', $dogsposted);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function search()
    // {
    //     $gender = $request->input('gender');
    //     $color = $request->input('color');
    //     $size = $request->input('size');
        
    //     $dogs = Dogs::query()
    //         ->select(
    //             'dogs.name',
    //             'dogs.gender',
    //             'dogs.age_yr',
    //             'dogs.age_month',
    //             'dogs.pic',
    //             'dogs.created_at',
    //             'dogs.updated_at',
    //             'dogs.breed_id1',
    //             'breed1.name as breed1_name',
    //             'dogs.breed_id2',
    //             'breed2.name as breed2_name',
    //             'dogs.pic',
    //             'dogs.size',
    //             'dogs.color',
    //             'dogs.location',
    //             'dogs.neutered',
    //             'dogs.birthdate',
    //             'dogs.rescued',
    //             'dogs.rescuedate',
    //             'dogs.fee',
    //             'dogs.feenotes',
    //             'dogs.status_id',
    //             'status.name as status_name',
    //             'users.id as users_id',
    //             'users.name as users_name',
    //             'userprofiles.profile_pic as profile_pic',
    //             'userprofiles.about as about',
    //             'userprofiles.city as city',
    //             'userprofiles.province as province'
    //         )
    //         ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
    //         ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
    //         ->join('status', 'status.id', '=', 'dogs.status_id')
    //         ->join('users', 'users.id', '=', 'dogs.user_id')
    //         ->join('userprofiles', 'userprofiles.user_id', '=', 'dogs.user_id')
    //         ->where('dogs.gender', '=', $gender)
    //         ->orWhere('dogs.color', '=', $color)
    //         ->orWhere('dogs.size', '=', $size)
    //         ->get();
    //     return view('pages.search')->with('dogs', $dogs);
    // }

    /**/
}
