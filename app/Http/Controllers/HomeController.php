<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;//using the users table

use Illuminate\Support\Facades\Auth;//for authentication of users

use App\Models\Billboard;//use the model billboard

class HomeController extends Controller
{
    //
    public function homepage(){
        // Retrieve data from the database
        $billboard = Billboard::all();
       
        return view('home.homepage', compact('billboard'));

    }

    public function index(){

        return view('admin.dashboard');
    }
}
