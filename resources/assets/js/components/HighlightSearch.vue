<template>
	<div>


		 <div class="field is-grouped">
  <p class="control is-expanded">
    <input class="input text-search" v-model="textSearch" :class="{ 'hidden' : this.$store.state.hiddenTextSearch }" type="text" placeholder="Find a Products" id="input-search">
  </p>
  <p class="control">
   <a href="#" @click="isTextSearchHidden">
                     <span class="icon">
                  <i class="fa fa-search"></i> </span>  
                  </a>
  </p>
</div>

	<!-- 	  <div v-if="textSearch != ''" class="dropdown is-active" style="position:absolute; z-index:99999999; width:1000px">
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
</div> -->
	</div>
</template>

<style type="text/css">
	.text-search{
  border-radius: 0px;
  transition: all .5s ease-in-out;
  opacity: .3;
}
 .hidden{
    opacity: 0;
    width: 0px;
    cursor: pointer;
  }
  .hidden:not(:focus){
  	opacity: 0;
    width: 0px;
    cursor: pointer;	
  }
</style>

<script type="text/javascript">
	import {mapGetters} from 'vuex';
	export default{
		store,
		mounted(){
			store.dispatch('FETCH_PRODUCTS');
		},
		data(){
			return{
				textSearch:'',
				textSearchHidden:store.state.hiddenTextSearch,
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
		    },
		    isTextSearchHidden(){
		    	let el = document.getElementById('input-search');
	        	let isHidden = this.$store.state.hiddenTextSearch;

	        	if(isHidden == true){
	        		el.focus();
	        	}
	        	else{
	        		this.textSearch = '';
	        		el.blur();
	        	}

	        	store.commit('SET_HIDDEN_TEXT_SEARCH',! isHidden)
	      	},
		  },
		// computed:{
		// 	...mapGetters({dataProducts:'dataProducts'}),
		//       result(){
		//         var self = this;
		//         return self.dataProducts.filter(t=>{
		//         	let name =t.name.toLowerCase().includes(self.textSearch.toLowerCase())
		//           return name;
		//         });
		//       	// return self.dataProducts.filter;
		//       }
		//     },
		    watch:{
		    	textSearch:function(value,oldValue){
		    		store.commit('SET_TEXTSEARCH',value);
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