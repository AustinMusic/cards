<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
set_time_limit( 120 );
ini_set( 'memory_limit', '512M' );
ini_set( 'max_execution_time', 60 );
include( "../../../includes/check.php" );
$title = 'aa Valuation - Admin Panel'
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-4.2.1.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/lightbox.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <title>
        <?php echo $title; ?>
    </title>
    <style>
        img {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        
        .btn {
            background: #8ec548;
            background-image: -webkit-linear-gradient(top, #8ec548, #8ec548);
            background-image: -moz-linear-gradient(top, #8ec548, #8ec548);
            background-image: -ms-linear-gradient(top, #8ec548, #8ec548);
            background-image: -o-linear-gradient(top, #8ec548, #8ec548);
            background-image: linear-gradient(to bottom, #8ec548, #8ec548);
            -webkit-border-radius: 28;
            -moz-border-radius: 28;
            border-radius: 28px;
            font-family: Arial;
            color: #ffffff;
            font-size: 13px;
            padding: 5px 10px 5px 10px;
            text-decoration: none;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        
        .btn:hover {
            background: #3fb44f;
            background-image: -webkit-linear-gradient(top, #3fb44f, #3fb44f);
            background-image: -moz-linear-gradient(top, #3fb44f, #3fb44f);
            background-image: -ms-linear-gradient(top, #3fb44f, #3fb44f);
            background-image: -o-linear-gradient(top, #3fb44f, #3fb44f);
            background-image: linear-gradient(to bottom, #3fb44f, #3fb44f);
            font-family: Arial;
            color: #ffffff;
            font-size: 13px;
            text-decoration: none;
        }
        
        .dropbtn {
            padding-left: 50px;
            padding-right: 50px;
            margin-bottom: 15px;
        }
        
        a {}

    </style>
</head>

<body>
    <?php include("../../../includes/header.php")?>
    <div class="mainpage">
        <div class="col-12" style="margin: 10px;">Control Panel&nbsp; &#8594; &nbsp; Home</div>
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Users, Appraisers, and Clients
        </a>
                


                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <p>Appraisers and Clients can be added and edited through appraisals reports. However, there may be times when these need to be added independently of a report. Users can only be added or edited by an administrator.</p>
                        <p><a href="appraisers.php">Click here to see all appraisers.</a>
                        </p>
                        <p><a href="clients.php">Click here to see all clients.</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Dropdown Items
      </a>
                


                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <p>There are two different types of dropdown boxes used in CARDS. A "fixed" dropdown forces the user to select from a preset list of items. An "editable" dropdown allows the user to select from the list of items, or enter a unique value.</p>
                        <h3>Fixed Dropdown Boxes</h3>
                        <p>Making changes to fixed dropdown items will effect all records in the database. While you can add items to a particular dropdown, you cannot delete any entries. If an item needs to be removed, you must contact the database administrator.</p>
                        <p>To view and edit fixed dropdown items, locate the field below:<br>
                            <div class="d-flex flex-wrap">
                                <div class="col-3"><a href="subtype.php">Property Subtype</a>
                                </div>
                                <div class="col-3"><a href="submarket.php">Submarket Area</a>
                                </div>
                                <div class="col-3"><a href="status.php">Report Status</a>
                                </div>
                                <div class="col-3"><a href="priority.php">Report Priority</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=apptitle">Appraisal Title</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=appraisetype">Appraisal Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=bclass">Building Class</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=buyerstatus">Buyer Status</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=cclass">Construction Cass</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=contacttype">Contact Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=convdoc">Conv Doc Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=leaseexpadj">Exp. Term Adjustment</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=inspecttype">Inspect Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=leaseexpterm">Lease Expense</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=lesseetype">Lessee Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=lvlservice">Level of Service</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=occupancytype">Occupancy Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=ownertype">Owner Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=parktype">Park Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=parkingtype">Parking Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=pdftype">PDF Type</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=appraisepurp">Purpose of Appraisal</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=salestatus">Sale Status</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=salutation">Salutation</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=sidestreet">Side of Street</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=spacegener">Space Generation</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=spaceposition">Space Position</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=mfunittype">Unit Type (MF)</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=ssunittype">Unit Type (MS)</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=utilities">Utilities</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=exposure">Exposure</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=orientation">Orientation</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=proprights">Property Rigthts</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=shape">Shape</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=siteaccess">Site Access</a>
                                </div>
                                <div class="col-3"><a href="drops.php?ddtype=topography">Topography</a>
                                </div>
                            </div>
                        </p>
                        <h3>Editable Dropdown Boxes</h3>
                        <p>Changes to editable dropdown items will not effect any records. Because changes need to be made through the code, it is recommended that any changes be made on the test server prior to applying them to the live program.</p>
                        <div class="d-flex flex-wrap">
                                <div class="col-3"><a href="editdds.php?ddtype=msalist">MSA</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=utilslist">Available Utilities</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=eadesc">Easement Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=bsizesource">Building Size Source</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=YBlastReno">Renovation Year</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=codescrip">Construction Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=parratlist">Parking Ratio</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=offhvactype">Office HVAC</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=cheightlist">Clear Height</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=tdRamp">Truck - Ramp</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=tdDock">Truck - Dock</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=hvaclist">Industrial HVAC</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=confealist">Construction Features</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=actprof">Pro Forma</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=actprofsource">Pro Forma Source</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=resexp">Reserves</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=apprnames">Appraisers</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=int_conv">Interest Conveyed</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=findesc">Finance Type</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=tonmarket">Marketing Time</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=APComment">Adjusted Price Comment</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=sourcedata">Data Source</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=conf1sour">Confirmation Source</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=relat1">Relationship</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=conf2sour">Confirmation Source 2</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=MFUnitType">Muli Family Unit Type</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=descLopt">Lease Options Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=flono">Floor Number</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=loadfac">Load Factor</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=SLEEscalation">Lease Escalations</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=SLConcDesc">Concessions Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=descyardspace">Yard Space Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=EffectRentComment">Effective Rent Comment</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=MSSize">Self-storage Unit Size</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=MsUnitType">Self-storage Unit Type</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=conorby">Confirmed By</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=EZCode">Zoning Codes</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=EZJuris">Zoning Jurisdiction</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=EZDesc">Zoning Description</a>
                                </div>
                                <div class="col-3"><a href="editdds.php?ddtype=TimReZone">Rezone Timing</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Templates
        </a>
                


                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <h4>Word Templates</h4>
                        <p>Merges to Office Word are handled through XSLT. While .docx files are located on the server, these are used as a "starter" document for the XSLT to work with. Changes to the .docx files will not be reflected on the merged document and could prevent the template from functioning. It is highly recommended that someone skilled in XML code handles any changes to these files. </p>
                        <h4>Excel Templates</h4>
                        <p>Excel templates differ from Word whereas the primary placement of data is a .php file, and changes to the Excel file will be reflected in the merged document. The .php file tells Excel where to place the data based on the row number and a predefined column. Because of this, do not add any rows or columns as this will effect the data. Modifications to formulas and format within the Excel files can be made without effecting the data.</p>
                        <p>Excel also differs from Word in that a seperate set of Excel files are needed for merges done from the Maps pages.  Changes to Excel formats and formulas would need to be done in both folders to ensure consistency.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
          Server Information
        </a>
                


                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <h4>GoDaddy</h4>
                        <p>
                            <div class="col-2 adminfig"><center><a href="../img/gdmyprod.png" target="new"><img src="../img/gdmyprod.png" alt="My Products" height="50px"><br>See Screenshot</center></a>
                            </div>
                            <div class="col-9 admincont">GoDaddy used <em>cPanel</em> to handle access to the database and file server. Log into GoDaddy and go to the My Products page. Expand the Servers tab and click on Manage.</div>
                        </p>
                        <p>
                            <div class="col-2 adminfig"><center><a href="../img/gdmyserv.pn" target="new"><img src="../img/gdmyserv.png" alt="My Server" height="50px"><br>See Screenshot</center></a>
                            </div>
                            <div class="col-9 admincont">This brings you to the Server Management page, where you have access to both our test and production servers. Scroll down and click on the cPanel tab to see links to both of these servers.</div>
                        </p>
                        <p>
                            <div class="col-2 adminfig"><center><a href="../img/gdsec.png" target="new"><img src="../img/gdsec.png" alt="Security Page" height="50px"><br>See Screenshot</center></a>
                            </div>
                            <div class="col-9 admincont">To gain access to the database and files, click the cPanel link for the appropriate server. You may be directed to a “Security Page” telling you that the connection is not safe. If that’s the case, click on the Advanced button and then click on the “Proceed…” link at the bottom of the page to be directed to cPanel.</div>
                        </p>
                        <p>cPanel is separated into multiple sections, however we are primarily interested in the Files and Database sections.</p>
                        <h5>DATABASE</h5>
                        <p>Under the Database section is a link labeled phpMyAdmin. This is the portal that will direct you to the MySQL database used in CARDS. The database is named aaProperties. Only those skilled in MySQL should access this area as any changes to the database could have a catastrophic impact on the program.</p>
                        <h5>FOLDERS AND FILES</h5>
                        <p>Under the Files section are many links to handle various aspects of the file structure. For our purposes, we are only interested in File Manager. File Manager gives access to both transferring files (FTP) and our Editor. Many of the folders seen are server related and should not be modified unless by a server admin. The only folders that require attention are the includes and public_html folders.</p>
                        <p>Changes to CARDS are first done on the test server. All files can be moved to the live server without any further modifications once the files have been deemed working.  The only files that need modification is <em>public_html/cards/js/aa_searchEngine/aa_searchEngine.js</em>. Line 8 of this file references the base URL and must match the URL for the server. When moving this file from the test server to the live server, the base URL must be changed from <code>http://www.aavaluation.net/cards/</code> to <code>http://www.aavaluation.com/cards/</code>.</p>
                    </div>
                </div>
            </div>
<div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
          Deleting and Undeleting Records
        </a>
                


                </div>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <h4>Deleting Records</h4>
                        <p>Users with Administrator rights can delete records from CARDS. To do so, perform a General Search and admins will have a red X that allows them to delete a record.</p>
                        <h4>Undeleting Records</h4>
                        <p>There is no way to undelete a record from within CARDS. To undelete a record, you must know the ID and have access to the database. With the ID of the record, launch phpAdmin and run the following script:<br><code>update report set IsDeleted = 0 where id = &lsquo;Place the Record ID here &rsquo;</code>.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>
</html>