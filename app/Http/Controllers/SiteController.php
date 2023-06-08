<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Info;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $infos = Info::orderBy('id', 'DESC')->get();
        return view('welcome', compact('infos'));
    }

    public function groups()
    {
        $groups = Group::orderBy('id', 'DESC')->get();
        return view('pages.groups', compact('groups'));
    }

    public function teach()
    {
        $teachers = Teacher::orderBy('id', 'DESC')->get();
        return view('pages.teachers', compact('teachers'));
    }

    public function yutuqlar()
    {
        return view('pages.yutuqlar');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function maqola()
    {
        return view('pages.maqola');
    }


}
