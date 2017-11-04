<template>
      <div>
         <span class="icon is-small">
              <i class="fa fa-shopping-cart"></i>
            </span>
           <span class="tag is-primary tag-notif">{{ amountCart }}</span>
      </div>
</template>

<script type="text/javascript">
  export default{
    mounted(){
      this.getCarts()
    },
    data(){
      return{
        carts:0,
      }
    },
    methods:{
      getCarts(){
        let url='/olshop/public/carts';
        axios.get(url).then((response)=>{
        this.carts=response.data;
      })
      }
    },
    computed:{
      amountCart(){
        let carts=this.carts;
          Object.keys(carts).map(t=>{console.log(carts[t])})
        }
      }
  }
</script>