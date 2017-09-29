@extends('frontend.layout.master')

@push('styles')
<style type="text/css">
  .button{
    border-radius: 0;
  }
  .hover{
    transform: scale(1.05,1.05);
  }
</style>
@endpush

@section('content')
  <article class="tile is-child box">
        <!-- Put any content you want -->
<div class="columns is-desktop">
        @foreach($products as $product)
        <div class="column">
           <div class="card"  v-bind:class="{'': !isHover, 'hover':isHover }">
  <div class="card-image">
    <figure class="image is-4by3">
      @foreach($product->productImage as $image)
      <!-- <img src="{!! $image->name !!}" alt="Placeholder image" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard"> -->
      <test :img-src="'{!! $image->name !!}'"></test>
      @endforeach
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4">{!! $product->name !!}</p>
        <p class="subtitle is-6">Rp.{!! $product->price !!}</p>
      </div>
    </div>

    <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.     
    </div>
  </div>
   <footer class="card-footer">
            <span class="card-footer-item">
              <!-- <a class="button is-large is-info is-hovered" href="{{ URL::to('product/'.$product->id) }}">Buy</a> -->
            
            <buy-btn></buy-btn>  
            
            </span>
          </footer>
</div>
</div>
        @endforeach
  </div>


        
      </article>
@endsection

@push('scripts')
<script type="text/javascript">
  Vue.component('buy-btn',{
    data(){
      return {
        isOutlined:false
      };
    },
    template:`<a class="button is-info " v-on:mouseover="hoverButton" v-on:mouseleave="hoverButton" v-bind:class="{'': isOutlined, 'is-outlined':!isOutlined }" href="{{ URL::to('product/'.$product->id) }}">Buy</a>`,
    methods:{
      hoverButton() {
        this.isOutlined=!this.isOutlined;
      }
    }
  });

  Vue.component('test',{
    // template:`<img src="@{{ imgSrc }}" alt="@{{ imgSrc }}" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard">`,
     template:`<span>@{{ imgSrc }}</span>`,
    props:['imgSrc'],
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
      isHover:false,
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
  })
</script>
@endpush