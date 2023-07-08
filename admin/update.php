<?php
include 'config.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$jenis = $_POST['jenis'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "update buku set judul='$judul', jenis='$jenis', pengarang='$pengarang', penerbit='$penerbit', jumlah='$jumlah' where id='$id'");
header("location:buku.php");

?>