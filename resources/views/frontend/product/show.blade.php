
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
</style>
@endpush
@section('content')
        <div class="column is-6">
          <div class="image is-2by2">
          @foreach($product->productImage as $image)
            <img id="zoom_01" src="{!! asset($image->name) !!}" data-zoom-image="{!! asset($image->name) !!}">
          @endforeach
          </div>
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
                  <strong>Item ID</strong>
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

 @foreach($product->productImage as $image)
      <div class="column is-2">
           <a class="file">
             <div class="image is-3by2">
            <img src="{!! asset($image->name) !!}">
            </div>
           </a>            
        </div>
  @endforeach
 <!--    </div>
  </div> -->
  <div class="section">
    <div class="container">
      <div class="column is-9"> 
      <div class="tabs">
        <ul>
          <li class="is-active"><a>Overview</a></li>
          <li><a>Details</a></li>
          <li><a>Reviews</a></li>
          <li><a>Shipping Calculator</a></li>
        </ul>
      </div>
      <div class="box">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula magna, tempus sed nisi in, convallis porttitor quam. Quisque auctor nisl metus, quis rhoncus mi molestie non. Phasellus ornare nisi et lobortis lacinia. Mauris quis dolor vulputate, malesuada lacus at, gravida ipsum. Nam a viverra mi. Aenean at consequat libero, in porta diam. In id ipsum nec purus mattis blandit quis sed nisi. Suspendisse nulla tellus, viverra eu urna ut, mollis pulvinar sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin non magna sagittis, facilisis augue sed, ultricies felis. Mauris at neque sed nisl mollis aliquet. Etiam lacinia auctor dolor, sed condimentum odio efficitur a.
        </p><br><p>

        Sed at risus enim. Nunc aliquet tellus a purus blandit lobortis. Duis condimentum sapien sed orci ornare mollis. Praesent eleifend ante magna, quis commodo risus pellentesque in. Donec eget porta leo. Sed vel dictum est. Ut dui lorem, volutpat vel risus in, dictum euismod ex. Aenean laoreet dapibus nulla, nec viverra massa feugiat vitae. Vestibulum elementum nec nisi dictum rhoncus. Nam placerat mi eu tortor tincidunt commodo. Duis posuere, sapien a laoreet dapibus, elit tortor laoreet est, eget dapibus dui justo vitae ipsum. Praesent sed augue nec leo hendrerit iaculis sit amet efficitur ante. Nunc ac maximus mauris. Sed luctus erat id elit tempor, a aliquam lacus sodales.
      </p><br><p>

      Suspendisse sodales metus justo, ullamcorper iaculis purus interdum in. Sed ultricies enim felis, in interdum urna malesuada a. Morbi id ligula vel leo elementum dignissim quis vel purus. Donec iaculis, est ac maximus vestibulum, sapien mi lacinia urna, at laoreet felis lectus nec urna. Fusce egestas, neque vitae blandit scelerisque, leo arcu pellentesque risus, et volutpat neque nunc id massa. Aenean dapibus leo vel purus malesuada, eu ultrices nulla consequat. Duis erat orci, lobortis sed dictum id, pretium a nibh. Mauris pharetra ligula consequat gravida ornare.
    </p><br><p>

    Sed a gravida sapien. Nam malesuada feugiat nunc, eu varius risus suscipit non. Nulla vitae odio fermentum, varius ligula et, iaculis enim. Mauris tempor in dolor non aliquet. Pellentesque ac mauris a augue tempus pharetra. Nulla facilisi. Vivamus sit amet lacus sagittis, ullamcorper nisi sit amet, consequat eros. Sed faucibus nulla vitae erat tristique ornare.
  </p><br><p>

  Nullam sit amet magna ipsum. In tincidunt tincidunt tellus. Duis maximus vulputate elit sit amet auctor. Vestibulum a nunc consectetur, accumsan arcu eu, dapibus est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec vitae massa eget nulla gravida porta eu et sem. Sed in lorem id lectus auctor lobortis sed vel libero. Nam dapibus risus eu sodales consectetur. Fusce luctus sollicitudin ante et sodales. Curabitur eget justo turpis. Vestibulum vel nunc tellus. Morbi accumsan urna nibh, at malesuada odio faucibus accumsan.
</p>

</div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript">
  $("#zoom_01").elevateZoom();
</script>
<script type="text/javascript">
  Vue.component('input-stock',{
    template:`
    <div>
       <a v-on:click="decStock">
              <i class="fa fa-minus cart-icon"></i>
            </a>
            &nbsp;
            <input type="text" name="qty" class="input has-text-centered" :value="stock" style="width:50px;">
            &nbsp;
            <a v-on:click="incStock">
              <i class="fa fa-plus cart-icon"></i>
            </a>
    </div>
    `,
    props:['availableStock'],
    data(){
      return{
        stock:1,
        availableStock:null
      }
    },
    // computed:{
    //   stock:function(){
    //     if(this.stock < 0){
    //       let stock = 0;
    //     }
    //     return stock;
    //   }
    // },
    methods:{
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

  })
</script>
@endpush
</body>
</html>

  
