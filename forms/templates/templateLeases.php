<!doctype html>
<html>
<head>
<?php if ($leases->getId() != '') { ?>
<title>L - <?php echo $leases->getAddress(); ?></title>
<?php } else {?>
<title>New Lease Comp</title>
<?php } ?>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="icon" href="../img/favicon.ico">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
<link rel="stylesheet" type="text/css" href="../css/cardsformbs4.css">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> 
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
<script type="text/javascript" src="../js/lightbox.js"></script> 
<script type="text/javascript" src="../js/rbe_engine.js"></script> 
<script type="text/javascript" src="../js/aa_engine.js"></script> 
<script type="text/javascript" src="../js/baseController.js"></script> 
<script type="text/javascript" src="../js/mapController.js"></script> 
<script type="text/javascript" src="../js/leasesController.js"></script> 
<script type="text/javascript" src="../js/imageController.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=GoogleKey&libraries=places" defer></script>
<script type="text/javascript">
        $( function () {
            aa_engine = new _aa_engine();

            leasesController = new _leasesController( {
                activeObject: "leasesController",
                id: <?php echo $leases->getId(); ?>,
                latitude: "<?php echo $leases->getLat(); ?>",
                longitude: "<?php echo $leases->getLng(); ?>",
                subMarketArea: <?php echo json_encode($subMarketArea,JSON_UNESCAPED_UNICODE); ?>,
				subProperty: <?php echo json_encode($subPropertyData,JSON_UNESCAPED_UNICODE); ?>,
                <?php
					if(isset($leaseCompsData)){
					?>
                        data: <?php echo json_encode($leaseCompsData,JSON_UNESCAPED_UNICODE); ?>
					<?php
					}
					if(isset($miscRentData)){
					?>
						data: <?php echo json_encode($miscRentData,JSON_UNESCAPED_UNICODE); ?>						
					<?php
					}
					?>
            } );

            leasesController.init();

            imageController = new _imageController( {
                activeObject: "imageController",
                id: <?php echo $leases->getId(); ?>
            } );

            imageController.init();
        } );
    </script> 
<script>
        $(function() {
            $( "#comments" ).bind( 'paste',function() {
                setTimeout(function() {
                    var data = $( '#comments' ).val() ;
                    var data = data.replace(/[\u2018|\u2019|\u201A]/g, "\'");
                    var data = data.replace(/[\u201C|\u201D|\u201E]/g, "\"");
                    var data = data.replace(/\u2026/g, "...");
                    var data = data.replace(/[\u2013|\u2014]/g, "-");
                    var data = data.replace(/\u02C6/g, "^");
                    var data = data.replace(/\u2039/g, "");
                    var data = data.replace(/[\u02DC|\u00A0]/g, " ");
                    $( '#comments' ).val(data);
                });
            });
        });
    </script> 
<script>
        function preview_image() {
            var total_file = document.getElementById( "upload_files" ).files.length;
            for ( var i = 0; i < total_file; i++ ) {
                $( '#images_preview' ).append( "<div class='prebox'><img src='" + URL.createObjectURL( event.target.files[ i ] ) + "'><br><input type='text' name='caption[]' class='form-control' placeholder='Caption' maxlength='40'></div>" );
            }
        }
    </script>
<style>
.prebox img {
    max-height: 100px;
    padding: 15px;
}
.prebox {
    display: inline-block;
}
#galleryContainer {
    display: block;
}
#galleryContainer .galleryItem {
    width: 235px !important;
    height: 192px !important;
    background-color: #FFFFFF;
    border: 2px solid #1e4959;
    border-radius: 5px;
    display: inline-table;
    margin-top: 5px;
    margin-left: 5px;
}
#galleryContainer .galleryItem .imgholder {
    margin: auto;
    display: table;
    float: none;
    text-align: center;
    vertical-align: middle;
}
#galleryContainer .galleryItem .imgholder img {
    margin: 5px;
}
#galleryContainer .galleryItem .caption-box {
    min-height: 35px;
}
#addphotos input[type="file"] {
    display: block;
}
</style>
<script>
$(document).ready(
    function(){
    var _elements = document.getElementsByClassName("_bmtxtfield");
            for (var i = 0; i < _elements.length; i++) {
                if (_elements[i].value == "" || _elements[i].value == "0") {
                    _elements[i].style.backgroundColor = "rgba(204,204,0,0.25)";
                } else {
                    _elements[i].style.backgroundColor = "#FFFFFF";
                }
            }
	var _s20elements = document.getElementsByClassName("_bms20field");
            for (var i = 0; i < _s20elements.length; i++) {
                if (_s20elements[i].value == "20") {
                    _s20elements[i].style.backgroundColor = "rgba(204,204,0,0.25)";
                } else {
                    _s20elements[i].style.backgroundColor = "#FFFFFF";
                }
            }
	var _s3elements = document.getElementsByClassName("_bms3field");
            for (var i = 0; i < _s3elements.length; i++) {
                if (_s3elements[i].value == "3") {
                    _s3elements[i].style.backgroundColor = "rgba(204,204,0,0.25)";
                } else {
                    _s3elements[i].style.backgroundColor = "#FFFFFF";
                }
            }
	var _selements = document.getElementsByClassName("_bmsfield");
            for (var i = 0; i < _selements.length; i++) {
                if (_selements[i].value == "" || _selements[i].value == "190" || _selements[i].value == "200" || _selements[i].value == "207") {
                    _selements[i].style.backgroundColor = "rgba(204,204,0,0.25)";
                } else {
                    _selements[i].style.backgroundColor = "#FFFFFF";
				}
			}               
	var _s1elements = document.getElementsByClassName("_bms1field");
            for (var i = 0; i < _s1elements.length; i++) {
                if (_s1elements[i].value == "1") {
                    _s1elements[i].style.backgroundColor = "rgba(204,204,0,0.25)";
                } else {
                    _s1elements[i].style.backgroundColor = "#FFFFFF";
                }
            }
    }
);
</script>
</head>

