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
    public function postdog()
    {
        return view('pages/postdog');
    }
    public function myprofile()
    {
        return view('userprofile/createprofile');
    }
    public function personalinfo(){
        return view('pages/personalinfo');
    }
    public function doghistory(){
        return view('pages/doghistory');
    }
    public function accountsetting(){
        return view('pages/accountsetting');
    }
    public function editprofile(){
        return view('userprofile/editprofile');
    }

    public function index(){
        return view('applications/index');
    }
    
    public function home(){
        return view('/home');
    }
    
    

}
