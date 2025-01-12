import { data } from 'autoprefixer';
import Chart from 'chart.js/auto';

console.log(prices);

new Chart(
    document.getElementById('prices'),
    {
      type: 'line',
      data: {
        labels: prices[0].map(function(row) {
            return row.month + "/" + row.year;
        }),
        datasets: prices.map(function(row) {
            return {
                label: row[0].product.title,
                data: row.map(function(row) {
                    return row.value
                })
            }
        })
      }
    }
  );