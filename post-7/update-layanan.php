<?php
    session_start();
    require "connect.php";
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id=$id");
    $pelayanan = [];
    while ($row = mysqli_fetch_assoc(($result))){
        $pelayanan[] = $row;
    }
    $pelayanan = $pelayanan[0];
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $layanan = $_POST['layanan'];
        $tanggal = $_POST['tanggal'];
        $metode = $_POST['metode'];
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $extensi = strtolower(end($x));
        $gambar_baru = "$nama.$extensi";
        $tmp = $_FILES['gambar']['tmp_name'];
        if(move_uploaded_file($tmp, 'img/'.$gambar_baru)){
            $sql = "UPDATE pelayanan SET nama = '$nama', alamat = '$alamat', email = '$email', layanan = '$layanan', tanggal = '$tanggal', metode = '$metode', gambar = '$gambar_baru'  WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "
                    <script>
                        alert('Data Dokter Berhasil Diubah Tuan >_<');
                        document.location.href = 'Data-Pelayanan.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data Gagal Ditambahkan Tuan >_<');
                        document.location.href = 'update-layanan.php';
                    </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Layanan</title>
</head>
<body>
    <div class="form">
        <div class="kotak">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="isi">
                    <div class="input-box">
                        <span class="detail"> Nama Pemesan </span>
                        <input type="text" name="nama" placeholder="Masukan Nama Anda" required>
                    </div>
                    <div class="input-box">
                        <span class="detail"> Alamat Pemesan </span>
                        <input type="text" name="alamat" placeholder="Masukan Alamat Anda" required>
                    </div>
                    <div class="input-box">
                        <span class="detail"> E-mail pemesan </span>
                        <input type="text" id="phone" name="email" placeholder="Masukkan nomor HP anda"  required>
                    </div>
                    <div class="input-box">
                        <span class="detail"> Jenis Layanan </span>
                        <input type="text" name="layanan" placeholder="Masukan Pelayanan yang digunakan" required>
                    </div>
                    <div class="input-box">
                        <div class="detail">
                            <span class="detail"> Tanggal Pesan </span>
                            <input type="date" name="tanggal" required> <br>
                        </div>
                    </div>
                    <div class="input-check">
                        <input type="radio" name="metode" value="cash" id="dot-1">
                        <input type="radio" name="metode" value="transfer" id="dot-2">
                        <span class="metode-judul"> Metode Pembayaran </span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="metode">Cash</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="metode">Transfer</span>
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="input-gambar">
                        <span class="detail"> Masukan Foto KTP Anda </span>
                        <input type="file" name="gambar" placeholder="Jika Ada">
                    </div>
                    <div class="button-submit">
                        <input type="submit" value="kirim" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>