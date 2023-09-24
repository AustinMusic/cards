<?php

$templatePath = dirname(__FILE__).'/../output/libtemps/subPhotosSingle.docx';
$outputFilename = 'Subject Photos.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT a.id, UPPER(b.property_name) as cappropname FROM report a LEFT JOIN property b on b.FK_ReportID = a.id WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
    } else {
        $errors[] = "ID ".$_GET['id']." does not exist in the database";
    }
} else {
    $errors[] = $conn->error;
}
//Photos
if ($result = $conn->query("SELECT FK_ReportID, caption, CONCAT(FK_ReportID,'/',photopath) as propphoto FROM propphotos where FK_ReportID = " . $_GET['id'] . " order by propphotos.order asc")) {
    while($record = $result->fetch_object()) {
		$values[] = [
						'FK_ReportID' => $record->FK_ReportID,
						'caption' => $record->caption,
						//'propphoto' => array('../../comp_images/' => $record->propphoto, 'width' => 40, 'height' => 40)
						'propphoto' => '../../comp_images/' . $record->propphoto
					];
	}

	///$templateProcessor->cloneRowAndSetValues('FK_ReportID', $values);
	
	$templateProcessor->cloneRow('caption', count($values));

	for ($i = 1;  $i <= count($values) ; $i++) {
	   foreach ($values[$i -1] as $key => $value) {
//	       echo $i;
	        if ($key == 'propphoto') {
                $templateProcessor->setImageValue($key. '#'. $i, array('path' => $value, 'width' => 250, 'height' => 150));
//	            $templateProcessor->setImageValue($key. '#'. $i, $value);
	      } else {
	            $templateProcessor->setValue($key. '#'. $i, $value);
	      }
	   }
	}

	///$templateProcessor->setValue('caption', $caption);
    ///$templateProcessor->setImageValue('propphoto', $propphoto);
	
	if(empty($values)) {
		$errors[] = "ID ".$_GET['id']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

//close database connection
$conn->close();

//show errors and exit
if(!empty($errors)) {
	echo nl2br(htmlspecialchars(implode("\n", array_unique($errors))));
	exit;
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="'.$outputFilename.'"');
header('Cache-Control: max-age=0');
$templateProcessor->saveAs($temp_file);
readfile($temp_file); // or echo file_get_contents($temp_file);
unlink($temp_file); // remove temp file