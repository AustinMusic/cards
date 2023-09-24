<?php include("../../../includes/check.php");	?>
<?php $title = 'Admin - Clients' ?>
<?php $tablename = 'clients' ?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

	<title>
		<?php echo $title; ?>
	</title>
	<link rel="icon" href="http://www.aavaluation.com/favicon.ico">
	<link rel="stylesheet" href="../DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lightbox.css" >
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/grid.css"/>
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/lightbox.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	<script src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../js/rbe_engine.js"></script>
	
	<style>
		.search-box {
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
		
		.custom-bar {
			min-width: 450px !important;
			min-height: 40px !important;
			border-radius: 16px 16px 0px 0px;
			-moz-border-radius: 16px 16px 0px 0px;
			-webkit-border-radius: 16px 16px 0px 0px;
			border-bottom: 4px solid #1e4959;
			background-color: #1e4959;
			text-align: center;
		}
		
		.custom-bar select {
			width: 400px;
			margin-top: 5px;
			text-align: center;
			color: #000000;
			opacity: 0.75;
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
			width: 94% !important;
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
</head>

<body>
<?php
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldStructure.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataFormat.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataSourceStructure.php" );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_tableStructure.php" );

$tables = array();
if(is_file($_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/ClientFields.xml")){
	$xml = file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/ClientFields.xml" );
	$xml = simplexml_load_string( $xml );
	$json = json_encode( $xml );
	$data = json_decode( $json );
	
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
}



?>
	<div class="mainpage">
		<img src="../img/loader.gif" style="display: none" id="mapLoader">
		<div class="col-xs-12" id="filterlist" style='width:100%; clear:both; height:auto; margin-bototm:10px; padding-bottom:10px; border-bottom:1px solid #3fb44f;'>
			<div class='col-xs-3 search-box'>
				CLIENTS
			</div>
			<div class="col-xs-4 custom-bar">

			</div>
		</div>Previously selected items will have a check.  Removing the check will remove the item from the database picker.<br />
		<a class="btn" id='addSelectedLinesBtn' style='display:none; clear:both; width: 200px;'>Add Client(s)</a><br />
		<div id="propdiv" style='width:100%; height:auto;'>
			<div id="gridlist" style='overflow:hidden;'>
				<table width="100%" border="1" id="comps" class="display table _table">
					<thead>
						<tr>
							<th style="width: 60px;"></th>
							<th style="width: 150px;">Company</th>
							<th style="width: 100px;">Address</th>
							<th style="width: 100px;">City</th>
							<th style="width: 80px;text-align:center">State</th>
							<th style="width: 100px;text-align:center">Contact Name</th>
							<th style="text-align:center">Email</th>
							<th style="width: 100px;text-align:center">Phone</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/aa_engine.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_searchEngine.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_renderer.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_button.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_select.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_mselect.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_input.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_textarea.js"></script>
	<script type="text/javascript" src="../js/aa_searchEngine/aa_se_tpl_inputBounds.js"></script>
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

			var searchSchemes = [ ];

			aa_searchEngine = new _aa_searchEngine( {
				activeObject: "aa_searchEngine",
				translations: {
					"error": "Warning",
					"OK": "OK",
					"actionRunning": "action in progress, please wait to finnish current action and try again!"
				},
				tableData: <?php echo json_encode($tables); ?>,
				selectionsElement: "clientIDs",
				reportTypeID: [ 0 ],
				ajaxURL: "forms/ajax_clients.php",
				defaultSchemes: searchSchemes,
				gridType: "client",
				gridRowTPL: "gridRowClientTPL",
				wopener: {
					container: "client_table",
					idsInput: "clientIDs",
					cellClasses: [ "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable"],
					cellMethods: [ "indexCounter",
						 "compname" ,
						 "address" ,
						 "city" ,
						 "state" ,
						[ "firstname", "lastname" ],
						 "email" ,
						 "cellphone"
					]
				},
				autoExecSearch:true
			} );
			aa_searchEngine.init();
		} );
	</script>
	<div id="gridRowClientTPL" style='display:none;'>
		<!--
		<td><input type='checkbox' value='id_proxy' data-id='id_proxy'></td>
		<td class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>compname_proxy</font></td>
		<td class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>address_proxy</font></td>	
		<td class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>city_proxy</font></td>
		<td class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>state_proxy</font></td>
		<td class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>firstname_proxy lastname_proxy</font></td>
		<td class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><font family='Calibri' size='2'>email_proxy</font></td>
		<td class='selectable' align='center'><font family='Calibri' size='2'>cellphone_proxy</font></td>
		!-->
	</div>
	<script type='text/javascript'>
		/*var selectedData = [];
		var dataSource = <?php echo json_encode($jData); ?>;
		$( document ).ready( function () {
			$( "#addSelectedLinesBtn" ).attr( "onClick", "addSelectedLines(this);" );
			var telement = document.getElementById( "clients" );
			if ( telement != null && telement != undefined ) {
				var checks = document.querySelectorAll( "tbody >tr >td input[type='checkbox']" );
				for ( var i = 0; i < checks.length; i++ ) {
					checks[ i ].setAttribute( "onClick", "setClient(this);" );
				}
			}

			//get selected clients and select them
			var element = window.opener.document.getElementById( "clientIDs" );
			if ( element != null && element != undefined ) {
				clientIDs = element.value;
				clientIDs = clientIDs.split( "," );
				var telement = document.getElementById( "clients" );
				if ( telement != null && telement != undefined ) {
					var checks = document.querySelectorAll( "tbody >tr >td input[type='checkbox']" );
					for ( var i = 0; i < checks.length; i++ ) {
						var _id = checks[ i ].getAttribute( "data-id" );
						if ( clientIDs.indexOf( _id ) != -1 ) {
							_index = getItemIndexForMethod( dataSource, "id", _id );
							if ( _index != -1 ) {
								checks[ i ].checked = true;
								selectedData.push( dataSource[ _index ] );
							}
						}
					}
				}
			}

			var table = $( '#<?php echo $tablename; ?>' ).DataTable( {
				paging: true,
				pagingType: "full_numbers",
				ColReorder: true,
				RowReorder: true
			} );
		} );

		function getItemIndexForMethod( items, method, value ) {
			for ( var i = 0; i < items.length; i++ ) {
				var item = items[ i ];
				if ( typeof method === 'string' ) {
					if ( item[ method ] != undefined ) {
						if ( item[ method ] == value ) {
							return i;
						}
					}
				} else {
					for ( var j = 0; j < method.length; j++ ) {
						if ( typeof item[ method[ j ] ] === 'object' ) {
							item = item[ method[ j ] ];
						} else {
							if ( item[ method[ j ] ] == value ) {
								return i;
							}
						}
					}
				}
			}
			return -1;
		}

		function setClient( _element ) {
			var _id = _element.getAttribute( "data-id" );
			//console.log(dataSource);
			var index = getItemIndexForMethod( selectedData, "id", _id );
			//console.log(index);
			if ( _element.checked ) {
				if ( index == -1 ) {
					_index = getItemIndexForMethod( dataSource, "id", _id );
					if ( _index != -1 ) {
						selectedData.push( dataSource[ _index ] );
					}
				}
			} else {
				if ( index != -1 ) {
					selectedData.splice( index, 1 );
				}
			}

		}

		function addSelectedLines( _element ) {
			var element = window.opener.document.getElementById( "client_table" );
			if ( element != null && element != undefined ) {
				var parent = element.querySelector( "tbody" );
				var rows = element.querySelectorAll( "tbody >tr" );
				if ( rows != null ) {
					for ( var i = 0; i < rows.length; i++ ) {
						parent.removeChild( rows[ i ] );
					}
				}
				var telement = document.getElementById( "clients" );
				if ( telement != null && telement != undefined ) {
					var clientIDs = [];
					for ( var i = 0; i < selectedData.length; i++ ) {
						var jsonData = selectedData[ i ];
						var row = document.createElement( "tr" );
						row.setAttribute( "id", jsonData.id );
						var html = "";
						html += "<td class='selectable'>" + (i+1) + "</td>";
						html += "<td class='selectable'>" + jsonData.compname + "</td>";
						html += "<td class='selectable'>" + jsonData.firstname + "</td>";
						html += "<td class='selectable'>" + jsonData.lastname + "</td>";
						html += "<td class='selectable'>" + jsonData.cellphone + "</td>";
						html += "<td class='selectable'>" + jsonData.email + "</td>";
						html += "<td class='selectable'>" + jsonData.website + "</td>";
						row.innerHTML = html;
						//add the row element to the parent table
						parent.appendChild( row );
						//write the cleint id ot the cleitns id array
						clientIDs.push(parseInt(jsonData.id));
					}
					//add is to the hidden input
					var element = window.opener.document.getElementById( "clientIDs" );
					if ( element != null && element != undefined ) {
						element.value = clientIDs.join( "," );
					}
					window.opener.assignSelectRowsEvents();
					window.close();
				}
			}
		}*/
	</script>
</body>

</html>