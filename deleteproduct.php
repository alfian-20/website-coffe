<?php
require 'conn.php';
$conn = mysqli_connect('localhost','root','','kadaiateh');
$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

if (mysqli_affected_rows($conn)>0){
    echo"<script>
    alert('Data berhasil dihapus');
    document.location.href='DataProduk.php';
    </script>";
}
?>