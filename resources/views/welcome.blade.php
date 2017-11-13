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

</style>
@endpush

@section('content')
<article class="tile is-child box">
<ul class="menu-list">
    @foreach(App\Models\Category::all() as $category)
      <li><input type="checkbox" @click="filterProducts" v-model="categories" name="category_id[]" value="{!! $category->id !!}">{!! $category->name !!}</li>
    @endforeach
  </ul>
<layout @changed="changeLayout"></layout>

<div class="field">
  <label class="label">Sort By</label>
  <div class="control">
    <div class="select">
      <select v-model="order" @change="filterProducts">
        <option >Select dropdown</option>
        <option value="price,asc">Harga Termurah</option>
        <option value="price,desc">Harga Termahal</option>
        <option value="name,asc">Nama A-Z</option>
        <option value="name,desc">Nama Z-A</option>
      </select>
    </div>
  </div>
</div>


<hr>
 
<div class="columns is-multiline">
<img v-if="isLoading" src="{!! asset('img/loading.gif') !!}" style="display: block; margin: 0 auto;" />
      <div class="column" :class="{ 'is-4' : layout == 'grid' ,'is-12' : layout == 'list' }" v-for="product in products.data" v-if="! isLoading">
<card-product :product="product"></card-product>
      </div>
  
</div>

<vue-pagination  v-bind:pagination="pagination"
                 v-on:click.native="getProducts(pagination.current_page)"
                 :offset="2">
</vue-pagination>

  </article>

  

@endsection

@push('scripts')
<script type="text/javascript">
Vue.component('layout',{
  template:
  `<div>
    <a href="#" @click="changeLayout('grid')">
      <span class="icon">
     <i class="fa fa-bars"></i>
    </span>  
    </a>

    <a href="#" @click="changeLayout('list')">
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
   <div class="card" v-bind:class="{'': !isHover, 'hover':isHover }">
    <div class="card-image">
      <figure class="image is-4by3">
        <div v-for="image in product.product_image">
          <img v-bind:src="image.name" alt="Placeholder image" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard">
           <div class="ribbon"><span>POPULAR</span></div>
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
               
              
              <buy-btn :url="product.id" v-if="product.stock >= 1"></buy-btn>
              <span v-else="product.stock == 0" class="tag is-danger">Out Of Stock</span>  
              
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
       categories:[],
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
        url:'api/products?page=',
       }
    },
    methods:{
      getProducts:function(page){
        this.isLoading = true;  
          setTimeout(() => {
          axios.get(this.api.url.concat(page)).then((response)=>{
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
        axios.get(url,{params:{order:this.order,categories:this.categories}}).then((response)=>{
          this.products=response.data;
        });
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
      }

    }
  })
</script>
@endpush