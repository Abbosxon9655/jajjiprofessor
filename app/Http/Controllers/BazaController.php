<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BazaController extends Controller
{
    public function store(Request $request)
    {
        DB::table('orders')->insert([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email
        ]);
        /* dd($request); */
        return back();
    }   
}
