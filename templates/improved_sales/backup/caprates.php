<?php
require_once '../src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', '../src/Foundationphp');

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;

require_once '../includes/impsale/caprates_mysqli.php';
if(!isset($_GET['showPreview'])){
	$_GET['showPreview'] = 0;
}
if(!boolval($_GET['showPreview'])){
	header('Content-Type: application/word');
	try {
        $xml = new Xml($result, null);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/impsale/caprates_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/caprates.xslt');
        $download->create('Cap Rate Comps.docx');
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
	exit();
}

if (isset($_POST['download'])) {
    try {
        $options['stripNsplit'] = 'state';
        $xml = new Xml($result, null, $options);
        $download = new MsWord($xml);
		$dir = __DIR__ . '/';
        $rid = $_GET['id'];
        $download->setDocTemplate('../output/impsale/caprates_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/caprates.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Comps Comps.docx');
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
while ($row = getRow($result)) { ?>
<p class=MsoNormal style='line-height:normal'><b style='mso-bidi-font-weight:
normal'><span style='font-size:14.0pt;mso-bidi-font-size:12.0pt;font-family:
"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI";color:#0A4759;
mso-font-kerning:10.0pt'>Improved Sale</span></b></p>

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
  mso-no-proof:yes'></span><span
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
  "Segoe UI"'></span></span><span style='font-family:"Calibri","sans-serif";
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
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'></span><span
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
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'>,
  <span class=SpellE></span></span><span style='font-family:"Calibri","sans-serif";
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
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'></span><span
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
  "Segoe UI"'></span></span><span style='font-family:"Calibri","sans-serif";
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
  9.0pt;font-family:"Calibri","sans-serif";mso-bidi-font-family:"Segoe UI"'></span><span
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
	<hr>
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
