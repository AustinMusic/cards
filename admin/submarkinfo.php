<?php include("../../../includes/check.php");	?>
<?php $title = 'Admin - Add Submarket' ?>


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
function renderForm( $id = '',$genmarket = '', $submarket = '')
{ ?>

<p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; <a href="submarket.php">Submarket</a> &nbsp; &#8594; &nbsp; <?php if ($id != '') { echo "Edit Submarket"; } else { echo "New Submarket"; } ?></p>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<table width="300" border="0" cellspacing="5">
  <tbody>
    <tr>
      <td>General Market</td>
      <td><select class="form-control" name="gmid">
		  <option value=''>Select Genertal Market</option>
		  <option value='1'>NORTHEAST</option>
		  <option value='2'>I-5 CORRIDOR</option>
		  <option value='3'>SOUTHEAST</option>
		  <option value='4'>SOUTHWEST</option>
		  <option value='5'>OTHER OREGON</option>
		  <option value='6'>OTHER PORTLAND-VANCOUVER PMSA</option>
		  <option value='7'>NORTHWEST</option>
		  <option value='8'>CLARK COUNTY</option>
		  <option value='9'>OTHER WASHINGTON</option>
		  <option value='10'>CBD</option>
		  <option value='11'>LLOYD DISTRICT</option>
		  <option value='12'>OTHER IDAHO</option>
		  <option value='13'>OTHER ARIZONA</option>
		  </select></td>
    </tr>
    <tr>
      <td>Submarket</td>
      <td><input class="form-control" type="text" name="submarket" value="<?php echo $submarket; ?>" required></td>
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
$gmid = $_POST['gmid'];
$submarket = htmlentities($_POST['submarket'], ENT_QUOTES);

$submarket = stripslashes($submarket);
$submarket = mysqli_real_escape_string($conn, $submarket);


// check that required fields are not empty
if ($gmid == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($id, $gmid, $submarket);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $conn->prepare("UPDATE submarket SET gmid = ?, submarket = ? WHERE id=?"))
{
$stmt->bind_param("isi",$gmid, $submarket, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: submarket.php");
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
if($stmt = $conn->prepare("SELECT id, gmid, submarket FROM submarket WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $gmid, $submarket);
$stmt->fetch();

// show the form
renderForm($id, $gmid, $submarket);

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
header("Location: submarket.php");
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

$gmid = $_POST['gmid'];
$submarket = htmlentities($_POST['submarket'], ENT_QUOTES);

$submarket = stripslashes($submarket);
$submarket = mysqli_real_escape_string($conn, $submarket);

// check that required fields are not empty
if ($gmid == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($id, $gmid, $submarket);
}
else
{
// insert the new record into the database
if ($stmt = $conn->prepare("INSERT into submarket (gmid, submarket) VALUES (?, ?)"))
{
$stmt->bind_param("is", $gmid, $submarket);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: submarket.php");
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