<?php 
    session_start();
    require 'connect.php';

    $id = $_GET['id'];
    $sqlShow = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id = $id");
    $hapus_di_direktori = mysqli_fetch_assoc($sqlShow);
    unlink("img/".$hapus_di_direktori['gambar']);

    $result = mysqli_query($conn, "DELETE FROM pelayanan WHERE id = $id");

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'Data-Pelayanan.php';
            </script>
        ";
    }else{  
        echo"
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'Data-Pelayanan.php';
            </script>
        ";
    }
?>