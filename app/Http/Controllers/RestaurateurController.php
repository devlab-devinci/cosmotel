<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RestaurateurController extends Controller
{
	public function __construct()
    {
        $this->middleware('restaurateur');
    }

    public function index()
    {
    	return view('restaurateur.index');
    }

}
