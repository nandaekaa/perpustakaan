<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Mahasiswa</h3>
<a class="btn" href="mahasiswa.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
<?php
$id_mhs = mysqli_real_escape_string($koneksi, $_GET['id']);
$det = mysqli_query($koneksi, "select * from mahasiswa where id='$id_mhs'");
while ($d = mysqli_fetch_array($det)) {
	?>
	<form action="update_mhs.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>NPM</td>
				<td><input type="text" class="form-control" name="npm" value="<?php echo $d['npm'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="text" class="form-control" name="jenis" value="<?php echo $d['jenis'] ?>"></td>
			</tr>
			<tr>
				<td>Semester</td>
				<td><input type="text" class="form-control" name="semester" value="<?php echo $d['semester'] ?>"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" class="form-control" name="jurusan" value="<?php echo $d['jurusan'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
<?php include 'footer.php'; ?>