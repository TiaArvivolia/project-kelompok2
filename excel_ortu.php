<?php
require 'vendor/autoload.php';
include_once('model/koneksi.php');
include_once('model/jawaban_ortu_model.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$jawaban_ortu = new JawabanOrtu();
$result = $jawaban_ortu->getAllJawaban();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set Header
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Pendidikan Terakhir');
$sheet->setCellValue('C1', 'Pekerjaan');
$sheet->setCellValue('D1', 'Ortu Mahasiswa');
$sheet->setCellValue('E1', 'Nim Mahasiswa');
$sheet->setCellValue('F1', 'Prodi Mahasiswa');
$sheet->setCellValue('G1', 'Kategori');
$sheet->setCellValue('H1', 'Pertanyaan');
$sheet->setCellValue('I1', 'Jawaban');
$sheet->setCellValue('J1', 'Tanggal');

if ($result->num_rows > 0) {
    $i = 2; // Starting from the second row
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $i, $row['responden_nama']);
        $sheet->setCellValue('B' . $i, $row['responden_pendidikan']);
        $sheet->setCellValue('C' . $i, $row['responden_pekerjaan']);
        $sheet->setCellValue('D' . $i, $row['mahasiswa_nama']);
        $sheet->setCellValue('E' . $i, $row['mahasiswa_nim']);
        $sheet->setCellValue('F' . $i, $row['mahasiswa_prodi']);
        $sheet->setCellValue('G' . $i, $row['kategori_nama']);
        $sheet->setCellValue('H' . $i, $row['soal_nama']);
        $sheet->setCellValue('I' . $i, $row['jawaban']);
        $sheet->setCellValue('J' . $i, $row['responden_tanggal']);
        $i++;
    }
}


$writer = new Xlsx($spreadsheet);
$filename = 'jawaban_ortu.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $filename .'"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

$writer->save('php://output');
exit;
?>