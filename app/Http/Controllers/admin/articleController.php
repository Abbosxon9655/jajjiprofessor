<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(2);
        return view('admin.articles.index', compact('articles'));

    }

   
    public function create()
    {
        return view('admin.articles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5|max:40',
            'img'=>'required|max:2048',
            'job'=>'required|max:50|min:12',
            'short'=>'required|max:20|min:15',
        ]);

        $requestData = $request->all();
        if($request->hasfile('img'))
        {
            $file=$request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imegs/',$imgName);
            $requestData['img']=$imgName;
        }
        Article::create($requestData);

        return redirect()->route('admin.articles.index');
    }

 
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:5|max:40',
            'img'=>'required|max:2048',
            'job'=>'required|max:50|min:12',
            'short'=>'required|max:20|min:15',
        ]);
        
        $requestData = $request->all();
        if($request->hasfile('img'))
        {
            $file=$request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imegs/',$imgName);
            $requestData['img']=$imgName;
        }
        Article::find($id)->update($requestData);
        return redirect()->route('admin.articles.index');
    }
    public function destroy(Article $article)
    {
        $article -> delete();
        return redirect()->route('admin.articles.index');
    }
}
