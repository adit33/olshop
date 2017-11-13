@extends('frontend.layout.master')

@section('content')
<list-cart></list-cart>
  <input type="submit" class="button is-info" name="" value="Confirm" />
<hr>

<div>
@{{ province_id }}
Province :
<select class="js-example-basic-single" name="state" style="width: 200px"  v-model="province_id" v-select="getCity(province_id)">
  <option v-for="province in provinces" :value="province.province_id">@{{ province.province }}</option>
</select>
	
City :
<select class="js-example-basic-single" name="state" style="width: 200px">
  <!-- <option v-for="province in provinces" value="province.province_id">@{{ province.province }}</option> -->
  <option v-for="city in cities" :value="city.city_id">@{{ city.type }} @{{  city.city_name }}</option>
</select>  
</div>


@endsection

@push('scripts')

<script type="text/javascript">
  Vue.directive('select', {
  twoWay: true,
  bind: function (el, binding, vnode) {
    $(el).select2().on("select2:select", (e) => {
      // v-model looks for
      //  - an event named "change"
      //  - a value with property path "$event.target.value"
      el.dispatchEvent(new Event('change', { target: e.target }));
    });
  },
})

  new Vue({
    store,
    el:"#app",
    data:{
      province_id:'',
    	provinces:[],
      cities:[]
    },
    mounted(){
    	 $('.js-example-basic-single').select2();
    	 this.getProvince();
    },
    methods:{
      getProvince(){
        let url='province';
        axios.get(url).then(response=>{
          this.provinces=response.data.rajaongkir.results;
        })
      },
      getCity(province_id){  
        let url='city';
        axios.get(url,{params:{id:province_id}}).then(response=>{
          this.cities=response.data.rajaongkir.results;
        })
        alert('tt')
      }
    }

  })
</script>
@endpush