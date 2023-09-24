<!doctype html>
<html>
<head>
    <title>Client Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-4.2.1.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <script type="text/javascript" src="../js/rbe_engine.js"></script>
    <script type="text/javascript" src="../js/aa_engine.js"></script>
    <script type="text/javascript" src="../js/baseController.js"></script>
    <script type="text/javascript" src="../js/clientController.js"></script>
    <script type="text/javascript">
        $( function () {
            aa_engine = new _aa_engine();

            clientController = new _clientController( {
                activeObject: "clientController",
                id: <?php echo $client->getId(); ?>,
                <?php
					if(isset($clientData)){
					?>
                data: <?php echo json_encode($clientData,JSON_UNESCAPED_UNICODE); ?>
                <?php
					}
					?>
            } );

            clientController.init();
        } );
    </script>
    <style>
    .building-discription-tab-section .tab-content {
            border-top: 1px solid #1e4959;
        }
    </style>
</head>
<div class="mainpage">
    <section class="building-discription-tab-section building-size">
        <div class="container-custom">
            <form enctype="multipart/form-data" method="post">
                <div class="row">
                    <?php if ($client->getId() != '') { ?>
                    <input type="hidden" name="id" value="<?php echo $client->getId(); ?>"/>
                    <?php } ?>
                    <!-- Client tab -->
                    <div class="tab-content building-discription-form">
                        <div id="clientdata" class="tab-pane active">
                            <div class="col-4 padding-5 float-left">
                                <div class="border-fields-section margin-0 clientinputs">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control" name="compname" value="<?php echo $client->getCompname(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Acronym</label>
                                        <input type="text" class="form-control" name="compacro" value="<?php echo $client->getCompacro(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $client->getAddress(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="<?php echo $client->getCity(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>County</label>
                                        <input type="text" class="form-control" name="county" value="<?php echo $client->getCounty(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" value="<?php echo $client->getState(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control" name="zipcode" value="<?php echo $client->getZipcode(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="businessno" value="<?php echo $client->getBusinessno(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Fax Number</label>
                                        <input type="text" class="form-control" name="faxno" value="<?php echo $client->getFaxno(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="website" value="<?php echo $client->getWebsite(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Code</label>
                                        <input type="text" class="form-control" name="mailcode" value="<?php echo $client->getMailcode(); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 padding-5 float-left">
                                <div class="border-fields-section margin-0 clientinputs">
                                    <div class="form-group">
                                        <label>Contact Type</label>
                                        <select class="form-control" name="contacttype">
                                            <?php
                                            for ( $s = 0; $s < count( $contacttypeData ); $s++ ) {
                                                ?>
                                            <option value='<?php echo $contacttypeData[$s]["id"]; ?>' <?php if ( $client->getContacttype() == $contacttypeData[$s]["id"] ) { ?>selected='selected'
                                                <?php 
    									}
    									?> >
                                                <?php echo $contacttypeData[$s]["definition"];?>
                                            </option>
                                            <?php 
    									}
    									?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Salutation</label>
                                        <select class="form-control" name="salutation">
                                            <?php
                                            for ( $s = 0; $s < count( $salutationData ); $s++ ) {
                                                ?>
                                            <option value='<?php echo $salutationData[$s]["id"]; ?>' <?php if ( $client->getSalutation() == $salutationData[$s]["id"] ) { ?>selected='selected'
                                                <?php 
    									}
    									?> >
                                                <?php echo $salutationData[$s]["definition"];?>
                                            </option>
                                            <?php 
    									}
    									?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php echo $client->getFirstname(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Middle</label>
                                        <input type="text" class="form-control" name="midname" value="<?php echo $client->getMidname(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php echo $client->getLastname(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" name="designation" value="<?php echo $client->getDesignation(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="clienttitle" value="<?php echo $client->getClienttitle(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <input type="text" class="form-control" name="department" value="<?php echo $client->getDepartment(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Cell Phone</label>
                                        <input type="text" class="form-control" name="cellphone" value="<?php echo $client->getCellphone(); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $client->getEmail(); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 padding-5 float-left">
                                <div class="form-group textfields2">
                                    <label>Client Notes</label>
                                    <textarea class="form-control" style="width: 100%" rows="16" name="notes"><?php echo $client->getNotes(); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Client tab -->
                    <div class="col-12 padding-5 text-right">
                        <input type="submit" name="submit" class="submit">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>