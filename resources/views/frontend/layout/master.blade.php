<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
       <!--  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://assets.hellogustav.com/fonts/bariol_bold-webfont.woff2">
 -->
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor.css') }}">
        <style type="text/css">
         .navbar-item.is-mega {
              position: static;

              .is-mega-menu-title {
                margin-bottom: 0;
                padding: .375rem 1rem;
              }
            }

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
 <section class="hero" style="background-image: url('img/breadcrum.jpg')">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Primary title
      </h1>
      <h2 class="subtitle">
        Primary subtitle
      </h2>
    </div>
  </div>
</section>

<div class="container">
  <div class="columns is-desktop">
  <div class="column">
  @yield('content')
</div>
</div>  
</div>


<div class="columns">
  <div class="column">
    @include("frontend.layout.footer")
  </div>
</div>


<!-- <div class="container">

<div class="tile is-ancestor"> -->

<!-- SIDEBAR -->

<!-- END SIDEBAR -->
<!-- <div class="tile is-parent">
    


  </div> -->

<!--   <div class="tile is-vertical is-9">
   
    <div class="tile is-parent"> -->
     <!-- <div class="columns is-dekstop">
        <div class="column is-12"> -->
         
        <!-- </div>
      </div> -->
    <!-- </div>
  </div>
   -->
<!-- </div> -->

<!-- </div> -->

<!-- footer -->
 
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


        </script>
        @stack('scripts')
    </body>
</html>
