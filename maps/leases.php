<?php include("../../../includes/check.php"); ?>
<?php
require_once 'function.php';
$propertyType = getPropertyType(array('method'=>"rid3",'operator'=>"=",'value'=>"1"));
$generalMarket = getGeneralMarket();
$subPropertyType = getPropertySubType();
$subMarketArea = getGeneralSubMarket();
$grossBuildingBounds = getGrossBuildingAreaBounds();
$leaseTransactionBounds = getLeaseTransactionBounds();
$leaseOptions = getLeaseOptions();
$leaseNewRenewal = getLeaseNewRenewal();
$leaseSpacePosition = getLeaseSpacePosition();

$title = 'aa Valuation - Leases';
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
</head>

<body>
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
	$imptqry = "select id, templatename, templatepath from templates where tformat = 1 and category = 'lease' order by id ASC";
	$result = mysqli_query( $conn, $imptqry );
	$wordTemplateDataSource = array();
	while ( $improvedtemplate = mysqli_fetch_array( $result ) ) {
		$wordTemplateDataSource[] = array( "definition" => $improvedtemplate[ 'templatename' ], "id" => $improvedtemplate[ 'templatepath' ] );
	}

	$impexqry = "select id, templatename, templatepath from templates where tformat = 2 and category = 'lease' order by id ASC";
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

	$xml = file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/LeaseSearchFields.xml" );
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
	<!--   <div class="overlay"></div>-->
	<?php
	include( "../../../includes/connect.php" );
	$stmt = $conn->prepare('select * from report where FK_ReportTypeID = 3 and IsDeleted = 0;');
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
						<th style="width: 200px;">Property Name<br/>Address</th>
						<th style="width: 100px;">City<br/>Submarket</th>
						<th style="width: 100px;">Property Type<br/>Subtype</th>
						<th style="text-align: center">Year Built<br/>(Renovated)</th>
						<th style="text-align: center">Overall GBA (SF)<br/>Const. Desc.</th>
						<th style="text-align: center">Start Date<br/>Lessee Name</th>
						<th style="text-align: center">Tenant<br/>Area (SF)</th>
						<th style="text-align: center">Expense<br/>Terms</th>
						<th style="text-align: center">Eff. Rent SF / Mo.<br/>Shell / Office</th>
						<th style="text-align: center">Eff. Rent SF / Mo.<br/>Blended</th>
						<th style="text-align: center">Eff. Rent<br/>SF / Yr.</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div id="map" class="toggleMe"></div>
	</div>
	<div id="filterlist">

	</div>
	<!--<div id="filterlistSearch" style="display: none; position: absolute; z-index: 9999; top: 59px; left: 5px; width: 79%; clear: both; height: auto; margin-bototm: 10px; padding-bottom: 10px; border-bottom: 1px solid #3fb44f; background-color:#3fb44f;">-->
    <div id="filterlistSearch" style="display: none; position: absolute; z-index: 9999; top: 62px; left: 5px; width: 79%; clear: both; height: auto; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #3fb44f; background-color:#FFFFFF;">
