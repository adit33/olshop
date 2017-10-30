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
        <td><qty-field val="{!! $cart->qty !!}" min="1" max="{!! App\Models\Product::find($cart->id)->stock !!}"></qty-field></td>
        <td>{!! $cart->price !!}</td>
        <td>{!! $cart->qty * $cart->price !!}</td>
        <td><a class="delete" href="{{ route('cart.delete',$cart->rowId) }}"></a></td>
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

@push('scripts')
<script type="text/javascript">
Vue.component('qty-field',{
  template:`
  <div class="field"><input type="number" class="input" :class="{'is-danger':isError}" :max="max" :min="min" :value="val" v-model="qty" v-on:blur="cekQty"></input>
     <p v-if="isError" class="help is-danger">Stok Tersedia @{{ max }}</p
  </div>`,
  props:['max','min','val'],
  data(){
    return {
      qty:this.val,
      isError:false,
    }
  },
  methods:{
    cekQty(){
      this.isError = false;
      if ( parseInt(this.qty) > parseInt(this.max) || this.qty <= 0){
        this.isError = true;
        this.qty = this.val;
      }      
    }
  }
})

  new Vue({
    el:"#app",
    mounted(){
      // alert('ok')
    }
  })
</script>
@endpush