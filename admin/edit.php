<?php
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
<?php
$id_buku = mysqli_real_escape_string($koneksi, $_GET['id']);
$det = mysqli_query($koneksi, "select * from buku where id='$id_buku'");
while ($d = mysqli_fetch_array($det)) {
	?>
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" class="form-control" name="judul" value="<?php echo $d['judul'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td><input type="text" class="form-control" name="jenis" value="<?php echo $d['jenis'] ?>"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" class="form-control" name="pengarang" value="<?php echo $d['pengarang'] ?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" class="form-control" name="penerbit" value="<?php echo $d['penerbit'] ?>"></td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td><input type="text" class="form-control" name="isbn" value="<?php echo $d['isbn'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
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