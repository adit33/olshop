@extends('frontend.layout.master')

@section('content')
 @foreach($carts as $cart)
  {!! $cart->name !!}
 @endforeach
@endsection