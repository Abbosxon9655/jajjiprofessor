<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComentStoreRequest;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Coment;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBY('id', 'DESC')->get();

        return view('admin.comments.index', compact('comments'));
    }


    public function create()
    {
        return view('admin.comments.create');
    }


    public function store(CommentStoreRequest $request, Comment $coment)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('create', 'comments', $user, $coment));
        $requestData = $request->all();

        if ($request->hasFile('icon')) {
            $requestData['icon'] = $this->upload_file();
        }

        if ($request->hasFile('img')) {
            $requestData['img'] = $this->upload_image();
        }

        Comment::create($requestData);

        return redirect(route('admin.comments.index'))->with('success', 'Malumot muvaffaqiyatli qoshildi');
    }


    public function show($id)
    {
        $comment = Comment::find($id);

        return view('admin.comments.show', compact('comment'));
    }


    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('admin.comments.edit', compact('comment'));
    }


    public function update(CommentStoreRequest $request, Comment $comment)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('edit', 'comments', $user, $comment));
        $requestData = $request->all();

        if ($request->hasFile('icon')) {
            $this->unlink_file($comment);
            $requestData['icon'] = $this->upload_file();
        }

        if ($request->hasFile('img')) {
            $this->unlink_image($comment);
            $requestData['img'] = $this->upload_image();
        }

        $comment->update($requestData);

        return redirect()->route('admin.comments.index')->with('success', 'Malumot mavaffaqiyatli ozgartirildi');
    }


    public function destroy(Comment $comment)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('delete', 'comments', $user, $comment));
        $this->unlink_file($comment);

        $this->unlink_image($comment);

        $comment->delete();

        return redirect()->route('admin.comments.index')->with('danger', 'Malumot muvaffaqiyatli ochirildi');
    }

    public function upload_file()
    {
        $file = request()->file('icon');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move('icon/', $fileName);
        $requestData['icon'] = $fileName;
        return $fileName;
    }

    public function unlink_file(Comment $comment)
    {
        if (isset($comment->icon) && file_exists(public_path('/icon/' . $comment->icon))) {
            unlink(public_path('/icon/' . $comment->icon));
        }
    }

    public function upload_image()
    {
        $file = request()->file('img');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move('imeges/', $fileName);
        $requestData['img'] = $fileName;
        return $fileName;
    }

    public function unlink_image(Comment $comment)
    {
        if (isset($comment->icon) && file_exists(public_path('/imeges/' . $comment->icon))) {
            unlink(public_path('/imeges/' . $comment->icon));
        }
    }
}