<?php
include 'config.php';
$id = $_POST['id'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$semester = $_POST['semester'];
$jurusan = $_POST['jurusan'];

mysqli_query($koneksi, "update mahasiswa set npm='$npm', nama='$nama', jenis='$jenis', semester='$semester', jurusan='$jurusan' where id='$id'");
header("location:mahasiswa.php");

?>