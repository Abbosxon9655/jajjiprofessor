<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoStoreRequest;
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


    public function store( InfoStoreRequest  $request, Info $info)
    {

        $requestData = $request->all();
        
        if($request->hasFile('icon'))
        {
            $requestData['icon'] = $this->upload_file();
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

   
    public function update(InfoStoreRequest $request, Info $info)
    {
       
        $requestData = $request->all();
        
        if($request->hasFile('icon'))
        {
           $requestData['icon'] = $this->upload_file();
        }

        $info->update($requestData);

        return redirect()->route('admin.infos.index');
    }

  
    public function destroy(Info $info)
    {
        $info -> delete();
        return redirect()->route('admin.infos.index');
    }

    public function unlink_file(Info $info)
    {
        if(isset($info->icon) && file_exists(public_path('/icon/'. $info->icon)));
        {
            unlink(public_path('/icon/'.$info->icon));
        }
    }

    public function upload_file()
    {
        $file = request()->file('icon');
            $iconName = $file->getClientOriginalName();
            $file->move('imeges/', $iconName);
           return $iconName;
    }
}
