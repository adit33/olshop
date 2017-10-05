
	<template>
	<article class="message is-danger"  v-if="isVisible">
  <div class="message-header">
    <p><strong>Danger</strong>! <a>Learn more</a></p>
    <button class="delete" aria-label="delete" @click="closeMessage"></button>
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
        props:['message'],
        data(){
        	return{
        		isVisible:true,
        	}
        },        
        methods:{
        	closeMessage(){
        		this.isVisible =! this.isVisible
        	}
        }
    }
</script>