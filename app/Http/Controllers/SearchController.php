<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dogs;
use App\Models\Search;
use DB;

class SearchController extends Controller

{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function index(Request $request)
    {
        
        $gender= $request->input('gender');
        $color= $request->input('color');
        $size= $request->input('size');
        
        $dogs = Dogs::query()
            ->select(
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
            ->where('gender', 'LIKE', "%{$gender}%")
            ->where('gender', 'LIKE', "%{$color}%")
            ->where('gender', 'LIKE', "%{$size}%")
            ->get();
        return view('pages.search')->with('dogs', $dogs);
    }
}