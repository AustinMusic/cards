<?php
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
    header('Location: mobhome.php');
    exit(0);
}
include("../../includes/check.php");
$title = 'L3 Valuation - CARDS - Home';?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap-4.2.1.css" rel="stylesheet">    
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" /> 
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">	
	<link rel="stylesheet" type="text/css" href="css/grid.css"/>
	<link rel="stylesheet" href="DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" >
    <link href="css/styles.css" rel="stylesheet">   
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
	<script src="DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="js/rbe_engine.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php"><img src="img/brand.png" alt="L3 Valuation"></a>
              <?php if($login_ro == 0) { ?>
        <input type="text" class="searchbox" placeholder="Search Reports" id="searchbox"/>
        <script>
            $( "#searchbox" ).keyup( function ( ev ) {
                // 13 is ENTER
                if ( ev.which === 13 ) {
                    var qry = document.getElementById( "searchbox" ).value;
                    console.log( qry );
                    var url = ( "reports.php?search=" + qry );
                    console.log( url );
                    window.location = url;
                }
            } );
        </script>
              <?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if($login_ro == 0) echo '<li class="nav-item"> <a class="nav-link" href="maps/appraisals.php">Appraisals</a> </li>';?>
                <li class="nav-item"> <a class="nav-link" href="maps/improvedsales.php">Improved Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="maps/landsales.php">Land Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="maps/leases.php">Leases</a> </li>
              <?php if($login_ro == 0) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Create New Record </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="forms/appraisals.php" target="_blank">Appraisal</a>
                        <a class="dropdown-item" href="forms/improvedsales.php" target="_blank">Improved Sale</a>
                        <a class="dropdown-item" href="forms/landsales.php" target="_blank">Land Sale</a>
                        <a class="dropdown-item" href="forms/leases.php" target="_blank">Lease</a>
                    </div>
                </li>
              <?php } ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $login_name;?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <?php if($login_admin == 1) echo '<a class="dropdown-item" href="admin/admincp.php">Admin</a>';?>
                        <a class="dropdown-item" href="helpfiles/index.php">Tutorial</a>
                        <?php if($login_ro == 0) echo '<a class="dropdown-item" href="admin/buglist.php">Issues List</a>';?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="headlight"></div>
    <div class="headdark"></div>
    <div class="mainpage" style="padding-right: 0px; overflow-y: auto; height: 85vh;">
        <div id="assignedjobs">
            <h2>Jobs assigned to <?php echo $login_name;?>&nbsp;<?php echo $login_last;?></h2>
            <table width="80%" align="center" border="1" class="display table _table">
                <thead>
                    <tr>
                        <th data-sort-method='none' style="max-width: 60px;"></th>
                        <th style='max-width: 125px;'>Name</th>
                        <th>Property Name<br/>Address</th>
                        <th style='max-width: 200px;'>City, State<br/>Submarket</th>
                        <th style='max-width: 200px;'>County<br/>Zip Code</th>
                        <th style='max-width: 200px;'>Property Type<br/>Subtype</th>
                        <th style='max-width: 125px;text-align:center;'>Zoning<br>Code</th>
                        <th style='max-width: 200px;text-align:center;'>Client<br>Due Date</th>
                        <th style='max-width: 150px;text-align:center;'>Status<br>Appraiser</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include( "../../includes/connect.php" );
                    if ( $jobs = $conn->query( "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, b.county, b.zip_code, b.zoning_code, if(c.client_name is null,'',c.client_name) as client_name, sm.submarket, pt.propertytype, st.subtype, IF(a.DueDate = '0000-00-00','None',Date_Format(a.DueDate,'%c/%e/%Y')) as DueDate, if(a.reportname = '','No Report Name',a.reportname) as reportname, e.status, CONCAT(u.firstname,' ',u.lastname) as OwnerID FROM report a LEFT JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN appraisalinfo c on c.FK_ReportID = a.id LEFT OUTER JOIN building d on d.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER join propertytype pt on pt.id = b.propertytype LEFT OUTER join subtype st on st.id = b.propertysubtype LEFT OUTER join WFStatus e on e.id = a.status LEFT OUTER JOIN appraisers u on u.id = a.OwnerID where (a.AssignedTo = $user_id or a.OwnerID = $user_id) and a.FK_ReportTypeID = 1 and a.isDeleted = 0 order by a.DueDate desc LIMIT 100" ) ) {
                        // display records if there are records to display
                        if ( $jobs->num_rows > 0 ) {

                            $index = 1;
                            while ( $assignedjobs = $jobs->fetch_object() ) {

                                // set up a row for each record
                                echo "<td style='max-width: 60px;'><a style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/" . $assignedjobs->photo1 . "'><img src='/cards/comp_images/" . $assignedjobs->thumbnail . "' height='32' style='height:32px;'/></a></td>";
                                echo "<td style='max-width: 125px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><a href='forms/appraisals.php?id=" . $assignedjobs->id . "' target='_blank'>" . $assignedjobs->reportname . "</a></td>";
                                echo "<td class='selectable' style='text-wrap: normal; max-width:400px;'>" . $assignedjobs->property_name . "<br>" . $assignedjobs->address . "</td>";
                                echo "<td class='selectable' style='max-width: 200px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'>" . $assignedjobs->city . ", " . $assignedjobs->state . "<br>" . $assignedjobs->submarket . "</td>";
                                echo "<td class='selectable' style='max-width: 200px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'>" . $assignedjobs->county . "<br>" . $assignedjobs->zip_code . "</td>";
                                echo "<td class='selectable' style='max-width: 200px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'>" . $assignedjobs->propertytype . "<br>" . $assignedjobs->subtype . "</td>";
                                echo "<td class='selectable' align='center' style='max-width: 125px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'>" . $assignedjobs->zoning_code . "</td>";
                                echo "<td class='selectable' align='center' style='max-width: 200px; text-wrap: normal;'>" . $assignedjobs->client_name . "<br>" . $assignedjobs->DueDate . "</td>";
                                echo "<td class='selectable' align='center' style='max-width: 150px; white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'>" . $assignedjobs->status . "<br>" . $assignedjobs->OwnerID . "</td>";
                                echo "</tr>";
                                $index++;
                            }

                        }
                        // if there are no records in the database, display an alert message
                        else {
                            echo "There are no jobs assigned to you.";
                        }
                    }
                    mysqli_close( $conn );
                    ?>
                </tbody>
            </table>

        </div>



    </div>
</body>
</html>