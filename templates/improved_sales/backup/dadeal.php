<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT @rn:=@rn+1 AS rank, CONCAT(alloc_imp_value_sf_gba,' per SF GBA Allocated Improvements') as price, record_date as recdate, saletype, saletype2, sale_comments as salecomments, IF(fin_term_adj + cond_sale_adj + excess_surplus_value + defer_maint_cost + add_ti_cost + broker_cost + stabil_cost <>0,' - Adjusted; ','; ') as adjusted FROM (SELECT FORMAT(alloc_imp_value_sf_gba,2) as alloc_imp_value_sf_gba, date_format(record_date,'%c/%y') as record_date, IF(sale_status = 185,'Listing ','Sale ') as saletype, IF(sale_status = 185,'Asking ','') as saletype2, sale_comments, fin_term_adj, cond_sale_adj,excess_surplus_value, defer_maint_cost, add_ti_cost, broker_cost, stabil_cost FROM saletrans
  	where FK_ReportID in (" . $_GET[ 'id' ] . ")
  	ORDER BY field(FK_ReportID," . $_GET[ 'id' ] . ")
	) t1, (SELECT @rn:=0) t2;" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'daTemplate.docx' );
  $templateProcessor->cloneBlock('my_block', $result->num_rows);
  // Creating the new document...  
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'rank', $record->rank,1);
    $templateProcessor->setValue( 'price', $record->price,1);
    $templateProcessor->setValue( 'adjusted', $record->adjusted,1);
    $templateProcessor->setValue( 'recdate', $record->recdate,1);
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
