<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mvsorkbookchurch.xlsx');
$effDate = $_GET['efdatevalue'];
$propname = $_GET['property_name'];
$gba = $_GET['gba'];
$glasf = $_GET['glasf'];

\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

$spreadsheet->getSheet(1)->setCellValue('P21', $glasf);
$spreadsheet->getSheet(1)->setCellValue('I5', $effDate);

$spreadsheet->getSheet(1)->getStyle('I5')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MVS Workbook - Church.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>