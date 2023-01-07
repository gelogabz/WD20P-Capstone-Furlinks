<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\Apply;
use DB;

class ApplyController extends Controller
{
    public function show($id)
    {
        $applicant = DB::table('applications')
            ->select(
                'applications.id',
                'applications.user_id',
                'users.name as username',
                'applications.dog_id',
                'applications.appstatus',
                'applications.created_at',
                'appstatus.name as appstatus_name'
                )
            ->join('users', 'user.id', '=', 'applications.user_id')
            ->join('appstatus', 'appstatus.id', '=', 'applications.appstatus')
            ->where('dog_id',  '=', $id);
        return view('dogprofile.apptable')->with('applications', $applicant);
    }
}