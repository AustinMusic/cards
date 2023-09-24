<!doctype html>
<html>
<head>
    <title>Issue
        <?php echo $issues->getId(); ?>
    </title>
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
    <!--    <script type="text/javascript" src="../js/jquery.form.js"></script>-->
    <script type="text/javascript" src="../js/bootstrap-4.2.1.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <script type="text/javascript" src="../js/rbe_engine.js"></script>
    <script type="text/javascript" src="../js/aa_engine.js"></script>
    <script type="text/javascript" src="../js/issuesController.js"></script>
    <script type="text/javascript" src="../js/imageController.js"></script>
    <style>
        .prebox img {
            max-height: 100px;
            padding: 15px;
        }
        
        .prebox {
            display: inline-block;
        }
        
        .building-discription-tab-section .tab-content {
            border-top: 1px solid #1e4959;
        }
        
        .gallery img {
            padding: 5px;
            border: 4px solid #1e4959;
            background-color: #e6e6e6;
            border-radius: 8px;
        }
        #lightbox img {
          max-width:1100px;
        }
        .lb-outerContainer {
            max-width: 1120px;
        }
    </style>
    <script>
        function issueType() {
            var myWindow = window.open( "", "MsgWindow", "width=450,height=200,location=no,menubar=no,scrollbars=no,status=no" );
            myWindow.document.write( "<ul><li>Feature Request - Add a feature not yet included in CARDS.</li><li>Bug - There is a problem with a current feature.</li><li>Change Request - Typically used for typos or minor changes that are not bugs.</li></ul>" );
        }

        function priorityType() {
            var myWindow = window.open( "", "MsgWindow", "width=500,height=300,location=no,menubar=no,scrollbars=no,status=no" );
            myWindow.document.write( "<ul><li>Low indicates the problem does not significantly impact operations, or that a reasonable workaround has been implemented.</li><li>Medium indicates CARDS is usable, but that some features (not critical to operations) are unavailable.</li><li>High indicates CARDS is usable but is severely limited.</li><li>URGENT indicates that customer is unable to use CARDS, resulting in a critical impact on business operations. This condition requires immediate resolution. After submitting the issue, please contact Michael at (512) 507-7611.</li></ul>" );
        }

        function statusType() {
            var myWindow = window.open( "", "MsgWindow", "width=500,height=150,location=no,menubar=no,scrollbars=no,status=no" );
            myWindow.document.write( "<ul><li>Opened - Issue created.</li><li>On Hold - Issue has been looked at but has not yet started to work on.</li><li>Working - The issue is currently being worked on.</li><li>Resolved - Fix has been implemented into CARDS and the issue should no longer be seen.</li></ul>" );
        }

        function reportidType() {
            var myWindow = window.open( "", "MsgWindow", "width=300,height=100,location=no,menubar=no,scrollbars=no,status=no" );
            myWindow.document.write( "<p>Copy and paste the URL for the page you are seeing this issue..</p>" );
        }
    </script>
    <script>
        function preview_image() {
            var total_file = document.getElementById( "upload_files" ).files.length;
            for ( var i = 0; i < total_file; i++ ) {
                $( '#images_preview' ).append( "<div class='prebox'><img src='" + URL.createObjectURL( event.target.files[ i ] ) + "'></div>" );
            }
        }
    </script>
