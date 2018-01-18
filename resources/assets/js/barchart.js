
import { Bar , mixins} from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
  extends: Bar,
  mixins: [reactiveProp],
  props:['options'],
  mounted () {
    // Overwriting base render method with actual data.
    // this.renderChart({
    //   labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    //   datasets: [
    //     {
    //       label: 'GitHub Commits',
    //       backgroundColor: '#f87979',
    //       data: this.chartData
    //     }
    //   ]
    // })
    this.renderChart(this.chartData,this.options);
  }
}
