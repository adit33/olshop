<template>
	<ul class="menu-list">
		<li v-for="category in categories">{{ category.name }}</li>
	</ul>
</template>


<script>
	export default{
			data(){
				return{
					categories:JSON.parse('{!! App\Models\Category::all()->toJson() !!}'),
				}
			}
	}	
</script>
