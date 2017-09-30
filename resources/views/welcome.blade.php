@extends('frontend.layout.master')

@push('styles')
<style type="text/css">
  .button{
    border-radius: 0;
  }
  .hover{
    transform: scale(1.05,1.05);
    box-shadow: 0 1px 2px black;
  }
</style>
@endpush

@section('content')
  <!-- <card-product></card-product>         -->

   <!-- <article class="tile is-child box">
      <div class="columns is-desktop">
          <div v-for="product in products" class="column">
             <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <div v-for="image in product.product_image">
     
          <image-product v-bind:img-src="image.name"></image-product>
        </div>
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
          <p class="title is-4">@{{ product.name }}</p>
          <p class="subtitle is-6">Rp. @{{ product.price }}</p>
        </div>
      </div>

      <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus nec iaculis mauris. <a>@bulmaio</a>.     
      </div>
    </div>
     <footer class="card-footer">
              <span class="card-footer-item">
               
              
              <buy-btn></buy-btn>  
              
              </span>
            </footer>
  </div>
  </div>
  </div>
  </article> -->
<article class="tile is-child box">
      <div class="columns is-desktop">
      <div class="column" v-for="product in products">
<card-product :product="product"></card-product>
      </div>
 </div>
  </article>
@endsection

@push('scripts')
<script type="text/javascript">
Vue.component('image-product',{
  template:`<img v-bind:src=imgSrc v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard" v-bind:class="{ '':isHover,'hover':!isHover }" />`,
  props:['imgSrc'],
  data(){
      return {
        isHover:true,
        // products:JSON.parse('{!! $products !!}')
      };
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
})


  Vue.component('buy-btn',{
    data(){
      return {
        isOutlined:false
      };
    },
    template:`<a class="button is-info " v-on:mouseover="hoverButton" v-on:mouseleave="hoverButton" v-bind:class="{'': isOutlined, 'is-outlined':!isOutlined }" :href="'product/'+url">Buy</a>`,
    props:['url'],
    methods:{
      hoverButton() {
        this.isOutlined=!this.isOutlined;
      }
    }
  });

  Vue.component('card-product',{
    // template:`<img v-bind:src="imgSrc" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard" v-bind:class="{'': !isHover, 'hover':isHover }"/>`,
    template:`
   <div class="card" v-bind:class="{'': !isHover, 'hover':isHover }">
    <div class="card-image">
      <figure class="image is-4by3">
        <div v-for="image in product.product_image">
          <img v-bind:src="image.name" alt="Placeholder image" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard">
        </div>
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
          <p class="title is-4">@{{ product.name }}</p>
          <p class="subtitle is-6">Rp. @{{ product.price }}</p>
        </div>
      </div>

      <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus nec iaculis mauris. <a>@bulmaio</a>.     
      </div>
      </div>
     <footer class="card-footer">
              <span class="card-footer-item">
               
              
              <buy-btn :url="product.id"></buy-btn>  
              
              </span>
            </footer>
  </div>`,
  props:['product'],
    data(){
      return {
        isHover:false
      };
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
  });
 
  new Vue({
    el:"#app",
    data:{
      name:'wkwkwk',
      // isHover:false,
       products:JSON.parse('{!! $products !!}')
    },
    methods:{
      // hoverCard(){
      //   this.isHover=!this.isHover;
      // }
    }
  })
</script>
@endpush