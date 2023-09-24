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
	case "apptitle":
		$title = "Appraiser Title";
		$value = "apptitle";
		$datatab = "WFDictionary";
		break;
	case "appraisetype":
		$title = "Appraisal Type";
		$value = "appraisetype";
		$datatab = "WFDictionary";
		break;
	case "bclass":
		$title = "Building Class";
		$value = "bclass";
		$datatab = "WFDictionary";
		break;
	case "buyerstatus":
		$title = "Buyer Status";
		$value = "buyerstatus";
		$datatab = "WFDictionary";
		break;
	case "cclass":
		$title = "Construction Class";
		$value = "cclass";		
		$datatab = "WFDictionary";
		break;
	case "contacttype":
		$title = "Contact Type";
		$value = "contacttype";
		$datatab = "WFDictionary";
		break;
	case "convdoc":
		$title = "Conveyance Document Type";
		$value = "convdoc";
		$datatab = "WFDictionary";
		break;
	case "leaseexpadj":
		$title = "Expense Terms Adjustment";
		$value = "leaseexpadj";
		$datatab = "WFDictionary";
		break;
	case "inspecttype":
		$title = "Inspection Type";
		$value = "inspecttype";
		$datatab = "WFDictionary";
		break;
	case "leaseexpterm":
		$title = "Lease Expense Terms";
		$value = "leaseexpterm";
		$datatab = "WFDictionary";
		break;
	case "lesseetype":
		$title = "Lessee Type";
		$value = "lesseetype";
		$datatab = "WFDictionary";
		break;
	case "lvlservice":
		$title = "Level of Service";
		$value = "lvlservice";
		$datatab = "WFDictionary";
		break;
	case "occupancytype":
		$title = "Occupancy Type";
		$value = "occupancytype";
		$datatab = "WFDictionary";
		break;
	case "ownertype":
		$title = "Owner Type";
		$value = "ownertype";
		$datatab = "WFDictionary";
		break;
	case "parktype":
		$title = "Park Type";
		$value = "parktype";
		$datatab = "WFDictionary";
		break;
	case "parkingtype":
		$title = "Parking Type";
		$value = "parkingtype";
		$datatab = "WFDictionary";
		break;
	case "pdftype":
		$title = "PDF Type";
		$value = "pdftype";
		$datatab = "WFDictionary";
		break;
	case "appraisepurp":
		$title = "Purpose of Appraisal";
		$value = "appraisepurp";
		$datatab = "WFDictionary";
		break;
	case "salestatus":
		$title = "Sale Status";
		$value = "salestatus";
		$datatab = "WFDictionary";
		break;
	case "salutation":
		$title = "Salutation";
		$value = "salutation";
		$datatab = "WFDictionary";
		break;
	case "sidestreet":
		$title = "Side of Street";
		$value = "sidestreet";
		$datatab = "WFDictionary";
		break;
	case "spacegener":
		$title = "Space Generation";
		$value = "spacegener";
		$datatab = "WFDictionary";
		break;
	case "spaceposition":
		$title = "Space Position";
		$value = "spaceposition";
		$datatab = "WFDictionary";
		break;
	case "mfunittype":
		$title = "Unit Type - Multi Family";
		$value = "mfunittype";
		$datatab = "WFDictionary";
		break;
	case "ssunittype":
		$title = "Unit Type - Mini Storage";
		$value = "ssunittype";
		$datatab = "WFDictionary";
		break;
	case "utilities":
		$title = "Utilities";
		$value = "utilities";
		$datatab = "WFDictionary";
		break;
	case "exposure":
		$title = "Exposure";
		$value = "exposure";
		$datatab = "WFDictionary";
		break;
	case "orientation":
		$title = "Orientation";
		$value = "orientation";
		$datatab = "WFDictionary";
		break;
	case "proprights":
		$title = "Property Rights";
		$value = "proprights";
		$datatab = "WFDictionary";
		break;
	case "shape":
		$title = "Shape";
		$value = "shape";
		$datatab = "WFDictionary";
		break;
	case "siteaccess":
		$title = "Site Access";
		$value = "siteaccess";
		$datatab = "WFDictionary";
		break;
	case "topography":
		$title = "Topography";
		$value = "topography";
		$datatab = "WFDictionary";
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
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<title>
		<?php echo $title; ?>
	</title>
	<script type="text/javascript" src="../js/lightbox.js"></script>
	<script src="../DataTables/datatables.min.js"></script>
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
					<th>ID</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<?php

				include( "../../../includes/connect.php" );


				// get the records from the database
				if ( $result = $conn->query( "SELECT id, definition from WFDictionary where category = '".$value."' order by id" ) ) {
					// display records if there are records to display
					if ( $result->num_rows > 0 ) {

						while ( $row = $result->fetch_object() ) {
							// set up a row for each record
							echo "<tr>";
							echo "<td><a href='editdrops.php?id=" . $row->id . "&ddtype=".$value."&type=".$title."'>Edit</a></td>";
							echo "<td>" . $row->id . "</td>";
							echo "<td>" . $row->definition . "</td>";
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

				<a href="editdrops.php?ddtype=<?php echo $value; ?>">Add New Option</a>
	</div>

</body>
</html>