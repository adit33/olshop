<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://assets.hellogustav.com/fonts/bariol_bold-webfont.woff2">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
          .container{
            margin-top: 50px;
          }

          .footer{
            margin-top: 50px;
          }
          /* external css: flickity.css */

          * { box-sizing: border-box; }

          .carousel {
            background: #EEE;
            margin-bottom: 50px;
          }

          .carousel-cell {
            width: 66%;
            height: 200px;
            margin-right: 10px;
            background: #8C8;
            border-radius: 5px;
            counter-increment: carousel-cell;
          }

          /* cell number */
          .carousel-cell:before {
            display: block;
            text-align: center;
            content: counter(carousel-cell);
            line-height: 200px;
            font-size: 80px;
            color: white;
          }
          .navbar{

          }
          .button.circle{
            border-radius: 50%;
            height: 50px;
            width: 50px;
            background-color: #33d2ee;
            color: #FFF;
            z-index: 999;
            position: fixed;
            right: 20px;
            bottom: 20px;
          }
          .fade-enter-active,
          .fade-leave-active {
            transition: opacity .5s
          }
          .fade-enter,
          .fade-leave-to{
              opacity: 0
          }
        </style>
        @stack('styles')
     </head>
    <body>
    <div id="app">
 @include("frontend.layout.navbar")
<div class="container">

<div class="tile is-ancestor">

<!-- SIDEBAR -->
 @include("frontend.layout.left_sidebar")
<!-- END SIDEBAR -->
<!-- <div class="tile is-parent">
    


  </div> -->

  <div class="tile is-vertical is-9">
   
    <div class="tile is-parent">
      @yield('content')
    </div>
  </div>
  
</div>

</div>

<!-- footer -->
 @include("frontend.layout.footer")
<!-- end footer -->
</div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

 

 // new Vue({
 //    store,
 //    el:"app",
 //    data:{
 //      carts:null
 //    },
 //    mounted(){
 //      this.getCarts()
 //      console.log(this.carts)
 //      store.commit('SET_TITLE','ckckckckck')
 //    },
 //    methods:{
 //      getCarts(){
 //        let url="{{ route('carts') }}";
 //        var self = this
 //        axios.get(url).then((response)=>{
 //          this.carts = response.data;

 //        })
 //      },
 //    },
 //    computed:{
 //        total(){
 //          let carts=this.carts;
 //          for(cart in carts){
 //            return +carts[cart].subtotal;
 //          }
 //        },
 //        amountCart(){
 //          let carts=this.carts;
 //          for(cart in carts){
 //            return +carts[cart].qty;
 //          }
 //        }
 //    }
 // })


// var amountScrolled = 300;

// $(window).scroll(function() {
//     if ( $(window).scrollTop() > amountScrolled ) {
//         $('a.sf-back-to-top').fadeIn('slow');
//     } else {
//         $('a.sf-back-to-top').fadeOut('slow');
//     }
// });

// $('a.sf-back-to-top').click(function() {
//     $('html, body').animate({
//         scrollTop: 0
//     }, 700);
//     return false;
// });


 // new Vue({
 //    el:"#app",
 //    data:{
 //      amountScrolled : 300,
 //    },
 //    mounted(){

 //    },
 //    methods:{
 //      showButtonUp(){
 //        if(document.body.scrollTop > this.amountScrolled || document.documentElement.scrollTop > this.amountScrolled){
 //          document.getElementsByClassName("sf-back-to-top").fadeIn('slow');
 //        }else{
 //          document.getElementsByClassName("sf-back-to-top").fadeOut('slow');
 //        }
 //      }
 //    }
 // })

        </script>
        @stack('scripts')
    </body>
</html>
