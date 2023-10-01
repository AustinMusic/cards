    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../home.php"><img src="../img/brand.png" alt="L3 Valuation"></a>
              <?php if($login_ro == 0) { ?>
        <input type="text" class="searchbox" placeholder="Search Reports" id="searchbox"/>
        <script>
            $( "#searchbox" ).keyup( function ( ev ) {
                // 13 is ENTER
                if ( ev.which === 13 ) {
                    var qry = document.getElementById( "searchbox" ).value;
                    console.log( qry );
                    var url = ( "../reports.php?search=" + qry );
                    console.log( url );
                    window.location = url;
                }
            } );
        </script>		
              <?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <?php if($login_ro == 0) { ?><li class="nav-item"> <a class="nav-link" href="../maps/appraisals.php">Appraisals</a> </li>
              <?php } ?>
                <li class="nav-item"> <a class="nav-link" href="../maps/improvedsales.php">Improved Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../maps/landsales.php">Land Sales</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../maps/leases.php">Leases</a> </li>
              <?php if($login_ro == 0) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Create New Record </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../forms/appraisals.php" target="_blank">Appraisal</a>
                        <a class="dropdown-item" href="../forms/improvedsales.php" target="_blank">Improved Sale</a>
                        <a class="dropdown-item" href="../forms/landsales.php" target="_blank">Land Sale</a>
                        <a class="dropdown-item" href="../forms/leases.php" target="_blank">Lease</a>
                    </div>
                </li>
              <?php } ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $login_name;?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                        <?php if($login_admin == 1) echo '<a class="dropdown-item" href="../admin/admincp.php">Admin</a>';?>
                        <a class="dropdown-item" href="../helpfiles/">Tutorial</a>
                        <?php if($login_ro == 0) echo '<a class="dropdown-item" href="../admin/buglist.php">Issues List</a>';?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="headlight"></div>
    <div class="headdark"></div>