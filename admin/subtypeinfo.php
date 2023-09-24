<?php include("../../../includes/check.php");	?>
<?php $title = 'Admin - Add Subtype' ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<title><?php echo $title; ?></title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css">
</head>

<body>
<?php include("../../../includes/header.php")?>
<div class="mainpage">

<?php include("../../../includes/connect.php");
function renderForm( $id = '',$propertytype = '', $subtype = '')
{ ?>

<p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; <a href="subtype.php">Subtype</a> &nbsp; &#8594; &nbsp; <?php if ($id != '') { echo "Edit Subtype"; } else { echo "New Subtype"; } ?></p>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<table width="300" border="0" cellspacing="5">
  <tbody>
    <tr>
      <td>Property Type</td>
      <td><select class="form-control" name="ptid">
		  <option value=''>Select Property Type</option>
		  <option value='1'>Agriculture / Undeveloped</option>
		  <option value='2'>Commercial</option>
		  <option value='3'>Industrial</option>
		  <option value='4'>Multi-Family</option>
		  <option value='5'>Office</option>
		  <option value='6'>Residential</option>
		  <option value='7'>Special Purpose</option>
		  <option value='8'>Sports &amp; Entertainment</option>
		  </select></td>
    </tr>
    <tr>
      <td>Subtype</td>
      <td><input class="form-control" type="text" name="subtype" value="<?php echo $subtype; ?>" required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit"></td>
    </tr>
  </tbody>
</table>
</form>
</div>
</body>
</html>


<?php }

/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$ptid = $_POST['ptid'];
$subtype = htmlentities($_POST['subtype'], ENT_QUOTES);

$subtype = stripslashes($subtype);
$subtype = mysqli_real_escape_string($conn, $subtype);


// check that required fields are not empty
if ($ptid == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($id, $ptid, $subtype);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $conn->prepare("UPDATE subtype SET ptid = ?, subtype = ? WHERE id=?"))
{
$stmt->bind_param("isi",$ptid, $subtype, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: subtype.php");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
}
// if the form hasn't been submitted yet, get the info from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the record from the database
if($stmt = $conn->prepare("SELECT id, ptid, subtype FROM subtype WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $ptid, $subtype);
$stmt->fetch();

// show the form
renderForm($id, $ptid, $subtype);

$stmt->close();
}
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the view.php page
else
{
header("Location: subtype.php");
}
}
}



/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// get the form data

$ptid = $_POST['ptid'];
$subtype = htmlentities($_POST['subtype'], ENT_QUOTES);

$subtype = stripslashes($subtype);
$subtype = mysqli_real_escape_string($conn, $subtype);

// check that required fields are not empty
if ($ptid == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($id, $ptid, $subtype);
}
else
{
// insert the new record into the database
if ($stmt = $conn->prepare("INSERT into subtype (ptid, subtype) VALUES (?, ?)"))
{
$stmt->bind_param("is", $ptid, $subtype);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: subtype.php");
}

}
// if the form hasn't been submitted yet, show the form
else
{
renderForm();
}
}

// close the mysqli connection
$conn->close();
?>