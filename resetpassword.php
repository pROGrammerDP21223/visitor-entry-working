<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
error_reporting(0);
if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
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
        <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 
</script>
    </head>
    <body>
        <div class="page-wrapper   toggled">
            <?php include_once('includes/sidebar.php'); ?>
            <main class="page-content bg-light">
                <?php include_once('includes/header.php'); ?>
                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="d-md-flex justify-content-between">
                            <h5 class="mb-0">Reset your Password</h5>
                        </div>
                        <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="rounded shadow mt-4">
                                                            <div class="p-4 border-bottom">
                                                                <h6 class="mb-0">Reset your Password :</h6>
                                                            </div>
                                                            <div class="p-4">
                                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                                                <form  action="" method="post" name="changepassword" onsubmit="return checkpass();">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New password :</label>
                                                                                <input type="password"   name="newpassword" placeholder="New Password" class="form-control" required="">
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Confirm your password :</label>
                                                                                <input type="password" name="confirmpassword" required="" placeholder="Confirm Your Password" class="form-control" >
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-lg-12 mt-2 mb-0">
                                                                            <button class="btn btn-primary" type="submit" name="submit">Reset password</button>
                                                                        </div>  
                                                                    </div>  
                                                                </form>
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
