<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachController extends Controller
{
    public function index()
    {
       $teachs = DB::table('teachs')->orderBy('id', 'DESC')->get();

       return view('admin.teachs.index', compact('teachs'));
    }

    public function create()
    {
        return view('admin.teachs.create');
    }

    public function store(Request $request)
    {
        DB::table('teachs')->insert([
            'name' => $request->name,
            'img' => $request->img,
            'direction' => $request->direction,
            'telegram' => $request->telegram,
            'instegram' => $request->instegram,
            'faceebook' =>$request->faceebook, 
        ]);
        return redirect()->route('admin.teachs.index');
    }

    public function show($id)
    {
        $teach = DB::table('teachs')->where('id', $id)->first();

        return view('admin.teachs.show', compact('teach'));
    }

    public function edit($id)
    {
        $teach = DB::table('teachs')->where('id', $id)->first();

        return view('admin.teachs.edit', compact('teach'));
    }

    public function update(Request $request, $id)
    {
         DB::table('teachs')->where('id', $id)->update([
            'name' => $request->name,
            'img' => $request->img,
            'direction' => $request->direction,
            'telegram' => $request->telegram,
            'instegram' => $request->instegram,
            'faceebook' => $request->faceebook,
         ]);

         return redirect()->route('admin.teachs.index');
    }

    public function destroy($id){
        DB::table('teachs')->where('id', $id)->delete();

        return redirect()->route('admin.teachs.index');
    }

}
