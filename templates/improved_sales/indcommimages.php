<?php
require_once '../src/Foundationphp/Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', '../src/Foundationphp');

use Foundationphp\Exporter\Xml;
use Foundationphp\Exporter\MsWord;

require_once '../includes/impsale/indcomm_mysqli.php';
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
        $download->setDocTemplate('../output/impsale/indcomm_wordTemplate.docx');
        $download->setXsltSource('../output/impsale/indcommimages.xslt');
        $download->setImageSource('../../comp_images/');
        $download->create('Photo_Summary.docx');
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
        $download->setDocTemplate('../output/landsale/indcomm_wordTemplate.docx');
        $download->setXsltSource('../output/landsale/indcomm.xslt');
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
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:14.0pt;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
h1
	{margin:0in;
	margin-bottom:.0001pt;
	line-height:14.0pt;
	page-break-after:avoid;
	font-size:14.0pt;
	font-family:"Arial","sans-serif";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:14.0pt;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:14.0pt;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{margin:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	line-height:14.0pt;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";}
p.AddendaHeading, li.AddendaHeading, div.AddendaHeading
	{mso-style-name:"Addenda Heading";
	mso-style-link:"Addenda Heading Char";
	margin-top:13.0pt;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:0in;
	margin-bottom:.0001pt;
	text-align:justify;
	page-break-after:avoid;
	border:none;
	padding:0in;
	font-size:16.0pt;
	font-family:"Arial","sans-serif";
	color:#1E4959;
	letter-spacing:-.1pt;
	font-weight:bold;}
span.AddendaHeadingChar
	{mso-style-name:"Addenda Heading Char";
	mso-style-link:"Addenda Heading";
	font-family:"Arial","sans-serif";
	color:#1E4959;
	letter-spacing:-.1pt;
	font-weight:bold;}
.MsoChpDefault
	{font-size:10.0pt;}
 /* Page Definitions */
 @page WordSection1
	{size:8.5in 11.0in;
	margin:12.95pt .75in .5in .75in;}
div.WordSection1
	{page:WordSection1;}
@page WordSection2
	{size:8.5in 11.0in;
	margin:12.95pt .75in .5in .75in;}
div.WordSection2
	{page:WordSection2;}
-->
</style>

</head>

<body lang=EN-US>

<div class=WordSection1>

<?php

if (isset($error)) {
    echo "<p>$error</p>";
} else {
while ($row = getRow($result)) { ?>

<p class=MsoNormal style='line-height:normal'><b><span style='font-size:14.0pt;
font-family:"Calibri","sans-serif";color:#0A4759'>Land Sale </span></b></p>

<p class=MsoNormal style='line-height:normal'><span style='font-family:"Calibri","sans-serif";
color:#0A4759'>&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=1 cellpadding=0 width=672
 style='width:7.0in;margin-left:.7pt'>
 <tr>
  <td width=323 colspan=3 valign=top style='width:241.95pt;border:none;
  border-bottom:solid #3FB44F 3.0pt;background:#1E4959;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>PROPERTY
  INFORMATION</span></b></p>
  </td>
  <td width=347 colspan=7 rowspan=15 valign=top style='width:259.95pt;
  padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=center style='text-align:center'><img width=330 height=247
  src="../../comp_images/<?php echo $row['image'];?>" alt="<?php echo $row['alt'];?>"></p>
  </td>
 </tr>
 <tr style='height:6.75pt'>
  <td width=323 colspan=3 valign=top style='width:241.95pt;padding:0in 0in 0in 0in;
  height:6.75pt'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>PROPERTY NAME:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['property_name'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>LOCATION:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['address'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>CITY, STATE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['city'];?>, <?php echo $row['shortname'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>COUNTY:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['county'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>LEGAL DESCRIPTION:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['legal_desc'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>SUBMARKET:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['submarket'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>PROPERTY TYPE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left;page-break-after:avoid'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['propertytype'];?>  <?php echo $row['propertysubtype'];?></span></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=323 colspan=3 style='width:241.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:.2in'>
  <td width=323 colspan=3 style='width:241.95pt;border:none;border-bottom:solid #3FB44F 3.0pt;
  background:#1E4959;padding:0in 0in 0in 0in;height:.2in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
    style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>SALE</span></b><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>
  INFORMATION</span></b></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>GRANTOR:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['grantor'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>GRANTEE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['grantee'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
    8.0pt;font-family:"Calibri","sans-serif"'>SALE</span><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> PRICE:</span></p>
  </td>
  <td width=203 colspan=2 style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['sale_price'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>ADJUSTED PRICE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['eff_sale_price_stab'];?> - <?php echo $row['adj_price_comment'];?></span></p>
  </td>
  <td width=155 colspan=3 style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'> DATE OF SALE:</span></p>
  </td>
  <td width=191 colspan=4 style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['record_date'];?>  <?php echo $row['record_date_two'];?>  <?php echo $row['sale_status'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>TERMS OF SALE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['type_finance'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'> RECORDING:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['conv_doc_rec_no'];?>  <?php echo $row['conv_doc_type'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>PROPERTY RIGHTS:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['prop_rights_conv'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'> MARKETING TIME:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['market_time'];?></span></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=323 colspan=3 valign=top style='width:241.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
  <td width=347 colspan=7 valign=top style='width:259.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:.2in'>
  <td width=670 colspan=10 style='width:502.6pt;border:none;border-bottom:solid #3FB44F 3.0pt;
  background:#1E4959;padding:0in 0in 0in 0in;height:.2in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>SITE
  DATA</span></b></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:1.0pt'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:1.0pt'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>GROSS
  LAND AREA:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in;
  height:1.0pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['gross_land_acre'];?> Acres / <?php echo $row['gross_land_sf'];?>
  SF</span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in;
  height:1.0pt'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> ORIENTATION:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in;
  height:1.0pt'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['orientation'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>NET
  LAND AREA:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['net_usable_acre'];?> Acres / <?php echo $row['net_usable_sf'];?>
  SF</span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> SITE
  ACCESS:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['site_access'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>ZONING:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['zoning_code'];?>, <?php echo $row['zoning_desc'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> EXPOSURE:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['exposure'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>TOPOGRAPHY:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['topography'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> FLOOD
  PLAIN:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['flood_plain'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>SHAPE:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['shape'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> EASEMENTS:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['easement_desc'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>UTILITIES:</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['utilities'];?></span></p>
  </td>
  <td width=155 colspan=3 valign=top style='width:116.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'> OTHER:</span></p>
  </td>
  <td width=191 colspan=4 valign=top style='width:142.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['other_land_comments'];?></span></p>
  </td>
 </tr>
 <tr style='height:.05in'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=111 colspan=2 valign=top style='width:83.3pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=119 colspan=3 valign=top style='width:89.3pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
  <td width=115 colspan=2 valign=top style='width:85.95pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:.2in'>
  <td width=670 colspan=10 style='width:502.6pt;border:none;border-bottom:solid #3FB44F 3.0pt;
  background:#1E4959;padding:0in 0in 0in 0in;height:.2in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
    style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>SALE</span></b><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>
  ANALYSIS</span></b></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=203 colspan=2 valign=top style='width:152.3pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=83 valign=top style='width:62.1pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=191 colspan=5 valign=top style='width:143.5pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><b><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
  <td width=71 valign=top style='width:52.95pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:.25in'>
  <td width=119 valign=top style='width:88.95pt;padding:0in 0in 0in 0in;
  height:.25in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>UNIT
  PRICE:</span></p>
  </td>
  <td width=479 colspan=8 valign=top style='width:359.3pt;padding:0in 0in 0in 0in;
  height:.25in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['adj_price_sf_net'];?> per SF of Net
  Usable Land Area</span></p>
  </td>
  <td width=71 valign=top style='width:52.95pt;padding:0in 0in 0in 0in;
  height:.25in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr style='height:.05in'>
  <td width=670 colspan=10 style='width:502.6pt;padding:0in 0in 0in 0in;
  height:.05in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></b></p>
  </td>
 </tr>
 <tr style='height:.2in'>
  <td width=670 colspan=10 style='width:502.6pt;border:none;border-bottom:solid #3FB44F 3.0pt;
  background:#1E4959;padding:0in 0in 0in 0in;height:.2in'>
  <p class=MsoNormal align=left style='text-align:left'><b><span
  style='font-size:9.0pt;font-family:"Calibri","sans-serif";color:white'>COMMENTS</span></b></p>
  </td>
 </tr>
 <tr style='height:.1in'>
  <td width=670 colspan=10 valign=top style='width:502.6pt;padding:0in 0in 0in 0in;
  height:.1in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=670 colspan=10 valign=top style='width:502.6pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><span style='font-size:9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['sale_comments'];?></span></p>
  </td>
 </tr>
 <tr style='height:.15in'>
  <td width=143 colspan=2 valign=top style='width:106.95pt;padding:0in 0in 0in 0in;
  height:.15in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=527 colspan=8 valign=top style='width:394.95pt;padding:0in 0in 0in 0in;
  height:.15in'>
  <p class=MsoNormal><span style='font-size:8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=143 colspan=2 style='width:106.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>CONFIRMATION SOURCE:</span></p>
  </td>
  <td width=383 colspan=5 style='width:287.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['confirm_1_source'];?></span></p>
  </td>
  <td width=71 colspan=2 style='width:53.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>VERIFIED BY:</span></p>
  </td>
  <td width=71 style='width:52.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['confirm_by'];?></span></p>
  </td>
 </tr>
 <tr>
  <td width=143 colspan=2 style='width:106.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=383 colspan=5 style='width:287.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  9.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['confirm_2_souce'];?></span></p>
  </td>
  <td width=71 colspan=2 style='width:53.3pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=left style='text-align:left'><span style='font-size:
  8.0pt;font-family:"Calibri","sans-serif"'>&nbsp;</span></p>
  </td>
  <td width=71 valign=top style='width:52.95pt;padding:0in 0in 0in 0in'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:8.0pt;font-family:"Calibri","sans-serif"'><?php echo $row['confirm_date'];?></span></p>
  </td>
 </tr>
 <tr height=0>
  <td width=108 style='border:none'></td>
  <td width=23 style='border:none'></td>
  <td width=158 style='border:none'></td>
  <td width=81 style='border:none'></td>
  <td width=27 style='border:none'></td>
  <td width=43 style='border:none'></td>
  <td width=46 style='border:none'></td>
  <td width=27 style='border:none'></td>
  <td width=43 style='border:none'></td>
  <td width=116 style='border:none'></td>
 </tr>
</table>
	<hr>
<?php } ?>
<form method="post">
            <input type="submit" name="download" id="download" value="Download Word File">
</form>
<?php } ?>
</div>

<span style='font-size:12.0pt;font-family:"Calibri","sans-serif"'><br
clear=all style='page-break-before:always'>
</span>

<div class=WordSection2>

<p class=MsoNormal><span style='font-family:"Calibri","sans-serif"'>&nbsp;</span></p>

</div>

</body>

</html>
