@extends('frontend.layout.master')
<style type="text/css">
  .fade-enter-active, .fade-leave-active {
  transition: opacity .9s
}
</style>
@section('content')
<!-- <list-cart></list-cart>
  
<input type="submit" class="button is-info" name="" value="Confirm" />

<ongkir></ongkir> -->

<steps>

  <step v-for="step in steps" :step-id="step.id" :nama="step.name"  :description="step.description" :icon-name="step.icon" :current-step="currentStep"></step>

</steps>

<transition name="fade">
<div v-show="currentStep == 1" slot="content">
    <list-cart></list-cart>
  </div>
</transition>

<transition name="fade">
  <div v-show="currentStep == 2" slot="content">
    <ongkir></ongkir>
  </div>
</transition>

<div class="steps">
       <div class="steps-actions">
    <div class="steps-action">
      <button data-nav="previous" class="button is-info" @click="beforeStep" :disabled="currentStep == 1">previous</button>
    </div>
    <div class="steps-action">
      <button data-nav="next" class="button is-info" @click="nextStep" v-if="currentStep != maxStep" :disabled="currentStep == maxStep">Next</button>
      <button class="button is-info" @click="checkout" v-if="currentStep == maxStep">Checkout</button>
    </div>
  </div>

    </div>
<!-- <div v-if="currentStep == 1">  -->

<!-- </div> -->

<!-- <div v-if="currentStep == 2"> -->




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

      steps:[
      {
        id:1,
        name:'Cart',
        description:'Daftar Belanja Yang sudah anda beli',
        icon:'fa fa-shopping-cart'
      },
      {
        id:2,
        name:'Alamat',
        description:'Alamat Pengiriman',
        icon:'fa fa-truck'
      }
      ],
        maxStep:null,
    },
    mounted(){
      this.maxStep=this.steps.length
    },
    methods:{
      checkout(){
        let url = 'api/checkout';
        axios.post(url,{destination:store.state.destination,ongkir:store.state.ongkir,code:store.state.code,service:store.state.service}).then(response=>{
          console.log(response.data)
        })
      },
     resetStep(){
      if(this.currentStep <= 1){
          this.currentStep = 1;
        }else if(this.currentStep >= this.maxStep){
          this.currentStep = this.maxStep;
        }
     },
      nextStep(){
        this.currentStep ++;
        this.$nextTick(t=>{
          this.resetStep()
        })
      },
      beforeStep(){
        this.currentStep --;
        this.$nextTick(t=>{
          this.resetStep()
        })
      }
    }

// new Vue({
//   el:"#app"
// })
 
  })
</script>
@endpush