<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
error_reporting(0);
if (strlen($_SESSION['rgemid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['rgemid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $query = mysqli_query($con, "select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
        $row = mysqli_fetch_array($query);
        if ($row > 0) {
            $ret = mysqli_query($con, "update tbladmin set Password='$newpassword' where ID='$adminid'");
            $msg = "Your password successully changed";
        } else {
            $msg = "Your current password is wrong";
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
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
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
                            <h5 class="mb-0">Admin Profile & Settings</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="rounded shadow mt-4">
                                    <div class="p-4 border-bottom">
                                        <h6 class="mb-0">Change Admin Password :</h6>
                                    </div>
                                    <div class="p-4">
                                        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                                    echo $msg;
                                                                                                }  ?> </p>
                                        <?php
                                        $adminid = $_SESSION['rgemid'];
                                        $ret = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Old password :</label>
                                                            <input type="password" id="currentpassword" name="currentpassword" value="" class="form-control" required="">
                                                        </div>
                                                    </div>  
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">New password :</label>
                                                            <input type="password" id="newpassword" name="newpassword" value="" class="form-control" required="">
                                                        </div>
                                                    </div>  
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Re-type New password :</label>
                                                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required="">
                                                        </div>
                                                    </div>  
                                                <?php } ?>
                                                <div class="col-lg-12 mt-2 mb-0">
                                                    <button class="btn btn-primary" type="submit" name="submit">Save password</button>
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
    </html>
<?php }  ?>