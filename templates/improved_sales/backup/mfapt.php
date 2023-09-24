<?php
require_once '../src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', '../src/Foundationphp');

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;

require_once '../includes/impsale/mfapt_mysqli.php';
if(!isset($_GET['showPreview'])){
	$_GET['showPreview'] = 0;
}
if(!boolval($_GET['showPreview'])){
	header('Content-Type: application/word');
	try {
        $options['stripNsplit'] = 'sale_comments';
        $xml = new Xml($result, null, $options);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/impsale/mfapt_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/mfapt.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Multi Family Apartment Improved Sales.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
	exit();
}

if (isset($_POST['download'])) {
    try {
        $options['stripNsplit'] = 'sale_comments';
        $xml = new Xml($result, null, $options);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/impsale/mfapt_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/mfapt.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Multi Family Apartment Improved Sales.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
