
@extends('frontend.layout.master')
@push('styles')
<style type="text/css">
  body {
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  height: 100%;
}
.button.is-success {
  background-color: #2EB398;
}

.aside {
  background-color: #232B2D;
}
.aside .uploader {
  background-color: #2EB398;
  height: 95px;
  margin:0 -10px;
  padding: 25px 30px;
}
.aside .uploader .button {
  background-color: transparent;
  border: 3px dashed #F6F7F7;
  padding: 20px 70px;
  color: #F6F7F7;
}
.aside .main {
  padding: 40px;
  color: #6F7B7E;
}
.aside .title {
  color: #6F7B7E;
  font-size: 12px;
  font-weight: bold;
  text-transform: uppercase;
}
.aside .main .item {
  display: block;
  padding: 10px 0;
  color: #6F7B7E;
}
.aside .main .item.active {
  color: #F6F7F7;
}
.aside .main .icon {
  font-size: 19px;
  padding-right: 30px;
}
.aside .main .name {
  font-size: 16px;
  font-weight: bold;
}
.content {
  display: block;
  background-color: #fff;
  padding: 40px 20px;
}
.nav.menu {
  background-color: #fff;
  border-bottom: 1px solid #e1e1e1;
  z-index: 1;
}
.nav.menu .nav-item .icon-btn {
  border: 3px solid #B7C6C9;
  border-radius: 90px;
  padding: 5px 7px;
  color: #B7C6C9;
}
.nav.menu .nav-item .icon-btn.thin {
  padding: 5px 8px;
}
.nav.menu .nav-item.is-active .icon-btn {
  color: #2EB398;
  border: 3px solid #2EB398;
}
.nav.menu .nav-item .icon-btn .fa {
  font-size: 20px;
  color: #B7C6C9;
}
.nav.menu .nav-item.is-active .icon-btn .fa {
  color: #2EB398;
}
.files {
  padding: 50px 0;
}
.file {
  display: block;
  padding: 20px;
}
a.file:not(.button) {
    border-bottom: none;
    border-radius: 4px;
}
.file:hover, .file.active, .file:active {
  background-color: #E4E9EB;
}
.file .image img {
  padding-bottom: 10px;
}
.file .name {
  font-weight: bold;
  word-wrap: break-word;
  word-break: break-all;
  font-size: 16px;
  color: #69707a;
}
.file .timestamp {
  font-weight: bold;
  font-size: 14px;
  color: #B9C2C4;
}


/*build css*/

