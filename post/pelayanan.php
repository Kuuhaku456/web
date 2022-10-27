<?php
    require "connect.php";
    
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
            $sql = "INSERT INTO pelayanan VALUES('','$nama','$alamat','$email','$layanan','$tanggal','$metode','$gambar_baru')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>
                            alert('Terima kasih sudah memesan Tuan >_<')
                            document.location.href = 'index.php';
                        </script>";
            }
            else{
                echo error_log($result);
                echo "<script>
                            alert('Oh shit ada yang salah Tuan >_<')
                            document.location.href = 'pelayanan.php';
                        </script>";
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
    <title>Pelayanan</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <a href="Halodoc.html"><img src="halodoc-logo.png"></a>
        <nav>
            <ul class="navbar">
                <li><a href='index.php'>Home</a></li>
                <li><a href='pelayanan.php'>Pelayanan</a></li>
                <li><a href='#partners'>Partner</a></li>
                <li><a href='about-me.html'>About Me</a></li>
                <li><a href="#contact">Contact</a></li>
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

    <div class="judul">
        <p align = "center"> PESANAN PELAYANAN !!! </p>
    </div>
    
    <main>
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
    </div>
    </main>
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
</html>