<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
include("../../../includes/check.php");
$title = 'aa Valuation - Known Issues';
$tablename = 'bugs' ?>

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
	var table = $('#<?php echo $tablename; ?>').DataTable( { 
		pageLength: "25",
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
    <div class="col-sm-12" style="margin-bottom: 10px;"><a href="buginfo.php">Add New Issue</a></div>
<table id="bugs" class="display">
<thead>
<tr>
<td></td>
<th>ID</th>
<th>Issue Type</th>
<th>Priority</th>
<th>Status</th>
<th width="500px">Title</th>
<th>Date Created</th>
<th>Created By</th>
<th>Date Modified</th>
<th>Modified By</th>
</tr>
</thead>
<tbody>
<?php

include("../../../includes/connect.php");


// get the records from the database
if ($result = $conn->query("SELECT a.id, c.firstname as cfirst, c.lastname as clast, DATE_FORMAT(a.DateCreated,'%M %e %Y') as DateCreated, IF(ModifiedBy > 0,(CONCAT(m.firstname,' ',m.lastname)),' ') as ModifiedBy, DATE_FORMAT(a.DateModified,'%M %e %Y') as DateModified, t.definition as type, p.definition as priority, s.definition as status, a.short FROM bugreports a JOIN appraisers c on c.id = a.CreatedBy left join appraisers m on m.id = a.ModifiedBy left join WFDictionary t on a.type = t.id left join WFDictionary p on a.priority = p.id left join WFDictionary s on a.status = s.id where a.id > 0 ORDER BY a.id DESC"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{


while ($row = $result->fetch_object())
{
// set up a row for each record
        echo "<tr>";
		echo "<td><a href='buginfo.php?id=" . $row->id . "'>Edit</a></td>";
        echo "<td>".$row->id ."</td>";
        echo "<td>".$row->type ."</td>";
        echo "<td>".$row->priority ."</td>";
        echo "<td>".$row->status ."</td>";
        echo "<td style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'>".$row->short ."</td>";
		echo "<td>".$row->DateCreated ."</td>";
		echo "<td>".$row->cfirst ." ".$row->clast."</td>";
		echo "<td>".$row->DateModified ."</td>";
		echo "<td>".$row->ModifiedBy ."</td>";
        echo "</tr>";
}

echo "</tbody></table>";
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
</div>

</body>
</html>