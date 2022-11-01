<?php 
    require 'connect.php';

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM dt_dokter WHERE id = $id");

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil dihapus Tuan >_<');
                document.location.href = 'Data_Dokter.php';
            </script>
        ";
    }
    else{  
        echo"
            <script>
                alert('Data gagal dihapus Tuan >_<');
                document.location.href = 'Data_Dokter.php';
            </script>
        ";
    }
?>
Footer