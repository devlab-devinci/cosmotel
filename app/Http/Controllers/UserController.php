<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurateur;
use App\Influencer;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Auth;


class UserController extends Controller
{
    public function show($id)
    {	
    	// $typeInt = $type == 'restaurateur' ? 'restaurateur' : 'influencer'
    	$user = User::where('id', $id)->firstOrFail();

    	if (Auth::user()->type == 0) {
    		return view('restaurateur.show', compact('user'));
    	} else if (Auth::user()->type == 1) {
    		return view('influencer.show', compact('user'));
    	}
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
    	
    	if (Auth::user()->type == 0) {
    		return view('restaurateur.edit', compact('user'));
    	} else if ($type == 'influencer') {
    		return view('influencer.edit', compact('user'));
    	}
    }

    public function update($id, UserRequest $request) {
    	$user = User::where('id', $id)->firstOrFail();
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->phone = $request->phone;
    	$user->save();

    	if (Auth::user()->type == 'restaurateur') {
    		return view('restaurateur.show', compact('user'));
    	} else if ($type == 'influencer') {
    		return view('influencer.show', compact('user'));
    	}
    }

    public function messages()
    {
        if (Auth::check())
        {
            if (Auth::user()->type == 0)
            {
                return view('restaurateur.message');
            } else {
                return view('influencer.message');
            }
        }

        return redirect('/');
    }

    public function reservations()
    {
        if (Auth::check())
        {
            if (Auth::user()->type == 0)
            {
                return view('restaurateur.reservation');
            } else {
                return view('influencer.reservation');
            }
        } 
        return redirect('/');
        
    }
}
