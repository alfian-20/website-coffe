<?php
    $conn = mysqli_connect('localhost','root','','kadaiateh');
    if (isset($_POST["Simpan"])){
        $nama=$_POST["nama"];
        $hp=$_POST["hp"];
        $email=$_POST["email"];
        $alamat=$_POST["alamat"];
        $username=$_POST["username"];
        $password=$_POST["password"];
 
        $q="INSERT INTO datauser VALUES('','$nama','$hp','$email', '$username', '$password', '$alamat') ";
        mysqli_query($conn, $q);
        $q2 = "INSERT INTO useraccount VALUES('','$username','$password')";
        mysqli_query($conn, $q2);
        if(mysqli_affected_rows($conn)>0){
            echo"<script>
            alert('Terima kasih sudah bergabung dengan kami!');</script>";
            header("Location:index.php");
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
                             <!-- if session username available then fetch username -->
            <?php
            if (isset($_SESSION["username"])) {
                ?>
                <li><a href="index.php" class="nav">Home</a></li>
                                
                                <li><a href="DataCostumer.php" class="nav">Data Costumer</a></li>
                                <li><a href="DataProduk.php" class="nav">Data Produk</a></li>
                                <li><a href="InputProduk.php" class="nav">Input Produk</a></li>
                                
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
    <form action="" method="post">
    <div class="fcountainer">
    <div class="data">
        <h1 class="judul">Input Data Costumer</h1>
            <div class="box-input">
                <div class="box">
                        <table border="0" class="data-product">
                            <tr class="box-text">
                                <td>Nama</td>
                                <td>:</td>
                                <td class="tes"><input type="text" name="nama" class="nama"></td>
                            </tr>
                            <br>
                            <tr class="box-text">
                                <td>No.Hp</td>
                                <td>:</td>
                                <td><input type="text" name="hp" class="nama"></td>
                            </tr>
                            <br>
                            <tr class="box-text">
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email" class="nama"></td>
                            </tr>
                            <br>
                            <tr class="box-text">
                                <td class="address">Alamat</td>
                                <td class="address">:</td>
                                <td><textarea name="alamat" id="" cols="30" rows="10" class="alamat"></textarea></td>
                            </tr>
                            <br>
                            <tr class="box-text">
                                <td>Username</td>
                                <td>:</td>
                                <td><input type="text" name="username" class="nama"></td>
                            </tr>
                            <br>
                            <tr class="box-text">
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="password" name="password" class="nama"></td>
                            </tr>
                        </table>
                <div class="tombol">
                <button type="submit" name="Simpan" class="btn-simpan">Simpan</button> 
                </div>
            </div>
            </div>
    </div>
    </div>
    <form action="" method="post">
    <footer>
        <div class="footer">Copyright &copy; 2022 - Theme by Kadai Ateh </div>
    </footer>
</body>
</html>