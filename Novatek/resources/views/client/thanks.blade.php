@extends('client.layouts.master')
@section('title')
    <title>Thanks</title>
@endsection
@section('content')
<div class="header-empty-space"></div>  

<div style="display:flex;justify-content:center"><img style="width:200px;height:200px"src="{{asset('images/icons/icons8-cart-64.png')}}" alt=""></div>
<h1 class="text-center" style="font-size:50px">Thank you for your purchase <img style="width:100px;height:100px;margin-bottom:-24px"src="{{asset('images/icons/icons8-check-64.png')}}" alt=""></h1>
<div class="buttons-wrapper" style="display:flex;justify-content:center;margin-top:20px">
    <a class="button size-2 style-2" href="{{route('client.home')}}"">
        <span class="button-wrapper">
            <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span>
            <span class="text">go back home</span>
        </span>
    </a>
</div>
<div class="header-empty-space"></div>
@endsection