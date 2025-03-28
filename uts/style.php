<?php
    $con = mysqli_connect("localhost","root","","karyawan_kel11");
    function jk_tetap(){
        global $con;
        $sql    = "SELECT COUNT(*) AS jumlah_karyawan FROM performance WHERE status_kerja ='Tetap'";
        $result = mysqli_query($con,$sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $jumlah = $row['jumlah_karyawan'];
            echo $jumlah;
        }
    }

    function jk_tidaktetap(){
        global $con;
        $sql    = "SELECT COUNT(*) AS jumlah_karyawan FROM performance WHERE status_kerja ='Tidak Tetap'";
        $result = mysqli_query($con,$sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $jumlah = $row['jumlah_karyawan'];
            echo $jumlah;
        } 
    }

?>