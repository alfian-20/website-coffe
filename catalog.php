<?php
include "conn.php";
session_start();

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
                <div class="name">Kadai Ateh</div>
            </div>
            <ul class="navigation">
                                  <!-- if session username available then fetch username -->
                                  <?php
            if (isset($_SESSION["username"])) {
                ?>
                <li><a href="index.php" class="nav">Home</a></li>
                                <li><a href="cart.php" class="nav">Kantong Belanja</a></li>
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
    <!-- catalog -->
    <div class="catalog">
        <div class="container">
            <div class="product ">
            <?php
                                $db = "SELECT * FROM produk";
                                $query = mysqli_query($koneksi, $db);
                                while ($data=mysqli_fetch_object($query)) {?>
                <div class="item">
                <a href="previewproduk.php?id=<?php echo $data->id;?>&action=preview">
                <?php echo'<img src="img/'.$data->images.'" alt="">'?>
                    <p><?php echo $data->namaproduk; ?></p>
                    
                    <p class="harga"><?php echo $data->harga; ?></p>
                    </a>
                </div>  
                <?php
                            }
                            ?>
            </div>              
        </div>
    </div>
   
    <footer>
        <div class="footer">Copyright &copy; 2022 - Theme by Kadai Ateh </div>
    </footer>
</body>
</html>