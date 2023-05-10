<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(2);
        return view('admin.orders.index', compact('orders'));

    }

   
    public function create()
    {
        return view('admin.orders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:15|min:10',
            'phone'=>'required|max:20|min:7',
            'email'=>'required|max:30|min:10',

        ]);

        Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

 
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name'=>'required|max:15|min:10',
            'phone'=>'required|max:20|min:7',
            'email'=>'required|max:30|min:10',

        ]);
        
        $order-> update($request->all());
        return redirect()->route('admin.orders.index');
    }
    public function destroy(Order $order)
    {
        $order -> delete();
        return redirect()->route('admin.orders.index');
    }
}
