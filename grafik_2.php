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
        SUM(CASE WHEN diskriminasi_2 = 4 THEN 1 ELSE 0 END) AS diskriminasi2_4,

        -- Kecurangan
        SUM(CASE WHEN kecurangan = 1 THEN 1 ELSE 0 END) AS kecurangan_1_1,
        SUM(CASE WHEN kecurangan = 2 THEN 1 ELSE 0 END) AS kecurangan_1_2,
        SUM(CASE WHEN kecurangan = 3 THEN 1 ELSE 0 END) AS kecurangan_1_3,
        SUM(CASE WHEN kecurangan = 4 THEN 1 ELSE 0 END) AS kecurangan_1_4,

        -- Imbalan Uang
        SUM(CASE WHEN imbalan_uang = 1 THEN 1 ELSE 0 END) AS imbalan_uang1_1,
        SUM(CASE WHEN imbalan_uang = 2 THEN 1 ELSE 0 END) AS imbalan_uang1_2,
        SUM(CASE WHEN imbalan_uang = 3 THEN 1 ELSE 0 END) AS imbalan_uang1_3,
        SUM(CASE WHEN imbalan_uang = 4 THEN 1 ELSE 0 END) AS imbalan_uang1_4,

          -- Imbalan Barang
        SUM(CASE WHEN imbalan_barang = 1 THEN 1 ELSE 0 END) AS imbalan_barang1_1,
        SUM(CASE WHEN imbalan_barang = 2 THEN 1 ELSE 0 END) AS imbalan_barang1_2,
        SUM(CASE WHEN imbalan_barang = 3 THEN 1 ELSE 0 END) AS imbalan_barang1_3,
        SUM(CASE WHEN imbalan_barang = 4 THEN 1 ELSE 0 END) AS imbalan_barang1_4,

        -- Imbalan Fasilitas
        SUM(CASE WHEN imbalan_fasilitas = 1 THEN 1 ELSE 0 END) AS imbalan_fasilitas1_1,
        SUM(CASE WHEN imbalan_fasilitas = 2 THEN 1 ELSE 0 END) AS imbalan_fasilitas1_2,
        SUM(CASE WHEN imbalan_fasilitas = 3 THEN 1 ELSE 0 END) AS imbalan_fasilitas1_3,
        SUM(CASE WHEN imbalan_fasilitas = 4 THEN 1 ELSE 0 END) AS imbalan_fasilitas1_4,

        -- Pungli
        SUM(CASE WHEN pungli = 1 THEN 1 ELSE 0 END) AS pungli1_1,
        SUM(CASE WHEN pungli = 2 THEN 1 ELSE 0 END) AS pungli1_2,
        SUM(CASE WHEN pungli = 3 THEN 1 ELSE 0 END) AS pungli1_3,
        SUM(CASE WHEN pungli = 4 THEN 1 ELSE 0 END) AS pungli1_4,

        -- Percaloan
        SUM(CASE WHEN percaloan = 1 THEN 1 ELSE 0 END) AS calo1_1,
        SUM(CASE WHEN percaloan = 2 THEN 1 ELSE 0 END) AS calo1_2,
        SUM(CASE WHEN percaloan = 3 THEN 1 ELSE 0 END) AS calo1_3,
        SUM(CASE WHEN percaloan = 4 THEN 1 ELSE 0 END) AS calo1_4

        
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

$total_responden_kecurangan = $data['kecurangan_1_1'] + $data['kecurangan_1_2'] + $data['kecurangan_1_3'] + $data['kecurangan_1_4'];

$total_responden_imbalan_uang = $data['imbalan_uang1_1'] + $data['imbalan_uang1_2'] + $data['imbalan_uang1_3'] + $data['imbalan_uang1_4'];

$total_responden_imbalan_barang = $data['imbalan_barang1_1'] + $data['imbalan_barang1_2'] + $data['imbalan_barang1_3'] + $data['imbalan_barang1_4'];

$total_responden_fasilitas = $data['imbalan_fasilitas1_1'] + $data['imbalan_fasilitas1_2'] + $data['imbalan_fasilitas1_3'] + $data['imbalan_fasilitas1_4'];

