<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controlador extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function photos()
    {
        return view('pages.photos');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}