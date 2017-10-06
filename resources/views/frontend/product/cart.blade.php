@extends('frontend.layout.master')

@section('content')
  
  

  <table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Action</th>
    </thead>
    <tbody>
     @foreach($carts as $cart)
      <tr>
        <td>{!! $cart->name !!}</td>
        <td>{!! $cart->qty !!}</td>
        <td>{!! $cart->price !!}</td>
        <td>{!! $cart->name !!}</td>
      </tr> 
     @endforeach
    </tbody>
  </table>
@endsection