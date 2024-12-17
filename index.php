<!DOCTYPE html>
<html>
<head>
    <title>Persepsi Anti Korupsi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar bg-light mb-5">
        <div class="container-fluid">
            <span class="navbar-brand mb-2 mt-2 h1 marquee">Persepsi Anti Korupsi</span>
        </div>
    </nav>
    <figure class="text-center">
        <img class="img-fluid" src="image_001.png" alt="" srcset="">
    </figure>
    <div class="container mb-5">
        <form id="myForm" action="proses.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="nohp" class="form-label">No. Handphone</label>
                <input type="tel" class="form-control" id="nohp" name="nohp" required>
            </div>
    
            <div class="mb-3">
                <label for="jkelamin" class="form-label">Jenis Kelamin:</label>
                <select id="jkelamin" name="jkelamin" class="form-control">
                    <option value="lakilaki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="umur">Umur:</label>
                <input type="number" class="form-control" id="umur" name="umur">
            </div>
    
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan:</label>
                <select id="pendidikan" name="pendidikan" class="form-control">
                    <option value="sd">MI/SD</option>
                    <option value="smp">MTS/SMP</option>
                    <option value="sma">MA/SMA/SMK</option>
                    <option value="d3">D3</option>
                    <option value="s1">S1</option>
                    <option value="s2">S2</option>
                    <option value="s3">S3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                <select id="pekerjaan" name="pekerjaan" class="form-control">
                    <option value="pns">PNS</option>
                    <option value="tni">TNI</option>
                    <option value="polri">Polri</option>
                    <option value="swasta">Swasta</option>
                    <option value="wirausaha">Wirausaha</option>
                    <option value="pelajar">Pelajar/Mahasiswa</option>
                    <option value="lain">Lainnya</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="layanan" class="form-label">Jenis Layanan yang diterima:</label>
                <select id="layanan" name="layanan" class="form-control">
                    <optgroup label="Pendaftaran">
                        <option value="layanan1">Layanan Pendaftaran Calon Peserta Didik Baru</option>
                        <option value="layanan2">Layanan Registrasi/lapor diri Peserta Didik Baru</option>
                    </optgroup>
                    <optgroup label="Mutasi">
                        <option value="layanan3">Layanan Mutasi Peserta Didik</option>
                        <option value="layanan4">Layanan Mutasi Guru dan Tenaga Kependidikan</option>
                    </optgroup>
                    <optgroup label="Administrasi">
                        <option value="layanan5">Layanan Surat Keterangan Peserta didik Aktif</option>
                        <option value="layanan6">Layanan Surat keterangan peserta didik berkelakuan baik</option>
                        <option value="layanan7">Layanan Surat Perizinan peserta didik sakit / pulang awal</option>
                    </optgroup>
                    <optgroup label="Permohonan">
                        <option value="layanan8">Layanan Permohonan data peserta didik</option>
                        <option value="layanan9">Layanan Persetujuan izin penelitian lapangan</option>
                        <option value="layanan10">Layanan Persetujuan peminjaman sarana prasaranan</option>
                        <option value="layanan11">Layanan Persetujuan studi tiru</option>
                        <option value="layanan12">Layanan Pengajuan cuti</option>
                        <option value="layanan13">Layanan Permohonan surat keterangan pengganti ijazah/hilang/rusak</option>
                        <option value="layanan14">Layanan Permohonan legalisasi ijazah</option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Tidak ada petugas yang memberikan pelayanan secara khusus <br>
                    <strong>DISKRIMINASI PELAYANAN</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="diskriminasi_1" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="diskriminasi_1" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="diskriminasi_1" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="diskriminasi_1" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Petugas tidak membeda-bedakan pelayanan karena faktor suku, agama, kekerabatan, almamater dan sejenisnya <br>
                    <strong>DISKRIMINASI PELAYANAN</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="diskriminasi_2" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="diskriminasi_2" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="diskriminasi_2" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="diskriminasi_2" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada petugas yang memberikan pelayanan yang tidak sesuai dengan ketentuan sehingga mengindikasikan kecurangan, seperti penyerobotan antrian, mempersingkat waktu tunggu layanan diluar prosedur, pengurangan syarat/prosedur, pengurangan denda, dll. <br>
                    <strong>PELAYANAN DI LUAR PROSEDUR / KECURANGAN PELAYANAN</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="kecurangan" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="kecurangan" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="kecurangan" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="kecurangan" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada petugas yang menerima/bahkan meminta imbalan uang untuk alasan administrasi, transport, rokok, kopi, dll di luar ketentuan<br>
                    <strong>PENERIMAAN IMBALAN UANG/BARANG/FASILITAS</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="imbalan_uang" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="imbalan_uang" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="imbalan_uang" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="imbalan_uang" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada petugas yang menerima pemberian imbalan barang berupa makanan jadi, rokok, parcel, perhiasan, elektronik, pakaian, bahan pangan, dll di luar ketentuan<br>
                    <strong>PENERIMAAN IMBALAN UANG/BARANG/FASILITAS</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="imbalan_barang" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="imbalan_barang" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="imbalan_barang" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="imbalan_barang" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada petugas yang menerima pemberian imbalan fasilitas berupa akomodasi (hotel, resort perjalanan/jasa trasport, komunikasi, hiburan, voucher belanja, dll) di luar ketentuan.<br>
                    <strong>PENERIMAAN IMBALAN UANG/BARANG/FASILITAS</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="imbalan_fasilitas" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="imbalan_fasilitas" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="imbalan_fasilitas" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="imbalan_fasilitas" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada petugas yang melakukan pungli, yaitu permintaan pembayaran atas pelayanan yang diterima pengguna layanan di luar tarif resmi (pungli bisa dikamuflasekan melalui istilah seperti "uang administrasi", "uang rokok", "uang terima kasih", dsb.<br>
                    <strong>Pungutan Liar (PUNGLI)</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="pungli" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="pungli" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="pungli" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="pungli" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                Tidak ada praktik percaloan (pihak yang melakukan percaloan dapat berasal dari oknum pegawai pada unit layanan ini, maupun pihak luar yang memiliki hubungan/atau tidak memiliki hubungan dengan oknum pegawai).<br>
                    <strong>PENCALOAN/PERANTARA</strong>
                </label>
                <div class="row text-center mt-2">
                    <div class="col-2">Tidak Setuju</div>
                    <div class="col-8">
                        <div class="d-flex justify-content-around">
                            <!-- Radio Buttons -->
                            <div>
                                <label for="skala1">1</label>
                                <input type="radio" id="skala1" name="percaloan" value="1" required>
                            </div>
                            <div>
                                <label for="skala2">2</label>
                                <input type="radio" id="skala2" name="percaloan" value="2">
                            </div>
                            <div>
                                <label for="skala3">3</label>
                                <input type="radio" id="skala3" name="percaloan" value="3">
                            </div>
                            <div>
                                <label for="skala4">4</label>
                                <input type="radio" id="skala4" name="percaloan" value="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">Setuju</div>
                </div>
            </div>

    
            <button type="submit" class="btn btn-primary">Kirim</button>
            
        </form>
    </div>
    <script>
        // Cek apakah ada parameter status pada URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
            // Tampilkan SweetAlert
            Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Buku tamu berhasil diisi.',
            showConfirmButton: false,
            timer: 1500
            }).then(() => {
            // Reset form setelah popup hilang
            document.getElementById("myForm").reset();
            });
        }

        $(document).ready(function(){
            $(".marquee").marquee({
                duration: 10000, // Durasi animasi dalam milidetik
                gap: 200, // Jarak antara duplikasi teks
                delayBeforeStart: 0,
                direction: 'left' // Arah pergerakan teks
            });
        });
    </script>
</body>
</html>