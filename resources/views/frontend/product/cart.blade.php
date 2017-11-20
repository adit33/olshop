@extends('frontend.layout.master')

@section('content')
<!-- <list-cart></list-cart>
  
<input type="submit" class="button is-info" name="" value="Confirm" />

<ongkir></ongkir> -->
@{{ currentStep }}
<div class="steps">
  <div class="step-item is-completed is-success" :class="{'is-active' : currentStep == 1}">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-check"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">Step 1</p>
      <p>This is the first step of the process.</p>
    </div>
  </div>
  <div class="step-item" :class="{'is-active' : currentStep == 2,'is-completed' : currentStep > 2}">
    <div class="step-marker"></div>
    <div class="step-details">
      <p class="step-title">Step 2</p>
      <p>This is the second step. You get here once you have completed the first step.</p>
    </div>
  </div>
  <div class="step-item" :class="{'is-active' : currentStep == 3,'is-completed' : currentStep > 3}">
    <div class="step-marker">3</div>
    <div class="step-details">
      <p class="step-title">Step 3</p>
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
</div>

<div v-if="currentStep == 1"> 
<list-cart></list-cart>
</div>

<div v-if="currentStep == 2">
<ongkir></ongkir>
</div>

 <button class="btn btn-primary" @click="beforeStep">
                    Back
                </button>
                <button class="btn btn-primary" @click="nextStep">
                    Next
                </button>
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
      nextStep(){
        this.currentStep ++;
      },
      beforeStep(){
        this.currentStep --;
      }
    }

<<<<<<< HEAD
// new Vue({
//   el:"#app"
// })
  new Vue({
    store,
    el:"#app",
    data:{
      carts:JSON.parse('{!! Cart::content() !!}')
    },
    mounted(){
      
      this.getCarts()
    },
    methods:{
      getCarts(){
        let url="{{ route('carts') }}";
        axios.get(url).then((response)=>{
          this.carts = response.data;
          // store.commit('SET_CARTS',response.data);
        })
      },
    },
    computed:{
        total(){
          let carts=this.carts;
          for(cart in carts){
            return +carts[cart].subtotal;
          }
        },
        amountCart(){
          let carts=this.carts;
          var x = Object.values(this.carts).map((t)=>{return t.qty});
          return x.reduce((sum,val)=>parseInt(sum) + parseInt(val));
        }
    }
=======
>>>>>>> 12ebfdffc1bb9afe4aa13aca8bb83f73493d73c9
  })
</script>
@endpush