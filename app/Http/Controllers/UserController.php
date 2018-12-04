<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurateur;
use App\Influencer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($type, $id)
    {
    	$user = User::findOrFail($id);

    	if ($type == 'restaurateur') {
    		return view('restaurateur.show', compact('user'));
    	} else if ($type == 'influencer') {
    		return view('influencer.show', compact('user'));
    	}
    }

    public function edit($type, $id)
    {
    	$user = User::findOrFail($id);
    	
    	if ($type == 'restaurateur') {
    		return view('restaurateur.edit', compact('user'));
    	} else if ($type == 'influencer') {
    		return view('influencer.edit', compact('user'));
    	}
    }

    public function update(Request $request)
    {
    	
    }
}
