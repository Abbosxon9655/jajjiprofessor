<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Human;
use App\Models\Number;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    public function index()
    {
        $humans = Human::orderBy('id', 'DESC')->paginate(3);

        return view('admin.humans.index', compact('humans'));
    }

    public function create()
    {
        $numbers = Number::doesntHave('human')->get();

        return view('admin.humans.create', compact('numbers'));
    }

    public function store(Request $request)
    {
        Human::create($request->all());

        return redirect()->route('admin.humans.index')->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }

    public function show($id)
    {
        $human = Human::find($id);

        return view('admin.humans.show', compact('human'));
    }

    public function edit($id)
    {
        $human = Human::find($id);

        $numbers = Number::doesntHave('human')->get();

        return view('admin.humans.edit', compact('human', 'numbers'));
    }

    public function update(Request $request, $id)
    {
        Human::find($id)->update($request->all());

        return redirect()->route('admin.humans.index')->with('success', 'Malumot mavaffaqiyatli ozgartirildi ');
    }

    public function destroy($id)
    {
        Human::find($id)->delete();
        
        return redirect()->route('admin.humans.index')->with('success', 'Malumot mavaffaqiyatli ochirildi');
    }
}