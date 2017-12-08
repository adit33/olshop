<template>
  <div>
    <div class="steps">
    <slot></slot>
    </div>
    <div>
      <slot name="content"></slot>  
    </div> 
  </div>
  
  <!-- content -->
  <!-- <content></content> -->
</template>

<script type="text/javascript">
  export default{
    data(){
      return{
        steps:[]
      }
    },
     mounted(){
        console.log(this.$children)
      },
    created(){
      this.steps = this.$children;
    }
  }
</script>