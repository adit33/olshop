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
  .ribbon {
  position: absolute;
  left: -5px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#2989d8 0%, #1e5799 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #1e5799;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #1e5799;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #1e5799;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #1e5799;
}
.blur{
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
    -webkit-transition: background-color 0;
    transition: background-color 0;
    background-color: #FFFFFF;
}
.hide{
  z-index: -1;
}
.overlay {
    background: #e9e9e9;
    opacity: 0.5;
}
.name{
  font-size: 14px;
  color: #999;
}
.highlight {
  color: #0096D9;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
.is-transparent{
  background-color: #fff0;
}

::before, ::after {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
}
element {
}
.icon.is-medium {
    height: 2rem;
    width: 2rem;
}
.icon {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    height: 1.5rem;
    width: 1.5rem;
}
span {
    font-style: inherit;
    font-weight: inherit;
}
* {
    box-sizing: border-box;
}
* {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
}
.navbar-item.is-tab.is-active {
    color: #fff;
}
.navbar-item, 
.navbar-link {
    color: #000000;
    line-height: 1.5;
    /*padding: 0.5rem 1rem;
    position: relative;*/
}
a.navbar-item:hover, a.navbar-item.is-active, a.navbar-link:hover, a.navbar-link.is-active {
    background-color: whitesmoke;
    color: #fff;
}
.title {
    color: #fff;
    font-size: 2rem;
    font-weight: 600;
    line-height: 1.125;
}
.subtitle {
    color: #fff;
    font-size: 1.25rem;
    font-weight: 400;
    line-height: 1.25;
}
</style>
@endpush

@section('content') 
<div class="carousel"
  data-flickity='{ "wrapAround": true }'>
  <img src="img/siskiu2.jpg" style="width: 66%; height: 400px; margin-right: 10px; border-radius: 5px;"></img>
  <img src="img/thrill_wreak.jpg" style="width: 66%; height: 400px; margin-right: 10px; border-radius: 5px;"></img>
  <img src="img/polygon helios c3.jpg" style="width: 66%; height: 400px; margin-right: 10px; border-radius: 5px;"></img>
</div>
<!-- <article class="tile is-child box"> -->



<hr>
 
<div class="columns">
  <div class="column is-one-quarter is-narrow">
    <nav class="panel">
  <p class="panel-heading">
    Categories
  </p>
  <div class="panel-block">
    <div class="field">
      <div v-for="category in categories">
        <input :id="category.id" :value="category.id" name="category_id[]" class="is-checkradio" type="checkbox" v-model="checked">
    <label :for="category.id">@{{ category.name }}</label> <br>
      </div>       
  </div>
  </div>
  
  <div class="panel-block">
    <input type="checkbox" v-model="checkedAll" class="" name="">Check All</input>
  </div>
</nav>

<nav class="panel">
  <p class="panel-heading">
    Brands
  </p>
  <div class="panel-block">
    <div class="field">
    @foreach(App\Brand::all() as $brand)
        <input id="brand-{{ $brand->id }}" value="{{ $brand->id }}" name="brand_id[]" class="is-checkradio" type="checkbox">
    <label for="brand-{{ $brand->id }}">{!! $brand->name !!}</label> <br>
    @endforeach
  </div>
  </div>
  
  <div class="panel-block">
    <button class="button is-link is-outlined is-fullwidth">
      reset all filters
    </button>
  </div>
</nav>
  </div>
  <div class="column">
    <div class="columns is-multiline">

    <div class="columns">
      <div class="column is-4">
        <div class="field">
<label class="label">Layout</label>
  <layout @changed="changeLayout"></layout>  
</div>  





      </div>

      <div class="column is-4">
        <div class="field">
  <label class="label">Per Page</label>
  <div class="control">
    <div class="select">
      <select v-model="per_page" @change="getProducts">
        <option >Select Page</option>
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="9">9</option>
      </select>
    </div>
  </div>
</div>
      </div>

      <div class="column is-4"><div class="field">
  <label class="label">Sort By</label>
  <div class="control">
    <div class="select">
      <select v-model="order" @change="filterProducts">
        <option value="" >Select dropdown</option>
        <option value="price,asc">Harga Termurah</option>
        <option value="price,desc">Harga Termahal</option>
        <option value="name,asc">Nama A-Z</option>
        <option value="name,desc">Nama Z-A</option>
      </select>
    </div>
  </div>
</div></div>
    </div>

   <!-- <div class="column is-12"> -->
    <div class="pricing-table column is-12" :class="{ '' : layout == 'grid' ,'is-horizontal' : layout == 'list' }">
    <img v-if="isLoading" src="{!! asset('img/loading.gif') !!}" style="display: block; margin: 0 auto;" />

    <div class="column" :class="{ 'is-4' : layout == 'grid' ,'is-12' : layout == 'list' }"  v-for="product in products.data" v-if="! isLoading">
      <card-product :product="product"></card-product>     
    </div>   
      
    </div>
    <vue-pagination  v-bind:pagination="pagination"
                 v-on:click.native="getProducts(pagination.current_page)"
                 :offset="2">
</vue-pagination>
  <!-- </div>    -->
</div>
  </div>
</div>





  <!-- </article> -->

  

@endsection

@push('scripts')
<script type="text/javascript">

$(window).scroll(function () {
if ($(window).scrollTop() >= 150) {
$('.navbar').addClass('is-info');
} else {
$('.navbar').removeClass('is-info');
}
});

Vue.component('layout',{
  template:
  `<div>
    <a  @click="changeLayout('grid')">
      <span class="icon">
     <i class="fa fa-bars"></i>
    </span>  
    </a>

    <a @click="changeLayout('list')">
      <span class="icon">
     <i class="fa fa-th-large"></i>
    </span>  
    </a>
  </div>`,
  data(){
    return{
      layout:'grid',
    }
  },
  methods:{
    changeLayout(layout){
      this.$emit('changed',layout);
    }
  }
});


Vue.component('image-product',{
  template:`<img v-bind:src=imgSrc v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard" v-bind:class="{ '':isHover,'hover':!isHover }" />`,
  props:['imgSrc'],
  data(){
      return {
        isHover:true,
      };
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
})
  
  Vue.component('outstock-label',{
    template:``,
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
     <transition name="fade">
    <div class="pricing-plan" v-bind:class="{'': !isHover, 'is-active':isHover }">
    
    <div class="plan-header">
    <figure class="image is-4by3">
        <div v-for="image in product.product_image">
          <img v-bind:src="image.name" alt="Placeholder image" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard">
           <div class="ribbon"><span>POPULAR</span></div>
        </div>
      </figure>
    @{{ product.name }}</div>
    <div class="plan-price"><span class="plan-price-amount"><span class="plan-price-currency"></span>@{{ product.price | currency }}</span></div>
    <div class="plan-items">
      <div class="plan-item">@{{ product.brand.name }}</div>
      <div class="plan-item">
      <div class="tags"  v-if="product.categories">
      <span class="tag is-info" v-for="category in product.categories">@{{ category.name }}</span> 
      </div>
      </div>
    </div>
    <div class="plan-footer">
       <buy-btn :url="product.id" v-if="product.stock >= 1"></buy-btn>
              <span v-else="product.stock == 0" class="tag is-danger">Out Of Stock</span>  
    </div>
  </div>
</transition>

   

`,
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

  // Vue.component('list-search',{
  //   template:`<div>
  //   @{{ result }}
  //   <input type="text" v-model="searchText" />
  //       <ul><li v-for="p in cek">
  //           <div class="name" 
  //              v-html="highlightText(p.name, 'i')">
  //           </div>
  //       </li></ul>
  //   </div>`,
  //   data(){
  //     return{
  //       searchText:'',
  //     }
  //   },
  //   methods: {
  //   highlightText: function (words, query) {
  //     function pregQuote (str) {
  //       return (str.trim() + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1")
  //     }
  //     var iQuery = new RegExp(pregQuote(query), 'ig')
  //     return words.toString().replace(iQuery, function (matchedTxt, a, b) {
  //       return ('<span class=\'highlight\'>' + matchedTxt + '</span>')
  //     })
  //   }
  // },
  //   mounted(){
  //       store.dispatch('FETCH_PRODUCTS')
  //   },
  //   computed:{
  //     cek(){
  //       return store.getters.dataProducts;
  //     },
  //     result(){
  //       var self = this;
  //       return this.cek.filter(t=>{
  //         return t.name.includes(self.searchText);
  //       });
  //     }
  //   }
  // })
 
  new Vue({
    store,
    // mapGetters,
    el:"#app",
    data:{
      name:'wkwkwk',
      // isHover:false,
       products:'',
       isLoading:true,
       inputSearch:null,
       order:null,
       per_page:3,
       categories:JSON.parse('{!! App\Models\Category::all() !!}'),
       checked:[],
       counter: 0,
       pagination: {
            total: 0,
            per_page: 1,
            from: 1,
            to: 0,
            current_page: 1
       },
       // searchText:'',
       offset: 4,
       layout:'grid',
       api:{
        url:'api/productspaginate?page=',
       }
    },
    watch:{
      checked(value){
        this.filterProducts();
      }
    },
    methods:{
      getProducts:function(page){
        this.isLoading = true;  
          setTimeout(() => {
          axios.get(this.api.url.concat(page),{params:{'per_page':this.per_page}}).then((response)=>{
            this.products=response.data;
            this.pagination = response.data;
          }).catch((error) =>{
            console.log(error);
          });
          this.isLoading = false;
        }, 1000)
      },
      searchProducts(){
        axios.get('api/products/search',{params:{ val:this.inputSearch }}).then((response)=>{
          this.products=response.data;
        })
      },
      changeLayout(layout){
          this.layout = layout ;
      },
      filterProducts(){
        var url='api/products/filter';
       this.$nextTick(function () {
          var self=this;
          axios.get(url,{params:{order:this.order,categories:this.checked,per_page:this.per_page}}).then((response)=>{
          this.products=response.data;
         });
        })
      },
      test(){
      alert()
      },
    },
    mounted(){      
        this.getProducts(this.pagination.current_page)
    },
    computed:{
      // cek(){
      //   return store.getters.dataProducts;
      // }
      
      cek(){
        // return store.getters.dataProducts.;
        return mapGetters(['dataProducts']);
      },

      checkedAll: {
        
        get() {
          return this.checked.length === this.categories.length
        },
        
        set(value) {
          this.checked = []
          
          if (value) {
            this.categories.forEach(category => this.checked.push(category.id))
          }
        },        
      }

    }
  })
</script>
@endpush