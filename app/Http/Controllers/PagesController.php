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
        return view('component/navbar');
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

    public function dogdeets()
    {
        return view('pages/dogdeets');
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
}
