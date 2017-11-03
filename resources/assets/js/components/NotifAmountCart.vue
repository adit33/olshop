Vue.component('countcart',{
      template:`
      <div>
         <span class="icon is-small">
              <i class="fa fa-shopping-cart"></i>
            </span>
            <span class="tag is-primary tag-notif">@{{ amountCart }}</span>
            </div>`,
      props:['amount-cart'],      
      data(){
        return{
        }
      },
      methods:{
        updateItem(){
          this.$emit('updated');
        }
      }
    })

<template>
      
</template>

<script type="text/javascript">
  export default{
    
  }
</script>