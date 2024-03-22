<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescuentosController extends Controller
{
    function descuentos(){
        return view ('descuentos');
    }
    function editing(){
        return view('editing');
    }
}
