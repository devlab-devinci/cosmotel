<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show the application Home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.index');
    }

    /**
     * Show the application Service page.
     *
     * @return \Illuminate\Http\Response
     */
    public function service()
    {
        return view('guest.service');
    }

    /**
     * Show the application Blog page.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        return view('guest.blog');
    }

    /**
     * Show the application Contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('guest.contact');
    }
}
