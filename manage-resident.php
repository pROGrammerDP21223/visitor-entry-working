<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $eid = $_GET['editid'];;
    $ResidentName=$_POST['resident_name'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
     $query=mysqli_query($con, "update tblresident set ResidentName='$ResidentName', MobileNumber ='$mobno', EmailAdd= '$email' where ResidentID='$eid'");
    if ($query) {
    $msg="Resident profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
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
            <?php include_once('includes/sidebar.php'); ?>
            <main class="page-content bg-light">
            <?php include_once('includes/header.php'); ?>
                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="d-md-flex justify-content-between">
                            <h5 class="mb-0">Resident Profile</h5>
                        </div>
                        <?php
  $eid = $_GET['editid'];
$ret=mysqli_query($con,"select * from tblresident where ResidentID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                        <div class="card rounded shadow overflow-hidden mt-4 border-0">
                            <div class="p-5 bg-primary bg-gradient"></div>
                            <div class="avatar-profile d-flex margin-nagative mt-n5 position-relative ps-3">
                                <img src="assets/images/agent.png" class="rounded-circle shadow-md avatar avatar-medium" alt="">
                                <div class="mt-4 ms-3 pt-3">
                                    <h5 class="mt-3 mb-1"><?php  echo $row['ResidentName'];?></h5>
                                    <p class="text-muted mb-0">Resident</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="card border-0 rounded-0 p-4">
                                        <div class="tab-content mt-4" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-settings" role="tabpanel" aria-labelledby="settings-tab">
                                       
                                                <div class="row">
                                              
                                                    <div class="col-lg-10">
                                                        <div class="rounded shadow mt-4">
                                                            <div class="p-4 border-bottom">
                                                                <h6 class="mb-0">Resident Information :</h6>
                                                            </div>
                                                            <div class="p-4">
                                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                                                <form class="mt-4" action="" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Name</label>
                                                                                <input id="adminname" name="resident_name" value="<?php  echo $row['ResidentName'];?>"type="text" class="form-control"  required>
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Email</label>
                                                                                <input type="email" id="email" name="email" value="<?php  echo $row['EmailAdd'];?>" class="form-control"  required>
                                                                            </div> 
                                                                        </div>  
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Mobile no.</label>
                                                                                <input id="mobilenumber" name="mobilenumber" type="text" class="form-control" value="<?php  echo $row['MobileNumber'];?>" required>
</div>                                                                               
                                                                        </div>  
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin User Name</label>
                                                                                <input name="resident_id" id="username" value="<?php  echo $row['ResidentID'];?>" type="text" class="form-control"  required readonly>
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Registration date</label>
                                                                                <input id="adminregdate" name="residentregdate"  value="<?php  echo $row['CreationDate'];?>" type="text" class="form-control" required readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <?php } ?>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Save changes">
                                                                        </div>  
                                                                    </div>  
                                                                </form><!--end form-->
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>  
                                            </div><!--end teb pane-->
                                        </div><!--end tab content-->
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
<?php }  ?>