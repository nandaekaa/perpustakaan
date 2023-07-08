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
$pdf->Cell(25, 0.7, "Laporan Data Mahasiswa", 0, 10, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(4.3, 0.7, "Di cetak pada : " . date("d/m/y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NPM', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Mahasiswa', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Semester', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jurusan', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$no = 1;
$query = mysqli_query($koneksi, "select * from mahasiswa");
while ($lihat = mysqli_fetch_array($query)) {
	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['npm'], 1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['nama'], 1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['jenis'], 1, 0, 'L');
	$pdf->Cell(2, 0.8, $lihat['semester'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jurusan'], 1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_mhs.pdf", "I");

?>