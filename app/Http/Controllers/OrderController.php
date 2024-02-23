<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index1(){
      
      $orders = Order::all();

      return view('orders', [
        'orders' => $orders,
      ]);
    }

    public function index2(){
      
      $orders = Order::all();

      return view('finished', [
        'orders' => $orders,
      ]);
    }

    public function show($id){

      $order = Order::findOrFail($id);

      $source = request('source');

      return view('details', [
        'order' => $order,
        'source' => $source
      ]);
    }

    public function create(){
      return view('create');
    }

    public function destroy($id){

      $order = Order::findOrFail($id);
      $order['finished']=1;
      $order->save();

      return redirect('/orders');
    }
}
