<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
    require "connect.php";
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * FROM pelayanan where nama LIKE '%$keyword%' or metode LIKE '%$keyword%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM  pelayanan");
    }
    $pelayanan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pelayanan[] = $row;
    }
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
    <title>Data-Pelayanan</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <a href="Halodoc.html"><img src="halodoc-logo.png"></a>
        <nav>
            <ul class="navbar">
                <li><a href='admin.php'>Home</a></li>
                <li><a href='Add_Dokter.php'>Tambah Dokter</a></li>
                <li><a href='Data_Dokter.php'>Data Dokter</a></li>
                <li><a href='about-me.html'>About Me</a></li>
                <li><a href="Data-Pelayanan.php">Data_Layanan</a></li>
                <?php if(!isset($_SESSION["login"])){
                    echo('<li><a href="login.php" class="tbl-pink" id="sign">Sign In</a></li>');
                }else {
                    echo('<li><a href="logout.php" class="tbl-pink" id="logout">logout</a></li>');
                } ?>
                
                <li>
                    <label>
                        <input type="checkbox" class="checkbox" id="tombol">
                        <span class="check"></span>
                    </label>
                </li>
            </ul>
        </nav>
    </header>
    <div class="table-content">
        <h1 align="center"> DATA PELAYANAN </h1>
        <form action = "" method = "GET">
            <div class="search-box">
                <input class = "search-txt" type="text" name ="keyword" placeholder="Cari pelayanan">
                <button type ="submit" class="search-btn" name ="search"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <table border ="1">
            <thead align="center">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>EMAIL</th>
                    <th>LAYANAN</th>
                    <th>TANGGAL</th>
                    <th>METODE</th>
                    <th>KTP</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            
            <?php $i = 1; foreach ($pelayanan as $layan):?>
            <tr>
                <td><?php echo $layan["id"]; ?></td>
                <td><?php echo $layan["nama"] ;?></td>
                <td><?php echo $layan["alamat"] ;?></td>
                <td><?php echo $layan["email"] ;?></td>
                <td><?php echo $layan["layanan"] ;?></td>
                <td><?php echo $layan["tanggal"] ;?></td>
                <td><?php echo $layan["metode"] ;?></td>
                <td><img src="img/<?= $layan['gambar'] ?>" width="50" height="50"></td>
                <td>
                    <a class = "btn-update" href="update-layanan.php?id=<?php echo $layan["id"];?>"><i class='bx bxs-edit'></i></a>
                    <a class = "btn-delete" href="delete-layanan.php?id=<?php echo $layan["id"];?>"><i class='bx bx-trash' ></i></a>
                </td>
            </tr>
            
            <?php $i++; endforeach;?>
            <tr>
                <th colspan ="9">Kembali ke halaman Utama ? <a  class="daftar" href="admin.php" style="text-decoration:none">Back</a></th>
            </tr>
        </table>
    </div>
    <footer>
        <div class="footer">
            <div class="row">
                <div class="footer-col">
                    <h4> Follow Us </h4>
                    <div class="social-links">
                        <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
                    <div class="footer-col">
                        <h4>Layanan</h4>
                        <ul>
                            <li><a href="#">Bantuan</a></li>
                            <li><a href="#">Accept Cookies</a></li>
                            <li><a href="#">konsultasi</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>jelajah</h4>
                        <ul>
                            <li><a href="#">karir</a></li>
                            <li><a href="#">security</a></li>
                            <li><a href="#">media</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Apotik</h4>
                        <ul>
                            <li><a href="#">Columbia</a></li>
                            <li><a href="#">Restu Ibu</a></li>
                            <li><a href="#">Kimia Farma</a></li>
                            <li><a href="#">Kurnia</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var tombol = document.getElementById("tombol");

        tombol.onclick = function(){
            document.body.classList.toggle("dark-mode");
        }
    </script>
</body>
    