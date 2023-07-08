<?php
include 'config.php';
$judul = $_POST['judul'];
$jenis = $_POST['jenis'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$isbn = $_POST['isbn'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "insert into buku values('','$judul','$jenis','$pengarang','$penerbit','$isbn','$jumlah')");
header("location:buku.php");

?>