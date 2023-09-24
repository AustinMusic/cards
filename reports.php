<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
set_time_limit( 120 );
ini_set( 'memory_limit', '512M' );
ini_set( 'max_execution_time', 60 );
include( "../../includes/check.php" );
$title = 'L3 Valuation - CARDS - Search Results'
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href="css/bootstrap-4.2.1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css"/>
    <link rel="stylesheet" href="DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="js/rbe_engine.js"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <title>
        <?php echo $title; ?>
    </title>
<style>
	a:not([href]):not([tabindex]) {
		color: #007bff;
}
	</style>
    <script>
        ( function ( factory ) {
            if ( typeof define === "function" && define.amd ) {
                define( [ "jquery", "moment", "datatables.net" ], factory );
            } else {
                factory( jQuery, moment );
            }
        }( function ( $, moment ) {
            $.fn.dataTable.moment = function ( format, locale ) {
                var types = $.fn.dataTable.ext.type;

                // Add type detection
                types.detect.unshift( function ( d ) {
                    if ( d.indexOf( "<br>" ) != -1 ) {
                        d = d.split( "<br>" );
                        d = d[ 0 ] + "</font>";
                    }
                    if ( d ) {
                        // Strip HTML tags and newline characters if possible
                        if ( d.replace ) {
                            d = d.replace( /(<.*?>)|(\r?\n|\r)/g, '' );
                        }
                        // Strip out surrounding white space
                        d = $.trim( d );
                    }
                    // Null and empty values are acceptable
                    if ( d === '' || d === null ) {
                        return 'moment-' + format;
                    }
                    if ( d == "null" || d == "0/0/0000" ) {
                        d = "1/1/1970";
                    }
                    return moment( d, format, locale, true ).isValid() ?
                        'moment-' + format :
                        null;
                } );

                // Add sorting method - use an integer for the sorting
                types.order[ 'moment-' + format + '-pre' ] = function ( d ) {
                    if ( d.indexOf( "<br>" ) != -1 ) {
                        d = d.split( "<br>" );
                        d = d[ 0 ] + "</font>";
                    }
                    if ( d ) {
                        // Strip HTML tags and newline characters if possible
                        if ( d.replace ) {
                            d = d.replace( /(<.*?>)|(\r?\n|\r)/g, '' );
                        }
                        // Strip out surrounding white space
                        d = $.trim( d );
                    }
                    if ( d == "null" || d == "0/0/0000" ) {
                        d = "1/1/1970";
                    }
                    return !moment( d, format, true ).isValid() ?
                        Infinity :
                        parseInt( moment( d, format, true ).format( 'x' ), 50 );
                };
            };
        } ) );
        $( document ).ready( function () {
            var element = document.getElementsByClassName( "_getReport" );
            if ( element != null && element != undefined ) {
                for ( var i = 0; i < element.length; i++ ) {
                    element[ i ].setAttribute( "onclick", "openReport(this);" );
                }
            }
        } );

        function openReport( _element ) {
            var type = false;
            if ( _element.hasAttribute( "data-ttype" ) ) {
                type = _element.getAttribute( "data-ttype" );
            }
            var ids = "";
            var template = "";
            if ( _element.hasAttribute( "data-id" ) ) {
                ids = _element.getAttribute( "data-id" );
            }
            if ( ids != "" ) {
                switch ( type ) {
                    case "1":
                        template = "appraisals.php";
                        break;
                    case "2":
                        template = "improvedsales.php";
                        break;
                    case "3":
                        template = "leases.php";
                        break;
                    case "4":
                        template = "landsales.php";
                        break;
                }
                if ( type !== false ) {
                    var url = "forms/" + template + "?id=" + ids + "";
                    window.open( url, '_blank' );

                } else {
                    console.log( "ERROR WITH TYPE!" );
                }
            } else {
                alert( "Please Select atleast One LandSale" );
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php"><img src="img/brand.png" alt="L3 Valuation"></a>
        <?php
        $searchTerm = "";
        if ( isset( $_GET[ 'search' ] ) ) {
            $searchTerm = $_GET[ 'search' ];
        }
        ?>
        <input type="text" class="searchbox" placeholder="Search Reports" id="searchbox" value="<?php echo $searchTerm; ?>"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="maps/appraisals.php">Appraisals</a> </li>
                <li class="nav-item"> <a class="nav-link" href="maps/improvedsales.php">Improved Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="maps/landsales.php">Land Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="maps/leases.php">Leases</a> </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Create New Record </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="forms/appraisals.php" target="_blank">Appraisal</a>
                        <a class="dropdown-item" href="forms/improvedsales.php" target="_blank">Improved Sale</a>
                        <a class="dropdown-item" href="forms/landsales.php" target="_blank">Land Sale</a>
                        <a class="dropdown-item" href="forms/leases.php" target="_blank">Lease</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $login_name;?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <?php if($login_admin == 1) echo '<a class="dropdown-item" href="admin/admincp.php">Admin</a>';?>
                        <a class="dropdown-item" href="helpfiles/index.php">Tutorial</a>
                        <a class="dropdown-item" href="admin/buglist.php">Issues List</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="headlight"></div>
    <div class="headdark"></div>
    <div class="mainpage" style="padding-right: 0px; overflow-y: auto; height: 85vh;">
        <img src="img/loader.gif" style="display: none" id="mapLoader">
        <div id="propdiv" style='width:100%; height:auto;'>
            <div id="gridlist" style='overflow:hidden;'>
                <table class="table" id="comps" class="display table _table">
                    <thead>
                        <tr>
                            <?php
                            if ( $login_admin == 1 )
                                echo "<th></th>";
                            ?>
                            <th style="width: 120px;">Report Name<br>Date Created</th>
                            <th style="width: 100px;">Report ID<br>Report Type</th>
                            <th style="width: 50px;">Photo</th>
                            <th style="width: 200px;">Property Name<br>Address</th>
                            <th style="width: 100px;">City<br>Sub Market</th>
                            <th style="width: 200px;text-align:center">Property Type<br>Subtype</th>
                            <th style="text-align:center">Gross Land Area (SF)</th>
                            <th style="text-align:center">Gross Building Area (SF)</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div id="gridRowReportsTPL" style='display:none;'>
                    <!--
			<?php
			if($login_admin == 1)
				 echo "<td data-reportID='reportID_proxy' style='cursor:pointer;'><img src='img/delete.gif' class='_deleteRecord' /></td>"?>
			<td >reportname_proxy<br>DateCreated_proxy</td>
			<td>reportID_proxy<br><a style='cursor:pointer;' class='_getReport' data-ttype='reportTypeID_proxy' data-id='reportID_proxy' >reportType_proxy</a></td>
			<td><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='comp_images/photo1_proxy'><img src='comp_images/thumb_proxy' height='32' style='height:32px;'/></a></td>
			<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'>propertyname_proxy<br>address_proxy</td>
			<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'>city_proxy<br>submarket_proxy</td>
			<td align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'>propertytype_proxy<br>subtype_proxy</td>
			<td align='center'>gross_land_sf_proxy</td>
			<td align='center'>overall_gba_proxy</td>
			!-->
                </div>
            </div>
            <script type="text/javascript" src="js/l3_engine.js"></script>
            <script type="text/javascript" src="js/l3_searchEngine/l3_searchEngine.js"></script>
            <script type="text/javascript" src="js/l3_map/l3_map_renderer.js"></script>

            <script type='text/javascript'>
                var selectedData = [];
                var dataSource = [];
                var admin = false;
                <?php
			if($login_admin == 1){
				?>
                admin = true;
                <?php
			}
			?>
                $( document ).ready( function () {
                    var rbe_engine = new _rbe_engine();
                    var searchSchemes = [];
                    l3_searchEngine = new _l3_searchEngine( {
                        activeObject: "l3_searchEngine",
                        translations: {
                            "error": "Warning",
                            "OK": "OK",
                            "actionRunning": "action in progress, please wait to finnish current action and try again!"
                        },
                        tableData: [],
                        selectionsElement: "",
                        reportTypeID: [],
                        defaultSchemes: searchSchemes,
                        gridType: "reports",
                        gridRowTPL: "gridRowReportsTPL",
                        wopener: {
                            container: "",
                            idsInput: "",
                            cellClasses: [ "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable", "selectable" ],
                            cellMethods: [ "indexCounter", "propertyname", [ "photo1", "thumbnail" ], "property_name", "DateCreated", "submarket", "address", "city", "propertytype", "propertysubtype", "gross_land_sf", "overall_gba" ]
                        },
                        isAdmin: admin
                    } );
                    l3_searchEngine.init();

                    <?php
				if($searchTerm!=""){
					?>
                    submitSearch();
                    <?php
				}
				?>
                } );
                $( "#searchbox" ).keyup( function ( ev ) {
                    // 13 is ENTER
                    if ( ev.which === 13 ) {
                        submitSearch();
                    }

                    //console.log(qry);
                    //var url = ("reports.php?search=" + qry);
                    //console.log(url);
                    //window.location = url;*/
                } );

                function submitSearch() {
                    var qry = document.getElementById( "searchbox" ).value;
                    var filters = {
                        "0": {
                            "criteria": {
                                "0": {
                                    "table": "report",
                                    "fieldName": "FK_ReportTypeID",
                                    "data-type": "int",
                                    "operator": "IN",
                                    "FK_ReportTypeID": [ "1", "2", "3", "4" ],
                                    "condition": "and"
                                },
                                "1": {
                                    "table": "report",
                                    "fieldName": "isDeleted",
                                    "data-type": "dropdown",
                                    "operator": "",
                                    "isDeleted": "0",
                                    "condition": "0"
                                }
                            },
                            "condition": "and"
                        },
                        "1": {
                            "criteria": {
                                "0": {
                                    "table": "property",
                                    "fieldName": "property_name",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "property_name": [ qry ],
                                    "condition": "or"
                                },
                                "1": {
                                    "table": "property",
                                    "fieldName": "address",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "address": [ qry ],
                                    "condition": "or"
                                },
                                "2": {
                                    "table": "property",
                                    "fieldName": "city",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "city": [ qry ],
                                    "condition": "or"
                                },
                                "3": {
                                    "table": "propertytype",
                                    "fieldName": "propertytype",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "propertytype": [ qry ],
                                    "condition": "or"
                                },
                                "4": {
                                    "table": "subtype",
                                    "fieldName": "subtype",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "subtype": [ qry ],
                                    "condition": "or"
                                },
                                "5": {
                                    "table": "genmarket",
                                    "fieldName": "genmarket",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "genmarket": [ qry ],
                                    "condition": "or"
                                },
                                "6": {
                                    "table": "submarket",
                                    "fieldName": "submarket",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "submarket": [ qry ],
                                    "condition": "or"
                                },
                                "7": {
                                    "table": "report",
                                    "fieldName": "reportname",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "reportname": [ qry ],
                                    "condition": "or"
                                },
                                "8": {
                                    "table": "property",
                                    "fieldName": "zoning_desc",
                                    "data-type": "varchar",
                                    "operator": "vin",
                                    "zoning_desc": [ qry ],
                                    "condition": "or"
                                },
                                "9": {
                                    "table": "report",
                                    "fieldName": "id",
                                    "data-type": "int",
                                    "operator": "vin",
                                    "id": [ qry ],
                                    "condition": "0"
                                }
                            },
                            "condition": "0"
                        }
                    };

                    l3_searchEngine.freeSearch( filters );
                }
            </script>
        </div>
    </div>
</body>
</html>