<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Barang</h3>
<a class="btn" href="buku_pinjaman.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
$id_brg = mysqli_real_escape_string($koneksi, $_GET['id']);

$det = mysqli_query($koneksi, "select * from buku_pinjam where id='$id_brg'");
while ($d = mysqli_fetch_array($det)) {
	?>
	<form action="update_pinjaman.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal</td>
				<td><input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off"
						value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>NPM</td>
				<td>
					<select class="form-control" name="npm">
						<?php
						$brg = mysqli_query($koneksi, "select * from mahasiswa");
						while ($b = mysqli_fetch_array($brg)) {
							?>
							<option <?php if ($d['npm'] == $b['npm']) {
								echo "selected";
							} ?> value="<?php echo $b['npm']; ?>">
								<?php echo $b['npm'] ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php
						$brg = mysqli_query($koneksi, "select * from mahasiswa");
						while ($b = mysqli_fetch_array($brg)) {
							?>
							<option <?php if ($d['nama'] == $b['nama']) {
								echo "selected";
							} ?> value="<?php echo $b['nama']; ?>">
								<?php echo $b['nama'] ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>
					<select class="form-control" name="judul">
						<?php
						$brg = mysqli_query($koneksi, "select * from buku");
						while ($b = mysqli_fetch_array($brg)) {
							?>
							<option <?php if ($d['judul'] == $b['judul']) {
								echo "selected";
							} ?> value="<?php echo $b['judul']; ?>">
								<?php echo $b['judul'] ?></option>
						<?php
						}
						?>
					</select>
				</td>
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
<script type="text/javascript">
	$(document).ready(function () {

		$('#tanggal').datepicker({ dateFormat: 'yy/mm/dd' });

	});
</script>
<?php
include 'footer.php';

?>