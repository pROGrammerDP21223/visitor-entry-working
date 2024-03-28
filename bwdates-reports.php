<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid'] == 0)) {
    header('location:logout.php');
} else {
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
                            <h5 class="mb-0">Between Date Reports</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 mt-4">
                                <div class="card border-0 p-4 rounded shadow">
                                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {echo $msg;}  ?> </p>
                                    <form class="mt-4" method="post" enctype="multipart/form-data" name="bwdatesreport" action="bwdates-reports-details.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">From Date</label>
                                                    <input id="fromdate" name="fromdate" value="" type="date" class="form-control" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">To Date</label>
                                                    <input id="todate" name="todate" value="" type="date" class="form-control" required>
                                                </div>
                                            </div>  
                                        </div>  
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
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