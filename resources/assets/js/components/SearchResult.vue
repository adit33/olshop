<template>
  <div>
    
   
    <div v-if="textSearch.length != 0" class="box search-result" style="margin:5px 50px 0 50px">
     <div class="columns is-multiline" v-if="result.length != 0 ">
       <div class="column is-4" v-for="product in result" >
          <article class="media">
    <div class="media-left">
      <figure class="image is-128x128">
        <img :src="product.product_image[0].name" alt="Image">
      </figure>
    </div>
    <div class="media-content">
    

        <div class="content">
        <a  class="title" v-html="highlightText(product.name, textSearch)" :href="'product/'+product.id"></a>
        <h1>{{ product.price | currency }}</h1>
      </div>
    </div>
  </article>
        </div>
         
     </div>
      <div v-if="result.length === 0"><h1 align="center">Product Tidak di Temukan</h1></div>
</div>

  </div>
</template>

<script type="text/javascript">
  import {mapGetters} from 'vuex';
  export default{
    store,
      mounted(){
      store.dispatch('FETCH_PRODUCTS');
    },
    data(){
      return{
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
            let isHidden = this.$store.state.hiddenTextSearch;
            store.commit('SET_HIDDEN_TEXT_SEARCH',! isHidden)
          },
      },
    computed:{
      ...mapGetters({dataProducts:'dataProducts'}),
          result(){
            if(store.state.textSearch != null){
              var self = this;
                return self.dataProducts.filter(t=>{
                let name =t.name.toLowerCase().includes(store.state.textSearch.toLowerCase())
                return name;
            });
            // return self.dataProducts.filter;  
            }else{
              return null;
            }            
          },
          textSearch(){
            return store.state.textSearch
          }
        }
  }
</script>


<style type="text/css">
  .search-result{
  border-radius: 0;
  box-shadow: 1px 1px 3px 1px;
  position: absolute;
  display: block;
  z-index: 1000;
  right: 0;
  left: 0;
}

</style>
