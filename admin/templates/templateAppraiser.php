<!doctype html>
<html>
<head>
<title>Appraiser Information</title>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="../css/lightbox.css">
<link rel="stylesheet" type="text/css" href="../css/cardsformbs4.css">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<script type="text/javascript" src="../js/lightbox.js"></script> 
<script type="text/javascript" src="../js/rbe_engine.js"></script> 
<script type="text/javascript" src="../js/aa_engine.js"></script> 
<script type="text/javascript" src="../js/baseController.js"></script> 
<script type="text/javascript" src="../js/appraiserController.js"></script> 
<script type="text/javascript" src="../js/mapController.js"></script> 
<script type="text/javascript" src="../js/appimageController.js"></script> 
<script type="text/javascript">
        function readURL( input ) {
            if ( input.files && input.files[ 0 ] ) {
                var reader = new FileReader();
                reader.onload = function ( e ) {
                    imgId = '#preview-' + $( input ).attr( 'id' );
                    $( imgId ).attr( 'src', e.target.result );
                }
                reader.readAsDataURL( input.files[ 0 ] );
            }
        }

        function showPass() {
            var x = document.getElementById( "password" );
            if ( x.style.display === "none" ) {
                x.style.display = "inline-block";
            } else {
                x.style.display = "none";
            }
        }
    </script> 
