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
        return redirect()->route('admin.posts.index');
    }

    public function show($id){
        $post = DB::table('posts')->where('id', $id)->first();

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id){

        DB::table('posts')->where('id', $id)->update([
            'name' => $request->name,
            'img' => $request->img,
            'title' => $request->title,
            'status' => $request->status,
            'age' => $request->age,
            'send' => $request->send,
            'pay' => $request->pay

        ]);

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id){
        DB::table('posts')->where('id', $id)->delete();

        return redirect()->route('admin.posts.index');
    }

}
