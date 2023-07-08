<?php

include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 11);
$pdf->Image('../logo/botak.jpg', 1, 1, 2, 2);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'KUSUMAH STORE', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Telepon : 0822-6125-4116', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Alamat   : Jl. Ujung Harapan', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Email     : iwaakusumah@gmail.com', 0, 'L');
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(25, 0.7, 'Laporan Data Peminjaman Buku', 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(4.3, 0.7, "Di cetak pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->Cell(6.7, 0.7, "Laporan Peminjaman pada : " . $_GET['tanggal'], 0, 0, 'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NPM', 1, 0, 'C');
$pdf->Cell(5.5, 0.8, 'Nama Mahasiswa', 1, 0, 'C');
$pdf->Cell(7.5, 0.8, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jumlah', 1, 1, 'C');

$no = 1;
$tanggal = $_GET['tanggal'];
$query = mysqli_query($koneksi, "select * from buku_pinjam where tanggal=" . $tanggal);
while ($lihat = mysqli_fetch_array($query)) {
	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['npm'], 1, 0, 'C');
	$pdf->Cell(5.5, 0.8, $lihat['nama'], 1, 0, 'L');
	$pdf->Cell(7.5, 0.8, $lihat['judul'], 1, 0, 'L');
	$pdf->Cell(1.5, 0.8, $lihat['jumlah'], 1, 1, 'C');

	$no++;
}

$qu=mysqli_query($koneksi, "select sum(jumlah) as jumlah from buku_pinjam where tanggal=".$tanggal);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($tl=mysqli_fetch_array($qu)){
	$pdf->Cell(20, 0.8, 'Total Buku yang Dipinjam', 1, 0, 'C');
	$pdf->Cell(1.5, 0.8, ($tl['jumlah']), 1, 1,'C');

$pdf->Output("laporan_buku.pdf", "I");
}

?>