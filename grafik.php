<?php
include 'koneksi.php';

// Query untuk mengambil data
$sql = "SELECT 
            SUM(diskriminasi_1) AS diskriminasi_1,
            SUM(diskriminasi_2) AS diskriminasi_2,
            SUM(kecurangan) AS kecurangan,
            SUM(imbalan_uang) AS imbalan_uang,
            SUM(imbalan_barang) AS imbalan_barang,
            SUM(imbalan_fasilitas) AS imbalan_fasilitas,
            SUM(pungli) AS pungli,
            SUM(percaloan) AS percaloan
        FROM survey_responses";

$result = $conn->query($sql);

// Menyimpan data ke dalam array
$data = [];
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Hasil Survei</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Grafik Hasil Survei</h2>
    <canvas id="surveyChart" width="400" height="200"></canvas>

    <script>
        const data = <?php echo json_encode($data); ?>;

        // Ambil data dari PHP dan inisialisasi Chart.js
        const ctx = document.getElementById('surveyChart').getContext('2d');
        const surveyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Diskriminasi 1',
                    'Diskriminasi 2',
                    'Kecurangan',
                    'Imbalan Uang',
                    'Imbalan Barang',
                    'Imbalan Fasilitas',
                    'Pungli',
                    'Percaloan'
                ],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [
                        data.diskriminasi_1 || 0,
                        data.diskriminasi_2 || 0,
                        data.kecurangan || 0,
                        data.imbalan_uang || 0,
                        data.imbalan_barang || 0,
                        data.imbalan_fasilitas || 0,
                        data.pungli || 0,
                        data.percaloan || 0
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
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