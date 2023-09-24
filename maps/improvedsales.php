<?php include("../../../includes/check.php"); ?>
<?php
require_once 'function.php';
$propertyType = getPropertyType(array('method'=>"rid2",'operator'=>"=",'value'=>"1"));
$generalMarket = getGeneralMarket();
$subPropertyType = getPropertySubType();
$subMarketArea = getGeneralSubMarket();
$grossLandBounds = getGrossLandBounds();
$grossBuildingBounds = getGrossBuildingAreaBounds();
$transactionBounds = getTransactionBounds();
$occupancyTypes = getOccupancyTypes();

$title = 'aa Valuation - Improved Sales';
$propertyIcon = array( '../img/mm_20_purple.png', '../img/mm_20_green.png', '../img/mm_20_blue.png', '../img/mm_20_brown.png', '../img/mm_20_red.png', '../img/mm_20_yellow.png', '../img/mm_20_orange.png', '../img/mm_20_white.png' );
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		<?php echo $title; ?>
	</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css"/>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="../css/grid.css"/>
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
	<link rel="icon" href="../img/favicon.ico">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../js/rbe_engine.js"></script>
	<?php include("../../../includes/header.php");?>
	<style>
		#filterlistSearch .search-box {
			min-width: 250px !important;
			min-height: 40px !important;
			background: #8EC548;
			border-radius: 16px 16px 0px 0px;
			-moz-border-radius: 16px 16px 0px 0px;
			-webkit-border-radius: 16px 16px 0px 0px;
			border: 4px solid #1e4959;
			font-family: Calibri;
			font-size: 20px;
			color: #FFFFFF;
			font-weight: bold;
			text-align: center;
		}
		
		#filterlistSearch .custom-bar {
			min-width: 450px !important;
			min-height: 40px !important;
			border-radius: 16px 16px 0px 0px;
			-moz-border-radius: 16px 16px 0px 0px;
			-webkit-border-radius: 16px 16px 0px 0px;
			border-bottom: 4px solid #1e4959;
			background-color: #1e4959;
			text-align: center
		}
		
		#filterlistSearch .custom-bar select {
			width: 400px;
			margin-top: 5px;
			text-align: center;
			color: #000000;
			opacity: 0.75;
		}
		
		#filterlistSearch .cond-group {
			margin: 0px 5px;
			padding: 5px;
			border: dashed 2px #1e4959;
		}
		
		#filterlistSearch .cond-group select {
			padding: 4px;
		}
		
		#filterlistSearch .btn {
			background: #8ec548;
			background-image: -webkit-linear-gradient(top, #8ec548, #8ec548);
			background-image: -moz-linear-gradient(top, #8ec548, #8ec548);
			background-image: -ms-linear-gradient(top, #8ec548, #8ec548);
			background-image: -o-linear-gradient(top, #8ec548, #8ec548);
			background-image: linear-gradient(to bottom, #8ec548, #8ec548);
			-webkit-border-radius: 28;
			-moz-border-radius: 28;
			border-radius: 28px;
			font-family: Arial;
			color: #ffffff;
			font-size: 15px;
			padding: 5px 10px 5px 10px;
			text-decoration: none;
		}
		
		#filterlistSearch.btn:hover {
			background: #3fb44f;
			background-image: -webkit-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -moz-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -ms-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -o-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: linear-gradient(to bottom, #3fb44f, #3fb44f);
			text-decoration: none;
		}
		
		#filterlistSearch .btn_se {
			background: #8ec548;
			background-image: -webkit-linear-gradient(top, #8ec548, #8ec548);
			background-image: -moz-linear-gradient(top, #8ec548, #8ec548);
			background-image: -ms-linear-gradient(top, #8ec548, #8ec548);
			background-image: -o-linear-gradient(top, #8ec548, #8ec548);
			background-image: linear-gradient(to bottom, #8ec548, #8ec548);
			-webkit-border-radius: 28;
			-moz-border-radius: 28;
			border-radius: 28px;
			font-family: Arial;
			color: #ffffff;
			font-size: 11px;
			padding: 5px 10px 5px 10px;
			text-decoration: none;
		}
		
		#filterlistSearch .btn_se:hover {
			background: #3fb44f;
			background-image: -webkit-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -moz-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -ms-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -o-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: linear-gradient(to bottom, #3fb44f, #3fb44f);
			text-decoration: none;
		}
		
		#filterlistSearch #searchFilters {
			clear: both;
		}
		
		#filterlistSearch .conditionBlock {
			margin: 0px 5px;
			padding: 5px;
			/*			border: dashed 2px #1e4959;*/
			display: table;
		}
		
		#filterlistSearch .searchRow {
			clear: both;
			display: table-row;
		}
		
		#filterlistSearch .filters {
			display: table-cell;
		}
		
		#filterlistSearch .filters .form-control {
			float: left;
			width: 220px;
		}
		
		#filterlistSearch #selectScheme {
			width: 94% !important;
		}
		
		#filterlistSearch [data-filter=operator] {
			float: left;
			width: 80px !important;
		}
		
		#filterlistSearch [data-filter=condition] {
			float: left;
			width: 80px !important;
		}
		
		#filterlistSearch .acb {
			float: left;
		}
		
		#filterlistSearch #searchPanel {
			clear: both;
		}
		
		#filterlistSearch .newCondition {
			float: left;
		}
		table.display {
			margin: 7px;
			border: 1px solid #d8cebe;
			padding: 4px;
			border-spacing: 0;
			border-collapse: collapse
		}
		
		table.display tr {
			background-color: #FFFFFF;
		}
		
		table.display td,
		table.display th {
			border: 1px solid #AAAAAA;
			padding: 3px 2px;
		}
		/*		table.display tr:nth-child(even) {
			background: #D0E4F5;
		}*/
		
		table.display thead {
			background: #F0E4EF;
			background: -moz-linear-gradient(top, #f4ebf3 0%, #f1e6f0 66%, #F0E4EF 100%);
			background: -webkit-linear-gradient(top, #f4ebf3 0%, #f1e6f0 66%, #F0E4EF 100%);
			background: linear-gradient(to bottom, #f4ebf3 0%, #f1e6f0 66%, #F0E4EF 100%);
			border-bottom: 2px solid #444444;
		}
		
		table.display thead th {
			font-family: Calibri;
			font-size: 14px;
			font-weight: normal;
			color: #000000;
			border-left: 2px solid #FFFFFF;
			padding: 3px 2px;
		}
		
		table.display thead th:first-child {
			border-left: none;
		}
	.blended_grid{
		display : block;
		width : 420px;
		overflow : auto;
		margin-top: 5px;
		margin-right: 5px;
		margin-left: 5px;
		margin-bottom: 5px;
	}
	.topBanner{
		background-color : #1e4959;
		color: white;
		float : left;
		clear : none;
		width : 420px;
	}
	.leftColumn{
		margin-left: 5px;
		margin-top: 5px;
		float : left;
		clear : none;
		width : 180px;
	}
	.feedHost{
		background-color : #8ec548;
		float : right;
		clear : none;        
        padding: 5px;
		min-width : 200px;
		min-height : 170px !important;
	}
	.feed_item {
		float : none;
		clear : both;
		width : 180px;
        font-weight: bold;
	}
    </style>
	<?php
	$imptqry = "select id, templatename, templatepath from templates where tformat = 1 and category = 'improved' order by id ASC";
	$result = mysqli_query( $conn, $imptqry );
	$wordTemplateDataSource = array();
	while ( $improvedtemplate = mysqli_fetch_array( $result ) ) {
		$wordTemplateDataSource[] = array( "definition" => $improvedtemplate[ 'templatename' ], "id" => $improvedtemplate[ 'templatepath' ] );
	}

	$impexqry = "select id, templatename, templatepath from templates where tformat = 2 and category = 'improved' order by id ASC";
	$result = mysqli_query( $conn, $impexqry );
	$excelTemplateDataSource = array();
	while ( $impextemplate = mysqli_fetch_array( $result ) ) {
		$excelTemplateDataSource[] = array( "definition" => $impextemplate[ 'templatename' ], "id" => $impextemplate[ 'templatepath' ] );
	}

	?>
	<?php
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldStructure.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataFormat.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataSourceStructure.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_tableStructure.php" );

	$xml = file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/ImprovedSearchFields.xml" );
	$xml = simplexml_load_string( $xml );
	$json = json_encode( $xml );
	$data = json_decode( $json );

	$tables = array();
	for ( $i = 1; $i < count( $data->Worksheet[ 0 ]->Table->Row ); $i++ ) {
		if ( is_array( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell ) ) {
			$fieldStructure = new aa_fieldStructure();
			$fieldDataFormat = new aa_fieldDataFormat();
			$fieldStructure->setDataFormat( $fieldDataFormat );
			$fieldStructure->setField( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 2 ]->Data );
			$fieldStructure->setVisibility( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 3 ]->Data );
			$fieldStructure->setFieldName( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 4 ]->Data );
			$fieldStructure->setDataType( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 5 ]->Data );
			if ( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 5 ]->Data == "Dropdown" ) {
				if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ] ) ) {
					$fieldDataSourceStructure = new aa_fieldDataSourceStructure();

					$fieldDataSourceStructure->setTableName( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data );
					$fieldDataSourceStructure->setFunctionName( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data );
					//$fieldDataSourceStructure->setConnectionField($data->Worksheet[0]->Table->Row[$i]->Cell[6]->Data->Row->Cell[4]->Data);
					$fieldDataSourceStructure->setValue( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data );
					$fieldDataSourceStructure->setText( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data );

					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchMethod( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data );
					}
					
					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchOperator( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data );
					}
					
					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchValue( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data );
					}
					
					$fieldStructure->setDataSource( $fieldDataSourceStructure );
				}

			} else {
				if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ] ) ) {
					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setPrefix( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data );
					}

					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setComma( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data );
					}

					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setDecimals( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data );
					}

					if ( isset( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data ) && !is_object( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setSuffix( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data );
					}
				}
			}

			if ( !isset( $tables[ $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 0 ]->Data ] ) ) {
				$fields = array();
				$fields[] = $fieldStructure;
				$tableStructure = new aa_tableStructure();
				$tableStructure->setTable( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 0 ]->Data );
				$tableStructure->setTableName( $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 1 ]->Data );
				$tableStructure->setFields( $fields );
				$tables[ $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 0 ]->Data ] = $tableStructure;

			} else {
				$tables[ $data->Worksheet[ 0 ]->Table->Row[ $i ]->Cell[ 0 ]->Data ]->addField( $fieldStructure );
			}
		}
	}
	?>	
	<?php
	include( "../../../includes/connect.php" );
	$stmt = $conn->prepare('select * from report where FK_ReportTypeID = 2 and IsDeleted = 0;');
	$stmt->execute();
	$stmt->store_result();
	$count = $stmt->num_rows;
	$count = number_format($count);
	mysqli_close($conn);
	?>
	<div id="propdiv">
		<div id="gridlist" class="toggleMe" style='overflow:scroll; height:100%;'>
			<table width="100%" border="1" id="comps" class="display table _table">
				<thead>
					<tr>
						<th width="25px"></th>
						<th width="25px"></th>
						<th width="25px"></th>
						<th style='width: 200px;'>Property Name<br/>Address</th>
						<th style='width: 100px;'>City<br/>Submarket</th>
						<th style='width: 100px;'>Property Type<br/>Subtype</th>
						<th style='text-align:center;'>Year Built<br/>(Renovated)</th>
						<th style='text-align:center;'>Total GBA (SF)<br/>Const. Desc.</th>
						<th style='text-align:center;'>Parking Ratio<br/># of Stories</th>
						<th style='text-align:center;'>Recording Date<br/>Sale Status</th>
						<th style='text-align:center;'>Adj. $ / SF<br/>NRA / GLA</th>
						<th style='text-align:center;'>% Office<br/>Build-out</th>
						<th style='text-align:center;'>$ &#47; Unit</th>
						<th style='text-align:center;'>SCR</th>
						<th style='text-align:center;'>Cap Rate</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div id="map" class="toggleMe"></div>
	</div>
	<div id="filterlist">

	</div>
	<div id="filterlistSearch" style='display: none; position: absolute; z-index: 9999; top: 62px; left: 5px; width: 79%; clear: both; height: auto; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #3fb44f; background-color:#FFFFFF;'>
		<div class='col-3 search-box' style="position: relative; float: left;">
			ADVANCED SEARCH
		</div>
		<div class="col-4 custom-bar" style="position: relative; float: left;">

		</div>
	</div>
	<script type="text/javascript" src="../js/aa_engine.js"></script>
	<script type="text/javascript" src="../js/rbe_engine.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_layout.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_renderer.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_propertyType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_subPropertyType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_reportType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_generalMarket.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_subMarket.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_grossLandArea.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_netLandAreaSF.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_grossBuildingArea.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_netRentableArea.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_yearBuild.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_salesPrice.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_salesRecord.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_adjPriceSFGba.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_capRate.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_occupancyType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_mapDrawingTools.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_advancedSearch.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_wordTemplateSelect.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_wordTemplate.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_excelTemplateSelect.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_excelTemplate.js"></script>

	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_button.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_select.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_mselect.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_input.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_textarea.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_inputBounds.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_checkbox.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_searchEngine.js"></script>

	<link href="../css/lightbox.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/lightbox.js"></script>
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyBmAGJsGHDcILArqDVkwl0co2yu8tHhx-g"></script>
	<script>
		(function (factory) {
				if (typeof define === "function" && define.amd) {
					define(["jquery", "moment", "datatables.net"], factory);
				} else {
					factory(jQuery, moment);
				}
			}(function ($, moment) {
				$.fn.dataTable.moment = function ( format, locale ) {
					var types = $.fn.dataTable.ext.type;
					
					// Add type detection
					types.detect.unshift( function ( d ) {
						if(d.indexOf("<br>")!=-1){
							d = d.split("<br>");
							d = d[0]+"</font>";
						}
						if ( d ) {
							// Strip HTML tags and newline characters if possible
							if ( d.replace ) {
								d = d.replace(/(<.*?>)|(\r?\n|\r)/g, '');
							}
							// Strip out surrounding white space
							d = $.trim( d );
						}
						// Null and empty values are acceptable
						if ( d === '' || d === null ) {
							return 'moment-'+format;
						}
						if(d=="null" || d=="0/0/0000"){
							d = "1/1/1970";
						}
						return moment( d, format, locale, true ).isValid() ?
							'moment-'+format :
							null;
					} );

					// Add sorting method - use an integer for the sorting
					types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
						if(d.indexOf("<br>")!=-1){
							d = d.split("<br>");
							d = d[0]+"</font>";
						}
						if ( d ) {
							// Strip HTML tags and newline characters if possible
							if ( d.replace ) {
								d = d.replace(/(<.*?>)|(\r?\n|\r)/g, '');
							}
							// Strip out surrounding white space
							d = $.trim( d );
						}
						if(d=="null" || d=="0/0/0000"){
							d = "1/1/1970";
						}
						return !moment(d, format, true).isValid() ?
							Infinity :
							parseInt( moment( d, format, true ).format( 'x' ), 10 );
					};
				};
		}));
		var styles = [ {
			featureType: 'water',
			stylers: [ {
				color: '#19a0d8'
			} ]
		}, {
			featureType: 'administrative',
			elementType: 'labels.text.stroke',
			stylers: [ {
				color: '#ffffff'
			}, {
				weight: 6
			} ]
		}, {
			featureType: 'administrative',
			elementType: 'labels.text.fill',
			stylers: [ {
				color: '#e85113'
			} ]
		}, {
			featureType: 'road.highway',
			elementType: 'geometry.stroke',
			stylers: [ {
				color: '#efe9e4'
			}, {
				lightness: -40
			} ]
		}, {
			featureType: 'transit.station',
			stylers: [ {
				weight: 9
			}, {
				hue: '#e85113'
			} ]
		}, {
			featureType: 'road.highway',
			elementType: 'labels.icon',
			stylers: [ {
				visibility: 'off'
			} ]
		}, {
			featureType: 'water',
			elementType: 'labels.text.stroke',
			stylers: [ {
				lightness: 100
			} ]
		}, {
			featureType: 'water',
			elementType: 'labels.text.fill',
			stylers: [ {
				lightness: -100
			} ]
		}, {
			featureType: 'poi',
			elementType: 'geometry',
			stylers: [ {
				visibility: 'on'
			}, {
				color: '#f0e4d3'
			} ]
		}, {
			featureType: 'road.highway',
			elementType: 'geometry.fill',
			stylers: [ {
				color: '#efe9e4'
			}, {
				lightness: -25
			} ]
		} ];
		$( function () {
			aa_map_tpl_subPropertyType = new _aa_map_tpl_subPropertyType( {
				controller: "aa_map_tpl_subPropertyType",
				dataSource: <?php echo json_encode($subPropertyType,JSON_UNESCAPED_UNICODE); ?>,
				reportTypeID: 2,
				layout: {
					tag: "_propertyType"
				}
			} );
			aa_map_tpl_propertyType = new _aa_map_tpl_propertyType( {
				controller: "aa_map_tpl_propertyType",
				translations: {
					"title": ""
				},
				dataSource: <?php echo json_encode($propertyType,JSON_UNESCAPED_UNICODE); ?>,
				connectedTemplate: aa_map_tpl_subPropertyType,
				layout: {
					tag: "_propertyType"
				}
			} );
			aa_map_tpl_reportType = new _aa_map_tpl_reportType( {
				dataSource: {
					value: 2
				},
				layout: {
					tag: "_propertyType"
				}
			} );
			aa_map_tpl_subMarket = new _aa_map_tpl_subMarket( {
				controller: "aa_map_tpl_subMarket",
				dataSource: <?php echo json_encode($subMarketArea,JSON_UNESCAPED_UNICODE); ?>,
				layout: {
					tag: "_generalMarket"
				}
			} );
			aa_map_tpl_generalMarket = new _aa_map_tpl_generalMarket( {
				controller: "aa_map_tpl_generalMarket",
				translations: {
					"title": ""
				},
				dataSource: <?php echo json_encode($generalMarket,JSON_UNESCAPED_UNICODE); ?>,
				connectedTemplate: aa_map_tpl_subMarket,
				layout: {
					tag: "_generalMarket"
				}
			} );
			aa_map_tpl_netLandAreaSF = new _aa_map_tpl_netLandAreaSF( {
				controller: "aa_map_tpl_netLandAreaSF",
				translations: {
					"title": "Net Land Area (SF)"
				},
				dataSource: {
					title: "Net Land Area (SF)",
					min: "<?php echo $grossLandBounds[0]['net_usable_sf_min']; ?>",
					max: "<?php echo $grossLandBounds[0]['net_usable_sf_max']; ?>"
				},
				layout: {
					tag: "_property"
				}
			} );
			aa_map_tpl_grossBuildingArea = new _aa_map_tpl_grossBuildingArea( {
				controller: "aa_map_tpl_grossBuildingArea",
				translations: {
					"title": "Gross Building Area (SF)"
				},
				dataSource: {
					title: "Gross Building Area (SF)",
					min: "<?php echo $grossBuildingBounds[0]['overall_gba_min']; ?>",
					max: "<?php echo $grossBuildingBounds[0]['overall_gba_min']; ?>"
				},
				layout: {
					tag: "_property"
				}
			} );
			aa_map_tpl_netRentableArea = new _aa_map_tpl_netRentableArea( {
				controller: "aa_map_tpl_netRentableArea",
				translations: {
					"title": "Net Rentable Area (SF)"
				},
				dataSource: {
					title: "Net Rentable Area (SF)",
					min: "<?php echo $grossBuildingBounds[0]['overall_nra_min']; ?>",
					max: "<?php echo $grossBuildingBounds[0]['overall_nra_max']; ?>"
				},
				layout: {
					tag: "_property"
				}
			} );
			aa_map_tpl_yearBuild = new _aa_map_tpl_yearBuild( {
				controller: "aa_map_tpl_yearBuild",
				translations: {
					"title": "Year Built"
				},
				dataSource: {
					title: "Year Built",
					min: <?php echo $grossBuildingBounds[0]['year_built_search_min']; ?>,
					max: <?php echo $grossBuildingBounds[0]['year_built_search_max']; ?>
				},
				layout: {
					tag: "_property"
				}
			} );
			aa_map_tpl_salesPrice = new _aa_map_tpl_salesPrice( {
				controller: "aa_map_tpl_salesPrice",
				translations: {
					"title": "Sale Price"
				},
				dataSource: {
					title: "Sale Price",
					min: "<?php echo $transactionBounds[0]['sale_price_min']; ?>",
					max: "<?php echo $transactionBounds[0]['sale_price_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_salesRecord = new _aa_map_tpl_salesRecord( {
				controller: "aa_map_tpl_salesRecord",
				translations: {
					"title": "Sale Recording Date"
				},
				dataSource: {
					title: "Sale Recording Date",
					min: <?php echo $transactionBounds[0]['record_date_min']; ?>,
					max: <?php echo $transactionBounds[0]['record_date_max']; ?>
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_adjPriceSFGba = new _aa_map_tpl_adjPriceSFGba( {
				controller: "aa_map_tpl_adjPriceSFGba",
				translations: {
					"title": "Adj Price SF GBA"
				},
				dataSource: {
					title: "Adj Price SF GBA",
					min: "<?php echo $transactionBounds[0]['adj_price_sf_gba_min']; ?>",
					max: "<?php echo $transactionBounds[0]['adj_price_sf_gba_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_capRate = new _aa_map_tpl_capRate( {
				controller: "aa_map_tpl_capRate",
				translations: {
					"title": "Cap Rate &#37;"
				},
				dataSource: {
					title: "Cap Rate &#37;",
					min: "<?php echo $transactionBounds[0]['cap_rate_min']; ?>",
					max: "<?php echo $transactionBounds[0]['cap_rate_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_occupancyType = new _aa_map_tpl_occupancyType( {
				controller: "aa_map_tpl_occupancyType",
				translations: {
					"title": "Occupancy Type"
				},
				dataSource: {
					"title": "Occupancy Type",
					"Select": "Select",
					options: <?php echo json_encode($occupancyTypes,JSON_UNESCAPED_UNICODE); ?>
				},
				layout: {
					tag: "_property"
				}
			} );

			aa_map_tpl_mapDrawingTools = new _aa_map_tpl_mapDrawingTools( {
				controller: "aa_map_tpl_mapDrawingTools",
				translations: {
					"title": "Polygon Search"
				},
				dataSource: {
					"title": "Polygon Search",
				},
				layout: {
					tag: "_tools"
				}
			} );

			aa_map_tpl_advancedSearch = new _aa_map_tpl_advancedSearch( {
				controller: "aa_map_tpl_advancedSearch",
				translations: {
					"title": "Advanced Search"
				},
				dataSource: {
					"title": "Advanced Search",
				},
				layout: {
					tag: "_tools"
				}
			} );

			aa_map_tpl_wordTemplateSelect = new _aa_map_tpl_wordTemplateSelect( {
				controller: "aa_map_tpl_wordTemplateSelect",
				translations: {
					"title": "Comp Write-up(s)"
				},
				dataSource: {
					"title": "Comp Write-up(s)",
					"Select": "Select",
					options: <?php echo json_encode($wordTemplateDataSource,JSON_UNESCAPED_UNICODE);?>
				},
				layout: {
					tag: "_tools"
				}
			} );

			aa_map_tpl_wordTemplate = new _aa_map_tpl_wordTemplate( {
				controller: "aa_map_tpl_wordTemplate",
				translations: {
					"title": "Select"
				},
				dataSource: {
					"title": "Merge Word Comp(s)",
//					"title": "Select",
				},
				layout: {
					tag: "_tools"
				},
				templatePath: "improved_sales"
			} );

			aa_map_tpl_excelTemplateSelect = new _aa_map_tpl_excelTemplateSelect( {
				controller: "aa_map_tpl_excelTemplateSelect",
				translations: {
					"title": "Excel Chart(s)"
				},
				dataSource: {
					"title": "Excel Chart(s)",
					"Select": "Select",
					options: <?php echo json_encode($excelTemplateDataSource,JSON_UNESCAPED_UNICODE);?>
				},
				layout: {
					tag: "_tools"
				}
			} );

			aa_map_tpl_excelTemplate = new _aa_map_tpl_excelTemplate( {
				controller: "aa_map_tpl_excelTemplate",
				translations: {
					"title": "Select"
				},
				dataSource: {
					"title": "Merge Excel Comp(s)",
//					"title": "Select"
				},
				layout: {
					tag: "_tools"
				},
				templatePath: "minexcelimp"
			} );

			aa_map_layout = new _aa_map_layout( {
				layoutTitle: "Improved Sales",
				reccount: "<?php echo $count;?>",
				templates: [ {
						title: "Property Type",
						tag: "_propertyType",
						templates: [ aa_map_tpl_propertyType, aa_map_tpl_subPropertyType, aa_map_tpl_reportType ]
					}, {
						title: "General Market",
						tag: "_generalMarket",
						templates: [ aa_map_tpl_generalMarket, aa_map_tpl_subMarket ]
					}, {
						title: "Property",
						tag: "_property",
						templates: [ aa_map_tpl_netLandAreaSF, aa_map_tpl_grossBuildingArea, aa_map_tpl_netRentableArea, aa_map_tpl_yearBuild, aa_map_tpl_occupancyType ]
					}, {
						title: "Sale Price",
						tag: "_sales",
						templates: [ aa_map_tpl_salesPrice, aa_map_tpl_salesRecord, aa_map_tpl_adjPriceSFGba, aa_map_tpl_capRate ]
					}, {
						title: "Tools",
						tag: "_tools",
						templates: [ aa_map_tpl_mapDrawingTools, aa_map_tpl_wordTemplateSelect, aa_map_tpl_wordTemplate, aa_map_tpl_excelTemplateSelect, aa_map_tpl_excelTemplate ]//aa_map_tpl_advancedSearch, 
					}

				]
			} );


			aa_map = new _aa_map( {
				activeObject: "aa_map",
				mapOptions: [ {
					center: new google.maps.LatLng( 45.3791021, -122.7613788 ),
					zoom: 13,
					styles: styles,
					mapTypeControl: true,
					mapTypeControlOptions: {
						style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
						position: google.maps.ControlPosition.TOP_RIGHT
					},
					mapTypeId: 'roadmap',
					heading: 90,
					tilt: 45,
					controller: "aa_map"
				} ],
				maps: [ document.getElementById( 'map' ) ],
				translations: {
					"error": "Warning",
					"OK": "OK",
					"actionRunning": "action in progress, please wait to finnish current action and try again!",
					"Show Grid": "Show Grid",
					"Show Map": "Show Map",
					"Gross Land Area SF": "Gross Land Area SF",
					"Building Land Area SF": "Gross Building Area SF",
					"Net Rentable Area": "Net Rentable Area",
					"Year Built": "Year Built",
					"Sales Price": "Sale Price",
					"Sales Record": "Sale Recording Date",
					"Adj Price SF GBA": "Adj Price SF GBA",
					"Cap Rate": "Cap Rate",
					"Occupancy Type": "Occupancy Type",
					"Select": "Select"
				},
				useGrid: true,
				gridType: "improved_sales",
				gridTpl: "gridRowImprovedSalesTPL",
				gridOpenScript: "improvedsales",
				mapTypeTitle: "Improve Sales",
				reportTypeID: 2,
				layout: aa_map_layout
			} );
			aa_map.init();


			var selectedData = [];
			var dataSource = [];
			var searchSchemes = [];

			var searchSchemes = [ {
					schemeName: "Property Subtype",
					schemeValue: 1,
					conditions: [ {
							conditions: [ {
								"table": {"value": "property"},
								"field": {"value": "propertysubtype"},
								"operator": false,
								"value1": {"data-field-data-type": "dropdown","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "building"},
								"field": {"value": "overall_nra"},
								"operator": {"value": ">="},
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "building"},
								"field": {"value": "year_built_search"},
								"operator": {"value": ">="},
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "saletrans"},
								"field": {"value": "adj_price_sf_nra"},
								"operator": {"value": ">="},
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "saletrans"},
								"field": {"value": "record_date"},
								"operator": {"value": ">="},
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "property"},
								"field": {"value": "county"},
								"operator": false,
								"value1": {"data-field-data-type": "varchar","value": [""]},
								"value2": false,
								"condition": false,
							} ],
							jsoin: false
						}]
				}, {
					schemeName: "General Property Type",
					schemeValue: 2,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertytype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "overall_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "year_built_search"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_sf_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "record_date"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "varchar","value": [ "" ]},
							"value2": false,
							"condition": false,
						} ],
						join: false
					} ]
				}, {
					schemeName: "Property Subtype / Cap Rate",
					schemeValue: 3,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertysubtype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "overall_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "year_built_search"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_sf_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "record_date"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "cap_rate"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "varchar","value": [""]},
							"value2": false,
							"condition": false,
						} ],
						join: false
					} ]
				}, {
					schemeName: "Property Type / Cap Rate",
					schemeValue: 4,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertytype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "overall_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "year_built_search"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_sf_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "record_date"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "cap_rate"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "varchar","value": [""]},
							"value2": false,
							"condition": false,
						} ],
						join: false
					} ]
				}, {
					schemeName: "Indutrial Property / Site Coverage Ratio",
					schemeValue: 5,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertytype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 3},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "year_built_search"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "overall_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},

						}, {
							"table": {"value": "building"},
							"field": {"value": "site_cover_overall"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "record_date"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "varchar","value": [""]},
							"value2": false,
							"condition": false,
						} ],
						join: false
					} ]
				}, {
					schemeName: "Industrial - Flex / Office Build-out",
					schemeValue: 6,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertytype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "year_built_search"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "building"},
							"field": {"value": "overall_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "proptypedetails"},
							"field": {"value": "ind_pct_office"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_sf_nra"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "record_date"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "varchar","value": [ "" ]},
							"value2": false,
							"condition": false,
						} ],
						join: false
					} ]
				}];

			aa_searchEngine = new _aa_searchEngine( {
				activeObject: "aa_searchEngine",
				translations: {
					"error": "Warning",
					"OK": "OK",
					"actionRunning": "action in progress, please wait to finnish current action and try again!"
				},
				tableData: <?php echo json_encode($tables); ?>,
				reportTypeID: [ 2 ],
				defaultSchemes: searchSchemes,
				map: aa_map,
				mainContainer: "filterlistSearch",
				ajaxURL: "maps/ajax_advancedsearch.php",
				filterMatch: {propertytype:"ptid",genmarket:"gmid",propertysubtype:"ptsid",submarkid:"sbmid",net_usable_sf:["netLandAreaSFFrom","netLandAreaSFTo"],overall_gba:["overallGbaFrom","overallGbaTo"],net_usable_sf:["overallNraFrom","overallNraTo"],year_built_search:["yearBuiltFrom","yearBuiltTo"],sale_price:["salesPriceFrom","salesPriceTo"],record_date:["saledateFrom","saledateTo"],adj_price_sf_gba:["adjPriceSfGbaFrom","adjPriceSfGbaTo"],cap_rate:["capRateFrom","capRateTo"]}
			} );
			aa_searchEngine.init();
		} );
	</script>
	<div id="gridRowImprovedSalesTPL" style='display:none;'>
		<!--
