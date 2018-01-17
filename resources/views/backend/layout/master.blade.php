<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">
<meta name="api-base-url" content="{{ url('/') }}" />

<body>
 
 @include('backend.layout.navbar')
<div id="app">
<simplert :useRadius="true"
          :useIcon="true"
          ref="simplert"></simplert>
            <div class="section">
    <div class="columns">
      <!-- START SIDEBAR -->
      @include('backend.layout.sidebar')
      <!-- END SIDEBAR -->
     

      <!-- START CONTENT -->
      	@yield('content')
      <!-- END CONTENT -->


     <!--  <main class="column">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <div class="title">Dashboard</div>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="button" class="button is-small">
                March 8, 2017 - April 6, 2017
              </button>
            </div>
          </div>
        </div>

        <div class="columns is-multiline">
          <div class="column">
            <div class="box notification is-primary">
              <div class="heading">Top Seller Total</div>
              <div class="title">56,950</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Sales $</div>
                    <div class="title is-5">250K</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Overall $</div>
                    <div class="title is-5">750K</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Sales %</div>
                    <div class="title is-5">25%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-warning">
              <div class="heading">Revenue / Expenses</div>
              <div class="title">55% / 45%</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Rev Prod $</div>
                    <div class="title is-5">30%</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Rev Serv $</div>
                    <div class="title is-5">25%</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Exp %</div>
                    <div class="title is-5">45%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-info">
              <div class="heading">Feedback Activity</div>
              <div class="title">78% &uarr;</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Pos</div>
                    <div class="title is-5">1560</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Neg</div>
                    <div class="title is-5">368</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Pos/Neg %</div>
                    <div class="title is-5">77% / 23%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-danger">
              <div class="heading">Orders / Returns</div>
              <div class="title">75% / 25%</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Orders $</div>
                    <div class="title is-5">425K</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Returns $</div>
                    <div class="title is-5">106K</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Success %</div>
                    <div class="title is-5">+ 28,5%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="columns is-multiline">
          <div class="column is-6">
            <div class="panel">
              <p class="panel-heading">
                Chart - Bar Style (Chart.js)
              </p>
              <div class="panel-block">
                <canvas id="chartBar" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
          <div class="column is-6">
            <div class="panel">
              <p class="panel-heading">
                Chart - Line Style (Chart.js)
              </p>
              <div class="panel-block">
                <canvas id="chartLine" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
          <div class="column is-6">
            <div class="panel">
              <p class="panel-heading">
                Chart - Doughnut Style (Chart.js)
              </p>
              <div class="panel-block">
                <canvas id="chartDoughnut" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
          <div class="column is-6">
            <div class="panel">
              <p class="panel-heading">
                Chart - Scatter Style (Chart.js)
              </p>
              <div class="panel-block">
                <canvas id="chartScatter" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div> -->
      </main>
    </div>
</div>
</div>
 <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
 <!-- <script type="text/javascript">
  Vue.component('countcart',{
      template:`
      <div>
         <span class="icon is-small">
              <i class="fa fa-shopping-cart"></i>
            </span>
            <span class="tag is-primary tag-notif">5</span>
            </div>`,
    })
  
    new Vue({
       store,
      el:"#app",

      methods:{
        confirmDelete(){
           let obj = {
          title: 'Alert Title',
          message: 'Alert Message',
          type: 'info',
          useConfirmBtn: true,
          customConfirmBtnText: 'OK',
          showXclose: true,
          // onConfirm: x
          }
          this.$refs.simplert.openSimplert(obj)
        }
      }
    })
  </script> -->

  <script type="text/javascript" src="{{asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  
  <script type="text/javascript">
         $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });

         $(document.body).on('click', '.js-submit-confirm', function(event) {
           event.preventDefault();
           var $form = $(this).closest('form');
    
          swal({
            title: "Are you sure?",
            text: "Are you sure that you want to leave this page?",
            icon: "warning",
            dangerMode: true,
             buttons: true,
          })
          .then(willDelete => {
            if (willDelete) {
              $form.submit();
            }
          });
         });

      </script>
@stack('scripts')
</body>
</html>