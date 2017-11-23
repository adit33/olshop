@extends('frontend.layout.master')

@section('content')
<!-- <list-cart></list-cart>
  
<input type="submit" class="button is-info" name="" value="Confirm" />

<ongkir></ongkir> -->
<!-- <div class="steps">
  <div class="step-item is-completed is-success" :class="{'is-active' : currentStep == 1}">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-shopping-cart"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">Cart</p>
      <p>This is the first step of the process.</p>
    </div>
  </div>
  <div class="step-item" :class="{'is-active' : currentStep == 2,'is-completed' : currentStep > 2}">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-truck"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">Shiping</p>
      <p>This is the second step. You get here once you have completed the first step.</p>
    </div>
  </div>
  <div class="step-item" :class="{'is-active' : currentStep == 3,'is-completed' : currentStep > 3}">
    <div class="step-marker"><span class="icon">
        <i class="fa fa-money"></i>
      </span></div>
    <div class="step-details">
      <p class="step-title">Payment</p>
      <p>This is the third step. One more last before the end.</p>
    </div>
  </div>
  <div class="step-item" :class="{'is-active' : currentStep == 4,'is-completed' : currentStep > 4}">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-flag"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">Step 4</p>
      <p>Final step. You have completed all the previous steps and end the process.</p>
    </div>
  </div>
</div> -->

<!-- <div v-if="currentStep == 1">  -->
<list-cart></list-cart>
<!-- </div> -->

<!-- <div v-if="currentStep == 2"> -->
<ongkir></ongkir>


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