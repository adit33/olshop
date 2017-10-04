
	<template>
	<article class="message is-danger">
  <div class="message-header">
    <p><strong>Danger</strong>! <a>Learn more</a></p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  {{ message }}
  </div>
</article>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
        	return{
        		// message:''
        	}
        },
        props:['message']
    }
</script>