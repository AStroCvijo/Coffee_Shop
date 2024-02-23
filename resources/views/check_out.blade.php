@extends('layouts.layout')

@section('stylesheet')

<link href="/css/check_out.css" rel="stylesheet">

@endsection

@section('content')

  <?php $orderstrign=""; ?>
  <div class="home">
    <form action="/check_out" method="POST">
      @csrf

      @for($i = 0; $i < 3; $i++)
        @if($order['order'.$i.'number']!=0)
        <div class="item">
          <img src="/img/{{$order['order'.$i.'name']}}.svg" alt="">
          <p>{{ $order['order'.$i.'number'] }}</p>
          <p>{{ $order['order'.$i.'size'] }} {{ $order['order'.$i.'topping'] }} {{ $order['order'.$i.'name'] }}</p>
          <p>{{ $order['order'.$i.'price'] }}</p>
        </div>
        @endif
        <?php 
        if($order['order'.$i.'number']!=0){
          $orderstrign=$orderstrign.$order['order'.$i.'number']." "; 
          $orderstrign=$orderstrign.$order['order'.$i.'size']." ";
          $orderstrign=$orderstrign.$order['order'.$i.'topping']." ";  
          $orderstrign=$orderstrign.$order['order'.$i.'name']." "; 
          $orderstrign=$orderstrign.$order['order'.$i.'price']." "."\r\n"; 
        }
        ?>
      @endfor
      <div class="input">
        <input class="invisible" type="text" value="{{ $orderstrign }}" id="ordertext" name="ordertext">
        <input class="inputvalue" placeholder="Full name" type="text" id="full_name" name="full_name">
        <input class="inputvalue" placeholder="Phone number" type="text" id="phone_number" name="phone_number">
        <input class="inputvalue" placeholder="Address" type="text" id="address" name="address">
        <input class="order_button" type="submit" value="ORDER">
      </div>
    </form>
  </div>

@endsection