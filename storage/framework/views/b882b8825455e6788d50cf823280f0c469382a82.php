<?php $__env->startPush('styles'); ?>
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
#loading {
    background-image: url("img/loading.gif");
    background-repeat: no-repeat;
    background-position: center;
    z-index: 20;
}
.hide{
  z-index: -1;
}
.overlay {
    background: #e9e9e9;
    /*display: none;*/
  
    opacity: 0.5;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
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
          <p class="title is-4">{{ product.name }}</p>
          <p class="subtitle is-6">Rp. {{ product.price }}</p>
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
<article class="tile is-child box" :class="{ 'overlay' : isLoading }">
<div class="field has-addons">
  <div class="control">
    <input class="input" type="text" v-model="inputSearch" placeholder="Find a product">
  </div>
  <div class="control">
    <a @click="searchProducts" class="button is-info">
      Search
    </a>
  </div>
</div>
 
<div class="columns is-multiline">
<img v-if="isLoading" src="<?php echo asset('img/loading.gif'); ?>" style="display: block; margin: 0 auto;" />
      <div class="column is-4" v-for="product in products.data" v-if="! isLoading">
<card-product :product="product"></card-product>
      </div>
  
</div>
 <nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a class="pagination-previous" @click="getProducts(products.prev_page_url)">Previous</a>
  <a class="pagination-next"     @click="getProducts(products.next_page_url)">Next page</a>
  <ul class="pagination-list">
    <li><a class="pagination-link" aria-label="Goto page 1">{{ products.from }}</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
    <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
    <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link" aria-label="Goto page 86">{{ products.last_page }}</a></li>
  </ul>
</nav>
  </article>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
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
          <p class="title is-4">{{ product.name }}</p>
          <p class="subtitle is-6">Rp. {{ product.price }}</p>
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
 
  new Vue({
    el:"#app",
    data:{
      name:'wkwkwk',
      // isHover:false,
       products:'',
       isLoading:true,
       inputSearch:null,
       api:{
        url:'api/products',
       }
    },
    methods:{
      getProducts:function(url){
        this.isLoading = true;
        var self=this;        
          setTimeout(() => {
          axios.get(url).then(function(response){
            self.products=response.data;
          }).catch(function (error) {
            console.log(error);
          });
          this.isLoading = false;
        }, 3000)
      },
      searchProducts(){
        var self = this;
        axios.get('api/products/search',{params:{ val:this.inputSearch }}).then(function(response){
          self.products=response.data;
        })
      }
    },
    mounted(){      
        this.getProducts(this.api.url)
    }  
  })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>