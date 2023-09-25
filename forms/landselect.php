<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
set_time_limit( 120 );
ini_set( 'memory_limit', '512M' );
ini_set( 'max_execution_time', 60 );

include( "../../../includes/check.php" );
$title = 'Search Land Sales';
$tablename = 'land';
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="../DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>	
	<link rel="stylesheet" type="text/css" href="../css/grid.css"/>
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/lightbox.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	<script type="text/javascript" src="../js/rbe_engine.js"></script>
	    <style>
		.search-box {
			min-width: 250px !important;
			min-height: 40px !important;
			border-top: 1px solid #96d1f8;
            background: #29452c;
            background: -webkit-gradient(linear, left top, left bottom, from(#3fb44e), to(#29452c));
            background: -webkit-linear-gradient(top, #3fb44e, #29452c);
            background: -moz-linear-gradient(top, #3fb44e, #29452c);
            background: -ms-linear-gradient(top, #3fb44e, #29452c);
            background: -o-linear-gradient(top, #3fb44e, #29452c);
            padding: auto;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
            -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
            box-shadow: rgba(0,0,0,1) 0 1px 0;
            text-shadow: rgba(0,0,0,.4) 0 1px 0;
			font-family: Calibri;
			font-size: 20px;
			color: #FFFFFF;
			font-weight: bold;
            line-height: 38px;
			text-align: center;
		}
		
		.custom-bar {
/*			min-width: 450px !important;*/
			min-height: 40px !important;
			border-top: 1px solid #96d1f8;
            background: #1a3038;
            background: -webkit-gradient(linear, left top, left bottom, from(#1e4959), to(#1a3038));
            background: -webkit-linear-gradient(top, #1e4959, #1a3038);
            background: -moz-linear-gradient(top, #1e4959, #1a3038);
            background: -ms-linear-gradient(top, #1e4959, #1a3038);
            background: -o-linear-gradient(top, #1e4959, #1a3038);
            padding-top: 5.5px;
            padding-right: 5px;
            padding-left: 5px;
            padding-bottom: 5.5px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
            -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
            box-shadow: rgba(0,0,0,1) 0 1px 0;
            text-shadow: rgba(0,0,0,.4) 0 1px 0;
            vertical-align: middle;
		}
        
        .custom-bar select {
            width: 100%;
        }
		
		.togpanel {
/*			min-width: 450px !important;*/
			min-height: 40px !important;
			border-top: 1px solid #96d1f8;
            background: #1a3038;
            background: -webkit-gradient(linear, left top, left bottom, from(#1e4959), to(#1a3038));
            background: -webkit-linear-gradient(top, #1e4959, #1a3038);
            background: -moz-linear-gradient(top, #1e4959, #1a3038);
            background: -ms-linear-gradient(top, #1e4959, #1a3038);
            background: -o-linear-gradient(top, #1e4959, #1a3038);
            padding: auto;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
            -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
            box-shadow: rgba(0,0,0,1) 0 1px 0;
            text-shadow: rgba(0,0,0,.4) 0 1px 0;
			font-family: Calibri;
			font-size: 14px;
			color: #FFFFFF;
			font-weight: bold;
            line-height: 38px;
			text-align: center;
		}
        
        .togpanel a {
            color: #FFFFFF;
            text-decoration: none;
        }
		
		.cond-group {
			margin: 0px 5px;
			padding: 5px;
			border: dashed 2px #1e4959;
		}
		
		.cond-group select {
			padding: 4px;
		}
		
		.btn {
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
		
		.btn:hover {
			background: #3fb44f;
			background-image: -webkit-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -moz-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -ms-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -o-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: linear-gradient(to bottom, #3fb44f, #3fb44f);
			text-decoration: none;
		}
		
		.btn_se {
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
		
		.btn_se:hover {
			background: #3fb44f;
			background-image: -webkit-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -moz-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -ms-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: -o-linear-gradient(top, #3fb44f, #3fb44f);
			background-image: linear-gradient(to bottom, #3fb44f, #3fb44f);
			text-decoration: none;
		}
		
		#searchFilters {
			clear: both;
		}
		
		.conditionBlock {
			margin: 0px 5px;
			padding: 5px;
			display: table;
		}
		
		.searchRow {
			clear: both;
			display: table-row;
		}
		
		.filters {
			display: table-cell;
		}
		
		.filters .form-control {
			float: left;
			width: 220px;
		}
		
		#selectScheme {
/*			width: 94% !important;*/
		}
		
		[data-filter=operator] {
			float: left;
			width: 80px !important;
		}
		
		[data-filter=condition] {
			float: left;
			width: 80px !important;
		}
		
		.acb {
			float: left;
		}
		
		#searchPanel {
			clear: both;
		}
		
		.newCondition {
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
	</style>
	<style>
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
</head>
<?php
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldStructure.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataFormat.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataSourceStructure.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_tableStructure.php" );

$xml = file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/LandsaleSearchFields.xml" );
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
//print_r($tables);

?>

<body>
	<div class="mainpage">
		<img src="../img/loader.gif" style="display: none" id="mapLoader">
		<div class="col-xs-12" id="filterlist" style='width:100%; clear:both; height:auto; margin-bototm:10px; padding-bottom:10px; border-bottom:1px solid #3fb44f;'>
			<div class='col-xs-3 search-box'>
				SEARCH LAND SALES
			</div>
			<div class="col-xs-4 custom-bar">

			</div>
			<div class="col-xs-1 togpanel">
				<a class='toggleSform' data-status='1'>Hide Search</a>
			</div>
			<div id='mapTools' style='display:none;'></div>
		</div>
		<div id='mapFilters' style='display:none;'>
			<input type='hidden' id='northEastLat' data-filter='northEastLat' class='_mapFilter' value='' />
			<input type='hidden' id='northEastLng' data-filter='northEastLng' class='_mapFilter' value='' />
			<input type='hidden' id='southWestLat' data-filter='southWestLat' class='_mapFilter' value='' />
			<input type='hidden' id='southWestLng' data-filter='southWestLng' class='_mapFilter' value='' />
		</div>
        <div id='map-canvas' class="map-canvas"></div>
		Previously selected items will have a check.  Removing the check will remove the item from the database picker.<br />
		<a class="btn" id='addSelectedLinesBtn' style='display:none; clear:both; width: 200px;'>Add Land Sale(s)</a><br />
		<div id="propdiv" style='width:100%; height:auto;'>
			<div id="gridlist" style='overflow:hidden;'>
				<table width="100%" border="1" id="comps" class="display table _table">
					<thead>
						<tr>
							<th></th>
							<th style="width: 60px;"></th>
							<th style="width: 120px;">Property Name<br>Address</th>
							<th style="width: 90px;">City<br>Submarket</th>
							<th style="width: 90px;">Property Type<br>Subtype<br>Zoning Code</th>
							<th style="text-align:center;">Net Usable SF<br>Net Usable Acres</th>
							<th style="text-align:center;">Recording Date<br>Sale Status</th>
							<th style="text-align:center;">Adj. $ / SF<br>Net Land</th>
							<th style="text-align:center;">Adj. $ / SF<br>Max FAR</th>
							<th style="text-align:center;">Unit Density<br>/ Net Area</th>
							<th style="text-align:center;">Bulk Lot Price<br>/ Lot or Unit</th>
							<th style="text-align:center;">Finished<br>Lot Size</th>
							<th style="text-align:center;">Sale Price<br>/ Net Acre</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="../js/aa_engine.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_searchEngine.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_renderer.js"></script>
	<script type="text/javascript" src="../js/mapController.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_button.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_select.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_mselect.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_input.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_textarea.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_inputBounds.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_mapDrawingTools.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=GoogleKey" async></script>
	<script type='text/javascript'>
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

		var selectedData = [];
		var dataSource = [];
		/*var dataSource = bracket?php echo json_encode($jData); ?>;*/
		$( document ).ready( function () {
			var rbe_engine = new _rbe_engine();

			var searchSchemes = [ {
					schemeName: "Commercial - Industrial",
					schemeValue: 1,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertytype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "net_usable_sf"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_sf_net"},
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
						},{
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": false,
							}],
						join: false
						}]
				}, {
					schemeName: "Comm Indust Res FAR",
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
								"table": {"value": "property"},
								"field": {"value": "net_usable_sf"},
								"operator": {"value": ">="},
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": {"value": "and"},
							}, {
								"table": {"value": "saletrans"},
								"field": {"value": "adj_price_sf_far"},
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
								"field": {"value": "city"},
								"operator": false,
								"value1": {"data-field-data-type": "","value": ""},
								"value2": false,
								"condition": false,
							} ],
							jsoin: false
					} ]
				}, {
					schemeName: "Retail Pad Leases & Sales",
					schemeValue: 5,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertysubtype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "property"},
							"field": {"value": "net_usable_sf"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "groundlease"},
							"field": {"value": "gl_rent_begin"},
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
						},{
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": false,
							} ],
						join: false
					} ]
				}, {
					schemeName: "Multi-Family / Single Famaily Raw Land",
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
							"table": {"value": "resland"},
							"field": {"value": "unit_density_net_acre"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "resland"},
							"field": {"value": "sale_price_lot_wo"},
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
						},{
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": false,
							}],
						join: false
					} ]
				}, {
					schemeName: "Bulk Lot Sales - Attach & Detached Lots",
					schemeValue: 5,
					conditions: [ {
						conditions: [ {
							"table": {"value": "property"},
							"field": {"value": "propertysubtype"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 190},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "resland"},
							"field": {"value": "unit_lot_type"},
							"operator": false,
							"value1": {"data-field-data-type": "","value": [ "" ]},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "resland"},
							"field": {"value": "finish_lot_size_sf"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "resland"},
							"field": {"value": "bulk_price_lot"},
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
						},{
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": false,
							} ],
						join: false
					} ]
				}, {
					schemeName: "Agricultural & Rural Land",
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
							"table": {"value": "property"},
							"field": {"value": "net_usable_acre"},
							"operator": {"value": ">="},
							"value1": {"data-field-data-type": "","value": ""},
							"value2": false,
							"condition": {"value": "and"},
						}, {
							"table": {"value": "saletrans"},
							"field": {"value": "adj_price_acre_gross"},
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
						},{
							"table": {"value": "property"},
							"field": {"value": "county"},
							"operator": false,
							"value1": {"data-field-data-type": "dropdown","value": 20},
							"value2": false,
							"condition": false,
							} ],
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
				//selectionsElement: "land_salesIDs",
				reportTypeID: [ 4 ],
				defaultSchemes: searchSchemes,
				gridType: "land_sales",
				gridRowTPL: "gridRowLandSalesTPL",
				renderMap: true,
				useStreetView: false,
				wopener: {
					container: "land_sales_table",
					idsInput: "land_salesIDs",
					cellClasses: [ "selectable", "", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap", "selectable cellNoWrap cellAlignCenter", "selectable cellNoWrap cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter", "selectable cellAlignCenter" ],
					cellMethods: [ "indexCounter", [ "photo1", "thumbnail" ],
						[ "property_name", "address" ],
						[ "city", "submarket" ],
						[ "property_type", "subtype", "zoning_code" ],
						[ "net_usable_sf", "net_usable_acre" ],
						[ "record_date", "sale_status" ], "adj_price_sf_net", "adj_price_sf_far", "unit_density_net_acre", "bulk_price_lot", "finish_lot_size_sf", "adj_price_acre_net"
					]
				}
			} );
			aa_searchEngine.init();
			//
		} );
		//
	</script>
	<div id="gridRowLandSalesTPL" style='display:none;'>
		<!--
	<td><input type='checkbox' value='reportID_proxy' data-id='reportID_proxy'></td>
	<td><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/photo1_proxy'><img src='/cards/comp_images/thumb_proxy' height='32' style='height:32px;'/></a></td>
	<td style='word-wrap:break-word;'><font family='Calibri' size='2'>propertyname_proxy<br>address_proxy</font></td>
	<td><font family='Calibri' size='2'>city_proxy<br>submarket_proxy</font></td>
	<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>property_type_proxy<br>subtype_proxy<br>zoning_code_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>net_usable_sf_proxy<br>net_usable_acre_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>record_date_proxy<br>sale_status_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>adj_price_sf_net_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>adj_price_sf_far_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>unit_density_net_acre_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>bulk_price_lot_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>finish_lot_size_sf_proxy</font></td>
	<td align='center'><font family='Calibri' size='2'>adj_price_acre_net_proxy</font></td>

	!-->
	</div>

</body>

</html>
