<template>
   <div class="step-item" :class="{ 'is-active': stepId == currentStep, 'is-completed is-success':stepId < currentStep  }">
    <div class="step-marker">
      <span class="icon">
        <i :class="iconName"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">{{ name }}</p>
      <p>{{ description }}</p>
    </div>
  </div>
</template>

<script type="text/javascript">
  export default{
    props:['iconName','name','description','currentStep','stepId'],
    data(){
      return{
        isActive:null,
      }
    },
    mounted(){
      this.isActive()
    },
    methods:{
      isActive(){
        this.isActive = this.currentStep === this.stepId
      }
    }
  }
</script>