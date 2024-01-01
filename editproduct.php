<?php
session_start();
$username=$_SESSION["username"];
$conn = mysqli_connect('localhost','root','','kadaiateh');
$id=$_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
if (isset($_POST["edit"])){
    $kodeproduk=$_POST["kodeproduk"];
    $namaproduk=$_POST["namaproduk"];
    $deskripsi=$_POST["deskripsi"];
    $jenis=$_POST["jenis"];
    $harga=$_POST["harga"];
    $images = $_FILES["images"]["name"];
    $tempname = $_FILES["images"]["tmp_name"];
    $folder = "./img/" . $images;
    
    $q="UPDATE produk SET 
    kodeproduk = '$kodeproduk',
    namaproduk = '$namaproduk',
    deskripsi = '$deskripsi',
    jenis = '$jenis',
    harga = '$harga'
    images = '$images'
    WHERE id = '$id'";
    mysqli_query($conn,$q);
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>
        
        alert('Data Berhasil Disimpan');
        document.location.herf='DataProduk.php';
        </script>";
    } else {
        echo "<p>Failed</p>";
    }

    if(mysqli_affected_rows($conn)>0){
        echo "<script>
        
            alert('Data Berhasil Disimpan');
            document.location.herf='DataProduk.php';
            </script>" ;
    }
}
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
    <div class="fcountainer">
        <div class="data">
            <h1>Input Data Produk</h1>
            <a href = "DataProduk.php">Kembali</a>  
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="box-input">
                    <div class="box">
                            <table border="0" class="data-product1">
                            
                                <tr class="box-text">
                                    <td>Kode Produk</td>
                                    <td>:</td>
                                    <td class="tes"><input type="text" name="kodeproduk" class="nama" value="<?php echo $row["kodeproduk"]; ?>"></td>
                                </tr>
                                <br>
                                <tr class="box-text">
                                    <td>Nama Produk</td>
                                    <td>:</td>
                                    <td><input type="text" name="namaproduk" class="nama" value="<?php echo $row["namaproduk"]; ?>"></td>
                                </tr>
                                <tr class="box-text">
                                    <td>Deskripsi Produk</td>
                                    <td>:</td>
                                    <td><input type="text" name="deskripsi" class="nama" value="<?php echo $row["deskripsi"]; ?>"></td>
                                </tr>
                                <br>
                                <br>
                                <tr class="box-text">
                                    <td>Jenis Produk</td>
                                    <td>:</td>
                                    <td><input type="text" name="jenis" class="nama" value="<?php echo $row["jenis"]; ?>"></td>
                                </tr>
                                <br>
                                <tr class="box-text">
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><input type="text" name="harga" class="nama" value="<?php echo $row["harga"]; ?>"></td>
                                </tr>
                                <br>
                                <tr class="box-text">
                                    <td>Foto Produk</td>
                                    <td>:</td>
                                    <td><label for="myfile" ><p class="pe">Pilih Foto</p></label> </td>
                                    <input type="file" id="myfile" name="images"/>
                                </tr>
                                <div class="tombol1">
                        <button type="submit" name="edit" class="btn-simpan1">Simpan</a>
                    </div>
                            </table>
    
                   
                   
                </div>
                </div>
                </form>
                <?php endwhile; ?>
        </div>
        </div>
    <footer>
        <div class="footer">Copyright &copy; 2022 - Theme by Kadai Ateh </div>
    </footer>
</body>
</html> 