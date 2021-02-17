<?php

require '../koneksi.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
    table,
    th,  
    td{
        border:2px solid black;
        padding:10px auto;
        margin :10px auto;
        text-align:center;
       
    }
    h1{
      text-align:center;
    }
    </style>
  </head>
  <body>
   

    <div class="container">
         <div class="row">
         <h1>HASIL NILAI</h1>
         <div class="col">
           <table>
           <tr>
           <th>no</th>
           <th>id</th>
           <th>Nama</th>
           <th>soal</th>
       
           <th>nilai</th>
           <th>aksi</th>
            
            </tr>
           <?php
           $no = 1;
           $id = $_GET['id_siswa'];
           $dataSiswa = mysqli_query($conn,"SELECT tbl_siswa.nama,tbl_siswa.id_siswa AS id,
                                                    tbl_jawaban_siswa.jawaban_siswa AS jawaban,COUNT(tbl_jawaban_siswa.id_soal) AS soal,
                                                    tbl_soal.id_soal,tbl_soal.Kunci_jawaban AS kunci,
                                                    COUNT(IF(tbl_soal.Kunci_jawaban = tbl_jawaban_siswa.jawaban_siswa,'benar',NULL)) AS benar,
                                                    COUNT(IF(tbl_soal.Kunci_jawaban <> tbl_jawaban_siswa.jawaban_siswa,'salah',NULL)) AS salah
                                                    
                                                      
                                                    FROM tbl_siswa
                                                    INNER JOIN tbl_jawaban_siswa ON tbl_jawaban_siswa.id_siswa = tbl_siswa.id_siswa 
                                                    INNER JOIN tbl_soal ON tbl_soal.id_soal = tbl_jawaban_siswa.id_soal
                                                    WHERE tbl_jawaban_siswa.id_siswa = '$id'"
                                                      
                                                  );
          
           while($siswa = mysqli_fetch_assoc($dataSiswa)){
           ?>
           
            <tr>
            
            <td><?php echo $no++; ?></td>
            <td><?php echo $siswa['id']; ?></td>
            <td><?php echo $siswa['nama']; ?></td>
            <td><?php echo $siswa['soal'];?></td>
            <td><?php 
                       $benar = $siswa['benar'];
                       $salah = $siswa['salah'];
                      $soal = $siswa['soal'];
                      $nilai = (100 / $soal)*$benar;
                       echo $nilai;
                      
                       
                   ?></td>
   
            
            <td>
            <a href="../index.php">kembali</a>
            </td>
            </tr>
           <?php } ?>
           </table>
         </div>
         
         </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

  </body>
</html>
