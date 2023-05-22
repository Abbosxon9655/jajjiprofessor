<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\People;
use Illuminate\Http\Request;
class PeopleController extends Controller
{
    public function index()
    {
        $peoples = people::orderBy('id', 'DESC')->paginate(3);

        return view('admin.peoples.index', compact('peoples'));
    }

    public function create()
    {
        $numbers = Number::doesntHave('people')->get();

        return view('admin.peoples.create', compact('numbers'));
    }

    public function store(Request $request)
    {
        people::create($request->all());

        return redirect()->route('admin.peoples.index')->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }

    public function show($id)
    {
        $people = People::find($id);

        return view('admin.peoples.show', compact('peoples'));
    }

    public function edit($id)
    {
        $people = People::find($id);

        $numbers = Number::doesntHave('people')->get();

        return view('admin.peoples.edit', compact('people', 'numbers'));
    }

    public function update(Request $request, $id)
    {
        People::find($id)->update($request->all());

        return redirect()->route('admin.peoples.index')->with('success', 'Malumot mavaffaqiyatli ozgartirildi ');
    }

    public function destroy($id)
    {
        People::find($id)->delete();
        
        return redirect()->route('admin.peoples.index')->with('success', 'Malumot mavaffaqiyatli ochirildi');
    }
}