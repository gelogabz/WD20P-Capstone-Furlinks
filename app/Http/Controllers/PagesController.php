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
    public function ownprofile()
    {
        return view('pages/ownprofile');
    }
    public function dogdetails()
    {
        return view('pages/dogdetails');
    }
    public function postdog()
    {
        return view('pages/postdog');
    }
    public function myprofile()
    {
        return view('userprofile/createprofile');
    }

    public function editprofile()
    {
        return view('userprofile/editprofile');
    }

    public function applications()
    {
        return view('dogprofile/apptable');
    }

    public function home()
    {
        return view('/home');
    }

    public function showprofile()
    {
        return view('userprofile/showprofile');
    }
}
