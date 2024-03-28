<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['rgemid'];
    $AName=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName='$AName', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
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
                            <h5 class="mb-0">Admin Profile & Settings</h5>

                          
                        </div>
                        <?php
$adminid=$_SESSION['rgemid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="card rounded shadow overflow-hidden mt-4 border-0">
                            <div class="p-5 bg-primary bg-gradient"></div>
                            <div class="avatar-profile d-flex margin-nagative mt-n5 position-relative ps-3">
                                <img src="assets/images/doctors/01.jpg" class="rounded-circle shadow-md avatar avatar-medium" alt="">
                                <div class="mt-4 ms-3 pt-3">
                                    <h5 class="mt-3 mb-1"><?php  echo $row['AdminName'];?></h5>
                                    <p class="text-muted mb-0">Admin</p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="card border-0 rounded-0 p-4">
                                       
            
                                        <div class="tab-content mt-4" id="pills-tabContent">
                                   
                
                                            <div class="tab-pane fade show active" id="pills-settings" role="tabpanel" aria-labelledby="settings-tab">
                                                <h5 class="mb-1">Settings</h5>
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="rounded shadow mt-4">
                                                            <div class="p-4 border-bottom">
                                                                <h6 class="mb-0">Personal Information :</h6>
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
                                                                                <input id="adminname" name="adminname" value="<?php  echo $row['AdminName'];?>"type="text" class="form-control"  required>
                                                                            </div>
                                                                        </div>  

                                                                      

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Email</label>
                                                                                <input type="email" id="email" name="email" value="<?php  echo $row['Email'];?>" class="form-control"  required>
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
                                                                                <input name="username" id="username" value="<?php  echo $row['UserName'];?>" type="text" class="form-control"  required readonly>
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Admin Registration date</label>
                                                                                <input id="adminregdate" name="adminregdate"  value="<?php  echo $row['AdminRegdate'];?>" type="text" class="form-control" required readonly>
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

                                                        <div class="rounded shadow mt-4">
                                                            <div class="p-4 border-bottom">
                                                                <h6 class="mb-0">Account Notifications :</h6>
                                                            </div>
                                
                                                            <div class="p-4">
                                                                <form>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Old password :</label>
                                                                                <input type="password" class="form-control" placeholder="Old password" required="">
                                                                            </div>
                                                                        </div>  
                                    
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New password :</label>
                                                                                <input type="password" class="form-control" placeholder="New password" required="">
                                                                            </div>
                                                                        </div>  
                                    
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Re-type New password :</label>
                                                                                <input type="password" class="form-control" placeholder="Re-type New password" required="">
                                                                            </div>
                                                                        </div>  
                                    
                                                                        <div class="col-lg-12 mt-2 mb-0">
                                                                            <button class="btn btn-primary">Save password</button>
                                                                        </div>  
                                                                    </div>  
                                                                </form>
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

                  
                <footer class="bg-footer-color shadow py-3">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-sm-start text-center">
                                    <p class="mb-0 text-muted"><script>document.write(new Date().getFullYear())</script> © Doctris. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                                </div>
                            </div>  
                        </div>  
                    </div>  
                </footer><!--end footer-->
                  
            </main>
              
        </div>
          

          
        <div class="offcanvas offcanvas-end shadow border-0" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header p-4 border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="assets/images/logo-1.png" height="22" class="light-version" alt="">
                    <img src="assets/images/logo-light.png" height="22" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4 px-md-5">
                <div class="row">
                    <div class="col-12">
                        <!-- Style switcher -->
                        <div id="style-switcher">
                            <div>
                                <ul class="text-center style-switcher list-unstyled mb-0">
                                    <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light" onclick="setTheme('style-rtl')"><img src="assets/images/layouts/light-dash-rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light" onclick="setTheme('style')"><img src="assets/images/layouts/light-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark" onclick="setTheme('style-dark-rtl')"><img src="assets/images/layouts/dark-dash-rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark" onclick="setTheme('style-dark')"><img src="assets/images/layouts/dark-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4" onclick="setTheme('style-dark')"><img src="assets/images/layouts/dark-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Dark Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4" onclick="setTheme('style')"><img src="assets/images/layouts/light-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Light Version</span></a></li>
                                    <li class="d-grid"><a href="landing/index.html" target="_blank" class="mt-4"><img src="assets/images/layouts/landing-light.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Landing Page</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end Style switcher -->
                    </div>  
                </div>  
            </div>

            <div class="offcanvas-footer p-4 border-top text-center">
                <ul class="list-unstyled social-icon social mb-0">
                    <li class="list-inline-item mb-0"><a href="https://1.envato.market/doctris-template" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://shreethemes.in/" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
                </ul><!--end icon-->
            </div>
        </div>
          

          
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/tiny-slider/min/tiny-slider.js"></script></script>
        <!-- Icons -->
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- Main Js -->
          
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        
    </body>


<!-- Mirrored from shreethemes.in/doctris/layouts/admin/dr-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Feb 2024 04:28:26 GMT -->
</html>
<?php }  ?>