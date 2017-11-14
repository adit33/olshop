@extends('frontend.layout.master')

@section('content')
<list-cart></list-cart>
  <input type="submit" class="button is-info" name="" value="Confirm" />
<hr>

<div>
@{{ province_id }}
Province :
<!-- <select class="js-example-basic-single" name="province" style="width: 200px" onchange="getCity()" id="province">
  <option v-for="province in provinces">@{{ province.province }}</option>
</select> -->
<div>
  <label class="typo__label">Provinsi</label>
  <multiselect v-model="province_id" :options="provinces" placeholder="Select one" label="province" track-by="province" @input="getCity(province_id)"></multiselect>
</div>
	

<div>
  <label class="typo__label">Kota</label>
  <multiselect v-model="city_id" :options="cities" :custom-label="city" placeholder="Select one" label="city_name" track-by="city_name" ></multiselect>
</div>


<div>
  <label class="typo__label">Kurir</label>
  <multiselect v-model="courier_id" :options="courier" :searchable="false" @input="postCost" :close-on-select="false" :show-labels="false" placeholder="Pick a value"></multiselect>
</div>
  
</div>


@endsection

@push('scripts')

<script type="text/javascript">

function getCity(){
  var province_id=$("#province").val();
  vm.getCity(province_id);
}

  Vue.directive('select', {
  twoWay: true,
  bind: function (el, binding, vnode) {
    $(el).select2().on("select2:select", (e) => {
      // v-model looks for
      //  - an event named "change"
      //  - a value with property path "$event.target.value"
      el.dispatchEvent(new Event('change', { target: e.target }));
      // vm.getCity(e.params.data.id)
      console.log($(el).select2());
    });
  },
})

var vm=new Vue({
    store,
    el:"#app",
    data:{
      province_id:'',
      city_id:'',
    	provinces:[],
      cities:[],
      courier_id:'',
      courier:['jne','pos','tiki',],
      cost:[]
    },
    mounted(){
    	 $('.js-example-basic-single').select2();
    	 this.getProvince();
    },
    methods:{
      getProvince(){
       this.cities="";
        let url='province';
        axios.get(url).then(response=>{
          this.provinces=response.data.rajaongkir.results;
        })
      },
      getCity(province_id){  
        let url='city';
        axios.get(url,{params:{id:province_id.province_id}}).then(response=>{
          this.cities=response.data.rajaongkir.results;
        })
      },
      postCost(){
        let url='cost';
        axios.post(url,{origin:22,destination:this.city_id.city_id,weight:1000,courier:this.courier_id})
        .then(response=>{
          this.cost=response.data.rajaongkir.results;
        })
      },
      city({city_name,type}){
        return `${type} ${city_name}`
      }
    }

  })
</script>
@endpush