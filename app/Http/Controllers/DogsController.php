<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dogs;

class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = Dogs::all();
        // $dogs = Dogs::orderBy('name', 'ASC')->get();
        // $dogs = Dogs::orderBy('name', 'ASC')->simplePaginate(3);
        // $dogs = Dogs::orderBy('name', 'DESC')->simplePaginate(3);
        return view('welcome')->with('dogs', $dogs);
    }
}
