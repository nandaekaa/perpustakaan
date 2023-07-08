<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Detail Mahasiswa</h3>
<a class="btn" href="mahasiswa.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
$id_mhs = mysqli_real_escape_string($koneksi, $_GET['id']);


$det = mysqli_query($koneksi, "select * from mahasiswa where id='$id_mhs'");
while ($d = mysqli_fetch_array($det)) {
	?>
	<table class="table">
		<tr>
			<td>NPM</td>
			<td>
				<?php echo $d['npm'] ?>
			</td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>
				<?php echo $d['nama'] ?>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<?php echo $d['jenis'] ?>
			</td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>
				<?php echo $d['semester'] ?>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>
				<?php echo ($d['jurusan']); ?>
			</td>
		</tr>
		</tr>
	</table>
<?php
}
?>
<?php include 'footer.php'; ?>