.box {
  padding:50px;
  margin:50px;
  position:relative
}
.box .more-vue-demos {
  position:absolute;
  top:20px;
  right:20px
}
pre {
  width:500px;
  margin:20px auto;
  padding:20px
}
.carousel-cell {
  height:300px;
  width:500px;
  display:-ms-flex;
  display:flex;
  -ms-align-items:center;
  align-items:center;
  justify-content:center;
  background:#aaa;
  counter-increment:a
}
.carousel-cell:after {
  font-size:42px;
  content:counter(a)
}
.bg--default {
  background-color:#aaa
}
.bg--green {
  background-color:#53b96e
}
.bg--blue {
  background-color:#539bb9
}
.bg--red {
  background-color:#b95353
}
.bg--yellow {
  background-color:#bab353
}
.bg--orange {
  background-color:#b97953
}
.flickity-slider-demo {
  margin-bottom:20px;
  overflow:hidden;
  width:500px
}
button.is-blue {
  background-color:#539bb9;
  border-color:transparent;
  color:#fff
}
button.is-blue:hover {
  background-color:#468eac;
  border-color:transparent;
  color:#fff
}
.slide-selectors,.slide-selectors .slide-selector {
  display:-ms-flex;
  display:flex;
  -ms-align-items:center;
  align-items:center;
  justify-content:center
}
.slide-selectors .slide-selector {
  color:#fff;
  font-size:14px;
  height:50px;
  width:50px;
  margin:5px;
  cursor:pointer
}
/*set a border on the images to prevent shifting*/
 #gallery_01 img{border:2px solid white;}
 
 /*Change the colour*/
 .active img{border:2px solid #333 !important;}

</style>
@endpush
@section('content')

        <div class="column is-6">
          <div class="image is-2by2">
            <img id="zoom_01" width="100px" src="{!! asset($product->productImage->first()->name) !!}" zoom-data-image="{!! asset($product->productImage->first()->name) !!}"></img>  
          </div>


 <div class="slide-selectors">
  <div id="gallery_01">
  @foreach($product->productImage as $image)
  <div class="slide-selector">
    <!-- <img src="{!! asset($image->name) !!}" @click='choseImage("{!! $image->name !!}")'> -->
   
  <a href="#" data-image="{!! asset($image->name) !!}" data-zoom-image="{!! asset($image->name) !!}">
    <img id="img_01" src="{!! asset($image->name) !!}" />
  </a>


    </div>
     @endforeach
     </div>
 </div>
     <!--  <div class="column is-2">
           <a class="file">
             <div class="image is-3by2">
            <img src="{!! asset($image->name) !!}">
            </div>
           </a>            
        </div> -->
 


          <br>
          <p>Suspendisse sodales metus justo, ullamcorper iaculis purus interdum in. Sed ultricies enim felis, in interdum urna malesuada a. Morbi id ligula vel leo elementum dignissim quis vel purus. Donec iaculis, est ac maximus vestibulum, sapien mi lacinia urna, at laoreet felis lectus nec urna. Fusce egestas, neque vitae blandit scelerisque, leo arcu pellentesque risus, et volutpat neque nunc id massa. Aenean dapibus leo vel purus malesuada, eu ultrices nulla consequat. Duis erat orci, lobortis sed dictum id, pretium a nibh. Mauris pharetra ligula consequat gravida ornare.
          </p>
        </div>

        
        <div class="column is-5 is-offset-1">
          <div class="title is-2">{!! $product->name !!}</div>
          <p class="title is-3 has-text-muted">Rp.{!! $product->price !!}</p>
          <hr>
          <br>
          <p class="">
            <i class="fa fa-star title is-5" style="color:#ed6c63"></i>
            <i class="fa fa-star title is-5" style="color:#ed6c63"></i>
            <i class="fa fa-star title is-5" style="color:#ed6c63"></i>
            <i class="fa fa-star title is-5"></i>
            <i class="fa fa-star title is-5"></i>
            &nbsp; &nbsp;
            <strong>41 Reviews</strong>
            &nbsp; &nbsp;
            <a href="#">show all</a>
          </p>
          <br>
          
          <br>
          <br>
          <p class="">
          {!! Form::open(['url'=>route('addtocart',$product->id),'method'=>'POST']) !!}
            <input-stock :available-stock="{!! $product->stock !!}"></input-stock>
            &nbsp; &nbsp; &nbsp;
            
            <input type="submit" class="button is-primary" value="Add to cart"></input>
            {!! Form::close() !!}
          </p>
          <br>
          <table class="table">
            <tbody>
              <tr>
                <td class="has-text-right">
                  <strong>Item ID</strong>a
                </td>
                <td>1234</td>
              </tr>
              <tr>
                <td class="has-text-right">
                  <strong>Seller</strong>
                </td>
                <td>jsmith</td>
              </tr>
              <tr>
                <td class="has-text-right">
                  <strong>Added</strong>
                </td>
                <td>3 days ago</td>
              </tr>
              <tr>
                <td class="has-text-right">
                  <strong>Views</strong>
                </td>
                <td>3</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

 <!--    </div>
  </div> -->
  <div class="section">
    <div class="container">
      <div class="column is-9"> 
        
      <tabs>
        <tab name="Overview" :selected="true">
          <div class="box">Overview</div>
        </tab>

        <tab name="Details">
          <div class="box">Details</div>  
        </tab>

        <tab name="Price">
          <div class="box">Price</div> 
        </tab>


        <tab name="Test">
          <div class="box">Test</div>  
        </tab>
      </tabs>
</div>
</div>
</div>
@endsection
@push('scripts')

<script type="text/javascript">

  Vue.component('input-stock',{
    template:`
    <div>
       <a v-on:click="decStock">
              <i class="fa fa-minus cart-icon"></i>
            </a>
            &nbsp;
            <input type="text" name="qty" class="input has-text-centered" v-model="stock" :value="stock" style="width:50px;" @keyup="avStock">
            &nbsp;
            <a v-on:click="incStock">
              <i class="fa fa-plus cart-icon"></i>
            </a>
    </div>
    `,
    props:['availableStock'],
    data(){
      return{
        stock:1
      }
    },
    methods:{
      avStock(){
        if(this.stock < this.availableStock && this.stock > 0){
          this.stock = this.stock;
        }else{
          this.stock = 1;  
        }
        
      },
      incStock:function(){
        if(this.stock >= this.availableStock ){
            this.stock = this.availableStock
        }else{
          this.stock += 1  
        }
        
      },
      decStock:function(){
        if(this.stock == 1){
          this.stock=1
        }
        else{
          this.stock -= 1  
        }
        
      }
    }
  })

  new Vue({
    el:"#app",
     data:{
      imageName:'{!! asset($product->productImage->first()->name) !!}'
    },
      methods:{
      choseImage(val){
        this.imageName ="{!! asset('') !!}"+"/"+val;
      },
    }

  })
</script>
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript">
// $(document).ready(function(){
//      $('#zoom_01').elevateZoom({
//         zoomType  : "lens",
//         lensShape : "round",
//         lensSize  : 150
//     });   
// })

$("#zoom_01").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'}); 

//pass the images to Fancybox
$("#img_01").bind("click", function(e) {  
  var ez =   $('#img_01').data('elevateZoom'); 
  $.fancybox(ez.getGalleryList());
  return false;
});

</script>
@endpush
</body>
</html>

  
