<template>
	<div>
		<p>
		<i v-for="rating in ratings" class="fa fa-star title is-5" :class="{ 'is-active': ((starValue >= rating) && starValue != null), 'is-disabled': disabled }" v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out"></i> 
		&nbsp; &nbsp;
      <strong>41 Reviews</strong>
      &nbsp; &nbsp;
      <a href="#">show all</a></p>
	</div>
</template>

<style type="text/css">
	i.is-active{
		 color: #FFD700;
	}
	i.is-disabled{
		 cursor: default;
	}
</style>

<script type="text/javascript">
	export default{
	props: {
    'name': String,
    'value': null,
    'id': String,
    'disabled': Boolean,
    'required': Boolean
  },  
  data: function() {
    return {
    starValue:this.value,
      temp_starValue: null,
      ratings: [1, 2, 3, 4, 5]
    };
  },

  methods: {
    /*
     * Behaviour of the stars on mouseover.
     */
    star_over: function(index) {
      var self = this;

      if (!this.disabled) {
        this.temp_starValue = this.starValue;
        this.starValue = index;
      }

    },

    /*
     * Behaviour of the stars on mouseout.
     */
    star_out: function() {
      var self = this;

      if (!this.disabled) {
        this.starValue = this.temp_starValue;
      }
    },

    /*
     * Set the rating of the score
     */
    set: function(starValue) {
      var self = this;

      if (!this.disabled) {
      	// Make some call to a Laravel API using Vue.Resource
        
        this.temp_starValue = starValue;
        this.starValue = starValue;
        this.$emit('setstar', this.starValue) // handle data and give it back to parent by interface
      }
    }
	}
}
</script>