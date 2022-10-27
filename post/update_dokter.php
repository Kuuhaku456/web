<?php
    require 'connect.php';
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM dt_dokter WHERE id=$id");
    $dt_dokter = [];

    while ($row = mysqli_fetch_assoc(($result))){
        $dt_dokter[] = $row;
    }

    $dt_dokter = $dt_dokter[0];

    if (isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $lulusan = $_POST['lulusan'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
            
        $sql = "UPDATE dt_dokter SET nama = '$nama', lulusan = '$lulusan', email = '$email', alamat = '$alamat' WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "
                <script>
                    alert('Data Dokter Berhasil Diubah Tuan >_<');
                    document.location.href = 'Data_Dokter.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan Tuan >_<');
                    document.location.href = 'add_dokter.php';
                </script>
            ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Dokter</title>
    <link rel="stylesheet" href="add_dokter.css">
</head>
<body>
    <div class="regform"><h1>FORM PENGISIAN DATA DOKTER</h1></div>
    <div class ="main">
        <form action="" method="POST">
        <div id="name">
            <h2 class="name">Nama Dokter</h2>
            <input class="firstname" type="text" name="nama" placeholder="Masukkan Nama Dokter" required><br>
            <label class="firstlabel">(NB : NAMA SESUAI IJAZAH LULUSAN DOKTER)</label>
        </div>
        <h2 class="name">Lulusan</h2>
        <input class="company" type="text" name="lulusan" placeholder="Masukkan Universitas lulusan dokter" required>
        <label class="companylabel">(NB : NAMA UNIVERSITAS SESUAI IJAZAH)</label>
        <h2 class="name">Email</h2>
        <input class="email" type="text" name="email" placeholder="Masukkan E-mail Dokter" required>
        <h2 class="name">Alamat</h2>
        <input class="number" type="text" name="alamat" placeholder="Masukkan Alamat Dokter" required>
        <button type="submit" name="submit">Tambah</button>
        </form>
    </div>
</body>
</html>