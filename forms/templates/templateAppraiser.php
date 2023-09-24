<!doctype html>
<html>
<head>
<title>Appraiser Information</title>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/cardsformbs4.css">
<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="../js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="../js/bootstrap-4.2.1.js"></script> 
<script type="text/javascript" src="../js/lightbox.js"></script> 
<script type="text/javascript" src="../js/rbe_engine.js"></script> 
<script type="text/javascript" src="../js/aa_engine.js"></script> 
<script type="text/javascript" src="../js/baseController.js"></script> 
<script type="text/javascript" src="../js/appraiserController.js"></script> 
<script type="text/javascript" src="../js/imageController.js"></script> 
<script type="text/javascript">
        $( function () {
            aa_engine = new _aa_engine();

            appraiserController = new _appraiserController( {
                activeObject: "appraiserController",
                id: <?php echo $appraiser->getId(); ?>,
                <?php
					if(isset($appraiserData)){
					?>
                data: <?php echo json_encode($appraiserData,JSON_UNESCAPED_UNICODE); ?>
                <?php
					}
					?>
            } );

            appraiserController.init();

            imageController = new _imageController( {
                activeObject: "imageController",
                id: <?php echo $appraiser->getId(); ?>
            } );

            imageController.init();
        } );
    </script>
<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    background-color: #3fb44f;
    border: 1px solid #ccc;
    display: table;
    padding: 6px 12px;
    cursor: pointer;
    color: #FFFFFF;
    margin: auto;
}
img {
    max-width: 100%;
    max-height: 250px;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>

<body>
<div class="mainpage">
  <section class="comp-form-data">
    <form enctype="multipart/form-data" method="post">
      <button type="submit" onclick="return false;" style="display:none;"></button>
      <div class="row padding-0"  style="margin-right: 0px; margin-left: 5px;"> 
        <!-- Appraiser Tabs -->
          <div class="col-11 padding-0">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#appraiserdata" role="tab">Appraiser</a> </li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#licenseData" role="tab">License Information</a> </li>
        </ul>
          </div>
          <div class="col-1">
            <input type="submit" name="submit" class="submit" value="Save Appraiser">
          </div>
      </div>
        <div class="tab-content">
          <div id="appraiserdata" class="tab-pane active" role="tabpanel">
            <div class="grouprow">
              <div class="col-4 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>aa Valuation</label>
                    <input type="checkbox" class="form-control checkbox _formUpdate" name="maincomp" id="mycompany" value="1" <?php if ($appraiser->getMaincomp()==1) echo 'checked="checked"'; ?> />
                  </div>
                  <div class="form-group row">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="compname" id="compname" value="<?php echo $appraiser->getCompname(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Address</label>
                    <input type="text" class="form-control" name="compaddress" id="compaddress" value="<?php echo $appraiser->getCompaddress(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>City</label>
                    <input type="text" class="form-control" name="compcity" id="compcity" value="<?php echo $appraiser->getCompcity(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>State</label>
                    <input type="text" class="form-control" name="compstate" id="compstate" value="<?php echo $appraiser->getCompstate(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" name="compzip" id="compzip" value="<?php echo $appraiser->getCompzip(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phoneone" id="phoneone" value="<?php echo $appraiser->getPhoneone(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Fax Number</label>
                    <input type="text" class="form-control" name="faxnumber" id="faxnumber" value="<?php echo $appraiser->getFaxnumber(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Salutation</label>
                    <select class="form-control" name="salutation">
                      <?php
                      for ( $s = 0; $s < count( $salutationData ); $s++ ) {
                        ?>
                      <option value='<?php echo $salutationData[$s]["id"]; ?>' <?php if ( $appraiser->getSalutation() == $salutationData[$s]["id"] ) { ?>selected='selected'
																			<?php 
																		}
																		?> > <?php echo $salutationData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Name</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $appraiser->getFirstname(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Middle</label>
                    <input type="text" class="form-control" name="midname" value="<?php echo $appraiser->getMidname(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $appraiser->getLastname(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Designation</label>                      
                          <input type="text" list="desiglist" class="form-control" name="designation" value="<?php echo $appraiser->getDesignation(); ?>"/>
                          <datalist id="desiglist" >
                            <option value = "">
                            <option value = "MAI">
                            <option value = "SRA">
                            <option value = "MAI, AI-GRS">
                          </datalist>
                  </div>
                  <div class="form-group row">
                    <label>Title</label>
                    <select class="form-control" name="apptitle">
                      <?php
                      for ( $s = 0; $s < count( $apptitleData ); $s++ ) {
                        ?>
                      <option value='<?php echo $apptitleData[$s]["id"]; ?>' <?php if ( $appraiser->getApptitle() == $apptitleData[$s]["id"] ) { ?>selected='selected'
																			<?php 
																		}
																		?> > <?php echo $apptitleData[$s]["definition"];?> </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label>Cell Phone</label>
                    <input type="text" class="form-control" name="phonetwo" value="<?php echo $appraiser->getPhonetwo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Email</label>
                    <input type="text" class="form-control" name="emailaddress" value="<?php echo $appraiser->getEmailaddress(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label for="qu1" class="custom-file-upload">Qualifications</label>
                    <input type="file" id="qu1" name="qualifications" accept=".docx,application/msword"/>
                    <a href="../app_images/<?php echo $appraiser->getQualdoc(); ?>" target="new"> <?php echo $appraiser->getQualifications(); ?> </a>
                    <input type='hidden' name="quals" value="<?php echo $appraiser->getQualifications(); ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-4 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>Appraiser Notes</label>
                    <textarea class="form-control" rows="5" name="appnotes"><?php echo $appraiser->getAppnotes(); ?></textarea>
                  </div>
                  <div class="col-12 padding-5">
                    <div class="border-fields-section margin-0">
                      <div class="col-12 padding-0 imgPlc" id="digsignature">
						<div class="section-sig-width ">
                          <div class="content-section-bulding">
                            <?php if ($appraiser->getId() != '') { ?>
								<a href="../app_images/<?php echo $appraiser->getDig1(); ?>" rel='lightbox[property]'><img id="preview-sp1" src="../app_images/<?php echo $appraiser->getDig1();?>" width="100%" style='cursor:pointer;' data-type='property-photo' /></a>
                            <?php } else { ?>
								<img id="preview-sp1" src="../app_images/no-photo.jpg" width="100%" style='cursor:pointer;'/>
                            <?php } ?>
                          </div>
                          <div style='position:absolute; background-color:#3fb44f; right:4px; bottom:4px; display:none;' class='preview-sp1-panel'> <img src='../img/delete.png' style='padding:4px; cursor:pointer; float:left; display:none;' class='img-del' data-rel-photo-btn='sp1' data-container='digsignature'/> <img src='../img/edit.png' style='padding:4px; cursor:pointer; float:left;' class='img-edit' data-rel-photo-btn='sp1' data-container='digsignature'/> </div>
                          <div class="col-12" style='display:none;'>
								<label for="sp1" class="custom-file-upload">Digital Signature</label>
                          </div>
                          <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="digsignature" class="_photo"/>
                          <input type='hidden' name="digsig" value="<?php echo $appraiser->getDigsignature();?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="licenseData" class="tab-pane fade" role="tabpanel">
            <div class="grouprow">
              <div class="col-6 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>License Number</label>
                    <input type="text" class="form-control" name="licensenoone" value="<?php echo $appraiser->getLicensenoone(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>License State</label>
                    <input type="text" class="form-control" name="licensestateone" value="<?php echo $appraiser->getLicensestateone(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Expiration Date</label>
                    <input type="date" class="form-control" name="licenseexpone" value="<?php echo $appraiser->getLicenseexpone(); ?>"/>
                  </div>
                  <div class="col-12 padding-0">
                    <div class="section-inner-width imgPlc" id="licenseimageone">
                      <div class="content-section-bulding">
                        <?php if ($appraiser->getId() != '') { ?>
                        <a href="../app_images/<?php echo $appraiser->getLic1(); ?>" rel='lightbox[property]'><img id="preview-sp1" src="../app_images/<?php echo $appraiser->getLic1();?>" width="100%" style='cursor:pointer;' data-type='property-photo' /></a>
                        <?php } else { ?>
                        <img id="preview-sp1" src="../app_images/no-photo.jpg" width="100%" style='cursor:pointer;'/>
                        <?php } ?>
                      </div>
                      <div style='position:absolute; background-color:#3fb44f; right:4px; bottom:4px; display:none;' class='preview-sp1-panel'> <img src='../img/delete.png' style='padding:4px; cursor:pointer; float:left; display:none;' class='img-del' data-rel-photo-btn='sp2' data-container='licenseimageone'/> <img src='../img/edit.png' style='padding:4px; cursor:pointer; float:left;' class='img-edit' data-rel-photo-btn='sp2' data-container='licenseimageone'/> </div>
                      <div class="col-12" style='display:none;'>
                        <label for="sp2" class="custom-file-upload">License One</label>
                      </div>
                      <input id="sp2" type="file" accept="image/x-png,image/gif,image/jpeg" name="licenseimageone" class="_photo"/>
                      <input type='hidden' name="licone" value="<?php echo $appraiser->getLicenseimageone(); ?>"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 groupsection label100">
                <div class="fieldsarea">
                  <div class="form-group row">
                    <label>License Number</label>
                    <input type="text" class="form-control" name="licensenotwo" value="<?php echo $appraiser->getLicensenotwo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>License State</label>
                    <input type="text" class="form-control" name="licensestatetwo" value="<?php echo $appraiser->getLicensestatetwo(); ?>"/>
                  </div>
                  <div class="form-group row">
                    <label>Expiration Date</label>
                    <input type="date" class="form-control" name="licenseexptwo" value="<?php echo $appraiser->getLicenseexptwo(); ?>"/>
                  </div>
                  <div class="col-12 padding-0">
                    <div class="section-inner-width imgPlc" id="licenseimagetwo">
                      <div class="content-section-bulding" >
                        <?php if ($appraiser->getId() != '') { ?>
                        <a href="../app_images/<?php echo $appraiser->getLic2(); ?>" rel='lightbox[property]'> <img id="preview-sp1" src="../app_images/<?php echo $appraiser->getLic2();?>" width="100%" style='cursor:pointer;' data-type='property-photo' /> </a>
                        <?php } else { ?>
                        <img id="preview-sp1" src="../app_images/no-photo.jpg" width="100%" style='cursor:pointer;'/>
                        <?php } ?>
                      </div>
                      <div style='position:absolute; background-color:#3fb44f; right:4px; bottom:4px; display:none;' class='preview-sp1-panel'> 
						<img src='../img/delete.png' style='padding:4px; cursor:pointer; float:left; display:none;' class='img-del' data-rel-photo-btn='sp3' data-container='licenseimagetwo'/> 
						<img src='../img/edit.png' style='padding:4px; cursor:pointer; float:left;' class='img-edit' data-rel-photo-btn='sp3' data-container='licenseimagetwo'/> 
					  </div>
                      <div class="col-12" style='display:none;'>
                        <label for="sp3" class="custom-file-upload">License Two</label>
                      </div>
                      <input id="sp3" type="file" accept="image/x-png,image/gif,image/jpeg" name="licenseimagetwo" class="_photo"/>
					   <input type='hidden' name="lictwo" value="<?php echo $appraiser->getLicenseimagetwo(); ?>"/>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
  </section>
</div>
</body>
</html>