<?php

include 'config.php';
$tgl = $_POST['tanggal'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "insert into buku_pinjam values('','$tgl','$npm','$nama','$judul','$jumlah')");
header("location:buku_pinjaman.php");

?>