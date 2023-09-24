<?php
$templatePath = dirname(__FILE__).'/../output/libtemps/mtretail.docx';
$outputFilename = 'Multi-tenant Retail.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("select a.id, a.reportname, upper(b.property_name) as cappropname, b.property_name as propname, format(c.overall_gba,0) as gba, format(c.overall_nra,0) as nra, c.const_descr, if(c.building_quality = 3,'',n.definition) as quality, if(c.int_condition = 3,'',o.definition) as bcond, c.year_built, c.last_renovation as renov, c.site_cover_primary as siteprim, format(c.floor_1_gba,0) as footprint, format(b.primary_sf,0) as primsf, c.land_build_ratio_primary as landprim, format(c.parking_stalls,0) as pspaces, c.parking_ratio as pratio from report a left join property b on b.FK_ReportID = a.id join building c on c.FK_ReportID = a.id join WFDictionary n on n.id = c.building_quality join WFDictionary o on o.id = c.int_condition WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'propname', $record->propname );
        $templateProcessor->setValue( 'gba', $record->gba );
        $templateProcessor->setValue( 'nra', $record->nra );
        $templateProcessor->setValue( 'const_descr', $record->const_descr );
        $templateProcessor->setValue( 'quality', $record->quality );
        $templateProcessor->setValue( 'bcond', $record->bcond );
        $templateProcessor->setValue( 'year_built', $record->year_built );
        $templateProcessor->setValue( 'renov', $record->renov );
        $templateProcessor->setValue( 'siteprim', $record->siteprim );
        $templateProcessor->setValue( 'footprint', $record->footprint );
        $templateProcessor->setValue( 'primsf', $record->primsf );
        $templateProcessor->setValue( 'landprim', $record->landprim );
        $templateProcessor->setValue( 'pspaces', $record->pspaces );
        $templateProcessor->setValue( 'pratio', $record->pratio );
    } else {
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