<?php
// Include the PhpSpreadsheet classes
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once "config.php";
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Create a new worksheet
$sheet = $spreadsheet->getActiveSheet();

// Set headers
$sheet->setCellValue('A1', 'Packet No');
$sheet->setCellValue('B1', 'Commencing No');
$sheet->setCellValue('C1', 'Closing No');
$sheet->setCellValue('D1', 'Emp Name');
$sheet->setCellValue('E1', 'Window No');
$sheet->setCellValue('F1', 'Date');

// Fetch data from the boxdetails table
require_once "config.php";
$selectBoxDetailSql = "SELECT packet_no, commencing_no, closing_no FROM rtms.boxdetail";
$resultBoxDetail = $conn->query($selectBoxDetailSql);

// Fetch data from the emp_details table
$selectEmpDetailSql = "SELECT empname, window_no, date FROM rtms.emp_detail";
$resultEmpDetail = $conn->query($selectEmpDetailSql);

$rowIndex = 2; // Start from the second row (after headers)

while (true) {
    $rowBoxDetail = $resultBoxDetail->fetch_assoc();
    $rowEmpDetail = $resultEmpDetail->fetch_assoc();

    if (!$rowBoxDetail && !$rowEmpDetail) {
        // Both result sets are empty, exit the loop
        break;
    }

    // Populate data from boxdetails
    if ($rowBoxDetail) {
        $sheet->setCellValue('A' . $rowIndex, $rowBoxDetail['packet_no']);
        $sheet->setCellValue('B' . $rowIndex, $rowBoxDetail['commencing_no']);
        $sheet->setCellValue('C' . $rowIndex, $rowBoxDetail['closing_no']);
    } else {
        // Leave empty for boxdetails
        $sheet->setCellValue('A' . $rowIndex, '');
        $sheet->setCellValue('B' . $rowIndex, '');
        $sheet->setCellValue('C' . $rowIndex, '');
    }

    // Populate data from emp_details
    if ($rowEmpDetail) {
        $sheet->setCellValue('D' . $rowIndex, $rowEmpDetail['empname']);
        $sheet->setCellValue('E' . $rowIndex, $rowEmpDetail['window_no']);
        $sheet->setCellValue('F' . $rowIndex, $rowEmpDetail['date']);
    } else {
        // Leave empty for emp_details
        $sheet->setCellValue('D' . $rowIndex, '');
        $sheet->setCellValue('E' . $rowIndex, '');
        $sheet->setCellValue('F' . $rowIndex, '');
    }

    $rowIndex++;
}

// Set the header for Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Box_Details_Data.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to a file or output it to the browser
$writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>