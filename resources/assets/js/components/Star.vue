<template>
<div>
   <p>
    <i v-for="index in 5" class="fa fa-star title is-5" :class="{'is-active':index <= amount}"></i>
      <!-- &nbsp; &nbsp;
      <strong>3 Reviews</strong>
      &nbsp; &nbsp;
      <a href="#">show all</a> -->
   </p>
   </div>
</template>

<script type="text/javascript">
	export default{
		props:{
			reviews:{},
		},
		data(){
			return{
				amountStar:0,
			}
		},
		mounted(){
			// this.countRating();
		},
		computed:{
			amount(){
				let tmp=0;
				this.reviews.map(review=>{
					tmp+=review.rating;
				})
				return Math.round(tmp / this.reviews.length);

			}				
		},
		methods:{
			countRating(){
				let amount=4;
				this.reviews.forEach(review=>{
					amount =+ review.rating;
				})
				this.amountStar=amount;
				// alert(amount)
			}
		}
	}
</script>