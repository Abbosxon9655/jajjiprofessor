<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  
    public function index()
    {
        $shows = Show::orderBy('id', 'DESC')->paginate(2);
        return view('admin.shows.index', compact('shows'));

    }
    public function create()
    {
        return view('admin.shows.create');

    }


    public function store(Request $request)
    {
        $requestData = $request->all();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imeges/', $imgName);
            $requestData['img']= $imgName;
        }
        Show::create ($requestData);
        return redirect()->route('admin.shows.index');
    }

   
    public function show(Show $show)
    {
        return view('admin.shows.show', compact('show'));
    }

  
    public function edit(Show $show)
    {
        return view('admin.shows.edit', compact('show'));
    }

   
    public function update(Request $request,$id)
    {
        $requestData = $request->all();
        if($request->hasFile('img'));
        {
            $file = $request->file('img');
            $imgName = $file->getClientOriginalName();
            $file->move('imeges/', $imgName);
            $requestData['img']= $imgName;
        }
        Show::find($id)->update($requestData);
        return redirect()->route('admin.shows.index');
    }

  
    public function destroy(Show $show)
    {
        $show -> delete();
        return redirect()->route('admin.shows.index');
    }
}
