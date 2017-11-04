<template>
	<div>
		 <table class="table is-bordered is-striped is-narrow is-fullwidth">
		    <thead>
		      <th>Nama</th>
		      <th>Jumlah</th>
		      <th>Harga</th>
		      <th>Total</th>
		      <th>Action</th>
		    </thead>
		    <tbody>
		      <tr v-for="cart in carts">
		        <td>{{ cart.name }}</td>
		        <td>
		        <!-- <qty-field :val="cart.qty" :row-id="cart.rowId" :min="1" :id="cart.id"></qty-field> -->
		        </td>
		        <td>{{ cart.price }}</td>
		        <td>{{ cart.qty * cart.price }}</td>
		        <td>{{  }}</td>
		      </tr> 
		     <tr>
		        <td colspan="3">Sub TOTAL</td>
		        <td colspan="2">{{ total }}</td>
		      </tr>
		    </tbody>
		  </table>
	</div>
</template>

<script type="text/javascript">
	export default{		
	data(){
		
    },
    mounted(){
      store.dispatch('FETCH_CARTS')
   	  
    },
    methods:{
    
    },
    computed:{
        carts(){
        	return store.state.carts;
        }
    }
	}
</script>