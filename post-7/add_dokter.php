<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
    require "connect.php";
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

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
        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $lulusan = $_POST['lulusan'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $sql = "INSERT INTO dt_dokter VALUES('','$nama','$lulusan','$email','$alamat')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>
                            alert('berhasil menambahkan Data Tuan >_<')
                            document.location.href = 'Data_Dokter.php';
                        </script>";
            }
            else{
                echo error_log($result);
            }
        }
        ?>
    </div>
</body>
</html>