<td><input type='checkbox' name='reportid[]' value='reportID_proxy'></td>
    <td><a href='../forms/improvedsales.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>
    <td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:40px; max-width:40px;'></a></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertyname_proxy<br>address_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>city_proxy<br>submarket_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertytype_proxy<br>subtype_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px; text-align: center;'><font family='Calibri' size='2'>year_built_proxy<br>last_renovation_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px; text-align: center;'><font family='Calibri' size='2'>overallgba_proxy<br>const_descr_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; text-align: center;'><font family='Calibri' size='2'>parking_ratio_proxy<br>no_stories_proxy</font></td>
    <td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden; text-align: center;'><font family='Calibri' size='2'>recorddate_proxy<br>sale_status_proxy</font></td>
    <td  style='text-align: center;'><font family='Calibri' size='2'>adj_price_sf_nra_proxy</font></td>
    <td style='text-align: center;'><font family='Calibri' size='2'>ind_pct_office_proxy</font></td>
    <td style='text-align: center;'><font family='Calibri' size='2'>adj_price_unit_proxy</font></td>
    <td style='text-align: center;'><font family='Calibri' size='2'>site_cover_primary_proxy</font></td>
    <td style='text-align: center;'><font family='Calibri' size='2'>caprate_proxy</font></td>
!-->
	</div>
	</body>
</html>