<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
set_time_limit( 120 );
ini_set( 'memory_limit', '512M' );
ini_set( 'max_execution_time', 60 );
include( "../../../includes/check.php" );
$ddtype = $_GET[ 'ddtype' ];
switch ( $ddtype ) {
	case "msalist":
		$title = "MSA";
		$value = "msalist";
		$datatab = "editdrops";
		break;
	case "utilslist":
		$title = "Available Utilities";
		$value = "utilslist";
		$datatab = "editdrops";
		break;
	case "eadesc":
		$title = "Easement Description";
		$value = "eadesc";
		$datatab = "editdrops";
		break;
	case "bsizesource":
		$title = "Building Size Source";
		$value = "bsizesource";
		$datatab = "editdrops";
		break;
	case "YBlastReno":
		$title = "Renovation Year";
		$value = "YBlastReno";		
		$datatab = "editdrops";
		break;
	case "codescrip":
		$title = "Construction Description";
		$value = "codescrip";
		$datatab = "editdrops";
		break;
	case "parratlist":
		$title = "Parking Ratio";
		$value = "parratlist";
		$datatab = "editdrops";
		break;
	case "offhvactype":
		$title = "Office HVAC";
		$value = "offhvactype";
		$datatab = "editdrops";
		break;
	case "cheightlist":
		$title = "Clear Height";
		$value = "cheightlist";
		$datatab = "editdrops";
		break;
	case "tdRamp":
		$title = "Truck - Ramp";
		$value = "tdRamp";
		$datatab = "editdrops";
		break;
	case "tdDock":
		$title = "Truck - Dock";
		$value = "tdDock";
		$datatab = "editdrops";
		break;
	case "hvaclist":
		$title = "Industrial HVAC";
		$value = "hvaclist";
		$datatab = "editdrops";
		break;
	case "confealist":
		$title = "Construction Features";
		$value = "confealist";
		$datatab = "editdrops";
		break;
	case "actprof":
		$title = "Pro Forma";
		$value = "actprof";
		$datatab = "editdrops";
		break;
	case "actprofsource":
		$title = "Pro Forma Source";
		$value = "actprofsource";
		$datatab = "editdrops";
		break;
	case "resexp":
		$title = "Reserves";
		$value = "resexp";
		$datatab = "editdrops";
		break;
	case "apprnames":
		$title = "Appraisers";
		$value = "apprnames";
		$datatab = "editdrops";
		break;
	case "int_conv":
		$title = "Interest Conveyed";
		$value = "int_conv";
		$datatab = "editdrops";
		break;
	case "findesc":
		$title = "Finance Type";
		$value = "findesc";
		$datatab = "editdrops";
		break;
	case "tonmarket":
		$title = "Marketing Time";
		$value = "tonmarket";
		$datatab = "editdrops";
		break;
	case "APComment":
		$title = "Adjusted Price Comment";
		$value = "APComment";
		$datatab = "editdrops";
		break;
	case "sourcedata":
		$title = "Data Source";
		$value = "sourcedata";
		$datatab = "editdrops";
		break;
	case "conf1sour":
		$title = "Confirmation Source";
		$value = "conf1sour";
		$datatab = "editdrops";
		break;
	case "relat1":
		$title = "Relationship";
		$value = "relat1";
		$datatab = "editdrops";
		break;
	case "conf2sour":
		$title = "Confirmation Source 2";
		$value = "conf2sour";
		$datatab = "editdrops";
		break;
	case "MFUnitType":
		$title = "Muli Family Unit Type";
		$value = "MFUnitType";
		$datatab = "editdrops";
		break;
	case "descLopt":
		$title = "Lease Options Description";
		$value = "descLopt";
		$datatab = "editdrops";
		break;
	case "flono":
		$title = "Floor Number";
		$value = "flono";
		$datatab = "editdrops";
		break;
	case "loadfac":
		$title = "Load Factor";
		$value = "loadfac";
		$datatab = "editdrops";
		break;
	case "SLEEscalation":
		$title = "Lease Escalations";
		$value = "SLEEscalation";
		$datatab = "editdrops";
		break;
	case "SLConcDesc":
		$title = "Concessions Description";
		$value = "SLConcDesc";
		$datatab = "editdrops";
		break;
	case "descyardspace":
		$title = "Yard Space Description";
		$value = "descyardspace";
		$datatab = "editdrops";
		break;
	case "EffectRentComment":
		$title = "Effective Rent Comment";
		$value = "EffectRentComment";
		$datatab = "editdrops";
		break;
	case "MSSize":
		$title = "Self-storage Unit Size";
		$value = "MSSize";
		$datatab = "editdrops";
		break;
	case "MsUnitType":
		$title = "Self-storage Unit Type";
		$value = "MsUnitType";
		$datatab = "editdrops";
		break;
	case "conorby":
		$title = "Confirmed By";
		$value = "conorby";
		$datatab = "editdrops";
		break;
	case "EZCode":
		$title = "Zoning Codes";
		$value = "EZCode";
		$datatab = "editdrops";
		break;
	case "EZJuris":
		$title = "Zoning Jurisdiction";
		$value = "EZJuris";
		$datatab = "editdrops";
		break;
	case "EZDesc":
		$title = "Zoning Description";
		$value = "EZDesc";
		$datatab = "editdrops";
		break;
	case "TimReZone":
		$title = "Rezone Timing";
		$value = "TimReZone";
		$datatab = "editdrops";
		break;
}
$title = $title;
$tablename = $value;
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css"/>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
	<link rel="stylesheet" href="../DataTables/datatables.min.css"/>
	<title>
		<?php echo $title; ?>
	</title><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script ype="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../js/rbe_engine.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
	<script>
		$( document ).ready( function () {
			var table = $( '#<?php echo $tablename; ?>' ).DataTable( {
				paging: true,
				pagingType: "full_numbers",
				ColReorder: true,
				RowReorder: true
			} );
		} );
	</script>

</head>

<body>
	<?php include("../../../includes/header.php")?>
	<div class="mainpage">
		<p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; <?php echo $title; ?></p>
		<table id="<?php echo $value; ?>" class="display">
			<thead>
				<tr>
					<th></th>
					<th>Value</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php

				include( "../../../includes/connect.php" );


				// get the records from the database
				if ( $result = $conn->query( "SELECT id, definition from editdrops where category = '".$value."' order by id" ) ) {
					// display records if there are records to display
					if ( $result->num_rows > 0 ) {

						while ( $row = $result->fetch_object() ) {
							// set up a row for each record
							echo "<tr>";
							echo "<td><a href='ediatabledrops.php?id=" . $row->id . "&ddtype=".$value."&type=".$title."'>Edit</a></td>";
							echo "<td>" . $row->definition . "</td>";
							echo "<td><a href='deldds.php?id=" . $row->id . "&type=".$value."'>Delete</a></td>";
							echo "</tr>";
						}

						echo "</table>";
					}
					// if there are no records in the database, display an alert message
					else {
						echo "No results to display!";
					}
				}
				// show an error if there is an issue with the database query
				else {
					echo "Error: " . $conn->error;
				}

				// close database connection
				$conn->close();

				?>

				<a href="ediatabledrops.php?ddtype=<?php echo $value; ?>">Add New Option</a>
	</div>
            <script type="text/javascript" src="../js/aa_engine.js"></script>
            <script type="text/javascript" src="../js/aa_searchEngine/aa_searchEngine.js"></script>

</body>
</html>