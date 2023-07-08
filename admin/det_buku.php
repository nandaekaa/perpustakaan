<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Detail Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
$id_buku = mysqli_real_escape_string($koneksi, $_GET['id']);


$det = mysqli_query($koneksi, "select * from buku where id='$id_buku'");
while ($d = mysqli_fetch_array($det)) {
	?>
	<table class="table">
		<tr>
			<td>Judul</td>
			<td>
				<?php echo $d['judul'] ?>
			</td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>
				<?php echo $d['jenis'] ?>
			</td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td>
				<?php echo $d['pengarang'] ?>
			</td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td>
				<?php echo ($d['penerbit']); ?>
			</td>
		</tr>
		<tr>
			<td>ISBN</td>
			<td>
				<?php echo ($d['isbn']); ?>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<?php echo $d['jumlah'] ?>
			</td>
		</tr>
	</table>
<?php
}
?>
<?php include 'footer.php'; ?>