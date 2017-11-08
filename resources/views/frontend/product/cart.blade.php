@extends('frontend.layout.master')

@section('content')
<list-cart></list-cart>
  <input type="submit" class="button is-info" name="" value="Confirm" />
<hr>

<div>
	<select class="js-example-basic-single" name="state" style="width: 200px">
  <option v-for="province in provinces" value="province.province_id">@{{ province.province }}</option>
</select>
	
</div>


@endsection

@push('scripts')

<script type="text/javascript">

  new Vue({
    store,
    el:"#app",
    data:{
    	provinces:null
    },
    mounted(){
    	 $('.js-example-basic-single').select2();
    	let url='test';
    	axios.get(url).then(response=>{
    		this.provinces=response.data.rajaongkir.results;
    	})
    }

  })
</script>
@endpush