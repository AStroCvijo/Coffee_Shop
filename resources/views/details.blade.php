@extends('layouts.layout')

@section('stylesheet')

<link href="/css/details.css" rel="stylesheet">

@endsection

@section('content')

  <div class="home">
    <div class="order">
      <div class="details">
        <img src="/img/profile.svg" alt="">
        <p>{{ $order->full_name }}</p>
        <p>{{ $order->phone_number }}</p>
        <p>{{ $order->address }}</p>
        <div class="line"></div>
        <p> <?php echo "&nbsp"  ?>
        @for($i = 0; $i < strlen($order->order_text); $i++)
          @if((ctype_upper($order->order_text[$i]) && $order->order_text[$i]!="K" && $order->order_text[$i]!="M"))
            &nbsp
          @endif
          @if($order->order_text[$i-1]=="M" && $order->order_text[$i-2]=="K")
            <br>
          @endif

          @if(is_numeric($order->order_text[$i]) && $order->order_text[$i+1]=="K" && $order->order_text[$i+2]=="M")
            &nbsp
          @endif
          
          {{ $order->order_text[$i] }}
        @endfor
        </p>
       </div>
    </div>
    <div class="buttons">
      <a href="/{{$source}}">Back to orders</a>
      @if($order->finished==0)
      <form action="/orders/{{ $order->id }}" method="POST">
        @csrf
         @method('DELETE')
        <button class="finish">Finish</button>
      </form>
      @endif
    </div>
  </div>
@endsection