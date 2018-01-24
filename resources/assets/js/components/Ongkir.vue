<template>
	<div>
		<div>
		  <label class="typo__label">Provinsi</label>
		  <multiselect v-model="province_id" :options="provinces" placeholder="Select one" label="province" track-by="province" @input="getCity(province_id)"></multiselect>
		</div>
			

		<div v-if="provinces != '' ">
		  <label class="typo__label">Kota</label>
		  <multiselect v-model="city_id" :options="cities" :custom-label="city" placeholder="Select one" label="city_name" track-by="city_name" ></multiselect>
		</div>


		<div v-if="cities != '' ">
		  <label class="typo__label">Kurir</label>
		  <multiselect v-model="courier_id" :options="courier" :searchable="false" @input="postCost" :close-on-select="false" :show-labels="false" placeholder="Pick a value"></multiselect>
		</div>

		<table v-if="costs != '' " class="table is-bordered is-striped is-narrow is-fullwidth">
		  <th>Service</th>
		  <th>Description</th>
		  <th>Value</th>
		  <th>Etd</th>
		  <th>Action</th>
		  <tr v-for="(value , key) in costs.costs">
		    <td>{{ value.service }}</td>
		    <td>{{ value.description }}</td>
		    <td>{{ value.cost[0].value }}</td>
		    <td>{{ value.cost[0].etd }}</td>
		    <td><input type="radio" v-model="ongkir" :value="value" @change="setOngkir"></td>
		  </tr>
		</table>

		<div v-if="costs != ''">
			Alamat Lengkap:
			<input type="textarea" v-model="alamat" name="alamat" />
		</div>
		  
		</div>

</template>

<script type="text/javascript">
	export default{
	data(){
		return{
		  province_id:'',
	      city_id:'',
	      provinces:[],
	      cities:[],
	      courier_id:'',
	      courier:['jne','pos','tiki',],
	      costs:[],
	      ongkir:{},
	      alamat:'',
	      destination:{},
	      code:'',
	      service:''
		}
    },
    mounted(){
    	 // $('.js-example-basic-single').select2();
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
          this.costs=response.data.rajaongkir.results[0];
          this.destination=response.data.rajaongkir.destination_details;
          this.code=response.data.rajaongkir.results[0].code;
        })
      },
      city({city_name,type}){
        return `${type} ${city_name}`
      },
      setOngkir(){
      	this.destination.alamat=this.alamat;
      	store.commit('SET_DESTINATION',this.destination);
      	store.commit('SET_ONGKIR',this.ongkir.cost[0].value);
      	store.commit('SET_SERVICE',this.ongkir.service);
      	store.commit('SET_CODE',this.courier_id);
      }
    }
	}
</script>

