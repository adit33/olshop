@extends('backend.layout.master')

@section('content')
<div class="columns">
	
</div>
Alamat : {{ $transaction->alamat.' '.$transaction->type.' '.$transaction->city_name .' '. $transaction->province}}
<table class="table is-bordered">
	<thead>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Total</th>
	</thead>
	@foreach($transaction->detailTransaction as $detail)
		<tr>
			<td>{{ $detail->product_id }}</td>
			<td>{{ $detail->product->name }}</td>
			<td>{{ $detail->price }}</td>
			<td>{{ $detail->qty }}</td>
			<td>{{ $detail->price * $detail->qty}}</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="4">Total</td>
		<td>{{ $transaction->total }}</td>
	</tr>
	<tr>
		<td colspan="4">Ongkir</td>
		<td>{{ $transaction->ongkir }}</td>
	</tr>
	<tr>
		<td colspan="4">Jumlah</td>
		<td>{{ $transaction->total + $transaction->ongkir }}</td>
	</tr>
</table>

@endsection