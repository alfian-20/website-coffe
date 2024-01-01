<?php
 include "conn.php";
 $conn = mysqli_connect('localhost','root','','kadaiateh');
 $result = mysqli_query($conn, "SELECT * FROM produk");
session_start();

if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;

    
$username=$_SESSION["username"];
$nama = $_SESSION["nama"];
$alamat = $_SESSION["alamat"];
$email = $_SESSION["email"];
$hp = $_SESSION["hp"];
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
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="ncountainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="name">Kadai Ateh</div>
            </div>
            <ul class="navigation">
                
                      
            <?php
            if (isset($_SESSION["username"])) {
                ?>
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
            <?php
            if ($_SESSION["username"] == 'admin') {
               ?>
            <li><a href="indexadmin.php" class="nav">Home</a></li>
            <li><a href="DataProduk.php" class="nav">Data Produk</a></li>                    
            <li><a href="DataCostumer.php" class="nav">Data Costumer</a></li>
                                <li><a href="InputProduk.php" class="nav">Input Produk</a></li>
                                <!-- login button -->
                                <li><a href="logout.php" class="nav">Hallo
                                <?php echo $username; ?></a></li>
               <?php
              }
              ?>
            
            </ul>
        </nav>
    </div>
    <div class="icountainer">
        <div class="place">
            <h1 class="judul">Data Produk</h1>
            <div class="table">
                <table border="1" class="tabel-input">
                    <thead>   
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi Produk</th>
                            <th>Jenis Produk</th>
                            <th>Harga</th>
                            <th>Foto Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead> 

                    <tbody>
                    <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          <td class="no"><?php echo $row["id"]; ?></td>
                          <td><?php echo $row["kodeproduk"]; ?></td>
                          <td><?php echo $row["namaproduk"]; ?></td>
                          <td><?php echo $row["deskripsi"]; ?></td>
                          <td><?php echo $row["jenis"]; ?></td>
                          <td><?php echo $row["harga"]; ?></td>
                          <td class="img"><?php echo'<img src="img/'.$row["images"].'" alt="">'?></td>
                          <td><a href="deleteproduct.php?id=<?php echo $row["id"]; ?>">Hapus | <a href="editproduct.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                        </tr>
                        <?php $i++; endwhile; ?>
                      </tbody> 
                </table>
                
            </div>
        </div>
    </div>
    
</body>
</html> 