@extends('layouts.layout')

@section('stylesheet')

<link href="/css/finished.css" rel="stylesheet">

@endsection

@section('content')

  <div class="home">
    
    <div class="title">
      <a class="Orders" href="/orders">ORDERS</a>
      <a class="Finished" href="">FINISHED</a>
    </div>

    <div class="orders">

      <?php $counter=0 ?>
      @for($i = 0; $i < count($orders); $i++)
        @if($orders[$i]['finished']==1)
         <?php $counter=1 ?>
          <a class="order_details" href="/orders/{{$i+1}}?source=finished">
            <div class="order">
              <img src="/img/profile.svg" alt="">
              <div class="details">
                <p>{{ $orders[$i]['full_name'] }}</p>
                <p>{{ $orders[$i]['phone_number'] }}</p>
                <p>{{ $orders[$i]['address'] }}</p>
              </div>
            </div>
          </a>
        @endif
      @endfor

      @if($counter==0)
        <div class="order">
          <p class="order_none">Trenutno nema završenih narudžbi</p>
        </div>
      @endif

    </div>

    
  </div>

@endsection