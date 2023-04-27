<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->orderBy('id', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::table('orders')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
         
        ]);
        return redirect()->route('admin.orders.index');
    }

    public function show($id){
        $order = DB::table('orders')->where('id', $id)->first();

        return view('admin.orders.show', compact('order'));
    }

}
