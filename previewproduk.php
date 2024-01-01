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
<body>
<?php
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
        $item->deskripsi = $products->deskripsi;
        $item->images = $products->images;
        $item->quantity = 1;
        $cart = array(serialize($_REQUEST['cart']));
        $index = -1;
        for($i=0; $i<count($cart);$i++)
            if ($cart[$i]->id == $_GET['id']){
                $index = $i;
                break;
            }
            if($index == -1) 
                $_REQUEST['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
            else {
                
                if (($cart[$index]->quantity) < $iteminstock)
                     $cart[$index]->quantity ++;
                     $_REQUEST['cart'] = $cart;
            }
    }
    ?>
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
                <li><a href="index.php" class="nav">Home</a></li>
                                <li><a href="cart.php" class="nav">Kantong Belanja</a></li>
                                <li><a href="logout.php" class="nav">Hallo
                                <?php echo $username; ?></a></li>
                <?php
            }
                
                
             else {
             ?>
             <li><a href="index.php" class="nav">Home</a></li>
                               
                                <!-- login button -->
                                <li><a href="login.php" class="nav">Login</a></li>
                                <?php

            }
            ?>   
              
            </ul>
        </nav>
    </div>
    <div class="preview">
        <div class="container">
            <div class="btn-back">
                <a href="catalog.php" class="back"><p>Kembali</p></a>
            </div>
            <br>
            <div class="ripiw">
            <?php 
                $cart = unserialize(serialize($_REQUEST['cart']));
                $s = 0;
                $index = 0;
                for($i=0; $i < count($cart); $i++){
                    $s += $cart[$i]->harga;
                ?>  
                <?php echo'<img src="img/'.$cart[$i]->images.'" alt="">'?>
                <div class="deskripsi">
                    <p class="periperal">Jenis : <?php echo $cart[$i]->jenis; ?> </p>
                    <p class="jproduk"> <?php echo $cart[$i]->namaproduk; ?></p>
                    <div class="garis"></div>
                    <p class="hargap">Harga : <?php echo $cart[$i]->harga; ?></p>
                    <div class="deskripsi-product">
                    <p class="deskripsi-product"> Deskripsi Detail : 
                    <?php echo $cart[$i]->deskripsi; ?>
                    </p>
                    </div>
                    <div class="btn-beli "><a class="asd" href="cart.php?id=<?php echo $cart[$i]->id;?>&action=add">Order</a></div>
                </div>
                <?php 
     	            $index++;
                } ?>  
            </div>
        </div>
    </div>
    <br>
    <br>  
    <br>
    <footer>
        <div class="footer">Copyright &copy; 2022 - Theme by Kadai Ateh </div>
    </footer>
</body>
</html>