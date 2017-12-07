<template>
   <div class="step-item">
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
    props:['iconName','name','description']
  }
</script>