<?php
session_start();



$username=$_SESSION["username"];
// $name=$_SESSION["name"];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="styledepan.css">
</head>
<body>
    <div class="ncountainer">
        <a href="logo"></a>
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
    <div class="judul">
    <h1>Kadai Ateh Coffe shop</h1>
    <p>Disini kami menyediakan berbagai macam minuman teh dan coffe asli yang berkualitas.</p>
    </div>

    <?php
            

            ?>   

</body>
</html>