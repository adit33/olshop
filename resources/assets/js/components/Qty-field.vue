<template>
  <div class="field">
    <input type="number" class="input" :class="{'is-danger':isError}" :max="availableStock" :min="min" :value="val" v-model="qty" v-on:blur="updateItem"></input>
     <p v-if="isError" class="help is-danger">Stok Tersedia @{{ availableStock }}</p>
  </div>
  </template>


  <script type="text/javascript">
    export default{
      props:['min','val','row-id','id'],
  data(){
    return {
      qty:this.val,
      isError:false,
      availableStock:0,
    }
  },
  mounted(){
    this.getAvailableStock()
  },
  methods:{
    cekQty(){
      this.isError = false;
      if ( parseInt(this.qty) > parseInt(this.availableStock) || this.qty <= 0){
        this.isError = true;
        this.qty = this.val;
      }    
        
    },
    updateItem(){
      let url="/olshop/public/cart/:row-id/update";
      url = url.replace(':row-id', this.rowId);

      this.cekQty()

      if(this.isError == false){
          axios.put(url,{
            qty:this.qty,
            rowId:this.rowId
          }).then((response)=>{
            // this.$parent.carts=response.data;
            store.dispatch('FETCH_CARTS');
          })  
      }

      
    },
     getAvailableStock(){
        var stock=axios.get('api/product/'+this.id).then((response)=>{
          this.availableStock = response.data;
        })
      }
  }   
    }
  </script>
  