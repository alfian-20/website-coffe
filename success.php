<?php
include "conn.php";
require 'item.php';
session_start();
$username=$_SESSION["username"];
$nama = $_SESSION["nama"];
$alamat = $_SESSION["alamat"];
$email = $_SESSION["email"];
$hp = $_SESSION["hp"];
if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;
}
$ordersid = mysqli_insert_id($koneksi); 
$cart = unserialize(serialize($_SESSION['cart'])); 

for($i=0; $i<count($cart);$i++) {

    $s += $cart[$i]->harga;

$sql3 = 'INSERT INTO datacostumer (id, nama, hp, email, alamat, namabarang, harga, buktipembayaran, status) VALUES ("","'.$nama.'", "'.$hp.'", "'.$alamat.'", "'.$username.'", "'.$cart[$i]->namaproduk.'", "'.$cart[$i]->harga.'", "Melalui Whatsapp", "Menunggu")';

mysqli_query($koneksi, $sql3);

}

//Menghapus semua produk dalam keranjang
unset($_SESSION['cart']);

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
        <a href="logo"></a>
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
    <!-- content -->
    <div class="payment-done">
        <div class="container">
            <div class="done">
                <img src="img/Ellipse 2.png" alt="">
                <p class="pd">Payment Done</p>
                <p class="tq">Thank you for completing your payment</p>
                <div class="back-to-home">
<!--                 
                <div class="tombol2 cek">
                    <a href="menu.html" class="btn-simpan2">GO BACK</a>
                </div> -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="footer">Copyright &copy; 2022 - Theme by Kadai Ateh </div>
    </footer>
</body>
</html>