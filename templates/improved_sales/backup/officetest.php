<?php
require_once '../src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', '../src/Foundationphp');

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;

require_once '../includes/impsale/officetest_mysqli.php';
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
        $download->setDocTemplate('../output/impsale/offtest_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/officetest.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('IS_Office.docx');
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
        $download->setDocTemplate('../output/impsale/offtest_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/officetest.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('IS_Office.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Office</title>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073786111 1 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:3 0 0 0 1 0;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520084737 -1073683329 41 0 479 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:14.0pt;
	mso-line-height-rule:exactly;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Times New Roman";
	mso-font-kerning:12.0pt;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-unhide:no;
	mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:Tahoma;
	mso-font-kerning:12.0pt;}
p.AddendaHeading, li.AddendaHeading, div.AddendaHeading
	{mso-style-name:"Addenda Heading";
	mso-style-update:auto;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Addenda Heading Char";
	margin-top:13.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	mso-pagination:widow-orphan lines-together;
	page-break-after:avoid;
	mso-outline-level:2;
	border:none;
	mso-border-bottom-alt:solid windowtext .5pt;
	padding:0in;
	mso-padding-alt:0in 0in 1.0pt 0in;
	font-size:16.0pt;
	font-family:"Arial","sans-serif";
	mso-fareast-font-family:"Times New Roman";
	mso-bidi-font-family:"Segoe UI";
	color:#1E4959;
	letter-spacing:-.1pt;
	mso-font-kerning:12.0pt;
	font-weight:bold;}
span.AddendaHeadingChar
	{mso-style-name:"Addenda Heading Char";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-parent:"";
	mso-style-link:"Addenda Heading";
	mso-ansi-font-size:16.0pt;
	mso-bidi-font-size:16.0pt;
	font-family:"Arial","sans-serif";
	mso-ascii-font-family:Arial;
	mso-hansi-font-family:Arial;
	mso-bidi-font-family:"Segoe UI";
	color:#1E4959;
	letter-spacing:-.1pt;
	mso-font-kerning:12.0pt;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;
	mso-bidi-language:AR-SA;
	font-weight:bold;}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Balloon Text";
	mso-ansi-font-size:8.0pt;
	mso-bidi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-bidi-font-family:Tahoma;
	mso-font-kerning:12.0pt;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:12.95pt .75in 43.9pt .75in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
@page WordSection2
	{size:8.5in 11.0in;
	margin:12.95pt .75in 43.9pt .75in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.WordSection2
	{page:WordSection2;}
-->
</style>

</head>

<body>

<div class=WordSection1>
<?php

if (isset($error)) {
    echo "<p>$error</p>";
} else {
    ?>
	<?php 
while ($row = getRow($result)) { ?>
<p class=MsoNormal style='line-height:normal'><b style='mso-bidi-font-weight:
normal'><span style='font-size:14.0pt;mso-bidi-font-size:12.0pt;font-family:
"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI";color:#0A4759;
mso-font-kerning:10.0pt'>Improved Sale <?php echo $row['reportid'];?></span></b></p>

<p class=MsoNormal style='line-height:normal'><span style='mso-bidi-font-size:
12.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI";
color:#0A4759;mso-font-kerning:10.0pt'><o:p>&nbsp;</o:p></span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=672
 style='width:7.0in;border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:480;mso-padding-alt:0in 0in 0in 0in;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border:none;
  border-bottom:solid #3FB44F 3.0pt;background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>PROPERTY
  INFORMATION</span></b><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=348 colspan=6 rowspan=16 valign=top style='width:261.0pt;
  border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=center style='text-align:center;line-height:12.0pt'><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI";
  mso-no-proof:yes'><img width=330 height=247
  src="../../comp_images/<?php echo $row['image'];?>" alt="<?php echo $row['alt'];?>"></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:.1in'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;height:7.15pt'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in;
  height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>PROPERTY
  NAME:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in;height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['property_name'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:7.1pt'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in;
  height:7.1pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>LOCATION:<o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in;height:7.1pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['address'];?></span><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>CITY,
  STATE:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['city'];?>,
  <span class=SpellE><?php echo $row['shortname'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>COUNTY:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['county'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>LEGAL
  DESCRIPTION:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['legal_desc'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>SUBMARKET:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['submarket'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>PROPERTY
  TYPE:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['propertysubtype'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>OCCUPANCY
  TYPE:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['occupancy_type'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10;height:.1in'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border:none;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border:none;
  border-bottom:solid #3FB44F 3.0pt;background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>SALE
  INFORMATION</span></b><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:12;height:.1in'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:13'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>GRANTOR:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['grantor'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:14'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>GRANTEE:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['grantee'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:15'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><st1:place w:st="on"><st1:City
   w:st="on"><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
    mso-bidi-font-family:"Segoe UI"'>SALE</span></st1:City></st1:place><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'> PRICE:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['sale_price'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:16'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>ADJUSTED
  PRICE:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['eff_sale_price_stab'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> - <span
  class=SpellE><?php echo $row['adj_price_comment'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>DATE OF <st1:City w:st="on"><st1:place
   w:st="on">SALE</st1:place></st1:City>:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['record_date'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <span
  style='mso-spacerun:yes'>  </span><span class=SpellE><?php echo $row['sale_status'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:17'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>TERMS
  OF <st1:place w:st="on"><st1:City w:st="on">SALE</st1:City></st1:place>:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['type_finance'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>RECORDING:</span><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['conv_doc_rec_no'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <span
  class=SpellE><?php echo $row['conv_doc_type'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:18;height:7.15pt'>
  <td width=120 valign=top style='width:1.25in;border:none;padding:0in 0in 0in 0in;
  height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>PROPERTY
  RIGHTS:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=204 colspan=4 valign=top style='width:153.0pt;border:none;
  padding:0in 0in 0in 0in;height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['prop_rights_conv'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  padding:0in 0in 0in 0in;height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>MARKETING TIME:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in;height:7.15pt'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['market_time'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:19;height:.1in'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:20'>
  <td width=324 colspan=5 valign=top style='width:243.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 3.0pt;border-right:double #3FB44F 1.5pt;
  background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>IMPROVEMENT
  DATA</span></b><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=348 colspan=6 valign=top style='width:261.0pt;border:none;
  border-bottom:solid #3FB44F 3.0pt;mso-border-left-alt:double #3FB44F 1.5pt;
  background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>SITE DATA</span></b><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:21;height:.1in'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=348 colspan=6 valign=top style='width:261.0pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;mso-border-left-alt:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:22'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>YEAR
  BUILT (RENOVATED):</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['year_built'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <span class=SpellE><?php echo $row['last_renovation'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>ZONING:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['zoning_code'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>, <span class=SpellE><?php echo $row['zoning_desc'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:23'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>GROSS
  BUILDING AREA (GBA):</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['overall_gba'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> SF</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>PRIMARY SITE AREA:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['primary_acre'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> Acres / <span
  class=SpellE><?php echo $row['primary_sf'];?></span> SF</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:24'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>NET
  RENTABLE AREA (NRA):</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['overall_nra'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> SF</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>LAND-TO-BLDG. RATIO:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['land_build_ratio_primary'];?></span></span><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> to
  1</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:25'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>NO.
  OF LEVELS:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['no_stories'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>SITE ACCESS:</span><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['site_access'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:26'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>TYPE
  OF CONSTRUCTION:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['const_descr'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>SITE EXPOSURE:</span><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['exposure'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:27'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>QUALITY
  / CLASS:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['building_quality'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> / <span
  class=SpellE><?php echo $row['building_class'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>SITE ORIENTATION:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=192 colspan=4 valign=top style='width:2.0in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['orientation'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:28'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>CONDITION
  (Exterior / Interior):</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['ext_condition'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> / <span
  class=SpellE><?php echo $row['int_condition'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=348 colspan=6 valign=top style='width:261.0pt;border:none;
  border-bottom:solid #3FB44F 3.0pt;mso-border-left-alt:double #3FB44F 1.5pt;
  background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><b style='mso-bidi-font-weight:
  normal'><span style='font-size:9.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI";color:white'><span
  style='mso-spacerun:yes'> </span>INCOME / EXPENSES</span></b><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:29'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>ELEVATOR:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['off_elevator_service'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span><span class=SpellE><?php echo $row['oe_income_actual_proforma'];?></span>
  <span style='mso-spacerun:yes'> </span><span class=SpellE><?php echo $row['oe_income_source'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border:solid #3FB44F 1.0pt;
  border-left:none;mso-border-left-alt:solid #3FB44F .5pt;mso-border-alt:solid #3FB44F .5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'>ANNUAL</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border:solid #3FB44F 1.0pt;
  border-left:none;mso-border-left-alt:solid #3FB44F .5pt;mso-border-alt:solid #3FB44F .5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'>$ / SF NRA</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:30'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>HVAC:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['off_type_hvac'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>PGI:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_pgi'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['pgi_sf_nra'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:31'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>PARKING
  RATIO:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['parking_ratio'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>Vacancy:<span style='mso-spacerun:yes'>   
  </span><span class=SpellE><?php echo $row['oe_vacany_pct'];?></span></span><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_vacancy_credit_loss'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['vacancy_sf_nra'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:32'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>OTHER
  FEATURES:</span><span style='font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=154 rowspan=3 valign=top style='width:1.6in;border:none;border-right:
  double #3FB44F 1.5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['other_const_features'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>EGI:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_egi'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['egi_sf_nra'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:33'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>Expenses:<span style='mso-spacerun:yes'>   
  </span><span class=SpellE><?php echo $row['oe_expence_ratio'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_expences'];?></span></span><span style='font-size:9.0pt;font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['expence_sf_nra'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:34'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><span
  style='mso-spacerun:yes'> </span>NOI:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_total_noi'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border-top:none;
  border-left:none;border-bottom:solid #3FB44F 1.0pt;border-right:solid #3FB44F 1.0pt;
  mso-border-top-alt:solid #3FB44F .5pt;mso-border-left-alt:solid #3FB44F .5pt;
  mso-border-alt:solid #3FB44F .5pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['oe_noi_sf_nra'];?></span></span><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> <o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:35;height:.1in'>
  <td width=170 colspan=4 valign=top style='width:127.8pt;border:none;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=154 valign=top style='width:1.6in;border:none;border-right:double #3FB44F 1.5pt;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=156 colspan=2 valign=top style='width:117.0pt;border:none;
  mso-border-left-alt:double #3FB44F 1.5pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border:none;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border:none;padding:
  0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:36'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  border-bottom:solid #3FB44F 3.0pt;background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>SALE ANALYSIS</span></b><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:37;height:.1in'>
  <td width=328 colspan=6 valign=top style='width:246.3pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=344 colspan=5 valign=top style='width:257.7pt;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:38'>
  <td width=168 colspan=3 valign=top style='width:1.75in;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'>ADJUSTED PRICE / SF GBA:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=160 colspan=3 valign=top style='width:120.3pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['adj_price_sf_gba'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=152 valign=top style='width:113.7pt;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'>CAP RATE:</span><span style='font-family:
  "Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['cap_rate'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:39'>
  <td width=168 colspan=3 valign=top style='width:1.75in;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'>ADJUSTED PRICE / SF NRA:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=160 colspan=3 valign=top style='width:120.3pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['adj_price_sf_nra'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=152 valign=top style='width:113.7pt;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'>EGIM:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=108 colspan=2 valign=top style='width:81.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['egim'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=84 colspan=2 valign=top style='width:63.0pt;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:40;height:.1in'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:41'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  border-bottom:solid #3FB44F 3.0pt;background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI";color:white'><span style='mso-spacerun:yes'> </span>COMMENTS</span></b><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:42;height:.1in'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  mso-border-top-alt:solid #3FB44F 3.0pt;padding:0in 0in 0in 0in;height:.1in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:43'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span class=SpellE><span style='font-size:9.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><?php echo $row['sale_comments'];?></span></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:44;height:.2in'>
  <td width=672 colspan=11 valign=top style='width:7.0in;border:none;
  padding:0in 0in 0in 0in;height:.2in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:45'>
  <td width=144 colspan=2 valign=top style='width:1.5in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'>CONFIRMATION SOURCE:</span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=396 colspan=6 valign=top style='width:297.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><?php echo $row['confirm_1_source'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=71 colspan=2 valign=top style='width:53.35pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'>VERIFIED BY:</span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=61 valign=top style='width:45.65pt;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['confirm_by'];?></span></span><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:46;mso-yfti-lastrow:yes'>
  <td width=144 colspan=2 valign=top style='width:1.5in;border:none;padding:
  0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=396 colspan=6 valign=top style='width:297.0pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif";
  mso-bidi-font-family:"Segoe UI"'><?php echo $row['confirm_2_souce'];?></span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
  <td width=71 colspan=2 valign=top style='width:53.35pt;border:none;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=61 valign=top style='width:45.65pt;border:none;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span class=SpellE><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:
  "Segoe UI"'><?php echo $row['confirm_date'];?></span></span><span style='font-size:8.0pt;
  font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'> </span><span
  style='font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'><o:p></o:p></span></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=112 style='border:none'></td>
  <td width=20 style='border:none'></td>
  <td width=20 style='border:none'></td>
  <td width=2 style='border:none'></td>
  <td width=148 style='border:none'></td>
  <td width=4 style='border:none'></td>
  <td width=152 style='border:none'></td>
  <td width=70 style='border:none'></td>
  <td width=57 style='border:none'></td>
  <td width=23 style='border:none'></td>
  <td width=63 style='border:none'></td>
 </tr>
 <![endif]>
</table>
<?php } ?>
<form method="post">
            <input type="submit" name="download" id="download" value="Download Word File">
</form>
<?php } ?>
</div>

<span style='font-size:12.0pt;mso-bidi-font-size:10.0pt;font-family:"Arial","sans-serif";
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Times New Roman";
mso-font-kerning:12.0pt;mso-ansi-language:EN-US;mso-fareast-language:EN-US;
mso-bidi-language:AR-SA'><br clear=all style='page-break-before:always;
mso-break-type:section-break'>
</span>

<div class=WordSection2>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>
