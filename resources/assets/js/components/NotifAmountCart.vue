<template>
      <div>
         <span class="icon is-small">
              <i class="fa fa-shopping-cart"></i>
            </span>
           <span v-if="ammountCart > 0" class="tag is-primary tag-notif">{{ amountCart }}</span>
      </div>
</template>

<script type="text/javascript">
  export default{
    mounted(){
      store.dispatch('FETCH_CARTS');
    },
    data(){
      return{
        
      }
    },
    methods:{
      
    },
    computed:{
      amountCart(){
          if(store.state.carts != null){
          var x= Object.keys(store.state.carts).map(t=>{ return store.state.carts[t].qty });
          return x.reduce((sum,val)=> parseInt(sum) + parseInt(val),0);
        }
        }
      }
  }
</script>