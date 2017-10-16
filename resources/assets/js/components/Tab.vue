<template>
	<div v-show="isActive"><slot></slot></div>
</template>

<script type="text/javascript">
	export default{
		props:{
		    name:{required:true},
		    selected:{default:false },
		  },
		  mounted(){
		    this.isActive = this.selected;
		  },
		  data(){
		    return{
		      isActive:false
		    }
		  },
		  computed:{
		    href(){
		      return '#'+this.name.toLowerCase().replace(/ /g, '-');
		    }
		  }
	}
</script>