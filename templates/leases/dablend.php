<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT @rn:=@rn+1 AS rank, CONCAT(effrent,' per SF - Blended') as price, startdate as startdate, lease_comment as leasecomments, IF(init_annual_rent <> eff_annual_rent, ' - Adjusted; ','; ') as adjusted
	FROM (
  	SELECT FORMAT(eff_rent_sf_mo_blend,3) as effrent, date_format(lease_start_date,'%c/%y') as startdate, lease_comment, init_annual_rent, eff_annual_rent
  	FROM leasetrans 
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
    $templateProcessor->setValue( 'startdate', $record->startdate,1);
    $leasecomments = str_replace("$", "dollarsign", $record->leasecomments);
    $templateProcessor->setValue( 'leasecomments', $leasecomments,1);
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
