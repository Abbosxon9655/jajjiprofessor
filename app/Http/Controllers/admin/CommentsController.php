<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index()
    {
        $commentss = DB::table('commentss')->orderBy('id', 'DESC')->get();
        return view('admin.commentss.index', compact('commentss'));
    }
}
