<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$outputFilename = 'Land Sale Photos.docx';

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$table = $section->addTable();

$_GET['id'] = $conn->real_escape_string($_GET['id']);

$sql ="SELECT @rn:=@rn+1 AS rank, image, address, city FROM (SELECT FK_ReportID, CONCAT(streetnumber,' ',streetname) as address, city, IF(photo1 = '','no-photo.jpg',CONCAT(FK_ReportID,'/',photo1)) as image FROM property WHERE FK_ReportID in (" . $_GET['id'] .") ORDER BY field(FK_ReportID," . $_GET['id'] .")) t1, (SELECT @rn:=0) t2;";

if ($result = $conn->query($sql)) {
    $table = $section->addTable('photos', array('borderSize' => 6, 'borderColor' => '006699', 'align' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER));
    $values = [];
    while($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $values[] = $record;
    }
}

for ($r = 0; $r <= $result->num_rows; $r= $r+2) {
    
    if (isset($values[$r])) {
		$table->addRow(3270);
        $cell1 = $table->addCell(4320, array('valign' => 'bottom', 'align' => 'center', 'borderSize' => 20, 'borderColor' => '1e4959', ''));
        $cell1->addImage('../../comp_images/'. $values[$r]['image'], 
            array('width' => 210, 'height' => 148, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    	$table->addCell(300)->addText('');
    }
    
    if (isset($values[$r+1])) {
        $cell2 = $table->addCell(4320, array('valign' => 'bottom', 'align' => 'center', 'borderSize' => 20, 'borderColor' => '1e4959'));
        $cell2->addImage('../../comp_images/'. $values[$r + 1]['image'], 
        array('width' => 210, 'height' => 148, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    }
    
    $table->addRow(820);
    
    if (isset($values[$r])) {
        $cell2 = $table->addCell(3600, array('align' => 'center'));
        \PhpOffice\PhpWord\Shared\Html::addHtml($cell2, '<p style="text-align:center; font-family: Calibri;"><b>Land Sale ' . $values[$r]['rank'] . '</b><br/>'.$values[$r]['address'] . ', '  . $values[$r]['city'].'</p>');
    }
    $table->addCell(300)->addText('');
    if (isset($values[$r+1])) {
        $cell2 = $table->addCell(3600, array('align' => 'center'));
        \PhpOffice\PhpWord\Shared\Html::addHtml($cell2, '<p style="text-align:center; font-family: Calibri;"><b>Land Sale ' . $values[$r + 1]['rank'] . '</b><br/>'.$values[$r+1]['address'] . ', '  . $values[$r+1]['city'].'</p>');
    }
}

$conn->close();
if(!empty($errors)) {
    echo nl2br(htmlspecialchars(implode("\n", array_unique($errors))));
    exit;
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="'.$outputFilename.'"');
header('Cache-Control: max-age=0');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($outputFilename);
$objWriter->save("php://output");