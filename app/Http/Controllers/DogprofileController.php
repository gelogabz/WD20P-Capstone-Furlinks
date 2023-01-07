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
        $this->validate($request, array(
            'gender' => 'required',
            'breed_id1' => 'required',
            'pic' => 'required',
            'size' => 'required',
            'color' => 'required',
            'location' => 'required',
            'neutered' => 'required',
            'rescued' => 'required',
            'fee' => 'required',
            'feenotes' => 'required',
        ));

        $dog = new Dogs;
        $dog->name = $request->name;
        $dog->gender = $request->gender;
        $dog->age_yr = $request->age_yr;
        $dog->age_month = $request->age_month;
        $dog->breed_id1 = $request->breed_id1;
        $dog->breed_id2 = $request->breed_id2;

        if ($file = $request->file('pic')) {
            $filename = date('YmdHis') . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['pic'] = "$filename";
        };

        $dog->pic = $input['pic'];
        $dog->size = $request->size;
        $dog->color = $request->color;
        $dog->location = $request->location;
        $dog->neutered = $request->neutered;
        $dog->birthdate = $request->birthdate;
        $dog->rescued = $request->rescued;
        $dog->rescuedate = $request->rescuedate;
        $dog->fee = $request->fee;
        $dog->feenotes = $request->feenotes;

        $dog->user_id = Auth::user()->id;
        $dog->status_id = 1;
        $dog->save();

        return redirect('/ownprofile')
            ->with('success', 'Dog posted successfully.');
    }

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
        return view('dogprofile.dogdetails')->with('dogs', $singleDog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $updateContact = Dogs::find($id);
        // return view('dogprofile.editdog')->with('dogs', $updateContact);
        $editDog = DB::table('dogs')
            ->select(
                'dogs.id',
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
        return view('dogprofile.editdog')->with('dogs', $editDog);
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
        // $updateContact = Dogs::find($id);
        // $input = $request->all();
        // $updateContact->update($input);
        // return redirect('ownprofile');
        $this->validate($request, array(
            'gender' => 'required',
            'breed_id1' => 'required',
            // 'pic' => 'required',
            'size' => 'required',
            'color' => 'required',
            'location' => 'required',
            'neutered' => 'required',
            'rescued' => 'required',
            'fee' => 'required',
            'feenotes' => 'required',
        ));

        $dogs = Dogs::find($id);
        $dogs->gender = $request->get('gender');
        $dogs->age_yr = $request->get('age_yr');
        $dogs->age_month = $request->get('age_month');
        $dogs->breed_id1 = $request->get('breed_id1');
        $dogs->breed_id2 = $request->get('breed_id2');
        if ($file = $request->file('pic')) {
            $filename = date('YmdHis') . "." . $file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['pic'] = "$filename";
        }else{
            unset($input['pic']);
        }
          
        $dogs->name = $request->get('name');
        $dogs->location = $request->get('location');
        $dogs->rescued = $request->get('rescued');
        $dogs->rescuedate = $request->get('rescuedate');
        $dogs->birthdate = $request->get('birthdate');
        $dogs->neutered = $request->get('neutered');
        $dogs->size = $request->get('size');
        $dogs->color = $request->get('color');
        $dogs->fee = $request->get('fee');
        $dogs->feenotes = $request->get('feenotes');

        $dogs->update($dogs);
        return redirect('/ownprofile')
            ->with('success', 'Dog profile successfully updated.');
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
