<?php
            $username = array('Kuuhaku' , 'user');
            $password = array('123', '456');
            if (isset($_POST['submit'])) {
                if ($_POST['username'] == $username[0] && $_POST['password'] == $password[0]){
                    $_SESSION["username"] = $username[0];
                    $_SESSION["priv"] = 'admin'; 
                    $_SESSION["nama"] = $_POST['nama'];
                    header("Location: admin.php");
                }
                elseif ($_POST['username'] == $username[1] && $_POST['password'] == $password[1]){
                    $_SESSION["username"] = $username[1]; 
                    $_SESSION["priv"] = 'user';
                    $_SESSION["nama"] = $_POST['nama'];
                    header("Location: index.php");
                }
                else {
                    echo("<p class='login-register-text'>email atau password anda salah.</p>");
                }
            }
            elseif (isset($_SESSION['username'])){
                header("Location: index.php");
            }
    ?>