<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dogs;
use App\Models\Breed;
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
            ->take(4)->get();
        return view('welcome')->with('dogs', $dogs);
    }
    
    /**
     * Show the form for creating a new resource.
     **/
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
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('dogs.id', $id)
            ->first();
            
            return view('pages.dogdetailspublic')->with('dogs', $singleDog);
    }
    
}
