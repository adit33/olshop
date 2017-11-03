<template>
	<ul class="menu-list">
		<li v-for="category in categories"><input type="checkbox" name="category_id[]" :value="category.id">{{ category.name }}</li>
	</ul>
</template>


<script>
	export default{
			data(){
				return{
				}
			},
			props:['categories'],
			methods:{
				
			}
	}	
</script>
