<template>
	<div>
		<input type="text" v-model="textSearch" name="">
		<ul>
			<li v-for="product in result"> 
			<div class="title" v-html="highlightText(product.name, textSearch)"></div>
			</li>
		</ul>
	</div>
</template>

<script type="text/javascript">
	import {mapGetters} from 'vuex';
	export default{
		mounted(){
			store.dispatch('FETCH_PRODUCTS');
		},
		data(){
			return{
				textSearch:''
			}
		},
		methods: {
		    highlightText: function (words, query) {
		      function pregQuote (str) {
		        return (str.trim() + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1")
		      }
		      var iQuery = new RegExp(pregQuote(query), 'ig')
		      return words.toString().replace(iQuery, function (matchedTxt, a, b) {
		        return ('<span class=\'highlight\'>' + matchedTxt + '</span>')
		      })
		    }
		  },
		computed:{
			...mapGetters({dataProducts:'dataProducts'}),
		      result(){
		        var self = this;
		        return self.dataProducts.filter(t=>{
		        	let name =t.name.toLowerCase().includes(self.textSearch.toLowerCase())
		          return name;
		        });
		      	// return self.dataProducts.filter;
		      }
		    }
		}
</script>

<style type="text/css">
	.highlight {
  color: #0096D9;
}
.title{
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}
</style>