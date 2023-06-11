<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuditEvent;
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


    public function store(Request $request, Order $order)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('create', 'orders', $user, $order));
       
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
        $user = auth()->user()->name;
        event(new AuditEvent('edit', 'orders', $user, $order));
        
        $order-> update($request->all());
        return redirect()->route('admin.orders.index');
    }
    public function destroy(Order $order)
    {
        $user = auth()->user()->name;
        event(new AuditEvent('delete', 'orders', $user, $order));
        $order -> delete();
        return redirect()->route('admin.orders.index');
    }
}
