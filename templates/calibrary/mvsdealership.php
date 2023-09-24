<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mvsorkbookdeal.xlsx');
$ids = $_GET['id'];
$effDate = $_GET['efdatevalue'];
include("../../../../includes/connect.php");
if ( $result = $conn->query("SELECT * FROM assessedvalues WHERE FK_ReportID = " . $ids . "" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
                    
    $spreadsheet->getSheet(1)->setCellValue('I5', $effDate);
    
    $spreadsheet->getSheet(1)->getStyle('I5')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);
    $spreadsheet->getSheet(2)->getStyle('H6')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);
									// display records if there are records to display
					if ( $result->num_rows > 0 ) {
						$row = 5;
						while ( $record = $result->fetch_object() ) {
							//file_put_contents($_SERVER['DOCUMENT_ROOT']."/cards/comments.txt",$record->sale_comments."\n\n\n\n",FILE_APPEND);
							$spreadsheet->getSheet(3)
								->setCellValueByColumnAndRow(2, $row, $record->parcelno)
								->setCellValueByColumnAndRow(3, $row, $record->marketland)
								->setCellValueByColumnAndRow(4, $row, $record->marketimp)
                                ->setCellValueByColumnAndRow(16, $row, $record->assessedglasf)
								->setCellValueByColumnAndRow(6, $row, $record->annualtaxes);
							$row++;
						}
                        }
					// if there are no records in the database, display an alert message
					else {
						echo "No results to display!";
					}
	
				}
				// show an error if there is an issue with the database query
				else {
					echo "Error: " . $conn->error;
				}

				// close database connection
				$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MVS Workbook - Dealership.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>