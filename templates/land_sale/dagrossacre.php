<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT @rn:=@rn+1 AS rank, saletype, CONCAT(price,' per Gross Acre', adjusted, saletype2, recdate) as price, salecomments
	FROM (
  	SELECT FORMAT(adj_price_acre_gross,0) as price, date_format(record_date,'%c/%y') as recdate, IF(sale_status = 185,'Listing ','Sale ') as saletype, IF(sale_status = 185,'Asking ',IF(sale_status = 181,'Exprired ',IF(sale_status = 182,'Sale-Fail ',IF(sale_status = 183,'Pending ',IF(sale_status = 186,'Purchase Option ',IF(sale_status = 188,'Terminated ',IF(sale_status = 445,'Assemblage ',''))))))) as saletype2, sale_comments as salecomments, IF(fin_term_adj + cond_sale_adj + demo_cost + onsite_extra_cost + offsite_develop + broker_cost + less_alloc_imp_price <>0,' - Adjusted; ','; ') as adjusted
  	FROM saletrans
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
