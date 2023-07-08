<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Data Buku Yang Dipinjam</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span
		class="glyphicon glyphicon-pencil"></span> Tambah</button>
<br />
<br />

<?php
$per_hal = 10;
$jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) from buku_pinjam");
$jum = mysqli_num_rows($jumlah_record);
$halaman = ceil($jum / $per_hal);
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
</div>
	<form action="" method="get">
		<div class="input-group col-md-5 col-md-offset-7">
			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
			<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
				<option>Pilih tanggal ..</option>
				<?php
				$pil = mysqli_query($koneksi, "select distinct tanggal from buku_pinjam order by tanggal desc");
				while ($p = mysqli_fetch_array($pil)) {
					?>
					<option>
						<?php echo $p['tanggal'] ?>
					</option>
				<?php
				}
				?>
			</select>
		</div>

	</form>
	<br />
	<?php
	if (isset($_GET['tanggal'])) {
		$tanggal = mysqli_real_escape_string($koneksi, $_GET['tanggal']);
		$tg = "lap_buku_pinjam.php?tanggal='$tanggal'";
		?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span
				class='glyphicon glyphicon-print'></span> Cetak</a>
	<?php
	} else {
		$tg = "lap_buku_pinjam.php";
	}
	?>

	<br />
	<?php
	if (isset($_GET['tanggal'])) {
		echo "<h4> Data Peminjaman Tanggal  <a style='color:blue'> " . $_GET['tanggal'] . "</a></h4>";
	}
	?>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>NPM</th>
			<th>Nama Mahasiswa</th>
			<th>Judul Buku</th>
			<th>Jumlah</th>
			<th>Opsi</th>
		</tr>
		<?php
		if (isset($_GET['tanggal'])) {
			$tanggal = mysqli_real_escape_string($koneksi, $_GET['tanggal']);
			$brg = mysqli_query($koneksi, "select * from buku_pinjam where tanggal like '$tanggal' order by tanggal desc");
		} else {
			$brg = mysqli_query($koneksi, "select * from buku_pinjam order by tanggal desc");
		}
		$no = 1;
		while ($b = mysqli_fetch_array($brg)) {

			?>
			<tr>
				<td>
					<?php echo $no++ ?>
				</td>
				<td>
					<?php echo $b['tanggal'] ?>
				</td>
				<td>
					<?php echo $b['npm'] ?>
				</td>
				<td>
					<?php echo $b['nama'] ?>
				</td>
				<td>
					<?php echo $b['judul'] ?>
				</td>
				<td>
					<?php echo $b['jumlah'] ?>
				</td>
				<td>
					<a href="edit_pinjam.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
					<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pinjam.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama']; ?>' }"
						class="btn btn-danger">Hapus</a>
				</td>
			</tr>

		<?php
		}
		?>
		<tr>
			<td colspan="5">Total Peminjaman</td>
			<td>
				<?php

				$x = mysqli_query($koneksi, "select sum(jumlah) as total from buku_pinjam");
				$xx = mysqli_fetch_array($x);
				echo "<b>" . number_format($xx['total']) . "</b>";
				?>
			</td>
		</tr>
	</table>

	<!-- modal input -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Peminjaman
				</div>
				<div class="modal-body">
					<form action="buku_pinjaman_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off">
						</div>
						<div class="form-group">
							<label>NPM</label>
							<select class="form-control" name="npm">
								<?php
								$brg = mysqli_query($koneksi, "select * from mahasiswa");
								while ($b = mysqli_fetch_array($brg)) {
									?>
									<option value="<?php echo $b['npm']; ?>"><?php echo $b['npm'] ?></option>
								<?php
								}
								?>
							</select>

						</div>
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<select class="form-control" name="nama">
								<?php
								$brg = mysqli_query($koneksi, "select * from mahasiswa");
								while ($b = mysqli_fetch_array($brg)) {
									?>
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
								<?php
								}
								?>
							</select>

						</div>

						<div class="form-group">
							<label>Judul Buku</label>
							<select class="form-control" name="judul">
								<?php
								$brg = mysqli_query($koneksi, "select * from buku");
								while ($b = mysqli_fetch_array($brg)) {
									?>
									<option value="<?php echo $b['judul']; ?>"><?php echo $b['judul'] ?></option>
								<?php
								}
								?>
							</select>

						</div>
						<div class="form-group">
							<label>Jumlah Buku</label>
							<select class="form-control" name="jumlah">
								<?php
								$brg = mysqli_query($koneksi, "select * from buku");
								while ($b = mysqli_fetch_array($brg)) {
									?>
									<option value="<?php echo $b['jumlah']; ?>"><?php echo $b['jumlah'] ?></option>
								<?php
								}
								?>
							</select>

						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<input type="submit" class="btn btn-primary" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#tanggal").datepicker({ dateFormat: 'yy/mm/dd' });
			});
		</script>
		<?php include 'footer.php'; ?>