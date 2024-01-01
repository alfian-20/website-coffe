<?php
include "conn.php";
$conn = mysqli_connect('localhost','root','','kadaiateh');
session_start();
$result = mysqli_query($conn, "SELECT * FROM datacostumer");
if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;
}

$username=$_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu copy.css">
</head>
<body>
    <div class="ncountainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="name">Dalang Tech</div>
            </div>
            <ul class="navigation">
                        <!-- if session username available then fetch username -->
            
                        <?php
            if (isset($_SESSION["username"]) == 'admin') {
                ?>
                  <li><a href="indexadmin.php" class="nav">Home</a></li>
                                <li><a href="DataCostumer.php" class="nav">Data Costumer</a></li>
                                <li><a href="InputProduk.php" class="nav">Input Produk</a></li>
                                <!-- login button -->
                                <li><a href="logout.php" class="nav">Hallo
                                <?php echo $username; ?></a></li>
                <?php
            }
                
                
             else {
             ?>
             <li><a href="index.php" class="nav">Home</a></li>
                                <li><a href="DataCostumer.php" class="nav">Data Costumer</a></li>
                                <li><a href="DataProduk.php" class="nav">Data Produk</a></li>
                                <li><a href="InputProduk.php" class="nav">Input Produk</a></li>
                                <li><a href="InputDataCostumer.php" class="nav">Register</a></li>
                                <!-- login button -->
                                <li><a href="login.php" class="nav">Login</a></li>
                                <?php

            }

            ?>  
            </ul>
        </nav>
    </div>
    <div class="icountainer">
        <div class="place">
            <h1 class="judul">Data Customer</h1>
            <div class="table">
                <table border="1" class="tabel-input">
                    <thead>   
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No.Hp</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nama barang</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead> 

                    <tbody>
                    <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          <td class="no">1</td>
                          <td><?php echo $row["nama"]; ?></td>
                          <td><?php echo $row["hp"]; ?></td>
                          <td><?php echo $row["email"]; ?></td>
                          <td><?php echo $row["alamat"]; ?></td>
                          <td><?php echo $row["namabarang"]; ?></td>
                          <td><?php echo $row["status"]; ?></td>
                          <td><?php
                       $resultcountconfirmation = mysqli_query($conn, "SELECT * FROM `datacostumer` WHERE status = 'Menunggu' AND id = $row[id];");
                          $data=mysqli_fetch_assoc($resultcountconfirmation);
                            if ($data['status'] == 'Menunggu') {
                                echo '<a href="payconfirm.php?id='.$row["id"].'">Konfirmasi</a>';
                            } else if ($data ['status'] == 'Selesai') {
                                echo '<p> - </p>';
                            }

                        ?>
                        </td>
                        </tr>
                          <?php $i++; endwhile; ?>
                      </tbody> 
                </table>
                
            </div>
        </div>
    </div>
    
</body>
</html> 