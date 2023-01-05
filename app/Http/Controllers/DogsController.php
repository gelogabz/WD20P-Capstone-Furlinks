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
            'dogs.name',
            'dogs.age',
            'dogs.pic',
            'dogs.breed_id1',
            'breed1.name as breed1_name',
            'dogs.breed_id2',
            'breed2.name as breed2_name',
        )
        ->join('breed as breed1', 'breed1.id' , '=', 'dogs.breed_id1')
        ->join('breed as breed2', 'breed2.id', '=','dogs.breed_id2' )
        ->get();

        $dogs = DB::table('dogs')->take(4)->get();
        
        // $dogs = Dogs::all();
        // $dogs = Dogs::orderBy('name', 'ASC')->get();
        // $dogs = Dogs::orderBy('name', 'ASC')->simplePaginate(3);
        // $dogs = Dogs::orderBy('name', 'DESC')->simplePaginate(3);  

        // return view('welcome', [
        //     trim($dogs)=>DB::table('dogs')->take(4)
        // ])->with('dogs', $dogs);
        return view('welcome')->with('dogs', $dogs);
        
    }

    // public function show(){
    //     $dogs = Dogs::all();
    //     return view('welcome')->with('dogs', $dogs);
    // }
}
