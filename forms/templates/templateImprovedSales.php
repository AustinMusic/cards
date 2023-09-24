<!doctype html>
<html>
<head>
<?php if ($improvedsales->getId() != '') { ?>
<title>IS - <?php echo $improvedsales->getAddress(); ?></title>
<?php } else {?>
<title>New Improved Sale Comp</title>
<?php } ?>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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
<script type="text/javascript" src="../js/improvedsalesController.js"></script> 
<script type="text/javascript" src="../js/imageController.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmAGJsGHDcILArqDVkwl0co2yu8tHhx-g&libraries=places" defer></script>
<script type="text/javascript">

			$( function () {
				aa_engine = new _aa_engine();
				
				improvedsalesController = new _improvedsalesController({
					activeObject: "improvedsalesController",
					id: <?php echo $improvedsales->getId(); ?>,
					latitude: "<?php echo $improvedsales->getLat(); ?>",
					longitude: "<?php echo $improvedsales->getLng(); ?>",
					subMarketArea: <?php echo json_encode($subMarketArea,JSON_UNESCAPED_UNICODE); ?>,
					subProperty: <?php echo json_encode($subPropertyData,JSON_UNESCAPED_UNICODE); ?>,
					<?php
					if(isset($caprateData)){
					?>
						data: <?php echo json_encode($caprateData,JSON_UNESCAPED_UNICODE); ?>
					<?php
					}
					if(isset($improvedData)){
					?>
						data: <?php echo json_encode($improvedData,JSON_UNESCAPED_UNICODE); ?>
					<?php
					}
					?>
				});

				improvedsalesController.init();

				imageController = new _imageController({
					activeObject: "imageController",
					id: <?php echo $improvedsales->getId(); ?>
				});

				imageController.init();
			});
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
        function preview_image() {
            var total_file = document.getElementById( "upload_files" ).files.length;
            for ( var i = 0; i < total_file; i++ ) {
                $( '#images_preview' ).append( "<div class='prebox'><img src='" + URL.createObjectURL( event.target.files[ i ] ) + "'><br><input type='text' name='caption[]' class='form-control' placeholder='Caption' maxlength='40'></div>" );
            }
        }
    </script> 
