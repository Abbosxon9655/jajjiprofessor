<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function groups()
    {
        return view('pages.groups');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function yutuqlar()
    {
        return view('pages.yutuqlar');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function blog()
    {
        return view('pages.blog');
    }


}
