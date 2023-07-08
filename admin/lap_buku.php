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
$pdf->MultiCell(19.5, 0.5, 'PERPUSTAKAAN ONLINE', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Telepon : 0895-2832-3596', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Alamat   : Jl. Villa Gading Harapan', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Email     : arinnovitadewi@gmail.com', 0, 'L');
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(25, 0.7, "Laporan Data Buku", 0, 10, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(4.3, 0.7, "Di cetak pada : " . date("d/m/y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Pengarang', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Penerbit', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'ISBN', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jumlah', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$no = 1;
$query = mysqli_query($koneksi, "select * from buku");
while ($lihat = mysqli_fetch_array($query)) {
	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['judul'], 1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['jenis'], 1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['pengarang'], 1, 0, 'L');
	$pdf->Cell(6, 0.8, $lihat['penerbit'], 1, 0, 'L');
	$pdf->Cell(4, 0.8, $lihat['isbn'], 1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['jumlah'], 1, 1, 'C');

	$no++;
}

$qu=mysqli_query($koneksi, "select sum(jumlah) as jumlah from buku");
// select sum(total_harga) as total from buku
while($tl=mysqli_fetch_array($qu)){
	$pdf->Cell(26, 0.8, 'Total Buku', 1, 0, 'C');
	$pdf->Cell(1.5, 0.8, ($tl['jumlah']), 1, 1,'C');

$pdf->Output("laporan_buku.pdf", "I");
}
?>