<template>
	<div>
		<transition name="fade">
	  		<a @click="toUp" class="button circle sf-back-to-top" v-if="showButton">
	  			<span class="icon is-small">
	      			<i class="fa fa-arrow-up "></i>
	    		</span>
	    	</a>
		</transition>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
      			amountScrolled:300,
      			showButton:false,
			}
		},
		mounted(){
			this.showButtonUp()
		},
		methods:{
			showButtonUp(){
        	var self=this;
	        window.addEventListener("scroll", function(){
			        if(document.body.scrollTop > self.amountScrolled){
			             self.showButton=true 
			        }else{
			          	self.showButton=false
			        }
	            });
	      },
	       toUp(){
          	$('html, body').animate({
        		scrollTop: 0
          		}, 1000);
          		return false;
      		}
		}
	}
</script>