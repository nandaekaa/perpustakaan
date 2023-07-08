<?php
include 'config.php';
$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
$nama = $_GET['nama'];

$a = mysqli_query($koneksi, "select jumlah from buku where nama='$nama'");
$b = mysqli_fetch_array($a);
$kembalikan = $b['jumlah'] + $jumlah;
$c = mysqli_query($koneksi, "update buku set jumlah='$kembalikan' where nama='$nama'");
mysqli_query($koneksi, "delete from buku_pinjam where id='$id'");
header("location:buku_pinjaman.php");

?>