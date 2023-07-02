<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AchievementStoreRequest;
use App\Http\Requests\AchieventStoreRequest;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{ public function index()
    {
        $achievements = Achievement::orderBY('id', 'DESC')->get();

        return view('admin.achievements.index', compact('achievements'));
    }


    public function create()
    {
        return view('admin.achievements.create');
    }


    public function store(AchievementStoreRequest $request, Achievement $achievement)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('create', 'achievements', $user, $achievement));
        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $requestData['img'] = $this->upload_file();
        }

        Achievement::create($requestData);

        return redirect(route('admin.achievements.index'))->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }


    public function show($id)
    {
        $achievement = Achievement::find($id);

        return view('admin.achievements.show', compact('achievement'));
    }


    public function edit($id)
    {
        $achievement = Achievement::find($id);

        return view('admin.achievements.edit', compact('achievement'));
    }


    public function update(AchievementStoreRequest $request, Achievement $achievement)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('edit', 'achievements', $user, $achievement));
        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $this->unlink_file($achievement);
            $requestData['img'] = $this->upload_file();
        }

        $achievement->update($requestData);

        return redirect()->route('admin.achievements.index')->with('success', 'Malumot muvaffaqiyatli ozgartirildi');
    }


    public function destroy(Achievement $achievement)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('delete', 'achievements', $user, $achievement));
        $this->unlink_file($achievement);
        $achievement->delete();

        return redirect(route('admin.achievements.index'))->with('danger', 'Malumot muvaffaqiyatli ochirildi');
    }

    public function upload_file()
    {
        $file = request()->file('img');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move('images/', $fileName);
        $requestData['img'] = $fileName;
        return $fileName;
    }

    public function unlink_file(Achievement $article)
    {
        if (isset($article->icon) && file_exists(public_path('/images/' . $article->icon))) {
            unlink(public_path('/images/' . $article->icon));
        }
    }
}
