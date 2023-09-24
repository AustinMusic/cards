<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
include("../../../includes/check.php");
$title = 'aa Valuation - Status';
$tablename = 'status' ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css" />
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
<link rel="stylesheet" href="../DataTables/datatables.min.css"/>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<title><?php echo $title; ?></title>
<script type="text/javascript" src="../js/lightbox.js"></script>
<script src="../DataTables/datatables.min.js" ></script>
<script>
$(document).ready( function () {
	var table = $('#<?php echo $tablename; ?>').DataTable( { 
		paging: true,
		pagingType: "full_numbers",
		ColReorder: true,
		RowReorder: true
    		});
	} );

</script>

</head>

<body>
<?php include("../../../includes/header.php")?>
<div class="mainpage">
<p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; Report Status</p>
<table id="status" class="display">
<thead>
<tr>
<th></th>
<th>ID</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php

include("../../../includes/connect.php");


// get the records from the database
if ($result = $conn->query("SELECT id, status FROM WFStatus"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{

while ($row = $result->fetch_object())
{
// set up a row for each record
        echo "<tr>";
		echo "<td><a href='statusinfo.php?id=" . $row->id . "'>Edit</a></td>";
        echo "<td>".$row->id ."</td>";
        echo "<td>".$row->status ."</td>";
        echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

?>

<a href="statusinfo.php">Add New Status</a></div>

</body>
</html>