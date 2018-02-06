<template>
  <div>
    <div v-if="this.$store.state.textSearch != null " class="box search-result" style="margin:5px 5px 0 5px">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
      </figure>
    </div>
    <div class="media-content">
    {{ textSearchHidden | json }}
    <div  v-for="product in result">
  

        <div class="content">
        <a  class="title" v-html="highlightText(product.name, this.$store.state.textSearch)" :href="'product/'+product.id"></a>
      </div>
        <!-- <hr class="dropdown-divider"> -->
      </div>

      <!-- <div class="content">
        <p>
          <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
          <br>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
        </p>
      </div> -->
    </div>
  </article>
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
            var self = this;
            return self.dataProducts.filter(t=>{
              let name =t.name.toLowerCase().includes(store.state.textSearch.toLowerCase())
              return name;
            });
            // return self.dataProducts.filter;
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