</head>
<?php include("../../../includes/header.php") ?>
<div class="mainpage">
    <p><a href="buglist.php">Issues List</a>&nbsp; &#8594; &nbsp; Issue Information</p>
    <section class="building-discription-tab-section building-size">
        <div class="container-custom">
            <form enctype="multipart/form-data" method="post" id="bug_upload_form">
                <div class="row">
                    <?php if ($issues->getId() != '') { ?>
                    <input type="hidden" name="id" value="<?php echo $issues->getId(); ?>"/>
                    <?php } ?>
                    <div class="tab-content building-discription-form">
                        <div id="issuesdata" class="tab-pane active padding-5">
                            <p>As you use CARDS, you may come across issues that need addressing, or have ideas that will help improve the program. The form below will help make CARDS work better for you. Please be as descriptive as possible and upload any images you feel are relevent.</p>
                            <div class="col-6 padding-5 float-left">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="short" class="form-control" value="<?php echo $issues->getShort(); ?>" required>
                                </div>
                            </div>
                            <div class="col-6 padding-5 float-left">
                                <div class="form-group">
                                    <label>URL <a href="#" onClick="reportidType()"><img src="../img/help.png" style="float: right"></a></label>
                                    <input type="text" class="form-control" name="issuesURL" value="<?php echo $issues->getIssuesURL(); ?>"/>
                                </div>
                            </div>
                            <div class="col-4 padding-5 float-left">
                                <div class="form-group">
                                    <label>Issue Type <a href="#" onClick="issueType()"><img src="../img/help.png" style="float: right"></a></label>
                                    <select class="form-control" name="type">
                                        <?php
                                        for ( $s = 0; $s < count( $issuetypeData ); $s++ ) {
                                            ?>
                                        <option value='<?php echo $issuetypeData[$s]["id"]; ?>' <?php if ( $issues->getType() == $issuetypeData[$s]["id"] ) { ?>selected='selected'
                                            <?php 
    									}
    									?> >
                                            <?php echo $issuetypeData[$s]["definition"];?>
                                        </option>
                                        <?php 
    									}
    									?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 padding-5 float-left">
                                <div class="form-group">
                                    <label>Priority <a href="#" onClick="priorityType()"><img src="../img/help.png" style="float: right"></a></label>
                                    <select class="form-control" name="priority">
                                        <?php
                                        for ( $s = 0; $s < count( $prioritytypeData ); $s++ ) {
                                            ?>
                                        <option value='<?php echo $prioritytypeData[$s]["id"]; ?>' <?php if ( $issues->getPriority() == $prioritytypeData[$s]["id"] ) { ?>selected='selected'
                                            <?php 
    									}
    									?> >
                                            <?php echo $prioritytypeData[$s]["definition"];?>
                                        </option>
                                        <?php 
    									}
    									?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 padding-5 float-left">
                                <div class="form-group">
                                    <label>Status <a href="#" onClick="statusType()"><img src="../img/help.png" style="float: right"></a></label>
                                    <select class="form-control" name="status">
                                        <?php
                                        for ( $s = 0; $s < count( $statustypeData ); $s++ ) {
                                            ?>
                                        <option value='<?php echo $statustypeData[$s]["id"]; ?>' <?php if ( $issues->getStatus() == $statustypeData[$s]["id"] ) { ?>selected='selected'
                                            <?php 
    									}
    									?> >
                                            <?php echo $statustypeData[$s]["definition"];?>
                                        </option>
                                        <?php 
    									}
    									?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 padding-5 float-left">
                            <div class="form-group textfields">
                                <label for="description">Description</label>
                                <textarea name="description" rows="6" class="form-control"><?php echo str_replace('\r',"\r",str_replace('\n',"\n",$issues->getDescription())); ?></textarea>
                            </div>
                        </div>
                        <div class="col-4 padding-5 float-left">
                            <div class="form-group textfields">
                                <label for="reproduction">Reproduction</label>
                                <textarea name="reproduction" class="form-control" rows="6"><?php echo str_replace('\r',"\r",str_replace('\n',"\n",$issues->getReproduction())); ?></textarea>
                            </div>
                        </div>
                        <div class="col-4 padding-5 float-left">
                            <div class="form-group textfields">
                                <label for="updates">Updates</label>
                                <textarea name="updates" rows="6" class="form-control"><?php echo str_replace('\r',"\r",str_replace('\n',"\n",$issues->getUpdates())); ?></textarea>
                            </div>
                        </div>
                        <div class="col-9 gallery float-left">
                            <?php
                            if ( count( $bugimg ) > 0 ) {
                                for ( $u = 0; $u < count( $bugimg ); $u++ ) {
                                    // set up a row for each record
                                    ?>
                            <a href="../bugs/<?php echo $bugimg[$u]['image']; ?>" rel='lightbox[property]'><img id="preview-sp1" src="../bugs/<?php echo $bugimg[$u]['image']; ?>" width="200px" style='cursor:pointer;' data-type='property-photo' /></a>
                            <?php }
								}
								// if there are no records in the database, display an alert message
								else{ echo "No images to display!";
                                }
                            ?>
                        </div>
                        <div class="col-3 float-left padding-5 ">
                            <div class="float-left">
                                <label> Upload Images</label>
                                <input type="file" name="images[]" id="upload_files" onchange="preview_image();" multiple>
                            </div>
                            <div id="images_preview"></div>
                        </div>
                        <div class="col-6 float-left">
                            <font size="-1">Created By:
                                <?php echo $issues->getCreatedBy();?> on
                                <?php echo $issues->getDateCreated();?>
                            </font>
                        </div>
                        <div class="col-6 float-right" style="text-align: right;">
                            <font size="-1">Modified By:
                                <?php echo $issues->getModifiedBy();?> on
                                <?php echo $issues->getDateModified();?>
                            </font>
                        </div>
                    </div>
                </div>
                <!-- End Client tab -->
                <div class="col-12 padding-5 text-right">
                    <input type="submit" name="submit" class="submit">
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>