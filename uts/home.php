<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="style.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Caveat:wght@700&display=swap');
    </style>
</head>
<body>
    <!-- Connection to Database -->
    <?php
    $con = mysqli_connect("localhost","root","","karyawan_kel11");
    ?> 

    <!-- Connection to Framework -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <h3 class="navbar-brand" style="font-size : 50px;color:white;font-family: 'Caveat', cursive;">Healthy Food <i class="bi bi-cart-check"></i></h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 25px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Home
                    </a>
                    <ul class="dropdown-menu" style="background-color:#3ca071; font-size: 25px;">
                        <li><a class="dropdown-item" href="#home" style="font-size: 25px;">Home</a></li>
                        <li><a class="dropdown-item" href="#aboutus" style="font-size: 25px;">About Us</a></li>                                         
                        <li><a class="dropdown-item" href="#contact" style="font-size: 25px;">Contact</a></li>                                         
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="performance.php" style="font-size: 25px;">Performance</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
	<!-- End of Navbar -->

        <!-- Home -->
    <section id="home">
            <div class="container-fluid">
            <h1 class="text-center pb-3" style="padding-top: 0%;">Home</h1>
            <div class="row">
                <div class="col-md">
                <div class="card border-success-subtle m-5" style="width: 17rem;">
                    <div class="card-header bg-success-subtle">
                        <h3 class="card-title">Jumlah Karyawan</h3>
                    </div>
                    <div class="card-body">
                    <div id="date">
                        <script>
                            var date = new Date();
                            document.getElementById('date').innerHTML = '<b><u>' + date.toLocaleDateString();+'</u></b>';
                        </script>                                                                                          
                    </div>
                    <div>
                        <table>
                        <tr>
                            <td>
                            <label for="tetap"><b>Tetap</b></label>
                            </td>
                            <td>
                            <b> : </b>
                            </td>
                            <td>
                            <b>
                            <?php
                                include 'style.php';
                                jk_tetap();                                               
                            ?>
                            </b>
                            </td>
                        </tr>                     
                        <tr>
                            <td>
                            <label for="tidaktetap"><b>Tidak Tetap</b></label>
                            </td>
                            <td>
                            <b>:</b>
                            </td>
                            <td>
                            <b>
                            <?php
                                ob_start();
                                jk_tidaktetap();                                               
                            ?> 
                            </b>           
                            </td>
                        </tr>
                        </table>                                               
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md">
                <div class="card border-success-subtle m-5" style="width: 17rem;">
                    <div class="card-header bg-success-subtle">
                        <h3 class="card-title">Hasil Performance Karyawan Tetap</h3>               
                    </div>
                    <div class="card-body">
                    <div id="year">
                        <script>                    
                        var date = new Date();
                        var year = date.getFullYear();                                    
                        document.getElementById("year").innerHTML="<b><u>Tahun "+year+"</u></b>";//output                                       
                        </script>                                      
                    </div>
                    <table>
                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapA FROM performance WHERE status_kerja = 'Tetap' AND grade = 'A'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapA'];                  
                        }
                        ?>
                        <tr>
                        <td>
                            <label for="a"><b>A</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_Tetap_A"><b><?=$data?></b></label>          
                        </td>
                        </tr>
                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapB FROM performance WHERE status_kerja = 'Tetap' AND grade = 'B'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapB'];                  
                        }
                        ?>
                        
                        <tr>
                        <td>
                            <label for="b"><b>B</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_Tetap_B"><b><?=$data?></b></label>
                        </td>
                        </tr>

                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapC FROM performance WHERE status_kerja = 'Tetap' AND grade = 'C'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapC'];                  
                        }
                        ?>
                        
                        <tr>
                        <td>
                            <label for="C"><b>C</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_Tetap_C"><b><?=$data?></b></label>
                        </td>
                        </tr>

                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapD FROM performance WHERE status_kerja = 'Tetap' AND grade = 'D'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapD'];                  
                        }
                        ?>

                        <tr>
                        <td>
                            <label for="b"><b>D</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_Tetap_D"><b><?=$data?></b></label>
                        </td>
                        </tr>
                    </table>         
                    </div>                              
                </div>
                </div>
                <div class="col-md">
                <div class="card border-success-subtle m-5" style="width: 17rem;">
                    <div class="card-header bg-success-subtle">
                        <h3 class="card-title">Hasil Performance Karyawan Tidak Tetap</h3>               
                    </div>
                    <div class="card-body">
                    <div id="year1" class="">                    
                        <script>                    
                        var date = new Date();
                        var year = date.getFullYear();                                    
                        document.getElementById("year1").innerHTML="<b><u>Tahun "+year+"</u></b>";//output                                       
                        </script>
                    </div>
                    <table>
                        <?php
                        $sql    = "SELECT COUNT(*) AS hasilttetapA FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade = 'A'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasilttetapA'];                  
                        }
                        ?>
                        <tr>
                        <td>
                            <label for="a"><b>A</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_TidakTetap_A"><b><?=$data?></b></label>          
                        </td>
                        </tr>
                        <?php
                        $sql    = "SELECT COUNT(*) AS hasilttetapB FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade = 'B'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasilttetapB'];                  
                        }
                        ?>
                        
                        <tr>
                        <td>
                            <label for="b"><b>B</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_TidakTetap_B"><b><?=$data?></b></label>
                        </td>
                        </tr>

                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapC FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade = 'C'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapC'];                  
                        }
                        ?>
                        
                        <tr>
                        <td>
                            <label for="c"><b>C</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_TidakTetap_C"><b><?=$data?></b></label>
                        </td>
                        </tr>

                        <?php
                        $sql    = "SELECT COUNT(*) AS hasiltetapD FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade = 'D'";
                        $result = mysqli_query($con,$sql);
                        if($result->num_rows>0){
                        $row = $result->fetch_assoc();
                        $data = $row['hasiltetapD'];                  
                        }
                        ?>

                        <tr>
                        <td>
                            <label for="d"><b>D</b></label>
                        </td>
                        <td>
                            <b> : </b>
                        </td>
                        <td>
                            <label for="Hasil_TidakTetap_D"><b><?=$data?></b></label>
                        </td>
                        </tr>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>        
            
            <div class="card border-success-subtle m-5" style="border-radius: 20px;">
            <div class="card-header bg-success-subtle">
                <h5 class="text-center" style="font-size: 50px;">Karyawan Tetap dengan Performance C dan D</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive-md">        
            <table class="table table-success table-striped table-hover text-center" border="1">
            <?php
            $sql    = "SELECT * FROM performance WHERE status_kerja = 'Tetap' AND grade BETWEEN 'C' AND 'D'";
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result)>0){
                while ($data = mysqli_fetch_array($result)){
            ?> 

            <tr>            
                <th scope="col">Image</th>
                <th scope="col">NIK</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
            </tr>                   

            <tr class="hover">            
                <td>
                <img class="imagee" src="../image/<?=$data['nik'].'-'.$data['nama'].'.png';?>" alt="Logo <?=$data['nik'].'-'.$data['nama'];?>" style="width: 200px;" class="rounded">              
                </td>
                <td>
                <?=$data['nik'];?>
                </td>
                <td>
                <?=$data['nama'];?>
                </td>
                <td>
                <?=$data['position'];?>
                </td>
            </tr>
            
            <?php
                }  
            }else{
                ?>
                <tr>                    
                    <th scope="col">Image</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>         
                </tr>
                <tr>
                    <td colspan="8" align="center"><i>Data Belum Ada</i></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </div>
            </div>
        </div>

        
            <div class="card border-success-subtle m-5" style="border-radius: 20px;"> 
            <div class="card-header bg-success-subtle">                
                <h5 class="text-center" style="font-size: 50px;">Karyawan Tidak Tetap dengan Performance C dan D</h5>
            </div>
            <div class="card-body">                          
            <div class="table-responsive-md">
            <table class="table table-success table-striped table-hover text-center" border="1">
            <?php
            $sql    = "SELECT * FROM performance WHERE status_kerja = 'Tidak Tetap' AND grade BETWEEN 'C' AND 'D'";
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result)>0){
                while ($data = mysqli_fetch_array($result)){
            ?>  

            <tr>                    
                <th scope="col">Image</th>
                <th scope="col">NIK</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>         
            </tr>

            <tr class="hover">            
                <td>
                    <img class="imagee" src="../image/<?=$data['nik'].'-'.$data['nama'].'.png';?>" alt="Logo <?=$data['nik'].'-'.$data['nama'];?>" style="width:200px" class="rounded">              
                </td>
                <td>
                    <?=$data['nik'];?>
                </td>
                <td>
                    <?=$data['nama'];?>
                </td>
                <td>
                    <?=$data['position'];?>
                </td>
            </tr>
            
            <?php
                }
            }else{
                ?>
                <tr>                    
                    <th scope="col">Image</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>         
                </tr>
                <tr>
                    <td colspan="8" align="center"><i>Data Belum Ada</i></td>
                </tr>
                <?php
            }
            ?>

            </table>
            </div>
        </div>
        </div>
        </section>					
    <!-- End of Home -->

    <!-- About US -->
    <section id="aboutus" class="pb-md-5">
        <div class="container-fluid p-md-5">
            <h1 class="text-center pb-5" style="padding-top:2em">About Us</h1>
                <div class="row p-5">
                    <div class="col-md-4 text-center">
                        <img src="../image/piring.png" alt="" class="img-fluid" width="1000px">
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success-subtle">
                            <div class="card-text">
                                <div class="card-header bg-success-subtle">
                                    <h2 style="font-family: 'Caveat', cursive;">Healthy Food <i class="bi bi-cart-check"></i></h2>
                                </div>
                                <div class="card-body">                                   
                                    <p id="custom-p" align="justify">
                                    Healthy Food didirikan dengan visi untuk mengubah cara orang melihat dan mengonsumsi makanan. Kami adalah perusahaan yang berdedikasi untuk menyediakan solusi nutrisi berkualitas tinggi yang menjadikan kesehatan dan kesejahteraan sebagai prioritas utama. Kami percaya bahwa makanan adalah kunci untuk mencapai kehidupan yang seimbang, penuh energi, dan bahagia.
                                    Kami mengambil tanggung jawab besar dalam memilih bahan-bahan kami. Setiap produk yang kami tawarkan telah dipilih dengan cermat, ditanam dengan peduli, dan diproses dengan cinta. Kami bekerja sama dengan petani dan produsen lokal untuk mendukung komunitas serta memastikan bahwa semua makanan yang kami tawarkan segar, lezat, dan bebas dari bahan tambahan yang tidak sehat.
                                    Kami memahami bahwa setiap individu memiliki kebutuhan nutrisi yang berbeda. Oleh karena itu, kami menawarkan beragam produk makanan sehat yang dapat disesuaikan dengan berbagai preferensi diet, mulai dari vegan, vegetarian, gluten-free, hingga paleo. Keberagaman menu kami memberi Anda lebih banyak pilihan untuk menjalani gaya hidup yang sehat tanpa harus mengorbankan rasa.
                                    Di Healthy Food, kami percaya bahwa makanan sehat harus mudah diakses oleh semua orang. Oleh karena itu, kami berkomitmen untuk menjaga harga yang terjangkau sehingga makanan berkualitas tinggi dapat dinikmati oleh semua lapisan masyarakat.
                                    Kami mengundang Anda untuk bergabung dalam perjalanan kami untuk menciptakan masyarakat yang lebih sehat dan bahagia melalui makanan. Bersama-sama, mari kita meraih hidup seimbang yang kita semua impikan.
                                    Terima kasih atas dukungan Anda dan selamat datang di Healthy Food!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row p-5">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-center">
                        <img class="pb-5 img-fluid " src="../image/posterbuah.png" class="img-fluid imgshadow" alt="poster buah" width="500px">
                    </div>
                    <div class="col-md-7">
                        <img class="img-fluid" src="../image/tomato.png" alt="" width="1000px">
                    </div>
                </div>       
        </div>      
    </section>


    <!-- End of About US -->
    
    <!-- Contact Us -->
    <section id="contact">       
        <div class="container-fluid text-center">
            <h1 class="text-center pb-5" style="font-size: 600%;">Contact</h1>
            <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="card border-success-subtle m-5" style="border-radius:30px;">               
                    <div class="card-body">
                            <h5 class="card-title text-center" style="font-size: 200%;">Kantor Alam Sutera</h5>
                            <p class="card-text text-center">Alam Sutera blok A7 no 18b <br>08365436363</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="../image/banana.jpg" alt="pisang" width="1000px">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ms-md-auto">
                    <img class="img-fluid" src="../image/healthyfood.png" alt="food">
                </div>
                <div class="col-md-4 ms-md-auto">
                    <div class="card border-success-subtle m-5" style="border-radius:30px; ">                                       
                        <div class="card-body">
                            <h5 class="card-title text-md-center" style="font-size: 200%;">Kantor Administrasi</h5>
                            <p class="card-text text-md-center">Alam Sutera blok A7 no 15b <br>08384524522</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" src="../image/piring.png" alt="" width="500px">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="card border-success-subtle m-5" style="border-radius:30px;">
                        <div class="card-body">
                            <h5 class="card-title text-md-center" style="font-size: 200%;">Kantor Banjar</h5>
                            <p class="card-text text-md-center">Banjar Wijaya blok A no 17 <br>08314522453</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="../image/vegetables.jpeg" alt="love" width="500px">
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contact Us -->

    <!--Footer-->
    <footer class="text-center text-white pt-md-4">
        <div class="container pb-4">
            <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#" role="button"><i class="bi bi-facebook"></i></a>
            <a class="btn text-white btn-floating m-1" style="background-color: #1F1717;"href="#"role="button"><i class="bi bi-twitter-x"></i></a>
            <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"href="#" role="button"><i class="bi bi-instagram"></i></a>
            <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#"role="button"><i class="bi bi-linkedin"></i></a>
            <a class="btn text-white btn-floating m-1" style="background-color: #333333;"href="#"role="button"><i class="bi bi-github"></i></a>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="#">Kelompok 11</a>
        </div>
    </footer>


    <!-- End of Footer -->
</body>
</html>