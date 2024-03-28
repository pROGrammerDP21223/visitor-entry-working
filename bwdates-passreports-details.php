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
                            <?php
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <h5>
                                        Report from <?php echo $fdate ?> to <?php echo $tdate; ?>
                                    </h5>
                                    <div class="col-12">
                                        <div class="table-responsive bg-white shadow rounded">
                                            <table class="table mb-0 table-center">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Pass Number</th>
                                                        <th class="border-bottom p-3" style="min-width: 200px;">Visitor Name</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Category</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Mobile Number</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $ret = mysqli_query($con, "select *from tblvisitorpass where date(creationDate) between '$fdate' and '$tdate'");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <th class="p-3"><?php echo $cnt; ?></th>
                                                            <td class="p-3"><?php echo $row['passnumber']; ?></td>
                                                            <td class="p-3"><?php echo $row['VisitorName']; ?></td>
                                                            <td class="p-3"><?php echo $row['categoryName']; ?></td>
                                                            <td class="p-3"><?php echo $row['MobileNumber']; ?></td>
                                                            <td class="p-3"><a href="pass-details.php?pid=<?php echo $row['ID']; ?>" title="View Full Details" target="_blank" class="btn btn-sm btn-soft-success">View Details</a></td>
                                                        </tr>
                                                    <?php
                                                    $cnt = $cnt + 1;
                                                } ?>
                                                    </tbody>
                                            </table>
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
<?php }  ?>