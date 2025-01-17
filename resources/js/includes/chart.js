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

if (document.getElementById('productprices')) {
  new Chart(
    document.getElementById('productprices'),
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
}

if (document.getElementById('eventprices')) {
  new Chart(
    document.getElementById('eventprices'),
    {
      type: 'line',

      data: {
        labels: prices[0].map(function (data) {
          return data.month + "/" + data.year;
        }),
        datasets: prices.map(function (category) {
          return {
            label: category[0].category.name,

            data: category.map(function (data) {
              return data.value
            })
          }
        })
      }
    }
  );
}