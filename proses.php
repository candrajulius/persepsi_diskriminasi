<?php
include 'koneksi.php'; // Panggil file koneksi

// Ambil data dari form
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$jekelamin = $_POST['jkelamin'];
$umur = $_POST['umur'];
$pendidikan = $_POST['pendidikan'];
$pekerjaan = $_POST['pekerjaan'];
$layanan = $_POST['layanan'];

// Data untuk penilaian (skala 1-4)
$diskriminasi_1 = $_POST['diskriminasi_1'];
$diskriminasi_2 = $_POST['diskriminasi_2'];
$kecurangan = $_POST['kecurangan'];
$imbalan_uang = $_POST['imbalan_uang'];
$imbalan_barang = $_POST['imbalan_barang'];
$imbalan_fasilitas = $_POST['imbalan_fasilitas'];
$pungli = $_POST['pungli'];
$percaloan = $_POST['percaloan'];

// Mulai transaksi
$conn->begin_transaction();

try {
    // Masukkan data ke tabel responden
    $sql_responden = "INSERT INTO responden (nama, nohp, jkelamin, umur, pendidikan, pekerjaan, layanan, tanggal_input) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt_responden = $conn->prepare($sql_responden);
    $stmt_responden->bind_param("sssssss", $nama, $nohp, $jekelamin, $umur, $pendidikan, $pekerjaan, $layanan);
    $stmt_responden->execute();
    $id_responden = $conn->insert_id; // Ambil ID dari data responden yang baru saja dimasukkan

    // Masukkan data ke tabel survey_responses
    $sql_survey = "INSERT INTO survey_responses (id_responden, diskriminasi_1, diskriminasi_2, kecurangan, imbalan_uang, 
                    imbalan_barang, imbalan_fasilitas, pungli, percaloan, created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt_survey = $conn->prepare($sql_survey);
    $stmt_survey->bind_param("iiiiiiiii", $id_responden, $diskriminasi_1, $diskriminasi_2, $kecurangan, 
                             $imbalan_uang, $imbalan_barang, $imbalan_fasilitas, $pungli, $percaloan);
    $stmt_survey->execute();

    // Commit transaksi jika semua query berhasil
    $conn->commit();

    // Redirect ke halaman utama dengan status sukses
    header("Location: index.php?status=success");
} catch (Exception $e) {
    // Rollback jika ada kesalahan
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Tutup statement dan koneksi
$stmt_responden->close();
$stmt_survey->close();
$conn->close();
?>