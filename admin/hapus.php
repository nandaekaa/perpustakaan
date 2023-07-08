<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from buku where id='$id'");
header("location:buku.php");

?>