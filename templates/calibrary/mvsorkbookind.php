<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mvsorkbookind.xlsx');
$effDate = $_GET['efdatevalue'];
$propname = $_GET['property_name'];
$gba = $_GET['gba'];
$offbo = $_GET['offbo'];
$primary = $_GET['primary'];
$mezzsf = $_GET['mezzsf'];

\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

$spreadsheet->getSheet(0)->setCellValue('I5', $propname);
$spreadsheet->getSheet(0)->setCellValue('I10', $gba);
$spreadsheet->getSheet(0)->setCellValue('I11', $offbo);
$spreadsheet->getSheet(0)->setCellValue('C51', $primary . " sf X");
$spreadsheet->getSheet(0)->setCellValue('I12', $mezzsf);
$spreadsheet->getSheet(1)->setCellValue('I6', $effDate);

$spreadsheet->getSheet(0)->getStyle('D42')
            ->getNumberFormat()
            ->setFormatCode('#,##0 \SF');
$spreadsheet->getSheet(1)->getStyle('I6')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MVS Workbook - Industrial.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>