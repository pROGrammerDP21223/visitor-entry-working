<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
error_reporting(0);
if (strlen($_SESSION['residentID']==0)) {
  header('location:logout.php');
  } else{ ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8" />
         <title>Dhananjay Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <link href="../assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/a42f0dcdd6.js" crossorigin="anonymous"></script>
        <link href="../assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="page-wrapper   toggled">
            <?php include_once('sidebar-resident.php');?>
            <main class="page-content bg-light">
            <?php include_once('../includes/header.php');?>
                <?php

$resident_ID=$_SESSION['residentID'];
$ret=mysqli_query($con,"select ResidentID from tblresidentlogin where ID='$resident_ID'");
$row=mysqli_fetch_array($ret);
$resident_id=$row['ResidentID'];

 $query=mysqli_query($con,"select * from tblvisitor WHERE status = 0 AND ResidentID = '$resident_id';");
$count_rejected_visitors=mysqli_num_rows($query);
 $query1=mysqli_query($con,"select * from tblvisitor WHERE status = 1 AND ResidentID = '$resident_id';");
$count_verified_visitors=mysqli_num_rows($query1);

 $query2=mysqli_query($con,"select * from tblvisitor WHERE status = 'NULL' AND ResidentID = '$resident_id';");
$count_pending_visitors=mysqli_num_rows($query2);
 $query3=mysqli_query($con,"select * from tblvisitor WHERE ResidentID = '$resident_id';");
$count_total_visitors=mysqli_num_rows($query3);

 ?>      
                <div class="container-fluid">
                    <div class="layout-specing">
                        <h5 class="mb-0">Dashboard</h5>
                        <div class="row">
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                         <img src="assets/images/group.png" alt="visitors" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0"><?php echo $count_pending_visitors;?></h5>
                                            <p class="text-muted mb-0">Pending Request</p>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                           <img src="assets/images/group.png" alt="visitors" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0"><?php echo $count_total_visitors;?></h5>
                                            <p class="text-muted mb-0">Total Visitors</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                           <img src="assets/images/group.png" alt="visitors" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0"><?php echo $count_verified_visitors;?></h5>
                                            <p class="text-muted mb-0">Verified Visitors</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                        <img src="assets/images/group.png" alt="visitors" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0"><?php echo $count_rejected_visitors;?></h5>
                                            <p class="text-muted mb-0">Rejected Visitors</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                              
                        </div>  
                    </div>
                </div>  
                <?php include_once('../includes/footer.php'); ?>
            </main>
        </div>
    </body>
</html>
<?php } ?>