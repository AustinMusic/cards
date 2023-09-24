<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mvsorkbookapt.xlsx');
$effDate = $_GET['efdatevalue'];
$propname = $_GET['property_name'];
$sbex = $_GET['sbex'];
$mezzsf = $_GET['mezzsf'];
$primary = $_GET['primary'];
$floor1 = $_GET['floor1'];
$floor1 = str_replace( ',', '', $floor1 );
$floor2 = $_GET['floor2'];
$floor2 = str_replace( ',', '', $floor2 );
$gba = ((int)$floor1 + (int)$floor2);

\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

$spreadsheet->getSheet(0)->setCellValue('I5', $propname);
$spreadsheet->getSheet(0)->setCellValue('L10', $sbex);
$spreadsheet->getSheet(0)->setCellValue('M10', $mezzsf);
$spreadsheet->getSheet(0)->setCellValue('K10', $gba);
$spreadsheet->getSheet(0)->setCellValue('C46', $primary . " SF X");
$spreadsheet->getSheet(1)->setCellValue('I6', $effDate);

$spreadsheet->getSheet(1)->getStyle('I6')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MVS Workbook - Apartment.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>