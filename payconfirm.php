<?php
require 'conn.php';
$conn = mysqli_connect('localhost','root','','kadaiateh');
$id = $_GET["id"];
mysqli_query($conn, "UPDATE datacostumer SET status = 'Selesai' WHERE id = '$id'");

if (mysqli_affected_rows($conn)>0){
    echo"<script>
    alert('Data berhasil diupdate!');
    document.location.href='DataCostumer.php';
    </script>";
}
?>