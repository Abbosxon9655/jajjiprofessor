<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blade;
use App\Models\Category;
use Illuminate\Http\Request;

class BladeController extends Controller
{

    public function index()
    {
        $blades = Blade::orderBy('id', 'DESC')->paginate('2');
        return view('admin.blades.index', compact('blades'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blades.create', compact('categories'));
    }

   
    public function store(Request $request)
    {
        Blade::create($request->all());
        return redirect()->route('admin.blades.index')->with('success', 'Malumot qoshildi');
    }

    public function show($id)
    {
        $blade = Blade::find($id);
        return view('admin.blades.index', compact('blade'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $blade = Blade::find($id);
        return  view('admin.blades.index', compact('blade'));
    }

    public function update(Request $request, $id)
    {
        Blade::find($id)->update($request->all());
        return redirect()->return('admin.blades.index')->with('success', 'malumot kiritildi');
    }

    public function destroy($id)
    {
        Blade::find($id)->delete;
        return redirect()->route('admin.blades.index')->with('success', 'malumoq ochirildi');
    }
}
