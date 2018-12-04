<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurateur;
use App\Influencer;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

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

    public function update($type, $id, UserRequest $request) {
    	// $this->validate(request(), [
    	// 	'firstname' => 'required|max:255|string',
    	// 	'lastname' => 'required|max:255|string',
    	// 	// 'email' => 'required|max:255|string|unique:restaurateur',
    	// 	'phone' => 'required|max:10|string'
    	// ]);

    	// https://laracasts.com/discuss/channels/laravel/update-user-account
    	$user = User::find($id);
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->phone = $request->phone;
    	$user->save();

    	if ($type == 'restaurateur') {
    		return view('restaurateur.show', compact('user'));
    	} else if ($type == 'influencer') {
    		return view('influencer.show', compact('user'));
    	}
    }
}