<script>
$(document).ready(
    function(){
    var _elements = document.getElementsByClassName("_bmtxtfield");
            for (var i = 0; i < _elements.length; i++) {
                if (_elements[i].value == "" || _elements[i].value == "0" || _elements[i].value == "0.0" || _elements[i].value == "$ 0.00" || _elements[i].value == "0.000") {
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
<body >
<div class="mainpage">
  <section class="comp-form-data">
    <form enctype="multipart/form-data" method="post" id='_form' accept-charset="UTF-8">
      <button type="submit" onclick="return false;" style="display:none;"></button>
      <!-- ImprovedSale main tab -->
      <div id="ImprovedSale_main">
        <div class="formhead">
          <div class="formTitle">
            <nav class="navbar navbar-expand-lg navbar-dark">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navmenu">
                  <ul class="nav navbar-nav">
                    <li class="nav-item" style="position: absolute; top: 0; right: 0;"><a class="nav-link fa fa-tools" data-bs-toggle="tab" href="#fileinformation2" role="tab" style="font-size: 20px;"></a></li>
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#improvedsale" role="tab">Subject Property</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#landdata" role="tab">Land Data</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#buildingdata" role="tab">Building Data</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#operatingexpenses" role="tab">Operating Expenses</a> </li>
                    <li class="nav-item" id="proptypeTab"><a class="nav-link" data-bs-toggle="tab" href="#propertytype" role="tab">Property Type</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#transationdata" role="tab">Transaction Data</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#confirmation" role="tab">Confirmation</a> </li>
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
          <div id="fileinformation2" class="tab-pane fade" role="tabpanel">
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
																				        if ( $improvedsales->getStatus() == $statusData[$s]["id"] ) {
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
																				        if ( $improvedsales->getPriority() == $priorityData[$s]["id"] ) {
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
    																			        if ( $improvedsales->getAssignedTo() == $usersData[$s]["id"] ) {
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
                    <input type="date" class="form-control _formUpdate" name="DueDate" value="<?php echo $improvedsales->getDueDate(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File Tools </div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Report Name:</label>
                    <input type="hidden" name="id" value="<?php echo $improvedsales->getId(); ?>" class='_formUpdate' />
                    <input type="hidden" name="reportID" value="<?php echo $improvedsales->getId(); ?>" class='_formUpdate' />
                    <input type="text" class="form-control _formUpdate" name="reportname" id="reportName" value="<?php echo $improvedsales->getReportname(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Template:</label>
                    <select class="form-select _formUpdate" name="template" id="_exportlsTemplate">
                      <?php
                      for ( $s = 0; $s < count( $templateData ); $s++ ) {
                        ?>
                      <option value='<?php echo $templateData[$s]["id"]; ?>' data-tpath='<?php echo $templateData[$s]["templatepath"]; ?>' <?php
																			            if ( $improvedsales->getTemplate() == $templateData[$s]["id"] ) {
																			            ?>selected='selected'<?php 
                                                                                        }
								                                                        ?> ><?php echo $templateData[$s]["templatename"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row btnWord"><a style='cursor:pointer;' class='_generateReportWordBtn golden-btn' data-spreview='0' data-ttype='land-sales' data-id='<?php echo $improvedsales->getId(); ?>'>Generate Word Report</a></div>
                  <?php if(!empty($improvedsales->getID())) { ?>
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
                    <div class="filedetails"><?php echo $improvedsales->getDateCreated(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Created By:</label>
                    <div class="filedetails"><?php echo $improvedsales->getCreatedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Date Modified:</label>
                    <div class="filedetails"><?php echo $improvedsales->getDateModified(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Modified By:</label>
                    <div class="filedetails"><?php echo $improvedsales->getModifiedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>File Origin:</label>
                    <div class="filedetails">
                      <?php if($improvedsales->getFileOrigin() == 'Original File') { echo $improvedsales->getFileOrigin(); } else { ?>
                      <a href='<?php echo $improvedsales->getClonelink(); ?>' target="_blank"><?php echo $improvedsales->getFileOrigin(); ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Location Tab Tab-->
          <div id="improvedsale" class="tab-pane active" role="tabpanel">
            <div class="grouprow">
              <div class="col-6 groupsection label130">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Enter Address</label>
                    <input type="text" name="address" class="_address form-control _formUpdate _bmtxtfield" id="autocomplete" (focus)="geolocate()" value="<?php echo $improvedsales->getAddress(); ?>"/>
                  </div>
                  <div class="grouprow padding-0">
                    <div class="col-6 groupsection padding-0" style="float: left;">
                      <div class="form-group row">
                        <label>Property Name</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="property_name" value="<?php echo $improvedsales->getProperty_name(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Number</label>
                        <input class="form-control _formUpdate _bmtxtfield" name="streetnumber" id="street_number" type="text" value="<?php echo $improvedsales->getStreetnumber(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Name</label>
                        <input class="form-control _formUpdate _bmtxtfield" name="streetname" id="route" type="text" value="<?php echo $improvedsales->getStreetname(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>City</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="city" id="locality" value="<?php echo $improvedsales->getCity(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>County</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="county" id="administrative_area_level_2" value="<?php echo $improvedsales->getCounty(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>State</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" id="administrative_area_level_1" name="state" value="<?php echo $improvedsales->getState(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Zip Code</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" id="postal_code" name="zip_code" value="<?php echo $improvedsales->getZip_code(); ?>"/>
                      </div>
                      <input type="hidden" class="form-control _formUpdate" id="latitude" name="lat" value="<?php echo $improvedsales->getLat(); ?>" />
                      <input type="hidden" class="form-control _formUpdate" id="longitude" name="lng" value="<?php echo $improvedsales->getLng(); ?>" />
                    </div>
                    <div class="col-6 groupsection padding-0" style="float: right">
                      <div class="form-group row">
                        <label>Property Type</label>
                        <select class="form-select _formUpdate _bms20field" name="propertytype" id='selectPropertType'>
                          <?php

                          for ( $s = 0; $s < count( $propertyData ); $s++ ) {
                            ?>
                          <option value='<?php echo $propertyData[$s]["id"]; ?>' <?php
																        if ( $improvedsales->getPropertytype() == $propertyData[$s]["id"] ) {
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
																        if ( $improvedsales->getPropertysubtype() == $subPropertyData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $subPropertyData[$s]["subtype"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>MSA</label>
                        <input type="text" list="msalist" class="form-control _formUpdate" name="msa" value="<?php echo $improvedsales->getMsa(); ?>"/>
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
																        if ( $improvedsales->getGenmarket() == $marketData[$s]["id"] ) {
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
																        if ( $improvedsales->getSubmarkid() == $subMarketData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $subMarketData[$s]["submarket"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row" style="padding-bottom:3px;">
                        <label>Legal Description</label>
                        <textarea class="form-control _formUpdate _bmtxtfield" rows="3" style="height: 74px;" name="legal_desc"><?php echo str_replace('\r',"\r", str_replace('\n',"\n",$improvedsales->getLegal_desc())); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="groupsection label100 spimgarea">
                <div class="grouphead">Subject Photo</div>
                <div class="fieldsareawhead label125">
                  <div class="section-inner-width imgPlc" id="subjectPhoto">
                    <?php if ($improvedsales->getId() != '') { ?>
                    <a href="../comp_images/<?php echo $improvedsales->getImage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $improvedsales->getImage();?>" style='cursor:pointer;' data-type='property-photo' /> </a>
                    <?php } else {?>
                    <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                    <?php } ?>
                    <div style='display:none;'>
                      <label for="sp1" class="custom-file-upload">Subject Photo</label>
                    </div>
                    <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="photo1" class="_photo"/>
                    <input type='hidden' name="photo1path" id='photo1path' value="<?php echo $improvedsales->getPhoto1(); ?>" />
                    <input type='hidden' name="thumbpath" id="thumbpath" value="<?php echo $improvedsales->getThumbnail(); ?>"/>
                  </div>
                  <?php if($login_ro == 0) { ?>
                  <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp1' data-container='subjectPhoto'/></a>
                    <?php if ($improvedsales->getPhoto1() != '') { ?>
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
          </div>
          <!-- Land Data -->
          <div id="landdata" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label125">
                <div class="fieldsarea">
                  <div class="col-4" style="float: left; margin-top: 5px;">
                    <div class="switch" style="">
                      <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="0" id="inputtypeSF" <?php if ($improvedsales->getGla_inputtype()==0) echo 'checked="checked"'; ?>
                                                                    <?php if(empty($improvedsales->getId())) echo 'checked="checked"'; ?> />
                      <label for="inputtypeSF" class="switch-label switch-label-off">SF</label>
                      <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="1" id="Acre" <?php if ($improvedsales->getGla_inputtype()==1) echo 'checked="checked"'; ?> />
                      <label for="Acre" class="switch-label switch-label-on">Acres</label>
                      <span class="switch-selection"></span> </div>
                  </div>
                  <div class="col-8 form-group" style="float: right; margin-top: 5px;">
                    <input type="text" class="form-control _bmtxtfield calc gla_inputsize _formUpdate _ppgc _fm03t" style="width: 100%;" name="gla_inputsize" id="gla_inputsize" value="<?php echo $improvedsales->getGla_inputsize(); ?>"/>
                  </div>
                  <div class="form-group row" style="width: 100%">
                    <label>Eminent Domain?</label>
                    <input type="checkbox" name="emdomain" style="width: 16px; height: 25px;" class="form-check-input" id="emdomain" value="1" <?php if ($improvedsales->getEmdomain()==1 ) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (SF)</label>
                    <input type="text" class="form-control calc gross_land_sf _formUpdate _ppgc _fm00t" id="glasfcalc" name="gross_land_sf" value="<?php echo $improvedsales->getGross_land_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (Acres)</label>
                    <input type="text" class="form-control calc gross_land_acre _formUpdate _ppgc _fm03t" id="glaacrecalc" name="gross_land_acre" value="<?php echo $improvedsales->getGross_land_acre(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Primary Site Area (SF)</label>
                    <input type="text" class="form-control calc primary_sf _formUpdate _ppgc _fm00t" id="primaryareasf" name="primary_sf" value="<?php echo $improvedsales->getPrimary_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Primary Site Area (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="primaryareaacre" name="primary_acre" value="<?php echo $improvedsales->getPrimary_acre(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Unusable Land (SF)</label>
                    <input type="text" class="form-control calc unusable_sf _formUpdate _ppgc _fm00t" name="unusable_sf" value="<?php echo $improvedsales->getUnusable_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Unusable Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="unusableacre" name="unusable_acre" value="<?php echo $improvedsales->getUnusable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Unusable Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="unusable_desc" style="width: 99%; margin-left: 2px;"><?php echo $improvedsales->getUnusable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Excess Land (SF)</label>
                    <input type="text" class="form-control calc excess_sf _formUpdate _ppgc _fm00t" name="excess_sf" value="<?php echo $improvedsales->getExcess_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Excess Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="excessacre" name="excess_acre" value="<?php echo $improvedsales->getExcess_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Excess Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="excess_desc" style="width: 99%; margin-left: 2px;"><?php echo $improvedsales->getExcess_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Surplus Land (SF)</label>
                    <input type="text" class="form-control calc surplus_sf _formUpdate _ppgc _fm00t" name="surplus_sf" value="<?php echo $improvedsales->getSurplus_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Surplus Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="surplusacre" name="surplus_acre" value="<?php echo $improvedsales->getSurplus_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Surplus Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="surplus_desc" style="width: 99%; margin-left: 2px;"><?php echo $improvedsales->getSurplus_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Net Usable Land (SF)</label>
                    <input type="text" class="form-control calc net_usable_sf _formUpdate _ppgc _fm00t" id="netareasf" name="net_usable_sf" value="<?php echo $improvedsales->getNet_usable_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Net Usable Land (Acres)</label>
                    <input type="text" class="form-control calc net_usable_acre _formUpdate _ppgc _fm03t" id="netareaacre" name="net_usable_acre" value="<?php echo $improvedsales->getNet_usable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Net Usable Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="net_usable_desc" style="width: 99%; margin-left: 2px;"><?php echo $improvedsales->getNet_usable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Shape</label>
                    <select class="form-select _formUpdate _bms3field" name="shape">
                      <?php
                      for ( $s = 0; $s < count( $shapeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $shapeData[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getShape() == $shapeData[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $shapeData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Topography</label>
                    <select class="form-select _formUpdate _bms3field" name="topography">
                      <?php
                      for ( $s = 0; $s < count( $topographyData ); $s++ ) {
                        ?>
                      <option value='<?php echo $topographyData[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getTopography() == $topographyData[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $topographyData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Site Access</label>
                    <select class="form-select _formUpdate _bms3field" name="site_access">
                      <?php
                      for ( $s = 0; $s < count( $siteAccessData ); $s++ ) {
                        ?>
                      <option value='<?php echo $siteAccessData[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getSite_access() == $siteAccessData[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $siteAccessData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Orientation</label>
                    <select class="form-select _formUpdate _bms3field" name="orientation">
                      <?php
                      for ( $s = 0; $s < count( $orientationData ); $s++ ) {
                        ?>
                      <option value='<?php echo $orientationData[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getOrientation() == $orientationData[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $orientationData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Exposure</label>
                    <select class="form-select _formUpdate _bms3field" name="exposure">
                      <?php
                      for ( $s = 0; $s < count( $exposureData ); $s++ ) {
                        ?>
                      <option value='<?php echo $exposureData[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getExposure() == $exposureData[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $exposureData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Utilities</label>
                    <input type="text" list="utilslist" class="form-control _formUpdate _bmtxtfield" name="utilities" value="<?php echo $improvedsales->getUtilities(); ?>"/>
                    <datalist id="utilslist">
                      <?php
                      for ( $c = 0; $c < count( $utilslist ); $c++ ) {
                        ?>
                      <option><?php echo $utilslist[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Flood Plain</label>
                    <select class="form-select _formUpdate _bms3field" name="flood_plain" id="floodplain">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $improvedsales->getFlood_plain() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _fppanel" id="fppanel">
                    <label>Panel No.</label>
                    <input type="text" class="form-control" name="fppanel" value="<?php echo $improvedsales->getFppanel(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Easements?</label>
                    <select class="form-select _formUpdate" name="easement" id="easement">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
                																        if ( $improvedsales->getEasement() == $yesnoDataDesc[$s]["id"] ) {
                																            ?>selected='selected'<?php 
                																        }
                																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _easement">
                    <label>Description</label>
                    <input type="text" list="eadesc" class="form-control _formUpdate _bmtxtfield" name="easement_desc" value="<?php echo $improvedsales->getEasement_desc(); ?>" />
                    <datalist id="eadesc">
                      <?php
                      for ( $c = 0; $c < count( $eadesc ); $c++ ) {
                        ?>
                      <option><?php echo $eadesc[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row" name="other_land_comments">
                    <label>Land Comments</label>
                    <textarea class="form-control _formUpdate _bmtxtfield" rows="3" name="other_land_comments"><?php echo $improvedsales->getOther_land_comments(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Zoning Code</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="zoning_code" value="<?php echo $improvedsales->getZoning_code(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Zoning Jurisdiction</label>
                    <input type="text" class="form-control _formUpdate" name="zoning_juris" value="<?php echo $improvedsales->getZoning_juris(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Zoning Description</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="zoning_desc" value="<?php echo $improvedsales->getZoning_desc(); ?>" />
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Traffic Count</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="traffic_count" value="<?php echo $improvedsales->getTraffic_count(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Intersector Street</label>
                    <input type="text" class="form-control _formUpdate" name="inter_street" value="<?php echo $improvedsales->getInter_street(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Date</label>
                    <input type="text" class="form-control _formUpdate" name="traffic_date" value="<?php echo $improvedsales->getTraffic_date(); ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div id="assessedvalues" class="fieldsarea _emdomainsection" style="margin: 5px;">
              <div class="col-12 grouprow">
                <div class="col-5">
                  <div class="form-group row">
                    <p>Fill in the Assessed Year(s) then add each parcel by clicking the Add Parcel button.</p>
                  </div>
                </div>
                <div class="col-2 label100">
                  <div class="form-group row">
                    <label>Assessed Year(s)</label>
                    <input type="text"  class="form-control" name="assessedyear" value="<?php echo $improvedsales->getAssessedyear(); ?>" />
                  </div>
                </div>
                <div class="col-1">
                  <div class="form-group row">
                    <?php if($login_ro == 0) { ?>
                    <input type="button" id="addassessed" class="_addAssessed" value="Add Parcel">
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="grouprow">
                <div class="col-3 groupsection label100">
                  <div class="grouphead">Plat Map</div>
                  <div class="fieldsareawhead label125">
                    <div class="section-inner-width imgPlc" id="platMap">
                      <?php if ($improvedsales->getId() != '') { ?>
                      <a href="../comp_images/<?php echo $improvedsales->getPlatimage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $improvedsales->getPlatimage();?>" style='cursor:pointer;' data-type='plat-photo' /> </a>
                      <?php } else {?>
                      <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                      <?php } ?>
                      <div style='display:none;'>
                        <label for="sp2" class="custom-file-upload">Plat Map</label>
                      </div>
                      <input id="sp2" type="file" accept="image/x-png,image/gif,image/jpeg" name="platmap" class="_photo"/>
                      <input type='hidden' name="platpath" id='platpath' value="<?php echo $improvedsales->getPlatmap(); ?>" />
                    </div>
                    <?php if($login_ro == 0) { ?>
                    <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp2' data-container='platMap'/></a>
                      <?php if ($improvedsales->getPlatmap() != '') { ?>
                      <a class='fa fa-trash img-del' data-rel-photo-btn='sp2' data-container='platMap'/></a>
                      <?php } ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="groupsection col-9">
                  <div class="fieldsarea">
                    <table class="table _table" id="assessed_table" width="100%">
                      <thead>
                        <tr>
                          <th width="9%" style="text-align: center">Map</th>
                          <th width="9%" style="text-align: center">Tax Lot</th>
                          <th width="9%" style="text-align: center">Parcel<br>
                            No.</th>
                          <th width="9%" style="text-align: center">Land Area SF</th>
                          <th width="9%" style="text-align: center">Market<br>
                            Land</th>
                          <th width="9%" style="text-align: center">Market<br>
                            Imp.</th>
                          <th width="9%" style="text-align: center">Market<br>
                            Total</th>
                          <th width="9%" style="text-align: center">Annual<br>
                            Taxes</th>
                          <?php if($login_ro == 0) { ?>
                          <th width="9%">&nbsp;</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $assessedids = array();
                        $assessedvalues = $improvedsales->getAssessedvalues();
                        $assessedTotals = [];
                        $assessedTotals[ 'assessedglasf' ] = 0;
                        $assessedTotals[ 'marketland' ] = 0;
                        $assessedTotals[ 'marketimp' ] = 0;
                        $assessedTotals[ 'markettotal' ] = 0;
                        $assessedTotals[ 'annualtaxes' ] = 0;
                        for ( $s = 0; $s < count( $assessedvalues ); $s++ ) {
                          ?>
                        <tr id=''>
                          <input type='hidden' name='assessedvalueid[]' value='<?php echo $assessedvalues[$s]->getId(); ?>' />
                          <td><input type='text' name='mappage[]' class='form-control' value='<?php echo $assessedvalues[$s]->getMappage(); ?>'/></td>
                          <td><input type='text' name='taxlot[]' class='form-control' value='<?php echo $assessedvalues[$s]->getTaxlot(); ?>'/></td>
                          <td><input type='text' name='parcelno[]' class='form-control' value='<?php echo $assessedvalues[$s]->getParcelno(); ?>'/></td>
                          <td><input type='text' name='assessedglasf[]' class='form-control _sum _fm00t' value='<?php echo $assessedvalues[$s]->getAssessedglasf(); ?>'/></td>
                          <td><input type='text' name='marketland[]' class='form-control _ppgc _sum _sumv _cfm00t' value='<?php echo $assessedvalues[$s]->getMarketland(); ?>'/></td>
                          <td><input type='text' name='marketimp[]' class='form-control _ppgc _sum _sumv _cfm00t' value='<?php echo $assessedvalues[$s]->getMarketimp(); ?>'/></td>
                          <td><input type='text' name='markettotal[]' class='form-control _ppgc _sum _sumvr _cfm00t' readonly value='<?php echo $assessedvalues[$s]->getMarkettotal(); ?>'/></td>
                          <td><input type='text' name='annualtaxes[]' class='form-control _ppgc _sum _cfm02t' value='<?php echo $assessedvalues[$s]->getAnnualtaxes(); ?>'/></td>
                          <?php if($login_ro == 0) { ?>
                          <td><input type='button' class='_delAssessed' value='Delete' /></td>
                          <?php } ?>
                        </tr>
                        <?php
                        $assessedTotals[ 'assessedglasf' ] += $assessedvalues[ $s ]->getAssessedglasf();
                        $assessedTotals[ 'marketland' ] += $assessedvalues[ $s ]->getMarketland();
                        $assessedTotals[ 'marketimp' ] += $assessedvalues[ $s ]->getMarketimp();
                        $assessedTotals[ 'markettotal' ] += $assessedvalues[ $s ]->getMarkettotal();
                        $assessedTotals[ 'annualtaxes' ] += $assessedvalues[ $s ]->getAnnualtaxes();
                        $assessedids[] = $assessedvalues[ $s ]->getId();
                        }
                        ?>
                        <tr >
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><input type='text' id='_assessedglasf' class='form-control _fm00t' readonly value='<? echo $assessedTotals['assessedglasf'];?>'/></td>
                          <td><input type='text' name="rmvland" id='_marketland' class='form-control _ppgc _cfm00t' readonly value='<? echo $assessedTotals['marketland'];?>'/></td>
                          <td><input type='text' name="rmvimp" id='_marketimp' class='form-control _ppgc _cfm00t' readonly value='<? echo $assessedTotals['marketimp'];?>'/></td>
                          <td><input type='text' name="rmvtotal" id='_markettotal' class='form-control _ppgc _sumvt _cfm00t' readonly value='<? echo $assessedTotals['markettotal'];?>'/></td>
                          <td><input type='text' name="taxes" id='_annualtaxes' class='form-control _ppgc _cfm02t' readonly value='<? echo $assessedTotals['annualtaxes'];?>'/></td>
                        </tr>
                      <input type='hidden' name='assessedids' id='assessedvalueid' value='<?php echo implode(",",$assessedids); ?>' />
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Building Data  -->
          <div id="buildingdata" class="tab-pane fade ">
            <div class="grouprow padding-0">
              <div class="col-3 padding-0"></div>
              <div class="col-6 padding-0 label125">
                <div class="form-group row padding-0" style="width: 49%; float: left">
                  <label>No. of Buildings</label>
                  <input type="number" min="0" max="20" step="1" class="form-control _formUpdate _bmtxtfield" name="no_building" id="nobldg" value="<?php echo $improvedsales->getNo_building(); ?>"/>
                </div>
                <div class="form-group row padding-0" style="width: 49%; float: right;">
                  <label>Stories / Levels</label>
                  <input type="text" class="form-control _formUpdate _bmtxtfield" name="no_stories" id="nolvl" value="<?php echo $improvedsales->getNo_stories(); ?>"/>
                </div>
              </div>
              <div class="col-3 padding-0"></div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection">
                <div class="grouphead">Gross Building Area (GBA)</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>Floor 1 (Footprint)</label>
                    <input type="text" class="form-control calc floor_1_gba _formUpdate _ppgc _fm00t _bmtxtfield" name="floor_1_gba" value="<?php echo $improvedsales->getFloor_1_gba(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Floors 2 and above</label>
                    <input type="text" class="form-control calc floor_2_gba _formUpdate _ppgc _fm00t" name="floor_2_gba" value="<?php echo $improvedsales->getFloor_2_gba(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Total Basement GBA (SF)</label>
                    <input type="text" class="form-control calc total_basement_gba _formUpdate _ppgc _fm00t" name="total_basement_gba" value="<?php echo $improvedsales->getTotal_basement_gba(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Basement - % of GBA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="percentbasegba" name="basement_pct_gba" value="<?php echo $improvedsales->getBasement_pct_gba(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>OVERALL TOTAL GBA (SF)</label>
                    <input type="text" class="form-control calc overall_gba _formUpdate _ppgc _fm00t" id="totalgba" name="overall_gba" value="<?php echo $improvedsales->getOverall_gba(); ?>" readonly />
                  </div>
                  <div class="form-group padding-0">
                    <div class="height5 display-block float-none border-0 margin-0"></div>
                  </div>
                  <div class="form-group row">
                    <label>Gross Building Area Source</label>
                    <input list="bsizesource" class="form-control _formUpdate" style="width: 100%;" name="gba_source" value="<?php echo $improvedsales->getGba_source(); ?>">
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection">
                <div class="grouphead">NRA / GLA Building Area</div>
                <div class="fieldsareawhead label225">
                  <div class="form-group row">
                    <label>Floor 1</label>
                    <input type="text" class="form-control calc floor_1_nra _formUpdate _ppgc _fm00t _bmtxtfield" name="floor_1_nra" value="<?php echo $improvedsales->getFloor_1_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Floors 2 and above</label>
                    <input type="text" class="form-control calc floor_2_nra _formUpdate _ppgc _fm00t" name="floor_2_nra" value="<?php echo $improvedsales->getFloor_2_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Finished Basement NRA or GLA (SF)</label>
                    <input type="text" class="form-control calc total_basement_nra _formUpdate _ppgc _fm00t" name="total_basement_nra" value="<?php echo $improvedsales->getTotal_basement_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Finished Basement - % of NRA or GLA</label>
                    <input type="text" id="percentbasenra" class="form-control _formUpdate _ppgc _fm01tp" name="basement_pct_nra" value="<?php echo $improvedsales->getBasement_pct_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>OVERALL TOTAL NRA or GLA (SF)</label>
                    <input type="text" id="totalnra" class="form-control calc overall_nra _formUpdate _ppgc _fm00t" name="overall_nra" value="<?php echo $improvedsales->getOverall_nra(); ?>" readonly />
                  </div>
                  <div class="form-group padding-0">
                    <div class="height5 display-block float-none border-0 margin-0"></div>
                  </div>
                  <div class="form-group row">
                    <label>Rentable Area Source</label>
                    <input list="bsizesource" class="form-control _formUpdate" style="width: 100%;" name="nra_source" value="<?php echo $improvedsales->getNra_source(); ?>" />
                    <datalist id="bsizesource">
                      <?php
                      for ( $c = 0; $c < count( $bsizesource ); $c++ ) {
                        ?>
                      <option><?php echo $bsizesource[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection">
                <div class="grouphead">Ancillary Area</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>Type of Basement</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="basement_type" value="<?php echo $improvedsales->getBasement_type(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Storage Bsmt. (SF)*</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t _bmtxtfield" name="storage_basement_sf" value="<?php echo $improvedsales->getStorage_basement_sf(); ?>" />
                  </div>
                  <div class="form-group">
                    <p><sup>*</sup> Excluded from GBA or NRA / GLA</p>
                  </div>
                  <div class="form-group row">
                    <label>Ancillary Area (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" name="ancillary_area_sf" value="<?php echo $improvedsales->getAncillary_area_sf(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Ancillary Area Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="ancillary_area_desc"><?php echo $improvedsales->getAncillary_area_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection">
                <div class="grouphead">Building Ratios</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio - Overall Site</label>
                    <input type="text" id="lbrover" class="form-control _formUpdate _ppgc _fm01tr" name="land_build_ratio_overall" value="<?php echo $improvedsales->getLand_build_ratio_overall(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio - Primary Site</label>
                    <input type="text" id="lbrprim" class="form-control _formUpdate _ppgc _fm01tr" name="land_build_ratio_primary" value="<?php echo $improvedsales->getLand_build_ratio_primary(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio - Usable</label>
                    <input type="text" id="ltbusab" class="form-control _formUpdate _ppgc _fm01tr" name="land_build_usable" value="<?php echo $improvedsales->getLand_build_usable(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Efficiency Ratio % - NRA or GLA</label>
                    <input type="text" id="effratiogla" class="form-control _formUpdate _ppgc _fm01tp" name="eff_ratio_pct_nra" value="<?php echo $improvedsales->getEff_ratio_pct_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Site Coverage Ratio - Overall Site</label>
                    <input type="text" id="scrover" class="form-control _formUpdate _ppgc _fm01tp" name="site_cover_overall" value="<?php echo $improvedsales->getSite_cover_overall(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Site Coverage Ratio - Primary Site</label>
                    <input type="text" id="scrprim" class="form-control _formUpdate _ppgc _fm01tp" name="site_cover_primary" value="<?php echo $improvedsales->getSite_cover_primary(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Floor Area Ratio</label>
                    <input type="text" id="bldgfar" class="form-control _formUpdate _ppgc _fm00f" name="floor_area_ratio" value="<?php echo $improvedsales->getFloor_area_ratio(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 padding-0">
                <div class="grouprow">
                  <div class="col-4 groupsection label150">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>No. of Parking Stalls </label>
                        <input type="text" class="form-control calc parking_stalls _formUpdate _ppgc _fm00t" name="parking_stalls" value="<?php echo $improvedsales->getParking_stalls(); ?>" />
                      </div>
                      <div class="form-group row">
                        <label>Type of Parking</label>
                        <select class="form-select _formUpdate" name="parking_type">
                          <?php
                          for ( $s = 0; $s < count( $parkingTypeData ); $s++ ) {
                            ?>
                          <option value='<?php echo $parkingTypeData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getParking_type() == $parkingTypeData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $parkingTypeData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row _nomultifam">
                        <label>Parking Ratio - NRA/GLA</label>
                        <input type="text" id="parkratnra" readonly class="form-control _formUpdate _ppgc _fm02t" name="parking_ratio_nra" value="<?php echo $improvedsales->getParking_ratio_nra(); ?>" />
                      </div>
                      <div class="form-group row">
                        <label>Parking Ratio - GBA</label>
                        <input type="text" class="form-control _formUpdate _ppgc _fm02t" id="parkratgba" name="parking_ratio_gba" value="<?php echo $improvedsales->getParking_ratio_gba(); ?>" readonly />
                      </div>
                      <div class="form-group row">
                        <label>Parking Ratio - INPUT</label>
                        <input type="text" list="parratlist" class="form-control _formUpdate _bmtxtfield" name="parking_ratio" value="<?php echo $improvedsales->getParking_ratio(); ?>" />
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
                      <div class="form-group row _sfres">
                        <label>No. of Bedrooms</label>
                        <input type="text" class="form-control sfbedroom _bmtxtfield _formUpdate _ppgc _fm00t" name="sfbedroom" value="<?php echo $improvedsales->getSfbedroom(); ?>"/>
                      </div>
                      <div class="form-group row _sfres">
                        <label>No. of Bathrooms (Full)</label>
                        <input type="text" class="form-control sffullbath _bmtxtfield _formUpdate _ppgc _fm00t" name="sffullbath" value="<?php echo $improvedsales->getSffullbath(); ?>"/>
                      </div>
                      <div class="form-group row _sfres">
                        <label>No. of Bathrooms (Half)</label>
                        <input type="text" class="form-control sfhalfbath _bmtxtfield _formUpdate _ppgc _fm00t" name="sfhalfbath" value="<?php echo $improvedsales->getSfhalfbath(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-4 groupsection label150">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Occupancy Type</label>
                        <select class="form-select _formUpdate _bms3field" name="occupancy_type">
                          <?php
                          for ( $s = 0; $s < count( $occupancyTypeData ); $s++ ) {
                            ?>
                          <option value='<?php echo $occupancyTypeData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getOccupancy_type() == $occupancyTypeData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $occupancyTypeData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Building Quality</label>
                        <select class="form-select _formUpdate _bms3field" name="building_quality">
                          <?php
                          for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                            ?>
                          <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getBuilding_quality() == $conditionData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $conditionData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Building Class</label>
                        <select class="form-select _formUpdate _bms3field" name="building_class">
                          <?php
                          for ( $s = 0; $s < count( $bclassData ); $s++ ) {
                            ?>
                          <option value='<?php echo $bclassData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getBuilding_class() == $bclassData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $bclassData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Interior Condition</label>
                        <select class="form-select _formUpdate _bms3field" name="int_condition">
                          <?php
                          for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                            ?>
                          <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getInt_condition() == $conditionData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $conditionData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Exterior Condition</label>
                        <select class="form-select _formUpdate _bms3field" name="ext_condition">
                          <?php
                          for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                            ?>
                          <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getExt_condition() == $conditionData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $conditionData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-4 groupsection label150">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Year(s) Built</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="year_built" value="<?php echo $improvedsales->getYear_built(); ?>" />
                      </div>
                      <div class="form-group row">
                        <label>Last Renovation Year</label>
                        <input type="text" list="YBlastReno" class="form-control _formUpdate _bmtxtfield" name="last_renovation" value="<?php echo $improvedsales->getLast_renovation(); ?>"/>
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
                      <div class="form-group row">
                        <label>Construction Class</label>
                        <select class="form-select _formUpdate" name="const_class">
                          <?php
                          for ( $s = 0; $s < count( $cclassData ); $s++ ) {
                            ?>
                          <option value='<?php echo $cclassData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getConst_class() == $cclassData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $cclassData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Construction Desc.</label>
                        <input type="text" list="codescrip" class="form-control _formUpdate _bmtxtfield" name="const_descr" value="<?php echo $improvedsales->getConst_descr(); ?>" />
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
                        <input type="text" list="confealist" class="form-control _formUpdate _bmtxtfield" name="other_const_features" value="<?php echo $improvedsales->getOther_const_features(); ?>" />
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
                      <div class="form-group row _sfres">
                        <label>Additional Structures</label>
                        <textarea class="form-control _formUpdate _bmtxtfield" rows="2" name="addstructures"><?php echo $improvedsales->getAddstructures(); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="deprectionanalysis">
              <div class="grouprow">
                <div class="col-4 groupsection label225 padding-0 depdata">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Gross Building Area</label>
                      <input type="text" class="form-control _ppgc _fm00t" id="deptotalgba" value="<?php echo $improvedsales->getOverall_gba(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Replacement Cost New ($/SF GBA)</label>
                      <input type="text" class="form-control calc replace_cost _ppgc _cfm02t _bmtxtfield" name="replace_cost" value="<?php echo $improvedsales->getReplace_cost(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Effective Age (Years)</label>
                      <input type="text" class="form-control calc eff_age_years _ppgc _fm00t _bmtxtfield" name="eff_age_years" value="<?php echo $improvedsales->getEff_age_years(); ?>" />
                    </div>
                  </div>
                </div>
                <div class="col-4 groupsection label225 padding-0 depdata">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Estimated RCN (output)</label>
                      <input type="text" class="form-control calc est_rcn _ppgc _cfm00t" id="estimrcn" name="est_rcn" value="<?php echo $improvedsales->getEst_rcn(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Less: Allocated Improvement Price </label>
                      <input type="text" class="form-control calc less_alloc_imp_price _ppgc _cfm00t" id="lessalloland" name="less_alloc_imp_price" value="<?php echo $improvedsales->getLess_alloc_imp_price(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Depreciation From all Sources</label>
                      <input type="text" class="form-control calc depreciation_all_sources _ppgc _cfm00t" id="depallsource" name="depreciation_all_sources" value="<?php echo $improvedsales->getDepreciation_all_sources(); ?>" readonly />
                    </div>
                  </div>
                </div>
                <div class="col-4 groupsection label225 padding-0 depdata">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Implied Total % Depreciation</label>
                      <input type="text" class="form-control _ppgc _fm01tp" id="imptotdep" name="implied_total_pct_deprec" value="<?php echo $improvedsales->getImplied_total_pct_deprec(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Physical Depreciation (2.0% / Year)</label>
                      <input type="text" class="form-control calc physical_depreciation _ppgc _fm01tp" id="phydep" name="physical_depreciation" value="<?php echo $improvedsales->getPhysical_depreciation(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Implied Functional Obsolescence</label>
                      <input type="text" class="form-control _ppgc _fm01tp" id="ifobs" name="inplied_func_obsol" value="<?php echo $improvedsales->getInplied_func_obsol(); ?>" readonly />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection">
                <div class="fieldsarea">
                  <div class="form-group">
                    <label>Comments</label>
                    <textarea class="form-control _formUpdate" rows="5" name="building_comments"><?php echo $improvedsales->getBuilding_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Depreciation Analysis Tab--> 
          <!-- Operating Data  -->
          <div id="operatingexpenses" class="tab-pane fade">
            <div class="row">
              <div class="col-1 margin-0 padding-0"></div>
              <div class="col-10 padding-0">
                <div class="grouprow">
                  <div class="col-12 groupsection label140">
                    <div class="fieldsarea">
                      <div class="form-group row" style="width: 39%; float: left;">
                        <label>Actual or Pro Forma ?</label>
                        <input list="actprof" class="form-control _formUpdate" name="oe_income_actual_proforma" value="<?php echo $improvedsales->getOe_income_actual_proforma(); ?>" />
                        <datalist id="actprof">
                        <?php
                        for ( $c = 0; $c < count( $actprof ); $c++ ) {
                          ?>
                        <option><?php echo $actprof[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </div>
                      <div class="form-group row" style="width: 39%; float: left;">
                        <label>Source</label>
                        <input list="actprofsource" class="form-control _formUpdate" name="oe_income_source" value="<?php echo $improvedsales->getOe_income_source(); ?>" />
                        <datalist id="actprofsource">
                          <?php
                          for ( $c = 0; $c < count( $actprofsource ); $c++ ) {
                            ?>
                          <option><?php echo $actprofsource[$c]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </datalist>
                      </div>
                      <div class="form-group row" style="width: 20%; float: right;">
                        <label>NOI Only</label>
                        <input type="checkbox" class="form-check-input _formUpdate" style="width: 16px; height: 25px;" name="oe_only_noi" id="onlyNOI" value="1" <?php if ($improvedsales->getOe_only_noi() == 1) echo 'checked="checked"'; ?> />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-1 margin-0 padding-0"></div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="_onlyNOI">
                    <div class="form-group row">
                      <label>Potential Gross Rent (PGR)</label>
                      <input type="text" class="form-control calc oe_pgr _formUpdate _ppgc _cfm00t" name="oe_pgr" value="<?php echo $improvedsales->getOe_pgr(); ?>" />
                    </div>
                    <div class="form-group row _nomultifam">
                      <label>Reimbursable CAM Income</label>
                      <input type="text" class="form-control calc oe_cam_income _formUpdate  _ppgc _cfm00t" name="oe_cam_income" value="<?php echo $improvedsales->getOe_cam_income(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Misc. Income</label>
                      <input type="text" class="form-control calc oe_misc_income _formUpdate  _ppgc _cfm00t" name="oe_misc_income" value="<?php echo $improvedsales->getOe_misc_income(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Potential Gross Income (PGI)</label>
                      <input type="text" class="form-control calc oe_pgi _formUpdate  _ppgc _cfm00t" id="oepgi" name="oe_pgi" value="<?php echo $improvedsales->getOe_pgi(); ?>" readonly>
                    </div>
                    <div class="form-group row">
                      <label>Vacancy %</label>
                      <input type="text" class="form-control calc oe_vacany_pct _formUpdate  _ppgc _fm06fp" name="oe_vacany_pct" value="<?php echo $improvedsales->getOe_vacany_pct(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Vacancy &amp; Credit Loss ($)</label>
                      <input type="text" class="form-control calc oe_vacancy_credit_loss _formUpdate _ppgc _cfm00t" id="vaccredit" name="oe_vacancy_credit_loss" value="<?php echo $improvedsales->getOe_vacancy_credit_loss(); ?>" readonly />
                    </div>
                    <div class="form-group row _onlyNOIMF">
                      <label>Other Income</label>
                      <input type="text" class="form-control calc oe_other_income _formUpdate  _ppgc _cfm00t" name="oe_other_income" value="<?php echo $improvedsales->getOe_other_income(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Effective Gross Income (EGI)</label>
                      <input type="text" class="form-control calc oe_egi _formUpdate  _ppgc _cfm00t" id="oeegi" name="oe_egi" value="<?php echo $improvedsales->getOe_egi(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Expenses</label>
                      <input type="text" class="form-control calc oe_expences _formUpdate  _ppgc _cfm00t" name="oe_expences" value="<?php echo $improvedsales->getOe_expences(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Total Other Income</label>
                      <input type="text" class="form-control calc oe_total_other_income _formUpdate  _ppgc _cfm00t" id="tototherinc" name="oe_total_other_income" value="<?php echo $improvedsales->getOe_total_other_income(); ?>" readonly />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label>Total Net Operating Income (NOI)</label>
                    <input type="text" class="form-control calc oe_total_noi _formUpdate _ppgc _cfm00t" id="totalnoi" name="oe_total_noi" value="<?php echo $improvedsales->getOe_total_noi(); ?>" />
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row _onlyNOI">
                    <label>PGR / SF NRA or GLA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oepgrsf" name="oe_pgr_sf_nra" value="<?php echo $improvedsales->getOe_pgr_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row _onlyNOI">
                    <label>Reimb. CAM / SF NRA or GLA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oecamsf" name="oe_cam_sf_nra" value="<?php echo $improvedsales->getOe_cam_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row _onlyNOI">
                    <label>- PGI / SF NRA or GLA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oepgisf" name="pgi_sf_nra" value="<?php echo $improvedsales->getPgi_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row _onlyNOI">
                    <label>- Vacancy / SF NRA or GLA </label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oevacsf" name="vacancy_sf_nra" value="<?php echo $improvedsales->getVacancy_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row _onlyNOI">
                    <label>- EGI / SF NRA or GLA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oeegisf" name="egi_sf_nra" value="<?php echo $improvedsales->getEgi_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group _onlyNOI">
                    <label>Expenses / SF NRA or GLA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oeexpsf" name="expence_sf_nra" value="<?php echo $improvedsales->getExpence_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>- NOI / SF NRA or GLA (BA)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm02t" id="oenoisf" name="oe_noi_sf_nra" value="<?php echo $improvedsales->getOe_noi_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row _onlyNOI">
                    <label>- Expense Ratio (% EGI)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm02tp" id="oeexprat" name="oe_expence_ratio" value="<?php echo $improvedsales->getOe_expence_ratio(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Reserves in Expenses ? (% or $/SF)</label>
                    <input list="resexp" class="form-control _formUpdate" name="oe_reserves" value="<?php echo $improvedsales->getOe_reserves(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Management in Expenses ? (% EGI)</label>
                    <input list="resexp" class="form-control _formUpdate" name="oe_management_expence" value="<?php echo $improvedsales->getOe_management_expence(); ?>">
                    <datalist id="resexp">
                      <?php
                      for ( $c = 0; $c < count( $resexp ); $c++ ) {
                        ?>
                      <option><?php echo $resexp[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Property Type Details Tab-->
          <div id="propertytype" class="tab-pane fade">
            <div class="grouprow PDOffice">
              <div class="col-12 groupsection label125 padding-0">
                <div class="form-group row" style="width: 33%; float: left;">
                  <label>Fire Sprinklers</label>
                  <select class="form-select" name="off_fire_sprinkler">
                    <?php
                    for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                      ?>
                    <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
																        if ( $improvedsales->getOff_fire_sprinkler() == $yesnoDataDesc[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group row" style="width: 32%; float: left;">
                  <label>Type of HVAC Service</label>
                  <input type="text" list="offhvactype" class="form-control" name="off_type_hvac" value="<?php echo $improvedsales->getOff_type_hvac() ?>" />
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
                <div class="form-group row" style="width: 33%; float: right;">
                  <label>Elevator Served?</label>
                  <select class="form-select _bms3field" name="off_elevator_service">
                    <?php
                    for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                      ?>
                    <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
                												        if ( $improvedsales->getOff_elevator_service() == $yesnoDataDesc[$s]["id"] ) {
                												            ?>selected='selected'<?php 
                												        }
                												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="grouprow PDShopping">
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Total Gross Building Area - GBA (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" name="shop_total_gba" value="<?php echo $improvedsales->getShop_total_gba(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Total Gross Leasable Area - GLA (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" name="shop_total_nra" value="<?php echo $improvedsales->getShop_total_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Anchor Space Included in GLA ?</label>
                    <select class="form-select" name="shop_achor_space_inc">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
                												        if ( $improvedsales->getShop_achor_space_inc() == $yesnoDataDesc[$s]["id"] ) {
                												            ?>selected='selected'<?php 
                												        }
                												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>In-Line Retail Space - GLA Only (SF)</label>
                    <input type="text" class="form-control calc shop_inline_sf _ppgc _fm00t _bmtxtfield" name="shop_inline_sf" value="<?php echo $improvedsales->getShop_inline_sf(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>In-Line Retail Space - GLA Only (%)</label>
                    <input type="text" class="form-control _ppgc _fm01tp" id="totinlinepct" name="shop_inline_pct" value="<?php echo $improvedsales->getShop_anchor_pct(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Total Anchor Tenant GLA (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" id="achorsfcalc" name="shop_anchor_sf" value="<?php echo $improvedsales->getShop_anchor_sf(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Anchor Space - GLA Only (%)</label>
                    <input type="text" class="form-control _ppgc _fm01tp" id="anchorpctcalc" name="shop_anchor_pct" value="<?php echo $improvedsales->getShop_anchor_pct(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Anchor Tenant Names</label>
                    <textarea class="form-control _bmtxtfield" name="shop_anchor_tenant"><?php echo $improvedsales->getShop_anchor_tenant(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Other Major Tenants</label>
                    <textarea class="form-control _bmtxtfield" name="shop_other_tenant"><?php echo $improvedsales->getShop_other_tenant(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDCstore">
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Canopy?</label>
                    <select class="form-select" id="isCanopy" name="store_canopy">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
	                												        if ( $improvedsales->getStore_canopy() == $yesnoDataDesc[$s]["id"] ) {
	                												            ?>selected='selected'<?php 
	                												        }
	                												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _canopyDesc">
                    <label>Canopy Size Description</label>
                    <input type="text" class="form-control _bmtxtfield" name="store_canopy_desc" value="<?php echo $improvedsales->getStore_canopy_desc(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Number of Fuel Dispensers</label>
                    <input type="number" step="1" class="form-control _bmtxtfield" name="store_no_fuel" value="<?php echo $improvedsales->getStore_no_fuel(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Fuel Dispensers Description</label>
                    <input type="text" class="form-control" name="store_fuel_desc" value="<?php echo $improvedsales->getStore_fuel_desc(); ?>" />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label180 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Average Monthly Gallonage</label>
                    <input type="text" class="form-control calc store_avg_month_gallon _ppgc _fm00t _bmtxtfield" name="store_avg_month_gallon" value="<?php echo $improvedsales->getStore_avg_month_gallon(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly C-Store Sales</label>
                    <input type="text" class="form-control calc store_month_store_sales _ppgc _cfm00t _bmtxtfield" name="store_month_store_sales" value="<?php echo $improvedsales->getStore_month_store_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly Car Wash Sales</label>
                    <input type="text" class="form-control calc store_month_car_wash_sales _ppgc _cfm00t" name="store_month_car_wash_sales" value="<?php echo $improvedsales->getStore_month_car_wash_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly Mini-Lube Sales</label>
                    <input type="text" class="form-control calc store_month_mini_sales _ppgc _cfm00t" name="store_month_mini_sales" value="<?php echo $improvedsales->getStore_month_mini_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Total Monthly Sales (Ex. Fuel)</label>
                    <input type="text" class="form-control calc store_total_month_sales _ppgc _cfm00t" id="mosalescalc" name="store_total_month_sales" value="<?php echo $improvedsales->getStore_total_month_sales(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Chain Affiliate</label>
                    <input type="text" class="form-control" name="store_chain_affil" value="<?php echo $improvedsales->getStore_chain_affil(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Co-Chain Affiliate</label>
                    <input type="text" class="form-control" name="store_co_chain_affil" value="<?php echo $improvedsales->getStore_co_chain_affil(); ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDService">
              <div class="col-6 groupsection label200 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Level of Service</label>
                    <select class="form-select" name="veh_level">
                      <?php
                      for ( $s = 0; $s < count( $lvlserviceData ); $s++ ) {
                        ?>
                      <option value='<?php echo $lvlserviceData[$s]["id"]; ?>' <?php
	                												        if ( $improvedsales->getVeh_level() == $lvlserviceData[$s]["id"] ) {
	                												            ?>selected='selected'<?php 
	                												        }
	                												        ?> ><?php echo $lvlserviceData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _nosbtun">
                    <label>No. of Services Bays or Tunnels</label>
                    <input type="number" step="1" class="form-control calc veh_tunnel _bmtxtfield" name="veh_tunnel" value="<?php echo $improvedsales->getVeh_tunnel(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Service Area (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" id="svcareacalc" name="veh_service_sf" value="<?php echo $improvedsales->getVeh_service_sf() ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label200 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Showroom / Office Area (SF)</label>
                    <input type="text" class="form-control calc veh_showroom_sf _ppgc _fm00t _bmtxtfield" name="veh_showroom_sf" value="<?php echo $improvedsales->getVeh_showroom_sf(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Showroom - % of GBA</label>
                    <input type="text" class="form-control _ppgc _fm01tp" id="showroompctcalc" name="veh_showroom_pct" value="<?php echo $improvedsales->getVeh_showroom_pct(); ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDFood">
              <div class="col-12 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row" style="width: 25%; float: left;">
                    <label>No. of Seats</label>
                    <input type="text" class="form-control" name="rest_no_seats" value="<?php echo $improvedsales->getRest_no_seats(); ?>" />
                  </div>
                  <div class="form-group row" style="width: 24%; float: left;">
                    <label>Drive Through?</label>
                    <select class="form-select" name="rest_drive_thru">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $improvedsales->getRest_drive_thru() == $yesnoDataDesc[$s]["id"] ) {
            												            ?>selected='selected'<?php 
            												        }
            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row" style="width: 24%; float: right;">
                    <label>Is Alcohol Served?</label>
                    <select class="form-select" name="rest_alcohol">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $improvedsales->getRest_alcohol() == $yesnoDataDesc[$s]["id"] ) {
            												            ?>selected='selected'<?php 
            												        }
            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row" style="width: 25%; float: left;">
                    <label>Playground?</label>
                    <select class="form-select" name="rest_playground">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $improvedsales->getRest_playground() == $yesnoDataDesc[$s]["id"] ) {
            												            ?>selected='selected'<?php 
            												        }
            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow  PDIndustrial">
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Interior Office - Floor 1 (SF)</label>
                    <input type="text" class="form-control calc ind_int_office_1 _ppgc _fm00t _bmtxtfield" name="ind_int_office_1" value="<?php echo $improvedsales->getInd_int_office_1(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Interior Office - Floor 2 (SF)</label>
                    <input type="text" class="form-control calc ind_int_office_2 _ppgc _fm00t" name="ind_int_office_2" value="<?php echo $improvedsales->getInd_int_office_2(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Exterior Office - Floor 1 (SF)</label>
                    <input type="text" class="form-control calc ind_ext_office_1 _ppgc _fm00t" name="ind_ext_office_1" value="<?php echo $improvedsales->getInd_ext_office_1(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Exterior Office - Floor 2 (SF)</label>
                    <input type="text" class="form-control calc ind_ext_office_2 _ppgc _fm00t" name="ind_ext_office_2" value="<?php echo $improvedsales->getInd_ext_office_2(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Total Office Build-Out (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" id="totoffbosfcalc" name="ind_total_office" value="<?php echo $improvedsales->getInd_total_office(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Percent Office Build-Out (%)</label>
                    <input type="text" class="form-control _ppgc _fm01tp" id="totoffbopctcalc" name="ind_pct_office" value="<?php echo $improvedsales->getInd_pct_office(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Clear Height (Feet)</label>
                    <input type="text" list="cheightlist" class="form-control _bmtxtfield" name="ind_clear_height" value="<?php echo $improvedsales->getInd_clear_height(); ?>" />
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
                  <div class="form-group row">
                    <label>Truck Doors - Grade or Ramped</label>
                    <input type="text" list="tdRamp" class="form-control _bmtxtfield" name="ind_truck_grade" value="<?php echo $improvedsales->getInd_truck_grade(); ?>"/>
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
                    <input type="text" list="tdDock" class="form-control _bmtxtfield" name="ind_truck_dock" value="<?php echo $improvedsales->getInd_truck_dock(); ?>"/>
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
                </div>
              </div>
              <div class="col-4 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Type of Whse HVAC</label>
                    <input list="hvaclist" class="form-control" name="ind_hvac" value="<?php echo $improvedsales->getInd_hvac(); ?>" />
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
                  <div class="form-group row">
                    <label>Fire Sprinklers?</label>
                    <select class="form-select _bms3field" name="ind_fire">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getInd_fire() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Rail Served?</label>
                    <select class="form-select _bms3field" id="railds" name="ind_rail">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getInd_rail() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _rails">
                    <label>Rail Doors</label>
                    <input type="text" class="form-control" name="ind_no_rail" value="<?php echo $improvedsales->getInd_no_rail(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Storage Mezzanine?</label>
                    <select class="form-select" id="mezzsf" name="ind_storage_mess">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getInd_storage_mess() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _stormz">
                    <label>Storage Mezzanine Area (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t" name="ind_storage_mezz_sf" value="<?php echo $improvedsales->getInd_storage_mezz_sf(); ?>" />
                  </div>
                  <div class="form-group row _stormz">
                    <label>Mezzanine Description</label>
                    <textarea class="form-control" name="ind_mezz_desc"><?php echo $improvedsales->getInd_mezz_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div id="unitMix">
              <div class="grouprow selfstorTab">
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
                          <?php if($login_ro == 0) { ?>
                          <th width="9%"><input type="button" id="addmfunit" class="_addMFunit" value="Add Unit Type"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $mfids = array();
                        $mfvalues = $improvedsales->getMfvalues();
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
                          <?php if($login_ro == 0) { ?>
                          <td><input type='button' class='_delMFunit' value='Delete' /></td>
                          <?php } ?>
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
              <div class="grouprow selfstor">
                <div class="col-3 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Total Number of BR</label>
                      <input type="text" class="form-control calc total_bedroom _ppgc _fm00t" name="total_bedroom" id="total_bedroom" value="" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Bedroom Ratio</label>
                      <input type="text" class="form-control _ppgc _fm02t" id="brratcalc" name="bedroom_ratio" value="<?php echo $improvedsales->getBedroom_ratio(); ?>" readonly />
                    </div>
                  </div>
                </div>
                <div class="col-3 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Parking Ratio / Unit </label>
                      <input type="text" class="form-control _ppgc _fm01t" id="pkratunitcalc" name="parking_ratio_unit" value="<?php echo $improvedsales->getParking_ratio_unit(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Annual Turnover (%)</label>
                      <input type="text" class="form-control" name="annual_turnover_pct" value="<?php echo $improvedsales->getAnnual_turnover_pct(); ?>" />
                    </div>
                  </div>
                </div>
                <div class="col-3 groupsection label175 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Avg. Monthly Rent ($/Unit)</label>
                      <input type="text" class="form-control _ppgc calc avg_month_rent_unit _cfm00t" name="avg_month_rent_unit" value="<?php echo $improvedsales->getAvg_month_rent_unit(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Avg. Monthly Rent ($/SF)</label>
                      <input type="text" class="form-control _ppgc _cfm02t" id="avgmorentsfunitcalc" name="avg_month_rent_sf" value="<?php echo $improvedsales->getAvg_month_rent_sf(); ?>" readonly />
                    </div>
                  </div>
                </div>
                <div class="col-3 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row" style="display: none;">
                      <label>Total Rooms</label>
                      <input type="text" class="form-control _ppgc _fm00t" name="total_rooms" value="<?php echo $improvedsales->getTotal_rooms(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Density</label>
                      <input type="text" class="form-control _ppgc _fm02t" id="densirtunitcalc" name="density" value="<?php echo $improvedsales->getDensity(); ?>" readonly />
                    </div>
                  </div>
                </div>
              </div>
              <div class="grouprow">
                <div class="col-12 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row _mulfamhide" style="width: 33%; float: left;">
                      <label>Total Storage Units</label>
                      <input type="text" class="form-control _ppgc _fm00t" name="total_storage_units" value="<?php echo $improvedsales->getTotal_storage_units(); ?>" />
                    </div>
                    <div class="form-group row" style="width: 32%; float: left;">
                      <label>Average Unit Size (SF)</label>
                      <input type="text" class="form-control _ppgc calc avg_unit_size _fm02t" id="avgsizeunitcalc" name="avg_unit_size" value="<?php echo $improvedsales->getAvg_unit_size(); ?>" readonly />
                    </div>
                    <div class="form-group row selfstor" style="width: 33%; float: left;">
                      <label>Total Number of Units</label>
                      <input type="text" class="form-control calc total_no_units _ppgc _fm00t" name="total_no_units" id="total_no_units"  value="<?php echo $improvedsales->getTotal_no_units(); ?>" readonly/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grouprow UMAdjPrices">
                <div class="col-6 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row" style="width: 49%; float: left;">
                      <label>-PGI / Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="pgiunitcalc" name="pgi_unit" value="<?php echo $improvedsales->getPgi_unit(); ?>" readonly />
                    </div>
                    <div class="form-group row" style="width: 49%; float: right;">
                      <label>Expenses / Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="expunitcalc" name="expense_unit" value="<?php echo $improvedsales->getExpense_unit(); ?>" readonly />
                    </div>
                    <div class="form-group row" style="width: 49%; float: left;">
                      <label>-Vacancy / Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="vacancyunitcalc" name="vacancy_unit" value="<?php echo $improvedsales->getVacancy_unit(); ?>" readonly />
                    </div>
                    <div class="form-group row" style="width: 49%; float: right;">
                      <label>-NOI / Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="noiunitcalc" name="noi_unit" value="<?php echo $improvedsales->getNoi_unit(); ?>" readonly />
                    </div>
                    <div class="form-group row" style="width: 49%; float: left;">
                      <label>-EGI / Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="egiunitcalc" name="egi_unit" value="<?php echo $improvedsales->getEgi_unit(); ?>" readonly />
                    </div>
                  </div>
                </div>
              </div>
              <div class="grouprow selfstor">
                <div class="col-12 groupsection label250 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row" style="width: 25%; float: left;">
                      <label>Subsidized / Restricted Project?</label>
                      <select class="form-select" name="subsidized_project">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
	            												        if ( $improvedsales->getSubsidized_project() == $yesnoDataDesc[$s]["id"] ) {
	            												            ?>selected='selected'<?php 
	            												        }
	            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row" style="width: 74%; float: right;">
                      <label>Subsidized / Restricted Project Description</label>
                      <input type="text" class="form-control" name="subsidized_project_desc" value="<?php echo $improvedsales->getSubsidized_project_desc(); ?>" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDMini">
              <div class="col-4 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Coded Access?</label>
                    <select class="form-select" name="ss_code_access">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_code_access() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Alarmed Units?</label>
                    <select class="form-select" name="ss_alarm">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_alarm() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Heated Units?</label>
                    <select class="form-select" name="ss_heat">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_heat() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Security Cameras?</label>
                    <select class="form-select" name="ss_security">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_security() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>RV / Boat Spaces?</label>
                    <select class="form-select" name="ss_boat">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_boat() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>On-Site Manager ?</label>
                    <select class="form-select" name="ss_on_site">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_on_site() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
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
                    <label>Manager Residence?</label>
                    <select class="form-select" id="manres" name="ss_residence">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSs_residence() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _mgrres">
                    <label>Mgr. Residence Description</label>
                    <input type="text" class="form-control" name="ss_residence_desc" value="<?php echo $improvedsales->getSs_residence_desc(); ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div id="mobilehomepark">
              <div class="grouprow">
                <div class="col-4 groupsection label175 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Number of Single Wides</label>
                      <input type="text" class="form-control calc no_single_wide _ppgc _fm00t _bmtxtfield" name="no_single_wide" value="<?php echo $improvedsales->getNo_single_wide(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Number of Double Wides</label>
                      <input type="text" class="form-control calc no_double_wide _ppgc _fm00t _bmtxtfield" name="no_double_wide" value="<?php echo $improvedsales->getNo_double_wide(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Number of Triple Wides</label>
                      <input type="text" class="form-control calc no_triple_wide _ppgc _fm00t _bmtxtfield" name="no_triple_wide" value="<?php echo $improvedsales->getNo_triple_wide(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Number of RV Spaces</label>
                      <input type="text" class="form-control calc no_rv_space _ppgc _fm00t _bmtxtfield" name="no_rv_space" value="<?php echo $improvedsales->getNo_rv_space(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Total Spaces</label>
                      <input type="text" class="form-control calc total_space _ppgc _fm00t _bmtxtfield" name="total_space" id="totalmhspace" value="<?php echo $improvedsales->getTotal_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Space / Acre</label>
                      <input type="text" class="form-control _ppgc _fm01t" id="mhspaceacre" name="space_acre" value="<?php echo $improvedsales->getSpace_acre(); ?>" readonly />
                    </div>
                  </div>
                </div>
                <div class="col-4 groupsection label175 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>No. of Other Buldings</label>
                      <input type="text" class="form-control _ppgc _fm00t" name="no_other_building" value="<?php echo $improvedsales->getNo_other_building(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Buldings Description</label>
                      <input type="text" class="form-control _bmtxtfield" name="other_building_desc" value="<?php echo $improvedsales->getOther_building_desc(); ?>" />
                    </div>
                    <div class="form-group row">
                      <label>Park Condition</label>
                      <select class="form-select _bms3field" name="park_cond">
                        <?php
                        for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                          ?>
                        <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getPark_cond() == $conditionData[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $conditionData[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Park Quality</label>
                      <select class="form-select _bms3field" name="park_quality">
                        <?php
                        for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                          ?>
                        <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getPark_quality() == $conditionData[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $conditionData[$s]["definition"];?></option>
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
                      <label>Expenses / Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="expense_space" id="mhexpense_space" value="<?php echo $improvedsales->getExpense_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>PGI / Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="pgi_space" id="mhpgi_space" value="<?php echo $improvedsales->getPgi_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Vacancy / Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="vacancy_space" id="mhvacancy_space" value="<?php echo $improvedsales->getVacancy_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>EGI / Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="egi_space" id="mhegi_space" value="<?php echo $improvedsales->getEgi_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>NOI / Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="noi_space" id="mhnoi_space" value="<?php echo $improvedsales->getNoi_space(); ?>" readonly />
                    </div>
                    <div class="form-group row">
                      <label>Price Per Space</label>
                      <input type="text" class="form-control _ppgc _cfm00t" name="price_space" id="mhprice_space" value="<?php echo $improvedsales->getPrice_space(); ?>" readonly />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="amenunit">
              <div class="grouprow">
                <div class="col-4 groupsection label160 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Exercise Facilities ?</label>
                      <select class="form-select" name="exercise">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getExercise() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Spa?</label>
                      <select class="form-select" name="spa">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getSpa() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row nomobhome">
                      <label>Washer / Dryer Hookups?</label>
                      <select class="form-select" name="wash_dry">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $improvedsales->getWash_dry() == $yesnoDataDesc[$s]["id"] ) {
		            												            ?>selected='selected'<?php 
		            												        }
		            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-8 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Other Unit Amenities</label>
                      <textarea class="form-control" rows="10" name="other_amenities"><?php echo $improvedsales->getOther_amenities(); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Transaction Data -->
          <div id="transationdata" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-3 groupsection label160 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Property Appraised</label>
                    <input type="checkbox" name="property_appraised" class="form-check-input" id="propapp" value="1" <?php if ($improvedsales->getProperty_appraised()==1 ) echo 'checked="checked"'; ?>/>
                  </div>
                  <div class="form-group row _propapp">
                    <label>aa Job File No.</label>
                    <input type="text" class="form-control" name="mc_job" value="<?php echo $improvedsales->getMc_job(); ?>"/>
                  </div>
                  <div class="form-group row _propapp">
                    <label>aa Appraiser Name</label>
                    <input list="apprnames" class="form-control" name="appraiser_name" value="<?php echo $improvedsales->getAppraiser_name(); ?>"/>
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
                  <div class="form-group row">
                    <label>Grantor / Seller</label>
                    <textarea class="form-control _bmtxtfield" rows="4" name="grantor"><?php echo $improvedsales->getGrantor(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Grantee / Buyer</label>
                    <textarea class="form-control _bmtxtfield" rows="4" name="grantee"><?php echo $improvedsales->getGrantee(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Buyer Status</label>
                    <select class="form-select _formUpdate" name="buyer_status">
                      <?php
                      for ( $s = 0; $s < count( $buyerstatusData ); $s++ ) {
                        ?>
                      <option value='<?php echo $buyerstatusData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getBuyer_status() == $buyerstatusData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $buyerstatusData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Property Rights Conv</label>
                    <select class="form-select _bms3field" name="prop_rights_conv">
                      <?php
                      for ( $s = 0; $s < count( $proprightsData ); $s++ ) {
                        ?>
                      <option value='<?php echo $proprightsData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getProp_rights_conv() == $proprightsData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $proprightsData[$s]["definition"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>% Interest Conveyed</label>
                    <input type="text" list="int_conv" class="form-control" name="interest_conv" <?php if ($improvedsales->getId() == '') { ?>        value="100.0%" <?php } else {?> value="<?php echo $improvedsales->getInterest_conv(); ?>" <?php } ?> />
                    <datalist id="int_conv">
                      <?php
                      for ( $c = 0; $c < count( $int_conv ); $c++ ) {
                        ?>
                      <option><?php echo $int_conv[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Current Use</label>
                    <input type="text" class="form-control" name="current_use" value="<?php echo $improvedsales->getCurrent_use(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Use Changes?</label>
                    <select class="form-select" id="pusechange" name="proposed_use_change">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getProposed_use_change() == $yesnoDataDesc[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $yesnoDataDesc[$s]["definition"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _pudesc">
                    <label>Proposed Use Description</label>
                    <textarea class="form-control" rows="4" name="proposed_use_desc"><?php echo $improvedsales->getProposed_use_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Sale Price</label>
                    <input type="text" class="form-control calc sale_price _ppgc _cfm00t _bmtxtfield" name="sale_price" value="<?php echo $improvedsales->getSale_price(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Recording Date</label>
                    <input type="date" class="form-control _bmtxtfield" name="record_date" value="<?php echo $improvedsales->getRecord_date(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Conv Doc Type</label>
                    <select class="form-select _bms3field" name="conv_doc_type">
                      <?php
                      for ( $s = 0; $s < count( $convdocData ); $s++ ) {
                        ?>
                      <option value='<?php echo $convdocData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getConv_doc_type() == $convdocData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $convdocData[$s]["definition"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Recording No.</label>
                    <input type="text" class="form-control _bmtxtfield" name="conv_doc_rec_no" value="<?php echo $improvedsales->getConv_doc_rec_no(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Type of Financing</label>
                    <input type="text" list="findesc" class="form-control _bmtxtfield" name="type_finance" value="<?php echo $improvedsales->getType_finance(); ?>" />
                    <datalist id="findesc">
                      <?php
                      for ( $c = 0; $c < count( $findesc ); $c++ ) {
                        ?>
                      <option><?php echo $findesc[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Sale Status</label>
                    <select class="form-select _bms3field" name="sale_status">
                      <?php
                      for ( $s = 0; $s < count( $salestatusData ); $s++ ) {
                        ?>
                      <option value='<?php echo $salestatusData[$s]["id"]; ?>' <?php
            																        if ( $improvedsales->getSale_status() == $salestatusData[$s]["id"] ) {
            																            ?>selected='selected'<?php 
            																        }
            																        ?> ><?php echo $salestatusData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>List Price Available?</label>
                    <input type="checkbox" name="list_price_avail" class="form-check-input" id="lpAvail" value="1" <?php if ($improvedsales->getList_price_avail() == 1) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row _listPrice">
                    <label>List Price</label>
                    <input type="text" class="form-control calc list_price _ppgc _cfm00t" name="list_price" value="<?php echo $improvedsales->getList_price(); ?>" />
                  </div>
                  <div class="form-group row _listPrice">
                    <label>% Change</label>
                    <input type="text" class="form-control _ppgc _fm01tp" id="chnglistpr" name="list_price_change" value="<?php echo $improvedsales->getList_price_change(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Marketing Time</label>
                    <input type="text" list="tonmarket" class="form-control _bmtxtfield" name="market_time" value="<?php echo $improvedsales->getMarket_time(); ?>" />
                    <datalist id="tonmarket">
                      <?php
                      for ( $c = 0; $c < count( $tonmarket ); $c++ ) {
                        ?>
                      <option><?php echo $tonmarket[$c]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </datalist>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label165 padding-0">
                <div class="fieldsarea">
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Financing Terms Adj.</label>
                        <input type="text" class="form-control calc fin_term_adj _ppgc _cfm00t" name="fin_term_adj" value="<?php echo $improvedsales->getFin_term_adj(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="fin_term_adj_desc" value="<?php echo $improvedsales->getFin_term_adj_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Cash Equivalent Sale Price </label>
                        <input type="text" class="form-control calc cash_equiv_price _ppgc _cfm00t" id="csheqsp" name="cash_equiv_price" value="<?php echo $improvedsales->getCash_equiv_price(); ?>" readonly />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group" style="height: 34px; display: block;"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Conditions Of Sale Adj.</label>
                        <input type="text" class="form-control calc cond_sale_adj _ppgc _cfm00t" name="cond_sale_adj" value="<?php echo $improvedsales->getCond_sale_adj(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="cond_sale_desc" value="<?php echo $improvedsales->getCond_sale_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Excess / Surplus Land (SF)</label>
                        <input type="text" class="form-control calc excess_surpluss_sf _ppgc _fm00t" id="exsursf" name="excess_surpluss_sf" value="<?php echo $improvedsales->getExcess_surpluss_sf(); ?>" readonly />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <div style="height: 32px; display: block;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Excess / Surplus Land Value</label>
                        <input type="text" class="form-control calc excess_surplus_value _ppgc _cfm00t" name="excess_surplus_value" value="<?php echo $improvedsales->getExcess_surplus_value(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="excess_surplus_value_desc" value="<?php echo $improvedsales->getExcess_surplus_value_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Deferred Maint. Costs</label>
                        <input type="text" class="form-control calc defer_maint_cost _ppgc _cfm00t" name="defer_maint_cost" value="<?php echo $improvedsales->getDefer_maint_cost(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="defer_main_cost_desc" value="<?php echo $improvedsales->getDefer_main_cost_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Additional TI Costs</label>
                        <input type="text" class="form-control calc add_ti_cost _ppgc _cfm00t" name="add_ti_cost" value="<?php echo $improvedsales->getAdd_ti_cost(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="add_ti_cost_desc" value="<?php echo $improvedsales->getAdd_ti_cost_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Broker Commission Costs</label>
                        <input type="text" class="form-control calc broker_cost _ppgc _cfm00t" name="broker_cost" value="<?php echo $improvedsales->getBroker_cost(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="broker_cost_desc" value="<?php echo $improvedsales->getBroker_cost_desc(); ?>" style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Stabilization Costs</label>
                        <input type="text" class="form-control calc stabil_cost _ppgc _cfm00t" name="stabil_cost" value="<?php echo $improvedsales->getStabil_cost(); ?>" />
                      </div>
                    </div>
                    <div class="col-7" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <input type="text" class="form-control" name="stabil_cost_desc" value="<?php echo $improvedsales->getStabil_cost_desc(); ?>"style="width: 100%" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6" style="float: left; padding-right: 0px;">
                      <div class="form-group" style="border-top: 0px;">
                        <label>Eff. Sale Price - Adj. Actual</label>
                        <input type="text" class="form-control calc eff_sale_price_actual _ppgc _cfm00t" id="effspaa" name="eff_sale_price_actual" value="<?php echo $improvedsales->getEff_sale_price_actual(); ?>" readonly/>
                      </div>
                    </div>
                    <div class="col-6 label175" style="float: right; padding-left: 0px;">
                      <div class="form-group">
                        <label>Eff. Sale Price - Adj. Stabilized</label>
                        <input type="text" class="form-control calc eff_sale_price_stab _ppgc _cfm00t" id="effspstab" name="eff_sale_price_stab" value="<?php echo $improvedsales->getEff_sale_price_stab(); ?>" readonly/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group" style="border-top: 0px;">
                        <label>- Adj. Price Comment</label>
                        <input type="text" list="APComment" class="form-control _bmtxtfield" name="adj_price_comment" value="<?php echo $improvedsales->getAdj_price_comment(); ?>" />
                        <datalist id="APComment">
                          <?php
                          for ( $c = 0; $c < count( $APComment ); $c++ ) {
                            ?>
                          <option><?php echo $APComment[$c]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-4 groupsection">
                <div class="fieldsarea label175">
                  <div class="form-group row" style="border-top: 0px;">
                    <label>Include FFE?</label>
                    <select class="form-select" name="inc_ffe" id="incffe">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
                    																        if ( $improvedsales->getInc_ffe() == $yesnoDataDesc[$s]["id"] ) {
                    																            ?>selected='selected'<?php 
                    																        }
                    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _togffe" style="border-top: 0px;">
                    <label>Description of  FF&amp;E</label>
                    <input type="text" class="form-control" name="desc_ffe" value="<?php echo $improvedsales->getDesc_ffe(); ?>" />
                  </div>
                  <div class="form-group row _togffe">
                    <label>Value of Business &amp; FF&amp;E($)</label>
                    <input type="text" class="form-control calc value_ffe _ppgc _cfm00t" name="value_ffe" value="<?php echo $improvedsales->getValue_ffe(); ?>" />
                  </div>
                  <div class="form-group row" style="border-top: 0px;">
                    <label>Total Value inc. FF&amp;E</label>
                    <input type="text" class="form-control _ppgc _cfm00t" id="totffeval" name="total_value_ffe" value="<?php echo $improvedsales->getTotal_value_ffe(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label200">
                <div class="fieldsarea">
                  <div class="form-group">
                    <label>Underlying Land $/SF Primary Site</label>
                    <input type="text" class="form-control calc underlying_land_value_primary _ppgc _cfm02t" name="underlying_land_value_primary" value="<?php echo $improvedsales->getUnderlying_land_value_primary(); ?>" />
                  </div>
                  <div class="form-group">
                    <label>Allocated Land Value</label>
                    <input type="text" class="form-control calc alloc_land_value _ppgc _cfm00t" id="allolval" name="alloc_land_value" value="<?php echo $improvedsales->getAlloc_land_value(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175">
                <div class="fieldsarea">
                  <div class="form-group">
                    <label>Source</label>
                    <input list="lvSource" class="form-control" name="alloc_land_value_source" value="<?php echo $improvedsales->getAlloc_land_value_source(); ?>" />
                    <datalist id="lvSource">
                      <option value="">
                      <option value="Appraiser Estimate"> 
                    </datalist>
                  </div>
                  <div class="form-group">
                    <label>Allocated Improvement Value</label>
                    <input type="text" class="form-control calc alloc_imp_value _ppgc _cfm00t" id="alloimpval" name="alloc_imp_value" value="<?php echo $improvedsales->getAlloc_imp_value(); ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-4 groupsection label225 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Adjusted Price / SF of GBA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="adjsfgbacalc" name="adj_price_sf_gba" value="<?php echo $improvedsales->getAdj_price_sf_gba(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Adjusted Price / SF of NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="adjsfnracalc" name="adj_price_sf_nra" value="<?php echo $improvedsales->getAdj_price_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Allocated Imp. Price / SF GBA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="adjalloimpsfgba" name="alloc_imp_value_sf_gba" value="<?php echo $improvedsales->getAlloc_imp_value_sf_gba(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Allocated Imp. Price / SF NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="adjalloimpsfnra" name="alloc_imp_value_sf_nra" value="<?php echo $improvedsales->getAlloc_imp_value_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row mfshow">
                    <label>Adjusted Price / Unit</label>
                    <input type="text" class="form-control _ppgc _cfm00t" id="adjstabunitcalc" name="adj_price_unit" value="<?php echo $improvedsales->getAdj_price_unit(); ?>" readonly />
                  </div>
                  <div class="form-group row _nosbtun">
                    <label>Adjusted Price/Service Bay or Tunnel</label>
                    <input type="text" class="form-control _ppgc _cfm00t" id="adjstabtunnelcalc" name="adj_price_tunnel" value="<?php echo $improvedsales->getAdj_price_tunnel(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>PGI / SF NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="aupaoepgisf" value="<?php echo $improvedsales->getPgi_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>EGI / SF NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="aupaoeegisf" value="<?php echo $improvedsales->getEgi_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Expense / SF NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="aupaoeexpsf" value="<?php echo $improvedsales->getExpence_sf_nra(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>- Expense Ratio (% EGI)</label>
                    <input type="text" class="form-control _ppgc _fm02tp" id="aupaoeexprat" value="<?php echo $improvedsales->getOe_expence_ratio(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>NOI / SF NRA or GLA</label>
                    <input type="text" class="form-control _ppgc _cfm02t" id="aupaoenoisf" value="<?php echo $improvedsales->getOe_noi_sf_nra(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row PDCstore">
                    <label>Fuel Sales Multiplier</label>
                    <input type="text" class="form-control _ppgc _fm02t" id="fuelmultcalc" name="fuel_sales_mult" value="<?php echo $improvedsales->getFuel_sales_mult(); ?>" readonly />
                  </div>
                  <div class="form-group row PDCstore">
                    <label>C-Store Sales Multiplier</label>
                    <input type="text" class="form-control _ppgc _fm02t" id="monthsalecalc" name="store_sales_mult" value="<?php echo $improvedsales->getStore_sales_mult(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Cap Rate or OAR (%)</label>
                    <input type="text" class="form-control _ppgc _fm02tp" id="capratecalc" name="cap_rate" value="<?php echo $improvedsales->getCap_rate(); ?>" readonly />
                  </div>
                  <div class="form-group row mfshow">
                    <label>PGIM</label>
                    <input type="text" class="form-control _ppgc _fm02t" id="pgimcalc" name="pgim" value="<?php echo $improvedsales->getPgim(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>EGIM</label>
                    <input type="text" class="form-control _ppgc _fm02t" id="egimcalc" name="egim" value="<?php echo $improvedsales->getEgim(); ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Sale Comments</label>
                    <textarea class="form-control _bmtxtfield" rows="16" name="sale_comments"  id="comments" style="font-size: 16px"><?php echo $improvedsales->getSale_comments(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Confidential Comments</label>
                    <textarea class="form-control" rows="3" name="conf_comments" style="font-size: 16px"><?php echo $improvedsales->getConf_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Confirmation -->
          <div id="confirmation" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-6 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>-aa File No. (Original Notes)</label>
                    <input type="text" class="form-control" name="mc_file_no" value="<?php echo $improvedsales->getMc_file_no(); ?>" />
                  </div>
                  <div class="form-group row rowconf _emdomain">
                    <label>Datasource</label>
                    <input list="sourcedata" class="form-control" name="datasource" value="<?php echo $improvedsales->getDatasource(); ?>"/>
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
                                                                    if ( $improvedsales->getConfirm1() == $appraisers[$s]["id"] ) {
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
                                                                    if ( $improvedsales->getConfirm2() == $appraisers[$s]["id"] ) {
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
                    <label>Confirmation Date</label>
                    <input type="date" class="form-control _bmtxtfield" name="confirm_date" value="<?php echo $improvedsales->getConfirm_date(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Inspection Type</label>
                    <select class="form-select" name="inspect_type">
                      <?php
                      for ( $s = 0; $s < count( $inspecttypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $inspecttypeData[$s]["id"]; ?>' <?php
        																        if ( $improvedsales->getInspect_type() == $inspecttypeData[$s]["id"] ) {
        																            ?>selected='selected'<?php 
        																        }
        																        ?> ><?php echo $inspecttypeData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Inspection Date</label>
                    <input type="date" class="form-control" name="inspect_date" value="<?php echo $improvedsales->getInspect_date(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source #1</label>
                    <input type="text" list="conf1sour" class="form-control _bmtxtfield" name="confirm_1_source" value="<?php echo $improvedsales->getConfirm_1_source(); ?>" />
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
                    <input list="relat1" class="form-control" name="relationship_1" value="<?php echo $improvedsales->getRelationship_1(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source #2</label>
                    <input type="text" list="conf2sour" class="form-control _bmtxtfield" name="confirm_2_souce" value="<?php echo $improvedsales->getConfirm_2_souce(); ?>" />
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
                    <input list="relat1" class="form-control" name="relationship_2" value="<?php echo $improvedsales->getRelationship_2() ?>" />
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
              <div class="col-6 groupsection label125 padding-0">
                <div class="fieldsarea">
                  <div class="col-12"><b>Use the space below to add linked files from box.com</b></div>
                  <div class="col-12">
                    <div class="form-group row docRow">
                      <label>URL from Box.com</label>
                      <input type="text" class="form-control docUrl" name="docUrl_1" id="docUrl_1" value="" />
                      <label>Title</label>
                      <input type="text" class="form-control docTitle" name="docTitle_1" id="docTitle_1" value="" />
                    </div>
                    <div class="col-12">
                      <input type='button' id='addDoc' value='save'/>
                    </div>
                  </div>
                  <div class="col-12" id='docHref'>
                    <p> - Linked Files</p>
                    <?php
                    if ( $improvedsales->getDocData() != "" ) {
                      for ( $d = 0; $d < count( $improvedsales->getDocData() ); $d++ ) {
                        ?>
                    <span id='doc_href_<?php echo ($d+1);?>' class='col-xs-12 padding-5'> <a class='doc_href' href='<?php echo $improvedsales->getDocData()[$d]['boxurl'];?>' target='_blank'><?php echo $improvedsales->getDocData()[$d]['file_label'];?></a>&nbsp;&nbsp;&nbsp;<img src='../img/lfremove.gif' alt='remove' class='remDoc' style='cursor:pointer;'>&nbsp;&nbsp;<img src='../img/lfedit.gif' alt='edit' class='editDoc' style='cursor:pointer;'> </span>
                    <?php
                    }
                    }
                    ?>
                  </div>
                  <input type='hidden' id='docData' name='docData' value='<?php if($improvedsales->getDocData()!=""){echo json_encode($improvedsales->getDocData());} ?>' />
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- Additional Photos Tab-->
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
    </form>
  </section>
</div>
<script>
$(".navbar-collapse a").click(function () {
  $(".navbar-collapse").collapse("hide");
});
</script>
</body>
</html>
