@extends('frontend.layout.master')
@section('content')
 <!--  <div class="section product-header">
    <div class="container">
      <div class="columns">
        <div class="column"> -->
          <span class="title is-3">{!! $product->name !!}</span>
          <span class="title is-3 has-text-muted">&nbsp;|&nbsp;</span>
          <span class="title is-4 has-text-muted">Category</span>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-6">
          <div class="image is-2by2">
          @foreach($product->productImage as $image)
            <img src="{!! asset($image->name) !!}">
          @endforeach
          </div>
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
          <p>Suspendisse sodales metus justo, ullamcorper iaculis purus interdum in. Sed ultricies enim felis, in interdum urna malesuada a. Morbi id ligula vel leo elementum dignissim quis vel purus. Donec iaculis, est ac maximus vestibulum, sapien mi lacinia urna, at laoreet felis lectus nec urna. Fusce egestas, neque vitae blandit scelerisque, leo arcu pellentesque risus, et volutpat neque nunc id massa. Aenean dapibus leo vel purus malesuada, eu ultrices nulla consequat. Duis erat orci, lobortis sed dictum id, pretium a nibh. Mauris pharetra ligula consequat gravida ornare.
          </p>
          <br>
          <br>
          <p class="">
            <input-stock :available-stock="{!! $product->stock !!}"></input-stock>
            &nbsp; &nbsp; &nbsp;
            <a class="button is-primary">Add to cart</a>
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
 <!--    </div>
  </div> -->
  <div class="section">
    <div class="container">
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
<!-- </div>
</div> -->
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
            <input type="text" name="" class="input has-text-centered" :value="stock" style="width:50px;">
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

  
