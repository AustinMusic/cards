<!doctype html>
<html>
<head>
<?php if ($appraisals->getId() != '') { ?>
<title>AR - <?php echo $appraisals->getAddress(); ?></title>
<?php } else {?>
<title>New Appraisal Report</title>
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
<script type="text/javascript" src="../js/rbe_engine.js"></script> 
<script type="text/javascript" src="../js/aa_engine.js"></script> 
<script type="text/javascript" src="../js/baseController.js"></script> 
<script type="text/javascript" src="../js/mapController.js"></script> 
<script type="text/javascript" src="../js/imageController.js"></script> 
<script type="text/javascript" src="../js/appraisalsController.js"></script> 
<script type="text/javascript" src="../js/lightbox.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmAGJsGHDcILArqDVkwl0co2yu8tHhx-g&libraries=places" defer></script>
<script>
        $( function () {
            aa_engine = new _aa_engine();

            appraisalsController = new _appraisalsController( {
                activeObject: "appraisalsController",
                id: <?php echo $appraisals->getId(); ?>,
                latitude: "<?php echo $appraisals->getLat(); ?>",
                longitude: "<?php echo $appraisals->getLng(); ?>",
                subMarketArea: <?php echo json_encode($subMarketData,JSON_UNESCAPED_UNICODE); ?>,
                subProperty: <?php echo json_encode($subPropertyData,JSON_UNESCAPED_UNICODE); ?>,
                <?php
					if(isset($appraisalsData)){
					?>
                appraisalsData: <?php echo json_encode($appraisalsData,JSON_UNESCAPED_UNICODE); ?>
                <?php
					}
					?>
            } );

            appraisalsController.init();

            imageController = new _imageController( {
                activeObject: "imageController",
                id: <?php echo $appraisals->getId(); ?>
            } );

            imageController.init();
        } );
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
.secghead {
    background-color: #1e4959;
    text-align: center;
    line-height: 37px;
    color: #FFFFFF;
}
.prebox {
    padding: 5px;
    display: inline-table;
    float: none;
    text-align: center;
    vertical-align: middle;
}
.prebox img {
    max-height: 100px !important;
    max-width: 175px !important;
}
.prebox textarea {
    resize: none;
    margin-top: 5px;
}
.drag-divider {
    margin: 25px 0;
    width: 3px;
    height: 125px;
    background: #393939;
    background: -webkit-gradient(linear, 0 0, 100% 0, from(#666565), to(#666565), color-stop(50%, #393939));
    display: inline-flex;
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
.myButton {
    box-shadow: inset 0px 1px 3px 0px #91b8b3;
    background: linear-gradient(to bottom, #74DC83 5%, #3fb44f 100%);
    background-color: #74DC83;
    border-radius: 5px;
    border: 1px solid #566963;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 14px;
    font-weight: bold;
    padding: 11px 23px;
    text-decoration: none;/*	text-shadow: 0px -1px 0px #1e4959;*/
}
.myButton:hover {
    background: linear-gradient(to bottom, #3fb44f 5%, #74DC83 100%);
    background-color: #3fb44f;
}
.myButton:active {
    position: relative;
    top: 1px;
}
.bmfield input[type="text"], .bmfield input[type="date"], .bmfield input[type=radio], .bmfield select, .bmfield textarea {
    background: rgba(204, 204, 0, 0.25)
}
.btn-cancel {
    color: #FFFFFF;
    background-color: #F9080C;
    border-color: #000000;
}
.btn-continue {
    color: #FFFFFF;
    background-color: #3fb44f;
    border-color: #000000;
}
</style>
<script>
		var files = "";
        function preview_image() {
            var total_file = document.getElementById( "upload_files" ).files.length;
            for ( var i = 0; i < total_file; i++ ) {
                $( '#images_preview' ).append( "<div class='prebox'><img src='" + URL.createObjectURL( event.target.files[ i ] ) + "'><br><textarea name='caption[]' class='form-control' rows='4' resize placeholder='Caption' maxlength='400'></textarea></div>" );
            }
        }
    </script>
</head>

<body>
<div class="mainpage" id='mainPage'>
  <section class="comp-form-data">
    <form enctype="multipart/form-data" method="post" id='_form' accept-charset="UTF-8">
      <button type="submit" onclick="return false;" style="display:none;"></button>
      <div id="Appraisal_main">
        <div class="formhead">
          <div class="formTitle">
            <nav class="navbar navbar-expand-lg navbar-dark">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navmenu">
                  <ul class="nav navbar-nav">
                    <li class="nav-item" style="position: absolute; top: 0; right: 0;"><a class="nav-link fa fa-tools" data-bs-toggle="tab" href="#fileinfo" role="tab" style="font-size: 20px;"></a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#reportinfo" role="tab">Report Info</a> </li>
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#subjectinfo" role="tab">Subject Info</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#landinfo" role="tab">Land Info</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#building-info" role="tab">Building Info</a> </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#propertytype" id="proptypeTab" role="tab">Property Type</a> </li>
                    <li class="nav-item"><a class="nav-link _selectTab" data-bs-toggle="tab" href="#land-sales" data-type="land_sales" role="tab">Land Sales</a> </li>
                    <li class="nav-item"><a class="nav-link _selectTab" data-bs-toggle="tab" href="#improved-sales" data-type="improved_sales" role="tab">Improved Sales</a> </li>
                    <li class="nav-item"><a class="nav-link _selectTab" data-bs-toggle="tab" href="#leases" data-type="leases" role="tab">Leases</a> </li>
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
          <div id="fileinfo" class="tab-pane fade" role="tabpanel">
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
                      <option value='<?php echo $statusData[$s]["id"]; ?>' <?php if ( $appraisals->getStatus() == $statusData[$s]["id"] ) { ?>selected='selected'
                                                    <?php 
												}
												?> > <?php echo $statusData[$s]["status"]; ?> </option>
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
                      <option value='<?php echo $priorityData[$s]["id"]; ?>' <?php if ( $appraisals->getPriority() == $priorityData[$s]["id"] ) { ?>selected='selected'
                                                    <?php 
												}
												?> > <?php echo $priorityData[$s]["priority"]; ?> </option>
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
                      <option value='<?php echo $usersData[$s]["id"]; ?>' <?php if ( $appraisals->getAssignedTo() == $usersData[$s]["id"] ) { ?>selected='selected'
                                                    <?php 
												}
												?> > <?php echo $usersData[$s]["firstname"]." ".$usersData[$s]["lastname"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Due Date:</label>
                    <input type="date" class="form-control _formUpdate _bmtxtfielddate" name="DueDate" value="<?php echo $appraisals->getDueDate(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Lead Appraiser:</label>
                    <select class="form-select _formUpdate" name="OwnerID">
                      <?php
                      for ( $s = 0; $s < count( $formerusersData ); $s++ ) {
                        ?>
                      <option value='<?php echo $formerusersData[$s]["id"]; ?>' <?php if ( $appraisals->getOwnerID() == $formerusersData[$s]["id"] ) { ?>selected='selected'
                                                    <?php 
                                            }
                                            ?> > <?php echo $formerusersData[$s]["firstname"]." ".$formerusersData[$s]["lastname"]; ?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection">
                <div class="grouphead">File Tools </div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Report Name:</label>
                    <input type="hidden" name="id" value="<?php echo $appraisals->getId(); ?>" class='_formUpdate'/>
                    <input type="hidden" name="reportID" id="reportID" value="<?php echo $appraisals->getId(); ?>" class='_formUpdate'/>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="reportname" id="reportName" value="<?php echo $appraisals->getReportname(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Box.com Folder:</label>
                    <input <?php if(!empty($appraisals->getBoxurl())) {echo 'type="hidden"';} else {echo 'type="text"';}?> class="form-control" name="boxurl" value="<?php echo $appraisals->getBoxurl(); ?>" />
                    <?php if(!empty($appraisals->getBoxurl())) { ?>
                    <font style="font-size: 0..85rem; line-height: 35px;"><a href="<?php echo $appraisals->getBoxurl(); ?>" target="new">Click here to open box.com folder</a> </font>
                    <?php } ?>
                  </div>
                  <?php if(!empty($appraisals->getBoxurl())) {?>
                  <div class="form-group row">
                    <div style="text-align: center"> <font style="font-size: 0..85rem; line-height: 35px;"><a style="cursor:pointer;" class="golden-btn" id="removeBoxFile" <?php if(empty($appraisals->getBoxurl())){ echo "style='display:none;' "; }?>>Click here to edit the Box.com URL</a> </font> </div>
                  </div>
                  <?php }?>
                  <?php if(!empty($appraisals->getID())) { ?>
                  <div class="form-group row">
                    <?php if($login_power == 1) { ?>
                    <div class="col-8 padding-0">
                      <select class="form-select _formUpdate" id="type">
                        <option value="1" data-page="appraisals.php">Appraisal Report</option>
                        <option value="2" data-page="improvedsales.php">Improved Sale</option>
                        <option value="3" data-page="leases.php">Lease</option>
                        <option value="4" data-page="landsales.php">Land Sale</option>
                      </select>
                    </div>
                    <div class="col-4 padding-0" style="text-align: center"> <font color="#FFFFFF" style="font-size: 0..85rem; line-height: 35px;"><a style="cursor:pointer;" class="clonebtn" id='cloneReport'>Clone Record</a> </font> </div>
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
                    <div class="filedetails"><?php echo $appraisals->getDateCreated(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Created By:</label>
                    <div class="filedetails"> <?php echo $appraisals->getCreatedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Date Modified:</label>
                    <div class="filedetails"> <?php echo $appraisals->getDateModified(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>Modified By:</label>
                    <div class="filedetails"> <?php echo $appraisals->getModifiedBy(); ?></div>
                  </div>
                  <div class="form-group row">
                    <label>File Origin:</label>
                    <div class="filedetails">
                      <?php if($appraisals->getFileOrigin() == 'Original File') { echo $appraisals->getFileOrigin(); } else {	?>
                      <a href='<?php echo $appraisals->getClonelink(); ?>' target="_blank"><?php echo $appraisals->getFileOrigin(); ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Report Information Tab -->
          <div id="reportinfo" class="tab-pane fade" role="tabpanel">
            <div class="grouprow">
              <div class="col-3 groupsection label130">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>aa Bid - Fee</label>
                    <input type="text" class="form-control _formUpdate _ppgc _cfm00t" name="bid_fee" value="<?php echo $appraisals->getBid_fee(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Appraisal Type</label>
                    <select class="form-select _formUpdate" name="appraisal_type">
                      <?php
                      for ( $s = 0; $s < count( $appraisetypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $appraisetypeData[$s]["id"]; ?>' <?php if ( $appraisals->getAppraisal_type() == $appraisetypeData[$s]["id"] ) { ?>selected='selected'
                                                <?php 
																			        }
																			        ?> > <?php echo $appraisetypeData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Purpose of Appraisal</label>
                    <select class="form-select _formUpdate" name="purpose_of_appraisal" id="purpose_of_appraisal">
                      <?php
                      for ( $s = 0; $s < count( $appraisepurpData ); $s++ ) {
                        ?>
                      <option value='<?php echo $appraisepurpData[$s]["id"]; ?>' <?php if ( $appraisals->getPurpose_of_appraisal() == $appraisepurpData[$s]["id"] ) { ?>selected='selected'
                                                <?php 
																			        }
																			        ?> > <?php echo $appraisepurpData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Appraiser 1</label>
                    <select class="form-select _formUpdate _bms1field" name="appraiserone" id="appraiserone">
                      <?php
                      for ( $s = 0; $s < count( $repapp ); $s++ ) {
                        ?>
                      <option value='<?php echo $repapp [$s]["id"]; ?>' <?php
                                                                    if ( $appraisals->getAppraiserone() == $repapp[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if ($repapp[$s]["isLockedOut"]!=0 || $repapp[$s]["IsAppraiser"]!=1){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $repapp[$s]["firstname"]." ".$repapp[$s]["lastname"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Assistant 1</label>
                    <select class="form-select _formUpdate" name="appasstone" id="appasstone">
                      <?php
                      for ( $s = 0; $s < count( $repapp ); $s++ ) {
                        ?>
                      <option value='<?php echo $repapp [$s]["id"]; ?>' <?php
                                                                    if ( $appraisals->getAppasstone() == $repapp[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if ($repapp[$s]["isLockedOut"]!=0 || $repapp[$s]["IsAppAsst"]!=1){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $repapp[$s]["firstname"]." ".$repapp[$s]["lastname"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Appraiser 2</label>
                    <select class="form-select _formUpdate _bms1field" name="appraisertwo" id="appraisertwo">
                      <?php
                      for ( $s = 0; $s < count( $repapp ); $s++ ) {
                        ?>
                      <option value='<?php echo $repapp [$s]["id"]; ?>' <?php
                                                                    if ( $appraisals->getAppraisertwo() == $repapp[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if ($repapp[$s]["isLockedOut"]!=0 || $repapp[$s]["IsAppraiser"]!=1){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $repapp[$s]["firstname"]." ".$repapp[$s]["lastname"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Assistant 2</label>
                    <select class="form-select _formUpdate" name="appassttwo" id="appassttwo">
                      <?php
                      for ( $s = 0; $s < count( $repapp ); $s++ ) {
                        ?>
                      <option value='<?php echo $repapp [$s]["id"]; ?>' <?php
                                                                    if ( $appraisals->getAppassttwo() == $repapp[$s]["id"] ) {
                                                                ?>selected='selected'<?php 
                                                                    }
																	if ($repapp[$s]["isLockedOut"]!=0 || $repapp[$s]["IsAppAsst"]!=1){
																		?>style='display:none;'<?php 
																	}
                                                                ?> ><?php echo $repapp[$s]["firstname"]." ".$repapp[$s]["lastname"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>aa Job Number</label>
                    <input type="text" class="form-control _formUpdate" name="job_no" value="<?php echo $appraisals->getJob_no(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Client</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="client_name" value="<?php echo $appraisals->getClient_name(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Client ID</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="client_reference_no" value="<?php echo $appraisals->getClient_reference_no(); ?>"/>
                  </div>
                  <div class="form-group row" id="borrower">
                    <label>Borrower</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="borrower" value="<?php echo $appraisals->getBorrower(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Owner Type</label>
                    <select class="form-select _formUpdate _bmtxtfields3" name="owner_type" id="owntype">
                      <?php
                      for ( $s = 0; $s < count( $ownertypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $ownertypeData[$s]["id"]; ?>' <?php if ( $appraisals->getOwner_type() == $ownertypeData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
    																        }
    																        ?> > <?php echo $ownertypeData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Owner Name</label>
                    <textarea class="form-control _formUpdate _bmtxtfield" rows="2" name="owner_name"><?php echo $appraisals->getOwner_name(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection">
                <div class="fieldsarea">
                  <div class="row" style="margin: 0px; height: 37px;">
                    <div class="col-4 padding-0 secghead">
                      <center>
                        <b> Valuation Premise </b>
                      </center>
                    </div>
                    <div class="col-4 padding-0 secghead">
                      <center>
                        <b> Effective Date of Value </b>
                      </center>
                    </div>
                    <div class="col-4 padding-0 secghead">
                      <center>
                        <b> Interest Appraised </b>
                      </center>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-4 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="as_is" id="as_is" value="1" class='form-check-input _formUpdate' <?php if ($appraisals->getAs_is()==1 ) echo 'checked="checked"'; ?> />
                        <label for="as_is">As Is</label>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _asisvp">
                      <div class="form-group row">
                        <input type="date" class="form-control _bmtxtfielddate" style="width: 100%;" name="eff_date_value" id="eff_date_value" value="<?php echo $appraisals->getEff_date_value(); ?>"/>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _asisvp _bmtxtfield">
                      <div class="form-group row">
                        <select class="form-select _formUpdate" style="width: 100%;" name="estate_appraised" id="estate_appraised">
                          <?php
                          for ( $s = 0; $s < count( $estateappraisedData ); $s++ ) {
                            ?>
                          <option value='<?php echo $estateappraisedData[$s]["id"]; ?>' data-tselect='<?php echo $estateappraisedData[$s]["definition"];?>' <?php if ( $appraisals->getEstate_appraised() == $estateappraisedData[$s]["id"] ) { ?>selected='selected'
                                                        <?php 
																			        }
																			        ?> > <?php echo $estateappraisedData[$s]["definition"]; ?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-4 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="prospective_stabilized" id="prospective_stabilized" class='form-check-input _formUpdate' value="1" <?php if ($appraisals->getProspective_stabilized()==1 ) echo 'checked="checked"'; ?> />
                        <label for="prospective_stabilized">Prospective - Stabilized</label>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _prostabvp">
                      <div class="form-group row _valuedates">
                        <input type="date" class="form-control" style="width: 100%;" name="prosstab_dov" id="prosstab_dov" value="<?php echo $appraisals->getProsstab_dov(); ?>"/>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _prostabvp">
                      <div class="form-group row">
                        <select class="form-select _formUpdate" style="width: 100%;" name="prosstab_est_app">
                          <?php
                          for ( $s = 0; $s < count( $prosstabestappData ); $s++ ) {
                            ?>
                          <option value='<?php echo $prosstabestappData[$s]["id"]; ?>' <?php if ( $appraisals->getProsstab_est_app() == $prosstabestappData[$s]["id"] ) { ?>selected='selected'
                                                        <?php 
																			        }
																			        ?> > <?php echo $prosstabestappData[$s]["definition"]; ?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-4 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="prospective_completion" id="prospective_completion" class='form-check-input _formUpdate' value="1" <?php if ($appraisals->getProspective_completion()==1 ) echo 'checked="checked"'; ?> />
                        <label for="prospective_completion"> Prospective - At Completion</label>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _procompvp">
                      <div class="form-group row _valuedates">
                        <input type="date" class="form-control" style="width: 100%;" name="proscomp_dov" id="proscomp_dov" value="<?php echo $appraisals->getProscomp_dov(); ?>"/>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _procompvp">
                      <div class="form-group row">
                        <select class="form-select _formUpdate" style="width: 100%;" name="proscomp_est_app">
                          <?php
                          for ( $s = 0; $s < count( $proscompestappData ); $s++ ) {
                            ?>
                          <option value='<?php echo $proscompestappData[$s]["id"]; ?>' <?php if ( $appraisals->getProscomp_est_app() == $proscompestappData[$s]["id"] ) { ?>selected='selected'
                                                        <?php 
																			        }
																			        ?> > <?php echo $proscompestappData[$s]["definition"]; ?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-4 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="retrospective" id="retrospective" class='form-check-input _formUpdate' value="1" <?php if ($appraisals->getRetrospective()==1 ) echo 'checked="checked"'; ?> />
                        <label for="retrospective"> Retrospective</label>
                      </div>
                    </div>
                    <div class="col-4 padding-0 _retrovp">
                      <div class="form-group row _valuedates">
                        <input type="date" class="form-control" style="width: 100%;" name="retro_dov" id="retro_dov" value="<?php echo $appraisals->getRetro_dov(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="edinspDate" style="margin: 0px;">
                    <div class="col-4 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" id="inspectcheck" style="opacity: 0;" class='form-check-input'/>
                        <label for="inspectcheck"> Inspection Date</label>
                      </div>
                    </div>
                    <div class="col-4 padding-0">
                      <div class="form-group row _valuedates _bmtxtfield">
                        <input type="date" class="form-control" style="width: 100%;" name="inspect_date" id="inspect_date" value="<?php echo $appraisals->getInspect_date(); ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow padding-0">
              <div class="col-6 groupsection padding-0">
                <div class="fieldsarea">
                  <div class="col-12 secghead">
                    <center>
                      <b>Document Library</b>
                    </center>
                  </div>
                  <div class="col-12 padding-0">
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate">
                            <option>Generate Cover Page</option>
                          </select>
                          <label><a class='_generateCoverPage' style='cursor:pointer;' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_imp_desc'>
                            <option data-tpath="">Select Improvement Description</option>
                            <option data-tpath="idaptsmallout.php">Apartment - Small One Unit Type</option>
                            <option data-tpath="idaptsmallmut.php">Apartment - Small Multi Unit Type</option>
                            <option data-tpath="idstautorepair.php">Single Tenant Auto Repair</option>
                            <option data-tpath="idbankbranch.php">Bank Branch</option>
                            <option data-tpath="idchurch.php">Church / School</option>
                            <option data-tpath="iddaycare.php">Daycare / Preschool</option>
                            <option data-tpath="idrestfastfood.php">Restaurant - Fastfood</option>
                            <option data-tpath="idrestsit.php">Restaurant - Sit-Down</option>
                            <option data-tpath="idautodealsing.php">Auto Dealership - Single Brand</option>
                            <option data-tpath="idautodealmulti.php">Auto Dealership - Multi Brand</option>
                            <option data-tpath="idstind.php">Industrial Single-Tenant</option>
                            <option data-tpath="idstindsy.php">Industrial Single-Tenant with Surplus Yard</option>
                            <option data-tpath="idmtind.php">Industrial Multi-Tenant</option>
                            <option data-tpath="idstoff.php">Office Single-Tenant</option>
                            <option data-tpath="idmtoff.php">Office Multi-Tenant</option>
                            <option data-tpath="mtretail.php">Retail Multi-Tenant</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='impdesc' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_trans_letter'>
                            <option data-tpath="">Select Transmittal Letter</option>
                            <option data-tpath="tranletasis.php">As Is</option>
                            <option data-tpath="tranletchar.php">As Is Charitable</option>
                            <option data-tpath="tranletstab.php">Prospective Stabilized</option>
                            <option data-tpath="tranletcomp.php">Prospective Completion</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='asinvp' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_hbu_desc'>
                            <option data-tpath="">Select Highest and Best Use</option>
                            <option data-tpath="hbuchurchschool.php">Church / School - Existing</option>
                            <option data-tpath="hbumfamprop.php">Multi Family - Proposed</option>
                            <option data-tpath="hbucommspecprop.php">Commercial Special - Proposed</option>
                            <option data-tpath="hbucommspecexist.php">Commercial Special - Existing</option>
                            <option data-tpath="hbuoffcommprop.php">Office / Comm - Proposed</option>
                            <option data-tpath="hbuoffcommexist.php">Office / Comm - Existing</option>
                            <option data-tpath="hbuoffcommexistdef.php">Office / Comm - Existing + Deferred Maint</option>
                            <option data-tpath="hbuoffcommexistrenov.php">Office / Comm - Existing + Renov Expan Purchase</option>
                            <option data-tpath="hbuoffcommexistsurex.php">Office / Comm - Existing + Surplus Excess</option>
                            <option data-tpath="hbuindproposed.php">Industrial - Proposed</option>
                            <option data-tpath="hbuindexist.php">Industrial - Existing</option>
                            <option data-tpath="hbuindexistdefer.php">Industrial - Existing + Deferred Maint</option>
                            <option data-tpath="hbuindexistrenov.php">Industrial - Existing + Renov Expan Purchase</option>
                            <option data-tpath="hbuindexistsurex.php">Industrial - Existing + Surplus Excess</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='hbudesc' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_exec_summary'>
                            <option data-tpath="">Select Executive Summary</option>
                            <option data-tpath="execgalasis.php">Gross Land Area - As Is</option>
                            <option data-tpath="execgalasispros.php">Gross Land Area - As Is, Prospective</option>
                            <option data-tpath="gnesasin.php">Gross, Net, Excess-Surplus Land Area - As Is</option>
                            <option data-tpath="gnesasinpros.php">Gross, Net, Excess-Surplus Land Area - As Is, Prospective</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='execsum' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_val_meth'>
                            <option data-tpath="">Select Valuation Methodology</option>
                            <option data-tpath="vmasis.php">Valuation Methodology - As Is</option>
                            <option data-tpath="vmprosp.php">Valuation Methodology - Prospective</option>
                            <option data-tpath="vmground.php">Valuation Methodology - Ground Lease</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='valmeth' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_intro_templates'>
                            <option data-tpath="">Select Introduction</option>
                            <option data-tpath="introasis.php">As Is</option>
                            <option data-tpath="introasispros.php">As Is, Prospective</option>
                            <option data-tpath="introcharity.php">Charitable Contribution</option>
                            <option data-tpath="introretro.php">Retrospective</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='introlet' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_reconcil'>
                            <option data-tpath="">Select Reconciliation</option>
                            <option data-tpath="recasisfeesimp.php">As Is - Fee Simple</option>
                            <option data-tpath="recstabasisfeesimp.php">Stabilized, As Is - Fee Simple</option>
                            <option data-tpath="recstabasisleased.php">Stabilized, As Is - Leased Fee</option>
                            <option data-tpath="recprosatcompasis.php">Prospective At Completion, As Is - Fee Simple</option>
                            <option data-tpath="recprosatcomplease.php">Prospective Stablized, At Completion, As Is - Leased Fee</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='reconcil'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_scope_temps'>
                            <option data-tpath="">Select Scope of Work</option>
                            <option data-tpath="scopeasis.php">As Is</option>
                            <option data-tpath="scopechar.php">Charitable Contribution</option>
                            <option data-tpath="scoperetro.php">Retrospective</option>
                            <option data-tpath="scopepros.php">Prospective</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='scopetemp' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_app_cert'>
                            <option data-tpath="appcert.php">Generate Appraiser Certification</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='appcert'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_region_temps'>
                            <option data-tpath="">Select Regional Template</option>
                            <option data-tpath="regalbany.php">Albany MSA</option>
                            <option data-tpath="regmedash.php">Medford-Ashland MSA</option>
                            <option data-tpath="regportvan.php">Portland-Vancouver MSA</option>
                            <option data-tpath="regsalem.php">Salem MSA</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='regiontemp' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_gloss_lib'>
                            <option data-tpath="">Select Glossary</option>
                            <option data-tpath="glossnar.php">Master Narrative Report</option>
                            <option data-tpath="glossform.php">Master Form Report</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='glosslib'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_mark_analysis'>
                            <option data-tpath="">Select Market Analysis</option>
                            <option data-tpath="ma-autolevelb.php">Auto Dealership- Level B</option>
                            <option data-tpath="ma-churchlevela.php">Church - Level A</option>
                            <option data-tpath="ma-commlevela.php">Commercial (Retail &amp; Office) - Level A</option>
                            <option data-tpath="ma-preschoollevela.php">Day Care - Preschool - Level A</option>
                            <option data-tpath="ma-indlevela.php">Industrial - Level A</option>
                            <option data-tpath="ma-indlevelb.php">Industrial - Level B</option>
                            <option data-tpath="ma-mflevela.php">Multi-Family - Level A</option>
                            <option data-tpath="ma-restbarlevela.php">Restaurant &amp; Bar - Level A</option>
                            <option data-tpath="ma-restfastlevela.php">Restaurant Fastfood - Level A</option>
                            <option data-tpath="ma-restsitlevela.php">Restaurant Sit-Down - Level A</option>
                            <option data-tpath="ma-restalllevela.php">Restaurant All - Level A</option>
                            <option data-tpath="ma-officelevela.php">Office - Level A</option>
                            <option data-tpath="ma-retaillevela.php">Retail - Level A</option>
                            <option data-tpath="ma-vehrepailevela.php">Vehicle Repair - Level A</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='mark_anal'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate">
                            <option>Generate Company Profile</option>
                          </select>
                          <label><a class='_generateCompProfile' style='cursor:pointer;' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_site_desc'>
                            <option data-tpath="">Select Site Description</option>
                            <option data-tpath="siteglatax.php">Gross Land Area - One Tax Lot</option>
                            <option data-tpath="siteglataxmulti.php" data-tav="1">Gross Land Area - Multiple Tax Lots</option>
                            <option data-tpath="siteglaunuse.php">Gross Land, Unusable, Net Usable</option>
                            <option data-tpath="siteprimsurp.php">Primary Site, Surplus Land</option>
                            <option data-tpath="siteprimexcess.php">Primary Site, Excess Land</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='sitelib'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                      <div class="col-6 labellib padding-0">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_misc_reptemps'>
                            <option data-tpath="">Generate Misc. Report Template</option>
                            <option data-tpath="recertconstinspect.php">Recert and Construction Inspection</option>
                            <option data-tpath="sumsale.php" data-tav="1">Summary Form - Sales Comp Only</option>
                            <option data-tpath="sumsalesurp.php" data-tav="1">Summary Form - Sales Comp with Surplus Land</option>
                            <option data-tpath="sumsalecompinc.php" data-tav="1">Summary Form - Sales Comp and Income</option>
                            <option data-tpath="sumsalecompincsurp.php" data-tav="1">Summary Form - Sales Comp and Income with Surplus Land</option>
                            <option data-tpath="suminc.php" data-tav="1">Summary Form - Income  Only</option>
                            <option data-tpath="sumland.php" data-tav="1">Summary Form - Land Valuation</option>
                            <option data-tpath="sumgl.php" data-tav="1">Summary Form - Ground Lease Valuation</option>
                            <option data-tpath="restsale.php" data-tav="1">Restricted Report -  Sales Comp Approach</option>
                            <option data-tpath="restsalecompinc.php" data-tav="1">Restricted Report - Sales Comp and Income Approach</option>
                            <option data-tpath="restsalesurp.php" data-tav="1">Restricted Report - Sales Comp with Surplus Land Approach</option>
                            <option data-tpath="restinc.php" data-tav="1">Restricted Report - Income Approach</option>
                            <option data-tpath="restland.php" data-tav="1">Restricted Report - Land Valuation</option>
                            <option data-tpath="evalnlt.php" data-tav="1">Evaluation Report - NLT Value</option>
                            <option data-tpath="evalsale.php" data-tav="1">Evaluation Report - Sales</option>
                            <option data-tpath="evalsalesurp.php" data-tav="1">Evaluation Report - Sales with Surplus Land</option>
                            <option data-tpath="evalsalecompinc.php" data-tav="1">Evaluation Report - Sales Comp and Income</option>
                            <option data-tpath="evallandval.php" data-tav="1">Evaluation Report - Land Valuation</option>
                            <option data-tpath="evalinc.php" data-tav="1">Evaluation Report - Income Approach</option>
                            <option data-tpath="sumrentstudyindust.php" data-tav="1">Summary Form - Rent Study - Industrial</option>
                            <option data-tpath="sumrentstudyoffice.php" data-tav="1">Summary Form - Rent Study - Office</option>
                            <option data-tpath="sumrentstudycommer.php" data-tav="1">Summary Form - Rent Study - Commercial</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='miscreptemp' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 padding-0 groupsection">
                <div class="fieldsarea">
                  <div class="row" style="margin: 0px; height: 37px;">
                    <div class="col-4 padding-0 secghead"> <b>Approach Used</b> </div>
                    <div class="col-4 padding-0 secghead">
                      <center>
                        <b>Word Templates</b>
                      </center>
                    </div>
                    <div class="col-4 padding-0 secghead">
                      <center>
                        <b>Excel Templates</b>
                      </center>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-3 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="site_valuation" id="site_valuation" value="1" class='form-check-input _formUpdate' <?php if ($appraisals->getSite_valuation()==1 ) echo 'checked="checked"'; ?> />
                        <label for="site_valuation"> Land Valuation</label>
                      </div>
                    </div>
                    <div class="col-9 labellib padding-0">
                      <div class="form-group row _lv_Library" style="width: 49%; float: left;">
                        <select class="form-select _formUpdate" id='_lv_temp_libWord'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="indcomland.php">Indust / Comm - Land Valuation</option>
                          <option data-tpath="indcommfmufar.php">Indust / Comm - FAR Land Valuation</option>
                          <option data-tpath="indcomretpad.php">Indust / Comm - Retail Pad</option>
                          <option data-tpath="indcomexasis.php">Indust / Comm - Excess As Is</option>
                          <option data-tpath="indcomsurasis.php">Indust / Comm - Surplus As Is</option>
                          <option data-tpath="indcomprimsur.php">Indust / Comm - Primary Surplus Proposed</option>
                          <option data-tpath="reslandval.php">Residential Land</option>
                          <option data-tpath="aptlandval.php">Apartment Land Valuation</option>
                          <option data-tpath="agugblandacre.php">Ag UGB Land Valuation Acres</option>
                        </select>
                        <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='lval_val_lib' id='lvwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-3 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="cost_approach" id="cost_approach" value="1" class='form-check-input _formUpdate' <?php if ($appraisals->getCost_approach()==1 ) echo 'checked="checked"'; ?> />
                        <label for="cost_approach"> Cost Approach</label>
                      </div>
                    </div>
                    <div class="col-9 padding-0 labellib">
                      <div class="form-group row _ca_Library" style="width: 49%; float: left;">
                        <select class="form-select _formUpdate" id='_ca_temp_libWord'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="caindprop.php">Industrial Proposed</option>
                          <option data-tpath="caoffprop.php">Office Proposed</option>
                          <option data-tpath="cacommprop.php">Commercial Proposed</option>
                          <option data-tpath="caapartment.php">Apartment Proposed</option>
                          <option data-tpath="cadealership.php">Auto Dealership Existing</option>
                          <option data-tpath="cachurch.php">Church School Existing</option>
                          <option data-tpath="camultibldg.php">Multi Building Existing</option>
                        </select>
                        <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='cost_approach_lib' id='cswordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                      </div>
                      <div class="form-group row _ca_Library" style="width: 49%; float: right;">
                        <select class="form-select _formUpdate" id='_ca_temp_libExcel'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="mvsorkbookapt.php" data-tav="0">Cost Workbook - Apartment</option>
                          <option data-tpath="mvsorkbookchurch.php" data-tav="0">Cost Workbook - Church</option>
                          <option data-tpath="mvsorkbookcomm.php" data-tav="0">Cost Workbook - Commercial</option>
                          <option data-tpath="mvsdealership.php" data-tav="1">Cost Workbook - Dealership</option>
                          <option data-tpath="mvsorkbookind.php" data-tav="0">Cost Workbook - Industrial</option>
                          <option data-tpath="mvsorkbookmb.php" data-tav="0">Cost Workbook - Multi-Building</option>
                          <option data-tpath="mvsorkbookomb.php" data-tav="0">Cost Workbook - Office/Medical/Bank</option>
                          <!--                              _generateReportExcelBtn-->
                        </select>
                        <label><a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='cost_approach' id='csexcelbtn'><img src="../img/excel-icon.png" border='0' /></a></label>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-3 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="sales_comparison" id="sales_comparison" value="1" class='form-check-input _formUpdate' <?php if ($appraisals->getSales_comparison()==1 ) echo 'checked="checked"'; ?> />
                        <label for="sales_comparison"> Sales Comp Approach</label>
                      </div>
                    </div>
                    <div class="col-9 padding-0 labellib">
                      <div class="form-group row _sa_Library" style="width: 49%; float: left;">
                        <select class="form-select _formUpdate" id='_sa_temp_libWord'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="scaapartment.php">Apartment</option>
                          <option data-tpath="scacommst.php">Commercial Single Tenant</option>
                          <option data-tpath="scacommstbsmt.php">Commercial Single Tenant w/ basement</option>
                          <option data-tpath="scacommmt.php">Commercial Multi Tenant</option>
                          <option data-tpath="scaindst.php">Industrial Single Tenant</option>
                          <option data-tpath="scaindmt.php">Industrial Multi Tenant</option>
                          <option data-tpath="scaofficest.php">Office Single Tenant</option>
                          <option data-tpath="scaofficestbsmt.php">Office Single Tenant w/ basement</option>
                          <option data-tpath="scaofficemt.php">Office Multi Tenant</option>
                          <option data-tpath="scamhp.php">Mobile Home Park</option>
                          <option data-tpath="scastorage.php">Mini Storage</option>
                        </select>
                        <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='sales_approach_lib' id='sawordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                      </div>
                      <div class="form-group row _sa_Library" style="width: 49%; float: right;"> 
                        <!--<select class="form-select _formUpdate" id='sa_temp_libExcel'>
                            <option data-tpath="">---Select---</option>
                            <option data-tpath="">Sales Approach Template</option>
                          </select>
                          <label><a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='sales_approach' id='saexcelbtn'><img src="../img/excel-icon.png" border='0' /></a></label>--> 
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-3 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="income_approach" id="income_approach" class='form-check-input _formUpdate' value="1" <?php if ($appraisals->getIncome_approach()==1 ) echo 'checked="checked"'; ?> />
                        <label for="income_approach"> Income Approach</label>
                      </div>
                    </div>
                    <div class="col-9 padding-0 labellib">
                      <div class="form-group row _ia_Library" style="width: 49%; float: left;">
                        <select class="form-select _formUpdate" id='_ia_temp_libWord'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="indstnnn-word.php">Industrial Single Tenant - NNN</option>
                          <option data-tpath="indmtnnn-word.php">Industrial Multi Tenant - NNN</option>
                          <option data-tpath="indmtnnnabsolute-word.php">Industrial Multi-Tenant - NNN Absolute</option>
                          <option data-tpath="ministorage-word.php">Mini Storage</option>
                          <option data-tpath="offmtgross-word.php">Office Multi Tenant - Gross</option>
                          <option data-tpath="offmtmodgross-word.php">Office Multi-Tenant - Modified Gross</option>
                          <option data-tpath="offstnnn-word.php">Office Single-Tenant - NNN</option>
                          <option data-tpath="offstnnnbsmt-word.php">Office Single-Tenant w/ basement - NNN</option>
                          <option data-tpath="offstnnnabsolute-word.php">Office Single-Tenant - NNN Absolute</option>
                          <option data-tpath="commstnnn-word.php">Comm Single-Tenant - NNN</option>
                          <option data-tpath="commstnnnbsmt-word.php">Comm Single-Tenant w/ basement - NNN</option>
                          <option data-tpath="commstnnnabsolute-word.php">Comm Single Tenant - NNN Absolute</option>
                          <option data-tpath="muretailoffice-word.php">Mixed Use - Retail - Office</option>
                          <option data-tpath="muretailapt-word.php">Mixed Use - Retail - Apartment</option>
                          <option data-tpath="apartment-word.php">Apartment</option>
                          <option data-tpath="mobhome-word.php">Mobile Home Park</option>
                          <option data-tpath="cranalyses.php">Cap Rate Analyses</option>
                        </select>
                        <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='income_approach_lib' id='iawordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                      </div>
                      <div class="form-group row _ia_Library" style="width: 49%; float: right;">
                        <select class="form-select _formUpdate" id='_ia_temp_libExcel'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="absmtmonrent_a.php" data-tav="0">Absorption Analysis - Monthly Rent - Current Occupancy</option>
                          <option data-tpath="absmtmonrent_b.php" data-tav="0">Absorption Analysis - Monthly Rent - Proposed Construction</option>
                          <option data-tpath="absmtannrent_a.php" data-tav="0">Absorption Analysis - Annual Rent - Current Occupancy</option>
                          <option data-tpath="absmtannrent_b.php" data-tav="0">Absorption Analysis - Annual Rent - Proposed Construction</option>
                          <option data-tpath="leaseholdvalst.php" data-tav="0">Leasehold Valuation - Single-Tenant</option>
                          <option data-tpath="leaseholdvalmt.php" data-tav="0">Leasehold Valuation - Multi-Tenant</option>
                          <option data-tpath="trrindmtnnn.php" data-tav="0">Tenant Rent Roll - Industrial Multi-Tenant - NNN</option>
                          <option data-tpath="trrindstnnn.php" data-tav="0">Tenant Rent Roll - Industrial Single-Tenant - NNN</option>
                          <option data-tpath="trrofsnnn.php" data-tav="0">Tenant Rent Roll - Office Full Service to NNN</option>
                          <option data-tpath="trrrmtmgnnn.php" data-tav="0">Tenant Rent Roll - Retail - Mod. Gross - NNN</option>
                          <option data-tpath="expofficesubjhist.php" data-tav="0">Expense Analysis - Office - Subject Historical</option>
                          <option data-tpath="expmhp.php" data-tav="0">Expense Analysis - MHP</option>
                          <option data-tpath="expselfstorage.php" data-tav="0">Expense Analysis - Self Storage</option>
                          <option data-tpath="commstnnn.php" data-tav="0">Commercial Single-Tenant - NNN</option>
                          <option data-tpath="indstnnn.php" data-tav="0">Industrial Single-Tenant - NNN</option>
                          <option data-tpath="indmtnnn.php" data-tav="0">Industrial Multi-Tenant - NNN</option>
                          <option data-tpath="indstysnnn.php" data-tav="0">Industrial Single-Tenant + Yard Storage - NNN</option>
                          <option data-tpath="mhpworkbook.php" data-tav="0">Mobile Home Park Workbook</option>
                          <option data-tpath="mixusehistretailoff.php" data-tav="0">Mixed Use - Retail and Office</option>
                          <option data-tpath="mixeduseretapt.php" data-tav="0">Mixed Use - Retail and Apartment</option>
                          <option data-tpath="offstnnn.php" data-tav="0">Office Single-Tenant - NNN</option>
                          <option data-tpath="officemtfs.php" data-tav="0">Office Multi-Tenant - Full Service</option>
                          <option data-tpath="officemtfsnocam.php" data-tav="0">Office Multi-Tenant - NNN (no CAM Reimb)</option>
                          <option data-tpath="offcombsmtmazznnn.php">Office-Comm Bsmt-Mezz NNN Allocation</option>
                          <option data-tpath="retailmtnnncam.php" data-tav="0">Retail Multi-Tenant - NNN (CAM Reimb)</option>
                          <option data-tpath="selfstorworkbook.php" data-tav="0">Self-Storage Workbook</option>
                          <option data-tpath="smallaptwb.php" data-tav="0">Small Apartment Workbook</option>
                        </select>
                        <label><a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='income_approach' id='iaexcelbtn'><img src="../img/excel-icon.png" border='0' /></a></label>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                    <div class="col-3 labelchck padding-0">
                      <div class="form-group row">
                        <input type="checkbox" name="groundlease" id="groundlease" value="1" class='form-check-input _formUpdate' <?php if ($appraisals->getGroundlease()==1 ) echo 'checked="checked"'; ?> />
                        <label for="groundlease"> Misc. Valuations</label>
                      </div>
                    </div>
                    <div class="col-9 padding-0 labellib">
                      <div class="form-group row _mv_Library" style="width: 49%; float: left;">
                        <select class="form-select _formUpdate" id='_mv_temp_libWord'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="bbpvaluationword.php">Billboard Pad Valuation</option>
                          <option data-tpath="ctpvaluationword.php">Cell Tower Pad Valuation</option>
                          <option data-tpath="dispovaluationword.php">Disposition Valuation</option>
                          <option data-tpath="glvaluationword.php">Ground Lease Valuation</option>
                          <option data-tpath="liquidvaluationword.php">Liquidation Valuation</option>
                          <option data-tpath="insval.php">Insurable Value</option>
                          <option data-tpath="insvalrepcost.php">Insurable Replacement Cost Estimate</option>
                          <option data-tpath="insvalrepcostnew.php">Insurable Replacement Cost New</option>
                        </select>
                        <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='misc_val_lib' id='mvwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                      </div>
                      <div class="form-group row _mv_Library" style="width: 49%; float: right;">
                        <select class="form-select _formUpdate" id='_mv_temp_libExcel'>
                          <option data-tpath="">---Select---</option>
                          <option data-tpath="groundlease.php" data-tav="1">Ground Lease Workbook</option>
                          <option data-tpath="bbpadvaluation.php" data-tav="0">Billboard Pad Valuation</option>
                          <option data-tpath="cellpadvaluation.php" data-tav="0">Cell Tower Pad Valuation</option>
                          <option data-tpath="insurvalapt.php" data-tav="0">Insurable Valuation - Apartment</option>
                          <option data-tpath="insurvalchurch.php" data-tav="0">Insurable Valuation - Church</option>
                          <option data-tpath="insurvalomb.php" data-tav="0">Insurable Valuation - Office / Med / Bank</option>
                          <option data-tpath="insurvalcomm.php" data-tav="0">Insurable Valuation - Commercial</option>
                          <option data-tpath="insurvaldeal.php" data-tav="1">Insurable Valuation - Dealership</option>
                          <option data-tpath="insurvalind.php" data-tav="0">Insurable Valuation - Industrial</option>
                        </select>
                        <label><a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='misc_valuations' id='mvexcelbtn'><img src="../img/excel-icon.png" border='0' /></a></label>
                      </div>
                    </div>
                    <div class="col-9 padding-0 labellib"> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#clientpick" role="tab">Client</a> </li>
                  <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#emdomain" id="emdomtab" role="tab" style="display: none">Eminent Domain</a> </li>
                </ul>
                <div class="tab-content inner-tab-content">
                  <div id="clientpick" class="tab-pane active table-section">
                    <div class="fieldsarea">
                      <h2>aa - Clients <span class="pull-right"> <a style="cursor:pointer" class="itemUp" data-type="client"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="client"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                      <div class="table-responsive">
                        <input type="hidden" name="client_db" id="clientIDs" class='_formUpdate' value="<?php echo $appraisals->getClient_db(); ?>"/>
                        <table class="table _table" id="client_table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Company</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Cell Phone</th>
                              <th>Email</th>
                              <th>Website</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="" style='display:none;'>
                              <td class='selectable' data-type='sequence' ></td>
                              <td data-property='compname' class='selectable'></td>
                              <td data-property='firstname' class='selectable'></td>
                              <td data-property='lastname' class='selectable'></td>
                              <td data-property='cellphone' class='selectable'></td>
                              <td data-property='email' class='selectable'></td>
                              <td data-property='website' class='selectable'></td>
                            </tr>
                            <?php
                            if ( count( $clirecords ) > 0 ) {
                              for ( $h = 0; $h < count( $clirecords ); $h++ ) {
                                // set up a row for each record
                                ?>
                            <tr id="<?php echo $clirecords[$h]['id']; ?>">
                              <td data-type='sequence' class='selectable'><?php echo ($h+1); ?></td>
                              <td data-property='compname' class='selectable'><?php echo $clirecords[$h]['compname']; ?></td>
                              <td data-property='firstname' class='selectable'><?php echo $clirecords[$h]['firstname']; ?></td>
                              <td data-property='lastname' class='selectable'><?php echo $clirecords[$h]['lastname']; ?></td>
                              <td data-property='cellphone' class='selectable'><?php echo $clirecords[$h]['cellphone']; ?></td>
                              <td data-property='email' class='selectable'><?php echo $clirecords[$h]['email']; ?></td>
                              <td data-property='website' class='selectable'><?php echo $clirecords[$h]['website']; ?></td>
                            </tr>
                            <?php
                            }
                            }
                            // if there are no records in the database, display an alert message
                            else {
                              echo "No results to display!";
                            }

                            ?>
                          </tbody>
                        </table>
                      </div>
                      <?php if($login_admin == 1) { ?>
                      <div class="col-xs-12"> <a class="btn golden-btn newWindow" data-type="cliselect" >Select Client</a> <a class="btn golden-btn newWindow" data-type="client">Create New Client</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="client">Edit Client</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="client">Remove Client</a> </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div id="emdomain" class="tab-pane fade">
                    <div class="grouprow">
                      <div class="col-6 groupsection label125">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Owner Address</label>
                            <input type="text" class="form-control" name="ownaddress" value="<?php echo $appraisals->getOwnaddress(); ?>"/>
                          </div>
                          <div class="grouprow">
                            <div class="form-group row" style="width: 40%;">
                              <label>Owner City</label>
                              <input type="text" class="form-control" name="owncity" value="<?php echo $appraisals->getOwncity(); ?>"/>
                            </div>
                            <div class="form-group row" style="width: 25%;">
                              <label>Owner State</label>
                              <input type="text" class="form-control" name="ownstate" value="<?php echo $appraisals->getOwnstate(); ?>"/>
                            </div>
                            <div class="form-group row" style="width: 35%;">
                              <label>Owner Zip Code</label>
                              <input type="text" class="form-control" name="ownzipcode" value="<?php echo $appraisals->getOwnzipcode(); ?>"/>
                            </div>
                          </div>
                          <hr>
                          <div class="grouprow edreviewpurp">
                            <div class="form-group row" style="width: 50%;">
                              <label>Review Firm</label>
                              <input type="text" class="form-control" name="rowappfirm" value="<?php echo $appraisals->getRowappfirm(); ?>"/>
                            </div>
                            <div class="form-group row" style="width: 50%;">
                              <label>Review Appraiser</label>
                              <input type="text" class="form-control" name="rowappname" value="<?php echo $appraisals->getRowappname(); ?>"/>
                            </div>
                          </div>
                          <div class="grouprow edreviewpurp">
                            <div class="form-group row" style="width: 50%;">
                              <label>Date of Report</label>
                              <input type="date" class="form-control" name="rowdoreport" value="<?php echo $appraisals->getRowdoreport(); ?>"/>
                            </div>
                            <div class="form-group row" style="width: 50%;">
                              <label>Date of Review</label>
                              <input type="date" class="form-control" name="rowdoreview" value="<?php echo $appraisals->getRowdoreview(); ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 groupsection">
                        <div class="fieldsarea">
                          <div class="grouprow edapppurp label125" id="rowemapp">
                            <div class="form-group row" style="width: 100%;">
                              <label>Project Name</label>
                              <input type="text" class="form-control" name="rowprojname" value="<?php echo $appraisals->getRowprojname(); ?>"/>
                            </div>
                          </div>
                          <div class="grouprow edapppurp label125">
                            <div class="form-group row" style="width: 50%;">
                              <label>Inspection Date</label>
                              <input type="date" class="form-control" name="reqinsdate" value="<?php echo $appraisals->getReqinsdate(); ?>"/>
                            </div>
                            <div class="form-group row" style="width: 50%;">
                              <label>Date of Leg. Desc.</label>
                              <input type="date" class="form-control" name="rowdold" value="<?php echo $appraisals->getRowdold(); ?>"/>
                            </div>
                          </div>
                          <div class="grouprow edapppurp label125">
                            <div class="form-group row" style="width: 50%;">
                              <label>Area to Be Acquired</label>
                              <input type="text" class="form-control _fm00t" name="rowsfacq" value="<?php echo $appraisals->getRowsfacq(); ?>"/>
                            </div>
                            <hr>
                          </div>
                          <hr>
                          <div class="grouprow labellib">
                            <div class="form-group row" style="width: 50%;">
                              <select class="form-select _formUpdate" id='_rowtemps'>
                                <option data-tpath="" data-tav="0">Select Right of Way Template</option>
                                <option data-tpath="15daynot.php" data-tav="1">15 Day Notice</option>
                                <option data-tpath="certodot.php" data-tav="0">ODOT Certificate of Appraiser</option>
                                <option data-tpath="orappreview.php" data-tav="1">Appraisal Review - State of OR Template</option>
                              </select>
                              <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='rowtemp' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></a></label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-12 groupsection label125">
                <div class="fieldsarea">
                  <div class="form-group row" style="padding-bottom:3px;">
                    <label>Special Comments</label>
                    <textarea class="form-control _formUpdate" rows="3" name="special_comments"><?php echo $appraisals->getSpecial_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Subject Information Tab -->
          <div id="subjectinfo" class="tab-pane active">
            <div class="grouprow">
              <div class="groupsection label130 spaddinf">
                <div class="fieldsarea">
                  <div class="form-group row border-0">
                    <label>Enter Address</label>
                    <input type="text" name="address" class="_address form-control _formUpdate" id="autocomplete" (focus)="geolocate()" value="<?php echo $appraisals->getAddress(); ?>"/>
                  </div>
                  <div class="grouprow padding-0">
                    <div class="col-6 groupsection padding-0 " style="float: left; min-width: 400px;"> 
                      <div class="form-group row">
                        <label>Property Name</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="property_name" id="property_name" value="<?php echo $appraisals->getProperty_name(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Number</label>
                        <input class="field form-control _formUpdate _bmtxtfield" name="streetnumber" id="street_number" type="text" value="<?php echo $appraisals->getStreetnumber(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Street Name</label>
                        <input class="field form-control _formUpdate _bmtxtfield" name="streetname" id="route" type="text" value="<?php echo $appraisals->getStreetname(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>City</label>
                        <input class="field form-control _formUpdate _bmtxtfield" name="city" id="locality" type="text" value="<?php echo $appraisals->getCity(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>County</label>
                        <input name="county" type="text" class="form-control field _formUpdate _bmtxtfield" id="administrative_area_level_2" value="<?php echo $appraisals->getCounty(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>State</label>
                        <input type="text" class="form-control _formUpdate _bmtxtfield" name="state" id="administrative_area_level_1" value="<?php echo $appraisals->getState(); ?>"/>
                      </div>
                      <div class="form-group row">
                        <label>Zip Code</label>
                        <input type="text" class="field form-control _formUpdate _bmtxtfield" id="postal_code" name="zip_code" value="<?php echo $appraisals->getZip_code(); ?>"/>
                      </div>
                      <input type="hidden" name="lat" id="latitude" class="form-control _formUpdate" value="<?php echo $appraisals->getLat(); ?>" />
                      <input type="hidden" name="lng" id="longitude" class="form-control _formUpdate" value="<?php echo $appraisals->getLng(); ?>"/>
                    </div>
                    <div class="col-6 groupsection padding-0" style="float: right; min-width: 400px;"> 
                      <div class="form-group row">
                        <label>Property Type</label>
                        <select class="form-select _formUpdate _bms20field" name="propertytype" id='selectPropertType'>
                          <?php

                          for ( $s = 0; $s < count( $propertyData ); $s++ ) {
                            ?>
                          <option value='<?php echo $propertyData[$s]["id"]; ?>' <?php if ( $appraisals->getPropertytype() == $propertyData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
    																        }
    																        ?> > <?php echo $propertyData[$s]["propertytype"];?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Property Sub-Type</label>
                        <select class="form-select _formUpdate _bmtxtfields1" name="propertysubtype" id='selectSubPropertType'>
                          <?php
                          for ( $s = 0; $s < count( $subPropertyData ); $s++ ) {
                            ?>
                          <option value='<?php echo $subPropertyData[$s]["id"]; ?>' data-tselect='<?php echo $subPropertyData[$s]["subtype"];?>' <?php if ( $appraisals->getPropertysubtype() == $subPropertyData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
    																        }
    																        ?> > <?php echo $subPropertyData[$s]["subtype"];?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>MSA</label>
                        <input type="text" list="msalist" class="form-control _formUpdate" name="msa" value="<?php echo $appraisals->getMsa(); ?>"/>
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
                          <option value='<?php echo $marketData[$s]["id"]; ?>' data-tselect='<?php echo $marketData[$s]["genmarket"];?>' <?php if ( $appraisals->getGenmarket() == $marketData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
    																        }
    																        ?> > <?php echo $marketData[$s]["genmarket"];?> </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label>Submarket Name</label>
                        <select class="form-select _formUpdate" name="submarkid" id='selectSubMarketArea'>
                          <?php
                          for ( $s = 0; $s < count( $subMarketData ); $s++ ) {
                            ?>
                          <option value='<?php echo $subMarketData[$s]["id"]; ?>' data-tselect='<?php echo $subMarketData[$s]["submarket"];?>' <?php if ( $appraisals->getSubmarkid() == $subMarketData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
    												}
    												?> > <?php echo $subMarketData[$s]["submarket"];?> </option>
                          <?php }	?>
                        </select>
                      </div>
                      <div class="form-group row" style="padding-bottom:3px;">
                        <label>Legal Description</label>
                        <textarea class="form-control _formUpdate _bmtxtfield" rows="2" name="legal_desc" id="legDesc"><?php echo $appraisals->getLegal_desc(); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="groupsection label100 spimgarea">
                <div class="grouphead">Property Photo</div>
                <div class="fieldsareawhead label125">
                  <div class="section-inner-width imgPlc" id="subjectPhoto">
                    <?php if ($appraisals->getId() != '') { ?>
                    <a href="../comp_images/<?php echo $appraisals->getImage(); ?>" rel='lightbox[property]' > <img id="preview-sp1" src="../comp_images/<?php echo $appraisals->getImage();?>" style='cursor:pointer;' data-type='property-photo' /> </a>
                    <?php } else {?>
                    <img id="preview-sp1" src="../comp_images/no-photo.jpg" style='cursor:pointer;'/>
                    <?php } ?>
                    <div style='display:none;'>
                      <label for="sp1" class="custom-file-upload">Subject Photo</label>
                    </div>
                    <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="photo1" class="_photo"/>
                    <input type='hidden' name="photo1path" id='photo1path' value="<?php echo $appraisals->getPhoto1(); ?>" />
                    <input type='hidden' name="thumbpath" id="thumbpath" value="<?php echo $appraisals->getThumbnail(); ?>"/>
                  </div>
                  <?php if($login_ro == 0) { ?>
                  <div class='preview-sp1-panel'> <a class='fa fa-camera img-edit' data-rel-photo-btn='sp1' data-container='subjectPhoto'/></a>
                    <?php if ($appraisals->getPhoto1() != '') { ?>
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
              <div class="col-12 padding-0">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#pendingsaleinformation" role="tab">Subject Sale</a> </li>
                </ul>
                <div class="tab-content inner-tab-content">
                  <div id="pendingsaleinformation" class="tab-pane active">
                    <div class="grouprow">
                      <div class="col-12 groupsection label100">
                        <div class="fieldsarea row" style='border: 0;'>
                          <div class="form-group row" style="width: calc(20% - 4px);">
                            <label>Sale Status</label>
                            <select class="form-select" name="sale_status">
                              <?php
                              for ( $s = 0; $s < count( $salestatusData ); $s++ ) {
                                ?>
                              <option value='<?php echo $salestatusData[$s]["id"]; ?>' <?php
                                                                                            if ( $appraisals->getSale_status() == $salestatusData[$s]["id"] ) {
                                                                                                ?>selected='selected'<?php 
                                                                                            }
                                                                                            ?> ><?php echo $salestatusData[$s]["definition"];?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row" style="width: calc(20% - 4px);">
                            <label>Sale Price</label>
                            <input type="text" class="form-control _formUpdate _cfm00t" name="list_price" id="list_price" value="<?php echo $appraisals->getList_price(); ?>"/>
                          </div>
                          <div class="form-group row" style="width: calc(20% - 4px);">
                            <label>Sale Date</label>
                            <input type="date" class="form-control _formUpdate" name="record_date" id="record_date" value="<?php echo $appraisals->getRecord_date(); ?>"/>
                          </div>
                          <div class="form-group row" style="width: calc(20% - 4px);">
                            <label>Seller</label>
                            <input type="text" class="form-control _formUpdate" name="grantor" value="<?php echo $appraisals->getGrantor(); ?>"/>
                          </div>
                          <div class="form-group row" style="width: calc(20% - 4px);">
                            <label>Buyer</label>
                            <input type="text" class="form-control _formUpdate" name="grantee" value="<?php echo $appraisals->getGrantee(); ?>"/>
                          </div>
                          <div class="col-12" style="padding: 0px;">
                            <div class="form-group row textfields" style="padding-bottom:3px;">
                              <label>Comment</label>
                              <textarea class="form-control _formUpdate" name="sale_comments" rows="2" style="font-size: 16px"><?php echo $appraisals->getSale_comments(); ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Land Information Tab -->
          <div id="landinfo" class="tab-pane fade">
            <div class="grouprow">
              <div class="col-4 groupsection">
                <div class="fieldsarea">
                  <div class="form-group row" style="float: left; margin-top: 5px; width: 100%;">
                    <div class="switch" style="padding: 0px; width: 168px;">
                      <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="0" id="inputtypeSF" <?php if ($appraisals->getGla_inputtype()==0) echo 'checked="checked"'; ?>
                                                                    <?php if(empty($appraisals->getId())) echo 'checked="checked"'; ?> />
                      <label for="inputtypeSF" class="switch-label switch-label-off">SF</label>
                      <input type="radio" class="switch-input gla_ut _formUpdate _ppgcc" name="gla_inputtype" value="1" id="Acre" <?php if ($appraisals->getGla_inputtype()==1) echo 'checked="checked"'; ?> />
                      <label for="Acre" class="switch-label switch-label-on">Acres</label>
                      <span class="switch-selection"></span> </div>
                    <input type="text" class="form-control _bmtxtfield calc gla_inputsize _formUpdate _ppgc _fm03t" style="width: calc(100% - 170px);" name="gla_inputsize" id="gla_inputsize" value="<?php echo $appraisals->getGla_inputsize(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (SF)</label>
                    <input type="text" class="form-control calc gross_land_sf _formUpdate _ppgc _fm00t" id="glasfcalc" name="gross_land_sf" value="<?php echo $appraisals->getGross_land_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Gross Land Area (Acres)</label>
                    <input type="text" class="form-control calc gross_land_acre _formUpdate _ppgc _fm03t" id="glaacrecalc" name="gross_land_acre" value="<?php echo $appraisals->getGross_land_acre(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label160">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Primary Site Area (SF)</label>
                    <input type="text" class="form-control calc primary_sf _formUpdate _ppgc _fm00t" id="primaryareasf" name="primary_sf" value="<?php echo $appraisals->getPrimary_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Primary Site Area (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="primaryareaacre" name="primary_acre" value="<?php echo $appraisals->getPrimary_acre(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Unusable Land (SF)</label>
                    <input type="text" class="form-control calc unusable_sf _formUpdate _ppgc _fm00t _bmtxtfield" name="unusable_sf" value="<?php echo $appraisals->getUnusable_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Unusable Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="unusableacre" name="unusable_acre" value="<?php echo $appraisals->getUnusable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Unusable Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="unusable_desc" style="width: 99%; margin-left: 2px;"><?php echo $appraisals->getUnusable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Excess Land (SF)</label>
                    <input type="text" class="form-control calc excess_sf _formUpdate _ppgc _fm00t _bmtxtfield" name="excess_sf" value="<?php echo $appraisals->getExcess_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Excess Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="excessacre" name="excess_acre" value="<?php echo $appraisals->getExcess_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Excess Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="excess_desc" style="width: 99%; margin-left: 2px;"><?php echo $appraisals->getExcess_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Surplus Land (SF)</label>
                    <input type="text" class="form-control calc surplus_sf _formUpdate _ppgc _fm00t _bmtxtfield" name="surplus_sf" id="surplus_sf" value="<?php echo $appraisals->getSurplus_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Surplus Land (Acres)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm03t" id="surplusacre" name="surplus_acre" value="<?php echo $appraisals->getSurplus_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Surplus Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="surplus_desc" style="width: 99%; margin-left: 2px;"><?php echo $appraisals->getSurplus_desc(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label150">
                <div class="fieldsarea">
                  <div class="form-group row padding-0">
                    <label>Net Usable Land (SF)</label>
                    <input type="text" class="form-control calc net_usable_sf _formUpdate _ppgc _fm00t" id="netareasf" name="net_usable_sf" value="<?php echo $appraisals->getNet_usable_sf(); ?>" readonly/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Net Usable Land (Acres)</label>
                    <input type="text" class="form-control calc net_usable_acre _formUpdate _ppgc _fm03t" id="netareaacre" name="net_usable_acre" value="<?php echo $appraisals->getNet_usable_acre(); ?>" readonly/>
                  </div>
                  <div class="form-group padding-0">
                    <label>Net Usable Description</label>
                    <textarea class="form-control _formUpdate" rows="4" name="net_usable_desc" style="width: 99%; margin-left: 2px;"><?php echo $appraisals->getNet_usable_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow" style="padding: 5px;">
              <div class="col-12 padding-0">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#landdescription" role="tab">Land Description</a> </li>
                  <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#zoninginformation" role="tab">Zoning Information</a> </li>
                  <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#assessedvalues" role="tab">Assessed Values</a> </li>
                </ul>
                <div class="tab-content inner-tab-content">
                  <div id="landdescription" class="tab-pane active">
                    <div class="grouprow">
                      <div class="col-3 groupsection label100">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Shape</label>
                            <select class="form-select _bms3field" name="shape" id="selectShape" >
                              <?php
                              for ( $s = 0; $s < count( $shapeData ); $s++ ) {
                                ?>
                              <option value='<?php echo $shapeData[$s]["id"]; ?>' data-tselect='<?php echo $shapeData[$s]["definition"];?>' <?php if ( $appraisals->getShape() == $shapeData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $shapeData[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row">
                            <label>Utilties</label>
                            <input type="text" list="utilslist" class="form-control _formUpdate _bmtxtfield" name="utilities" value="<?php echo $appraisals->getUtilities(); ?>"/>
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
                            <label>Exposure</label>
                            <select class="form-select _formUpdate _bms3field" name="exposure" id="selectExp">
                              <?php
                              for ( $s = 0; $s < count( $exposureData ); $s++ ) {
                                ?>
                              <option value='<?php echo $exposureData[$s]["id"]; ?>' data-tselect='<?php echo $exposureData[$s]["definition"];?>' <?php if ( $appraisals->getExposure() == $exposureData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $exposureData[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-3 groupsection label100">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Topography</label>
                            <select class="form-select _formUpdate _bms3field" id="selectTopo" name="topography">
                              <?php
                              for ( $s = 0; $s < count( $topographyData ); $s++ ) {
                                ?>
                              <option value='<?php echo $topographyData[$s]["id"]; ?>' data-tselect='<?php echo $topographyData[$s]["definition"];?>' <?php if ( $appraisals->getTopography() == $topographyData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $topographyData[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row">
                            <label>Site Access</label>
                            <select class="form-select _formUpdate _bms3field" id="selectSite" name="site_access">
                              <?php
                              for ( $s = 0; $s < count( $siteAccessData ); $s++ ) {
                                ?>
                              <option value='<?php echo $siteAccessData[$s]["id"]; ?>' data-tselect='<?php echo $siteAccessData[$s]["definition"];?>' <?php if ( $appraisals->getSite_access() == $siteAccessData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $siteAccessData[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row">
                            <label>Orientation</label>
                            <select class="form-select _formUpdate _bms3field" id="selectOrie" name="orientation">
                              <?php
                              for ( $s = 0; $s < count( $orientationData ); $s++ ) {
                                ?>
                              <option value='<?php echo $orientationData[$s]["id"]; ?>' data-tselect='<?php echo $orientationData[$s]["definition"];?>' <?php if ( $appraisals->getOrientation() == $orientationData[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $orientationData[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-3 groupsection label150">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Flood Plain</label>
                            <select class="form-select _formUpdate _bms3field" name="flood_plain">
                              <?php
                              for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                                ?>
                              <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $appraisals->getFlood_plain() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row padding-0">
                            <label>Easements?</label>
                            <select class="form-select _formUpdate" name="easement">
                              <?php
                              for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                                ?>
                              <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php if ( $appraisals->getEasement() == $yesnoDataDesc[$s]["id"] ) { ?>selected='selected'
                                                                        <?php 
                																        }
                																        ?> > <?php echo $yesnoDataDesc[$s]["definition"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group row padding-0">
                            <label>Easement Description</label>
                            <input type="text" list="eadesc" class="form-control _formUpdate _bmtxtfield" name="easement_desc" id="easementDesc" value="<?php echo $appraisals->getEasement_desc(); ?>"/>
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
                      </div>
                      <div class="col-3 groupsection label125">
                        <div class="fieldsarea">
                          <div class="form-group row padding-0">
                            <label>Traffic Count</label>
                            <input type="text" class="form-control _formUpdate _bmtxtfield" name="traffic_count" id="trafficCount" value="<?php echo $appraisals->getTraffic_count(); ?>"/>
                          </div>
                          <div class="form-group row padding-0">
                            <label>Date</label>
                            <input type="text" class="form-control _formUpdate" name="traffic_date" value="<?php echo $appraisals->getTraffic_date(); ?>"/>
                          </div>
                          <div class="form-group row padding-0">
                            <label>Intersector Street</label>
                            <input type="text" class="form-control _formUpdate" name="inter_street" value="<?php echo $appraisals->getInter_street(); ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="zoninginformation" class="tab-pane fade">
                    <div class="grouprow">
                      <div class="col-4 groupsection label125">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Zoning Code</label>
                            <input type="text" class="form-control _formUpdate _bmtxtfield" name="zoning_code" id="zoningCode" value="<?php echo $appraisals->getZoning_code(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Zoning Description</label>
                            <input type="text" class="form-control _formUpdate _bmtxtfield" name="zoning_desc" id="zoneDesc" value="<?php echo $appraisals->getZoning_desc(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Jurisdiction</label>
                            <input type="text" class="form-control _formUpdate" name="zoning_juris" value="<?php echo $appraisals->getZoning_juris(); ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 groupsection label130">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Zoning Overlay</label>
                            <input type="text" class="form-control _formUpdate" name="zoning_overlay" value="<?php echo $appraisals->getZoning_overlay(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Zoning Overlay Desc.</label>
                            <input type="text" class="form-control _formUpdate" name="zoning_overlay_desc" value="<?php echo $appraisals->getZoning_overlay_desc(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Zoning Details</label>
                            <input type="text" class="form-control _formUpdate" name="zoning_details" value="<?php echo $appraisals->getZoning_details(); ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 groupsection label150">
                        <div class="fieldsarea">
                          <div class="form-group row">
                            <label>Max Building Height</label>
                            <input type="text" class="form-control" name="max_building_ht" value="<?php echo $appraisals->getMax_building_ht(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Max FAR</label>
                            <input type="text" class="form-control calc floor_area_ratio _formUpdate _ppgc _fm01f"  name="floor_area_ratio" value="<?php echo $appraisals->getFloor_area_ratio(); ?>"/>
                          </div>
                          <div class="form-group row">
                            <label>Max Building Floor Area</label>
                            <input type="text" class="form-control _formUpdate _ppgc _fm00t"  id="bldgfloorarea" name="max_floor_area" value="<?php echo $appraisals->getMax_floor_area(); ?>" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="assessedvalues" class="tab-pane fade">
                    <div class="row">
                      <div class="col-5">
                        <div class="form-group row">
                          <p>Fill in the Assessed Year(s) then add each parcel by clicking the Add Parcel button.</p>
                        </div>
                      </div>
                      <div class="col-2 label125">
                        <div class="form-group row">
                          <label>Assessed Year(s)</label>
                          <input type="text"  class="form-control _bmtxtfield" name="assessedyear" value="<?php echo $appraisals->getAssessedyear(); ?>" />
                        </div>
                      </div>
                      <div class="col-1">
                        <div class="form-group row">
                          <input type="button" id="addassessed" class="_addAssessed" value="Add Parcel">
                        </div>
                      </div>
                      <div class="col-4 labellib row">
                        <div class="form-group row _val_premise">
                          <select class="form-select _formUpdate" id='_assessedVal'>
                            <option data-tpath="">Select Assessed Values Template</option>
                            <option data-tpath="assvalSingle.php">OR Assessed Values and Property Taxes - Single Parcel</option>
                            <option data-tpath="assvalMulti.php">OR Assessed Values and Property Taxes - Multi Parcel</option>
                            <option data-tpath="assvalHistoric.php">OR Historic Tax Freeze Subsection</option>
                            <option data-tpath="assvalWASingle.php">WA Assessed Values and Property Taxes - Single Parcel</option>
                            <option data-tpath="assvalWAMulti.php">WA Assessed Values and Property Taxes - Multi Parcel</option>
                          </select>
                          <label><a class='_generateLibraryWordBtn' style='cursor:pointer;' data-ttype='assval' id='vpwordbtn'><img src="../img/word-icon.png" border='0' /></a></label>
                        </div>
                      </div>
                    </div>
                    <div class="grouprow">
                      <div class="groupsection col-12">
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
                                <th width="9%" style="text-align: center">Measure<br>
                                  50 Value</th>
                                <th width="9%" style="text-align: center">Annual<br>
                                  Taxes</th>
                                <th width="9%">&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $assessedids = array();
                              $assessedvalues = $appraisals->getAssessedvalues();
                              $assessedTotals = [];
                              $assessedTotals[ 'assessedglasf' ] = 0;
                              $assessedTotals[ 'marketland' ] = 0;
                              $assessedTotals[ 'marketimp' ] = 0;
                              $assessedTotals[ 'markettotal' ] = 0;
                              $assessedTotals[ 'measure50' ] = 0;
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
                                <td><input type='text' name='measure50[]' class='form-control _ppgc _sum _cfm00t' value='<?php echo $assessedvalues[$s]->getMeasure50(); ?>'/></td>
                                <td><input type='text' name='annualtaxes[]' class='form-control _ppgc _sum _cfm02t' value='<?php echo $assessedvalues[$s]->getAnnualtaxes(); ?>'/></td>
                                <td><input type='button' class='_delAssessed' value='Delete' /></td>
                              </tr>
                              <?php
                              $assessedTotals[ 'assessedglasf' ] += $assessedvalues[ $s ]->getAssessedglasf();
                              $assessedTotals[ 'marketland' ] += $assessedvalues[ $s ]->getMarketland();
                              $assessedTotals[ 'marketimp' ] += $assessedvalues[ $s ]->getMarketimp();
                              $assessedTotals[ 'markettotal' ] += $assessedvalues[ $s ]->getMarkettotal();
                              $assessedTotals[ 'measure50' ] += $assessedvalues[ $s ]->getMeasure50();
                              $assessedTotals[ 'annualtaxes' ] += $assessedvalues[ $s ]->getAnnualtaxes();
                              $assessedids[] = $assessedvalues[ $s ]->getId();
                              }
                              ?>
                              <tr >
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type='text' id='_assessedglasf' class='form-control _fm00t' readonly value='<? echo $assessedTotals['assessedglasf'];?>'/></td>
                                <td><input type='text' id='_marketland' class='form-control _ppgc _cfm00t' readonly value='<? echo $assessedTotals['marketland'];?>'/></td>
                                <td><input type='text' id='_marketimp' class='form-control _ppgc _cfm00t' readonly value='<? echo $assessedTotals['marketimp'];?>'/></td>
                                <td><input type='text' id='_markettotal' class='form-control _ppgc _sumvt _cfm00t' readonly value='<? echo $assessedTotals['markettotal'];?>'/></td>
                                <td><input type='text' id='_measure50' class='form-control _ppgc _cfm00t' readonly value='<? echo $assessedTotals['measure50'];?>'/></td>
                                <td><input type='text' id='_annualtaxes' class='form-control _ppgc _cfm02t' readonly value='<? echo $assessedTotals['annualtaxes'];?>'/></td>
                              </tr>
                            <input type='hidden' name='assessedids' id='assessedvalueid' value='<?php echo implode(",",$assessedids); ?>' />
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Building Information Tab -->
          <div id="building-info" class="tab-pane fade">
            <div class="grouprow padding-0">
              <div class="col-3 padding-0"></div>
              <div class="col-6 padding-0 label125">
                <div class="form-group row padding-0" style="width: 49%; float: left">
                  <label>No. of Buildings</label>
                  <input type="number" min="0" max="20" step="1" class="form-control _formUpdate _bmtxtfield" name="no_building" id="nobldg" value="<?php echo $appraisals->getNo_building(); ?>"/>
                </div>
                <div class="form-group row padding-0" style="width: 49%; float: right;">
                  <label>Stories / Levels</label>
                  <input type="text" class="form-control _formUpdate _bmtxtfield" name="no_stories" id="nolvl" value="<?php echo $appraisals->getNo_stories(); ?>"/>
                </div>
              </div>
              <div class="col-3 padding-0"></div>
            </div>
            <div class="grouprow">
              <div class="col-3 groupsection">
                <div class="grouphead">Gross Building Area (GBA)</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>GBA - Floor 1</label>
                    <input type="text" class="form-control calc floor_1_gba _formUpdate _ppgc _fm00t _bmtxtfield" name="floor_1_gba" id="bldgFootprint" value="<?php echo $appraisals->getFloor_1_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>GBA - Floor 2 and above</label>
                    <input type="text" class="form-control calc floor_2_gba _formUpdate _ppgc _fm00t" name="floor_2_gba" id="floor2gba" value="<?php echo $appraisals->getFloor_2_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>GBA - Basement</label>
                    <input type="text" class="form-control calc total_basement_gba _formUpdate _ppgc _fm00t" name="total_basement_gba" value="<?php echo $appraisals->getTotal_basement_gba(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>OVERALL TOTAL GBA (SF)</label>
                    <input type="text" class="form-control calc overall_gba _formUpdate _ppgc _fm00t" id="totalgba" name="overall_gba" value="<?php echo $appraisals->getOverall_gba(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Basement - % of GBA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="percentbasegba" name="basement_pct_gba" value="<?php echo $appraisals->getBasement_pct_gba(); ?>" readonly/>
                  </div>
                  <div class="form-group"> </div>
                  <div class="form-group">
                    <label>Gross Building Area Source</label>
                    <input list="bsizesource" class="form-control _formUpdate" name="gba_source" value="<?php echo $appraisals->getGba_source(); ?>" style="width:99%; margin-left: 2px;"/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection">
                <div class="grouphead">NRA / GLA Building Area</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>NRA or GLA - Floor 1</label>
                    <input type="text" class="form-control calc floor_1_nra _formUpdate _ppgc _fm00t _bmtxtfield" name="floor_1_nra" id="footprintnra" value="<?php echo $appraisals->getFloor_1_nra(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>NRA or GLA - Floor 2 and above</label>
                    <input type="text" class="form-control calc floor_2_nra _formUpdate _ppgc _fm00t" name="floor_2_nra" value="<?php echo $appraisals->getFloor_2_nra(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>NRA or GLA - Basement</label>
                    <input type="text" class="form-control calc total_basement_nra _formUpdate _ppgc _fm00t" name="total_basement_nra" id="basementnra" value="<?php echo $appraisals->getTotal_basement_nra(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>OVERALL TOTAL NRA or GLA (SF)</label>
                    <input type="text" id="totalnra" class="form-control calc overall_nra _formUpdate _ppgc _fm00t" name="overall_nra" value="<?php echo $appraisals->getOverall_nra(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Finished Bsmt (% of NRA or GLA)</label>
                    <input type="text" id="percentbasenra" class="form-control _formUpdate _ppgc _fm01tp" name="basement_pct_nra" value="<?php echo $appraisals->getBasement_pct_nra(); ?>" readonly/>
                  </div>
                  <div class="form-group"> </div>
                  <div class="form-group">
                    <label>Rentable Area Source</label>
                    <input list="bsizesource" class="form-control _formUpdate" name="nra_source" value="<?php echo $appraisals->getNra_source(); ?>" style="width:99%; margin-left: 2px;"/>
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
                <div class="grouphead">Building Ratios</div>
                <div class="fieldsareawhead label200">
                  <div class="form-group row">
                    <label>Efficiency Ratio % NRA or GLA</label>
                    <input type="text" id="effratiogla" class="form-control _formUpdate _ppgc _fm01tp" name="eff_ratio_pct_nra" value="<?php echo $appraisals->getEff_ratio_pct_nra(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio - Primary Site</label>
                    <input type="text" id="lbrprim" class="form-control _formUpdate _ppgc _fm01tr" name="land_build_ratio_primary" value="<?php echo $appraisals->getLand_build_ratio_primary(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Site Coverage Ratio - Primary Site</label>
                    <input type="text" id="scrprim" class="form-control _formUpdate _ppgc _fm01tp" name="site_cover_primary" value="<?php echo $appraisals->getSite_cover_primary(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Land-to-Bldg Ratio - Overall Site</label>
                    <input type="text" id="lbrover" class="form-control _formUpdate _ppgc _fm01tr" name="land_build_ratio_overall" value="<?php echo $appraisals->getLand_build_ratio_overall(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Site Coverage Ratio - Overall Site</label>
                    <input type="text" id="scrover" class="form-control _formUpdate _ppgc _fm01tp" name="site_cover_overall" value="<?php echo $appraisals->getSite_cover_overall(); ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection">
                <div class="grouphead">Ancillary Areas (SF)</div>
                <div class="fieldsareawhead label125">
                  <div class="form-group row">
                    <label>Type of Basement</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="basement_type" id="basementType" value="<?php echo $appraisals->getBasement_type(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Storage Bsmt. (SF)*</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" name="storage_basement_sf" id="storage_basement_sf" value="<?php echo $appraisals->getStorage_basement_sf(); ?>"/>
                  </div>
                  <div class="form-group">* Excluded from GBA or GLA / NRA </div>
                  <div class="form-group row">
                    <label>Ancillary Area (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" name="ancillary_area_sf" value="<?php echo $appraisals->getAncillary_area_sf(); ?>"/>
                  </div>
                  <div class="form-group row padding-0">
                    <label>Description</label>
                    <textarea class="form-control _formUpdate" rows="3" style="height: 74px;" name="ancillary_area_desc"><?php echo $appraisals->getAncillary_area_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow">
              <div class="groupsection col-3 padding-0 label200">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Year(s) Built</label>
                    <input type="text" class="form-control _formUpdate _bmtxtfield" name="year_built" id="yearbt" value="<?php echo $appraisals->getYear_built(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Most Recent Renovation Year</label>
                    <input type="text" list="YBlastReno" class="form-control _formUpdate _bmtxtfield" name="last_renovation" id="lastreno" value="<?php echo $appraisals->getLast_renovation(); ?>"/>
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
                    <label>Number of Units</label>
                    <input type="text" class="form-control calc no_units _formUpdate _ppgc _fm00t _bmtxtfield" name="no_units" id="no_units" value="<?php echo $appraisals->getNo_units(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Number of Tenants</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t _bmtxtfield" name="no_tenants" value="<?php echo $appraisals->getNo_tenants(); ?>"/>
                  </div>
                  <div class="form-group row _sfres">
                    <label>No. of Bedrooms</label>
                    <input type="text" class="form-control sfbedroom _bmtxtfield _formUpdate _ppgc _fm00t" name="sfbedroom" value="<?php echo $appraisals->getSfbedroom(); ?>"/>
                  </div>
                  <div class="form-group row _sfres">
                    <label>No. of Bathrooms (Full)</label>
                    <input type="text" class="form-control sffullbath _bmtxtfield _formUpdate _ppgc _fm00t" name="sffullbath" value="<?php echo $appraisals->getSffullbath(); ?>"/>
                  </div>
                  <div class="form-group row _sfres">
                    <label>No. of Bathrooms (Half)</label>
                    <input type="text" class="form-control sfhalfbath _bmtxtfield _formUpdate _ppgc _fm00t" name="sfhalfbath" value="<?php echo $appraisals->getSfhalfbath(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="groupsection col-3 padding-0 label150">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Building Quality</label>
                    <select class="form-select _formUpdate _bms3field" name="building_quality" id="bQuality">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' data-tselect='<?php echo $conditionData[$s]["definition"]; ?>' <?php if ( $appraisals->getBuilding_quality() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Building Class</label>
                    <select class="form-select _formUpdate _bms3field" name="building_class" id="bClass">
                      <?php
                      for ( $s = 0; $s < count( $bclassData ); $s++ ) {
                        ?>
                      <option value='<?php echo $bclassData[$s]["id"]; ?>' data-tselect='<?php echo $bclassData[$s]["definition"]; ?>' <?php if ( $appraisals->getBuilding_class() == $bclassData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $bclassData[$s]["definition"];?> </option>
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
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' <?php if ( $appraisals->getInt_condition() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Exterior Condition</label>
                    <select class="form-select _formUpdate _bms3field" name="ext_condition" id="extCond">
                      <?php
                      for ( $s = 0; $s < count( $conditionData ); $s++ ) {
                        ?>
                      <option value='<?php echo $conditionData[$s]["id"]; ?>' data-tselect='<?php echo $conditionData[$s]["definition"]; ?>' <?php if ( $appraisals->getExt_condition() == $conditionData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $conditionData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="groupsection col-3 padding-0 label175">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Occupancy Type</label>
                    <select class="form-select _formUpdate _bms3field" name="occupancy_type" id="occupanceType">
                      <?php
                      for ( $s = 0; $s < count( $occupancyTypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $occupancyTypeData[$s]["id"]; ?>' data-tselect='<?php echo $occupancyTypeData[$s]["definition"];?>' <?php if ( $appraisals->getOccupancy_type() == $occupancyTypeData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $occupancyTypeData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Construction Class</label>
                    <select class="form-select _formUpdate _bms3field" name="const_class">
                      <?php
                      for ( $s = 0; $s < count( $cclassData ); $s++ ) {
                        ?>
                      <option value='<?php echo $cclassData[$s]["id"]; ?>' <?php if ( $appraisals->getConst_class() == $cclassData[$s]["id"] ) { ?>selected='selected'
                                                                <?php 
            																        }
            																        ?> > <?php echo $cclassData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Construction Description</label>
                    <input type="text" list="codescrip" class="form-control _formUpdate _bmtxtfield" name="const_descr" id="constDesc" value="<?php echo $appraisals->getConst_descr(); ?>"/>
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
                    <label>Other Construction Features</label>
                    <input type="text" list="confealist" class="form-control _formUpdate _bmtxtfield" name="other_const_features" id="constFeature" value="<?php echo $appraisals->getOther_const_features(); ?>"/>
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
                    <textarea class="form-control _formUpdate _bmtxtfield" rows="2" name="addstructures"><?php echo $appraisals->getAddstructures(); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="groupsection col-3 padding-0 label175">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>No. of Parking Stalls</label>
                    <input type="text" class="form-control _formUpdate calc parking_stalls _ppgc _fm00t" name="parking_stalls" id="parking_stalls" value="<?php echo $appraisals->getParking_stalls(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Type of Parking</label>
                    <select class="form-select _formUpdate _bms3field" name="parking_type">
                      <?php
                      for ( $s = 0; $s < count( $parkingTypeData ); $s++ ) {
                        ?>
                      <option value='<?php echo $parkingTypeData[$s]["id"]; ?>' <?php
            																        if ( $appraisals->getParking_type() == $parkingTypeData[$s]["id"] ) {
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
                    <input type="text" id="parkratnra" readonly class="form-control _formUpdate _ppgc _fm02t" name="parking_ratio_nra" value="<?php echo $appraisals->getParking_ratio_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Parking Ratio - GBA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm02t" id="parkratgba" name="parking_ratio_gba" value="<?php echo $appraisals->getParking_ratio_gba(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Parking Ratio / Unit</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01t" id="parkratunit" name="parking_ratio_unit" value="<?php echo $appraisals->getParking_ratio_unit(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Parking Ratio - INPUT</label>
                    <input list="parratlist" class="form-control _formUpdate _bmtxtfield" name="parking_ratio" id="parking_ratio" value="<?php echo $appraisals->getParking_ratio(); ?>" />
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
            </div>
            <div class="grouprow padding-0">
              <div class="groupsection col-12 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label style="vertical-align: top;">Comments</label>
                    <textarea class="form-control _formUpdate" rows="5" name="building_comments"><?php echo $appraisals->getBuilding_comments(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Property Type Tab -->
          <div id="propertytype" class="tab-pane fade">
            <div class="grouprow PDOffice">
              <div class="col-12 groupsection padding-0 label140">
                <div class="fieldsarea">
                  <div class="form-group row padding-0" style="float: left; width: 32%;">
                    <label>Fire Sprinklers</label>
                    <select class="form-select _formUpdate _bms3field" name="off_fire_sprinkler">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
																        if ( $appraisals->getOff_fire_sprinkler() == $yesnoDataDesc[$s]["id"] ) {
																            ?>selected='selected'<?php 
																        }
																        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row padding-0" style="float: left; width: 33%">
                    <label>Type of HVAC Service</label>
                    <input type="text" list="offhvactype" class="form-control _formUpdate _bmtxtfield" name="off_type_hvac" value="<?php echo $appraisals->getOff_type_hvac() ?>" />
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
                  <div class="form-group row padding-0" style="float: right; width: 32%">
                    <label>Elevator Served?</label>
                    <select class="form-select _formUpdate _bms3field" name="off_elevator_service" id="off_elevator_service">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' data-tselect='<?php echo $yesnoDataDesc[$s]["definition"]; ?>' <?php
                												        if ( $appraisals->getOff_elevator_service() == $yesnoDataDesc[$s]["id"] ) {
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
            <div class="grouprow PDShopping">
              <div class="groupsection padding-0" style="width: 33%; float: left;">
                <div class="fieldsarea label190">
                  <div class="form-group row">
                    <label>Total Gross Building Area - (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t _bmtxtfield" name="shop_total_gba" value="<?php echo $appraisals->getShop_total_gba(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Total Gross Leasable Area - (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" name="shop_total_nra" value="<?php echo $appraisals->getShop_total_nra(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Anchor Space Included in GLA ?</label>
                    <select class="form-select _formUpdate" name="shop_achor_space_inc">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
                												        if ( $appraisals->getShop_achor_space_inc() == $yesnoDataDesc[$s]["id"] ) {
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
              <div class="groupsection padding-0" style="width: 33%; float: left;">
                <div class="fieldsarea label225">
                  <div class="form-group row">
                    <label>In-Line Retail Space - GLA Only (SF)</label>
                    <input type="text" class="form-control _formUpdate calc shop_inline_sf _ppgc _fm00t _bmtxtfield" name="shop_inline_sf" id="shop_inline_sf" value="<?php echo $appraisals->getShop_inline_sf(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>In-Line Retail Space - GLA Only (%)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="totinlinepct" name="shop_inline_pct" value="<?php echo $appraisals->getShop_anchor_pct(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Total Anchor Tenant GLA (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t _bmtxtfield" id="achorsfcalc" name="shop_anchor_sf" value="<?php echo $appraisals->getShop_anchor_sf(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Anchor Space - GLA Only (%)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="anchorpctcalc" name="shop_anchor_pct" value="<?php echo $appraisals->getShop_anchor_pct(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="groupsection padding-0" style="width: 33%; float: right;">
                <div class="fieldsarea label130 textfields">
                  <div class="form-group">
                    <label>Anchor Tenant Names</label>
                    <textarea class="form-control _formUpdate _bmtxtfield" rows="4" name="shop_anchor_tenant" id="shop_anchor_tenant"><?php echo $appraisals->getShop_anchor_tenant(); ?></textarea>
                  </div>
                  <div class="form-group padding-0">
                    <label>Other Major Tenants</label>
                    <textarea class="form-control _formUpdate _bmtxtfield" rows="4" name="shop_other_tenant" id="shop_other_tenant"><?php echo $appraisals->getShop_other_tenant(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDCstore">
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Canopy?</label>
                    <select class="form-select _formUpdate" id="isCanopy" name="store_canopy">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
	                												        if ( $appraisals->getStore_canopy() == $yesnoDataDesc[$s]["id"] ) {
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
                    <input type="text" class="form-control _formUpdate" name="store_canopy_desc" id="store_canopy_desc" value="<?php echo $appraisals->getStore_canopy_desc(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Number of Fuel Dispensers</label>
                    <input type="number" step="1" class="form-control _formUpdate" name="store_no_fuel" id="store_no_fuel" value="<?php echo $appraisals->getStore_no_fuel(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Fuel Dispensers Description</label>
                    <input type="text" class="form-control _formUpdate" name="store_fuel_desc" value="<?php echo $appraisals->getStore_fuel_desc(); ?>" />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Average Monthly Gallonage</label>
                    <input type="text" class="form-control _formUpdate calc store_avg_month_gallon _ppgc _fm00t" name="store_avg_month_gallon" id="store_avg_month_gallon" value="<?php echo $appraisals->getStore_avg_month_gallon(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly C-Store Sales</label>
                    <input type="text" class="form-control _formUpdate calc alertstore_month_store_sales _ppgc _cfm00t" name="store_month_store_sales" id="store_month_store_sales" value="<?php echo $appraisals->getStore_month_store_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly Car Wash Sales</label>
                    <input type="text" class="form-control _formUpdate calc store_month_car_wash_sales _ppgc _cfm00t" name="store_month_car_wash_sales" value="<?php echo $appraisals->getStore_month_car_wash_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Monthly Mini-Lube Sales</label>
                    <input type="text" class="form-control _formUpdate calc store_month_mini_sales _ppgc _cfm00t" name="store_month_mini_sales" value="<?php echo $appraisals->getStore_month_mini_sales(); ?>" />
                  </div>
                  <div class="form-group row _sergas">
                    <label>Total Monthly Sales (Ex. Fuel)</label>
                    <input type="text" class="form-control _formUpdate calc store_total_month_sales _ppgc _cfm00t" id="mosalescalc" name="store_total_month_sales" value="<?php echo $appraisals->getStore_total_month_sales(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label125">
                  <div class="form-group row">
                    <label>Chain Affiliate</label>
                    <input type="text" class="form-control _formUpdate" name="store_chain_affil" value="<?php echo $appraisals->getStore_chain_affil(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Co-Chain Affiliate</label>
                    <input type="text" class="form-control _formUpdate" name="store_co_chain_affil" value="<?php echo $appraisals->getStore_co_chain_affil(); ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDService">
              <div class="col-6 groupsection padding-0">
                <div class="fieldsarea label190">
                  <div class="form-group row">
                    <label>Level of Service</label>
                    <select class="form-select _formUpdate" name="veh_level">
                      <?php
                      for ( $s = 0; $s < count( $lvlserviceData ); $s++ ) {
                        ?>
                      <option value='<?php echo $lvlserviceData[$s]["id"]; ?>' <?php
	                												        if ( $appraisals->getVeh_level() == $lvlserviceData[$s]["id"] ) {
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
                    <input type="number" step="1" class="form-control _formUpdate calc veh_tunnel" name="veh_tunnel" id="veh_tunnel" value="<?php echo $appraisals->getVeh_tunnel(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Service Area (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" id="svcareacalc" name="veh_service_sf" value="<?php echo $appraisals->getVeh_service_sf() ?>" readonly/>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Showroom / Office Area (SF)</label>
                    <input type="text" class="form-control _formUpdate calc veh_showroom_sf _ppgc _fm00t" name="veh_showroom_sf" id="veh_showroom_sf" value="<?php echo $appraisals->getVeh_showroom_sf(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Showroom - % of GBA</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="showroompctcalc" name="veh_showroom_pct" value="<?php echo $appraisals->getVeh_showroom_pct(); ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDFood">
              <div class="col-12 groupsection padding-0">
                <div class="fieldsarea label125">
                  <div class="form-group row" style="width: 24%; float: left;">
                    <label>No. of Seats</label>
                    <input type="text" class="form-control _formUpdate" name="rest_no_seats" value="<?php echo $appraisals->getRest_no_seats(); ?>" />
                  </div>
                  <div class="form-group row" style="width: 24%; float: left;">
                    <label>Drive Through?</label>
                    <select class="form-select _formUpdate" name="rest_drive_thru">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $appraisals->getRest_drive_thru() == $yesnoDataDesc[$s]["id"] ) {
            												            ?>selected='selected'<?php 
            												        }
            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row" style="width: 24%; float: left;">
                    <label>Is Alcohol Served?</label>
                    <select class="form-select _formUpdate" name="rest_alcohol">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $appraisals->getRest_alcohol() == $yesnoDataDesc[$s]["id"] ) {
            												            ?>selected='selected'<?php 
            												        }
            												        ?> ><?php echo $yesnoDataDesc[$s]["definition"];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row" style="width: 24%; float: right;">
                    <label>Playground?</label>
                    <select class="form-select _formUpdate" name="rest_playground">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
            												        if ( $appraisals->getRest_playground() == $yesnoDataDesc[$s]["id"] ) {
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
            <div class="grouprow PDIndustrial">
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Interior Office - Floor 1 (SF)</label>
                    <input type="text" class="form-control _formUpdate calc ind_int_office_1 _ppgc _fm00t _bmtxtfield" name="ind_int_office_1" value="<?php echo $appraisals->getInd_int_office_1(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Interior Office - Floor 2 (SF)</label>
                    <input type="text" class="form-control _formUpdate calc ind_int_office_2 _ppgc _fm00t" name="ind_int_office_2" value="<?php echo $appraisals->getInd_int_office_2(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Exterior Office - Floor 1 (SF)</label>
                    <input type="text" class="form-control _formUpdate calc ind_ext_office_1 _ppgc _fm00t" name="ind_ext_office_1" value="<?php echo $appraisals->getInd_ext_office_1(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Exterior Office - Floor 2 (SF)</label>
                    <input type="text" class="form-control _formUpdate calc ind_ext_office_2 _ppgc _fm00t" name="ind_ext_office_2" value="<?php echo $appraisals->getInd_ext_office_2(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Total Office Build-Out (SF)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" id="totoffbosfcalc" name="ind_total_office" value="<?php echo $appraisals->getInd_total_office(); ?>" readonly />
                  </div>
                  <div class="form-group row">
                    <label>Percent Office Build-Out (%)</label>
                    <input type="text" class="form-control _formUpdate _ppgc _fm01tp" id="totoffbopctcalc" name="ind_pct_office" value="<?php echo $appraisals->getInd_pct_office(); ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label190">
                  <div class="form-group row">
                    <label>Clear Height (Feet)</label>
                    <input list="cheightlist" class="form-control _formUpdate _bmtxtfield" name="ind_clear_height" id="ind_clear_height" value="<?php echo $appraisals->getInd_clear_height(); ?>" />
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
                    <input list="tdRamp" class="form-control _formUpdate _bmtxtfield" name="ind_truck_grade" id="ind_truck_grade" value="<?php echo $appraisals->getInd_truck_grade(); ?>"/>
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
                    <input list="tdDock" class="form-control _formUpdate _bmtxtfield" name="ind_truck_dock" id="ind_truck_dock" value="<?php echo $appraisals->getInd_truck_dock(); ?>"/>
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
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Type of Whse HVAC</label>
                    <input list="hvaclist" class="form-control _formUpdate _bmtxtfield" name="ind_hvac" value="<?php echo $appraisals->getInd_hvac(); ?>" />
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
                    <select class="form-select _formUpdate _bms3field" name="ind_fire" id="ind_fire">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' data-tselect='<?php echo $yesnoDataDesc[$s]["definition"];?>' <?php
		            												        if ( $appraisals->getInd_fire() == $yesnoDataDesc[$s]["id"] ) {
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
                    <select class="form-select _formUpdate" id="railds" name="ind_rail">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' data-tselect='<?php echo $yesnoDataDesc[$s]["definition"];?>' <?php
		            												        if ( $appraisals->getInd_rail() == $yesnoDataDesc[$s]["id"] ) {
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
                    <input type="text" class="form-control _formUpdate" name="ind_no_rail" value="<?php echo $appraisals->getInd_no_rail(); ?>" />
                  </div>
                  <div class="form-group row">
                    <label>Storage Mezzanine?</label>
                    <select class="form-select _formUpdate" id="mezzsf" name="ind_storage_mess">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getInd_storage_mess() == $yesnoDataDesc[$s]["id"] ) {
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
                    <input type="text" class="form-control _formUpdate _ppgc _fm00t" name="ind_storage_mezz_sf" id="ind_storage_mezz_sf" value="<?php echo $appraisals->getInd_storage_mezz_sf(); ?>" />
                  </div>
                  <div class="form-group row _stormz">
                    <label>Mezzanine Description</label>
                    <textarea class="form-control _formUpdate" name="ind_mezz_desc"><?php echo $appraisals->getInd_mezz_desc(); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDMini">
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label125">
                  <div class="form-group row">
                    <label>Coded Access?</label>
                    <select class="form-select _formUpdate" name="ss_code_access">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_code_access() == $yesnoDataDesc[$s]["id"] ) {
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
                    <select class="form-select _formUpdate" name="ss_alarm">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_alarm() == $yesnoDataDesc[$s]["id"] ) {
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
                    <select class="form-select _formUpdate" name="ss_heat">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_heat() == $yesnoDataDesc[$s]["id"] ) {
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
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label125">
                  <div class="form-group row">
                    <label>Security Cameras?</label>
                    <select class="form-select _formUpdate" name="ss_security">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_security() == $yesnoDataDesc[$s]["id"] ) {
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
                    <select class="form-select _formUpdate" name="ss_boat">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_boat() == $yesnoDataDesc[$s]["id"] ) {
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
                    <select class="form-select _formUpdate" name="ss_on_site">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_on_site() == $yesnoDataDesc[$s]["id"] ) {
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
              <div class="col-4 groupsection padding-0">
                <div class="fieldsarea label175">
                  <div class="form-group row">
                    <label>Manager Residence?</label>
                    <select class="form-select _formUpdate" id="manres" name="ss_residence">
                      <?php
                      for ( $s = 0; $s < count( $yesnoDataDesc ); $s++ ) {
                        ?>
                      <option value='<?php echo $yesnoDataDesc[$s]["id"]; ?>' <?php
		            												        if ( $appraisals->getSs_residence() == $yesnoDataDesc[$s]["id"] ) {
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
                    <input type="text" class="form-control _formUpdate" name="ss_residence_desc" value="<?php echo $appraisals->getSs_residence_desc(); ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="grouprow PDMHP">
              <div class="col-9 groupsection padding-0">
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
                        <input type="text" class="form-control calc _ppgc mf_no_single _fm00t" name="mf_no_single" id="mf_no_single" value="<?php echo $appraisals->getMf_no_single(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control _ppgc _cfm00t" style="width: 100%" name="mf_sw_low_rent" id="mf_sw_low_rent" value="<?php echo $appraisals->getMf_sw_low_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_sw_high_rent _cfm00t" style="width: 100%" name="mf_sw_high_rent" id="mf_sw_high_rent" value="<?php echo $appraisals->getMf_sw_high_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_sw_avg_rent _cfm00t" style="width: 100%" name="mf_sw_avg_rent" id="mf_sw_avg_rent" value="<?php echo $appraisals->getMf_sw_avg_rent(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row label225" style="margin: 0px;">
                    <div class="col-6 padding-0">
                      <div class="form-group row">
                        <label>No. of Double-Wides</label>
                        <input type="text" class="form-control calc _ppgc mf_no_double _fm00t" name="mf_no_double" id="mf_no_double" value="<?php echo $appraisals->getMf_no_double(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control _ppgc _cfm00t" style="width: 100%" name="mf_dw_low_rent" id="mf_dw_low_rent" value="<?php echo $appraisals->getMf_dw_low_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_dw_high_rent _cfm00t" style="width: 100%" name="mf_dw_high_rent" id="mf_dw_high_rent" value="<?php echo $appraisals->getMf_dw_high_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 padding-0">
                      <div class="form-group">
                        <input type="text" class="form-control calc _ppgc mf_dw_avg_rent _cfm00t" style="width: 100%" name="mf_dw_avg_rent" id="mf_dw_avg_rent" value="<?php echo $appraisals->getMf_dw_avg_rent(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row label225" style="margin: 0px;">
                    <div class="col-6 padding-0">
                      <div class="form-group row">
                        <label>No. of Triple-Wides</label>
                        <input type="text" class="form-control calc _ppgc mf_no_triple _fm00t" name="mf_no_triple" id="mf_no_triple" value="<?php echo $appraisals->getMf_no_triple(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control _ppgc _cfm00t" style="width: 100%" name="mf_tw_low_rent" id="mf_tw_low_rent" value="<?php echo $appraisals->getMf_tw_low_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_tw_high_rent _cfm00t" style="width: 100%" name="mf_tw_high_rent" id="mf_tw_high_rent" value="<?php echo $appraisals->getMf_tw_high_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_tw_avg_rent _cfm00t" style="width: 100%" name="mf_tw_avg_rent" id="mf_tw_avg_rent" value="<?php echo $appraisals->getMf_tw_avg_rent(); ?>"/>
                      </div>
                    </div>
                  </div>
                  <div class="row label225" style="margin: 0px;">
                    <div class="col-6 padding-0">
                      <div class="form-group row">
                        <label>No. of RV Spaces</label>
                        <input type="text" class="form-control calc _ppgc mf_no_rv_spaces _fm00t" name="mf_no_rv_spaces" id="mf_no_rv_spaces" value="<?php echo $appraisals->getMf_no_rv_spaces(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control _ppgc _cfm00t" style="width: 100%" name="mf_rv_low_rent" id="mf_rv_low_rent" value="<?php echo $appraisals->getMf_rv_low_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_rv_high_rent _cfm00t" style="width: 100%" name="mf_rv_high_rent" id="mf_rv_high_rent" value="<?php echo $appraisals->getMf_rv_high_rent(); ?>"/>
                      </div>
                    </div>
                    <div class="col-2 padding-0">
                      <div class="form-group row">
                        <input type="text" class="form-control calc _ppgc mf_rv_avg_rent _cfm00t" style="width: 100%" name="mf_rv_avg_rent" id="mf_rv_avg_rent" value="<?php echo $appraisals->getMf_rv_avg_rent(); ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-3 groupsection label175 padding-0">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Total Spaces</label>
                    <input type="text" class="form-control calc _ppgc mf_total_spaces _fm00t" id="mftotalspots" name="mf_total_spaces" value="<?php echo $appraisals->getMf_total_spaces(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Max High Rent</label>
                    <input type="text" class="form-control _ppgc _cfm00t" name="mf_high_rent" id="maxrent" value="<?php echo $appraisals->getMf_high_rent(); ?>" readonly/>
                  </div>
                  <div class="form-group row">
                    <label>Total Avg. Rent</label>
                    <input type="text" class="form-control _ppgc _cfm00t" id="mftotavgrent" name="mf_total_avg_rent" value="<?php echo $appraisals->getMf_total_avg_rent(); ?>" readonly/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Land Sales Tab -->
          <div id="land-sales" class="tab-pane fade table-section">
            <div class="fieldsarea">
              <h2>Land Sale Comparables <span class="pull-right"> <a style='cursor:pointer;' class="btn golden-btn _clonecompsAction" data-type="land_sales" >Copy Selected Comps To Report</a> <a style="cursor:pointer" class="itemUp" data-type="land_sales"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="land_sales"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
              <div class="table-responsive">
                <input type="hidden" name="land_db" id="land_salesIDs" class='_formUpdate' value="<?php echo $appraisals->getLand_db(); ?>"/>
                <table class="table _table" id="land_sales_table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">No.</th>
                      <th style="width: 50px;">Thumb</th>
                      <th style="width: 250px;">Property Name<br>
                        Address</th>
                      <th style="width: 200px;">City<br>
                        Submarket</th>
                      <th style="width: 200px;">Property Type<br>
                        Subtype<br>
                        Zoning Code</th>
                      <th style="text-align:center">Net Usable SF<br>
                        Net Usable Acres</th>
                      <th style="text-align:center">Recording Date<br>
                        Sale Status</th>
                      <th style="text-align:center">Adj. $ / SF<br>
                        Net Land</th>
                      <th style="text-align:center">Adj. $ / SF<br>
                        Max FAR</th>
                      <th style="text-align:center">Unit Density<br>
                        / Net Area</th>
                      <th style="text-align:center">Bulk Lot Price<br>
                        / Lot or Unit</th>
                      <th style="text-align:center">Finished<br>
                        Lot Size</th>
                      <th style="text-align:center">Sale Price<br>
                        / Net Acre</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="" data-coords='<?php echo json_encode(array("lat"=>0,"lng"=>0)); ?>' style='display:none;'>
                      <td data-type='sequence' class='selectable'></td>
                      <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href=''><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                      <td data-property='property_name,address' class='selectable' style='width: 200px, word-wrap:break-word;'></td>
                      <td data-property='city,submarket' class='selectable'></td>
                      <td data-property='propertytype,subtype,zoning_code' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                      <td data-property='net_usable_sf,net_usable_acre' class='selectable' align='center'></td>
                      <td data-property='record_date,sale_status' class='selectable' align='center'></td>
                      <td data-property='adj_price_sf_net' class='selectable' align='center'></td>
                      <td data-property='adj_price_sf_far' class='selectable' align='center'></td>
                      <td data-property='unit_density_net_acre' class='selectable' align='center'></td>
                      <td data-property='bulk_price_lot' class='selectable' align='center'></td>
                      <td data-property='finish_lot_size_sf' class='selectable' align='center'></td>
                      <td data-property='adj_price_acre_net' class='selectable' align='center'></td>
                    </tr>
                    <?php
                    if ( count( $landrecords ) > 0 ) {
                      for ( $l = 0; $l < count( $landrecords ); $l++ ) {
                        // set up a row for each record
                        ?>
                    <tr id="<?php echo $landrecords[$l]['id']; ?>" data-coords='<?php echo json_encode(array("lat"=>$landrecords[$l]['lat'],"lng"=>$landrecords[$l]['lng'])); ?>'>
                      <td data-type='sequence' class='selectable'><?php echo ($l+1); ?></td>
                      <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $landrecords[$l]['photo1']; ?>'><img data-property='thumbnail' src='/cards/comp_images/<?php echo $landrecords[$l]['thumbnail']; ?>' height='32' style='height:32px;'/></a></td>
                      <td data-property='property_name,address' class='selectable' style='width: 200px, word-wrap:break-word;'><?php echo $landrecords[$l]['property_name']; ?><br>
                        <?php echo $landrecords[$l]['address']; ?></td>
                      <td data-property='city,submarket' class='selectable'><?php echo $landrecords[$l]['city']; ?><br>
                        <?php echo $landrecords[$l]['submarket']; ?></td>
                      <td data-property='propertytype,subtype,zoning_code' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $landrecords[$l]['propertytype']; ?><br>
                        <?php echo $landrecords[$l]['subtype']; ?><br>
                        <?php echo $landrecords[$l]['zoning_code']; ?></td>
                      <td data-property='net_usable_sf,net_usable_acre' class='selectable' align='center'><?php echo $landrecords[$l]['net_usable_sf']; ?><br>
                        <?php echo $landrecords[$l]['net_usable_acre']; ?></td>
                      <td data-property='record_date,sale_status' class='selectable' align='center'><?php echo $landrecords[$l]['record_date']; ?><br>
                        <?php echo $landrecords[$l]['sale_status']; ?></td>
                      <td data-property='adj_price_sf_net' class='selectable' align='center'><?php echo $landrecords[$l]['adj_price_sf_net']; ?></td>
                      <td data-property='adj_price_sf_far' class='selectable' align='center'><?php echo $landrecords[$l]['adj_price_sf_far']; ?></td>
                      <td data-property='unit_density_net_acre' class='selectable' align='center'><?php echo $landrecords[$l]['unit_density_net_acre']; ?></td>
                      <td data-property='bulk_price_lot' class='selectable' align='center'><?php echo $landrecords[$l]['bulk_price_lot']; ?></td>
                      <td data-property='finish_lot_size_sf' class='selectable' align='center'><?php echo $landrecords[$l]['finish_lot_size_sf']; ?></td>
                      <td data-property='adj_price_acre_net' class='selectable' align='center'><?php echo $landrecords[$l]['adj_price_acre_net']; ?></td>
                    </tr>
                    <?php
                    }
                    }
                    // if there are no records in the database, display an alert message
                    else {
                      echo "You have no selected Land Sale Comparables.";
                    }

                    ?>
                  </tbody>
                </table>
              </div>
              <div class="col-12 grouprow padding-0"> <a class="btn golden-btn newWindow" data-type="landselect" >Select Land Sale(s)</a> <a class="btn golden-btn newWindow" data-type="land_sales" >Create New Land Sale</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="land_sales">Edit Land Sale</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="land_sales">Remove Land Sale</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtnImages" data-spreview='0' data-type="land_sales" data-ttype='land-sales' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'>Map Page Summary</a>
                <?php //data-bs-toggle="modal" data-target="#moveLandSalesModal" ?>
              </div>
              <div class="col-12 grouprow">
                <div class="col-7 row" style='margin-left: 4px;' id="LandWordwriteup">
                  <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                    <div class="form-group row" style="width: 85%;">
                      <label>Comp Write-up(s):</label>
                      <select class="form-select" name="landwordtemplate" id="_exportlsTemplate">
                        <?php
                        for ( $s = 0; $s < count( $landtemplateData ); $s++ ) {
                          ?>
                        <option value='<?php echo $landtemplateData[$s]["id"]; ?>' data-tpath='<?php echo $landtemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getLandwordtemplate() == $landtemplateData[$s]["id"] ) { ?>selected='selected'
																		<?php 
																	}
																	?> > <?php echo $landtemplateData[$s]["templatename"];?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <a style='cursor:pointer;' class='_generateReportWordBtn' data-spreview='0' data-ttype='land-sales' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                  <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                    <div class="form-group row" style="width: 85%;">
                      <label>Excel Chart(s):</label>
                      <select class="form-select _formUpdate" name="landexceltemplate" id='_landExcelTemplate'>
                        <?php
                        for ( $s = 0; $s < count( $landextemplateData ); $s++ ) {
                          ?>
                        <option value='<?php echo $landextemplateData[$s]["id"]; ?>' data-tpath='<?php echo $landextemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getLandexceltemplate() == $landextemplateData[$s]["id"] ) { ?>selected='selected'
																		<?php 
																	}
																	?> > <?php echo $landextemplateData[$s]["templatename"];?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='land-sales' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                </div>
                <div class="col-7 row" style='margin-left: 4px;' id="LandEDWordwriteup">
                  <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                    <div class="form-group row" style="width: 85%;">
                      <label>ROW Write-up(s):</label>
                      <select class="form-select _formUpdate" id='_landemdomw'>
                        <option data-tpath="">Select Template</option>
                        <option data-tpath="landindcommrow.php">Industrial / Commercial</option>
                        <option data-tpath="landagrow.php">Agriculture</option>
                        <option data-tpath="homesiterow.php">Rural Homesite</option>
                        <option data-tpath="reshomerow.php">Residential Homesite</option>
                      </select>
                    </div>
                    <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='landemdomw' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                  <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                    <div class="form-group row" style="width: 85%;">
                      <label>ROW Excel Chart(s):</label>
                      <select class="form-select _formUpdate" id='_landemdome'>
                        <option data-tpath="">Select Template</option>
                        <option data-tpath="indcommrow.php">Industrial / Commercial</option>
                        <option data-tpath="indcommfarrow.php">Industrial / Commercial FAR</option>
                        <option data-tpath="agriculturalrow.php">Agricultural</option>
                        <option data-tpath="homesiterow.php">Rural Homesite</option>
                        <option data-tpath="reshomerow.php">Residential Homesite</option>
                        <option data-tpath="ruralrow.php">Rural Land</option>
                        <option data-tpath="ruralugbrow.php">Rural UGB Land</option>
                        <option data-tpath="sfresrow.php">Single-Family Residential</option>
                        <option data-tpath="sfbulkrow.php">Single-Family Bulk Land</option>
                        <option data-tpath="mfresrow.php">Multi-Family Residential</option>
                        <option data-tpath="retailpadrow.php">Retail Pad</option>
                      </select>
                    </div>
                    <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='landsalesrow' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                </div>
                <div class="col-5 grouprow padding-0 label125">
                  <div class="form-group row" style="width: 450px;">
                    <label>Data Analysis Type:</label>
                    <select class="form-select _formUpdate" name="daltemplate" id='_dalTemplate'>
                      <?php
                      for ( $s = 0; $s < count( $dalandtemplateData ); $s++ ) {
                        ?>
                      <option value='<?php echo $dalandtemplateData[$s]["id"]; ?>' data-tpath='<?php echo $dalandtemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getDaltemplate() == $dalandtemplateData[$s]["id"] ) { ?>selected='selected'
                                                                    <?php 
																}
																?> > <?php echo $dalandtemplateData[$s]["templatename"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='land-sales' data-id='<?php echo str_replace(" ","",$appraisals->getLand_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
              </div>
              <div class="grouprow padding-0">
                <div style="font-family: Calibri"> Your file will automatically download below.</div>
              </div>
            </div>
            <div class="grouprow" style="display: block;">
              <div class="fieldsarea">
                <div id="map-canvas-land_sales"></div>
              </div>
            </div>
          </div>
          <!-- Improved Sales Tab -->
          <div id="improved-sales" class="tab-pane fade">
            <div class="col-12 padding-0">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#salecomps" role="tab">Improved Sales Comps</a> </li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#capratecomps" role="tab">Cap Rate Comps</a> </li>
              </ul>
              <div class="tab-content inner-tab-content">
                <div id="salecomps" class="tab-pane active table-section">
                  <div class="fieldsarea">
                    <h2>Improved Sale Comparables <span class="pull-right"> <a style='cursor:pointer;' class="btn golden-btn _clonecompsAction" data-type="improved_sales" >Copy Selected Comps To Report</a> <a style='cursor:pointer;' class="btn golden-btn _copycompsAction" data-type="improved_sales" data-target='caprate'>Copy To Cap Rates</a> <a style="cursor:pointer" class="itemUp" data-type="improved_sales"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="improved_sales"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                    <div class="table-responsive">
                      <input type="hidden" name="improved_db" id="improved_salesIDs" class='_formUpdate' value="<?php echo $appraisals->getImproved_db(); ?>"/>
                      <table class="table _table" id="improved_sales_table">
                        <thead>
                          <tr>
                            <th >No.</th>
                            <th >Thumb</th>
                            <th style="width: 200px;" >Property Name<br>
                              Address</th>
                            <th style="width: 150px;" >City<br>
                              Submarket</th>
                            <th style="width: 150px;" >Property Type<br>
                              Subtype</th>
                            <th style="text-align:center" >Year Built<br>
                              (Renovated)</th>
                            <th style="width: 100px;text-align:center" >Total GBA (SF)<br>
                              Const. Desc.</th>
                            <th style="text-align:center" >Parking Ratio<br>
                              &#35; of Stories</th>
                            <th style="text-align:center" >Recording Date<br>
                              Sale Status</th>
                            <th style="text-align:center" >Adj. $ / SF<br>
                              NRA &#47; GLA</th>
                            <th style="text-align:center" >&#37; Office<br>
                              Build-out</th>
                            <th style="text-align:center" >$ &#47; Unit</th>
                            <th style="width: 70px;text-align:center" >SCR</th>
                            <th style="text-align:center" >Cap Rate</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="" data-coords='<?php echo json_encode(array("lat"=>0,"lng"=>0));?>' style='display:none;'>
                            <td class='selectable' data-type='sequence' ></td>
                            <td data-type='thumb' ><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='' ><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='parking_ratio,no_stories' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'></td>
                            <td data-property='record_date,sale_status' class='selectable' align='center'></td>
                            <td data-property='adj_price_sf_nra' class='selectable' align='center'></td>
                            <td data-property='ind_pct_office' class='selectable' align='center'></td>
                            <td data-property='adj_price_unit' class='selectable' align='center'></td>
                            <td data-property='site_cover_primary' class='selectable' align='center'></td>
                            <td data-property='cap_rate' class='selectable' align='center'></td>
                          </tr>
                          <?php
                          if ( count( $impsales ) > 0 ) {
                            for ( $u = 0; $u < count( $impsales ); $u++ ) {
                              // set up a row for each record
                              ?>
                          <tr id="<?php echo $impsales[$u]['id']; ?>" data-coords='<?php echo json_encode(array("lat"=>$impsales[$u]['lat'],"lng"=>$impsales[$u]['lng']));?>'>
                            <td class='selectable' data-type='sequence'><?php echo ($u+1); ?></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $impsales[$u]['photo1'];?>'><img data-property='thumbnail' src='/cards/comp_images/<?php echo $impsales[$u]['thumbnail'];?>' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $impsales[$u]['property_name'];?><br>
                              <?php echo $impsales[$u]['address'];?></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $impsales[$u]['city'];?><br>
                              <?php echo $impsales[$u]['submarket'];?></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $impsales[$u]['propertytype'];?><br>
                              <?php echo $impsales[$u]['subtype'];?></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $impsales[$u]['year_built'];?><br>
                              <?php echo $impsales[$u]['last_renovation'];?></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $impsales[$u]['overall_gba'];?><br>
                              <?php echo $impsales[$u]['const_descr'];?></td>
                            <td data-property='parking_ratio,no_stories' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><?php echo $impsales[$u]['parking_ratio'];?><br>
                              <?php echo $impsales[$u]['no_stories'];?></td>
                            <td data-property='record_date,sale_status' class='selectable' align='center'><?php echo $impsales[$u]['record_date'];?><br>
                              <?php echo $impsales[$u]['sale_status'];?></td>
                            <td data-property='adj_price_sf_nra' class='selectable' align='center'><?php echo $impsales[$u]['adj_price_sf_nra'];?></td>
                            <td data-property='ind_pct_office' class='selectable' align='center'><?php echo $impsales[$u]['ind_pct_office'];?></td>
                            <td data-property='adj_price_unit' class='selectable' align='center'><?php echo $impsales[$u]['adj_price_unit'];?></td>
                            <td data-property='site_cover_primary' class='selectable' align='center'><?php echo $impsales[$u]['site_cover_primary'];?></td>
                            <td data-property='cap_rate' class='selectable' align='center'><?php echo $impsales[$u]['cap_rate'];?></td>
                          </tr>
                          <?php
                          }
                          }
                          // if there are no records in the database, display an alert message
                          else {
                            echo "You have no selected Improved Sale Comparables.";
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 grouprow padding-0"> <a class="btn golden-btn newWindow" data-type="impselect" >Select Improved Sale(s)</a> <a class="btn golden-btn newWindow" data-type="improved_sales">Create New Improved Sale</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="improved_sales">Edit Improved Sale</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="improved_sales">Remove Improved Sale</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtnImages" data-spreview='0' data-type="improved_sales" data-ttype='improved-sales' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'>Photo Page Summary</a> </div>
                    <div class="col-12 grouprow">
                      <div class="col-7 row" style='margin-left: 4px;' id="ImpWordwriteup">
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Comp Write-up(s):</label>
                            <select class="form-select _formUpdate" name="impwordtemplate" id='_exportTemplate'>
                              <?php
                              for ( $s = 0; $s < count( $imptemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $imptemplateData[$s]["id"]; ?>' data-tpath='<?php echo $imptemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getImpwordtemplate() == $imptemplateData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
																}
																?> > <?php echo $imptemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a class='_generateReportWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='improved-sales' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Excel Chart(s):</label>
                            <select class="form-select _formUpdate" name="impexceltemplate" id='_impExcelTemplate'>
                              <?php
                              for ( $s = 0; $s < count( $impextemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $impextemplateData[$s]["id"]; ?>' data-tpath='<?php echo $impextemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getImpexceltemplate() == $impextemplateData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
																}
																?> > <?php echo $impextemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='improved-sales' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                      </div>
                      <div class="col-7 row" style='margin-left: 4px;' id="ImpEDWordwriteup">
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>ROW Write-up(s):</label>
                            <select class="form-select _formUpdate" id='_impemdomw'>
                              <option data-tpath="">Select Template</option>
                              <option data-tpath="impoffrow.php">Office</option>
                            </select>
                          </div>
                          <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='impemdomw' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>ROW Excel Chart(s):</label>
                            <select class="form-select _formUpdate" id='_impemdome'>
                              <option data-tpath="">Select Template</option>
                              <option data-tpath="carwashrow.php">Car Wash</option>
                              <option data-tpath="cstoregasrow.php">C-Store / Gas Station</option>
                              <option data-tpath="commsinglerow.php">Commercial - Single Tenant</option>
                              <option data-tpath="commmultirow.php">Commercial - Multi Tenant</option>
                              <option data-tpath="churchschoolrow.php">Church / School</option>
                              <option data-tpath="dealershiprow.php">Dealership</option>
                              <option data-tpath="industrialrow.php">Industrial</option>
                              <option data-tpath="miniluberow.php">Mini Lube</option>
                              <option data-tpath="mobilehomerow.php">Mobile Home Park</option>
                              <option data-tpath="multifamrow.php">Multi Family</option>
                              <option data-tpath="officerow.php">Office</option>
                              <option data-tpath="servicerow.php">Service / Repair Station</option>
                              <option data-tpath="sfresidentrow.php">Single Family Residence</option>
                              <option data-tpath="shoppingrow.php">Shopping Center</option>
                              <option data-tpath="storagerow.php">Storage Facility</option>
                            </select>
                          </div>
                          <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='impsalesrow' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                      </div>
                      <div class="col-5 grouprow padding-0 label125">
                        <div class="form-group row" style="width: 450px;">
                          <label>Data Analysis Type:</label>
                          <select class="form-select _formUpdate" name="daitemplate" id='_daTemplate'>
                            <?php
                            for ( $s = 0; $s < count( $daitemplateData ); $s++ ) {
                              ?>
                            <option value='<?php echo $daitemplateData[$s]["id"]; ?>' data-tpath='<?php echo $daitemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getDaitemplate() == $daitemplateData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
																}
																?> > <?php echo $daitemplateData[$s]["templatename"];?> </option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='improved-sales' data-id='<?php echo str_replace(" ","",$appraisals->getImproved_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                    </div>
                    <div class="grouprow padding-0">
                      <div style="font-family: Calibri"> Your file will automatically download below.</div>
                    </div>
                  </div>
                  <div class="grouprow" style="display: block;">
                    <div class="fieldsarea">
                      <div id="map-canvas-improved_sales"></div>
                    </div>
                  </div>
                </div>
                <div id="capratecomps" class="tab-pane fade table-section">
                  <div class="fieldsarea">
                    <h2>Cap Rate Comparables <span class="pull-right"> <a style='cursor:pointer;' class="btn golden-btn _clonecompsAction" data-type="caprate" >Copy Selected Comps To Report</a> <a style="cursor:pointer" class="itemUp" data-type="caprate"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="caprate"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                    <div class="table-responsive">
                      <input type="hidden" name="caprate_db" id="caprateIDs" class='_formUpdate' value="<?php echo $appraisals->getCaprate_db(); ?>"/>
                      <table class="table _table" id="caprate_table">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Thumb</th>
                            <th style="width: 200px;">Property Name<br>
                              Address</th>
                            <th style="width: 150px;">City<br>
                              Submarket</th>
                            <th style="width: 150px;">Property Type<br>
                              Subtype</th>
                            <th style="text-align:center">Year Built<br>
                              (Renovated)</th>
                            <th style="width: 100px;text-align:center">Total GBA (SF)<br>
                              Const. Desc.</th>
                            <th style="text-align:center">Parking Ratio<br>
                              &#35; of Stories</th>
                            <th style="text-align:center">Recording Date<br>
                              Sale Status</th>
                            <th style="text-align:center">Adj. $ / SF<br>
                              NRA &#47; GLA</th>
                            <th style="text-align:center">&#37; Office<br>
                              Build-out</th>
                            <th style="text-align:center">$ &#47; Unit</th>
                            <th style="width: 70px;text-align:center">SCR</th>
                            <th style="text-align:center">Cap Rate</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="" style='display:none;'>
                            <td class='selectable' data-type='sequence' ></td>
                            <td data-type='thumb' ><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='' ><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='parking_ratio,no_stories' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'></td>
                            <td data-property='record_date,sale_status' class='selectable' align='center'></td>
                            <td data-property='adj_price_sf_nra' class='selectable' align='center'></td>
                            <td data-property='ind_pct_office' class='selectable' align='center'></td>
                            <td data-property='adj_price_unit' class='selectable' align='center'></td>
                            <td data-property='site_cover_primary' class='selectable' align='center'></td>
                            <td data-property='cap_rate' class='selectable' align='center'></td>
                          </tr>
                          <?php
                          if ( count( $caprecords ) > 0 ) {
                            for ( $j = 0; $j < count( $caprecords ); $j++ ) {
                              // set up a row for each record
                              ?>
                          <tr id="<?php echo $caprecords[$j]['id']; ?>">
                            <td data-type='sequence' class='selectable' ><?php echo ($j+1); ?></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $caprecords[$j]['photo1']; ?>'><img data-property='thumbnail'  src='/cards/comp_images/<?php echo $caprecords[$j]['thumbnail']; ?>' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $caprecords[$j]['property_name']; ?><br>
                              <?php echo $caprecords[$j]['address']; ?></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $caprecords[$j]['city']; ?><br>
                              <?php echo $caprecords[$j]['submarket']; ?></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $caprecords[$j]['propertytype']; ?><br>
                              <?php echo $caprecords[$j]['subtype']; ?></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $caprecords[$j]['year_built']; ?><br>
                              <?php echo $caprecords[$j]['last_renovation']; ?></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $caprecords[$j]['overall_gba']; ?><br>
                              <?php echo $caprecords[$j]['const_descr']; ?></td>
                            <td data-property='parking_ratio,no_stories' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><?php echo $caprecords[$j]['parking_ratio']; ?><br>
                              <?php echo $caprecords[$j]['no_stories']; ?></td>
                            <td data-property='record_date,sale_status' class='selectable' align='center'><?php echo $caprecords[$j]['record_date']; ?><br>
                              <?php echo $caprecords[$j]['sale_status']; ?></td>
                            <td data-property='adj_price_sf_nra' class='selectable' align='center'><?php echo $caprecords[$j]['adj_price_sf_nra']; ?></td>
                            <td data-property='ind_pct_office' class='selectable' align='center'><?php echo $caprecords[$j]['ind_pct_office']; ?></td>
                            <td data-property='adj_price_unit' class='selectable' align='center'><?php echo $caprecords[$j]['adj_price_unit']; ?></td>
                            <td data-property='site_cover_primary' class='selectable' align='center'><?php echo $caprecords[$j]['site_cover_primary']; ?></td>
                            <td data-property='cap_rate' class='selectable' align='center'><?php echo $caprecords[$j]['cap_rate']; ?></td>
                          </tr>
                          <?php
                          }
                          }
                          // if there are no records in the database, display an alert message
                          else {
                            echo "You have no selected Cap Rate Comparables.";
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 grouprow padding-0"> <a class="btn golden-btn newWindow" data-type="capselect">Select Cap Rate(s)</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="caprate">Edit Cap Rate Comparable</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="caprate">Remove Cap Rate</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtn" data-spreview='0' data-type='caprate' data-ttype='caprate' data-id='<?php echo str_replace(" ","",$appraisals->getCaprate_db()); ?>'>Cap Rates Template</a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Leases Tab -->
          <div id="leases" class="tab-pane fade">
            <div class="col-12 padding-0">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#leasecomps" role="tab">Lease Comps</a> </li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#addleases" role="tab">Additional Lease Comps</a> </li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#misccomps" role="tab">Miscellaneous Comps</a> </li>
              </ul>
              <div class="tab-content inner-tab-content">
                <div id="leasecomps" class="tab-pane active table-section">
                  <div class="fieldsarea">
                    <h2>Lease Comparables <span class="pull-right"> <a style='cursor:pointer;' class="btn golden-btn _clonecompsAction" data-type="leases" >Copy Selected Comps To Report</a> <a style='cursor:pointer;' class="btn golden-btn _copycompsAction" data-type="leases" data-target='miscrent'>Copy to Misc. Rents</a> <a style="cursor:pointer" class="itemUp" data-type="leases"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="leases"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                    <div class="table-responsive">
                      <input type="hidden" name="lease_db" id="leaseIDs" class='_formUpdate' value="<?php echo $appraisals->getLease_db(); ?>"/>
                      <table class="table _table" id="leases_table">
                        <thead>
                          <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="width: 50px;">Thumb</th>
                            <th style="width: 200px;">Property Name<br>
                              Address</th>
                            <th style="width: 200px;">City<br>
                              Submarket</th>
                            <th style="width: 200px;">Property Type<br>
                              Subtype</th>
                            <th style="text-align:center; width: 125px;">Year Built<br>
                              (Renovated)</th>
                            <th style="text-align:center">Overall GBA (SF)<br>
                              Const. Desc.</th>
                            <th>Lessee Name<br>
                              Start Date</th>
                            <th style="text-align:center">Tenant<br>
                              Area (SF)</th>
                            <th style="text-align:center">Exp. Terms<br>
                              Adjust. To</th>
                            <th style="text-align:center">Eff. Rent SF / Mo. <br>
                              Shell / Office</th>
                            <th style="text-align:center">Eff. Rent SF / Mo. <br>
                              Blended</th>
                            <th style="text-align:center">Eff. Rent <br>
                              SF / Yr.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="" data-coords='<?php echo json_encode(array("lat"=>0,"lng"=>0)); ?>' style='display:none;'>
                            <td data-type='sequence' class='selectable'></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href=''><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center'></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='lessee_name,lease_start_date' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='tenant_area_sf' class='selectable' align='center'></td>
                            <td data-property='lease_expense_term,exp_term_adj' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_mo_shell,eff_rent_sf_mo_office' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_mo_blend' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_yr' class='selectable' align='center'></td>
                          </tr>
                          <?php
                          if ( count( $rentrecords ) > 0 ) {
                            for ( $r = 0; $r < count( $rentrecords ); $r++ ) {
                              // set up a row for each record
                              ?>
                          <tr id="<?php echo $rentrecords[$r]['id']; ?>" data-coords='<?php echo json_encode(array("lat"=>$rentrecords[$r]['lat'],"lng"=>$rentrecords[$r]['lng'])); ?>'>
                            <td data-type='sequence' class='selectable'><?php echo ($r+1); ?></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $rentrecords[$r]['photo1']; ?>'><img data-property='thumbnail' src='/cards/comp_images/<?php echo $rentrecords[$r]['thumbnail']; ?>' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $rentrecords[$r]['property_name']; ?><br>
                              <?php echo $rentrecords[$r]['address']; ?></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $rentrecords[$r]['city']; ?><br>
                              <?php echo $rentrecords[$r]['submarket']; ?></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $rentrecords[$r]['propertytype']; ?><br>
                              <?php echo $rentrecords[$r]['subtype']; ?></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center'><?php echo $rentrecords[$r]['year_built']; ?><br>
                              <?php echo $rentrecords[$r]['last_renovation']; ?></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $rentrecords[$r]['overall_gba']; ?><br>
                              <?php echo $rentrecords[$r]['const_descr']; ?></td>
                            <td data-property='lessee_name,lease_start_date' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $rentrecords[$r]['lessee_name']; ?><br>
                              <?php echo $rentrecords[$r]['lease_start_date']; ?></td>
                            <td data-property='tenant_area_sf' class='selectable' align='center'><?php echo $rentrecords[$r]['tenant_area_sf']; ?></td>
                            <td data-property='lease_expense_term,exp_term_adj' class='selectable' align='center'><?php echo $rentrecords[$r]['lease_expense_term']; ?><br>
                              <?php echo $rentrecords[$r]['exp_term_adj']; ?></td>
                            <td data-property='eff_rent_sf_mo_shell,eff_rent_sf_mo_office' class='selectable' align='center'><?php echo $rentrecords[$r]['eff_rent_sf_mo_shell']; ?><br>
                              <?php echo $rentrecords[$r]['eff_rent_sf_mo_office']; ?></td>
                            <td data-property='eff_rent_sf_mo_blend' class='selectable' align='center'><?php echo $rentrecords[$r]['eff_rent_sf_mo_blend']; ?></td>
                            <td data-property='eff_rent_sf_yr' class='selectable' align='center'><?php echo $rentrecords[$r]['eff_rent_sf_yr']; ?></td>
                          </tr>
                          <?php
                          }
                          }
                          // if there are no records in the database, display an alert message
                          else {
                            echo "No results to display!";
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 grouprow padding-0"> <a class="btn golden-btn newWindow" data-type='leaseselect'>Select Lease(s)</a> <a class="btn golden-btn newWindow" data-type='rent' >Create New Lease</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="leases">Edit Lease</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="leases">Remove Lease</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtnImages" data-type="lease" data-spreview='0' data-ttype='lease' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'>Photo Page Summary</a> </div>
                    <div class="col-12 grouprow padding-0 templateitem label125">
                      <div class="col-7 row" style='margin-left: 4px;' id="RentWordwriteup">
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Comp Write-up(s):</label>
                            <select class="form-select _formUpdate" name="leasewordtemplate" id="_exportlssTemplate">
                              <?php
                              for ( $s = 0; $s < count( $leasetemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $leasetemplateData[$s]["id"]; ?>' data-tpath='<?php echo $leasetemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getLeasewordtemplate() == $leasetemplateData[$s]["id"] ) { ?>selected='selected'
																						<?php 
																		}
																		?> > <?php echo $leasetemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a style='cursor:pointer;' class='_generateReportWordBtn' data-spreview='0' data-ttype='leases' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Excel Chart(s):</label>
                            <select class="form-select _formUpdate" name="leaseexceltemplate" id='_leaseExcelTemplate'>
                              <?php
                              for ( $s = 0; $s < count( $leasexceltemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $leasexceltemplateData[$s]["id"]; ?>' data-tpath='<?php echo $leasexceltemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getLeaseexceltemplate() == $leasexceltemplateData[$s]["id"] ) { ?>selected='selected'
																						<?php 
																		}
																		?> > <?php echo $leasexceltemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='leases' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                      </div>
                      <div class="col-7 row" style='margin-left: 4px;' id="RentEDWordwriteup">
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>ROW Write-up(s):</label>
                            <select class="form-select _formUpdate" id='_rentemdomw'>
                              <option data-tpath="">Select Template</option>
                              <option data-tpath="rentrowanchor.php">Anchor</option>
                              <option data-tpath="rentrowapartment.php">Apartment</option>
                              <option data-tpath="rentrowcarwash.php">Car Wash</option>
                              <option data-tpath="rentrowcommmulti.php">Multi Tenant Commercial</option>
                              <option data-tpath="rentrowcommsing.php">Single Tenant Commercial</option>
                              <option data-tpath="rentrowcommshop.php">Commercial Shopping Center</option>
                              <option data-tpath="rentrowdealer.php">Dealership</option>
                              <option data-tpath="rentrowhomepark.php">Mobile Home Park</option>
                              <option data-tpath="rentrowindustrial.php">Industrial</option>
                              <option data-tpath="rentrowindblendyr.php">Industrial (Blended SF / Yr)</option>
                              <option data-tpath="rentrowoffice.php">Office</option>
                              <option data-tpath="rentrowoffflex.php">Flex Office</option>
                              <option data-tpath="rentrowservice.php">Service and Repair</option>
                              <option data-tpath="rentrowstorage.php">Self-Storage</option>
                            </select>
                          </div>
                          <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='rentemdomw' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>ROW Excel Chart(s):</label>
                            <select class="form-select _formUpdate" id='_leaseemdome'>
                              <option data-tpath="">Select Template</option>
                              <option data-tpath="apartment.php">Apartments</option>
                              <option data-tpath="carwashrow.php">Car Wash</option>
                              <option data-tpath="anchorrow.php">Commercial Anchor Tenant</option>
                              <option data-tpath="commmultirow.php">Commercial Multi Tenant</option>
                              <option data-tpath="shoppingrow.php">Commercial Shopping Center</option>
                              <option data-tpath="singlerow.php">Commercial Single Tenant</option>
                              <option data-tpath="dealershiprow.php">Dealership - Alloc Imp</option>
                              <option data-tpath="dealeroverrow.php">Dealership - Overall</option>
                              <option data-tpath="industrialmorow.php">Industrial - Blended</option>
                              <option data-tpath="industrialyrrow.php">Industrial - Blended (SF / Yr)</option>
                              <option data-tpath="industrialrow.php">Industrial - Shell</option>
                              <option data-tpath="mobile.php">Mobile Home Park</option>
                              <option data-tpath="officerow.php">Office</option>
                              <option data-tpath="officeflexrow.php">Office Flex</option>
                              <option data-tpath="ministorage.php">Self or Mini Storage</option>
                              <option data-tpath="servicerow.php">Service and Repair</option>
                            </select>
                          </div>
                          <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='leasserow' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                      </div>
                      <div class="col-5 grouprow padding-0 label125">
                        <div class="form-group row" style="width: 450px;">
                          <label>Data Analysis Type:</label>
                          <select class="form-select _formUpdate" name="dartemplate" id='_darTemplate'>
                            <?php
                            for ( $s = 0; $s < count( $dartemplateData ); $s++ ) {
                              ?>
                            <option value='<?php echo $dartemplateData[$s]["id"]; ?>' data-tpath='<?php echo $dartemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getDartemplate() == $dartemplateData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
																}
																?> > <?php echo $dartemplateData[$s]["templatename"];?> </option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='leases' data-id='<?php echo str_replace(" ","",$appraisals->getLease_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                    </div>
                    <div class="grouprow padding-0">
                      <div style="font-family: Calibri"> Your file will automatically download below.</div>
                    </div>
                  </div>
                  <div class="grouprow" style="display: block;">
                    <div class="fieldsarea">
                      <div id="map-canvas-leases"></div>
                    </div>
                  </div>
                </div>
                <div id="addleases" class="tab-pane fade table-section">
                  <div class="fieldsarea">
                    <h2>Additional Lease Comparables <span class="pull-right"> <a style="cursor:pointer" class="itemUp" data-type="xtrarents"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="xtrarents"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                    <div class="table-responsive">
                      <input type="hidden" name="xtrarents" id="xtrarentsIDs" class='_formUpdate' value="<?php echo $appraisals->getXtrarents(); ?>"/>
                      <table class="table _table" id="xtrarents_table">
                        <thead>
                          <tr>
                            <th style="width: 50px;">No.</th>
                            <th style="width: 50px;">Thumb</th>
                            <th style="width: 200px;">Property Name<br>
                              Address</th>
                            <th style="width: 200px;">City<br>
                              Submarket</th>
                            <th style="width: 200px;">Property Type<br>
                              Subtype</th>
                            <th style="text-align:center; width: 125px;">Year Built<br>
                              (Renovated)</th>
                            <th style="text-align:center">Overall GBA (SF)<br>
                              Const. Desc.</th>
                            <th>Lessee Name<br>
                              Start Date</th>
                            <th style="text-align:center">Tenant<br>
                              Area (SF)</th>
                            <th style="text-align:center">Exp. Terms<br>
                              Adjust. To</th>
                            <th style="text-align:center">Eff. Rent SF / Mo. <br>
                              Shell / Office</th>
                            <th style="text-align:center">Eff. Rent SF / Mo. <br>
                              Blended</th>
                            <th style="text-align:center">Eff. Rent <br>
                              SF / Yr.</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="" data-coords='<?php echo json_encode(array("lat"=>0,"lng"=>0)); ?>' style='display:none;'>
                            <td data-type='sequence' class='selectable'></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href=''><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center'></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='lessee_name,lease_start_date' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='tenant_area_sf' class='selectable' align='center'></td>
                            <td data-property='lease_expense_term,exp_term_adj' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_mo_shell,eff_rent_sf_mo_office' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_mo_blend' class='selectable' align='center'></td>
                            <td data-property='eff_rent_sf_yr' class='selectable' align='center'></td>
                          </tr>
                          <?php
                          if ( count( $addrentrecords ) > 0 ) {
                            for ( $r = 0; $r < count( $addrentrecords ); $r++ ) {
                              // set up a row for each record
                              ?>
                          <tr id="<?php echo $addrentrecords[$r]['id']; ?>" data-coords='<?php echo json_encode(array("lat"=>$addrentrecords[$r]['lat'],"lng"=>$addrentrecords[$r]['lng'])); ?>'>
                            <td data-type='sequence' class='selectable'><?php echo ($r+1); ?></td>
                            <td data-type='thumb'><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $addrentrecords[$r]['photo1']; ?>'><img data-property='thumbnail' src='/cards/comp_images/<?php echo $addrentrecords[$r]['thumbnail']; ?>' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,address' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $addrentrecords[$r]['property_name']; ?><br>
                              <?php echo $addrentrecords[$r]['address']; ?></td>
                            <td data-property='city,submarket' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $addrentrecords[$r]['city']; ?><br>
                              <?php echo $addrentrecords[$r]['submarket']; ?></td>
                            <td data-property='propertytype,subtype' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $addrentrecords[$r]['propertytype']; ?><br>
                              <?php echo $addrentrecords[$r]['subtype']; ?></td>
                            <td data-property='year_built,last_renovation' class='selectable' align='center'><?php echo $addrentrecords[$r]['year_built']; ?><br>
                              <?php echo $addrentrecords[$r]['last_renovation']; ?></td>
                            <td data-property='overall_gba,const_descr' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $addrentrecords[$r]['overall_gba']; ?><br>
                              <?php echo $addrentrecords[$r]['const_descr']; ?></td>
                            <td data-property='lessee_name,lease_start_date' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $addrentrecords[$r]['lessee_name']; ?><br>
                              <?php echo $addrentrecords[$r]['lease_start_date']; ?></td>
                            <td data-property='tenant_area_sf' class='selectable' align='center'><?php echo $addrentrecords[$r]['tenant_area_sf']; ?></td>
                            <td data-property='lease_expense_term,exp_term_adj' class='selectable' align='center'><?php echo $addrentrecords[$r]['lease_expense_term']; ?><br>
                              <?php echo $addrentrecords[$r]['exp_term_adj']; ?></td>
                            <td data-property='eff_rent_sf_mo_shell,eff_rent_sf_mo_office' class='selectable' align='center'><?php echo $addrentrecords[$r]['eff_rent_sf_mo_shell']; ?><br>
                              <?php echo $addrentrecords[$r]['eff_rent_sf_mo_office']; ?></td>
                            <td data-property='eff_rent_sf_mo_blend' class='selectable' align='center'><?php echo $addrentrecords[$r]['eff_rent_sf_mo_blend']; ?></td>
                            <td data-property='eff_rent_sf_yr' class='selectable' align='center'><?php echo $addrentrecords[$r]['eff_rent_sf_yr']; ?></td>
                          </tr>
                          <?php
                          }
                          }
                          // if there are no records in the database, display an alert message
                          else {
                            echo "No results to display!";
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 grouprow padding-0"> <a class="btn golden-btn newWindow" data-type='addleaseselect'>Select Lease(s)</a> <a class="btn golden-btn newWindow" data-type='addrent' >Create New Lease</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="xtrarents">Edit Lease</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="xtrarents">Remove Lease</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtnImages" data-type="xtrarents" data-spreview='0' data-ttype='xtrarents' data-id='<?php echo str_replace(" ","",$appraisals->getXtrarents()); ?>'>Photo Page Summary</a> </div>
                    <div class="col-12 grouprow padding-0 templateitem label125">
                      <div class="col-7 row" style='margin-left: 4px;'>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Comp Write-up(s):</label>
                            <select class="form-select _formUpdate" name="addrentwordtemp" id="_exportaddleaseTemplate">
                              <?php
                              for ( $s = 0; $s < count( $leasetemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $leasetemplateData[$s]["id"]; ?>' data-tpath='<?php echo $leasetemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getAddrentwordtemp() == $leasetemplateData[$s]["id"] ) { ?>selected='selected'
																						<?php 
																		}
																		?> > <?php echo $leasetemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a style='cursor:pointer;' class='_generateReportWordBtn' data-spreview='0' data-ttype='xtrarents' data-id='<?php echo str_replace(" ","",$appraisals->getXtrarents()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                        <div class="grouprow padding-0 label125" style='width: calc(50% - 4px);'>
                          <div class="form-group row" style="width: 85%;">
                            <label>Excel Chart(s):</label>
                            <select class="form-select _formUpdate" name="addrentextemp" id='_addleaseExcelTemplate'>
                              <?php
                              for ( $s = 0; $s < count( $leasexceltemplateData ); $s++ ) {
                                ?>
                              <option value='<?php echo $leasexceltemplateData[$s]["id"]; ?>' data-tpath='<?php echo $leasexceltemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getAddrentextemp() == $leasexceltemplateData[$s]["id"] ) { ?>selected='selected'
																						<?php 
																		}
																		?> > <?php echo $leasexceltemplateData[$s]["templatename"];?> </option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <a class='_generateReportExcelBtn' style='cursor:pointer;' data-spreview='0' data-ttype='xtrarents' data-id='<?php echo str_replace(" ","",$appraisals->getXtrarents()); ?>'><img src="../img/excel-icon.png" border='0' /></a> </div>
                      </div>
                      <div class="col-5 grouprow padding-0 label125">
                        <div class="form-group row" style="width: 450px;">
                          <label>Data Analysis Type:</label>
                          <select class="form-select _formUpdate" name="adddartemplate" id='_adddarTemplate'>
                            <?php
                            for ( $s = 0; $s < count( $adddartemplateData ); $s++ ) {
                              ?>
                            <option value='<?php echo $adddartemplateData[$s]["id"]; ?>' data-tpath='<?php echo $adddartemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getAdddartemplate() == $adddartemplateData[$s]["id"] ) { ?>selected='selected'
                                                                                <?php 
																}
																?> > <?php echo $adddartemplateData[$s]["templatename"];?> </option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <a class='_generateDataAnalysis' style='cursor:pointer;' data-spreview='0' data-ttype='xtrarents' data-id='<?php echo str_replace(" ","",$appraisals->getXtrarents()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                    </div>
                    <div class="grouprow padding-0">
                      <div style="font-family: Calibri"> Your file will automatically download below.</div>
                    </div>
                  </div>
                </div>
                <div id="misccomps" class="tab-pane fade table-section">
                  <div class="fieldsarea">
                    <h2>Miscellaneous Comparables <span class="pull-right"> <a style='cursor:pointer;' class="btn golden-btn _clonecompsAction" data-type="miscrent" >Copy Selected Comps To Report</a> <a style="cursor:pointer" class="itemUp" data-type="miscrent"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a> <a style="cursor:pointer" class="itemDown" data-type="miscrent"> <i class="fa fa-arrow-down" aria-hidden="true"></i> </a> </span> </h2>
                    <div class="table-responsive">
                      <input type="hidden" name="miscrent_db" id="miscrentIDs" class='_formUpdate' value="<?php echo $appraisals->getMiscrent_db(); ?>"/>
                      <table class="table _table" id="miscrent_table">
                        <thead>
                          <tr>
                            <th style="width: 40px;">No.</th>
                            <th style="width: 80px;">Thumb</th>
                            <th style="width: 200px;">Property Name<br>
                              Lessee</th>
                            <th>Address</th>
                            <th style="width: 150px;text-align:center">Start Date<br>
                              Lease Term</th>
                            <th style="width: 80px;text-align:center">Yard<br>
                              Area (SF)</th>
                            <th style="width: 200px;text-align:center">Yard<br>
                              Improvements</th>
                            <th style="width: 150px;text-align:center">Yard Rent<br>
                              ($ / SF / Mo.)</th>
                            <th style="width: 100px;text-align:center">Other Rent<br>
                              Tenant</th>
                            <th style="width: 100px;text-align:center">Other Rent<br>
                              Type</th>
                            <th style="width: 100px;text-align:center">Rental<br>
                              Rate ($ / Mo.)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="" style='display:none;'>
                            <td data-type='sequence' class='selectable' style='display:none;'></td>
                            <td data-type='thumb' ><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href=''><img data-property='thumbnail' src='' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,lessee_name' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='address,city,state' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='lease_start,term' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='yard_sf' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='desc_yard_space' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='yard_rent' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'></td>
                            <td data-property='or_tenant' class='selectable' align='center' style='white-space: nowrap; border-left:solid 1px #ccc; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='ortypes' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'></td>
                            <td data-property='other_rent_sf_mo' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'></td>
                          </tr>
                          <?php
                          if ( count( $miscrecords ) > 0 ) {
                            for ( $m = 0; $m < count( $miscrecords ); $m++ ) {
                              // set up a row for each record
                              ?>
                          <tr id="<?php echo $miscrecords[$m]['id']; ?>">
                            <td data-type='sequence' class='selectable'><?php echo ($m+1); ?></td>
                            <td data-type='thumb' ><a data-property='photo1' style='cursor:pointer; margin:0px; height:auto; width:auto;' rel='lightbox[property]' class='thumbnail' href='/cards/comp_images/<?php echo $miscrecords[$m]['photo1']; ?>'><img data-property='thumbnail' src='/cards/comp_images/<?php echo $miscrecords[$m]['thumbnail']; ?>' height='32' style='height:32px;'/></a></td>
                            <td data-property='property_name,lessee_name' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['property_name']; ?><br>
                              <?php echo $miscrecords[$m]['lessee_name']; ?></td>
                            <td data-property='address,city,state' class='selectable' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['address']; ?><br>
                              <?php echo $miscrecords[$m]['city']; ?>, <?php echo $miscrecords[$m]['state']; ?></td>
                            <td data-property='lease_start,term' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['lease_start']; ?><br>
                              <?php echo $miscrecords[$m]['term']; ?></td>
                            <td data-property='yard_sf' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['yard_sf']; ?></td>
                            <td data-property='desc_yard_space' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['desc_yard_space']; ?></td>
                            <td data-property='yard_rent' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><?php echo $miscrecords[$m]['yard_rent']; ?></td>
                            <td data-property='or_tenant' class='selectable' align='center' style='white-space: nowrap; border-left:solid 1px #ccc; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['or_tenant']; ?></td>
                            <td data-property='ortypes' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;max-width:1px;'><?php echo $miscrecords[$m]['ortypes']; ?></td>
                            <td data-property='other_rent_sf_mo' class='selectable' align='center' style='white-space: nowrap; text-overflow:ellipsis; overflow: hidden;'><?php echo $miscrecords[$m]['other_rent_sf_mo']; ?></td>
                          </tr>
                          <?php
                          }
                          }
                          // if there are no records in the database, display an alert message
                          else {
                            echo "No results to display!";
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-12 row" style="margin-left: 4px;">
                      <div class="col-7 padding-0 groupsection"><a class="btn golden-btn newWindow" data-type='miscrentselect'>Select Misc. Rent(s)</a> <a style='cursor:pointer;' class="btn golden-btn _editAction" data-type="miscrent">Edit Misc. Rent Comparable</a> <a style='cursor:pointer;' class="btn golden-btn _removeAction" data-type="miscrent">Remove Misc. Rent</a> <a style='cursor:pointer;' class="btn blue-btn _generateReportWordBtn" data-spreview='0' data-type='miscrent' data-ttype='miscrent' data-id='<?php echo str_replace(" ","",$appraisals->getMiscrent_db()); ?>'>Yard Rent Template</a></div>
                      <div class="col-5 grouprow padding-0 label125">
                        <div class="form-group row" style="width: 450px;">
                          <label>Other Rents:</label>
                          <select class="form-select" name="otrenttemplate" id='_exportorTemplate'>
                            <?php
                            for ( $s = 0; $s < count( $orrenttemplateData ); $s++ ) {
                              ?>
                            <option value='<?php echo $orrenttemplateData[$s]["id"]; ?>' data-tpath='<?php echo $orrenttemplateData[$s]["templatepath"]; ?>' <?php if ( $appraisals->getOtrenttemplate() == $orrenttemplateData[$s]["id"] ) { ?>selected='selected'
                                                                            <?php 
																}
																?> > <?php echo $orrenttemplateData[$s]["templatename"];?> </option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <a class='_generateReportWordBtn' style='cursor:pointer;' data-spreview='0' data-ttype='other_rent' data-id='<?php echo str_replace(" ","",$appraisals->getMiscrent_db()); ?>'><img src="../img/word-icon.png" border='0' /></a> </div>
                    </div>
                  </div>
                </div>
              </div>
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
              <div class="col-2 groupsection" style="align-content: center;"> <a class="myButton" id="onePhotoTemp">One Column Template</a> <a class="myButton" id="twoPhotoTemp">Two Column Template</a> </div>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="cloneCompsModal" aria-labelledby="moveCompasModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Clone Comps</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <form onsubmit='return false;'>
              <p>Enter all or part of the report name to clone the selected comps to.  Then select the reports and click the Clone button.</p>
              <input type='text' class='_rep-name'/>
              <input type='submit' class='_search_reports' name='serchen' value='Search Reports'/>
            </form>
            <div class='_results_reports'> </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-continue _clonecompsConfirm disabled">Clone</button>
            <!--            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--> 
            <!--            <button type="button" class="btn golden-btn _clonecompsConfirm disabled">Clone</button>--> 
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="cloneModal" aria-labelledby="cloneModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm Clone</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-continue disabled _proceed">Proceed</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="copyModal" aria-labelledby="copyModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm Move</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-continue disabled _proceed">Proceed</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
$(".navbar-collapse a").click(function () {
  $(".navbar-collapse").collapse("hide");
});
</script>
</body>
</html>