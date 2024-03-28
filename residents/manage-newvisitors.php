<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
if (strlen($_SESSION['residentID'] == 0)) {
    header('location:logout.php');
} else {


    if (isset($_POST['accept'])) {
        $visitor_id = $_POST['visitor_id'];
        // Update status in the database to 'Accepted'
        mysqli_query($con, "UPDATE tblvisitor SET status = '1' WHERE ID = '$visitor_id'");
    } elseif (isset($_POST['reject'])) {
        $visitor_id = $_POST['visitor_id'];
        // Update status in the database to 'Rejected'
        mysqli_query($con, "UPDATE tblvisitor SET status = '0' WHERE ID = '$visitor_id'");
    }





?>
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
            <?php include_once('sidebar-resident.php'); ?>
            <main class="page-content bg-light">
                <?php include_once('includes/header.php'); ?>
                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="d-md-flex justify-content-between">
                            <h5 class="mb-0">Manage Visitors</h5>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive bg-white shadow rounded">
                                            <table class="table mb-0 table-center">
                                                <?php

                                                $resident_ID = $_SESSION['residentID'];
                                                $ret = mysqli_query($con, "select ResidentID from tblresidentlogin where ID='$resident_ID'");
                                                $row = mysqli_fetch_array($ret);
                                                $resident_id = $row['ResidentID'];
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                                        <th class="border-bottom p-3" style="min-width: 200px;">Visitor Name</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Category</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Address</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Mobile Number</th>


                                                        <th class="border-bottom p-3" style="min-width: 150px;">Action</th>



                                                    </tr>
                                                </thead>
                                                <?php
                                                $ret1 = mysqli_query($con, "SELECT * FROM tblvisitor WHERE status = 'NULL' AND ResidentID = '$resident_id'; ");

                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret1)) {
                                                ?>
                                                    <tbody>
                                                        <tr>

                                                            <th class="p-3"><?php echo $cnt; ?></th>
                                                            <td class="p-3"><?php echo $row['VisitorName']; ?></td>
                                                            <td class="p-3"><?php echo $row['categoryName']; ?></td>
                                                            <td class="p-3"><?php echo $row['Address']; ?></td>



                                                            <td class="p-3"><?php echo $row['MobileNumber']; ?></td>
                                                            <td class="p-3">

                                                                <form method="post" action="">
                                                                    <input type="hidden" name="visitor_id" value="<?php echo $row['ID']; ?>">
                                                                    <button type="submit" name="accept" class="btn btn-icon btn-pills btn-soft-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button type="submit" name="reject" class="btn btn-icon btn-pills btn-soft-danger">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>



                                                            </td>
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