<div class="mainpage">
  <section class="comp-form-data">
    <form enctype="multipart/form-data" method="post" id='_form'>
      <button type="submit" onclick="return false;" style="display:none;"></button>
      <!-- Leases main tab -->
      <div id="Leases_main">
        <div class="formhead">
          <div class="formTitle">
            <nav class="navbar navbar-expand-xxl navbar-dark">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navmenu">
                  <ul class="nav navbar-nav">
                    <li class="nav-item" style="position: absolute; top: 0; right: 0;"><a class="nav-link fa fa-tools" data-bs-toggle="tab" href="#fileinformation4" role="tab" style="font-size: 20px;"></a></li>
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#location" role="tab">Subject Property</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#generalprojectdata" role="tab">General Project Data</a> </li>
                    <li class="nav-item" id="projAbsorbTab" ><a class="nav-link" data-bs-toggle="tab" href="#projectabsorptiondata" role="tab">Project Absorption Data</a> </li>
                    <li class="nav-item" id="yardLeaseTab"><a class="nav-link" data-bs-toggle="tab" href="#yardlease" role="tab">Yard Lease</a> </li>
                    <li class="nav-item" id="otherRentsTab"><a class="nav-link" data-bs-toggle="tab" href="#otherrents" role="tab">Other Rents</a> </li>
                    <li class="nav-item" id="LandBldgTab"><a class="nav-link" data-bs-toggle="tab" href="#landbldgrentanalysics" role="tab">Land / Bldg. Rent Analysics</a> </li>
                    <li class="nav-item id="spLeaseEcoTab""><a class="nav-link" data-bs-toggle="tab" href="#spaceleaseeconomics" role="tab">Space Lease Economics</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#transaction" role="tab">Transaction Data</a> </li>
                    <li class="nav-item" id="multFamTab"><a class="nav-link" data-bs-toggle="tab" href="#rentalMf" role="tab">Multi Family</a> </li>
                    <li class="nav-item" id="MinStoreTab"><a class="nav-link" data-bs-toggle="tab" href="#ministorage" role="tab">Mini Storage</a> </li>
                    <?php if($login_ro == 0) { ?>
                    <li class="nav-item"><a class="nav-link _selectTab" data-bs-toggle="tab" href="#addphotos" role="tab">Photos</a> </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <?php if($login_ro == 0) { ?>
          <div class="reportSave" id="reportSave">
            <input type="submit" name="submit" class="submit" value="Save Report">
          </div>
          <?php } ?>
        </div>
        <div class="tab-content"> 
          <!-- File information Tab-->
          <div id="fileinformation4" class="tab-pane fade" role="tabpanel">
            <div class="grouprow">
              <div class="col-4 groupsection">
                <div class="grouphead">File Information</div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Status:</label>
                    <select class="form-select _formUpdate" name="status">
                      <?php
                      for ( $s = 0; $s < count( $statusData ); $s++ ) {
                        ?>
                      <option value='<?php echo $statusData[$s]["id"]; ?>' <?php 
																				        if ( $leases->getStatus() == $statusData[$s]["id"] ) {
																				            ?>selected='selected'<?php 
																				        }
																				        ?> ><?php echo $statusData[$s]["status"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Priority:</label>
                    <select class="form-select _formUpdate" name="priority">
                      <?php
                      for ( $s = 0; $s < count( $priorityData ); $s++ ) {
                        ?>
                      <option value='<?php echo $priorityData[$s]["id"]; ?>' <?php
																				        if ( $leases->getPriority() == $priorityData[$s]["id"] ) {
																				            ?>selected='selected'<?php 
																				        }
																				        ?> ><?php echo $priorityData[$s]["priority"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Assign To:</label>
                    <select class="form-select _formUpdate" name="AssignedTo">
                      <?php
                      for ( $s = 0; $s < count( $usersData ); $s++ ) {
                        ?>
                      <option value='<?php echo $usersData[$s]["id"]; ?>' <?php
    																			        if ( $leases->getAssignedTo() == $usersData[$s]["id"] ) {
    																			            ?>selected='selected'<?php 
    																			        }
    																			        ?> ><?php echo $usersData[$s]["firstname"]." ".$usersData[$s]["lastname"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Due Date:</label>
                    <input type="date" class="form-control _formUpdate" name="DueDate" value="<?php echo $leases->getDueDate(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File Tools </div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Report Name:</label>
                    <input type="hidden" name="id" value="<?php echo $leases->getId(); ?>" class='_formUpdate' />
                    <input type="hidden" name="reportID" value="<?php echo $leases->getId(); ?>" class='_formUpdate' />
                    <input type="text" class="form-control _formUpdate" name="reportname" id="reportName" value="<?php echo $leases->getReportname(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Template:</label>
                    <select class="form-select _formUpdate" name="template" id="_exportlsTemplate">
                      <?php
                      for ( $s = 0; $s < count( $templateData ); $s++ ) {
                        ?>
                      <option value='<?php echo $templateData[$s]["id"]; ?>' data-tpath='<?php echo $templateData[$s]["templatepath"]; ?>' <?php
																			            if ( $leases->getTemplate() == $templateData[$s]["id"] ) {
																			            ?>selected='selected'<?php 
                                                                                        }
								                                                        ?> ><?php echo $templateData[$s]["templatename"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row btnWord"><a style='cursor:pointer;' class='_generateReportWordBtn golden-btn' data-spreview='0' data-ttype='land-sales' data-id='<?php echo $leases->getId(); ?>'>Generate Word Report</a></div>
                  <?php if(!empty($leases->getID())) { ?>
                  <div class="form-group row">
                    <?php if($login_power == 1 || $login_ro == 0) { ?>
                    <select class="form-select _formUpdate" id="type">
                      <option value="1" data-page="appraisals.php">Appraisal Report</option>
                      <option value="2" data-page="improvedsales.php" >Improved Sale</option>
                      <option value="3" data-page="leases.php">Lease</option>
                      <option value="4" data-page="landsales.php">Land Sale</option>
                    </select>
                    <a style="cursor:pointer;" class="clonebtn" id='cloneReport' >Clone</a>
                    <?php } ?>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File History </div>
                <div class="fieldsareawhead label100">
                  <div class="form-group row">
                    <label>Date Created:</label>
                    <div class="filedetails"><?php echo $leases->getDateCreated(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Created By:</label>
                    <div class="filedetails"><?php echo $leases->getCreatedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Date Modified:</label>
                    <div class="filedetails"><?php echo $leases->getDateModified(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Modified By:</label>
                    <div class="filedetails"><?php echo $leases->getModifiedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>File Origin:</label>
                    <div class="filedetails">
                      <?php if($leases->getFileOrigin() == 'Original File') { echo $leases->getFileOrigin(); } else { ?>
                      <a href='<?php echo $leases->getClonelink(); ?>' target="_blank"><?php echo $leases->getFileOrigin(); ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End file information --> 
          <!-- Lease ID -->
          <div id="location" class="tab-pane active" role="tabpanel">
            <div class="grouprow">
              <div class="col-6 groupsection label130" style="margin-bottom: 0px;">
                <div class="fieldsarea">
                  <div class="form-group row border-0">
                    <label>Enter Address</label>
                    <input type="text" name="address" class="_address form-control _formUpdate _bmtxtfield" id="autocomplete" (focus)="geolocate()" value="<?php echo $leases->getAddress(); ?>"/>
                  </div>
                  <div class="col-6 groupsection padding-0" style="float: left; margin-bottom: 0px;">
                    <div class="form-group row">
                      <label>Property Name</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" name="property_name" value="<?php echo $leases->getProperty_name(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Street Number</label>
                      <input class="form-control _formUpdate _bmtxtfield" name="streetnumber" id="street_number" type="text" value="<?php echo $leases->getStreetnumber(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Street Name</label>
                      <input class="form-control _formUpdate _bmtxtfield" name="streetname" id="route" type="text" value="<?php echo $leases->getStreetname(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>City</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" name="city" id="locality" value="<?php echo $leases->getCity(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>County</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" name="county" id="administrative_area_level_2" value="<?php echo $leases->getCounty(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>State</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" id="administrative_area_level_1" name="state" value="<?php echo $leases->getState(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Zip Code</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" id="postal_code" name="zip_code" value="<?php echo $leases->getZip_code(); ?>"/>
                    </div>
                  </div>
                  <div class="col-6 groupsection padding-0" style="float: right">
                    <div class="form-group row">
                      <label>Property Type</label>
                      <select class="form-select _formUpdate _bms20field" name="propertytype" id='selectPropertType'>
                        <?php

                        for ( $s = 0; $s < count( $propertyData ); $s++ ) {
                          ?>
                        <option value='<?php echo $propertyData[$s]["id"]; ?>' <?php
																        if ( $leases->getPropertytype() == $propertyData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $propertyData[$s]["propertytype"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Property Sub-Type</label>
                      <select class="form-select _formUpdate _bmsfield" name="propertysubtype" id='selectSubPropertType'>
                        <?php
                        for ( $s = 0; $s < count( $subPropertyData ); $s++ ) {
                          ?>
                        <option value='<?php echo $subPropertyData[$s]["id"]; ?>' <?php
																        if ( $leases->getPropertysubtype() == $subPropertyData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $subPropertyData[$s]["subtype"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row _mobhomeShow">
                      <label>Park Type</label>
                      <select class="form-select _formUpdate _bms3field" name="park_type">
                        <?php
                        for ( $s = 0; $s < count( $parktypeData ); $s++ ) {
                          ?>
                        <option value='<?php echo $parktypeData[$s]["id"]; ?>' <?php if ( $leases->getPark_type() == $parktypeData[$s]["id"] ) { ?>selected='selected'
                                                                <?php
                                                                }
                                                                ?> > <?php echo $parktypeData[$s]["definition"];?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>MSA</label>
                      <input type="text" list="msalist" class="form-control _formUpdate" name="msa" value="<?php echo $leases->getMsa(); ?>"/>
                      <datalist id="msalist">
                        <?php
                        for ( $c = 0; $c < count( $msalist ); $c++ ) {
                          ?>
                        <option><?php echo $msalist[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group row">
                      <label>General Market Area</label>
                      <select class="form-select _formUpdate" name="genmarket" id="selectMarketArea">
                        <?php
                        for ( $s = 0; $s < count( $marketData ); $s++ ) {
                          ?>
                        <option value='<?php echo $marketData[$s]["id"]; ?>' <?php
																        if ( $leases->getGenmarket() == $marketData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $marketData[$s]["genmarket"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Submarket Name</label>
                      <select class="form-select _formUpdate" name="submarkid" id="selectSubMarketArea">
                        <?php
                        for ( $s = 0; $s < count( $subMarketData ); $s++ ) {
                          ?>
                        <option value='<?php echo $subMarketData[$s]["id"]; ?>' <?php
																        if ( $leases->getSubmarkid() == $subMarketData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $subMarketData[$s]["submarket"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Eminent Domain?</label>
                      <input type="checkbox" name="emdomain" class="form-check-input" id="emdomain" value="1" <?php if ($leases->getEmdomain()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                    <input type="hidden" class="form-control _formUpdate" name="lat" id="latitude" value="<?php echo $leases->getLat(); ?>" />
                    <input type="hidden" class="form-control _formUpdate" name="lng" id="longitude" value="<?php echo $leases->getLng(); ?>" />
                  </div>
                </div>
              </div>
              <div class="groupsection label100 spimgarea">
                <div class="grouphead">Property Photo</div>
                <div class="fieldsareawhead label125">
                  <div class="section-inner-width imgPlc" id="subjectPhoto">
                    <?php if ($leases->getId() != '') { ?>
                    <a href="../comp_images/<?php echo $leases->getImage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $leases->getImage();?>" style='cursor:pointer;' data-type='property-photo' /> </a>
                    <?php } else {?>
                    <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                    <?php } ?>
                    <div style='display:none;'>
                      <label for="sp1" class="custom-file-upload">Subject Photo</label>
                    </div>
                    <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="photo1" class="_photo"/>
                    <input type='hidden' name="photo1path" id='photo1path' value="<?php echo $leases->getPhoto1(); ?>" />
                    <input type='hidden' name="thumbpath" id="thumbpath" value="<?php echo $leases->getThumbnail(); ?>"/>
                  </div>
                  <?php if($login_ro == 0) { ?>
                  <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp1' data-container='subjectPhoto'/></a>
                    <?php if ($leases->getPhoto1() != '') { ?>
                    <a class='fa fa-trash img-del' data-rel-photo-btn='sp1' data-container='subjectPhoto'/></a>
                    <?php } ?>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="groupsection label100 spimgarea">
                <div class="grouphead">Map View</div>
                <div class="fieldsareawhead label125">
                  <div class="section-inner-width">
                    <div id="map-canvas"></div>
                  </div>
                  <div class="form-group">If the marker is not on the correct property, you can move it to the appropriate place.</div>
                </div>
              </div>
            </div>
            <div class="grouprow" style="padding: 5px;">
              <div class="groupsection col-12 label125">
                <div class="fieldsarea">
                  <div class="grouprow">
                    <div class="col-3 form-group row padding-0">
                      <label>Traffic Count</label>
                      <input type="text" class="form-control _formUpdate _bmtxtfield" name="traffic_count" id="trafficCount" value="<?php echo $leases->getTraffic_count(); ?>"/>
                    </div>
                    <div class="col-3 form-group row padding-0">
                      <label>Date</label>
                      <input type="text" class="form-control _formUpdate" name="traffic_date" value="<?php echo $leases->getTraffic_date(); ?>"/>
                    </div>
                    <div class="col-3 form-group row padding-0" style="padding-right: 10px; float: right;">
                      <label>Intersector Street</label>
                      <input type="text" class="form-control _formUpdate" name="inter_street" value="<?php echo $leases->getInter_street(); ?>"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Location tab--> 
          <!--General Project DataTab-->
          <div id="generalprojectdata" class="tab-pane fade">
            <div class="grouprow" id="MFCheck">
              <div class="col-3 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Show Absorption Date</label>
                    <input type="checkbox" name="showabsorb1" class="form-check-input" value="1" id="showAbsorb" <?php if ($leases->getShowabsorb1() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Show Yard Lease</label>
                    <input type="checkbox" name="showyard" class="form-check-input" value="1" id="showYard" <?php if ($leases->getShowyard() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Show Other Rents</label>
                    <input type="checkbox" name="showor"class="form-check-input"  value="1" id="showOtherRent" <?php if ($leases->getShowor() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Show Land / Bldg Rent Analysis</label>
                    <input type="checkbox" name="show_land_bldg" class="form-check-input" value="1" id="showLBRent" <?php if ($leases->getShow_land_bldg() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection label190 padding-0" id="GenDataTab">
                <div class="fieldsarea">
                  <div class="form-group row hideSS">
                    <label>Gross Building Area (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc overall_gba _formUpdate _bmtxtfield" name="overall_gba" value="<?php echo $leases->getOverall_gba(); ?>"/>
                  </div>
                  <div class="form-group row hideSS">
                    <label>Total Project Size (SF GLA/NRA)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc overall_nra _formUpdate _bmtxtfield" name="overall_nra" value="<?php echo $leases->getOverall_nra(); ?>"/>
                  </div>
                  <div class="form-group row hideSS">
                    <label>Project Vacancy (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc vacancy_sf_nra _formUpdate _bmtxtfield" name="vacancy_sf_nra" value="<?php echo $leases->getVacancy_sf_nra(); ?>"/>
                  </div>
                  <div class="form-group row hideSS">
                    <label>Project Vacancy (%)</label>
                    <input type="text" class="form-control _formUpdate _fm01tp _ppgc" id="projvacancypct" name="oe_vacany_pct" value="<?php echo $leases->getOe_vacany_pct(); ?>" readonly/>
                  </div>
                  <div class="form-group row _showInline">
                    <label>In-Line Space (SF GLA)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc inline_space_sf _formUpdate _bmtxtfield" name="inline_space_sf" value="<?php echo $leases->getInline_space_sf(); ?>"/>
                  </div>
                  <div class="form-group row _showInline">
                    <label>In-Line Space Vacancy (%)</label>
                    <input type="text" class="form-control _formUpdate _fm01tp _ppgc" id="inlinevacancypct _bmtxtfield" name="inline_vacancy_pct" value="<?php echo $leases->getInline_vacancy_pct(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Tenant Area (GLA / NRA - SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc tenant_area_sf _bmtxtfield" name="tenant_area_sf" value="<?php echo $leases->getTenant_area_sf(); ?>"/>
                  </div>
                  <div class="form-group row showFloor">
                    <label>Floor Number </label>
                    <input list="flono" type="text" class="form-control" name="floor_number" value="<?php echo $leases->getFloor_number(); ?>"/>
                    <datalist id="flono">
                      <?php
                      for ( $c = 0; $c < count( $flono ); $c++ ) {
                        ?>
                      <option><?php echo $flono[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label190 padding-0" id="PropDataTab">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Project Site Area Available?</label>
                    <input type="checkbox" name="proj_site" class="form-check-input" id="projsite" value="1" <?php if ($leases->getProj_site() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row _projSite">
                    <label>Project Site Area (SF) </label>
                    <input type="text" class="form-control calc _fm00t _ppgc gross_land_sf _formUpdate" name="gross_land_sf" value="<?php echo $leases->getGross_land_sf(); ?>"/>
                  </div>
                  <div class="form-group row _projSite">
                    <label>Project Site Area (Acres) </label>
                    <input type="text" class="form-control _formUpdate _fm03t _ppgc" id="glaacres" name="gross_land_acre" value="<?php echo $leases->getGross_land_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group row _projSite">
                    <label>Land-to-Bldg. Ratio</label>
                    <input type="text" class="form-control _formUpdate _fm01tr _ppgc" id="ltbratio" name="land_build_ratio_primary" value="<?php echo $leases->getLand_build_ratio_primary(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>No. of Parking Stalls</label>
                    <input type="text" class="form-control calc _fm00t _ppgc parking_stalls _formUpdate" name="parking_stalls" value="<?php echo $leases->getParking_stalls(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Parking Ratio</label>
                    <input type="text" id="parkratio" class="form-control _formUpdate _fm02f" name="parking_ratio_gba" value="<?php echo $leases->getParking_ratio_gba(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Parking Ratio - Input</label>
                    <input list="parratlist" class="form-control _formUpdate _bmtxtfield" name="parking_ratio" value="<?php echo $leases->getParking_ratio(); ?>"/>
                    <datalist id="parratlist">
                      <?php
                      for ( $c = 0; $c < count( $parratlist ); $c++ ) {
                        ?>
                      <option><?php echo $parratlist[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label160 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Year(s) Built</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="year_built" value="<?php echo $leases->getYear_built(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label> Last Renovation Year</label>
                    <input type="text" list="YBlastReno" class="form-control _formUpdate _bmtxtfield" name="last_renovation" value="<?php echo $leases->getLast_renovation(); ?>"/>
                    <datalist id="YBlastReno">
                      <?php
                      for ( $c = 0; $c < count( $YBlastReno ); $c++ ) {
                        ?>
                      <option><?php echo $YBlastReno[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row _hideMFProp">
                    <label>Occupancy Type </label>
                    <select class="form-select _formUpdate _bms3field" name="occupancy_type">
                      <?php
                      for ( $s = 0; $s < count( $occupancyTypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $occupancyTypeData[$s]["id"]; ?>' <?php if ( $leases->getOccupancy_type() == $occupancyTypeData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                    }
                                                                            ?> > <?php echo $occupancyTypeData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Number Of Buildings</label>
                    <input type="number" step="1" class="form-control _formUpdate" name="no_building" value="<?php echo $leases->getNo_building(); ?>"/>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Number Of Stories</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="no_stories" value="<?php echo $leases->getNo_stories(); ?>"/>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Construction Description</label>
                    <input type="text" list="codescrip" class="form-control _formUpdate _bmtxtfield" name="const_descr" value="<?php echo $leases->getConst_descr(); ?>"/>
                    <datalist id="codescrip">
                      <?php
                      for ( $c = 0; $c < count( $codescrip ); $c++ ) {
                        ?>
                      <option><?php echo $codescrip[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Construction Features</label>
                    <input type="text" list="confealist" class="form-control _formUpdate _bmtxtfield" name="other_const_features" value="<?php echo $leases->getOther_const_features(); ?>"/>
                    <datalist id="confealist">
                      <?php
                      for ( $c = 0; $c < count( $confealist ); $c++ ) {
                        ?>
                      <option><?php echo $confealist[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row _officedata">
                    <label>Elevators?</label>
                    <select class="form-select _bms3field" name="off_elevator_service">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getOff_elevator_service() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row _mobhome">
                    <label>Building Quality</label>
                    <select class="form-select _formUpdate _bms3field" name="building_quality">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $leases->getBuilding_quality() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _officedata">
                    <label>Building Class</label>
                    <select class="form-select _formUpdate _bms3field" name="building_class">
                      <?php
                      for ( $s = 0; $s < count( $bclassData ); $s++ ) {
                        ?>
                      <option value='<?php echo $bclassData[$s]["id"]; ?>' <?php if ( $leases->getBuilding_class() == $bclassData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $bclassData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Interior Condition </label>
                    <select class="form-select _formUpdate _bms3field" name="int_condition">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $leases->getInt_condition() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Exterior Condition </label>
                    <select class="form-select _formUpdate _bms3field" name="ext_condition">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $leases->getExt_condition() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhomeShow">
                    <label>Park Quality</label>
                    <select class="form-select _bms3field" name="park_quality">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $leases->getPark_quality() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhomeShow">
                    <label>Park Condition</label>
                    <select class="form-select _bms3field" name="park_cond">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $leases->getPark_cond() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _hideMFProp">
                    <label>Exposure</label>
                    <select class="form-select _formUpdate _bms3field" name="exposure">
                      <?php
                      for ( $s = 0; $s < count( $exposureData ); $s++ ) {
                        ?>
                      <option value='<?php echo $exposureData[$s]["id"]; ?>' <?php if ( $leases->getExposure() == $exposureData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $exposureData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _hideMFProp">
                    <label>Site Access</label>
                    <select class="form-select _formUpdate _bms3field" name="site_access">
                      <?php
                      for ( $s = 0; $s < count( $siteAccessData ); $s++ ) {
                        ?>
                      <option value='<?php echo $siteAccessData[$s]["id"]; ?>' <?php if ( $leases->getSite_access() == $siteAccessData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $siteAccessData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mobhome">
                    <label>Fire Sprinklers?</label>
                    <select class="form-select _bms3field" name="off_fire_sprinkler">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getOff_fire_sprinkler() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                    }
                                                                            ?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _officedata">
                    <label>HVAC or Heating Only?</label>
                    <input type="text" list="offhvactype" class="form-control _bms3field" name="off_type_hvac" value="<?php echo $leases->getOff_type_hvac(); ?>"/>
                    <datalist id="offhvactype">
                      <?php
                      for ( $c = 0; $c < count( $offhvactype ); $c++ ) {
                        ?>
                      <option><?php echo $offhvactype[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow" id="demSpaceTab">
              <div class="col-6 groupsection label200 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row showOffice">
                    <label>Office Build-Out Area (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc office_bo_sf _formUpdate _bmtxtfield" name="office_bo_sf" value="<?php echo $leases->getOffice_bo_sf(); ?>"/>
                  </div>
                  <div class="form-group row" style="display: none">
                    <label>Flex Office Space (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc flex_off_sf _formUpdate _bmtxtfield" name="flex_off_sf" value="<?php echo $leases->getFlex_off_sf(); ?>"/>
                  </div>
                  <div class="form-group row showRoomhide">
                    <label>Showroom / Office Area (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc veh_showroom_sf _bmtxtfield" name="veh_showroom_sf" value="<?php echo $leases->getVeh_showroom_sf(); ?>"/>
                  </div>
                  <div class="form-group row showRoomhide">
                    <label>Showroom / Office Area (% GBA)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="showroompct" name="veh_showroom_pct" value="<?php echo $leases->getVeh_showroom_pct(); ?>" readonly/>
                  </div>
                  <div class="form-group row showRoomhide">
                    <label>Service Area (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc veh_service_sf _bmtxtfield" name="veh_service_sf" value="<?php echo $leases->getVeh_service_sf(); ?>"/>
                  </div>
                  <div class="form-group row moreVehshow">
                    <label>No. of Service Bays or Tunnels</label>
                    <input type="text" class="form-control calc _fm00t _ppgc veh_tunnel _bmtxtfield" name="veh_tunnel" value="<?php echo $leases->getVeh_tunnel(); ?>"/>
                  </div>
                  <div class="form-group row PDShopping">
                    <label>Anchor Tenants</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="shop_anchor_tenant"><?php echo $leases->getShop_anchor_tenant(); ?></textarea>
                  </div>
                  <div class="form-group row PDShopping">
                    <label>Other Major Tenants</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="shop_other_tenant"><?php echo $leases->getShop_other_tenant(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Space Generation?</label>
                    <select class="form-select _bms3field" name="space_generation">
                      <?php
                      for ( $s = 0; $s < count( $spacegenerData ); $s++ ) {
                        ?>
                      <option value='<?php echo $spacegenerData[$s]["id"]; ?>' <?php if ( $leases->getSpace_generation() == $spacegenerData[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
                                                                        }
                                                                                ?> > <?php echo $spacegenerData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row IndOffhide">
                    <label>Space Position in Center?</label>
                    <select class="form-select _bms3field" name="space_position">
                      <?php
                      for ( $s = 0; $s < count( $spacepositionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $spacepositionData[$s]["id"]; ?>' <?php if ( $leases->getSpace_position() == $spacepositionData[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
                                                                        }
                                                                                ?> > <?php echo $spacepositionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row showOffice">
                    <label>Office Build-Out %</label>
                    <input type="text" class="form-control _formUpdate _fm01tp _ppgc" id="officebopct" name="office_bo_pct" value="<?php echo $leases->getOffice_bo_pct(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Load Factor %</label>
                    <input type="text" class="form-control _formUpdate _fm01tp _ppgc" name="load_factor" value="<?php echo $leases->getLoad_factor(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Load Factor % - INPUT</label>
                    <input list="loadfac" class="form-control" name="load_factor_input _bmtxtfield" value="<?php echo $leases->getLoad_factor_input(); ?>"/>
                    <datalist id="loadfac">
                      <?php
                      for ( $c = 0; $c < count( $loadfac ); $c++ ) {
                        ?>
                      <option><?php echo $loadfac[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row flexpctHide">
                    <label>Flex Office % of NRA</label>
                    <input type="text" class="form-control _formUpdate _fm01tp _ppgc" id="flexpct" name="flex_off_pct_nra" value="<?php echo $leases->getFlex_off_pct_nra(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label150 padding-0 showRest">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>No. of Seats</label>
                    <input type="text" class="form-control" name="rest_no_seats" value="<?php echo $leases->getRest_no_seats(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Drive Through</label>
                    <select class="form-select" name="rest_drive_thru">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getRest_drive_thru() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Is Alcohol Served? </label>
                    <select class="form-select" name="rest_alcohol">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getRest_alcohol() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Playground</label>
                    <select class="form-select" name="rest_playground">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getRest_playground() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDIndustrial">
              <div class="col-6 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Truck Doors - Grade Level or Ramped</label>
                    <input type="text" list="tdRamp" class="form-control _bmtxtfield" name="ind_truck_grade" value="<?php echo $leases->getInd_truck_grade(); ?>"/>
                    <datalist id="tdRamp">
                      <?php
                      for ( $c = 0; $c < count( $tdRamp ); $c++ ) {
                        ?>
                      <option><?php echo $tdRamp[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Truck Doors - Dock High</label>
                    <input type="text" list="tdDock" class="form-control _bmtxtfield" name="ind_truck_dock" value="<?php echo $leases->getInd_truck_dock(); ?>"/>
                    <datalist id="tdDock">
                      <?php
                      for ( $c = 0; $c < count( $tdDock ); $c++ ) {
                        ?>
                      <option><?php echo $tdDock[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Clear Height (Feet) </label>
                    <input type="text" list="cheightlist" class="form-control _bmtxtfield" name="ind_clear_height" value="<?php echo $leases->getInd_clear_height(); ?>"/>
                    <datalist id="cheightlist">
                      <?php
                      for ( $c = 0; $c < count( $cheightlist ); $c++ ) {
                        ?>
                      <option><?php echo $cheightlist[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Rail Served? </label>
                    <select class="form-select _bms3field" name="ind_rail">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getInd_rail() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
                                                                            }
                                                                                    ?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Type of Heating?</label>
                    <input type="text" list="hvaclist" class="form-control _bmtxtfield" name="ind_hvac" value="<?php echo $leases->getInd_hvac(); ?>"/>
                    <datalist id="hvaclist">
                      <?php
                      for ( $c = 0; $c < count( $hvaclist ); $c++ ) {
                        ?>
                      <option><?php echo $hvaclist[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow label150" id="vehRelateTab">
              <div class="col-6 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Level of Service</label>
                    <select class="form-select _bms3field" name="veh_level">
                      <?php
                      for ( $s = 0; $s < count( $lvlserviceData ); $s++ ) {
                        ?>
                      <option value='<?php echo $lvlserviceData[$s]["id"]; ?>' <?php if ( $leases->getVeh_level() == $lvlserviceData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
}
?> > <?php echo $lvlserviceData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Dealer Brand Name</label>
                    <input type="text" class="form-control" name="veh_dealer_name" value="<?php echo $leases->getVeh_dealer_name(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End General Project Data --> 
          <!-- Absorption Data -->
          <div id="projectabsorptiondata" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Pre-Leasing (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc pre_lease_sf" name="pre_lease_sf" value="<?php echo $leases->getPre_lease_sf(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Total Leased (% of Total NRA/GLA)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="leasepctnra" name="total_lease_pct_nra" value="<?php echo $leases->getTotal_lease_pct_nra(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Pre-Leasing (% of Total NRA/GLA)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="preleasenra" name="pre_lease_pct_nra" value="<?php echo $leases->getPre_lease_pct_nra(); ?>" readonly/>
                  </div>
                  <div class="form-group row _shopAbsorb">
                    <label>Total Leased (% of In-Line GLA)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="leasepctinline" name="total_lease_pct_inline" value="<?php echo $leases->getTotal_lease_pct_inline(); ?>" readonly/>
                  </div>
                  <div class="form-group row _shopAbsorb">
                    <label>Pre-Leasing (% of In-Line GLA)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="preleaseinline" name="pre_lease_pct_inline" value="<?php echo $leases->getPre_lease_pct_inline(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Start Date - Preleasing</label>
                    <input type="text" class="form-control" name="start_date" placeholder="(mm/dd/yyyy)" value="<?php echo $leases->getStart_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>End Date</label>
                    <input type="text" class="form-control" name="end_date" placeholder="(mm/dd/yyyy)" value="<?php echo $leases->getEnd_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>No. of Mos. in Absorption Period</label>
                    <input type="text" class="form-control calc _fm00t _ppgc no_mos_absorb" name="no_mos_absorb" value="<?php echo $leases->getNo_mos_absorb(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Total Space Absorbed (SF)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc total_absorb_sf" name="total_absorb_sf" value="<?php echo $leases->getTotal_absorb_sf(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>SF Absorption / Mo.</label>
                    <input type="text" class="form-control _fm00t _ppgc" id="absorbpermo" name="sf_absorb_mo" value="<?php echo $leases->getSf_absorb_mo(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Absorption Comments</label>
                    <textarea class="form-control" rows="6" name="absorb_comment"><?php echo $leases->getAbsorb_comment(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Absorption Data --> 
          <!-- Yard Lease -->
          <div id="yardlease" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Land Area of Yard Space (SF)</label>
                    <input type="text" class="form-control _fm00t _ppgc" name="yard_land_area_sf" value="<?php echo $leases->getYard_land_area_sf(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Description of Yard Space</label>
                    <input list="descyardspace" class="form-control" name="desc_yard_space" value="<?php echo $leases->getDesc_yard_space(); ?>"/>
                    <datalist id="descyardspace">
                      <?php
                      for ( $c = 0; $c < count( $descyardspace ); $c++ ) {
                        ?>
                      <option><?php echo $descyardspace[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Yard Lease Expense Terms</label>
                    <select class="form-select" name="yard_lease_exp_term">
                      <?php
                      for ( $s = 0; $s < count( $leaseexptermData ); $s++ ) {
                        ?>
                      <option value='<?php echo $leaseexptermData[$s]["id"]; ?>' <?php if ( $leases->getYard_lease_exp_term() == $leaseexptermData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $leaseexptermData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>-Yard Expense Terms Adjustment</label>
                    <select class="form-select" name="yard_exp_terms_adj">
                      <?php
                      for ( $s = 0; $s < count( $leaseexpadjData ); $s++ ) {
                        ?>
                      <option value='<?php echo $leaseexpadjData[$s]["id"]; ?>' <?php if ( $leases->getYard_exp_terms_adj() == $leaseexpadjData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $leaseexpadjData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Initial Yard Rent / SF / Mo.</label>
                    <input type="text" class="form-control _cfm03t" name="init_yard_rent_sf_mo" value="<?php echo $leases->getInit_yard_rent_sf_mo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Yard Rent / SF / Mo.</label>
                    <input type="text" class="form-control _cfm03t" name="eff_yard_rent_sf_mo" value="<?php echo $leases->getEff_yard_rent_sf_mo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>-Effective Yard Rent Comment</label>
                    <input list="EffectRentComment" class="form-control" name="eff_yard_rent_comment" value="<?php echo $leases->getEff_yard_rent_comment(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Yard Concession Description</label>
                    <input list="SLConcDesc" class="form-control" name="yard_concession_desc" value="<?php echo $leases->getYard_concession_desc(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Yard CAM Expenses - $ / SF / Mo.</label>
                    <input list="yarcamexp" class="form-control" name="yard_cam_sf_mo" value="<?php echo $leases->getYard_cam_sf_mo(); ?>"/>
                    <datalist id="yarcamexp">
                      <option value="---">
                      <option value="$0.015"> 
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Schedule of Contract Yard Rents</label>
                    <textarea class="form-control" rows="4" name="sched_yard_contracts"><?php echo $leases->getSched_yard_contracts(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Desc. of Yard Lease Escalation Terms</label>
                    <input list="SLEEscalation" class="form-control" name="desc_yard_esc_terms" value="<?php echo $leases->getDesc_yard_esc_terms(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Yard Lease Comments</label>
                    <textarea class="form-control" rows="4" name="yard_lease_comments" style="font-size: 16px"><?php echo $leases->getYard_lease_comments(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Confidential Comments</label>
                    <textarea class="form-control" rows="4" name="conf_yard_comments" style="font-size: 16px"><?php echo $leases->getConf_yard_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Yard Lease --> 
          <!-- Other Rents -->
          <div id="otherrents" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Other Rent Tenant</label>
                    <input type="text" class="form-control" name="or_tenant" value="<?php echo $leases->getOr_tenant(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Other Rent Types</label>
                    <select class="form-select" name="ortypes">
                      <?php
                      for ( $s = 0; $s < count( $ortypesData ); $s++ ) {
                        ?>
                      <option value='<?php echo $ortypesData[$s]["id"]; ?>' <?php if ( $leases->getOrtypes() == $ortypesData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $ortypesData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Description of Other Rent Space</label>
                    <textarea class="form-control" rows="2" name="desc_or_space" style="font-size: 16px"><?php echo $leases->getDesc_or_space(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Other Rent Expense Terms</label>
                    <select class="form-select" name="or_lease_exp_term">
                      <?php
                      for ( $s = 0; $s < count( $or_lease_exp_termData ); $s++ ) {
                        ?>
                      <option value='<?php echo $or_lease_exp_termData[$s]["id"]; ?>' <?php if ( $leases->getOr_lease_exp_term() == $or_lease_exp_termData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $or_lease_exp_termData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>- Other Rent Expense Terms Adjust.</label>
                    <select class="form-select" name="or_exp_terms_adj">
                      <?php
                      for ( $s = 0; $s < count( $or_exp_terms_adjData ); $s++ ) {
                        ?>
                      <option value='<?php echo $or_exp_terms_adjData[$s]["id"]; ?>' <?php if ( $leases->getOr_lease_exp_term() == $or_exp_terms_adjData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $or_exp_terms_adjData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Rental Rate ($ / Mo.)</label>
                    <input type="text" class="form-control _cfm00t" name="other_rent_sf_mo" value="<?php echo $leases->getOther_rent_sf_mo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>- Effective Other Rent Comment</label>
                    <input list="EffectRentComment" class="form-control" name="eff_or_comment" value="<?php echo $leases->getEff_or_comment(); ?>"/>
                    <datalist id="EffectRentComment">
                      <?php
                      for ( $c = 0; $c < count( $EffectRentComment ); $c++ ) {
                        ?>
                      <option><?php echo $EffectRentComment[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Other Rent Concession Desc.</label>
                    <input list="SLConcDesc" class="form-control" name="or_concession_desc" value="<?php echo $leases->getOr_concession_desc(); ?>"/>
                    <datalist id="SLConcDesc">
                      <?php
                      for ( $c = 0; $c < count( $SLConcDesc ); $c++ ) {
                        ?>
                      <option><?php echo $SLConcDesc[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Other Rent Term (Mos.)</label>
                    <input list="ortermsmo" class="form-control" name="orterms" value="<?php echo $leases->getOrterms(); ?>"/>
                    <datalist id="ortermsmo">
                      <option value="---">
                      <option value="1.0">
                      <option value="2.0">
                      <option value="3.0">
                      <option value="4.0">
                      <option value="5.0">
                      <option value="6.0">
                      <option value="12.0"> 
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Date of Lease or Survey</label>
                    <input type="date" class="form-control" name="or_survey" value="<?php echo $leases->getOr_survey();?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Schedule of Contract Other Rents</label>
                    <textarea class="form-control" rows="4" name="sched_or_contracts"><?php echo $leases->getSched_or_contracts(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Desc. of Other Rent Escalation Terms</label>
                    <input list="SLEEscalation" class="form-control" name="desc_or_esc_terms" value="<?php echo $leases->getDesc_or_esc_terms(); ?>"/>
                    <datalist id="SLEEscalation">
                      <?php
                      for ( $c = 0; $c < count( $SLEEscalation ); $c++ ) {
                        ?>
                      <option><?php echo $SLEEscalation[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Other Rent Comments</label>
                    <textarea class="form-control" rows="4" name="or_comments" style="font-size: 16px"><?php echo $leases->getOr_comments(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Confirmed By</label>
                    <input list="conorby" class="form-control _bmtxtfield" name="or_confby" value="<?php echo $leases->getOr_confby(); ?>"/>
                    <datalist id="conorby">
                      <?php
                      for ( $c = 0; $c < count( $conorby ); $c++ ) {
                        ?>
                      <option><?php echo $conorby[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Confirmed Date</label>
                    <input type="date" class="form-control" name="or_conf_date" value="<?php echo $leases->getOr_conf_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source</label>
                    <input type="text" class="form-control" name="or_conf_source" value="<?php echo $leases->getOr_conf_source(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>aa File Number</label>
                    <input type="text" class="form-control" name="or_fileno" value="<?php echo $leases->getOr_fileno(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Other Rents --> 
          <!-- Land - Building Analysis -->
          <div id="landbldgrentanalysics" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Zoning Code</label>
                    <input type="text" class="form-control _bmtxtfield" name="zoning_code" value="<?php echo $leases->getZoning_code(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Project Site Area (SF)</label>
                    <input type="text" class="form-control _fm00t _ppgc" id="projsf" value="<?php echo $leases->getGross_land_sf(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Estimated Land Value / SF</label>
                    <input type="text" class="form-control calc _cfm02t _ppgc est_land_value_sf _bmtxtfield" name="est_land_value_sf" value="<?php echo $leases->getEst_land_value_sf(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Estimated Land Value</label>
                    <input type="text" class="form-control calc _cfm00t _ppgc est_land_value" id="estlandvalue" name="est_land_value" value="<?php echo $leases->getEst_land_value(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Rate of Return on Land</label>
                    <input type="text" class="form-control calc _fm02tp _ppgc rate_return_land _bmtxtfield" name="rate_return_land" value="<?php echo $leases->getRate_return_land(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Indicated Annual Land Rent</label>
                    <input type="text" class="form-control calc _cfm00t ind_ann_land_rent" id="indannlandrent" name="ind_ann_land_rent" value="<?php echo $leases->getInd_ann_land_rent(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Indicated Annual Bldg. Rent</label>
                    <input type="text" class="form-control _cfm00t _ppgc" id="indbldgrent" name="ind_ann_bldg_rent" value="<?php echo $leases->getInd_ann_bldg_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Indicated Annual Bldg. Rent / SF</label>
                    <input type="text" class="form-control _cfm02t _ppgc" id="indbldgrentsf" name="ind_ann_bldg_rent_sf" value="<?php echo $leases->getInd_ann_bldg_rent_sf(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Land - Building Analysis --> 
          <!-- Space Lease Economics  -->
          <div id="spaceleaseeconomics" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-6 groupsection label175 hideSS padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lease Expense Terms</label>
                    <select class="form-select _bms3field" name="lease_expense_term">
                      <?php
                      for ( $s = 0; $s < count( $leaseexptermData ); $s++ ) {
                        ?>
                      <option value='<?php echo $leaseexptermData[$s]["id"]; ?>' <?php if ( $leases->getLease_expense_term() == $leaseexptermData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $leaseexptermData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Expense Terms Adjustment</label>
                    <select class="form-select _bms3field" name="exp_term_adj">
                      <?php
                      for ( $s = 0; $s < count( $leaseexpadjData ); $s++ ) {
                        ?>
                      <option value='<?php echo $leaseexpadjData[$s]["id"]; ?>' <?php if ( $leases->getExp_term_adj() == $leaseexpadjData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
}
?> > <?php echo $leaseexpadjData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label190 padding-0 _hideMFProp">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Desc. of Lease Escalation Terms</label>
                    <input type="text" list="SLEEscalation" class="form-control _bmtxtfield" name="lease_esc_terms_desc" value="<?php echo $leases->getLease_esc_terms_desc(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Schedule of Contract Rents</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="sched_contract_rent"><?php echo $leases->getSched_contract_rent(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow indOnlyshow">
              <div class="col-6 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Initial Rent / SF / Mo. - Shell</label>
                    <input type="text" class="form-control calc _cfm03t _ppgc init_rent_sf_mo_shell _bmtxtfield" name="init_rent_sf_mo_shell" value="<?php echo $leases->getInit_rent_sf_mo_shell(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Initial Rent / SF / Mo. - Office</label>
                    <input type="text" class="form-control calc _cfm03t _ppgc init_rent_sf_mo_office _bmtxtfield" name="init_rent_sf_mo_office" value="<?php echo $leases->getInit_rent_sf_mo_office(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Initial Rent / SF / Mo. - Blended</label>
                    <input type="text" class="form-control _cfm03t _ppgc" id="initrentblendsfmo" name="init_rent_sf_mo_blend" value="<?php echo $leases->getInit_rent_sf_mo_blend(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label250 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Effective Rent / SF / Mo. - Shell</label>
                    <input type="text" class="form-control calc _cfm03t _ppgc eff_rent_sf_mo_shell _bmtxtfield" name="eff_rent_sf_mo_shell" value="<?php echo $leases->getEff_rent_sf_mo_shell(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Rent / SF / Mo. - Office</label>
                    <input type="text" class="form-control calc _cfm03t _ppgc eff_rent_sf_mo_office _bmtxtfield" name="eff_rent_sf_mo_office" value="<?php echo $leases->getEff_rent_sf_mo_office(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Rent / SF / Mo. - Blended</label>
                    <input type="text" class="form-control calc _cfm03t _ppgc eff_rent_sf_mo_blend" id="effrentblendsfmo" name="eff_rent_sf_mo_blend" value="<?php echo $leases->getEff_rent_sf_mo_blend(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label> - Effective Rent Comment</label>
                    <input list="EffectRentComment" class="form-control _bmtxtfield" name="eff_rent_comment_2" value="<?php echo $leases->getEff_rent_comment_2(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Tenant Paid CAM Expenses - $ / SF / Mo.</label>
                    <input type="text" class="form-control _bmtxtfield" name="tenant_paid_cam_sf_mo" value="<?php echo $leases->getTenant_paid_cam_sf_mo(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection label275 padding-0" id="hideMFandMini">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Initial Rent / SF / Yr.</label>
                    <input type="text" class="form-control calc _ppgc init_rent_sf_yr _bmtxtfield" id="initRentsfyear" name="init_rent_sf_yr" value="<?php echo $leases->getInit_rent_sf_yr(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Initial Monthly Rent</label>
                    <input type="text" class="form-control _cfm00t _ppgc" id="initmonrent" name="init_month_rent" value="<?php echo $leases->getInit_month_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Initial Annual Rent</label>
                    <input type="text" class="form-control calc _cfm00t _ppgc init_annual_rent" id="initannrent" name="init_annual_rent" value="<?php echo $leases->getInit_annual_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Rent / SF / Yr. </label>
                    <input type="text" class="form-control calc _ppgc eff_rent_sf_yr _bmtxtfield" id="effRentsfyear" name="eff_rent_sf_yr" value="<?php echo $leases->getEff_rent_sf_yr(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Monthly Rent</label>
                    <input type="text" class="form-control _cfm00t _ppgc" id="effmonrent" name="eff_month_rent" value="<?php echo $leases->getEff_month_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Effective Annual Rent</label>
                    <input type="text" class="form-control calc _cfm00t _ppgc eff_annual_rent" id="effannrent" name="eff_annual_rent" value="<?php echo $leases->getEff_annual_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row _EffRentST">
                    <label>Effective Annual Rent / Service Bay or Tunnel</label>
                    <input type="text" class="form-control _cfm00t _ppgc" id="effannrenttunnel" name="eff_annual_rent_tunnel" value="<?php echo $leases->getEff_annual_rent_tunnel(); ?>" readonly/>
                  </div>
                  <div class="form-group row indOnlyHide">
                    <label> - Effect. Rent Comment</label>
                    <input type="text" list="EffectRentComment" class="form-control _bmtxtfield" name="eff_rent_comment_1" value="<?php echo $leases->getEff_rent_comment_1(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label230 hideSS padding-0">
                <div class="fieldsarea">
                  <div class="form-group row PercRent">
                    <label>Percentage Rent</label>
                    <input type="text" class="form-control _bmtxtfield" name="percentage_rent" value="<?php echo $leases->getPercentage_rent(); ?>"/>
                  </div>
                  <div class="form-group row IndMFhide">
                    <label>Tenant Paid CAM Expenses - $ / SF / Yr.</label>
                    <input type="text" class="form-control _bmtxtfield" name="tenant_paid_cam_sf_yr" value="<?php echo $leases->getTenant_paid_cam_sf_yr(); ?>"/>
                  </div>
                  <div class="form-group row IndMFhide">
                    <label>Landlord Paid Expenses - $ / SF / Yr.</label>
                    <input type="text" class="form-control _cfm03t _ppgc _bmtxtfield" name="landlord_paid_exp_sf_yr" value="<?php echo $leases->getLandlord_paid_exp_sf_yr(); ?>"/>
                  </div>
                  <div class="form-group row IndMFhide">
                    <label>-Which Expenses does Landlord Pay?</label>
                    <input type="text" class="form-control _bmtxtfield" name="landord_pays" value="<?php echo $leases->getLandord_pays(); ?>"/>
                  </div>
                  <div class="form-group row _hideMFProp">
                    <label>Description of TI's</label>
                    <input type="text" class="form-control _bmtxtfield" name="desc_ti" value="<?php echo $leases->getDesc_ti(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Concession Description</label>
                    <input type="text" list="SLConcDesc" class="form-control _bmtxtfield" name="concessions_desc" value="<?php echo $leases->getConcessions_desc(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Space Lease Economics --> 
          <!-- Start Transaction Data -->
          <div id="transaction" class="tab-pane fade" role="tabpanel">
            <div class="grouprow">
              <div class="col-12 groupsection label125">
                <div class="fieldsarea">
                  <div class="form-group row" style="width: 20%;float: left;">
                    <label>Property Appraised</label>
                    <input type="checkbox" name="property_appraised" class="form-check-input" id="propapp" value="1" <?php if ($leases->getProperty_appraised()==1 ) echo 'checked="checked"'; ?>/>
                  </div>
                  <div class="form-group row _propapp" style="width: 39%;float: left;">
                    <label>aa Job File No.</label>
                    <input type="text" class="form-control" name="mc_job" value="<?php echo $leases->getMc_job(); ?>"/>
                  </div>
                  <div class="form-group row _propapp" style="width: 39%;float: right;">
                    <label>aa Appraiser Name</label>
                    <input list="apprnames" class="form-control" name="appraiser_name" value="<?php echo $leases->getAppraiser_name(); ?>"/>
                    <datalist id="apprnames">
                      <?php
                      for ( $c = 0; $c < count( $apprnames ); $c++ ) {
                        ?>
                      <option><?php echo $apprnames[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-4 groupsection label160 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lessor Name</label>
                    <input type="text" class="form-control _bmtxtfield" name="lessor_name" value="<?php echo $leases->getLessor_name(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lessee Name</label>
                    <input type="text" class="form-control _bmtxtfield" name="lessee_name" value="<?php echo $leases->getLessee_name(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Confidential Lessee?</label>
                    <input type="checkbox" name="conf_lessee" class="form-check-input" id="confless" value="1" <?php if ($leases->getConf_lessee() == 1) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row _confless">
                    <label>Confidential Lessee Name</label>
                    <input type="text" class="form-control" name="conf_lessee_name" value="<?php echo $leases->getConf_lessee_name(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lease - New or Renewal?</label>
                    <select class="form-select _bms3field" name="new_renewal">
                      <?php
                      for ( $s = 0; $s < count( $newrenewData ); $s++ ) {
                        ?>
                      <option value='<?php echo $newrenewData[$s]["id"]; ?>' <?php if ( $leases->getNew_renewal() == $newrenewData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
                                                                }
                                                                    ?> > <?php echo $newrenewData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Lessee Type</label>
                    <select class="form-select" name="lessee_type">
                      <?php
                      for ( $s = 0; $s < count( $lesseetypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $lesseetypeData[$s]["id"]; ?>' <?php if ( $leases->getLessee_type() == $lesseetypeData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
                                                                }
                                                                    ?> > <?php echo $lesseetypeData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Lease Options?</label>
                    <select class="form-select" name="lease_options" id="lease_options">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getLease_Options() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
                                                                }
                                                                    ?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _leaseOption">
                    <label>Description of Lease Options</label>
                    <input list="descLopt" class="form-control" name="lease_option_desc" value="<?php echo $leases->getLease_option_desc(); ?>" />
                    <datalist id="descLopt">
                      <?php
                      for ( $c = 0; $c < count( $descLopt ); $c++ ) {
                        ?>
                      <option><?php echo $descLopt[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lease Start Date</label>
                    <input type="date" class="form-control" name="lease_start_date" value="<?php echo $leases->getLease_start_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Start Date Comment</label>
                    <input type="text" class="form-control" name="lease_start_comment" value="<?php echo $leases->getLease_start_comment(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lease End Date</label>
                    <input type="date" class="form-control" name="lease_end_date" value="<?php echo $leases->getLease_end_date();?>"/>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="form-group row" style="width: 74%; float: left;">
                      <label>Total Lease Terms (Mos.)</label>
                      <input type="text" class="form-control _fm01t _ppgc" name="total_lease_term_mos" value="<?php echo $leases->getTotal_lease_term_mos(); ?>"/>
                    </div>
                    <div class="form-group row" style="width: 24%; float: right;">
                      <select class="form-select" style="width: 100%" name="mos_vs_mos">
                        <?php
                        for ( $s = 0; $s < count( $momosData ); $s++ ) {
                          ?>
                        <option value='<?php echo $momosData[$s]["id"]; ?>' <?php if ( $leases->getMos_vs_mos() == $momosData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                                                                        }
                                                                            ?> > <?php echo $momosData[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>aa File No. (Original Notes)</label>
                    <input type="text" class="form-control" name="mc_file_no" value="<?php echo $leases->getMc_file_no(); ?>"/>
                  </div>
                  <div class="col-xs-12 col-sm-12 padding-0">
                    <div class="form-group row rowconf _emdomain">
                      <label>Datasource</label>
                      <input list="sourcedata" class="form-control" name="datasource" value="<?php echo $leases->getDatasource(); ?>"/>
                      <datalist id="sourcedata">
                        <?php
                        for ( $c = 0; $c < count( $sourcedata ); $c++ ) {
                          ?>
                        <option><?php echo $sourcedata[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group row rowconf">
                      <label>1st Confirmed By</label>
                      <select class="form-select _bms1field" name="confirm1">
                        <?php
                        for ( $s = 0; $s < count( $appraisers ); $s++ ) {
                          ?>
                        <option value='<?php echo $appraisers[$s]["id"]; ?>' <?php
                                                                    if ( $leases->getConfirm1() == $appraisers[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if($appraisers[$s]["inactive"]!=0){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $appraisers[$s]["firstname"]." ".$appraisers[$s]["lastname"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row rowconf">
                      <label>2nd Confirmed By</label>
                      <select class="form-select _bms1field" name="confirm2">
                        <?php
                        for ( $s = 0; $s < count( $appraisers ); $s++ ) {
                          ?>
                        <option value='<?php echo $appraisers[$s]["id"]; ?>' <?php
                                                                    if ( $leases->getConfirm2() == $appraisers[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if($appraisers[$s]["inactive"]!=0){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $appraisers[$s]["firstname"]." ".$appraisers[$s]["lastname"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Date of Confirmation</label>
                      <input type="date" class="form-control _bmtxtfield" name="confirm_date" value="<?php echo $leases->getConfirm_date(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Inspection Type</label>
                      <select class="form-select" name="inspect_type">
                        <?php
                        for ( $s = 0; $s < count( $inspecttypeData ); $s++ ) {
                          ?>
                        <option value='<?php echo $inspecttypeData[$s]["id"]; ?>' <?php if ( $leases->getInspect_type() == $inspecttypeData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
                                                            }
                                                            ?> > <?php echo $inspecttypeData[$s]["definition"];?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Inspection Date</label>
                      <input type="date" class="form-control" name="inspect_date" value="<?php echo $leases->getInspect_date(); ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source #1</label>
                    <input list="conf1sour" class="form-control _bmtxtfield" name="confirm_1_source" value="<?php echo $leases->getConfirm_1_source(); ?>"/>
                    <datalist id="conf1sour">
                      <?php
                      for ( $c = 0; $c < count( $conf1sour ); $c++ ) {
                        ?>
                      <option><?php echo $conf1sour[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Relationship to Parties #1</label>
                    <input list="relat1" class="form-control" name="relationship_1" value="<?php echo $leases->getRelationship_1(); ?>"/>
                    <datalist id="relat1">
                      <?php
                      for ( $c = 0; $c < count( $relat1 ); $c++ ) {
                        ?>
                      <option><?php echo $relat1[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source #2</label>
                    <input list="conf2sour" class="form-control _bmtxtfield" name="confirm_2_souce" value="<?php echo $leases->getConfirm_2_souce(); ?>"/>
                    <datalist id="conf2sour">
                      <?php
                      for ( $c = 0; $c < count( $conf2sour ); $c++ ) {
                        ?>
                      <option><?php echo $conf2sour[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Relationship to Parties #2</label>
                    <input list="relat1" class="form-control" name="relationship_2" value="<?php echo $leases->getRelationship_2() ?>"/>
                    <datalist id="relat1">
                      <?php
                      for ( $c = 0; $c < count( $relat1 ); $c++ ) {
                        ?>
                      <option><?php echo $relat1[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <?php if($login_ro == 0) { ?>
              <div class="col-6 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="col-12">Use the space below to add linked files from box.com</div>
                  <!--                  <div class="row" style="margin-right: 10px;">-->
                  <div class="form-group row col-11 docRow">
                    <label>URL from Box.com</label>
                    <input type="text" class="form-control docUrl" name="docUrl_1" id="docUrl_1" value="" />
                    <label>Title</label>
                    <input type="text" class="form-control docTitle" name="docTitle_1" id="docTitle_1" value="" />
                  </div>
                  <div class="col-1">
                    <input type='button' id='addDoc' value='save'/>
                  </div>
                  <!--                  </div>-->
                  <div class="col-12" id='docHref'>
                    <p> - Linked Files</p>
                    <?php
                    if ( $leases->getDocData() != "" ) {
                      for ( $d = 0; $d < count( $leases->getDocData() ); $d++ ) {
                        ?>
                    <span id='doc_href_<?php echo ($d+1);?>' class='col-xs-12 padding-5'> <a class='doc_href' href='<?php echo $leases->getDocData()[$d]['boxurl'];?>' target='_blank'><?php echo $leases->getDocData()[$d]['file_label'];?></a>&nbsp;&nbsp;&nbsp;<img src='../img/lfremove.gif' alt='remove' class='remDoc' style='cursor:pointer;'>&nbsp;&nbsp;<img src='../img/lfedit.gif' alt='edit' class='editDoc' style='cursor:pointer;'> </span>
                    <?php
                    }
                    }
                    ?>
                  </div>
                  <input type='hidden' id='docData' name='docData' value='<?php if($leases->getDocData()!=""){echo json_encode($leases->getDocData());} ?>' />
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lease Comments</label>
                    <textarea class="form-control _bmtxtfield" style="width:100%; font-size: 16px" rows="16" name="lease_comment" id="comments"><?php echo $leases->getLease_comment(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Confidential Comments</label>
                    <textarea class="form-control" style="width: 100%; font-size: 16px" rows="3" name="conf_comments"><?php echo $leases->getConf_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Transaction Data--> 
          <!-- Multi-Family -->
          <div id="rentalMf" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-12 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Show Absorbtion Data</label>
                    <input type="checkbox" name="mf_show_absorbtion" class="form-check-input" id="showMFAbsorb" value="1" <?php if ($leases->getMf_show_absorbtion() ==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow padding-0">
              <div class="col-9">
                <div id="unittypes" style="width: 100%;">
                  <div class"col-12 groupsection">
                    <div class="fieldsarea">
                      <table class="table _table" id="mf_table" width="100%">
                        <thead>
                          <tr>
                            <th width="9%" style="text-align: center">No. Units</th>
                            <th width="9%" style="text-align: center">Unit Type</th>
                            <th width="9%" style="text-align: center">No. of BR</th>
                            <th width="9%" style="text-align: center">Total SF</th>
                            <th width="9%" style="text-align: center">Monthly Rent</th>
                            <th width="9%" style="text-align: center">Rent / SF</th>
                            <th width="9%"><input type="button" id="addmfunit" class="_addMFunit" value="Add Unit Type"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $mfids = array();
                          $mfvalues = $leases->getMfvalues();
                          for ( $s = 0; $s < count( $mfvalues ); $s++ ) {
                            ?>
                          <tr id=''>
                            <input type='hidden' name='mfvalueid[]' value='<?php echo $mfvalues[$s]->getId(); ?>' />
                            <td><input type='text' name='mfnounits[]' class='form-control _noofunits _fm00t' value='<?php echo $mfvalues[$s]->getMfnounits(); ?>'/></td>
                            <td><input type='text' list='MFUnitType' name='mfsize[]' class='form-control' value='<?php echo $mfvalues[$s]->getMfsize(); ?>'/></td>
                            <td><input type='text' name='mfnobr[]' class='form-control _ppgc _noofbr _fm00t' value='<?php echo $mfvalues[$s]->getMfnobr(); ?>'/></td>
                            <td><input type='text' name='mftotalsf[]' class='form-control _ppgc _dev _fm00t' value='<?php echo $mfvalues[$s]->getMftotalsf(); ?>'/></td>
                            <td><input type='text' name='mfrent[]' class='form-control _ppgc _devsor _cfm00t' value='<?php echo $mfvalues[$s]->getMfrent(); ?>'/></td>
                            <td><input type='text' name='mfrentsf[]' class='form-control _ppgc _devres _cfm02t' value='<?php echo $mfvalues[$s]->getMfrentsf(); ?>' readonly /></td>
                            <td><input type='button' class='_delMFunit' value='Delete' /></td>
                          </tr>
                          <?php
                          $mfids[] = $mfvalues[ $s ]->getId();
                          }
                          ?>
                        <input type='hidden' name='mfids' id='mfvalueid' value='<?php echo implode(",",$mfids); ?>' />
                        </tbody>
                        
                      </table>
                      <datalist id="MFUnitType">
                        <?php
                        for ( $c = 0; $c < count( $MFUnitType ); $c++ ) {
                          ?>
                        <option><?php echo $MFUnitType[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                  </div>
                </div>
                <div id="mobilehome" style="width: 100%;">
                  <div class="col-12 groupsection padding-0">
                    <div class="fieldsarea">
                      <div class="row label225" style="margin: 0px;">
                        <div class="col-6 padding-0">
                          <div class="form-group border-0">
                            <label style="width:100%">If there is no Low and High Rent, Place the actual rent in the Average Rent field only</label>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group border-0">
                            <label style="width:100%">Low Rent</label>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group border-0">
                            <label style="width:100%">High Rent</label>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group border-0">
                            <label style="width:100%">Average Rent</label>
                          </div>
                        </div>
                      </div>
                      <div class="row label225" style="margin: 0px;">
                        <div class="col-6 padding-0">
                          <div class="form-group row">
                            <label>No. of Single-Wides</label>
                            <input type="text" class="form-control calc _fm00t _ppgc mf_no_single" name="mf_no_single" value="<?php echo $leases->getMf_no_single(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control _cfm00t _ppgc" style="width: 100%" name="mf_sw_low_rent" value="<?php echo $leases->getMf_sw_low_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_sw_high_rent" style="width: 100%" name="mf_sw_high_rent" value="<?php echo $leases->getMf_sw_high_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_sw_avg_rent" style="width: 100%" name="mf_sw_avg_rent" value="<?php echo $leases->getMf_sw_avg_rent(); ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="row label225" style="margin: 0px;">
                        <div class="col-6 padding-0">
                          <div class="form-group row">
                            <label>No. of Double-Wides</label>
                            <input type="text" class="form-control calc _fm00t _ppgc mf_no_double" name="mf_no_double" value="<?php echo $leases->getMf_no_double(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control _cfm00t _ppgc" style="width: 100%" name="mf_dw_low_rent" value="<?php echo $leases->getMf_dw_low_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_dw_high_rent" style="width: 100%" name="mf_dw_high_rent" value="<?php echo $leases->getMf_dw_high_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 padding-0">
                          <div class="form-group">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_dw_avg_rent" style="width: 100%" name="mf_dw_avg_rent" value="<?php echo $leases->getMf_dw_avg_rent(); ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="row label225" style="margin: 0px;">
                        <div class="col-6 padding-0">
                          <div class="form-group row">
                            <label>No. of Triple-Wides</label>
                            <input type="text" class="form-control calc _fm00t _ppgc mf_no_triple" name="mf_no_triple" value="<?php echo $leases->getMf_no_triple(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control _cfm00t _ppgc" style="width: 100%" name="mf_tw_low_rent" value="<?php echo $leases->getMf_tw_low_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_tw_high_rent" style="width: 100%" name="mf_tw_high_rent" value="<?php echo $leases->getMf_tw_high_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_tw_avg_rent" style="width: 100%" name="mf_tw_avg_rent" value="<?php echo $leases->getMf_tw_avg_rent(); ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="row label225" style="margin: 0px;">
                        <div class="col-6 padding-0">
                          <div class="form-group row">
                            <label>No. of RV Spaces</label>
                            <input type="text" class="form-control calc _fm00t _ppgc mf_no_rv_spaces" name="mf_no_rv_spaces" value="<?php echo $leases->getMf_no_rv_spaces(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control _cfm00t _ppgc" style="width: 100%" name="mf_rv_low_rent" value="<?php echo $leases->getMf_rv_low_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_rv_high_rent" style="width: 100%" name="mf_rv_high_rent" value="<?php echo $leases->getMf_rv_high_rent(); ?>"/>
                          </div>
                        </div>
                        <div class="col-2 padding-0">
                          <div class="form-group row">
                            <input type="text" class="form-control calc _cfm00t _ppgc mf_rv_avg_rent" style="width: 100%" name="mf_rv_avg_rent" value="<?php echo $leases->getMf_rv_avg_rent(); ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="grouprow">
                    <div class="col-6 groupsection label175 padding-0">
                      <div class="fieldsarea">
                        <div class="form-group row">
                          <label>Total Spaces</label>
                          <input type="text" class="form-control calc _fm00t _ppgc mf_total_spaces" id="mftotalspots" name="mf_total_spaces" value="<?php echo $leases->getMf_total_spaces(); ?>" readonly/>
                        </div>
                        <div class="form-group row">
                          <label>Max High Rent</label>
                          <input type="text" class="form-control _cfm00t _ppgc" name="mf_high_rent" value="<?php echo $leases->getMf_high_rent(); ?>" readonly/>
                        </div>
                        <div class="form-group row">
                          <label>Total Avg. Rent</label>
                          <input type="text" class="form-control _cfm00t _ppgc" id="mftotavgrent" name="mf_total_avg_rent" value="<?php echo $leases->getMf_total_avg_rent(); ?>" readonly/>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 groupsection label175 padding-0">
                      <div class="fieldsarea">
                        <div class="form-group row">
                          <label>Avg. Rent Comment</label>
                          <input type="text" class="form-control" name="mf_avg_rent_comment" value="<?php echo $leases->getMf_avg_rent_comment(); ?>"/>
                        </div>
                        <div class="form-group row">
                          <label>Last Rental Increase</label>
                          <input type="text" class="form-control" name="mf_last_increase" value="<?php echo $leases->getMf_last_increase(); ?>"/>
                        </div>
                        <div class="form-group row">
                          <label>Amount</label>
                          <input type="text" class="form-control" name="mf_amount" value="<?php echo $leases->getMf_amount(); ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="groupsection label175 padding-0 _mobhome">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Parking Type</label>
                      <select class="form-select" name="mf_parking_type">
                        <?php
                        for ( $s = 0; $s < count( $parkingtypeData ); $s++ ) {
                          ?>
                        <option value='<?php echo $parkingtypeData[$s]["id"]; ?>' <?php if ( $leases->getMf_parking_type() == $parkingtypeData[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $parkingtypeData[$s]["definition"];?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Parking Rent</label>
                      <textarea class="form-control" name="mf_parking_rent"><?php echo $leases->getMf_parking_rent(); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="groupsection label175 padding-0 _mobhome">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Application Fee</label>
                      <input type="text" class="form-control _cfm00t _ppgc" name="mf_application_fee" value="<?php echo $leases->getMf_application_fee(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Move-In Fee</label>
                      <input type="text" class="form-control _cfm00t _ppgc" name="mf_movein_fee" value="<?php echo $leases->getMf_movein_fee(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Non-Refundable Fee</label>
                      <input type="text" class="form-control" name="mf_non_refund" value="<?php echo $leases->getMf_non_refund(); ?>"/>
                    </div>
                  </div>
                </div>
                <div class="groupsection label175 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row _mobhome">
                      <label>Number of Units</label>
                      <input type="text" class="form-control calc _fm00t _ppgc mf_no_unit" name="mf_no_unit" value="<?php echo $leases->getMf_no_unit(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Vacant Units</label>
                      <input type="text" class="form-control calc _fm00t _ppgc mf_vacant_unit" name="mf_vacant_unit" value="<?php echo $leases->getMf_vacant_unit(); ?>"/>
                    </div>
                  </div>
                </div>
                <div class="groupsection label175 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>% Vacancy</label>
                      <input type="text" class="form-control _fm01tp _ppgc" id="mfvacpct" name="mf_pct_vacancy" value="<?php echo $leases->getMf_pct_vacancy(); ?>" readonly/>
                    </div>
                    <div class="form-group row _mobhome">
                      <label>Number of Unit Types</label>
                      <input type="number" class="form-control" min="0" max="10" name="mf_no_unit_type" id="NoMFUTypes" value='<?php echo $leases->getMf_no_unit_type(); ?>'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection">
                <div class="grouphead">Project Amenities</div>
                <div class="fieldsareawhead label125">
                  <div style="width: 49%; float: left;">
                    <div class="form-group row">
                      <label>Exercise Facilities?</label>
                      <select class="form-select" name="mf_exercise">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_exercise() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Spa?</label>
                      <select class="form-select" name="mf_spa">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_spa() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Clubhouse?</label>
                      <select class="form-select" name="mf_club">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_club() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Playground?</label>
                      <select class="form-select" name="mf_playg">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_playg() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>BBQ Area?</label>
                      <select class="form-select" name="mf_bbq">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_bbq() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Big Screen TV?</label>
                      <select class="form-select" name="mf_bigtv">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_bigtv() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Shed?</label>
                      <select class="form-select" name="mf_shed">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_shed() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div style="width: 49%; float: right;">
                    <div class="form-group row">
                      <label>Sports Court?</label>
                      <select class="form-select" name="mf_sports">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_sports() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Laundry Area?</label>
                      <select class="form-select" name="mf_laund">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_laund() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Pool?</label>
                      <select class="form-select" name="mf_pool">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_pool() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Business Center?</label>
                      <select class="form-select" name="mf_busi">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_busi() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Security?</label>
                      <select class="form-select" name="mf_sec">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_sec() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Carport?</label>
                      <select class="form-select" name="mf_carport">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_carport() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection">
                <div class="grouphead">Unit Amenities</div>
                <div class="fieldsareawhead label175">
                  <div style="width: 49%; float: left;">
                    <div class="form-group row _mobhome">
                      <label>Washer/Dryer Hookups?</label>
                      <select class="form-select" name="mf_wd_hookup">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_wd_hookup() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Washer/Dryer</label>
                      <select class="form-select" name="mf_washdry">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_washdry() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Fireplace?</label>
                      <select class="form-select" name="mf_fireplace">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_fireplace() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Microwave?</label>
                      <select class="form-select" name="mf_micro">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_micro() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Patio/Deck?</label>
                      <select class="form-select" name="mf_patio">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_patio() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Dishwasher?</label>
                      <select class="form-select" name="mf_dish">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_dish() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Disposal?</label>
                      <select class="form-select" name="mf_dispo">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_dispo() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div style="width: 49%; float: right;">
                    <div class="form-group row">
                      <label>Sauna?</label>
                      <select class="form-select" name="mf_sauna">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_sauna() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>RV Storage?</label>
                      <select class="form-select" name="mf_rvstor">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_rvstor() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Vaulted Ceilings?</label>
                      <select class="form-select" name="mf_vault">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_vault() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Extra Storage?</label>
                      <select class="form-select" name="mf_exstor">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_exstor() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                                        <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Other Unit Amenities</label>
                      <textarea class="form-control" rows="4" name="mf_other_amenities"><?php echo $leases->getMf_other_amenities(); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Landlord Pays RPT?</label>
                    <select class="form-select" name="mf_landlord_rpt">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_rpt() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Insurance?</label>
                    <select class="form-select" name="mf_landlord_insurance">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_insurance() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays CAM?</label>
                    <select class="form-select" name="mf_landlord_cam">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_cam() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Mgmt. Fees?</label>
                    <select class="form-select" name="mf_landlord_mgmt_fees">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_mgmt_fees() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Landlord Pays Water?</label>
                    <select class="form-select" name="mf_landlord_water">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_water() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Sewer?</label>
                    <select class="form-select" name="mf_landlord_sewer">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_sewer() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Hot Water?</label>
                    <select class="form-select" name="mf_landlord_hot_water">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_hot_water() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Heat?</label>
                    <select class="form-select" name="mf_landlord_heat">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_heat() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Landlord Pays Gas?</label>
                    <select class="form-select" name="mf_landlord_gas">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_gas() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Trash?</label>
                    <select class="form-select" name="mf_landlord_trash">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_trash() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Internet?</label>
                    <select class="form-select" name="mf_landlord_internet">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_internet() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Landlord Pays Cable?</label>
                    <select class="form-select" name="mf_landlord_cable">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMf_landlord_cable() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow" id="UnitAbsorb">
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Pre-Leasing(Units)</label>
                    <input type="text" class="form-control calc _fm00t _ppgc mf_prelease_unit" name="mf_prelease_unit" value="<?php echo $leases->getMf_prelease_unit(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Start Date (Pre-Leasing)</label>
                    <input type="text" class="form-control" name="mf_start_date_prelease" value="<?php echo $leases->getMf_start_date_prelease(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Pre-Leasing (% of Units)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="mfplpctunit" name="mf_prelease_pct_unit" value="<?php echo $leases->getMf_prelease_pct_unit(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>End Date</label>
                    <input type="text" class="form-control" name="mf_end_rent_prelease" value="<?php echo $leases->getMf_end_rent_prelease(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Total Unit Absorbed</label>
                    <input type="text" class="form-control calc _fm00t _ppgc mf_total_unit_absorb" name="mf_total_unit_absorb" value="<?php echo $leases->getMf_total_unit_absorb(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Mos. in Absorption Period</label>
                    <input type="text" class="form-control calc _fm01t _ppgc mf_mos_absorbtion" name="mf_mos_absorbtion" value="<?php echo $leases->getMf_mos_absorbtion(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Total Leased (% of Units)</label>
                    <input type="text" class="form-control _fm01tp _ppgc" id="mfpctabsorb" name="mf_total_lease_pct_unit" value="<?php echo $leases->getMf_total_lease_pct_unit(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Unit Absorption / Mo.</label>
                    <input type="text" class="form-control _fm02t _ppgc" id="mfabsorbpermo" name="mf_unit_absorb_mo" value="<?php echo $leases->getMf_unit_absorb_mo(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Multi-Family --> 
          <!-- Mini Storage -->
          <div id="ministorage" class="tab-pane fade">
            <div class="col-12 grouprow">
              <div class="col-9 groupsection">
                <div class="fieldsarea">
                  <table class="table _table" id="ss_table" width="100%">
                    <thead>
                      <tr>
                        <th width="9%" style="text-align: center">Unit Size (ex. 10' x 10')</th>
                        <th width="9%" style="text-align: center">Unit Type</th>
                        <th width="9%" style="text-align: center">Total SF</th>
                        <th width="9%" style="text-align: center">Monthly Rent</th>
                        <th width="9%" style="text-align: center">Rent / SF</th>
                        <?php if($login_ro == 0) { ?>
                        <th width="9%"><input type="button" id="addssunit" class="_addssunit" value="Add Unit Type"></th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ssids = array();
                      $ssvalues = $leases->getSsvalues();
                      for ( $s = 0; $s < count( $ssvalues ); $s++ ) {
                        ?>
                      <tr id=''>
                        <input type='hidden' name='ssvalueid[]' value='' />
                        <td><input list='MSSize' name='sssize[]' class='form-control' value="<?php echo $ssvalues[$s]->getSssize(); ?>"/></td>
                        <td><input type='text' list='MsUnitType' name='ssunittype[]' class='form-control' value='<?php echo $ssvalues[$s]->getSsunittype(); ?>'/></td>
                        <td><input type='text' name='ssunitsf[]' class='form-control _ppgc _dev _fm00t' value='<?php echo $ssvalues[$s]->getSsunitsf(); ?>'/></td>
                        <td><input type='text' name='ssrentmo[]' class='form-control _ppgc _devsor _cfm00t' value='<?php echo $ssvalues[$s]->getSsrentmo(); ?>'/></td>
                        <td><input type='text' name='ssrentsf[]' class='form-control _ppgc _devres _cfm02t' value='<?php echo $ssvalues[$s]->getSsrentsf(); ?>' readonly /></td>
                        <?php if($login_ro == 0) { ?>
                        <td><input type='button' class='_delssunit' value='Delete' /></td>
                        <?php } ?>
                      </tr>
                      <?php
                      $ssids[] = $ssvalues[ $s ]->getId();
                      }
                      ?>
                    <input type='hidden' name='ssids' id='ssvalueid' value='<?php echo implode(",",$ssids); ?>' />
                    </tbody>
                    
                  </table>
                  <datalist id="MSSize">
                    <?php
                    for ( $c = 0; $c < count( $MSSize ); $c++ ) {
                      ?>
                    <option><?php echo $MSSize[$c]["definition"];?></option>
                    <?php
                    }
                    ?>
                  </datalist>
                  <datalist id="MsUnitType">
                    <?php
                    for ( $c = 0; $c < count( $MsUnitType ); $c++ ) {
                      ?>
                    <option><?php echo $MsUnitType[$c]["definition"];?></option>
                    <?php
                    }
                    ?>
                  </datalist>
                </div>
              </div>
              <div class="col-3 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Number of Unit Types</label>
                    <input type="number" class="form-control" min="0" max="20" name="ms_no_unit_type" id="selectNoUT" value="<?php echo $leases->getMs_no_unit_type(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Total Units</label>
                    <input type="text" class="form-control calc _fm00t _ppgc ms_total_units" name="ms_total_units" value="<?php echo $leases->getMs_total_units(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label># of Vacant Units</label>
                    <input type="text" class="form-control calc _fm00t _ppgc ms_no_vacant_unit" name="ms_no_vacant_unit" value="<?php echo $leases->getMs_no_vacant_unit(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>% of Vacant Units</label>
                    <input type="text" class="form-control _fm02tp _ppgc" id="msvacpct" name="ms_pct_vacant_unit" value="<?php echo $leases->getMs_pct_vacant_unit(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Vacancy Comment</label>
                    <textarea class="form-control" rows="4" name="ms_vacancy_comment"><?php echo $leases->getMs_vacancy_comment(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Code Access?</label>
                    <select class="form-select" name="ms_coded_access">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMs_coded_access() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>On-Site Manager?</label>
                    <select class="form-select" name="ms_onsite_mgr">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMs_onsite_mgr() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Residence Details</label>
                    <select class="form-select" name="ms_manager_res">
                      <?php
                      for ( $s = 0; $s < count( $mgrresdetailData ); $s++ ) {
                        ?>
                      <option value='<?php echo $mgrresdetailData[$s]["id"]; ?>' <?php if ( $leases->getMs_manager_res() == $mgrresdetailData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
}
?> > <?php echo $mgrresdetailData[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Alarmed Units?</label>
                    <select class="form-select" name="ms_alarm">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMs_alarm() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Heated Units?</label>
                    <select class="form-select" name="ms_heated_unit">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $leases->getMs_heated_unit() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
}
?> > <?php echo $yesnoDataDesc[$s]["definition"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Access Hours:</label>
                    <textarea class="form-control" rows="4" name="ms_access_hours"><?php echo $leases->getMs_access_hours(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Mini-Storage Concessions</label>
                    <textarea class="form-control" rows="4" name="ms_concessions"><?php echo $leases->getMs_concessions(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Additional Photos Tab -->
          <div id="addphotos" class="tab-pane fade">
            <div class="col-12" style="background-color: #1e4959; color: #FFFFFF; font-size: medium; height: 25px; line-height: 25px; text-align: center;"><b>Uploading multiple images from your Box.com folder may not work.  To upload multiple images, you must first copy the images to a local folder.</b></div>
            <div class="col-12" style="padding: 5px;"><b>Use the button below to select images to upload to the image gallery.  You can also place a caption with each image.  Captions are limited to 40 characters (including spaces).  Once uploaded, you will not be able to modify the caption, so please be certain to check your spelling prior to uploading.</b></div>
            <div class="grouprow">
              <div class="col-10 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row col-2 padding-0">
                    <input type="file" name="images[]" id="upload_files" onchange="preview_image();" multiple>
                  </div>
                  <div class="col-10 padding-0" id="images_preview"> </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection">
                <div class="fieldsarea">
                  <div class="gallery" id="galleryContainer">
                    <?php
                    $picids = array();
                    usort( $proppics, function ( $a, $b ) {
                      return ( $a[ 'picOrder' ] <> $b[ 'picOrder' ] );
                    } );
                    if ( count( $proppics ) > 0 ) {
                      for ( $u = 0; $u < count( $proppics ); $u++ ) {
                        // set up a row for each record
                        $picids[] = $proppics[ $u ][ 'id' ];
                        ?>
                    <!--									<div class="drag-divider"></div>-->
                    <div class="remove galleryItem imgPlc" style='position:relative;' >
                      <div class="imgholder" id="imggal_<?php echo $proppics[$u]['id']; ?>" data-img-id="<?php echo $proppics[$u]['id']; ?>"> <a href="../comp_images/<?php echo $proppics[$u]['image']; ?>" rel='lightbox[property]'> <img id="preview-sp1" src="../comp_images/<?php echo $proppics[$u]['image']; ?>" height="125px" style='cursor:pointer; max-width: 220px;' data-type='propphotos' data-id='<?php echo $proppics[$u]['id']; ?>' /> </a> </div>
                      <div class="caption-box">
                        <center>
                          <?php echo $proppics[$u]['caption']; ?>
                        </center>
                      </div>
                      <div class='preview-sp1-panel'><a class='fa fa-trash img-del' data-rel-photo-btn='sp1' data-container='imggal_<?php echo $proppics[$u]['id']; ?>'/></a></div>
                    </div>
                    <?php
                    }
                    }
                    // if there are no records in the database, display an alert message
                    else {
                      echo "No images to display!";
                    }
                    ?>
                  </div>
                  <input type='hidden' id='picorder' name='picorder' value='' />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Leases main tab -->
    </form>
  </section>
</div>
<script>
$(".navbar-collapse a").click(function () {
  $(".navbar-collapse").collapse("hide");
});
</script>
</body></html>
