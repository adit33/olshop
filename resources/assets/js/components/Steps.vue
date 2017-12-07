<template>
  <div>
    <div class="steps">
    <slot></slot>
  </div>
    <slot name="content"></slot>
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
    created(){
      this.steps = this.$children;
    }
  }
</script>