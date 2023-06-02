<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Neighborhood;
use App\Models\Region;
use App\Models\District;
use Illuminate\Support\Facades\DB;

class NeighborhoodController extends Controller
{
    public function index()
    {
        $neighborhoods = DB::table('neighborhoods')->orderBy('id', 'DESC')->get(); 
        
        return view('admin.neighborhoods.index', compact('neighborhoods'));
    }

    public function create()
    {
        $regions = DB::table('regions')->get();
        $districts = DB::table('districts')->get();

        return view('admin.neighborhoods.create', compact('regions', 'districts'));
    }

     public function store(Request $request)
    {
        Neighborhood::create($request->all());

        return redirect(route('admin.neighborhoods.index'))->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }

    public function show($id)
    {
        $neighborhood = DB::table('neighborhoods')
            ->where('neighborhoods.id', '=', $id)
            ->leftJoin('regions', 'neighborhoods.region_id', '=', 'regions.id')
            ->leftJoin('districts', 'neighborhoods.district_id', '=', 'districts.id')
            ->select('neighborhoods.*', 'districts.noun', 'regions.name')->first();

        return view('admin.neighborhoods.show', compact('neighborhood'));
    }

    public function edit($id)
    {
        $neighborhood = DB::table('neighborhoods')->where('id', $id)->first();

        return view('admin.neighborhoods.edit', compact('neighborhood',));
    }

    public function update(Request $request, $id)
    {
        Neighborhood::find($id)->update($request->all());

        return redirect()->route('admin.neighborhoods.index')->with('success', 'Malumot mavaffaqiyatli ozgartirildi');
    }

    public function destroy($id)
    {
        DB::table('neighborhoods')->where('id', $id)->delete();

        return redirect()->route('admin.neighborhoods.index')->with('danger', 'Malumot mavaffaqiyatli ochirildi');
    }
}