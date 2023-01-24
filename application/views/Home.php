
<div>
  <canvas id="myChart"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        <?php
              foreach ($row as $data) {
                echo "'" .$data->tgl ."',";
              }
          ?>
      ],
      datasets: [{
        label: [],
        data: [<?php
              foreach ($row as $data) {
                echo "'" .$data->tgl ."',";
              }
          ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>