<script type="text/javascript">
        $( function () {
            aa_engine = new _aa_engine();

            appraiserController = new _appraiserController( {
                activeObject: "appraiserController",
                id: <?php echo $appraiser->getId(); ?>,
                <?php
					if(isset($appraiserData)){
					?>
                appraiserData: <?php echo json_encode($appraiserData,JSON_UNESCAPED_UNICODE); ?>
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
    border-radius: 15px;
    border: 2px solid #74DC83;
    cursor: pointer;
    color: #FFFFFF;
    margin: auto;
    text-align: center;
}
.line {
    display: block;
    margin-top: 0px;
    margin-right: 0px;
    margin-left: 0px;
    margin-bottom: 25px
}
.line h2 {
    font-size: 25px;
    text-align: center;
    border-bottom: 1px solid #3fb44f;
    position: relative;
}
.line h2 span {
    background-color: white;
    position: relative;
    top: 12px;
    padding: 0 10px;
}
#userroles .imgPlc img {
    max-height: 65px;
}
.preview-sp1-panel img {
    margin: auto;
    float: right;
}
hr.solid {
    border-top: 2px solid #1e4959;
}
</style>
</head>

<body>
<?php include("../../../includes/header.php") ?>
<div class="mainpage">
  <form enctype="multipart/form-data" method="post">
    <button type="submit" onclick="return false;" style="display:none;"></button>
    <div class="col-12 row">
      <div class="col-11">
        <p><a href="admincp.php">Control Panel</a>&nbsp; &#8594; &nbsp; <a href="appraisers.php">Appraisers</a>&nbsp; &#8594; &nbsp; Appraiser Information</p>
      </div>
      <div class="col-1">
        <input type="submit" name="submit" class="submit" value="Save Appraiser">
      </div>
    </div>
    <span class="line">
    <h2><span>User Information</span></h2>
    </span>
    <div class="grouprow">
      <div class="col-6 groupsection label100">
        <div class="fieldsarea">
          <?php if ($appraiser->getId() != '') { ?>
          <input type="hidden" name="id" value="<?php echo $appraiser->getId(); ?>"/>
          <input type="hidden" name="reportID" value="<?php echo $appraiser->getId(); ?>"/>
          <?php } ?>
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
            <label>Phone</label>
            <input type="text" class="form-control" name="phoneone" id="phoneone" value="<?php echo $appraiser->getPhoneone(); ?>"/>
          </div>
          <div class="form-group row">
            <label>Cell Phone</label>
            <input type="text" class="form-control" name="phonetwo" value="<?php echo $appraiser->getPhonetwo(); ?>"/>
          </div>
          <div class="form-group row">
            <label>Email</label>
            <input type="text" class="form-control" name="emailaddress" value="<?php echo $appraiser->getEmailaddress(); ?>"/>
          </div>
        </div>
      </div>
      <div class="col-6 groupsection label100">
        <div class="fieldsarea">
          <div id="userinfo">
            <div class="form-group row">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $appraiser->getUsername(); ?>" required/>
            </div>
            <input type="hidden" value="<?php echo $appraiser->getPassword(); ?>" name="origpassword"/>
            <div class="form-group padding-5" style="width: 100%;">
              <?php if($appraiser->getId() !='') { ?>
              <label>
                <input type="button" onclick="showPass()" value="Reset Password" id="reset">
              </label>
              <input type="text" class="form-control" name="password" id="password" style="display: none;"/>
              <?php } else { ?>
              <label>Password</label>
              <input type="text" class="form-control" name="password"/>
              <?php } ?>
            </div>
          </div>
          <div id="userroles">
            <div style="width: 100%; text-align: center;">
				<p>User Access</p>
              <hr class="solid">
            </div>
            <div class="label125">
              <div class="col-4 form-group checked float-left">
                <label>Administrator</label>
                <input type="checkbox" class="form-control" name="isAdmin" value="1" <?php if ($appraiser->getIsAdmin()==1) echo 'checked="checked"'; ?> />
              </div>
              <div class="col-4 form-group checked float-left">
                <label>Power User</label>
                <input type="checkbox" class="form-control" name="isPowerUser" value="1" <?php if ($appraiser->getIsPowerUser()==1) echo 'checked="checked"'; ?> />
              </div>
              <div class="col-4 form-group checked float-left">
                <label>Read Only</label>
                <input type="checkbox" class="form-control" name="isReadOnly" value="1" <?php if ($appraiser->getIsReadOnly()==1) echo 'checked="checked"'; ?> />
              </div>
            </div>
            <div style="width: 100%; text-align: center;">
              <p>User Roles</p>
              <hr class="solid">
            </div>
            <div class="label125">
              <div class="col-4 form-group checked float-left">
                <label>Appraiser</label>
                <input type="checkbox" class="form-control" id="IsAppraiser" name="IsAppraiser" value="1" <?php if ($appraiser->getIsAppraiser()==1) echo 'checked="checked"'; ?> />
              </div>
              <div class="col-4 form-group checked float-left">
                <label>Appraiser Assistant</label>
                <input type="checkbox" class="form-control" id="IsAppAsst" name="IsAppAsst" value="1" <?php if ($appraiser->getIsAppAsst()==1) echo 'checked="checked"'; ?> />
              </div>
              <div class="col-4 form-group checked float-left">
                <input type="checkbox" name="isLockedOut" value="1" <?php if ($appraiser->getIsLockedOut()==1) echo 'checked="checked"'; ?> data-toggle="toggle" data-on="Locked-Out" data-off="Active" data-onstyle="danger" data-offstyle="success">
              </div>
            </div>
            <div style="width: 100%; text-align: center;">
              <p>Digital Signature</p>
              <hr class="solid">
            </div>
            <div class="form-group row imgPlc" style="margin-top: 25px;" id="digsignature">
              <div class="col-12" style='display:none;'>
                <label for="sp1">Digital Signature</label>
              </div>
              <div style="width: 100%; height: 75px; border: 2px solid #1e4959; border-radius: 10px; float: right;">
                <?php if ($appraiser->getId() != '') { ?>
                <a href="../app_images/<?php echo $appraiser->getDig1(); ?>" rel='lightbox[property]'><img id="preview-sp1" src="../app_images/<?php echo $appraiser->getDig1();?>" style='cursor:pointer;' data-type='apprdigsig' /></a>
                <?php } else { ?>
                <img id="preview-sp1" src="../app_images/no-photo.jpg" style='cursor:pointer;'/>
                <?php } ?>
              </div>
              <?php if($login_ro == 0) { ?>
              <div class='col-12 preview-sp1-panel'> <img src='../img/delete.png' style='padding:4px; cursor:pointer; float:right;' class='img-del' data-rel-photo-btn='sp1' data-link='digsig' data-container='digsignature'/> <img src='../img/edit.png' style='padding:4px; cursor:pointer; float:right;' class='img-edit' data-rel-photo-btn='sp1' data-container='digsignature'/> </div>
              <div class="col-12" style='display:none;'> </div>
              <input id="sp1" type="file" accept="image/x-png,image/gif,image/jpeg" name="digsignature" class="_photo"/>
              <input type='hidden' id="digsig" name="digsig"  value="<?php echo $appraiser->getDigsignature();?>"/>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Appraiser Tabs -->
    <div id="licenseData"> <span class="line">
      <h2><span>Appraiser Information</span></h2>
      </span>
      <div class="grouprow">
        <div class="col-6 groupsection label200">
          <div class="fieldsarea">
            <div class="form-group row">
              <label for="qu1" class="custom-file-upload">Upload Qualifications Doc</label>
              <input type="file" id="qu1" name="qualifications" accept=".docx,application/msword"/>
              <a href="../app_images/<?php echo $appraiser->getQualdoc(); ?>" target="new" class="form-control" style="border: none;"> <?php echo $appraiser->getQualifications(); ?> </a>
              <input type='hidden' name="quals" value="<?php echo $appraiser->getQualifications(); ?>"/>
            </div>
          </div>
        </div>
      </div>
      <div class="grouprow">
        <div class="col-6 groupsection label100">
          <div class="grouphead">Licence One</div>
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
            <div class="form-group row imgPlc" style="margin-top: 25px;" id="licenseimageone">
              <div class="col-12" style='display:none;'>
                <label for="sp2">License One</label>
              </div>
              <div class="content-section-bulding">
                <?php if ($appraiser->getId() != '') { ?>
                <a href="../app_images/<?php echo $appraiser->getLic1(); ?>" rel='lightbox[property]'><img id="preview-sp1" src="../app_images/<?php echo $appraiser->getLic1();?>" style='cursor:pointer;' data-type='applicone' /></a>
                <?php } else { ?>
                <img id="preview-sp1" src="../app_images/no-photo.jpg" style='cursor:pointer;'/>
                <?php } ?>
              </div>
              <div class='col-12 preview-sp1-panel'> <img src='../img/delete.png' style='padding:4px; cursor:pointer; float:right;' class='img-del' data-rel-photo-btn='sp2' data-link='licone' data-container='licenseimageone'/> <img src='../img/edit.png' style='padding:4px; cursor:pointer; float:right;' class='img-edit' data-rel-photo-btn='sp2' data-container='licenseimageone'/> </div>
              <div class="col-12" style='display:none;'> </div>
              <input id="sp2" type="file" accept="image/x-png,image/gif,image/jpeg" name="licenseimageone" class="_photo"/>
              <input type='hidden' id="licone" name="licone" value="<?php echo $appraiser->getlicenseimageone();?>"/>
            </div>
          </div>
        </div>
        <div class="col-6 groupsection label100">
          <div class="grouphead">Licence Two</div>
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
            <div class="form-group row imgPlc" style="margin-top: 25px;" id="licenseimagetwo">
              <div class="col-12" style='display:none;'>
                <label for="sp3">License Two</label>
              </div>
              <div class="content-section-bulding">
                <?php if ($appraiser->getId() != '') { ?>
                <a href="../app_images/<?php echo $appraiser->getLic2(); ?>" rel='lightbox[property]'><img id="preview-sp1" src="../app_images/<?php echo $appraiser->getLic2();?>" style='cursor:pointer;' data-type='applictwo' /></a>
                <?php } else { ?>
                <img id="preview-sp1" src="../app_images/no-photo.jpg" style='cursor:pointer;'/>
                <?php } ?>
              </div>
              <div class='col-12 preview-sp1-panel'> <img src='../img/delete.png' style='padding:4px; cursor:pointer; float:right;' class='img-del' data-rel-photo-btn='sp3' data-link='lictwo' data-container='licenseimagetwo'/> <img src='../img/edit.png' style='padding:4px; cursor:pointer; float:right;' class='img-edit' data-rel-photo-btn='sp3' data-container='licenseimagetwo'/> </div>
              <div class="col-12" style='display:none;'> </div>
              <input id="sp3" type="file" accept="image/x-png,image/gif,image/jpeg" name="licenseimagetwo" class="_photo"/>
              <input type='hidden' id="lictwo" name="lictwo" value="<?php echo $appraiser->getLicenseimagetwo();?>"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>