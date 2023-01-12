<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('/welcome');
    }

    public function navbar()
    {
        return view('components/navbar');
    }
    public function search()
    {
        return view('pages/search');
    }
    public function how()
    {
        return view('pages/howitworks');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function editdog()
    {
        return view('pages/editdog');
    }
    public function dogsposted()
    {
        return view('privpages/dogsposted');
    }
    public function dogsrehomed()
    {
        return view('privpages/dogsrehomed');
    }
    public function applications()
    {
        return view('privpages/applications');
    }
    public function dogdetails()
    {
        return view('pages/dogdetails');
    }
    public function postdog()
    {
        return view('pages/postdog');
    }
    // public function myprofile()
    // {
    //     return view('userprofile/createprofile');
    // }

    public function ownapplications()
    {
        return view('pages/applications');
    }

    public function home()
    {
        return view('/home');
    }

    public function showprofile()
    {
        return view('userprofile/showprofile');
    }
    public function editprofile()
    {
        return view('userprofile/editprofile');
    }
    public function profiletabs()
    {
        return view('userprofile/profiletabs');
    }
}
