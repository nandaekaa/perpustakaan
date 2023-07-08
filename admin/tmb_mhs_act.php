<?php
include 'config.php';
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$semester = $_POST['semester'];
$jurusan = $_POST['jurusan'];

mysqli_query($koneksi, "insert into mahasiswa values('','$npm','$nama','$jenis','$semester','$jurusan')");
header("location:mahasiswa.php");

?>