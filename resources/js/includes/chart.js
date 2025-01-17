import {
  Chart,
  LineController,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale,
  Colors,
  Legend,
  Tooltip,
} from 'chart.js'

Chart.register(
  LineController,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale,
  Colors,
  Legend,
  Tooltip,
);

new Chart(
  document.getElementById('prices'),
  {
    type: 'line',
    options: {
      plugins: {
        legend: {
          display: false
        },
      }
    },
    
    data: {
      labels: prices.map(function (row) {
        return row.month + "/" + row.year;
      }),
      datasets: [
        {
          label: label,
          data: prices.map(function (row) {
            return row.value;
          })
        }
      ]
    }
  }
);
