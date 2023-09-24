<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mvsorkbookcomm.xlsx');
$effDate = $_GET['efdatevalue'];
$propname = $_GET['property_name'];
$primary = $_GET['primary'];
$primary = str_replace( ',', '', $primary );
$gba = $_GET['gba'];
$gba = str_replace( ',', '', $gba );

\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

$spreadsheet->getSheet(0)->setCellValue('I5', $propname);
$spreadsheet->getSheet(0)->setCellValue('K10', $gba);
$spreadsheet->getSheet(0)->setCellValue('C46', $primary . " SF X");
$spreadsheet->getSheet(1)->setCellValue('I6', $effDate);

$spreadsheet->getSheet(1)->getStyle('I6')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MVS Workbook - Commercial.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>