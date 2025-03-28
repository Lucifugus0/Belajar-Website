<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Performance</title>
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
        <h1 class="navbar-brand" style="font-size : 50px;color:white;font-family: 'Caveat', cursive;">Healthy Food <i class="bi bi-cart-check"></i></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 25px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Home
                    </a>
                    <ul class="dropdown-menu" style="background-color: #3ca071;font-size: 25px;">
                        <li>
                          <a class="dropdown-item" href="home.php#home" style="font-size: 25px;"> Home</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="home.php#aboutus" style="font-size: 25px;">About Us</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="home.php#contact" style="font-size: 25px;">Contact</a>
                        </li>                  
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

	<!-- Performance -->
  <section id="performance" class="p-sm-5">    
    <div class="container-fluid">
    <h1 class="text-center mb-5" style="font-size: 600%;padding-top:0%;">Performance</h1>
      <?php
      $con = mysqli_connect("localhost","root","","karyawan_kel11");
      if (isset($_GET['aksi'])){
				switch($_GET['aksi']){
          case "view2":
            view2($con);
            view($con);
            break;
					case "edit":
						edit($con);
            view($con);          
						break;
					case "hapus":
            delete($con);                                
						break;
					default:
						echo "<h3>Aksi <i>".$_GET['aksi']."</i> Belum Tersedia</h3>";
						add($con);
						view2($con);
				}
			}
			else{
				add($con);
        view($con);
			}
      ?>
    
      <!-- Function View -->
          <?php
      function view($con){  
          ?>
          <div class="container-fluid p-5">
          <div class="card border-success-subtle"> 
            <div class="card-header bg-success-subtle">
              <h2 style="font-size: 300%;">List</h2>
            </div> 
            <div class="card-body">
            <div class="table-responsive-md">                 
          <table class="table table-success table-striped table-hover text-center" border="1">
          <thead>
            <tr>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Status Kerja</th>
                <th>Posisi</th>
                <th>Total</th>
                <th>Grade</th>
                <th>Aksi</th> 
            </tr>          
          </thead>
          <?php

            $sql = "SELECT * FROM performance";
            $result = mysqli_query ($con,$sql);
            if (mysqli_num_rows($result)>0){
              while ($data = mysqli_fetch_array($result)){
          ?>
            <tbody class="">
            <tr class="hover">
              <td><?=$data['tgl_penilaian'];?></td>
              <td><?=$data['nik'];?></td>
              <td><?=$data['nama'];?></td>
              <td><?=$data['status_kerja'];?></td>
              <td><?=$data['position'];?></td>
              <td><?=$data['total'];?></td>
              <td><?=$data['grade'];?></td>
              <td colspan="3">                          
                <a href="performance.php?aksi=view2&nik=<?=$data['nik'];?>#performance"><button type="button" class="btn btn-primary">View</button></a>
                <a href="performance.php?aksi=edit&nik=<?=$data['nik'];?>#performance"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="performance.php?aksi=hapus&nik=<?= $data['nik']; ?>&foto=<?= $data['foto']; ?>#performance" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger">Delete</button></a>                                                          
              </td>
            </tr>
          <?php
              }
            }
            else {
          ?>
            <tr>
              <td colspan="8" align="center"><i>Data Belum Ada</i></td>
            </tr>
            </tbody>
          </table>
          </div> 
          </div>
          </div>
          </div>                
          <?php
                } 
            ?>
          <?php 
      }
          ?>
            
      <!-- End of Function View -->

      <!-- Function View2 -->
          <?php
      function view2($con){ 
        $nik = $_GET['nik'];
        $sql = "SELECT * FROM performance WHERE nik = '$nik'"; 
        $result = mysqli_query($con,$sql);

        while($data = mysqli_fetch_array($result)){
          ?>
        <div class="container-fluid p-5">
        <div class="card border-success-subtle" >
        <div class="card-header bg-success-subtle">
          <h2 style="font-size: 300%;">View</h2>
        </div>  
          <div class="card-body">  
          <form  enctype="multipart/form-data">                                     
            <div class="row mb-3">
              <label for="foto" class="col-xxl-2 col-form-label"><b>Foto <i class="bi bi-card-image"></i></b></label>            
            </div>                
            <img class="imagee" src="../image/<?=$data['nik'].'-'.$data['nama'].'.png';?>" height="200px" width="200px" id="foto" alt="Logo <?=$data['nik'].'-'.$data['nama'];?>" readonly>                
          
            <div class="row mb-3">
              <label for="tgl_penilaian" class="col-xxl-2 col-form-label"><b>Tanggal Penilaian</b></label>
              <input type="date" value="<?=$data['tgl_penilaian'];?>" class="form-control bg-success-subtle" name="tgl_penilaian" id="tgl_penilaian"  style="width: 1200px;" readonly>
            </div>
                
            <div class="row mb-3">
              <label for="nik" class="col-xxl-2 col-form-label"><b>NIK</b></label>
              <input type="number" value="<?=$data['nik'];?>" class="form-control bg-success-subtle" min="0" name="nik" id="nik" required style="width: 1200px;" readonly/>
            </div>

            <div class="row mb-3">
              <label for="nama" class="col-xxl-2 col-form-label"><b>Nama <i class="bi bi-card-text"></i></b></label>                                      
              <input type="text" value="<?=$data['nama'];?>" class="form-control bg-success-subtle" name="nama" id="nama" style="width: 1200px;" readonly/>
            </div>

            <div class="row mb-3">
            <label class="col-xxl-2 col-form-label " id="status" for="status" readonly><b>Status</b></label>
              <select class="form-select bg-success-subtle" style="width: 1200px;" id="status">
                <option readonly value="Tidak Tetap" <?= ($data['status_kerja'] == 'Tidak Tetap') ? 'selected' : ''; ?>>Tidak Tetap</option>                  
                <option readonly value="Tetap" <?= ($data['status_kerja'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
              </select>
            </div>

            <div class="row mb-xxl-3">
              <label for="posisi" class="col-xxl-2 col-form-label"><b>Posisi</b></label>                                 
              <input type="text" value="<?=$data['position'];?>" class="form-control bg-success-subtle" name="position" id="posisi" style="width: 1200px;" readonly/>          
            </div>

            <div class="row mb-3">
                  <label for="responsibility" class="col-xxl-2 col-form-label"><b>Responsibility(30%)</b></label>                  
                  <input type="number" value="<?=$data['responsibility'];?>" class="form-control bg-success-subtle" name="responsibility" id="responsibility" max="100" min="0" style="width: 1200px;" readonly/>                  
            </div>

            <div class="row mb-3">
                  <label for="teamwork" class="col-xxl-2 col-form-label"><b>Team Work(30%)</b></label>                  
                  <input type="number" value="<?=$data['teamwork'];?>" class="form-control bg-success-subtle" name="teamwork" id="teamwork" max="100" min="0" style="width: 1200px;" readonly/>                 
            </div>

            <div class="row mb-3">
                  <label for="management_time" class="col-xxl-2 col-form-label"><b>Management Time(40%)</b></label>                                    
                  <input type="number" value="<?=$data['management_time'];?>" class="form-control bg-success-subtle" name="management_time" id="management_time" max="100" min="0" style="width: 1200px;" readonly/>
            </div>
            <div class="row mb-3">
                  <label for="total" class="col-xxl-2 col-form-label"><b>Total</b></label>                  
                  <input type="number" value="<?=$data['total'];?>" class="form-control bg-success-subtle" name="total" id="total" max="100" min="0" style="width: 1200px;" readonly/>
            </div>

            <div class="row mb-3">
                  <label for="grade" class="col-xxl-2 col-form-label"><b>Grade</b></label>                  
                  <input type="text" value="<?=$data['grade'];?>" class="form-control bg-success-subtle" name="grade" id="grade" style="width: 1200px;" readonly/>               
            </div>

            <input type="button" name="back" value="Back" class="btn btn-secondary" onclick="window.location.href='performance.php#performance'"/>
		      </form>
          </div>
          </div>
          </div>           
          <?php              
                    }
      }
          ?>
                
      <!-- End of Function View2 -->
                
      <!-- Function Add -->
          <?php                
      function add($con){
        ob_start();    
        ?>
        <div class="container-fluid p-5">
        <div class="card border-success-subtle">
        <div class="card-header bg-success-subtle">
          <h2 style="font-size: 300%;">Add</h2>
        </div>  
          <div class="card-body">  
          <form action="" method="POST" enctype="multipart/form-data">                                     
            <div class="row mb-3">
              <label for="foto" class="col-xxl-2 col-form-label"><b>Foto <i class="bi bi-card-image"></i></b></label>            
              <input type="file" class="form-control bg-success-subtle" id="foto" name="foto" accept=".png, .jpg, .jpeg" required style="width: 1200px;">              
            </div>                
          
            <div class="row mb-3">
              <label for="tgl_penilaian" class="col-xxl-2 col-form-label"><b>Tanggal Penilaian</b></label>
              <input type="date" class="form-control bg-success-subtle" name="tgl_penilaian" id="tgl_penilaian" required style="width: 1200px;">
            </div>
                
            <div class="row mb-3">
              <label for="nik" class="col-xxl-2 col-form-label"><b>NIK</b></label>
              <input type="number" class="form-control bg-success-subtle" min="0" name="nik" id="nik" required style="width: 1200px;"/>
            </div>

            <div class="row mb-3">
              <label for="nama" class="col-xxl-2 col-form-label"><b>Nama <i class="bi bi-card-text"></i></b></label>                                      
              <input type="text" class="form-control bg-success-subtle" name="nama" id="nama" style="width: 1200px;"/>
            </div>

            <div class="row mb-3">
              <label class="col-xxl-2 col-form-label" for="status"><b>Status</b></label>
                <select name="status_kerja" style="width: 1200px;" id="status" class="form-control bg-success-subtle">
                      <option value="Tetap">Tetap</option>
                      <option value="Tidak Tetap">Tidak Tetap</option>	
                </select> 
            </div>

            <div class="row mb-3">
              <label for="posisi" class="col-xxl-2 col-form-label"><b>Posisi</b></label>                                 
              <input type="text" class="form-control bg-success-subtle" name="position" id="posisi" style="width: 1200px;" maxlength="10"/>          
            </div>

            <div class="row mb-3">
                  <label for="responsibility" class="col-xxl-2 col-form-label"><b>Responsibility(30%)</b></label>                  
                  <input type="number" class="form-control bg-success-subtle" name="responsibility" id="responsibility" max="100" min="0" style="width: 1200px;"/>
                    <div class="col-auto">
                      <span id="passwordHelpInline" class="form-text">
                        <b>0 - 100</b>
                      </span>
                    </div>
            </div>

            <div class="row mb-3">
                  <label for="teamwork" class="col-xxl-2 col-form-label"><b>Team Work(30%)</b></label>                  
                  <input type="number" class="form-control bg-success-subtle" name="teamwork" id="teamwork" max="100" min="0" style="width: 1200px;"/>
                    <div class="col-auto">
                      <span id="passwordHelpInline" class="form-text">
                        <b>0 - 100</b>
                      </span>
                    </div>
            </div>

            <div class="row mb-3">
                  <label for="management_time" class="col-xxl-2 col-form-label"><b>Management Time(40%)</b></label>                  
                  <input type="number" class="form-control bg-success-subtle" name="management_time" id="management_time" max="100" min="0" style="width: 1200px;"/>
                    <div class="col-auto">
                      <span id="passwordHelpInline" class="form-text">
                        <b>0 - 100</b>
                      </span>
                    </div>
            </div>
            <div class="row mb-3">
                  <label for="total" class="col-xxl-2 col-form-label"><b>Total</b></label>                  
                  <input type="number" class="form-control bg-success-subtle" name="total" id="total" max="100" min="0" style="width: 1200px;" readonly/>
            </div>

            <div class="row mb-3">
                  <label for="grade" class="col-xxl-2 col-form-label"><b>Grade</b></label>                  
                  <input type="text" class="form-control bg-success-subtle" name="grade" id="grade" style="width: 1200px;" readonly/>               
            </div>

            <input type="submit" name="simpan" value="Submit" class="btn btn-success"/>
            <input type="reset" value="Clear" class="btn btn-danger"/>
		      </form>
          </div>
          </div>
          </div>

          <?php
            if(isset($_POST['simpan'])){              
                $foto = $_FILES['foto']['tmp_name'];
                $nik  = $_POST['nik'];
                $nama = $_POST['nama'];
                $stat = $_POST['status_kerja'];
                $pos  = $_POST['position'];
                $tgl  = $_POST['tgl_penilaian'];
                $res  = floatval($_POST['responsibility']);
                $tw   = floatval($_POST['teamwork']);
                $mt   = floatval($_POST['management_time']);
                $ttl  = $_POST['total'];
                $gr   = $_POST['grade'];              
            
                $filenm = $nik.'-'.$nama.'.png';
                move_uploaded_file($foto, '../image/'.$filenm);

                $sql = "INSERT INTO performance (nik,foto,nama,status_kerja,position,tgl_penilaian,responsibility,teamwork,management_time,grade,total)
                VALUES ('$nik','$filenm','$nama','$stat','$pos','$tgl','$res','$tw','$mt','$gr','$ttl')";
                $result = mysqli_query($con,$sql);
                
                if($result){
                  header("location:performance.php#performance");
                }              
            }
            }  
          ?>        
      <!-- End of Function Add -->

      <!-- Function Edit -->
          <?php
      function edit($con){
        $nik = $_GET['nik'];
        $sql = "SELECT * FROM performance WHERE nik = '$nik'"; 
        $result = mysqli_query($con,$sql);
        while($data = mysqli_fetch_array($result)){
          ?>
        <div class="container-fluid p-5">
        <div class="card border-success-subtle" >
        <div class="card-header bg-success-subtle">
          <h2>Edit</h2>
        </div>  
          <div class="card-body">  
          <form action="" method="POST" enctype="multipart/form-data">                                     
            <input type="hidden" id="old" name="old" value="<?= $data['foto']; ?>"/>
            <div class="row mb-3">
              <label for="foto" class="col-xxl-2 col-form-label"><b>Foto <i class="bi bi-card-image"></i></b></label>            
              <input type="file" accept=".png, .jpg, .jpeg" name="foto" id="foto" style="width: 1200px;" class="form-control bg-success-subtle"/>                
            </div>                
            <img <?php ob_start(); ?>src="../image/<?=$data['nik'].'-'.$data['nama'].'.png';?>" width = "200px" height="200px" id="foto" alt="Logo <?=$data['nik'].'-'.$data['nama'];?>">
          
            <div class="row mb-3">
              <label for="tgl_penilaian" class="col-xxl-2 col-form-label"><b>Tanggal Penilaian</b></label>
              <input type="date" value="<?php ob_start();?><?=$data['tgl_penilaian'];?>" class="form-control bg-success-subtle" name="tgl_penilaian" id="tgl_penilaian" style="width: 1200px;">
            </div>
                
            <div class="row mb-3">
              <label for="nik" class="col-xxl-2 col-form-label"><b>NIK</b></label>
              <input type="number" value="<?=$data['nik'];?>" class="form-control bg-success-subtle" min="0" name="nik" id="nik" required readonly style="width: 1200px;"/>
            </div>

            <div class="row mb-3">
              <label for="nama" class="col-xxl-2 col-form-label"><b>Nama <i class="bi bi-card-text"></i></b></label>                                      
              <input type="text" value="<?=$data['nama'];?>" class="form-control bg-success-subtle" name="nama" id="nama" style="width: 1200px;"/>
            </div>

            <div class="row mb-3">
              <label class="col-xxl-2 col-form-label" for="status"><b>Status</b></label>
                <select class="form-select bg-success-subtle" style="width: 1200px;" id="status" name="status_kerja">
                  <option value="Tidak Tetap" <?= ($data['status_kerja'] == 'Tidak Tetap') ? 'selected' : ''; ?>>Tidak Tetap</option>                  
                  <option value="Tetap" <?= ($data['status_kerja'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                </select>
            </div>

            <div class="row mb-3">
              <label for="posisi" class="col-xxl-2 col-form-label"><b>Posisi</b></label>                                 
              <input type="text" value="<?=$data['position'];?>" class="form-control bg-success-subtle" name="position" id="posisi" style="width: 1200px;" maxlength="10"/>          
            </div>

            <div class="row mb-3">
                  <label for="responsibility" class="col-xxl-2 col-form-label"><b>Responsibility(30%)</b></label>                  
                  <input type="number" value="<?=$data['responsibility'];?>" class="form-control bg-success-subtle" name="responsibility" id="responsibility" max="100" min="0" style="width: 1200px;"/>                  
            </div>

            <div class="row mb-3">
                  <label for="teamwork" class="col-xxl-2 col-form-label"><b>Team Work(30%)</b></label>                  
                  <input type="number" value="<?=$data['teamwork'];?>" class="form-control bg-success-subtle" name="teamwork" id="teamwork" max="100" min="0" style="width: 1200px;"/>                 
            </div>

            <div class="row mb-3">
                  <label for="management_time" class="col-xxl-2 col-form-label"><b>Management Time(40%)</b></label>                                    
                  <input type="number" value="<?=$data['management_time'];?>" class="form-control bg-success-subtle" name="management_time" id="management_time" max="100" min="0" style="width: 1200px;"/>
            </div>
            <div class="row mb-3">
                  <label for="total" class="col-xxl-2 col-form-label"><b>Total</b></label>                  
                  <input type="number" value="<?=$data['total'];?>" class="form-control bg-success-subtle" name="total" id="total" max="100" min="0" style="width: 1200px;" readonly/>
            </div>

            <div class="row mb-3">
                  <label for="grade" class="col-xxl-2 col-form-label"><b>Grade</b></label>                  
                  <input type="text" value="<?=$data['grade'];?>" class="form-control bg-success-subtle" name="grade" id="grade" style="width: 1200px;" readonly/>               
            </div>

            <input type="submit" name="update" value="Update" class="btn btn-success"/>
            <input type="reset" value="Clear" class="btn btn-warning"/>
            <input type="button" value="Cancel" class="btn btn-danger" onclick="window.location.href='performance.php#performance'">
		      </form>
          </div>
          </div>
          </div> 
          <?php
        }
          ?>

          <?php                              
            if(isset($_POST['update'])){       
                  $oldfoto = $_POST['old'];
                  $newfoto = $_FILES['foto']['name'];
                  $nama    = $_POST['nama'];
                  $stat    = $_POST['status_kerja'];
                  $pos     = $_POST['position'];
                  $tgl     = $_POST['tgl_penilaian'];
                  $res     = floatval($_POST['responsibility']);
                  $tw      = floatval($_POST['teamwork']);
                  $mt      = floatval($_POST['management_time']);  
                  $ttl     = $_POST['total'];
                  $grade   = $_POST['grade'];    
              
                  if($newfoto == ""){
                    $sql 	= "UPDATE performance SET
                            nama='$nama', tgl_penilaian='$tgl',
                            status_kerja='$stat', position='$pos', responsibility ='$res', teamwork ='$tw', 
                            management_time='$mt',grade='$grade',total='$ttl'
                            WHERE nik = '$nik'"; 					
                    $result = mysqli_query($con,$sql);
                  }
                  else{
                    unlink('../image/'.$oldfoto);
                    $loc 	= $_FILES['foto']['tmp_name'];
                    $filenm = $nik.'-'.$nama.'.png';
                    move_uploaded_file($loc, '../image/'.$filenm);
                    $sql 	= "UPDATE performance SET 
                            nama='$nama', tgl_penilaian='$tgl',
                            status_kerja='$stat', position='$pos', responsibility ='$res', teamwork ='$tw', 
                            management_time='$mt',grade='$grade',total='$ttl'
                            WHERE nik='$nik'";
                    $result = mysqli_query($con,$sql);
                  }
                  if($result){
                    header("location:performance.php");
                  }
            }                                                                    
      }            
          ?>
      
      <!-- End Of Function Edit -->
      
      <!-- Function Delete -->
          <?php          
      function delete ($con){
        $nik		= $_GET['nik'];
        $foto   = $_GET['foto'];              
              
        unlink('../image/'.$foto);
        $sql	  = "DELETE FROM performance WHERE nik='$nik'";
        $result = mysqli_query($con,$sql);
        if($result){
          header("location:performance.php");
        }          
        ob_end_flush();                                          
      }
          ?>
      <!-- End of Function Delete --> 
    </div>     
  </section>
	<!-- End of Performance -->

  <!--Footer  -->
  <footer>
        <div class="fixed-bottom" style="background-color: rgba(0, 0, 0, 0.2);">
            <p class="text-center pt-md-2" style="font-size: 15px;">Created with Intention & Love by <a href="https://www.instagram.com/vincent_.m24/"><b><u>Kelompok 11</u></b></a></p>
        </div>
  </footer>    
  <!-- End of Footer -->
</body> 
</html>


