<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
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


    public function store(Request $request, Post $post )
    {
        $user = auth()->user()->name;
        event(new AuditEvent('create', 'posts', $user, $post));

         $requestData = $request->all();
        if ($request->hasFile('img')) {
            $requestData['img'] = $this->upload_file();
        }
        Post::create($requestData);

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

   
    public function update(PostStoreRequest $request, $id, Post $post)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('edit', 'posts', $user, $post));
        
        $requestData = $request->all();
        if ($request->hasFile('imeges')) {
            $requestData['imeges'] = $this->upload_file();
        }
       
        
        Post::find($id)->update($requestData);
        return redirect()->route('admin.posts.index');
    }

  
    public function destroy(Post $post)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('delete', 'posts', $user, $post));

        $post -> delete();
        return redirect()->route('admin.posts.index');
    }

    public function unlink_file(Post $post)
    {
        if (isset($post->img) && file_exists(public_path('/img/' . $post->img))) {
            unlink(public_path('/img/' . $post->img));
        }
    }

    public function upload_file()
    {
        $file = request()->file('img');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move('img/', $fileName);
        return $fileName;
    }
}