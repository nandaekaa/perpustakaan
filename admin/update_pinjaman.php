<?php
include 'config.php';
$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "update buku_pinjam set tanggal='$tgl', npm='$npm', nama='$nama', judul='$judul', jumlah='$jumlah' where id='$id'");
header("location:buku_pinjaman.php");

?>