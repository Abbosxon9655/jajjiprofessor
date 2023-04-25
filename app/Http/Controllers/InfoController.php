<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function index()
    {
        $infos=DB::table('infos')->orderBy('id', 'DESC')->get();

        return view('admin.infos.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.infos.create');
    }


    public function store(Request $request)
    {
        // dd($request);

        DB::table('infos')->insert([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.info.index');
    }
}
