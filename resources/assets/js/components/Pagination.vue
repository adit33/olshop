<template>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a v-if="pagination.current_page > 1" class="pagination-previous" @click="changePage(1)">First Page</a>
  <a v-if="pagination.current_page < pagination.last_page" class="pagination-next"     @click="changePage(pagination.last_page)">Last Page</a>
  <ul class="pagination-list">
    <li v-for="page in pagesNumber">
    <a class="pagination-link" v-on:click.prevent="changePage(page)" :class="{'is-current': page == pagination.current_page}" aria-label="Goto page 1">{{ page }}</a>
    </li>
  </ul>
</nav>
</template>
<script>
  export default{
      props: {
      pagination: {
          type: Object,
          required: true
      },
      offset: {
          type: Number,
          default: 4
      }
    },
    computed: {
      pagesNumber: function () {
        if (!this.pagination.to) {
          return [];
        }
        var from = this.pagination.current_page - this.offset;
        if (from < 1) {
          from = 1;
        }
        var to = from + (this.offset * 2);
        if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
        }
        var pagesArray = [];
        for (from = 1; from <= to; from++) {
          pagesArray.push(from);
        }
          return pagesArray;
      }
    },
    methods : {
      changePage: function (page) {
        this.pagination.current_page = page;
      }
    }
  }
</script>