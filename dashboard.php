<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
error_reporting(0);
if (strlen($_SESSION['rgemid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8" />
         <title>Dhananjay Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <link href="assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/a42f0dcdd6.js" crossorigin="anonymous"></script>
        <link href="assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="page-wrapper   toggled">
            <?php include_once('includes/sidebar.php');?>
            <main class="page-content bg-light">
            <?php include_once('includes/header.php');?>
                <?php
 $query=mysqli_query($con,"select ID from tblvisitor where date(EnterDate)=CURDATE();");
$count_today_visitors=mysqli_num_rows($query);
 $query1=mysqli_query($con,"select ID from tblvisitor where date(EnterDate)=CURDATE()-1;");
$count_yesterday_visitors=mysqli_num_rows($query1);
 $query2=mysqli_query($con,"select ID from tblvisitor where date(EnterDate)>=(DATE(NOW()) - INTERVAL 7 DAY);");
$count_lastsevendays_visitors=mysqli_num_rows($query2);
 $query3=mysqli_query($con,"select ID from tblvisitor");
$count_total_visitors=mysqli_num_rows($query3);
 $query5=mysqli_query($con,"select id from tblcategory");
$listedcategories=mysqli_num_rows($query5);
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
                                            <h5 class="mb-0"><?php echo $count_today_visitors?></h5>
                                            <p class="text-muted mb-0">Today's Visitor</p>
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
                                            <h5 class="mb-0"><?php echo $count_yesterday_visitors?></h5>
                                            <p class="text-muted mb-0">Yesterday Visitors</p>
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
                                            <h5 class="mb-0"><?php echo $count_lastsevendays_visitors?></h5>
                                            <p class="text-muted mb-0">Last 7 Day Visitor</p>
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
                                            <h5 class="mb-0"><?php echo $count_total_visitors?></h5>
                                            <p class="text-muted mb-0">Total Visitor Till Date</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                        <img src="assets/images/category.png" alt="Categories" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0"><?php echo $listedcategories?></h5>
                                            <p class="text-muted mb-0">Listed Categories</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class=" col-lg-4 col-md-4 mt-4">
                                <div class="card features feature-primary rounded border-0 shadow p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="icon text-center rounded-md">
                                        <img src="assets/images/id-card.png" alt="visitors" style="width: 40px;">
                                        </div>
                                        <div class="flex-1 ms-2">
                                            <h5 class="mb-0">10</h5>
                                            <p class="text-muted mb-0">Total Pass Created</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>  
                <?php include_once('includes/footer.php'); ?>
            </main>
        </div>
    </body>
</html>
<?php } ?>