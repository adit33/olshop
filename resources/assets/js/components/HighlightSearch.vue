<template>
	<div>

		     <div class="field has-addons">
 <p class="control has-icons-left">
	      <input v-model="textSearch" class="input" type="text" placeholder="search">
	      <span class="icon is-small is-left">
	        <i class="fa fa-search"></i>
	      </span>
	    </p>
</div>
<div v-if="textSearch != ''" class="dropdown is-active" style="position:absolute; z-index:99999999; width:1000px">
  <div class="dropdown-menu" id="dropdown-menu" role="menu">
    <div class="dropdown-content">
    	<div  v-for="product in result">
    	<div class="dropdown-item" style="width:500px">
    		<a  class="title" v-html="highlightText(product.name, textSearch)" :href="'product/'+product.id"></a>
    	</div> 
    		<hr class="dropdown-divider">
    	</div>
      
    </div>
  </div>
</div>
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
}.
.result{
	display:none; 
	list-style:none; 
	position:absolute; 
	background-color:#53bd84;
	left:300px; 
	top:50px; 
	width:190px;
}

</style>