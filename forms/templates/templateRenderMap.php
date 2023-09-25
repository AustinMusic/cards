<!doctype html>
<html>
<head>
    <title>Appraisal Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/appstyle.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/mapController.js"></script>
    <script type="text/javascript" src="../js/rbe_engine.js"></script>
    <script type="text/javascript" src="../js/aa_engine.js"></script>
	<script type="text/javascript" src="../js/html2canvas.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=GoogleKey&libraries=places" async></script>
    <script>
		/*https://maps.googleapis.com/maps/api/js?key=AIzaSyAtTb5qzQ9x50dKqqkfNrrypXRFYkw91NQ&v=3&libraries=places async defer*/
        $( function () {
            aa_engine = new _aa_engine();

            mapController = new _mapController( {
                activeObject: "mapController",
                id: <?php echo $appraisals->getId(); ?>,
                latitude: "<?php echo $appraisals->getLat(); ?>",
                longitude: "<?php echo $appraisals->getLng(); ?>",
                coords: <?php echo json_encode($coords,JSON_UNESCAPED_UNICODE); ?>
            } );

            mapController.init();
			/*setTimeout(function(){ 
				html2canvas(document.body).then(function(canvas) {
				document.body.appendChild(canvas);
			}); }, 9000);
			*/
        } );
    </script>
</head>
<body>
	<div class="mainpage" id='mainPage' >
		<div class="col-xs-12">
			<div id="map-canvas" style='width:1880px; height:800px;'></div>
		</div>
	</div>
</body>

</html>
