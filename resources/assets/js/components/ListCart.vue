<template>
	<div v-if="total != 0">
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
		        <qty :val="cart.qty" :row-id="cart.rowId" :min="1" :id="cart.id"></qty>
		        </td>
		        <td>{{ cart.price }}</td>
		        <td>{{ cart.qty * cart.price }}</td>
		        <td><a class="delete" @click="deleteItem(cart.rowId)"></a></td>
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
	import qty from './Qty-field.vue';
	export default{	
	components:{
		qty
	},	
	data(){
		return{

		}
    },
    mounted(){
      store.dispatch('FETCH_CARTS')
   	  
    },
    methods:{
    	deleteItem(rowId){
    		let url="/olshop/public/cart/:row-id/delete";
      		url = url.replace(':row-id', rowId);

    		axios.get(url,{
            	rowId:rowId
          }).then((response)=>{
          		store.dispatch('FETCH_CARTS');
          })
    	}
    },
    computed:{
        carts(){
        	return store.state.carts;
        },
        total(){
        	if(store.state.carts != null){
        	var x= Object.keys(store.state.carts).map(t=>{ return store.state.carts[t].subtotal });
        	return x.reduce((sum,val)=>sum + val,0);}
        }
    }
	}
</script>