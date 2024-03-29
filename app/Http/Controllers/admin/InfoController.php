<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use App\Http\Requests\InfoStoreRequest;
use Resources\View\admin\infos\index;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::orderBy('id', 'DESC')->get();

        return view('admin.infos.index', compact('infos'));
    }

    public function create()
    {
        if (Info::count() >= 6)
            return redirect(route('admin.infos.index'))->with('danger', 'Boshqa malumot qoshib bolmaydi');

        return view('admin.infos.create');
    }


    public function store(InfoStoreRequest $request, Info $info)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('create', 'infos', $user, $info));


        
        $requestData = $request->all();
        if ($request->hasFile('icon')) {
            $requestData['icon'] = $this->upload_file();
        }
        Info::create($requestData);

        return redirect(route('admin.infos.index'))->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }


    public function show($id)
    {
        $info = Info::find($id);

        return view('admin.infos.show', compact('info'));
    }


    public function edit($id)
    {
        $info = Info::find($id);

        return view('admin.infos.edit', compact('info'));
    }


    public function update(InfoStoreRequest $request, Info $info)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('edit', 'infos', $user, $info));

        $requestData = $request->all();
        if ($request->hasFile('icon')) {
            $this->unlink_file($info);
            $requestData['icon'] = $this->upload_file();
        }
        $info->update($requestData);
        return redirect(route('admin.infos.index'))->with('success', 'Malumot muvaffaqiyatli ozgartirildi');
    }


    public function destroy(Info $info)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('delete', 'infos', $user, $info));

        $this->unlink_file($info);
        $info->delete();
        return redirect()->route('admin.infos.index')->with('danger', 'Malumot muvaffaqiyatli ochirildi');
    }

    public function unlink_file(Info $info)
    {
        if (isset($info->icon) && file_exists(public_path('/icon/' . $info->icon))) {
            unlink(public_path('/icon/' . $info->icon));
        }
    }

    public function upload_file()
    {
        $file = request()->file('icon');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move('/icon/', $fileName);
        return $fileName;
    }
}