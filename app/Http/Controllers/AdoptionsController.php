<?php

namespace App\Http\Controllers;

use App\Models\Adoptions;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionsController extends Controller
{
    public function index()
    {
        $idtofind = Auth::id();
        $dogs = DB::table('dogs')
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
                'status.name as status_name')
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->join('status', 'status.id', '=', 'dogs.status_id')
            ->where('dogs.user_id', '=', $idtofind)
            ->where('dogs.status_id', '=', 4)
            ->orderBy('id', 'DESC')
            ->simplePaginate(8);

        return view('privpages.dogsrehomed')->with('dogs', $dogs);
    }

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
                'dogs.created_at',
                'dogs.size',
                'dogs.color',
                'dogs.location',
                'dogs.neutered',
                'dogs.birthdate',
                'dogs.rescued',
                'dogs.rescuedate',
            )
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->where('dogs.id', $id)
            ->first();

        return view('adoptions.create')->with('applications', $apply)->with('dogs', $dogs);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'turnover_pic' => 'required',
        ]);

        $turnover = new Adoptions;
        $turnover->dog_id = $request->dogid;
        $turnover->user_id = $request->userid;

        if ($file = $request->file('turnover_pic')) {
            $filename = date('YmdHis').$file->getClientOriginalname();
            $file->move(public_path('Image'), $filename);
            $input['turnover_pic'] = "$filename";
        }

        $turnover->turnoverpic = $input['turnover_pic'];
        $turnover->save();

        $id = $turnover->dog_id;

        DB::table('dogs')
            ->where('dogs.id', $id)
            ->update(['status_id' => 4]);

        return redirect('/dogsrehomed')
            ->with('success', 'Adoption successfully finalized.');
    }

    public function show($id)
    {
        $rehomed = DB::table('adoptions')
            ->select(
                'adoptions.id',
                'adoptions.dog_id as dog_id',
                'adoptions.user_id as user_id',

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

                'dogs.name as name',
                'dogs.pic as pic',
                'dogs.gender as gender',
                'dogs.age_yr as age_yr',
                'dogs.age_month as age_month',
                'dogs.breed_id1',
                'breed1.name as breed1_name',
                'dogs.breed_id2',
                'breed2.name as breed2_name',
                'dogs.created_at as created_at',
                'dogs.size as size',
                'dogs.color as color',
                'dogs.location as location',
                'dogs.neutered as neutered',
                'dogs.birthdate as birthdate',
                'dogs.rescued as rescued',
                'dogs.rescuedate as rescuedate',

                'adoptions.turnoverpic as turnoverpic',
            )
            ->join('users', 'users.id', '=', 'adoptions.user_id')
            ->join('userprofiles', 'userprofiles.user_id', '=', 'adoptions.user_id')
            ->join('dogs', 'dogs.id', '=', 'adoptions.dog_id')
            ->join('breed as breed1', 'breed1.id', '=', 'dogs.breed_id1')
            ->join('breed as breed2', 'breed2.id', '=', 'dogs.breed_id2')
            ->where('adoptions.dog_id', $id)
            ->first();

        return view('adoptions.show')
            ->with('adoptions', $rehomed);
    }
}
