<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Info;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function get_index()
    {
        $infos = Info::orderBy('id', 'DESC')->take(6)->get();
        $groups = Group::orderBy('id', 'DESC')->take(3)->get();
        // $teachers = Teacher::orderBy('id', 'DESC')->where('status', 1)->take(4)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(4)->get();
        $articles = Article::orderBy('id', 'DESC')->take(3)->get();

        return view('welcome', compact('infos', 'groups', 'comments', 'articles'));
    }

    public function get_groups()
    {
        $groups = Group::orderBy('id', 'DESC')->get();
        return view('pages.groups', compact('groups'));
    }

    // public function teachers()
    // {
    //     $teachers = Teacher::orderBy('id', 'DESC')->get();
    //     return view('pages.teachers', compact('teachers'));
    // }

    public function get_comment()
    {
        $comments = Comment::orderBy('id', 'DESC')->get();
        return view('pages.comment', compact('comments'));
    }

    
    public function get_gallery()
    {
        return view('pages.gallery');
    }

    public function get_achievement()
    {
        $achievements = Achievement::orderBy('id', 'DESC')->get();
        return view('pages.achievement', compact('achievements'));
    }

    public function get_article()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('pages.article', compact('articles'));
    }

    public function post_registers(Request $request)
    {
        // return $request;
        DB::table('registers')->insert([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
        ]);
        return back();
    }


}
