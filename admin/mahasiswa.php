<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Data Mahasiswa</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span
		class="glyphicon glyphicon-plus"></span>Tambah Mahasiswa</button>
<br />
<br />

<?php
$periksa = mysqli_query($koneksi, "select * from mahasiswa where nama ");
while ($q = mysqli_fetch_array($periksa)) {
	if ($q['nama']) {
		?>
		<script>
			$(document).ready(function () {
				$('#pesan_sedia').css("color", "red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Jumlah  <a style='color:red'>" . $q['nama'] . "</a> yang tersisa kurang dari 1 . silahkan tambah lagi !!</div>";
	}
}
?>
<?php
$per_hal = 10;
$jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from mahasiswa");
$jum = mysqli_num_rows($jumlah_record);
$halaman = ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>
			<td>
				<?php echo $jum; ?>
			</td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>
			<td>
				<?php echo $halaman; ?>
			</td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_mhs.php" target="_blank" class="btn btn-default pull-right"><span
			class='glyphicon glyphicon-print'></span> Cetak</a>
</div>
<form action="cari_mhs_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari mahasiswa di sini .." aria-describedby="basic-addon1"
			name="cari">
	</div>
</form>
<br />
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">NPM</th>
		<th class="col-md-3">Nama Mahasiswa</th>
		<th class="col-md-2">Jenis Kelamin</th>
		<th class="col-md-1">Jurusan</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php
	if (isset($_GET['cari'])) {
		$cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
		$mhs = mysqli_query($koneksi, "select * from mahasiswa where nama like '$cari' or npm like '$cari'");
	} else {
		$mhs = mysqli_query($koneksi, "select * from mahasiswa limit $start, $per_hal");
	}
	$no = 1;
	while ($b = mysqli_fetch_array($mhs)) {

		?>
		<tr>
			<td>
				<?php echo $no++ ?>
			</td>
			<td>
				<?php echo ($b['npm']) ?>
			</td>
			<td>
				<?php echo $b['nama'] ?>
			</td>
			<td>
				<?php echo ($b['jenis']) ?>
			</td>
			<td>
				<?php echo ($b['jurusan']) ?>
			</td>
			<td>
				<a href="det_mhs.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_mhs.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_mhs.php?id=<?php echo $b['id']; ?>' }"
					class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php
	}
	?>
</table>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Mahasiswa Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_mhs_act.php" method="post">
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Mahasiswa">
					</div>
					<div class="form-group">
						<label>NPM</label>
						<input name="npm" type="text" class="form-control" placeholder="NPM">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Kelamin">
					</div>
					<div class="form-group">
						<label>Semester</label>
						<input name="semester" type="text" class="form-control" placeholder="Semester ">
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<input name="jurusan" type="text" class="form-control" placeholder="Jurusan">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
			</form>
		</div>
	</div>
</div>



<?php
include 'footer.php';

?>