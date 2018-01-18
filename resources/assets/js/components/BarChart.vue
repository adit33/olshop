<template>
  <div class="small">
    <bar-chart :chart-data="dataChart" :options="{responsive: true, maintainAspectRatio: false}"></bar-chart>
  </div>
</template>


<script>
import BarChart from './../barchart'
export default {
  props:['dataChart'],
  components: { BarChart },
}
</script>