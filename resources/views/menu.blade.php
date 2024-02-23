@extends('layouts.layout')

@section('stylesheet')

<link href="/css/menu.css" rel="stylesheet">

@endsection

@section('content')

  <div class="home">
    <div class="title">
      <div class="line"></div>
      <p>COFEE</p>
    </div>

    <form action="/menu" method="POST">
      @csrf
      <div class="menu">
        @for($i = 0; $i < count($menus)/3; $i++)
          <div class="menu_line">
            @for($j = 0; $j < 3; $j++)
            <div class="menu_item">
                <div class="menu_item_details">
                  <img src="/img/{{ $menus[$i*3+$j]['name'] }}.svg" alt="">
                  <p class="detail_1">{{ $menus[$i*3+$j]['name'] }}</p>
                  <p class="detail_2">{{ $menus[$i*3+$j]['size'] }}</p>
                  <p class="detail_3">{{ $menus[$i*3+$j]['price'] }}</p>
                </div>
                <div class="menu_item_num">
                  <input class="invisible" type="text" id="id{{$i*3+$j}}" name="id{{$i*3+$j}}" value="{{ $menus[$i*3+$j]['name'] }}">
                  <input class="invisible" type="text" id="price{{$i*3+$j}}" name="price{{$i*3+$j}}" value="{{ $menus[$i*3+$j]['price'] }}">
                  <input class="invisible" type="text" id="size{{$i*3+$j}}" name="size{{$i*3+$j}}" value="{{ $menus[$i*3+$j]['size'] }}">
                  <input maxlength="1" type="text" id="number{{$i*3+$j}}" name="number{{$i*3+$j}}" class="number" value="0">
                  <select name="topping{{$i*3+$j}}" id="topping{{$i*3+$j}}">
                    <option value=""></option>
                    <option value="Vanilla">Vanilla</option>
                    <option value="Chocolate">Chocolate</option>
                    <option value="Vanilla and Chocolate">Vanilla and Chocolate</option>
                  </select>
                </div>
              </div>
            @endfor
          </div>
        @endfor
      </div>
      <input class="submit" type="submit" value="GO TO CHECK-OUT">
    </form>
  </div>

@endsection