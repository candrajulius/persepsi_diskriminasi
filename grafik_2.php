<?php
include 'koneksi.php';

// Query untuk mengambil data dari diskriminasi_1 dan diskriminasi_2 berdasarkan angka 1-4
$sql = "
    SELECT 
        -- Diskriminasi 1
        SUM(CASE WHEN diskriminasi_1 = 1 THEN 1 ELSE 0 END) AS diskriminasi1_1,
        SUM(CASE WHEN diskriminasi_1 = 2 THEN 1 ELSE 0 END) AS diskriminasi1_2,
        SUM(CASE WHEN diskriminasi_1 = 3 THEN 1 ELSE 0 END) AS diskriminasi1_3,
        SUM(CASE WHEN diskriminasi_1 = 4 THEN 1 ELSE 0 END) AS diskriminasi1_4,

        -- Diskriminasi 2
        SUM(CASE WHEN diskriminasi_2 = 1 THEN 1 ELSE 0 END) AS diskriminasi2_1,
        SUM(CASE WHEN diskriminasi_2 = 2 THEN 1 ELSE 0 END) AS diskriminasi2_2,
        SUM(CASE WHEN diskriminasi_2 = 3 THEN 1 ELSE 0 END) AS diskriminasi2_3,
        SUM(CASE WHEN diskriminasi_2 = 4 THEN 1 ELSE 0 END) AS diskriminasi2_4
    FROM survey_responses
";

$result = $conn->query($sql);
$data = [];
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

// Hitung total responden untuk diskriminasi 1 dan 2
$total_responden_diskriminasi1 = $data['diskriminasi1_1'] + $data['diskriminasi1_2'] + $data['diskriminasi1_3'] + $data['diskriminasi1_4'];
$total_responden_diskriminasi2 = $data['diskriminasi2_1'] + $data['diskriminasi2_2'] + $data['diskriminasi2_3'] + $data['diskriminasi2_4'];

// Hitung persentase untuk diskriminasi 1 dan 2
$persentase_diskriminasi1 = [];
$persentase_diskriminasi2 = [];

foreach (['1', '2', '3', '4'] as $angka) {
    $persentase_diskriminasi1[$angka] = $total_responden_diskriminasi1 > 0 
        ? round(($data['diskriminasi1_' . $angka] / $total_responden_diskriminasi1) * 100, 2) 
        : 0;

    $persentase_diskriminasi2[$angka] = $total_responden_diskriminasi2 > 0 
        ? round(($data['diskriminasi2_' . $angka] / $total_responden_diskriminasi2) * 100, 2) 
        : 0;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grafik Hasil Survey</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>
  <h2 style="text-align:center;">Grafik Hasil Survey</h2>
  <h3>Diskriminasi Pelayanan 1</h3>
  <h4>Total Responden: <?php echo $total_responden_diskriminasi1; ?></h4>
  <canvas id="grafikDiskriminasi1" width="700" height="160"></canvas>

  <h3>Diskriminasi Pelayanan 1</h3>
  <h4>Total Responden: <?php echo $total_responden_diskriminasi2; ?></h4>
  <canvas id="grafikDiskriminasi2" width="700" height="160"></canvas>

  <script>
  Chart.register(ChartDataLabels);

  // Data Diskriminasi 1
  const ctx1 = document.getElementById('grafikDiskriminasi1').getContext('2d');
  const persentase1 = [
    <?php echo $persentase_diskriminasi1['1']; ?>,
    <?php echo $persentase_diskriminasi1['2']; ?>,
    <?php echo $persentase_diskriminasi1['3']; ?>,
    <?php echo $persentase_diskriminasi1['4']; ?>
  ];

  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: ['1', '2', '3', '4'],
      datasets: [{
        label: 'Jumlah Responden',
        data: [
          <?php echo $data['diskriminasi1_1']; ?>,
          <?php echo $data['diskriminasi1_2']; ?>,
          <?php echo $data['diskriminasi1_3']; ?>,
          <?php echo $data['diskriminasi1_4']; ?>
        ],
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 99, 132, 0.2)',
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        datalabels: {
          anchor: 'end',
          align: 'start',
          offset: -20,
          color: '#000',
          formatter: (value, context) => persentase1[context.dataIndex] + '%'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Data Diskriminasi 2
  const ctx2 = document.getElementById('grafikDiskriminasi2').getContext('2d');
  const persentase2 = [
    <?php echo $persentase_diskriminasi2['1']; ?>,
    <?php echo $persentase_diskriminasi2['2']; ?>,
    <?php echo $persentase_diskriminasi2['3']; ?>,
    <?php echo $persentase_diskriminasi2['4']; ?>
  ];

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['1', '2', '3', '4'],
      datasets: [{
        label: 'Jumlah Responden',
        data: [
          <?php echo $data['diskriminasi2_1']; ?>,
          <?php echo $data['diskriminasi2_2']; ?>,
          <?php echo $data['diskriminasi2_3']; ?>,
          <?php echo $data['diskriminasi2_4']; ?>
        ],
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 99, 132, 0.2)',
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        datalabels: {
          anchor: 'end',
          align: 'start',
          offset: -20,
          color: '#000',
          formatter: (value, context) => persentase2[context.dataIndex] + '%'
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  </script>
</body>

</html>