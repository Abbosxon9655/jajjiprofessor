<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
 
    public function index()
    {
        $infos = Info::orderBy('id', 'DESC')->paginate(3);
        return view('admin.infos.index', compact('infos'));

    }

  
    public function create()
    {
        return view('admin.infos.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:5|max:40',
            'short_content'=>'required|max:50|min:12',
            'icon'=>'required|max:2048',

        ]);


        $requestData = $request->all();
        
        if($request->hasFile('icon'))
        {
            $file = $request->file('icon');
            $iconName = $file->getClientOriginalName();
            $file->move('imeges/', $iconName);
            $requestData['icon'] = $iconName;
        }

        Info::create($requestData);

        return redirect()->route('admin.infos.index');
    }

   
    public function show(Info $info)
    {
        return view('admin.infos.show', compact('info'));
    }

  
    public function edit(Info $info)
    {
        return view('admin.infos.edit', compact('info'));
    }

   
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|min:5|max:40',
            'short_content'=>'required|max:50|min:12',
            'icon'=>'required|max:2048',

        ]);



        $requestData = $request->all();
        
        if($request->hasFile('icon'))
        {
            $file = $request->file('icon');
            $iconName = $file->getClientOriginalName();
            $file->move('imeges/', $iconName);
            $requestData['icon'] = $iconName;
        }

        Info::find($id)->update($requestData);

        return redirect()->route('admin.infos.index');
    }

  
    public function destroy(Info $info)
    {
        $info -> delete();
        return redirect()->route('admin.infos.index');
    }
}
