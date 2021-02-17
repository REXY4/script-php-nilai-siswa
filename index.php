<?php

require 'koneksi.php';

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
    <h1>HASIL UJIAN SISWA</h1>

    <div class="container">
         <div class="row">
         <div class="col">
           <table>
           <tr>
           <th>no</th>
           <th>id</th>
           <th>nama</th>
            
            <th>detail</th>
            </tr>
           <?php
           $no = 1;
           $dataSiswa = mysqli_query($conn,"SELECT * FROM tbl_siswa ORDER BY nama ASC");
           while($siswa = mysqli_fetch_assoc($dataSiswa)){
           ?>
           
            <tr>
            <td><?php echo $no++ ;?></td>
            <td><?php echo $siswa['id_siswa']; ?></td>
            <td><?php echo $siswa['nama']; ?></td>
        
            <td>
            <a href="data/detail.php?id_siswa=<?php echo $siswa['id_siswa']; ?>">detail</a>
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
