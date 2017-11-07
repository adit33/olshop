@extends('frontend.layout.master')

@section('content')
<list-cart></list-cart>
  <input type="submit" class="button is-info" name="" value="Confirm" />
<hr>

<select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
</select>


@endsection

@push('scripts')

<script type="text/javascript">

  new Vue({
    store,
    el:"#app",
    data:{

    },
    mounted(){
    	 $('.js-example-basic-single').select2();
    	let url='test';
    	axios.get(url).then(response=>{
    		console.log(response.data);
    	})
    }

  })
</script>
@endpush