<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<lin>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halodoc.co.id</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
            <a href="Halodoc.html"><img src="halodoc-logo.png"></a>
            <nav>
                <ul class="navbar">
                    <li><a href='#home'>Home</a></li>
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
        <main>
            <div class="wrapper">
                <section id="home">
                    <img src="3568984.png" width="45%">
                    <div class="column">
                        <p class="description">Konsultasi dokter flexibel #dirumahaja</p>
                        <h2>Stay Healty in your home</h2>
                        <p class="desc">Chat dokter, kunjungi rumah sakit, beli obat, cek lab dan update informasi seputar kesehatan, semua bisa di Halodoc!</p>
                        <p><a href="" class="view-pink" id="bool"> Learn more!</a></p>
                    </div>
                </section>
            </div>
            <div class="layan">
                <section id="pelayanan">
                    <div class="column">
                        <p class="description">You will need all benefits!!!</p>
                        <h2>Pelayanan terpercaya Untuk Anda!</h2>
                        <p class="desc">Aplikasi Halodoc -, yaitu aplikasi dokter. Tujuan dibentuknya Halodoc adalah untuk menyederhanakan akses kesehatan dengan memanfaatkan online untuk Anda bisa berinteraksi langsung dengan dokter pilihan lewat website.</p>
                        <p class="desc">Halodoc juga bekerja sama dengan lebih 20.000 dokter terpercaya dan berpengalaman di bidangnya. Semua dokter yang terdaftar di aplikasi Halodoc memiliki Surat Tanda Registrasi (STR) dan Surat Izin Praktek (SIP) yang sah.</p>
                        <p><a href="" class="view-pink" id="view">View-more!</a></p>
                    </div>
                    <img src="OQ6UTW0.jpg" width="30%">
                </section>
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
        <script src="script.js"></script>
        <script>
            var tombol = document.getElementById("tombol");
    
            tombol.onclick = function(){
                document.body.classList.toggle("dark-mode");
            }
        </script>
</body>
</html>