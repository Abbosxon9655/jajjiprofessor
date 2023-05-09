<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));

    }

  
    public function create()
    {
        return view('admin.posts.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        
        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imeges/', $imgName);
            $requestData['img'] = $imgName;
        }
        Post::create ($requestData);

        return redirect()->route('admin.posts.index');
    }

   
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

  
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

   
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imeges/', $imgName);
            $requestData['img'] = $imgName;
        }
        
        Post::find($id)->update($requestData);
        return redirect()->route('admin.posts.index');
    }

  
    public function destroy(Post $post)
    {
        $post -> delete();
        return redirect()->route('admin.posts.index');
    }
}
