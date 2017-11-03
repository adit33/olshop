@extends('frontend.layout.master')

@section('content')

<example></example>
  <!-- <table class="table is-bordered is-striped is-narrow is-fullwidth">
    <thead>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Total</th>
      <th>Action</th>
    </thead>
    <tbody>
      <tr v-for="cart in carts">
        <td>@{{ cart.name }}</td>
        <td><qty-field :val="cart.qty" :row-id="cart.rowId" :min="1" :id="cart.id"></qty-field></td>
        <td>@{{ cart.price }}</td>
        <td>@{{ cart.qty * cart.price }}</td>
        <td>@{{  }}</td>
      </tr> 
     <tr>
        <td colspan="3">Sub TOTAL</td>
        <td colspan="2">{{ total }}</td>
      </tr>
    </tbody>
  </table> -->
<list-cart></list-cart>
  <input type="submit" class="button is-info" name="" value="Confirm" />

@endsection

@push('scripts')
<script type="text/javascript">



Vue.component('qty-field',{
  template:`
  <div class="field">
    <input type="number" class="input" :class="{'is-danger':isError}" :max="availableStock" :min="min" :value="val" v-model="qty" v-on:blur="updateItem"></input>
     <p v-if="isError" class="help is-danger">Stok Tersedia @{{ availableStock }}</p
  </div>`,
  props:['min','val','row-id','id'],
  data(){
    return {
      qty:this.val,
      isError:false,
      availableStock:0,
    }
  },
  mounted(){
    this.getAvailableStock()
  },
  methods:{
    cekQty(){
      this.isError = false;
      if ( parseInt(this.qty) > parseInt(this.availableStock) || this.qty <= 0){
        this.isError = true;
        this.qty = this.val;
      }    
        
    },
    updateItem(){
      let url="{{ route('cart.update',[':row-id']) }}";
      url = url.replace(':row-id', this.rowId);

      this.cekQty()

      if(this.isError == false){
          axios.put(url,{
            qty:this.qty,
            rowId:this.rowId
          }).then((response)=>{
            this.$parent.carts=response.data;
          })  
      }

      
    },
     getAvailableStock(){
        var stock=axios.get('api/product/'+this.id).then((response)=>{
          this.availableStock = response.data;
        })
      }
  }
})

new Vue({
  el:"#app"
})
  // new Vue({
  //   store,
  //   el:"#app",
  //   data:{
  //     carts:JSON.parse('{!! Cart::content() !!}')
  //   },
  //   mounted(){
      
  //     this.getCarts()
  //   },
  //   methods:{
  //     getCarts(){
  //       let url="{{ route('carts') }}";
  //       axios.get(url).then((response)=>{
  //         // this.carts = response.data;
  //         // store.commit('SET_CARTS',response.data);
  //       })
  //     },
  //   },
  //   computed:{
  //       total(){
  //         let carts=this.carts;
  //         for(cart in carts){
  //           return +carts[cart].subtotal;
  //         }
  //       },
  //       amountCart(){
  //         let carts=this.carts;
  //         for(cart in carts){
  //           return +carts[cart].qty;
  //         }
  //       }
  //   }
  // })
</script>
@endpush