@extends('frontend.layout.master')

@section('content')
<!-- <list-cart></list-cart>
  
<input type="submit" class="button is-info" name="" value="Confirm" />

<ongkir></ongkir> -->

<steps>
  <step name="Cart" description="Daftar Belanjaan Anda" icon-name="fa fa-shopping-cart"></step>
  <div slot="content">
    <list-cart></list-cart>
  </div>

  <step name="Pengiriman" description="Masukan Alamat" icon-name="fa fa-truck"></step>
  <div slot="content">
    <ongkir></ongkir>
  </div>
</steps>

<!-- <div v-if="currentStep == 1">  -->

<!-- </div> -->

<!-- <div v-if="currentStep == 2"> -->



<button class="button is-info" @click="checkout">Checkout</button>
<!-- </div> -->
<!-- 
 <button class="btn btn-primary" @click="beforeStep">
                    Back
                </button>
                <button class="btn btn-primary" @click="nextStep">
                    Next
                </button> -->
@endsection

@push('scripts')

<script type="text/javascript">
new Vue({
    store,
    el:"#app",
    data:{
      isActive:true,
      currentStep:1,
    },
    methods:{
      checkout(){
        let url = 'api/checkout';
        axios.post(url,{destination:store.state.destination,ongkir:store.state.ongkir}).then(response=>{
          console.log(response.data)
        })
      },
      nextStep(){
        this.currentStep ++;
      },
      beforeStep(){
        this.currentStep --;
      }
    }

// new Vue({
//   el:"#app"
// })
 
  })
</script>
@endpush