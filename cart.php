<?php

session_start();

if (!isset($_SESSION["username"])) {
	header("Location:index.php");
	exit;
}

$username=$_SESSION["username"];
$nama = $_SESSION["nama"];
$alamat = $_SESSION["alamat"];
$email = $_SESSION["email"];
$hp = $_SESSION["hp"];
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
<body> <?php
    // Mulai sesi
    require 'conn.php';
    class Item{
        var $id;//var int
        //var string
        var $namaproduk;
        //var float
        var $harga;
        //var int
        var $quantity;
        var $images;
       }
    
    if(isset($_GET['id']) && !isset($_POST['update']))  { 
        $sql = "SELECT * FROM produk WHERE id=".$_GET['id'];
        $result = mysqli_query($koneksi, $sql);
        $products = mysqli_fetch_object($result); 
        $item = new Item();
        $item->id = $products->id;
        $item->kodeproduk = $products->kodeproduk;
        $item->namaproduk = $products->namaproduk;
        $item->jenis = $products->jenis;
        $item->harga = $products->harga;
        $item->images = $products->images;
        $iteminstock = $products->quantity;
        $item->quantity = 1;
        //Periksa produk dalam keranjang
        $index = -1;
        $cart = array(serialize($_SESSION['cart']));
        for($i=0; $i<count($cart);$i++)
            if ($cart[$i]->id == $_GET['id']){
                $index = $i;
                break;
            }
            if($index == -1) 
                $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
            else {
                
                if (($cart[$index]->quantity) < $iteminstock)
                     $cart[$index]->quantity ++;
                     $_SESSION['cart'] = $cart;
            }
    }
    //Menghapus produk dalam keranjang
    if(isset($_GET['index']) && !isset($_POST['update'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    // Perbarui jumlah dalam keranjang
    if(isset($_POST['update'])) {
      $arrQuantity = $_POST['quantity'];
      $cart = unserialize(serialize($_SESSION['cart']));
      for($i=0; $i<count($cart);$i++) {
         $cart[$i]->quantity = $arrQuantity[$i];
      }
      $_SESSION['cart'] = $cart;
    }
    ?>
    <div class="ncountainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="name">Kadai Ateh</div>
            </div>
            <ul class="navigation">
                
                             
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
            <?php
            if ($_SESSION["username"] == 'admin') {
               ?>
            <li><a href="index.php" class="nav">Home</a></li>
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
    <div class="cart">
    <div class="icountainer">
    <div class="btn-back">
                <a href="catalog.php" class="back"><p>Kembali</p></a>
            </div>
        <div class="place">
            <h1 class="judul">Data Produk</h1>
            <div class="table">
                <table border="1" class="tabel-input">
                    <thead>   
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Foto Produk</th>

                            <th>Status</th>
                        </tr>
                    </thead> 

                    <tbody>
                    <?php 
                $cart = unserialize(serialize($_SESSION['cart']));
                $s = 0;
                $index = 0;
                for($i=0; $i < count($cart); $i++){
                    $s += $cart[$i]->harga;
                ?>  
                        <tr>
                          <td class="no">1</td>
                          <td><?php echo $cart[$i]->jenis; ?> </td>
                          <td><?php echo $cart[$i]->namaproduk; ?> </td>
                          <td><?php echo $cart[$i]->harga; ?> </td>
                          <td class="img"><?php echo'<img src="img/'.$cart[$i]->images.'" alt="">'?></td>
                          
                          <td>Waiting</td>
                          
                          
                        </tr>
                        <?php 
     	            $index++;
                } ?>  
 
               
                

                </table>
                <p> Total Pembayaran: Rp.<?php echo $s; ?>  </p>
                <p> Nama Penerima : <?php echo $nama; ?>  </p>
                <p> Alamat Penerima : <?php echo $alamat; ?>  </p>
                <p> Email Penerima : <?php echo $email; ?>  </p>
                <p> No HP Penerima : <?php echo $hp; ?>  </p>
                <div class="btn-pembayaran"><a class="sad" href="success.php"> Lakukan Pembayaran </a></div>
                <?php 
                        if(isset($_GET["id"]) || isset($_GET["index"])){
                        header('Location: cart.php');
                        } 
                    ?>
                    </form>
            </div>
        </div>
    </div>
    </div>
    <footer>
        Copyright &copy; 2022 - Theme by Kadai Ateh
    </footer>
</body>
</html> 