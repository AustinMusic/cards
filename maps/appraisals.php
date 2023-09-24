<?php include("../../../includes/check.php"); ?>
<?php
require_once 'function.php';
$propertyType = getPropertyType(array('method'=>"rid1",'operator'=>"=",'value'=>"1"));
$generalMarket = getGeneralMarket();
$subPropertyType = getPropertySubType();
$subMarketArea = getGeneralSubMarket();
$grossLandBounds = getGrossLandBounds();
$transactionBounds = getTransactionBounds();
$DueDateBounds = getDueDateBounds();


$title = 'a-Appraisal - Appraisal Reports';
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
<link rel="icon" href="../img/favicon.ico">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="../css/grid.css"/>
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> 
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../js/rbe_engine.js"></script>
	<script type="text/javascript" src="../js/rbe_activityController.js"></script>

	<?php include("../../../includes/header.php");?>
	<?php
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldStructure.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataFormat.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_fieldDataSourceStructure.php" );
	require( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/aa_searchEngine/aa_tableStructure.php" );

	$xml = file_get_contents( $_SERVER[ 'DOCUMENT_ROOT' ] . "/cards/forms/AppReportsFields.xml" );
	$xml = simplexml_load_string( $xml );
	$json = json_encode( $xml );
	$data = json_decode( $json );
	$tables = array();
	
	for ( $i = 1; $i < count( $data->Worksheet->Table->Row ); $i++ ) {
		if ( is_array( $data->Worksheet->Table->Row[ $i ]->Cell ) ) {
			$fieldStructure = new aa_fieldStructure();
			$fieldDataFormat = new aa_fieldDataFormat();
			$fieldStructure->setDataFormat( $fieldDataFormat );
			$fieldStructure->setField( $data->Worksheet->Table->Row[ $i ]->Cell[ 2 ]->Data );
			$fieldStructure->setVisibility( $data->Worksheet->Table->Row[ $i ]->Cell[ 3 ]->Data );
			$fieldStructure->setFieldName( $data->Worksheet->Table->Row[ $i ]->Cell[ 4 ]->Data );
			$fieldStructure->setDataType( $data->Worksheet->Table->Row[ $i ]->Cell[ 5 ]->Data );
			if ( $data->Worksheet->Table->Row[ $i ]->Cell[ 5 ]->Data == "Dropdown" ) {
				if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ] ) ) {
					$fieldDataSourceStructure = new aa_fieldDataSourceStructure();

					$fieldDataSourceStructure->setTableName( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data );
					$fieldDataSourceStructure->setFunctionName( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data );
					//$fieldDataSourceStructure->setConnectionField($data->Worksheet[0]->Table->Row[$i]->Cell[6]->Data->Row->Cell[4]->Data);
					$fieldDataSourceStructure->setValue( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data );
					$fieldDataSourceStructure->setText( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data );

					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchMethod( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 4 ]->Data );
					}
					
					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchOperator( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 5 ]->Data );
					}
					
					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data ) ) {
						$fieldDataSourceStructure->setSearchValue( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 6 ]->Data );
					}
					
					$fieldStructure->setDataSource( $fieldDataSourceStructure );
				}

			} else {
				if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ] ) ) {
					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setPrefix( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 0 ]->Data );
					}

					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setComma( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 1 ]->Data );
					}

					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setDecimals( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 2 ]->Data );
					}

					if ( isset( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data ) && !is_object( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data ) ) {
						$fieldStructure->getDataFormat()->setSuffix( $data->Worksheet->Table->Row[ $i ]->Cell[ 6 ]->Data->Row->Cell[ 3 ]->Data );
					}
				}
			}

			if ( !isset( $tables[ $data->Worksheet->Table->Row[ $i ]->Cell[ 0 ]->Data ] ) ) {
				$fields = array();
				$fields[] = $fieldStructure;
				$tableStructure = new aa_tableStructure();
				$tableStructure->setTable( $data->Worksheet->Table->Row[ $i ]->Cell[ 0 ]->Data );
				$tableStructure->setTableName( $data->Worksheet->Table->Row[ $i ]->Cell[ 1 ]->Data );
				$tableStructure->setFields( $fields );
				$tables[ $data->Worksheet->Table->Row[ $i ]->Cell[ 0 ]->Data ] = $tableStructure;

			} else {
				$tables[ $data->Worksheet->Table->Row[ $i ]->Cell[ 0 ]->Data ]->addField( $fieldStructure );
			}

		}
	}
	?>
	<?php
	include( "../../../includes/connect.php" );
	$stmt = $conn->prepare('select * from report where FK_ReportTypeID = 1 and IsDeleted = 0;');
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
						<th data-sort-method='none' style="width: 25px;"></th>
						<th data-sort-method='none' style="width: 25px;"></th>
						<th style='width: 120px;'>Name</th>
						<th style='width: 250px;'>Property Name<br/>Address</th>
						<th style='width: 150px;'>City, State<br/>Submarket</th>						
						<th style='width: 120px;'>County<br/>Zip Code</th>
						<th style='width: 120px;'>Property Type<br/>Subtype</th>
						<th style='text-align:center;'>Zoning<br>Code</th>
						<th style='text-align:center;'>Client<br>Due Date</th>
						<th style='text-align:center;'>Assigned To</th>
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
	<script type="text/javascript" src="../js/aa_map/aa_map.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_layout.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_renderer.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_propertyType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_subPropertyType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_reportType.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_generalMarket.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_subMarket.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_grossLandArea.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_pendingSalePrice.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_DueDate.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_report.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_client.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_property.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_mapDrawingTools.js"></script>
	<script type="text/javascript" src="../js/aa_map/aa_map_tpl_advancedSearch.js"></script>

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
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyBmAGJsGHDcILArqDVkwl0co2yu8tHhx-g" defer></script>

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
				reportTypeID: 1,
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
					value: 1
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
			aa_map_tpl_grossLandArea = new _aa_map_tpl_grossLandArea( {
				controller: "aa_map_tpl_grossLandArea",
				translations: {
					"title": "Gross Land Area"
				},
				dataSource: {
					title: "Gross Land Area",
					min: "<?php echo $grossLandBounds[0]['gross_land_sf_min']; ?>",
					max: "<?php echo $grossLandBounds[0]['gross_land_sf_max']; ?>"
				},
				layout: {
					tag: "_property"
				}
			} );
			aa_map_tpl_pendingSalePrice = new _aa_map_tpl_pendingSalePrice( {
				controller: "aa_map_tpl_pendingSalePrice",
				translations: {
					"title": "Pending Sale Price"
				},
				dataSource: {
					title: "Pending Sale Price",
					min: "<?php echo $transactionBounds[0]['list_price_min']; ?>",
					max: "<?php echo $transactionBounds[0]['list_price_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );
			
			aa_map_tpl_DueDate = new _aa_map_tpl_DueDate( {
				controller: "aa_map_tpl_DueDate",
				translations: {
					"title": "Report Date"
				},
				dataSource: {
					title: "Report Date",
					min: "<?php echo $DueDateBounds[0]['DueDate_min']; ?>",
					max: "<?php echo $DueDateBounds[0]['DueDate_max']; ?>"
				},
				layout: {
					tag: "_sales"
				}
			} );

			aa_map_tpl_report = new _aa_map_tpl_report( {
				controller: "aa_map_tpl_report",
				translations: {
					"title": "Report Name"
				},
				dataSource: {
					title: "Report Name",
					id: "",
					FK_ReportTypeID: 1
				},
				layout: {
					tag: "_property"
				}
			} );

			aa_map_tpl_client = new _aa_map_tpl_client( {
				controller: "aa_map_tpl_client",
				translations: {
					"title": "Clients"
				},
				dataSource: {
					title: "Clients",
					cid: "",
					FK_ReportTypeID: 1
				},
				layout: {
					tag: "_tools"
				}
			} );

			aa_map_tpl_propety = new _aa_map_tpl_property( {
				controller: "aa_map_tpl_propety",
				translations: {
					"title": "Property Name"
				},
				dataSource: {
					title: "Property Name",
					pid: "",
					FK_ReportTypeID: 1
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

			aa_map_layout = new _aa_map_layout( {
				layoutTitle: "Appraisals",
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
						templates: [ aa_map_tpl_grossLandArea, aa_map_tpl_report, aa_map_tpl_propety ]
					}, {
						title: "Appraisal Info",
						tag: "_sales",
						templates: [ aa_map_tpl_DueDate, aa_map_tpl_pendingSalePrice ]
					}, {
						title: "Tools",
						tag: "_tools",
						templates: [ aa_map_tpl_mapDrawingTools,  aa_map_tpl_client ]//aa_map_tpl_advancedSearch,
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
					"Reports": "Reports",
					"Client Name": "Client Name",
					"Property Name": "Property Name",
					"Pending Sale Price": "Pending Sale Price"
				},
				useGrid: true,
				gridType: "appraisals",
				gridTpl: "gridRowTPL",
				gridOpenScript: "appraisals",
				reportTypeID: 1,
				layout: aa_map_layout
			} );
			aa_map.init();


			var selectedData = [];
			var dataSource = [];
			var searchSchemes = [];
			aa_searchEngine = new _aa_searchEngine( {
				activeObject: "aa_searchEngine",
				translations: {
					"error": "Warning",
					"OK": "OK",
					"actionRunning": "action in progress, please wait to finnish current action and try again!"
				},
				tableData: <?php echo json_encode($tables); ?>,
				selectionsElement: "",
				reportTypeID: [ 1 ],
				defaultSchemes: searchSchemes,
				map: aa_map,
				mainContainer: "filterlistSearch",
				ajaxURL: "maps/ajax_advancedsearch.php",
				filterMatch: {propertytype:"ptid",genmarket:"gmid",propertysubtype:"ptsid",submarkid:"sbmid",gross_land_sf:["grossLandAreaFrom","grossLandAreaTo"],reportname:"reportname",property_name:"propertyname"}//gross_land_sf:["pendingSalePriceFrom","pendingSalePriceTo"],
			} );
			aa_searchEngine.init();
		} );
	</script>
	<div id="gridRowTPL" style='display:none;'>
		<!--
<td><a href='../forms/appraisals.php?id=reportID_proxy' target='_blank'><img src='../img/edit.gif' alt='Edit Record'></a></td>
<td><a style='cursor:pointer;' rel='lightbox[property]' class='thumbnail' href='../comp_images/photo_proxy'><img src='../comp_images/thumbnail_proxy' alt='Subject Photo' class='img-rounded img-responsive' style='width:40px; max-width:40px;'></a></td>
<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>reportname_proxy</font></td>
<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertyname_proxy<br/>address_proxy</font></td>
<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>city_proxy,state_proxy<br/>submarket_proxy</font></td>
<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>county_proxy<br/>zip_code_proxy</font></td>
<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>propertytype_proxy<br/>subtype_proxy</font></td>
<td align="center" style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>zoning_code_proxy</font></td>
<td align="center" style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>client_name_proxy<br/>duedate_proxy</font></td>
<td align="center" style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><font family='Calibri' size='2'>AssignedTo_proxy</font></td>	
!-->
	</div>
	</body>
</html>