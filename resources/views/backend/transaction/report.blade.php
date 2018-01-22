@extends('backend.layout.master')

@section('content')
    
    <div class="column is-10">
        <div class="box">
        <div class="field">
            <div class="control">
            <div class="select">
                {!! Form::selectYear('year',date('Y'),'2017',null,['class'=>'','v-model'=>'year','v-on:change'=>'getReport']) !!}
            </div>                
            </div>
        </div>
        <bar :data-chart="chart_data"></bar>
      <!--   <bar-chart></bar-chart> -->
            <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
        </div>
    </div>



@endsection

@push('scripts')
<script>
// 
var data_chart=[];
var date=new Date();
var vm=new Vue({
    el:"#app",
    data:{
        year:date.getFullYear().toString(),
        chart_data:{}
    },
    watch:{
        year(value){
            this.getReport()
        }
    },
    mounted(){
        this.getReport()
    },
    methods:{
        getReport(){
            axios.get('api/report',{params:{year:this.year}}).then(response=>{
                this.chart_data={
                    labels:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets:[{
                        data:response.data,
                        backgroundColor:'#3498db',
                        label:"Transaction"
                    }]
                };
            })
        }
    }
})


var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['jan','feb','mar','apr','mei','jun','jul','agt','sept','okt','nov','des'],
        datasets: [{
            label: '# of Votes',
            data: data_chart,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});



</script>
@endpush