$total_responden_pungli = $data['pungli1_1'] + $data['pungli1_2'] + $data['pungli1_3'] + $data['pungli1_4'];

$total_responden_calo = $data['calo1_1'] + $data['calo1_2'] + $data['calo1_3'] + $data['calo1_4'];

// Hitung persentase untuk diskriminasi 1 dan 2
$persentase_diskriminasi1 = [];
$persentase_diskriminasi2 = [];
$persentase_kecurangan = [];
$persentase_imbalan_uang = [];
$persentase_imbalan_barang = [];
$persentase_imbalan_fasilitas = [];
$persentase_pungli = [];
$persentase_calo = [];

foreach (['1', '2', '3', '4'] as $angka) {
  $persentase_diskriminasi1[$angka] = $total_responden_diskriminasi1 > 0
    ? round(($data['diskriminasi1_' . $angka] / $total_responden_diskriminasi1) * 100, 2)
    : 0;

  $persentase_diskriminasi2[$angka] = $total_responden_diskriminasi2 > 0
    ? round(($data['diskriminasi2_' . $angka] / $total_responden_diskriminasi2) * 100, 2)
    : 0;

  $persentase_kecurangan[$angka] = $total_responden_kecurangan > 0 ? round($data['kecurangan_1_' . $angka] / $total_responden_kecurangan * 100, 2) : 0;

  $persentase_imbalan_uang[$angka] = $total_responden_imbalan_uang > 0 ? round($data['imbalan_uang1_' . $angka] / $total_responden_imbalan_uang * 100, 2) : 0;

  $persentase_imbalan_barang[$angka] = $total_responden_imbalan_barang > 0 ? round($data['imbalan_barang1_' . $angka] / $total_responden_imbalan_barang * 100, 2) : 0;

  $persentase_imbalan_fasilitas[$angka] = $total_responden_fasilitas > 0 ? round($data['imbalan_fasilitas1_' . $angka] / $total_responden_fasilitas * 100, 2) : 0;

  $persentase_pungli[$angka] = $total_responden_pungli > 0 ? round($data['pungli1_' . $angka] / $total_responden_pungli * 100, 2) : 0;

  $persentase_calo[$angka] = $total_responden_calo > 0 ? round($data['calo1_' . $angka] / $total_responden_calo * 100, 2) : 0;
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

  <h3>Diskriminasi Pelayanan 2</h3>
  <h4>Total Responden: <?php echo $total_responden_diskriminasi2; ?></h4>
  <canvas id="grafikDiskriminasi2" width="700" height="160"></canvas>

  <h3>Pelayanan Di Luar Prosedur / Kecurangan Pelayanan</h3>
  <h4>Total Responden: <?php echo $total_responden_kecurangan; ?></h4>
  <canvas id="grafikKecurangan" width="700" height="160"></canvas>

  <h3>Penerimaan Imbalan Uang</h3>
  <h4>Total Responden: <?php echo $total_responden_imbalan_uang; ?></h4>
  <canvas id="grafikImbalanUang" width="700" height="160"></canvas>

  <h3>Penerimaan Imbalan Barang</h3>
  <h4>Total Responden: <?php echo $total_responden_imbalan_barang; ?></h4>
  <canvas id="grafikImbalanBarang" width="700" height="160"></canvas>

  <h3>Penerimaan Imbalan Fasilitas</h3>
  <h4>Total Responden: <?php echo $total_responden_fasilitas; ?></h4>
  <canvas id="grafikImbalanFasilitas" width="700" height="160"></canvas>

  <h3>Pungutan Liar</h3>
  <h4>Total Responden: <?php echo $total_responden_pungli; ?></h4>
  <canvas id="grafikPungli" width="700" height="160"></canvas>

  <h3>Pencaloan/Perantara</h3>
  <h4>Total Responden: <?php echo $total_responden_calo; ?></h4>
  <canvas id="grafikCalo" width="700" height="160"></canvas>

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


    // Chart.register(ChartDataLabels);

    // Data Kecurangan
    const ctx3 = document.getElementById('grafikKecurangan').getContext('2d');
    const persentase3 = [
      <?php echo $persentase_kecurangan['1']; ?>,
      <?php echo $persentase_kecurangan['2']; ?>,
      <?php echo $persentase_kecurangan['3']; ?>,
      <?php echo $persentase_kecurangan['4']; ?>
    ];

    new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['kecurangan_1_1']; ?>,
            <?php echo $data['kecurangan_1_2']; ?>,
            <?php echo $data['kecurangan_1_3']; ?>,
            <?php echo $data['kecurangan_1_4']; ?>
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
            formatter: (value, context) => persentase3[context.dataIndex] + '%'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    // Data Kecurangan
    const ctx4 = document.getElementById('grafikImbalanUang').getContext('2d');
    const persentase4 = [
      <?php echo $persentase_imbalan_uang['1']; ?>,
      <?php echo $persentase_imbalan_uang['2']; ?>,
      <?php echo $persentase_imbalan_uang['3']; ?>,
      <?php echo $persentase_imbalan_uang['4']; ?>
    ];

    new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['imbalan_uang1_1']; ?>,
            <?php echo $data['imbalan_uang1_2']; ?>,
            <?php echo $data['imbalan_uang1_3']; ?>,
            <?php echo $data['imbalan_uang1_4']; ?>
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
            formatter: (value, context) => persentase4[context.dataIndex] + '%'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    // Data Barang
    const ctx5 = document.getElementById('grafikImbalanBarang').getContext('2d');
    const persentase5 = [
      <?php echo $persentase_imbalan_barang['1']; ?>,
      <?php echo $persentase_imbalan_barang['2']; ?>,
      <?php echo $persentase_imbalan_barang['3']; ?>,
      <?php echo $persentase_imbalan_barang['4']; ?>
    ];

    new Chart(ctx5, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['imbalan_barang1_1']; ?>,
            <?php echo $data['imbalan_barang1_2']; ?>,
            <?php echo $data['imbalan_barang1_3']; ?>,
            <?php echo $data['imbalan_barang1_4']; ?>
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
            formatter: (value, context) => persentase5[context.dataIndex] + '%'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    // Data Barang
    const ctx6 = document.getElementById('grafikImbalanFasilitas').getContext('2d');
    const persentase6 = [
      <?php echo $persentase_imbalan_fasilitas['1']; ?>,
      <?php echo $persentase_imbalan_fasilitas['2']; ?>,
      <?php echo $persentase_imbalan_fasilitas['3']; ?>,
      <?php echo $persentase_imbalan_fasilitas['4']; ?>
    ];

    new Chart(ctx6, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['imbalan_fasilitas1_1']; ?>,
            <?php echo $data['imbalan_fasilitas1_2']; ?>,
            <?php echo $data['imbalan_fasilitas1_3']; ?>,
            <?php echo $data['imbalan_fasilitas1_4']; ?>
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
            formatter: (value, context) => persentase6[context.dataIndex] + '%'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    // Data Barang
    const ctx7 = document.getElementById('grafikPungli').getContext('2d');
    const persentase7 = [
      <?php echo $persentase_pungli['1']; ?>,
      <?php echo $persentase_pungli['2']; ?>,
      <?php echo $persentase_pungli['3']; ?>,
      <?php echo $persentase_pungli['4']; ?>
    ];

    new Chart(ctx7, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['pungli1_1']; ?>,
            <?php echo $data['pungli1_2']; ?>,
            <?php echo $data['pungli1_3']; ?>,
            <?php echo $data['pungli1_4']; ?>
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
            formatter: (value, context) => persentase7[context.dataIndex] + '%'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    const ctx8 = document.getElementById('grafikCalo').getContext('2d');
    const persentase8 = [
      <?php echo $persentase_calo['1']; ?>,
      <?php echo $persentase_calo['2']; ?>,
      <?php echo $persentase_calo['3']; ?>,
      <?php echo $persentase_calo['4']; ?>
    ];

    new Chart(ctx8, {
      type: 'bar',
      data: {
        labels: ['1', '2', '3', '4'],
        datasets: [{
          label: 'Jumlah Responden',
          data: [
            <?php echo $data['calo1_1']; ?>,
            <?php echo $data['calo1_2']; ?>,
            <?php echo $data['calo1_3']; ?>,
            <?php echo $data['calo1_4']; ?>
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
            formatter: (value, context) => persentase8[context.dataIndex] + '%'
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