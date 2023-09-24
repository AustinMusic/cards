<?php

include( "../../../includes/connect.php" );

   // Get id from URL to delete that saldo
   $id = $_GET['id'];
$value = $_GET['type'];

   // Delete saldo row from table based on given id
   //$result = mysqli_query($mysqli, "DELETE FROM saldo WHERE id=$id");
   $result ="DELETE FROM editdrops WHERE id = $id";
   if (mysqli_query($conn, $result)) { ?>
       <script type="text/javascript">
		   alert("Dropdown Option deleted");
		   window.location.href = "editdds.php?ddtype=<?php echo $value ?>";
</script>
<?php
   } else {
       echo "Error deleting record: " . mysqli_error($conn);
   }

   mysqli_close($conn);
// Below to redirect
//   echo "<a href='editdds.php?ddtype=$value'>Return to Dropdown list</a>"
?>