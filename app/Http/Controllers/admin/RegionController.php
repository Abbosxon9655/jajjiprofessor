<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
  
    public function index()
    {
      $regions = Region::orderBy('id', 'DESC')->get();
      return view('admin.regions.index', compact('regions'));
    }
    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(Request $request)
    {
        Region::create($request->all());
        return redirect(route('admin.regions.index'))->with('succes', 'Malumot muvofaqqiyatli kiritlidi');
    }

    public function show($id)
    {
        $region = Region::find($id);
        return view('admin.regions.show', compact('region'));
    }

    public function edit($id)
    {
        $region = Region::find($id);
        return view('admin.regions.edit', compact('region'));
    }

    public function update(Request $request, $id)
    {
        Region::find($id)->update($request->all());
        return redirect()->route('admin.regions.index')->with('success', 'Malumot mavaffaqiyatli ozgartirildi');
    }

    public function destroy($id)
    {
        Region::find($id)->delete();
        return redirect()->route('admin.regions.index')->with('success', 'Malumot mavaffaqiyatli ochirildi');
    }
}
