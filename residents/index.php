<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tblresidentlogin where  ResidentID='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['residentID']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
        <meta charset="utf-8" />
        <title>Login - Dhananjay Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Version" content="v1.4.0" />
        <link rel="shortcut icon" href="./assets/images/favicon.png">
        <link href="../assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/a42f0dcdd6.js" crossorigin="anonymous"></script>
        <link href="../assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>
    <body>
    
        <section class="bg-home d-flex bg-light align-items-center" style="background: url('assets/images/bg/bg-lines-one.png') center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <img src="assets/images/logo-1.png" height="80" class="mx-auto d-block" alt="">
                        <h1 style="font-size: 22px; text-align:center; margin: 30px;" >
                        Resident Society Guest Registry !!!
                        </h1>
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="card login-page shadow mt-4 rounded border-0">
                            <div class="card-body">
                                <h4 class="text-center">Sign In</h4>  
                                <form action="" method="post" name="login" class="login-form mt-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="User Name" name="username" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between">
                                                <a href="forgot-password.php" class="text-dark h6 mb-0">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit" name="login">Sign in</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>   
                </div>  
            </div>   
        </section>  
    </body>
</html>