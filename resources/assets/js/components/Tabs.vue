<template>
<div>
	<div class="tabs">
        <ul>
          <li v-for="tab in tabs" :class="{ 'is-active': tab.isActive }">
            <a :href="tab.href" @click="selected(tab)">{{ tab.name }}</a>
          </li>
        </ul>
      </div>

      <div class="tabs-detail">
      <slot></slot>
      </div>
</div>
	
</template>

<script type="text/javascript">
	export default{
		 mounted(){
		    console.log(this.$children)
		  },
		  data(){
		    return {
		      tabs:[],
		      
		    }
		  },
		  created(){
		    this.tabs=this.$children;
		  },
		  methods:{
		    selected(selected){
		     this.tabs.forEach(tab=>{
		      tab.isActive=(tab.name == selected.name)
		     })
		    }
		  }
	}
</script>