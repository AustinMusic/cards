<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
include("../../../includes/check.php");
$title = 'aa Valuation - Clients';
$tablename = 'clients' ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css" />
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
<link rel="stylesheet" href="../DataTables/datatables.min.css"/>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<title><?php echo $title; ?></title>
<script type="text/javascript" src="../js/lightbox.js"></script>
<script src="../DataTables/datatables.min.js" ></script>
<script>
$(document).ready( function () {
	var table = $('#clients').DataTable( { 
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



<p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; Clients</p>
<div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="clients">
<thead>
<tr>
<th>Edit</th>
<th>Company Name</th>
<th>Address</th>
<th>Suite</th>
<th>City</th>
<th>County</th>
<th>State</th>
<th>Zip Code</th>
<th>Client Name</th>
<th>Cell Phone</th>
<th>Email</th>
</tr>
</thead>
<tbody>
<?php

include("../../../includes/connect.php");


// get the records from the database
if ($result = $conn->query("SELECT id, compname, address, suite, city, county, state, zipcode, CONCAT(firstname,' ',lastname) as clientname, cellphone, email FROM clients ORDER BY id"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{

while ($row = $result->fetch_object())
{
// set up a row for each record
        echo "<tr>";
		echo "<td><a href='clientinfo.php?id=" . $row->id . "'>Edit</a></td>";
        echo "<td>".$row->compname ."</td>";
        echo "<td>".$row->address ."</td>";
		echo "<td>".$row->suite ."</td>";
        echo "<td>".$row->city ."</td>";
        echo "<td>".$row->county ."</td>";
        echo "<td>".$row->state ."</td>";
        echo "<td>".$row->zipcode ."</td>";
		echo "<td>".$row->clientname ."</td>";
        echo "<td>".$row->cellphone . "</td>";		
        echo "<td>".$row->email . "</td>";
        echo "</tr>";
}

echo "</table></div>";
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

<a href="clientinfo.php">Add New Client</a></div>
</div>	
</body>
</html>