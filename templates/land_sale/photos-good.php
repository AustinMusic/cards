<?php
require_once '../src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', '../src/Foundationphp');

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;

require_once '../includes/impsale/photos_mysqli.php';
if(!isset($_GET['showPreview'])){
	$_GET['showPreview'] = 0;
}
if(!boolval($_GET['showPreview'])){
	header('Content-Type: application/word');
	try {
        $options['stripNsplit'] = 'rank';
        $xml = new Xml($result, null, $options);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/landsale/photoSummary.docx');
        $download->setXsltSource('../output/landsale/photos.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Photo_Summary.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
	exit();
}

if (isset($_POST['download'])) {
    try {
        $options['stripNsplit'] = 'rank';
        $xml = new Xml($result, null, $options);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/landsale/photoSummary.docx');
        $download->setXsltSource('../output/landsale/photos.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Ind_Comm.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>Industrial Commercial Sale</title>
</head>
<body>
</body>
</html>