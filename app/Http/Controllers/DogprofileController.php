<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dogs;
use DB;

class DogprofileController extends Controller
{
    public function index()
    {
        $idtofind = Auth::id();
        $dogs = DB::table('dogs')
        ->select(
            'dogs.id',
            'dogs.name',
            'dogs.gender',
            'dogs.age_yr',
            'dogs.age_month',
            'dogs.pic',
            'dogs.breed_id1',
            'breed1.name as breed1_name',
            'dogs.breed_id2',
            'breed2.name as breed2_name',
        )
        ->join('breed as breed1', 'breed1.id' , '=', 'dogs.breed_id1')
        ->join('breed as breed2', 'breed2.id', '=','dogs.breed_id2' )
        ->where('user_id', '=', $idtofind)
        ->simplePaginate(8);
        return view('pages.ownprofile')->with('dogs', $dogs);
        
        // $dogs = Dogs::all();
        // orderBy ascending and descending
        // $dogprofiles = Dogprofile::orderBy('gender', 'asc')->get();
        // Pagination
        // $dogs = Dogs::orderBy('id', 'asc')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dogprofile.createprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Dogs::create($input);
        return redirect('pages.ownprofile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singledogContact = Dogs::find($id);
        return view('dogprofile.dogdetails')->with('dogs', $singledogContact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateContact = Dogs::find($id);
        return view('dogprofile.editdog')->with('dogs', $updateContact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateContact = Dogs::find($id);
        $input = $request->all();
        $updateContact->update($input);
        return redirect('ownprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
