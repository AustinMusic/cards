<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$outputFilename = 'Subject Photos.docx';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Add first page header
$section = $phpWord->addSection();
$header = $section->addHeader();
// $header->firstPage();
$header->addImage('../../img/headerlogo.png', array('width' => 176, 'height' => 37, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START));

$footer = $section->addFooter();
$footer->addPreserveText('Page {PAGE}', null, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END));
$footer->addText('© 2020  aa VALUATION', null, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START));

// $section = $phpWord->addSection();
$table = $section->addTable(array('cellMargin' => 0));

$_GET['id'] = $conn->real_escape_string($_GET['id']); // TO CHANGE

$sql = "SELECT CONCAT(FK_ReportID,'/', photopath) as image, propphotos.order AS picOrder FROM propphotos WHERE FK_ReportID = ". $_GET['id'] ." order by picOrder";

if ($result = $conn->query($sql)) {
	$table = $section->addTable('test',  array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 0, 'paddingTop' => 0, 'align' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50));
	$table->addRow(500);
	$cell1 = $table->addCell(4500, array('valign' => 'center', 'bgColor' => '1C4453', 'gridSpan' => 3, 'borderTopSize' => 25, 'borderTopColor' => '359842', 'borderBottomSize' => 25, 'borderBottomColor' => '359842'));
	\PhpOffice\PhpWord\Shared\Html::addHtml($cell1, '<p style="font-weight:bold;font-family:Calibri;font-size:20px;">S<span style="font-size:15px;">UBJECT</span> P<span style="font-size:15px;">HOTOS</span></p>');
	$table->addRow(500);
	$cell1 = $table->addCell(4500, array('borderSize' => 0, 'borderColor' => 'ffffff', 'gridSpan' => 3))->addText('');
	$values = [];
	while($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$values[] = $record;
	}
}

for ($r = 0; $r <= $result->num_rows; $r= $r+2) {
	
	$table->addRow(3400);
	
	if (isset($values[$r])) {
		$cell1 = $table->addCell(4500, array('valign' => 'center', 'borderSize' => 20, 'borderColor' => '1e4959'));
		$cell1->addImage('../../comp_images/'. $values[$r]['image'], array('width' => 180, 'height' => 180, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
	} else {
		$table->addCell(4500)->addText('');
	}
	$table->addCell(300)->addText('');
	
	if (isset($values[$r+1])) {
		$cell2 = $table->addCell(4500, array('valign' => 'center', 'borderSize' => 20, 'borderColor' => '1e4959'));
		$cell2->addImage('../../comp_images/'. $values[$r + 1]['image'], array('width' => 180, 'height' => 180, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
	} else {
		$table->addCell(4500)->addText('');
	}

	$table->addRow(500);
	$table->addCell(4500)->addText('');
	$table->addCell(300)->addText('');
	$table->addCell(4500)->addText('');
}

$conn->close();
if(!empty($errors)) {
	echo nl2br(htmlspecialchars(implode("\n", array_unique($errors))));
	exit;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="'.$outputFilename.'"');
header('Cache-Control: max-age=0');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($outputFilename);
$objWriter->save("php://output");