<!--		<div class='col-xs-3 search-box'>-->
            <div class='col-3 search-box' style="position: relative; float: left;">
			ADVANCED SEARCH
		</div>
            <div class="col-4 custom-bar"  style="position: relative; float: left;">

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
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_tenantArea.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_leaseTransaction.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_leaseEndTransaction.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_effRentSFYear.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_effRentShell.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_leaseOptions.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_leaseNewRenewal.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_leaseSpacePosition.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_mapDrawingTools.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_advancedSearch.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_wordTemplateSelect.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_wordTemplate.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_excelTemplateSelect.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_excelTemplate.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_yearBuild.js"></script>
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
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=GoogleKey"></script>
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
				reportTypeID: 3,
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
					value: 3
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
			aa_map_tpl_tenantArea = new _aa_map_tpl_tenantArea( {
				controller: "aa_map_tpl_tenantArea",
				translations: {
					"title": "Tenant Area SF"
				},
				dataSource: {
					title: "Tenant Area SF",
					min: "<?php echo $leaseTransactionBounds[0]['tenant_sf_min']; ?>",
					max: "<?php echo $leaseTransactionBounds[0]['tenant_sf_max']; ?>"
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
			aa_map_tpl_leaseTransaction = new _aa_map_tpl_leaseTransaction( {
				controller: "aa_map_tpl_leaseTransaction",
				translations: {
					"title": "Lease Start Date"
				},
				dataSource: {
					title: "Lease Start Date",
					min: "<?php echo $leaseTransactionBounds[0]['lease_start_date_min']; ?>",
					max: "<?php echo $leaseTransactionBounds[0]['lease_start_date_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_leaseEndTransaction = new _aa_map_tpl_leaseEndTransaction( {
				controller: "aa_map_tpl_leaseEndTransaction",
				translations: {
					"title": "Lease End Date"
				},
				dataSource: {
					title: "Lease End Date",
					min: "<?php echo $leaseTransactionBounds[0]['lease_end_date_min']; ?>",
					max: "<?php echo $leaseTransactionBounds[0]['lease_end_date_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_effRentSFYear = new _aa_map_tpl_effRentSFYear( {
				controller: "aa_map_tpl_effRentSFYear",
				translations: {
					"title": "Eff. Rent / SF / Year"
				},
				dataSource: {
					title: "Eff. Rent / SF / Year",
					min: "<?php echo $leaseTransactionBounds[0]['eff_rent_sf_yr_min']; ?>",
					max: "<?php echo $leaseTransactionBounds[0]['eff_rent_sf_yr_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			aa_map_tpl_effRentShell = new _aa_map_tpl_effRentShell( {
				controller: "aa_map_tpl_effRentShell",
				translations: {
					"title": "Effective Rent / SF / Mo. - Shell"
				},
				dataSource: {
					title: "Effective Rent / SF / Mo. - Shell",
					min: "<?php echo $leaseTransactionBounds[0]['eff_rent_sf_mo_shell_min']; ?>",
					max: "<?php echo $leaseTransactionBounds[0]['eff_rent_sf_mo_shell_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
/*			aa_map_tpl_leaseOptions = new _aa_map_tpl_leaseOptions( {
				controller: "aa_map_tpl_leaseOptions",
				translations: {
					"title": "Lease Options"
				},
				dataSource: {
					title: "Lease Options",
					"Select": "Select",
					options: "php echo json_encode($leaseOptions,JSON_UNESCAPED_UNICODE); ?>"
				},
				layout: {
					tag: "_sales"	
				}
			} );*/
/*			aa_map_tpl_leaseNewRenewal = new _aa_map_tpl_leaseNewRenewal( {
				controller: "aa_map_tpl_leaseNewRenewal",
				translations: {
					"title": "New or Renewal"
				},
				dataSource: {
					title: "New or Renewal",
					"Select": "Select",
					options: php echo json_encode($leaseNewRenewal,JSON_UNESCAPED_UNICODE); ?>
				},
				layout: {
					tag: "_property"
				}
			} );*/
			aa_map_tpl_leaseSpacePosition = new _aa_map_tpl_leaseSpacePosition( {
				controller: "aa_map_tpl_leaseSpacePosition",
				translations: {
					"title": "Space Position"
				},
				dataSource: {
					title: "Space Position",
					"Select": "Select",
					options: <?php echo json_encode($leaseSpacePosition,JSON_UNESCAPED_UNICODE); ?>
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
					"title": "Merge Word Comp(s)"
				},
				layout: {
					tag: "_tools"
				},
				templatePath: "leases"
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
					"title": "Merge Excel Comp(s)"
				},
				layout: {
					tag: "_tools"
				},
				templatePath: "minexcelrent"
			} );


			aa_map_layout = new _aa_map_layout( {
				layoutTitle: "Leases",
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
						templates: [ aa_map_tpl_tenantArea, aa_map_tpl_yearBuild, aa_map_tpl_leaseSpacePosition ]
					}, {
						title: "Lease Information",
						tag: "_sales",
						templates: [ aa_map_tpl_leaseTransaction, aa_map_tpl_leaseEndTransaction, aa_map_tpl_effRentSFYear, aa_map_tpl_effRentShell ]
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
					"Sales Price": "Sales Price",
					"Sales Record": "Sales Record",
					"Adj Price SF GBA": "Adj Price SF GBA",
					"Cap Rate": "Cap Rate",
					"Occupancy Type": "Occupancy Type",
					"Select": "Select",
					"Tenant Area SF": "Tenant Area SF",
					"Lease Start Date": "Lease Start Date",
					"Lease End Date": "Lease End Date",
					"Lease Date": "Lease Date",
					"effRentSFYear": "Eff. Rent / SF / Year",					
					"effRentShell": "Effective Rent / SF / Mo. - Shell",
					"Lease Options": "Lease Options",
					"New or Renewal": "New or Renewal",
					"Space Position": "Space Position"
				},
				useGrid: true,
				gridType: "leases",
				gridTpl: "gridRowLeasesTPL",
				gridOpenScript: "leases",
				mapTypeTitle: "Leases",
				reportTypeID: 3,
				layout: aa_map_layout
			} );
			aa_map.init();


			var selectedData = [];
			var dataSource = [];
			var searchSchemes = [ {
					schemeName:"Property Type / Eff. Rent / SF / Yr",
										schemeValue:1,
										conditions:[
											{
												conditions:[
													{
														"table":{"value":"property"},
														"field":{"value": "propertytype"},
														"operator":false,
														"value1":{"data-field-data-type" : "dropdown","value": 20},
														"value2":false,
														"condition":{"value": "and"},	
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "tenant_area_sf"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "eff_rent_sf_yr"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "lease_start_date"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"property"},
														"field":{"value": "county"},
														"operator":false,
														"value1":{"data-field-data-type" : "varchar","value": [""]},
														"value2":false,
														"condition":false,
													}
												],
												jsoin:false
											}
											
										]
									},
									{
										schemeName:"Property Type / Eff. Rent / SF / Mo",
										schemeValue:2,
										conditions:[
											{
												conditions:[
													{
														"table":{"value":"property"},
														"field":{"value": "propertytype"},
														"operator":{"value":"vin"},
														"value1":{"data-field-data-type" : "dropdown","value": 20},
														"value2":{"value": 5},
														"condition":{"value": "and"},	
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "tenant_area_sf"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "eff_rent_sf_mo_blend"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "lease_start_date"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"property"},
														"field":{"value": "county"},
														"operator":false,
														"value1":{"data-field-data-type" : "varchar","value": [""]},
														"value2":false,
														"condition":false,
													}
												],
												join: false
											}
										]
									},
									{
										schemeName:"Industrial Property - Shell Rate / Year Built",
										schemeValue:3,
										conditions:[
											{
												conditions:[
													{
														"table":{"value":"property"},
														"field":{"value": "propertytype"},
														"operator":false,
														"value1":{"data-field-data-type" : "dropdown","value": 3},
														"value2":false,
														"condition":{"value": "and"},	
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "tenant_area_sf"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "eff_rent_sf_mo_shell"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "lease_start_date"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"building"},
														"field":{"value": "year_built_search"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
													},
													{
														"table":{"value":"property"},
														"field":{"value": "county"},
														"operator":false,
														"value1":{"data-field-data-type" : "varchar","value": [""]},
														"value2":false,
														"condition": false,
													}
												],
												join: false
											}
										]
									},
									{
										schemeName:"Industrial Property - Shell Rate",
										schemeValue:4,
										conditions:[
											{
												conditions:[
													{
														"table":{"value":"property"},
														"field":{"value": "propertytype"},
														"operator":false,
														"value1":{"data-field-data-type" : "dropdown","value": 3},
														"value2":false,
														"condition":{"value": "and"},	
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "tenant_area_sf"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "eff_rent_sf_mo_shell"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"leasetrans"},
														"field":{"value": "lease_start_date"},
														"operator":{"value": ">="},
														"value1":{"data-field-data-type" : "","value": ""},
														"value2":false,
														"condition":{"value": "and"},
														
													},
													{
														"table":{"value":"property"},
														"field":{"value": "county"},
														"operator":false,
														"value1":{"data-field-data-type" : "varchar","value": [""]},
														"value2":false,
														"condition":false,
													}
												],
						join: false
					} ]
				}

			];


			aa_searchEngine = new _aa_searchEngine( {
				activeObject: "aa_searchEngine",
				translations: {
					"error": "Warning",
					"OK": "OK",
					"actionRunning": "action in progress, please wait to finnish current action and try again!"
				},
				tableData: <?php echo json_encode($tables); ?>,
				reportTypeID: [ 3 ],
				defaultSchemes: searchSchemes,
				map: aa_map,
				mainContainer: "filterlistSearch",
				ajaxURL: "maps/ajax_advancedsearch.php",
				filterMatch: {propertytype:"ptid",genmarket:"gmid",propertysubtype:"ptsid",submarkid:"sbmid",tenant_area_sf:["tenantAreaSFFrom","tenantAreaSFTo"],new_renewal:"new_renewal",year_built_search:["yearBuiltFrom","yearBuiltTo"],space_position:"space_position",lease_start_date:"leaseTransactionFrom",lease_end_date:"leaseTransactionTo",eff_rent_sf_yr:["effRentSFYearFrom","effRentSFYearTo"],eff_rent_sf_mo_shell:["effRentShellFrom","effRentShellTo"],lease_options:"lease_options"}	//
			} );
			aa_searchEngine.init();
		} );
	</script>
	<div id="gridRowLeasesTPL" style='display:none;'>
		<!--
	<td><input type='checkbox' name='reportid[]' value='reportID_proxy'></td>
	<td style='cursor:pointer;'><a href='../forms/leases.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>
	<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:40px; max-width:40px;'></a></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertyname_proxy<br>address_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>city_proxy<br>submarket_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertytype_proxy<br>subtype_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;' align='center'><font family='Calibri' size='2'>year_built_proxy<br>last_renovation_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;' align='center'><font family='Calibri' size='2'>overallgba_proxy<br>const_descr_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>lease_start_date_proxy<br>lessee_name_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>tenant_area_sf_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>lease_expense_term_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>eff_rent_sf_mo_shell_proxy<br>eff_rent_sf_mo_office_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>eff_rent_sf_mo_blend_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>eff_rent_sf_yr_proxy</font></td>
	!-->
	</div>
</body>
</html>
