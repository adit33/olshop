@extends('frontend.layout.master')

@section('content')
  
  

  <table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Total</th>
      <th>Action</th>
    </thead>
    <tbody>
     @foreach($carts as $cart)
      <tr>
        <td>{!! $cart->name !!}</td>
        <td>{!! $cart->qty !!}</td>
        <td>{!! $cart->price !!}</td>
        <td>{!! $cart->qty * $cart->price !!}</td>
        <td><a class="delete"></a></td>
      </tr> 
     @endforeach
     <tr>
        <td colspan="3">Sub TOTAL</td>
        <td colspan="2">{!! Cart::subtotal() !!}</td>
      </tr>
    </tbody>
  </table>

  <input type="submit" class="button is-info" name="" value="Confirm" />

@endsection