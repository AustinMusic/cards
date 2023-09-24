<?php
include( "../../includes/check.php" );
include( "../../includes/connect.php" );
$title = 'CARDS - Mobile Companion';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="css/mstyles.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title><?php echo $title; ?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top">
  <div class="container-fluid"> <a class="navbar-brand" href="mobhome.php"><img src="img/brand.png" alt="L3 Valuation"></a>
    <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"> <span class="navbar-dark navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown ms-auto"><a class="nav-link" href="logout.php">Logout <?php echo $login_name;?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="mainpage">
  <div class="jobslist">
    <?php
    if ( $jobs = $conn->query( "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,' ',b.zip_code) as city, b.county, b.zoning_code, if(c.client_name is null,'',c.client_name) as client_name, sm.submarket, pt.propertytype, IF(st.subtype = '---','',st.subtype) as subtype, IF(a.DueDate = '0000-00-00','None',Date_Format(a.DueDate,'%c/%e/%Y')) as DueDate, if(a.reportname = '','No Report Name',a.reportname) as reportname, a.status as statid, e.status, CONCAT(u.firstname,' ',u.lastname) as OwnerID FROM report a LEFT JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN appraisalinfo c on c.FK_ReportID = a.id LEFT OUTER JOIN building d on d.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER join propertytype pt on pt.id = b.propertytype LEFT OUTER join subtype st on st.id = b.propertysubtype LEFT OUTER join WFStatus e on e.id = a.status LEFT OUTER JOIN appraisers u on u.id = a.OwnerID where (a.AssignedTo = $user_id or a.OwnerID = $user_id) and a.FK_ReportTypeID = 1 and a.isDeleted = 0 order by a.DueDate desc LIMIT 100" ) ) {
      if ( $jobs->num_rows > 0 ) {
		  echo "<div class='top'><h2>Jobs assigned to $login_name $login_last </h2></div>";
		  echo "<div class='d-flex flex-wrap'>";
        while ( $assignedjobs = $jobs->fetch_object() ) {
		  echo "<div class='jobwindow'>";
          echo "<a href='mobforms/appraisals.php?id=".$assignedjobs->id."' target='_blank'><div class='status".$assignedjobs->statid."'>";
          echo "<div class='jobheader status".$assignedjobs->statid."' style='width: 100%'>".$assignedjobs->reportname."</div>";
		  echo "<div class='jobphoto'><img src='/cards/comp_images/".$assignedjobs->thumbnail."'/></div>";
		  echo "<div class='appdetails'>".$assignedjobs->property_name."<br>".$assignedjobs->address."<br>".$assignedjobs->city."<br>".$assignedjobs->submarket."<br>".$assignedjobs->propertytype." ".$assignedjobs->subtype."</div>";
		  echo "<div class='appadddet'>Client: ".$assignedjobs->client_name."<br>Appraiser: ".$assignedjobs->OwnerID."<br>Due Date: ".$assignedjobs->DueDate."</div>";
		  echo "</div></a></div>";
        }
		 echo "</div>";
      }
      else {
        echo "There are no jobs assigned to you.";
      }
    }
    mysqli_close( $conn );
    ?>
  </div>
</div>
</script>
</body>
</html>