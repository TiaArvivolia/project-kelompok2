<?php
require 'vendor/autoload.php';
include_once('model/koneksi.php');
include_once('model/jawaban_mahasiswa_model.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$jawaban_mahasiswa = new JawabanMahasiswa();
$result = $jawaban_mahasiswa->getAllJawaban();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set Header
$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'NIM');
$sheet->setCellValue('C1', 'Prodi');
$sheet->setCellValue('D1', 'Kategori');
$sheet->setCellValue('E1', 'Pertanyaan');
$sheet->setCellValue('F1', 'Jawaban');
$sheet->setCellValue('G1', 'Tanggal');

if ($result->num_rows > 0) {
    $i = 2; // Starting from the second row
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $i, $row['responden_nama']);
        $sheet->setCellValue('B' . $i, $row['responden_nim']);
        $sheet->setCellValue('C' . $i, $row['responden_prodi']);
        $sheet->setCellValue('D' . $i, $row['kategori_nama']);
        $sheet->setCellValue('E' . $i, $row['soal_nama']);
        $sheet->setCellValue('F' . $i, $row['jawaban']);
        $sheet->setCellValue('G' . $i, $row['responden_tanggal']);
        $i++;
    }
}


$writer = new Xlsx($spreadsheet);
$filename = 'jawaban_mahasiswa.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $filename .'"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

$writer->save('php://output');
exit;
?>