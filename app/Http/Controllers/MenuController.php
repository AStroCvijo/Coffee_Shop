<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class MenuController extends Controller
{
    //

    public function index(){
      
      $menus = Menu::all();

      return view('menu', [
        'menus' => $menus,
      ]);
    }

    public function show(){

      $order=new Order();

      $order->order0name=request('id0');
      $order->order0number=request('number0');
      $order->order0topping=request('topping0');
      $order->order0price=request('price0');
      $order->order0size=request('size0');

      $order->order1name=request('id1');
      $order->order1number=request('number1');
      $order->order1topping=request('topping1');
      $order->order1price=request('price1');
      $order->order1size=request('size1');

      $order->order2name=request('id2');
      $order->order2number=request('number2');
      $order->order2topping=request('topping2');
      $order->order2price=request('price2');
      $order->order2size=request('size2');

      error_log($order);

      return view('check_out', [
        'order' => $order,
      ]);
    }

    public function showcheck_out(){

      $menus = Menu::all();
      return view('check_out', [
        'menus' => $menus,
      ]);

    }

    public function create(){

      $order= new Order();

      $order->full_name = request('full_name');
      $order->phone_number = request('phone_number');
      $order->address = request('address');
      $order->order_text = request('ordertext');
      $order->finished = 0;

      $order->save();

      return redirect('/');
    }
}
