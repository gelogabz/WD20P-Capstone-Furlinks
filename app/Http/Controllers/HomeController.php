<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dogs;
use App\Models\Breed;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $gender = '';
    $size = '';
    $color = '';
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
        ->simplePaginate(12);

    return view('pages.search')
        ->with('gender', $gender)
        ->with('size', $size)
        ->with('color', $color)
        ->with('dogs', $dogs);
    }

}
