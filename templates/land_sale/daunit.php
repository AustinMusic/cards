<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT @rn:=@rn+1 AS rank, saletype, CONCAT(price,' per Lot or Unit', adjusted, saletype2, recdate) as price, salecomments
	FROM (
  	SELECT b.FK_ReportID, FORMAT(a.sale_price_lot_wo,0) as price, date_format(b.record_date,'%c/%y') as recdate, b.sale_comments as salecomments, IF(b.sale_status = 185,'Listing ','Sale ') as saletype, IF(b.sale_status = 185,'Asking ',IF(b.sale_status = 181,'Exprired ',IF(b.sale_status = 182,'Sale-Fail ',IF(b.sale_status = 183,'Pending ',IF(b.sale_status = 186,'Purchase Option ',IF(b.sale_status = 188,'Terminated ',IF(b.sale_status = 445,'Assemblage ',''))))))) as saletype2, IF(b.fin_term_adj + b.cond_sale_adj + b.demo_cost + b.onsite_extra_cost + b.offsite_develop + b.broker_cost + b.less_alloc_imp_price <>0,' - Adjusted; ','; ') as adjusted
  	FROM saletrans b
	LEFT OUTER JOIN resland a on a.FK_ReportID = b.FK_ReportID
  	where b.FK_ReportID in (" . $_GET[ 'id' ] . ")
  	ORDER BY field(b.FK_ReportID," . $_GET[ 'id' ] . ")
	) t1, (SELECT @rn:=0) t2;" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'daTemplate.docx' );
  $templateProcessor->cloneBlock('my_block', $result->num_rows);
  // Creating the new document...  
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'rank', $record->rank,1);
    $templateProcessor->setValue( 'price', $record->price,1);
    $templateProcessor->setValue( 'saletype', $record->saletype,1);
    $salescomments = str_replace("$", "dollarsign", $record->salecomments);
    $templateProcessor->setValue( 'salecomments', $salescomments,1);
    $templateProcessor->tempDocumentMainPart = str_replace("dollarsign", "$", $templateProcessor->tempDocumentMainPart);
  }
} else {
  echo "Error: " . $conn->error;
}

// close database connection
$conn->close();
$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Data Analysis.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
