<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->orderBy('id', 'DESC')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::table('posts')->insert([
            'name' => $request->name,
            'img' => $request->img,
            'title' => $request->title,
            'status' => $request->status,
            'age' => $request->age,
            'send' => $request->send,
            'pay' => $request->pay,
        ]);
    }
}
