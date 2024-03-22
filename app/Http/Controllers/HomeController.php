<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function welcome (){
        return view ('welcome');
    }
    function home (){
        return view ('home');
    }
    function login(){
        return view ('login');
    }
}
