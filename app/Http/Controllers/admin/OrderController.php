<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::latest('date')
            ->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function create(Request $request)
    {
        $provider=Provider::where('id',$request->provider)->first();
    $products=Product::where('provider_id',$provider->id)->get();
    
        return view('admin.orders.create',compact('provider','products'));
    }

    public function store(StoreOrderRequest $request)
    {
        //
    }


    public function show(Order $order)
    {
        $orderProducts=OrderProduct::where('order_id',$order->id)->get();
        return view('admin.orders.show', compact('order','orderProducts'));
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
