<!doctype html>
<html>
<head>
<?php if ($landsales->getId() != '') { ?>
<title>LS - <?php echo $landsales->getAddress(); ?></title>
<?php } else {?>
<title>New Land Sale Comp</title>
<?php } ?>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
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
<script type="text/javascript" src="../js/landsalesController.js"></script> 
<script type="text/javascript" src="../js/imageController.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=GoogleKey&libraries=places" defer></script>
<script type="text/javascript">

			$( function () {
				aa_engine = new _aa_engine();
				
				landsalesController = new _landsalesController({
					activeObject: "landsalesController",
					id: <?php echo $landsales->getId(); ?>,
					latitude: "<?php echo $landsales->getLat(); ?>",
					longitude: "<?php echo $landsales->getLng(); ?>",
					subMarketArea: <?php echo json_encode($subMarketArea,JSON_UNESCAPED_UNICODE); ?>,
					subProperty: <?php echo json_encode($subPropertyData,JSON_UNESCAPED_UNICODE); ?>,
                    <?php
					if(isset($landData)){
					?>
						data: <?php echo json_encode($landData,JSON_UNESCAPED_UNICODE); ?>
					<?php
					}
					?>
				});

				landsalesController.init();

				imageController = new _imageController({
					activeObject: "imageController",
					id: <?php echo $landsales->getId(); ?>
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
.secghead {
    background-color: #1e4959;
    text-align: center;
    line-height: 31px;
    color: #FFFFFF;
}
</style>
</head>
<body >
<div class="mainpage" id='mainPage'>
  <section class="comp-form-data">
    <form enctype="multipart/form-data" method="post" id='_form'>
      <button type="submit" onclick="return false;" style="display:none;"></button>
      <div id="LandSale_main" >
        <div class="formhead">
          <div class="formTitle">
            <nav class="navbar navbar-expand-lg navbar-dark">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navmenu">
                  <ul class="nav navbar-nav">
                    <li class="nav-item" style="position: absolute; top: 0; right: 0;"><a class="nav-link fa fa-tools" data-bs-toggle="tab" href="#fileinformation3" role="tab" style="font-size: 20px;"></a></li>
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"  href="#propertydata" role="tab">Property Data</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"  href="#landData" role="tab">Land Data</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#transactiondata" role="tab">Transaction Data</a></li>
                    <li class="nav-item" id='groundleaseTab'><a class="nav-link" data-bs-toggle="tab" href="#groundlease" role="tab">Ground Lease</a></li>
                    <li class="nav-item" id='buildingTab'><a class="nav-link" data-bs-toggle="tab" href="#buildingData" role="tab">Building Data</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#saleanalysis" role="tab">Sale Analysis</a></li>
                    <li class="nav-item" id='residentiallandanalysisTab'><a class="nav-link" data-bs-toggle="tab" href="#residentiallandanalysis" role="tab">Residential Land Analysis</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#adjustedunitpriceanalysis" role="tab">Comments</a></li>
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
          <div id="fileinformation3" class="tab-pane fade" role="tabpanel">
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
																				        if ( $landsales->getStatus() == $statusData[$s]["id"] ) {
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
																				        if ( $landsales->getPriority() == $priorityData[$s]["id"] ) {
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
    																			        if ( $landsales->getAssignedTo() == $usersData[$s]["id"] ) {
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
                    <input type="date" class="form-control _formUpdate" name="DueDate" value="<?php echo $landsales->getDueDate(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File Tools </div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Report Name:</label>
                    <input type="hidden" name="id" value="<?php echo $landsales->getId(); ?>" class='_formUpdate' />
                    <input type="hidden" name="reportID" value="<?php echo $landsales->getId(); ?>" class='_formUpdate' />
                    <input type="text" class="form-control _formUpdate" name="reportname" id="reportName" value="<?php echo $landsales->getReportname(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Template:</label>
                    <select class="form-select _formUpdate" name="template" id="_exportlsTemplate">
                      <?php
                      for ( $s = 0; $s < count( $templateData ); $s++ ) {
                        ?>
                      <option value='<?php echo $templateData[$s]["id"]; ?>' data-tpath='<?php echo $templateData[$s]["templatepath"]; ?>' <?php
																			            if ( $landsales->getTemplate() == $templateData[$s]["id"] ) {
																			            ?>selected='selected'<?php 
                                                                                        }
								                                                        ?> ><?php echo $templateData[$s]["templatename"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row btnWord"><a style='cursor:pointer;' class='_generateReportWordBtn golden-btn' data-spreview='0' data-ttype='land-sales' data-id='<?php echo $landsales->getId(); ?>'>Generate Word Report</a></div>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File History </div>
                <div class="fieldsareawhead label100">
                  <div class="form-group row">
                    <label>Date Created:</label>
                    <div class="filedetails"><?php echo $landsales->getDateCreated(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Created By:</label>
                    <div class="filedetails"><?php echo $landsales->getCreatedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Date Modified:</label>
                    <div class="filedetails"><?php echo $landsales->getDateModified(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Modified By:</label>
                    <div class="filedetails"><?php echo $landsales->getModifiedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>File Origin:</label>
                    <div class="filedetails">
                      <?php if($landsales->getFileOrigin() == 'Original File') { echo $landsales->getFileOrigin(); } else { ?>
                      <a href='<?php echo $landsales->getClonelink(); ?>' target="_blank"><?php echo $landsales->getFileOrigin(); ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Property Date -->
          <div id="propertydata" class="tab-pane active">
            <div class="grouprow">
              <div class="col-6 groupsection label130">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Enter Address</label>
                    <input type="text" name="address" class="_address form-control _formUpdate _bmtxtfield" id="autocomplete" (focus)="geolocate()" value="<?php echo $landsales->getAddress(); ?>"/>
                  </div>
                  <div class="grouprow padding-0">
                    <div class="col-6 groupsection padding-0" style="float: left;">
                      <div class="form-group row">
                        <label>Property Name</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" style="" name="property_name" value="<?php echo $landsales->getProperty_name(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Number</label>
                        <input class="form-control _formUpdate _bmtxtfield" name="streetnumber" id="street_number" type="text" value="<?php echo $landsales->getStreetnumber(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Name</label>
                        <input class="form-control _formUpdate _bmtxtfield" name="streetname" id="route" type="text" value="<?php echo $landsales->getStreetname(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>City</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="city" id="locality" value="<?php echo $landsales->getCity(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>County</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="county" id="administrative_area_level_2" value="<?php echo $landsales->getCounty(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>State</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" id="administrative_area_level_1" name="state" value="<?php echo $landsales->getState(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Zip Code</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" id="postal_code" name="zip_code" value="<?php echo $landsales->getZip_code(); ?>"/>
                      </div>
                      <input type="hidden" class="form-control _formUpdate" id="latitude" name="lat" value="<?php echo $landsales->getLat(); ?>" />
                      <input type="hidden" class="form-control _formUpdate" id="longitude" name="lng" value="<?php echo $landsales->getLng(); ?>" />
                    </div>
                    <div class="col-6 groupsection padding-0" style="float: right">
                      <div class="form-group row">
                        <label>Property Type</label>
                        <select class="form-select _formUpdate _bms20field" name="propertytype" id='selectPropertType'>
                          <?php

                          for ( $s = 0; $s < count( $propertyData ); $s++ ) {
                            ?>
                          <option value='<?php echo $propertyData[$s]["id"]; ?>' <?php
																        if ( $landsales->getPropertytype() == $propertyData[$s]["id"] ) {
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
																        if ( $landsales->getPropertysubtype() == $subPropertyData[$s]["id"] ) {
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
                        <input type="text" list="msalist" class="form-control _formUpdate" name="msa" value="<?php echo $landsales->getMsa(); ?>"/>
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
																        if ( $landsales->getGenmarket() == $marketData[$s]["id"] ) {
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
																        if ( $landsales->getSubmarkid() == $subMarketData[$s]["id"] ) {
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
                        <textarea class="form-control _formUpdate _bmtxtfield" rows="3" style="height: 74px;" name="legal_desc"><?php echo str_replace('\r',"\r", str_replace('\n',"\n",$landsales->getLegal_desc())); ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="grouprow label100">
                    <div class="form-group row" style="width:33%;">
                      <label>Ground Lease?</label>
                      <input type="checkbox" name="ground_lease" class="form-check-input" id="ground_lease" value="1" <?php if ($landsales->getGround_lease()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                    <div class="form-group row" style="width:33%;">
                      <label>Proposed Building?</label>
                      <input type="checkbox" name="proposed_building" class="form-check-input" id="proposed_building" value="1" <?php if ($landsales->getProposed_building()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                    <div class="form-group row" style="width:33%;">
                      <label>Eminent Domain?</label>
                      <input type="checkbox" name="emdomain" class="form-check-input" id="emdomain" value="1" <?php if ($landsales->getEmdomain()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                  </div>
                </div>
              </div>
              <div class="groupsection label100 spimgarea">
                <div class="grouphead">Property Photo</div>
                <div class="fieldsareawhead label125">
                  <div class="section-inner-width imgPlc" id="subjectPhoto">
                    <?php if ($landsales->getId() != '') { ?>
                    <a href="../comp_images/<?php echo $landsales->getImage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $landsales->getImage();?>" style='cursor:pointer;' data-type='property-photo' /> </a>
                    <?php } else {?>
                    <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                    <?php } ?>
                    <div style='display:none;'>
                      <label for="sp1" class="custom-file-upload">Subject Photo</label>
                    </div>
                    <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="photo1" class="_photo"/>
                    <input type='hidden' name="photo1path" id='photo1path' value="<?php echo $landsales->getPhoto1(); ?>" />
                    <input type='hidden' name="thumbpath" id="thumbpath" value="<?php echo $landsales->getThumbnail(); ?>"/>
                  </div>
                  <?php if($login_ro == 0) { ?>
                  <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp1' data-container='subjectPhoto'/></a>
                    <?php if ($landsales->getPhoto1() != '') { ?>
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
          <!-- End Property Data --> 
          <!-- land data tab-->
          <div id="landData" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label160">
                <div class="fieldsarea">
                  <div class="row col-12 padding-0" style="margin-right: 0px;">
                    <div class="col-4" style="float: left; margin-top: 5px;">
                      <div class="switch" style="">
                        <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="0" id="inputtypeSF" <?php if ($landsales->getGla_inputtype()==0) echo 'checked="checked"'; ?>
                                                                    <?php if(empty($landsales->getId())) echo 'checked="checked"'; ?> />
                        <label for="inputtypeSF" class="switch-label switch-label-off">SF</label>
                        <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="1" id="Acre" <?php if ($landsales->getGla_inputtype()==1) echo 'checked="checked"'; ?> />
                        <label for="Acre" class="switch-label switch-label-on">Acres</label>
                        <span class="switch-selection"></span> </div>
                    </div>
                    <div class="col-8 form-group" style="float: right; margin-top: 5px;">
                      <input type="text" class="form-control _bmtxtfield calc gla_inputsize _formUpdate _ppgc _fm03t" style="width: 100%;" name="gla_inputsize" id="gla_inputsize" value="<?php echo $landsales->getGla_inputsize(); ?>"/>
                    </div>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (SF)</label>
                    <input class="form-control calc gross_land_sf _formUpdate _ppgc _fm00t" id="glasfcalc" name="gross_land_sf" value="<?php echo $landsales->getGross_land_sf(); ?>" readonly>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (Acres)</label>
                    <input type="text" class="form-control calc gross_land_acre _formUpdate _ppgc _fm03t" id="glaacrecalc" name="gross_land_acre" value="<?php echo $landsales->getGross_land_acre(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Unusable Land Area (SF)</label>
                    <input type="text" class="form-control calc unusable_sf _formUpdate _ppgc _fm00t _bmtxtfield" name="unusable_sf" value="<?php echo $landsales->getUnusable_sf(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Unusable Land Area (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="unusableacre" name="unusable_acre" value="<?php echo $landsales->getUnusable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Unusable Land Description</label>
                    <textarea class="form-control _formUpdate" rows="6" name="unusable_desc"><?php echo $landsales->getUnusable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label175">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Net Usable Land (SF)</label>
                    <input type="text" class="form-control calc net_usable_sf _formUpdate _ppgc _fm00t"  id="netareasf" name="net_usable_sf" value="<?php echo $landsales->getNet_usable_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Net Usable Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="netareaacre" name="net_usable_acre" value="<?php echo $landsales->getNet_usable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Net Usable Land Description</label>
                    <textarea class="form-control _formUpdate" rows="6" name="net_usable_desc"><?php echo $landsales->getNet_usable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-4 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Shape</label>
                    <select class="form-select _formUpdate _bms3field" name="shape">
                      <?php
                      for ( $s = 0; $s < count( $shapeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $shapeData[$s]["id"]; ?>' <?php
    																        if ( $landsales->getShape() == $shapeData[$s]["id"] ) {
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
    																        if ( $landsales->getTopography() == $topographyData[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $topographyData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Utilities</label>
                    <input type="text" list="utilslist" class="form-control _formUpdate _bmtxtfield" name="utilities" value="<?php echo $landsales->getUtilities(); ?>"/>
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
                    <label>Orientation</label>
                    <select class="form-select _formUpdate _bms3field" name="orientation">
                      <?php
                      for ( $s = 0; $s < count( $orientationData ); $s++ ) {
                        ?>
                      <option value='<?php echo $orientationData[$s]["id"]; ?>' <?php
    																        if ( $landsales->getOrientation() == $orientationData[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $orientationData[$s]["definition"];?></option>
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
    																        if ( $landsales->getSite_access() == $siteAccessData[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $siteAccessData[$s]["definition"];?></option>
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
    																        if ( $landsales->getExposure() == $exposureData[$s]["id"] ) {
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
              <div class="col-4 groupsection label100">
                <div class="fieldsarea">
                  <div class="row" style="margin-left: 5px;">
                    <div class="form-group row" style="width: 30%; padding: 0px;">
                      <label>Flood Plain</label>
                      <select class="form-select _formUpdate _bms3field" name="flood_plain" id="floodplain">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getFlood_plain() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row" style="width: 68%;" id="fppanel">
                      <input type="text" class="form-control _bmtxtfield" style="width: 98%;" name="fppanel" placeholder="Panel No." value="<?php echo $landsales->getFppanel(); ?>"/>
                    </div>
                  </div>
                  <div class="row" style="margin-left: 5px;">
                    <div class="form-group row" style="width: 30%; padding: 0px;">
                      <label>Easements ?</label>
                      <select class="form-select _formUpdate" name="easement" id="easement">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getEasement() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row" id="easedesc" style="width: 68%;">
                      <input list="eadesc" class="form-control _formUpdate _bmtxtfield" style="width: 98%;" name="easement_desc" placeholder="Easements Description" value="<?php echo $landsales->getEasement_desc(); ?>" />
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
                  </div>
                  <div class="row _emdomain" style="margin-left: 5px;">
                    <div class="form-group row" style="width: 30%; padding: 0px;">
                      <label>Water Rights</label>
                      <select class="form-select _formUpdate" name="waterrights" id="waterrights">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getWaterrights() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row" style="width: 68%;" id="irigwell">
                      <input type="text" class="form-control _bmtxtfield" style="width: 98%;" name="irigwell" placeholder="Comments" value="<?php echo $landsales->getIrigwell(); ?>"/>
                    </div>
                  </div>
                  <div class="row _emdomain" style="margin-left: 5px;">
                    <div class="form-group row" style="width: 30%; padding: 0px;">
                      <label>Dwelling Rights</label>
                      <select class="form-select _formUpdate" name="dwellrights" id="dwellrights">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getDwellrights() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row" style="width: 28%;" id="nohomesite">
                      <label>No. Homesites</label>
                      <input type="text" class="form-control calc nohomesite _fm00t _bmtxtfield" name="nohomesite" value="<?php echo $landsales->getNohomesite(); ?>"/>
                    </div>
                    <div class="form-group row" style="width: 38%;" id="homesite">
                      <label>Homesite</label>
                      <input type="text" class="form-control _bmtxtfield" name="homesite" value="<?php echo $landsales->getHomesite(); ?>"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label>Soil Type</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="soiltype" value="<?php echo $landsales->getSoiltype(); ?>"/>
                  </div>
                  <div class="form-group row" style="display: none;">
                    <label>Irrigation?</label>
                    <select class="form-select" name="irrigation">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getIrrigation() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Comments</label>
                    <textarea class="form-control _formUpdate _bmtxtfield" name="other_land_comments"><?php echo $landsales->getOther_land_comments(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label125">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Traffic Count</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="traffic_count" id="trafficCount" value="<?php echo $landsales->getTraffic_count(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Date</label>
                    <input type="text" class="form-control _formUpdate" name="traffic_date" value="<?php echo $landsales->getTraffic_date(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Intersector Street</label>
                    <input type="text" class="form-control _formUpdate" name="inter_street" value="<?php echo $landsales->getInter_street(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div id="zoning">
              <div class="grouprow">
                <div class="col-6 groupsection label175">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Change in Zoning Possible?</label>
                      <input type="checkbox" name="change_zoning" class="form-check-input" id='change_zoning' value="1" <?php if ($landsales->getChange_zoning()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                    <div class="form-group row">
                      <label>Existing Zoning Code</label>
                      <input type="text" list="EZCode" class="form-control _formUpdate _bmtxtfield" name="zoning_code" value="<?php echo $landsales->getZoning_code(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Existing Zoning Jurisdiction</label>
                      <input list="EZJuris" class="form-control _formUpdate" name="zoning_juris" value="<?php echo $landsales->getZoning_juris(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Existing Zoning Description</label>
                      <input list="EZDesc" class="form-control _formUpdate _bmtxtfield" name="zoning_desc" value="<?php echo $landsales->getZoning_desc(); ?>"/>
                    </div>
                  </div>
                </div>
                <div class="col-6 groupsection label175">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Include FAR</label>
                      <input type="checkbox" name="inc_far" id="inc_far" class="form-check-input" value="1" <?php if ($landsales->getInc_far()==1 ) echo 'checked="checked"'; ?> />
                    </div>
                    <div class="form-group row change_zoning">
                      <label>Future Zoning Code</label>
                      <input type="text" list="EZCode" class="form-control _bmtxtfield" name="fut_zoning_code" value="<?php echo $landsales->getFut_zoning_code(); ?>"/>
                      <datalist id="EZCode">
                        <?php
                        for ( $c = 0; $c < count( $EZCode ); $c++ ) {
                          ?>
                        <option><?php echo $EZCode[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group row change_zoning">
                      <label>Future Zoning Jurisdiction</label>
                      <input type="text" list="EZJuris" class="form-control _bms3field" name="fut_zoning_juris" value="<?php echo $landsales->getFut_zoning_juris(); ?>"/>
                      <datalist id="EZJuris">
                        <?php
                        for ( $c = 0; $c < count( $EZJuris ); $c++ ) {
                          ?>
                        <option><?php echo $EZJuris[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group row change_zoning">
                      <label>Future Zoning Description</label>
                      <input type="text" list="EZDesc" class="form-control _bmtxtfield" name="fut_zoning_desc" value="<?php echo $landsales->getFut_zoning_desc(); ?>"/>
                      <datalist id="EZDesc">
                        <?php
                        for ( $c = 0; $c < count( $EZDesc ); $c++ ) {
                          ?>
                        <option><?php echo $EZDesc[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                    <div class="form-group row change_zoning">
                      <label>Timing of Re-Zoning?</label>
                      <input type="text" list="TimReZone" class="form-control _bms3field" name="rezone_time" value="<?php echo $landsales->getRezone_time(); ?>"/>
                      <datalist id="TimReZone">
                        <?php
                        for ( $c = 0; $c < count( $TimReZone ); $c++ ) {
                          ?>
                        <option><?php echo $TimReZone[$c]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grouprow" id='far_panel'>
                <div class="groupsection label150" style="width: 100%;">
                  <div class="fieldsarea farzone">
                    <div class="form-group row" style="width: 33%; float: left;">
                      <label>Max Building Height</label>
                      <input type="text" class="form-control _bmtxtfield" name="max_building_ht" value="<?php echo $landsales->getMax_building_ht(); ?>"/>
                    </div>
                    <div class="form-group row" style="width: 32%; float: left;">
                      <label>Max FAR</label>
                      <input type="text" class="form-control calc floor_area_ratio _formUpdate _ppgc _fm01f _bmtxtfield"  name="floor_area_ratio" value="<?php echo $landsales->getFloor_area_ratio(); ?>"/>
                    </div>
                    <div class="form-group row" style="width: 33%; float: right;">
                      <label>Max Building Floor Area</label>
                      <input type="text" class="form-control _formUpdate _ppgc _fm00t"  id="bldgfloorarea" name="max_floor_area" value="<?php echo $landsales->getMax_floor_area(); ?>" readonly/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow" id='ruralutilitiesTab'>
              <div class="groupsection col-6 label175 rurutil">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Electricty Availability</label>
                    <select class="form-select _bms3field" name="rural_electricity">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getRural_electricity() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Well / Septic Availability </label>
                    <select class="form-select _bms3field" name="well_septic">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getWell_septic() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Municipal Sewer Availability</label>
                    <select class="form-select _bms3field" name="municiple_sewer">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getMuniciple_sewer() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Municipal Water Availability</label>
                    <select class="form-select _bms3field" name="municiple_water">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getMuniciple_water() == $yesnoDataDesc[$s]["id"] ) {
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
              <div class="groupsection col-6 label175 rurutil">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Natural Gas Availability </label>
                    <select class="form-select" name="natural_gas">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getNatural_gas() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Telephone Availability</label>
                    <select class="form-select" name="telephone">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getTelephone() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Cable TV Availability</label>
                    <select class="form-select" name="cable_tv">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getCable_tv() == $yesnoDataDesc[$s]["id"] ) {
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
            <div id="assessedvalues" class="_emdomain">
              <div class="grouprow">
                <div class="col-5">
                  <div class="form-group row">
                    <p>Fill in the Assessed Year(s) then add each parcel by clicking the Add Parcel button.</p>
                  </div>
                </div>
                <div class="col-2 label100">
                  <div class="form-group row">
                    <label>Assessed Year(s)</label>
                    <input type="text"  class="form-control _bmtxtfield" name="assessedyear" value="<?php echo $landsales->getAssessedyear(); ?>" />
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
                <div class="col-2 groupsection label100">
                  <div class="grouphead">Plat Map</div>
                  <div class="fieldsareawhead label125">
                    <div class="section-inner-width imgPlc" id="platMap">
                      <?php if ($landsales->getId() != '') { ?>
                      <a href="../comp_images/<?php echo $landsales->getPlatimage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $landsales->getPlatimage();?>" style='cursor:pointer;' data-type='plat-photo' /> </a>
                      <?php } else {?>
                      <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                      <?php } ?>
                      <div style='display:none;'>
                        <label for="sp2" class="custom-file-upload">Plat Map</label>
                      </div>
                      <input id="sp2" type="file" accept="image/x-png,image/gif,image/jpeg" name="platmap" class="_photo"/>
                      <input type='hidden' name="platpath" id='platpath' value="<?php echo $landsales->getPlatmap(); ?>" />
                    </div>
                    <?php if($login_ro == 0) { ?>
                    <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp2' data-container='platMap'/></a>
                      <?php if ($landsales->getPlatmap() != '') { ?>
                      <a class='fa fa-trash img-del' data-rel-photo-btn='sp2' data-container='platMap'/></a>
                      <?php } ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="groupsection col-8">
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
                        $assessedvalues = $landsales->getAssessedvalues();
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
                <div class="col-2 groupsection label100">
                  <div class="grouphead">Street View</div>
                  <div class="fieldsareawhead label125">
                    <div class="section-inner-width imgPlc" id="streetview">
                      <?php if ($landsales->getId() != '') { ?>
                      <a href="../comp_images/<?php echo $landsales->getStreetimage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $landsales->getStreetimage();?>" style='cursor:pointer;' data-type='street-photo' /> </a>
                      <?php } else {?>
                      <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                      <?php } ?>
                      <div style='display:none;'>
                        <label for="sp3" class="custom-file-upload">Street View</label>
                      </div>
                      <input id="sp3" type="file" accept="image/x-png,image/gif,image/jpeg" name="streetview" class="_photo"/>
                      <input type='hidden' name="streetimage" id='streetimage' value="<?php echo $landsales->getStreetview(); ?>" />
                    </div>
                    <?php if($login_ro == 0) { ?>
                    <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp3' data-container='streetview'/></a>
                      <?php if ($landsales->getStreetview() != '') { ?>
                      <a class='fa fa-trash img-del' data-rel-photo-btn='sp3' data-container='streetview'/></a>
                      <?php } ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Land data tab --> 
          <!-- transactiondata tab -->
          <div id="transactiondata" class="tab-pane fade" role="tabpanel">
            <div class="grouprow">
              <div class="col-12 groupsection label125">
                <div class="fieldsarea">
                  <div class="form-group row" style="width: 20%;float: left;">
                    <label>Property Appraised</label>
                    <input type="checkbox" name="property_appraised" class="form-check-input" id="property_appraised" value="1" <?php if ($landsales->getProperty_appraised()==1 ) echo 'checked="checked"'; ?>/>
                  </div>
                  <div class="form-group row property_appraised" style="width: 24%;float: left;">
                    <label>aa Job File No.</label>
                    <input type="text" class="form-control" name="mc_job" value="<?php echo $landsales->getMc_job(); ?>"/>
                  </div>
                  <div class="form-group row property_appraised" style="width: 27%;float: left;">
                    <label>aa Appraiser 1 Name</label>
                    <input list="apprnames" class="form-control" name="appraiser_name" value="<?php echo $landsales->getAppraiser_name(); ?>"/>
                  </div>
                  <div class="form-group row property_appraised" style="width: 27%;float: right;">
                    <label>aa Appraiser 2 Name</label>
                    <input list="apprnames" class="form-control" name="appraiser_name_two" value="<?php echo $landsales->getAppraiser_name_two(); ?>"/>
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
              <div class="col-6 groupsection label160">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Grantor / Seller / Lessor</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="grantor"><?php echo $landsales->getGrantor(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Grantee / Buyer / Lessee</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="grantee"><?php echo $landsales->getGrantee(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label225">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Land Allocation Sale?</label>
                    <input type="checkbox" name="land_alloc_sale" class="form-check-input" id="land_alloc_sale" value="1" <?php if ($landsales->getLand_alloc_sale()==1 ) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row">
                    <label>Sale Price</label>
                    <input type="text" class="form-control calc sale_price _ppgc _cfm00t _bmtxtfield"  name="sale_price" id="totalSalePrice" value="<?php echo $landsales->getSale_price(); ?>"/>
                  </div>
                  <div class="form-group row _landAllSale">
                    <label>Less: Allocated Improvement Value</label>
                    <input type="text" class="form-control calc less_alloc_imp_price _ppgc _cfm00t"  name="less_alloc_imp_price" value="<?php echo $landsales->getLess_alloc_imp_price(); ?>"/>
                  </div>
                  <div class="form-group row _landAllSale">
                    <label>Source of Improvement Value Estimate</label>
                    <input type="text" class="form-control" name="improve_value_source" value="<?php echo $landsales->getImprove_value_source(); ?>"/>
                  </div>
                  <div class="form-group row _landAllSale">
                    <label>Allocated Land Price</label>
                    <input type="text" class="form-control calc alloc_land_value _ppgc _cfm00t"  id="alloclandpriceResult" name="alloc_land_value" value="<?php echo $landsales->getAlloc_land_value(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection label225">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Property Right Conveyed</label>
                    <select class="form-select _bms3field" name="prop_rights_conv">
                      <?php
                      for ( $s = 0; $s < count( $proprightsData ); $s++ ) {
                        ?>
                      <option value='<?php echo $proprightsData[$s]["id"]; ?>' <?php
																        if ( $landsales->getProp_rights_conv() == $proprightsData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $proprightsData[$s]["definition"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>% of Interest Conveyed (% of Whole)</label>
                    <input type="text" list="int_conv" class="form-control" name="interest_conv" <?php if ($landsales->getId() == '') { ?>        value="100.0%" <?php } else {?> value="<?php echo $landsales->getInterest_conv(); ?>" <?php } ?> />
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
                    <label>Conveyance Document Type</label>
                    <select class="form-select _bms3field" name="conv_doc_type">
                      <?php
                      for ( $s = 0; $s < count( $convdocData ); $s++ ) {
                        ?>
                      <option value='<?php echo $convdocData[$s]["id"]; ?>' <?php
																        if ( $landsales->getConv_doc_type() == $convdocData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $convdocData[$s]["definition"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Conveyance Document Recording No.</label>
                    <input type="text" class="form-control _bmtxtfield" name="conv_doc_rec_no" value="<?php echo $landsales->getConv_doc_rec_no(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Recording Date #1</label>
                    <input type="date" class="form-control _bmtxtfield" name="record_date" id="record_date" value="<?php echo $landsales->getRecord_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Recording Date #2 (If Assemblage)</label>
                    <input type="date" class="form-control _bmtxtfield" name="record_date_two" value="<?php echo $landsales->getRecord_date_two(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Sale Status Comment</label>
                    <select class="form-select _bms3field" name="sale_status">
                      <?php
                      for ( $s = 0; $s < count( $salestatusData ); $s++ ) {
                        ?>
                      <option value='<?php echo $salestatusData[$s]["id"]; ?>' <?php
																        if ( $landsales->getSale_status() == $salestatusData[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $salestatusData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Marketing Time</label>
                    <input type="text" list="tonmarket" class="form-control _bmtxtfield" name="market_time" value="<?php echo $landsales->getMarket_time(); ?>"/>
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
                  <div class="form-group row">
                    <label>Current Use Description</label>
                    <input type="text" class="form-control" name="current_use" value="<?php echo $landsales->getCurrent_use(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Proposed Use Changes?</label>
                    <select class="form-select" name="proposed_use_change" id="proposed_use_change">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
																        if ( $landsales->getProposed_use_change() == $yesnoDataDesc[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row" id='proposed_use_change_panel'>
                    <label>Proposed Use Description</label>
                    <textarea class="form-control _bmtxtfield" rows="3" name="proposed_use_desc"><?php echo $landsales->getProposed_use_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label225">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Fee Equiv. Price (Sale or Lease)</label>
                    <input type="text" class="form-control calc fee_equiv_price _ppgc _cfm00t _bmtxtfield"  id="feeequivsolResult" name="fee_equiv_price" value="<?php echo $landsales->getFee_equiv_price(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Fee Simple Equiv. Price - OUTPUT</label>
                    <input type="text" class="form-control _ppgc _cfm00t"  id="glfeesimpInput" name="fee_simple_equiv_price" value="<?php echo $landsales->getFee_simple_equiv_price(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Cash Equivalent Sale Price ($)</label>
                    <input type="text" class="form-control calc cash_equiv_price _ppgc _cfm00t"  id="cashequivResult" name="cash_equiv_price" value="<?php echo $landsales->getCash_equiv_price(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Financing Description</label>
                    <input type="text" list="findesc" class="form-control _bmtxtfield" name="type_finance" value="<?php echo $landsales->getType_finance(); ?>"/>
                    <datalist id="findesc">
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
                    <label>List Price Available?</label>
                    <input type="checkbox" name="list_price_avail" class="form-check-input" id='list_price_avail' value="1" <?php if ($landsales->getList_price_avail()==1 ) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row list_price_avail">
                    <label>List Price at Time of Sale</label>
                    <input type="text" class="form-control calc list_price _ppgc _cfm00t"  name="list_price" value="<?php echo $landsales->getList_price(); ?>"/>
                  </div>
                  <div class="form-group row list_price_avail">
                    <label>Change from List Price</label>
                    <input type="text" class="form-control _ppgc _fm01tp"  id="changelistResult" name="list_price_change" value="<?php echo $landsales->getList_price_change(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-6 groupsection label175">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>-aa File Number(s)</label>
                    <input type="text" class="form-control" name="mc_file_no" value="<?php echo $landsales->getMc_file_no(); ?>"/>
                  </div>
                  <div class="form-group row rowconf _emdomain">
                    <label>Datasource</label>
                    <input list="sourcedata" class="form-control" name="datasource" value="<?php echo $landsales->getDatasource(); ?>"/>
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
                                                                    if ( $landsales->getConfirm1() == $appraisers[$s]["id"] ) {
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
                                                                    if ( $landsales->getConfirm2() == $appraisers[$s]["id"] ) {
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
                  <div class="form-group row hafe-width">
                    <label>Confirmation Date</label>
                    <input type="date" class="form-control _bmtxtfield" name="confirm_date" value="<?php echo $landsales->getConfirm_date(); ?>"/>
                  </div>
                  <div class="form-group row hafe-width">
                    <label>Inspection Date</label>
                    <input type="date" class="form-control" name="inspect_date" value="<?php echo $landsales->getInspect_date(); ?>"/>
                  </div>
                  <div class="form-group row row hafe-width">
                    <label>Inspection Type</label>
                    <select class="form-select" name="inspect_type">
                      <?php
                      for ( $s = 0; $s < count( $inspecttypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $inspecttypeData[$s]["id"]; ?>' <?php
                                                                    if ( $landsales->getInspect_type() == $inspecttypeData[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
                                                                ?> ><?php echo $inspecttypeData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Confirmation Source 1</label>
                    <input type="text" list="conf1sour" class="form-control _bmtxtfield" name="confirm_1_source" value="<?php echo $landsales->getConfirm_1_source(); ?>"/>
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
                    <label>Relationship to Parties 1</label>
                    <input list="relat1" class="form-control" name="relationship_1" value="<?php echo $landsales->getRelationship_1(); ?>"/>
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
                    <label>Confirmation Source 2</label>
                    <input type="text" list="conf2sour" class="form-control _bmtxtfield" name="confirm_2_souce" value="<?php echo $landsales->getConfirm_2_souce(); ?>"/>
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
                    <label>Relationship to Parties 2</label>
                    <input list="relat1" class="form-control" name="relationship_2" value="<?php echo $landsales->getRelationship_2(); ?>"/>
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
              <div class="col-6 groupsection label175">
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
                    if ( $landsales->getDocData() != "" ) {
                      for ( $d = 0; $d < count( $landsales->getDocData() ); $d++ ) {
                        ?>
                    <span id='doc_href_<?php echo ($d+1);?>' class='col-xs-12 padding-5'> <a class='doc_href' href='<?php echo $landsales->getDocData()[$d]['boxurl'];?>' target='_blank'><?php echo $landsales->getDocData()[$d]['file_label'];?></a>&nbsp;&nbsp;&nbsp;<img src='../img/lfremove.gif' alt='remove' class='remDoc' style='cursor:pointer;'>&nbsp;&nbsp;<img src='../img/lfedit.gif' alt='edit' class='editDoc' style='cursor:pointer;'> </span>
                    <?php
                    }
                    }
                    ?>
                  </div>
                  <input type='hidden' id='docData' name='docData' value='<?php if($landsales->getDocData()!=""){echo json_encode($landsales->getDocData());} ?>' />
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- End transactiondata tab --> 
          <!-- groundlease tab -->
          <div id="groundlease" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Development Name</label>
                    <input type="text" class="form-control _bmtxtfield" name="gl_development_name" value="<?php echo $landsales->getGl_development_name(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Year(s) Built </label>
                    <input type="text" class="form-control _bmtxtfield" name="gl_year_built" value="<?php echo $landsales->getGl_year_built(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Total Project Size (SF GLA)</label>
                    <input type="text" class="form-control calc gl_total_project _ppgc _fm00t _bmtxtfield"  name="gl_total_project" value="<?php echo $landsales->getGl_total_project(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Land Area (SF)</label>
                    <input type="text" class="form-control calc gl_leased_land_sf _ppgc _fm00t"  id="gllandareasf" name="gl_leased_land_sf" value="<?php echo $landsales->getGl_leased_land_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Bldg Footprint Area (SF)</label>
                    <input type="text" class="form-control _ppgc _fm00t"  id="glbldgfootResult" name="gl_building_footprint" value="<?php echo $landsales->getGl_building_footprint(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Anchor Tenants</label>
                    <textarea class="form-control _bmtxtfield" style="height: 56.5px" name="gl_anchor_tenants"><?php echo $landsales->getGl_anchor_tenants(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Other Major Tenants </label>
                    <textarea class="form-control _bmtxtfield" style="height: 56.4px" name="gl_major_tenants"><?php echo $landsales->getGl_major_tenants(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Lease Status</label>
                    <select class="form-select" name="gl_status">
                      <?php
                      for ( $s = 0; $s < count( $glstatusData ); $s++ ) {
                        ?>
                      <option value='<?php echo $glstatusData[$s]["id"]; ?>' <?php
															        if ( $landsales->getGl_status() == $glstatusData[$s]["id"] ) {
															            ?>selected='selected'<?php 
															        }
															        ?> ><?php echo $glstatusData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Lease Start Date</label>
                    <input type="date" class="form-control" name="gl_start_date" id="gl_start_date" value="<?php echo $landsales->getGl_start_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lease End Date</label>
                    <input type="date" class="form-control" name="gl_end_date" value="<?php echo $landsales->getGl_end_date(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lease Option Periods</label>
                    <textarea class="form-control _bmtxtfield" style="height: 74px" name="gl_options_period"><?php echo $landsales->getGl_options_period(); ?></textarea>
                  </div>
                  <div class="form-group row">
                    <label>Annual Rent Escalations </label>
                    <textarea class="form-control _bmtxtfield" style="height: 74px" name="gl_escalations"><?php echo $landsales->getGl_escalations(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Length of Lease</label>
                    <input type="text" class="form-control _bmtxtfield" name="gl_length" value="<?php echo $landsales->getGl_length(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Annual Rent - Begin</label>
                    <input type="text" class="form-control calc gl_rent_begin _ppgc _cfm00t _bmtxtfield"  name="gl_rent_begin" value="<?php echo $landsales->getGl_rent_begin(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Annual Rent / SF Land Area</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  id="glrentlandsf" name="gl_rent_per_sf_land" value="<?php echo $landsales->getGl_rent_per_sf_land(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Annual Rent / SF Bldg. Footprint</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  id="glrentbldgsf" name="gl_rent_per_sf_footprint" value="<?php echo $landsales->getGl_rent_per_sf_footprint(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Fee Simple Equiv. Price</label>
                    <input type="text" class="form-control calc gl_fee_simple_equiv _ppgc _cfm00t"  id="glfeesimple" name="gl_fee_simple_equiv" value="<?php echo $landsales->getGl_fee_simple_equiv(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Fee Equiv. $ / SF - OUTPUT </label>
                    <input type="text" class="form-control _ppgc _cfm02t"  id="glfeeequiv" name="gl_fee_equiv_per_sf" value="<?php echo $landsales->getGl_fee_equiv_per_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Annual Rate of Return % - INPUT</label>
                    <input type="text" class="form-control calc gl_rate_return _ppgc _fm01tp _bmtxtfield"  name="gl_rate_return" value="<?php echo $landsales->getGl_rate_return(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End groundlease tab --> 
          <!-- buildingdataTab-->
          <div id="buildingData" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-6 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>GBA - Floors 1 (Footprint)</label>
                    <input type="text" class="form-control calc floor_1_gba _formUpdate _ppgc _fm00t"  name="floor_1_gba" value="<?php echo $landsales->getFloor_1_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>GBA - Floors 2 and above</label>
                    <input type="text" class="form-control calc floor_2_gba _formUpdate _ppgc _fm00t"  name="floor_2_gba" value="<?php echo $landsales->getFloor_2_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>GBA - Basement</label>
                    <input type="text" class="form-control calc total_basement_gba _formUpdate _ppgc _fm00t"  name="total_basement_gba" value="<?php echo $landsales->getTotal_basement_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>OVERALL TOTAL GBA (SF)</label>
                    <input type="text" class="form-control calc overall_gba _formUpdate _ppgc _fm00t"  id="totalgba" name="overall_gba" value="<?php echo $landsales->getOverall_gba(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Site Coverage Ratio</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp"  id="scrover" name="site_cover_primary" value="<?php echo $landsales->getSite_cover_primary(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tr"  id="ltbusab" name="land_build_ratio_primary" value="<?php echo $landsales->getLand_build_ratio_primary(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Gross Building Area Source</label>
                    <input list="bsizesource" class="form-control _formUpdate" name="gba_source" value="<?php echo $landsales->getGba_source(); ?>"/>
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
            </div>
          </div>
          <!-- End buildingdata Tab --> 
          <!-- saleanalysis tab -->
          <div id="saleanalysis" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-12 groupsection label205 padding-0">
                <div class="fieldsarea">
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Fee Simple Equivalent Price</label>
                        <input type="text" class="form-control _ppgc _cfm00t" id="feeequivfield2"  value="<?php echo $landsales->getFee_simple_equiv_price(); ?>" readonly/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row" style="height: 34px; display: block;"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Financing Terms Adjustment</label>
                        <input type="text" class="form-control calc fin_term_adj _ppgc _cfm00t"  name="fin_term_adj" value="<?php echo $landsales->getFin_term_adj(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="fin_term_adj_desc" value="<?php echo $landsales->getFin_term_adj_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Conditions of Sale Adjustment</label>
                        <input type="text" class="form-control calc cond_sale_adj _ppgc _cfm00t2"  name="cond_sale_adj" value="<?php echo $landsales->getCond_sale_adj(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="cond_sale_desc" value="<?php echo $landsales->getCond_sale_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Demolition Cost</label>
                        <input type="text" class="form-control calc demo_cost _ppgc _cfm00t2"  name="demo_cost" value="<?php echo $landsales->getDemo_cost(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="demo_cost_desc" value="<?php echo $landsales->getDemo_cost_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>On-Site Extraordinary Costs</label>
                        <input type="text" class="form-control calc onsite_extra_cost _ppgc _cfm00t2"  name="onsite_extra_cost" value="<?php echo $landsales->getOnsite_extra_cost(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="onsite_extra_cost_desc" value="<?php echo $landsales->getOnsite_extra_cost_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Off-Site Development Costs</label>
                        <input type="text" class="form-control calc offsite_develop _ppgc _cfm00t2"  name="offsite_develop" value="<?php echo $landsales->getOffsite_develop(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="offsite_develop_desc" value="<?php echo $landsales->getOffsite_develop_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Broker Commission Costs</label>
                        <input type="text" class="form-control calc broker_cost _ppgc _cfm00t2"  name="broker_cost" value="<?php echo $landsales->getBroker_cost(); ?>"/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group row">
                        <input type="text" class="form-control" name="broker_cost_desc" value="<?php echo $landsales->getBroker_cost_desc(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>Effective Sale Price - Finished Site </label>
                        <input type="text" class="form-control calc eff_sale_price_stab _ppgc _cfm00t"  id="effsalepriceResult" name="eff_sale_price_stab" value="<?php echo $landsales->getEff_sale_price_stab(); ?>" readonly/>
                      </div>
                    </div>
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group" style="height: 34px; display: block;"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4" style="float: left; padding-right: 0px;">
                      <div class="form-group row">
                        <label>- Adjust Sale Price Comment</label>
                        <input type="text" list="APComment" class="form-control _bmtxtfield" name="adj_price_comment" value="<?php echo $landsales->getAdj_price_comment(); ?>"/>
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
                    <div class="col-8" style="float: right; padding-left: 0px;">
                      <div class="form-group" style="height: 34px; display: block;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label215 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row" style="width: 25%; float: left;">
                    <label>Did Sale Price Include Value of FFE?</label>
                    <select class="form-select" name="inc_ffe" id="IncFFe">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
																        if ( $landsales->getInc_ffe() == $yesnoDataDesc[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row _FFeInc" style="width: 25%; float: left;">
                    <label>Value of FFE ($)</label>
                    <input type="text" class="form-control _ppgc _cfm00t"  name="value_ffe" value="<?php echo $landsales->getValue_ffe(); ?>"/>
                  </div>
                  <div class="form-group row _FFeInc" style="width: 49%; float: left;">
                    <label>Description of FFE</label>
                    <input type="text" class="form-control" name="desc_ffe" value="<?php echo $landsales->getDesc_ffe(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End saleanalysis tab --> 
          <!-- residentiallandanalysis tab -->
          <div id="residentiallandanalysis" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-12 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row" style="width: 49%; float: left;">
                    <label>Bulk Lot Sale</label>
                    <input type="radio" class="form-check-input" name="type_land_radio" id='bulk_lot_sale_check' value="1" <?php if ($landsales->getType_land_radio()==1) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row" style="width: 49%; float: right;">
                    <label>Raw Land Sale</label>
                    <input type="radio" class="form-check-input" name="type_land_radio" id='raw_land_sale_check' value="0" <?php if ($landsales->getType_land_radio()==0) echo 'checked="checked"'; ?><?php if(empty($id)) echo 'checked="checked"'; ?> />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Type of Residential Land </label>
                    <select class="form-select _bms3field" name="type_residential_land">
                      <?php
                      for ( $s = 0; $s < count( $ressaleData ); $s++ ) {
                        ?>
                      <option value='<?php echo $ressaleData[$s]["id"]; ?>' <?php
															        if ( $landsales->getType_residential_land() == $ressaleData[$s]["id"] ) {
															            ?>selected='selected'<?php 
															        }
															        ?> ><?php echo $ressaleData[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Type of Lots or Units</label>
                    <input type="text" class="form-control _bmtxtfield" name="unit_lot_type" value="<?php echo $landsales->getUnit_lot_type(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>No. of Lots</label>
                    <input type="number" class="form-control calc no_lots" step="1" name="no_lots" value="<?php echo $landsales->getNo_lots(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lot Completion Date</label>
                    <input type="text" class="form-control _bmtxtfield" name="lot_complete_date" value="<?php echo $landsales->getLot_complete_date(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Unadjusted Sale Price </label>
                    <input type="text" class="form-control _ppgc _cfm00t"  id="unadjsaleprice" name="unadj_sale_price" value="<?php echo $landsales->getUnadj_sale_price(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Lot to Home Price Ratio (%)</label>
                    <input type="text" class="form-control _bmtxtfield" name="lot_home_price_ratio" value="<?php echo $landsales->getLot_home_price_ratio(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label190 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Future Average Home Price</label>
                    <input type="text" class="form-control _bmtxtfield" name="fut_avg_home_price" value="<?php echo $landsales->getFut_avg_home_price(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Future Average Home Price</label>
                    <input type="text" class="form-control" name="fut_avg_home_price2" value="<?php echo $landsales->getFut_avg_home_price2(); ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 grouprow" id='raw_lot_sale_tabs'>
              <div class="col-6 groupsection">
                <div class="row" style="margin: 0px; height: 37px;">
                  <div class="secghead">Project Information - Raw Land</div>
                </div>
                <div class="col-6 groupsection label225 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Unit Density per Net Acre</label>
                      <input type="text" class="form-control _ppgc _fm03t" id="unitdensityResult" name="unit_density_net_acre" value="<?php echo $landsales->getUnit_density_net_acre(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Hard Cost per Lot</label>
                      <input type="text" class="form-control _bmtxtfield" name="hard_cost_lot" value="<?php echo $landsales->getHard_cost_lot(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Off-Site Improvements</label>
                      <input type="text" class="form-control _bmtxtfield" name="off_site_imp" value="<?php echo $landsales->getOff_site_imp(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Future Finished Lot Size - Range</label>
                      <input type="text" class="form-control _bmtxtfield" name="fut_finish_size_range" value="<?php echo $landsales->getFut_finish_size_range(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Future Finished Lot Size - Average</label>
                      <input type="text" class="form-control _bmtxtfield" name="fut_finish_size_avg" value="<?php echo $landsales->getFut_finish_size_avg(); ?>"/>
                    </div>
                  </div>
                </div>
                <div class="col-6 groupsection label250 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Value of Entitlement </label>
                      <input type="text" class="form-control calc value_entitle _ppgc _cfm00t" id="bulkentitleResult"  name="value_entitle" value="<?php echo $landsales->getValue_entitle(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Entitlements Included?</label>
                      <select class="form-select _bms3field" name="inc_entitlement">
                        <?php
                        for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                          ?>
                        <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
    																        if ( $landsales->getInc_entitlement() == $yesnoDataDesc[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group row">
                      <label>Value of Entitlements per Lot</label>
                      <input type="text" class="form-control _ppgc _cfm00t"  id="entitleperlotResult" name="value_entitlement_lot" value="<?php echo $landsales->getValue_entitlement_lot(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Site Amenities</label>
                      <input type="text" class="form-control _bmtxtfield" name="site_amenities" value="<?php echo $landsales->getSite_amenities(); ?>"/>
                    </div>
                    <div class="form-group row">
                      <label>Projected Future Ave. Finished Lot Price</label>
                      <input type="text" class="form-control _bmtxtfield" name="proj_fut_avg_finish_price" value="<?php echo $landsales->getProj_fut_avg_finish_price(); ?>"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection">
                <div class="row" style="margin: 0px; height: 37px;">
                  <div class="secghead">Raw Land Sale Analysis</div>
                </div>
                <div class="col-6 groupsection label225 padding-0">
                  <div class="grouphead">With Entitlements</div>
                  <div class="fieldsareawhead">
                    <div class="form-group row">
                      <label>Adjusted Sale Price - Finished Site</label>
                      <input type="text" class="form-control calc adj_price_finish_with _ppgc _cfm00t" id="adjpricewithResult"  name="adj_price_finish_with" value="<?php echo $landsales->getAdj_price_finish_with(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Lot or Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="adjpriceperunitwithResult"  name="sale_price_lot_with" value="<?php echo $landsales->getSale_price_lot_with(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Net Acre</label>
                      <input type="text" class="form-control _ppgc _cfm00t" id="adjpricenetacrewithResult"  name="sale_price_net_acre_with" value="<?php echo $landsales->getSale_price_net_acre_with(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Net SF</label>
                      <input type="text" class="form-control _ppgc _cfm02t" id="adjpricenetsfwithResult"  name="price_net_sf_with" value="<?php echo $landsales->getPrice_net_sf_with(); ?>" readonly/>
                    </div>
                  </div>
                </div>
                <div class="col-6 groupsection label225 padding-0">
                  <div class="grouphead">Without Entitlements</div>
                  <div class="fieldsareawhead">
                    <div class="form-group row">
                      <label>Adjusted Sale Price - Finished Site</label>
                      <input type="text" class="form-control calc adj_price_finished_wo _ppgc _cfm00t" id="adjpricefinishedwoResult"  name="adj_price_finished_wo" value="<?php echo $landsales->getAdj_price_finished_wo(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Lot or Unit</label>
                      <input type="text" class="form-control _ppgc _cfm00t"  id="adjpricelotwoResult" name="sale_price_lot_wo" value="<?php echo $landsales->getSale_price_lot_wo(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Net Acre</label>
                      <input type="text" class="form-control _ppgc _cfm00t"  id="adjpricenetacrewoResult" name="sale_price_net_acre_wo" value="<?php echo $landsales->getSale_price_net_acre_wo(); ?>" readonly/>
                    </div>
                    <div class="form-group row">
                      <label>Sale Price / Net SF</label>
                      <input type="text" class="form-control _ppgc _cfm02t" id="adjpricenetsfwoResult"  name="price_net_sf_wo" value="<?php echo $landsales->getPrice_net_sf_wo(); ?>" readonly/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 grouprow" id='bulk_lot_sale_tabs'>
              <div class="col-6 groupsection">
                <div class="row" style="margin: 0px; height: 37px;">
                  <div class="secghead">Project Information - Bulk Land</div>
                </div>
                <div class="grouprow">
                  <div class="col-6 groupsection label250 padding-0">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Individual Lot Nos.</label>
                        <input type="text" class="form-control" name="ind_lot_nos" value="<?php echo $landsales->getInd_lot_nos(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Finished Lot Size - Range</label>
                        <input type="text" class="form-control" name="finish_lot_size_range" value="<?php echo $landsales->getFinish_lot_size_range(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Finished Lot Size(SF) - Average(BA)</label>
                        <input type="text" class="form-control" name="finish_lot_size_sfba" value="<?php echo $landsales->getFinish_lot_size_sfba(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Finished Lot Size(SF) - Average(RE-INPUT)</label>
                        <input type="text" class="form-control calc finish_lot_size_sf _ppgc _fm00t"  name="finish_lot_size_sf" value="<?php echo $landsales->getFinish_lot_size_sf(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 groupsection label250 padding-0">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Lot Topography</label>
                        <select class="form-select _bms3field" name="lot_topography">
                          <?php
                          for ( $s = 0; $s < count( $topographyData ); $s++ ) {
                            ?>
                          <option value='<?php echo $topographyData[$s]["id"]; ?>' <?php
    																        if ( $landsales->getLot_topography() == $topographyData[$s]["id"] ) {
    																            ?>selected='selected'<?php 
    																        }
    																        ?> ><?php echo $topographyData[$s]["definition"];?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Project Amenities</label>
                        <input type="text" class="form-control _bmtxtfield" name="project_amenities" value="<?php echo $landsales->getProject_amenities(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Original Price / Raw Lot ($/ lot and Date)</label>
                        <input type="text" class="form-control _bmtxtfield" name="original_price" value="<?php echo $landsales->getOriginal_price(); ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection">
                <div class="row" style="margin: 0px; height: 37px;">
                  <div class="secghead">Bulk Land Sale Analysis</div>
                </div>
                <div class="grouprow">
                  <div class="col-6 groupsection label250 padding-0">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Adjusted Bulk Lot Sale Price</label>
                        <input type="text" class="form-control _ppgc _cfm00t"  name="adj_bulk_sale_price" id="adjBulkSP" value="<?php echo $landsales->getAdj_bulk_sale_price(); ?>" readonly/>
                      </div>
                      <div class="form-group row">
                        <label>Bulk Lot Sale Price / Lot or Unit</label>
                        <input type="text" class="form-control _ppgc _cfm00t"  name="bulk_price_lot" id="adjBulkSPunit" value="<?php echo $landsales->getBulk_price_lot(); ?>" readonly/>
                      </div>
                      <div class="form-group row">
                        <label>Bulk Lot Sale Price / SF Average Lot Size</label>
                        <input type="text" class="form-control _ppgc _cfm02t"  name="bulk_price_sf_avg" id="adjBulkSPavgUnit" value="<?php echo $landsales->getBulk_price_sf_avg(); ?>" readonly/>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 groupsection label250 padding-0">
                    <div class="fieldsarea">
                      <div class="form-group row">
                        <label>Reported Retail Price / Lot</label>
                        <input type="text" class="form-control _bmtxtfield" name="report_price_lot" value="<?php echo $landsales->getReport_price_lot(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Indicated Bulk Sale % Discount</label>
                        <input type="text" class="form-control _bmtxtfield" name="ind_sale_pct_discount" value="<?php echo $landsales->getInd_sale_pct_discount(); ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="grouprow">
                <div class="col-12 groupsection label150 padding-0">
                  <div class="fieldsarea">
                    <div class="form-group row">
                      <label>Other Lot Comments </label>
                      <textarea class="form-control _bmtxtfield" rows="2" name="other_lot_comment"><?php echo  $landsales->getOther_lot_comment(); ?></textarea>
                    </div>
                  </div>
                </div>
              </div
            
            </div>
          </div>
          <!-- end residentiallandanalysis tab --> 
          <!-- adjustedunitpriceanalysis tab -->
          <div id="adjustedunitpriceanalysis" class="tab-pane fade">
            <div class="grouprow" id="hideBulk">
              <div class="col-4 groupsection label250 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Adjusted Price / Acre of Gross Land Area</label>
                    <input type="text" class="form-control _ppgc _cfm00t"  name="adj_price_acre_gross" id="adjSPAcreGLA" value="<?php echo $landsales->getAdj_price_acre_gross(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Adjusted Price / Acre of Net Usable Area</label>
                    <input type="text" class="form-control _ppgc _cfm00t"  name="adj_price_acre_net" id="adjSPAcreNet" value="<?php echo $landsales->getAdj_price_acre_net(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label250 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Adjusted Price / SF of Gross Land Area</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  name="adj_price_sf_gross" id="adjSPSFGLA" value="<?php echo $landsales->getAdj_price_sf_gross(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Adjusted Price / SF of Net Usable Area</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  name="adj_price_sf_net" id="adjSPSFNet" value="<?php echo $landsales->getAdj_price_sf_net(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label250 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row" id='apSFfpa'>
                    <label>Adjusted Price / SF Bldg. Pad Area</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  name="adj_price_sf_pad" id="adjSPBldgPad" value="<?php echo $landsales->getAdj_price_sf_pad(); ?>" readonly/>
                  </div>
                  <div class="form-group row" id='apsfmfar'>
                    <label>Adjusted Price / SF Maximum FAR</label>
                    <input type="text" class="form-control _ppgc _cfm02t"  name="adj_price_sf_far" id="adjSPMaxFAR" value="<?php echo $landsales->getAdj_price_sf_far(); ?>" readonly/>
                  </div>
                  <div class="form-group row" id="_adjhomesite">
                    <label>Adjusted Price / Homesite</label>
                    <input type="text" class="form-control _ppgc _cfm00t"  name="adjhomesite" id="adjhomesite" value="<?php echo $landsales->getAdjhomesite(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Sale Comments</label>
                    <textarea class="form-control _bmtxtfield" style="font-size: 16px" rows="16" name="sale_comments" id="comments"><?php echo $landsales->getSale_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label150 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Confidential Comments</label>
                    <textarea class="form-control" style="font-size: 16px" rows="5" name="conf_comments"><?php echo $landsales->getConf_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end adjustedunitpriceanalysis tab -->
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
        <!-- End LandSale main tab --> 
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
