<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $remark = $_POST['remark'];
    $query = mysqli_query($con, "update tblvisitor set remark='$remark' where  ID='$eid'");
    if ($query) {
      $msg = "Visitors Remark has been Updated.";
    } else {
      $msg = "Something Went Wrong. Please try again";
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
                            <h5 class="mb-0">Visitor Details</h5>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                              echo $msg;
                                                                            }  ?> </p>
                      <?php
                      $eid = $_GET['editid'];
                      $ret = mysqli_query($con, "select * from  tblvisitor where ID='$eid'");
                      $cnt = 1;
                      while ($row = mysqli_fetch_array($ret)) {
                      ?><table border="1" class="table table-bordered mg-b-0">
                          <tr>
                            <th colspan="4" style="color:blue">Visitor Details</th>
                          </tr>
                          <tr>
                            <th>Visitor Name</th>
                            <td><?php echo $row['VisitorName']; ?></td>
                            <th>Category</th>
                            <td><?php echo $row['categoryName']; ?></td>
                          </tr>
                          <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $row['MobileNumber']; ?></td>
                            <th>Address</th>
                            <td colspan="3"><?php echo $row['Address']; ?></td>
                          </tr>
                          <tr>
                            <th>Email Address</th>
                            <td><?php echo $row['EmailAdd']; ?></td>
                         
                          </tr>
                          <tr>
                            <th colspan="4" style="color:blue">Whom to Meet Details</th>
                          </tr>
                          <tr>
                            <th>Apartment no (Wing/Flat no)</th>
                            <td><?php echo $row['ResidentID']; ?></td>
                           
                          </tr>
                          <tr>
                            <th>Whom to Meet</th>
                            <td><?php echo $row['WhomtoMeet']; ?></td>
                            <th>Reason to Meet</th>
                            <td><?php echo $row['ReasontoMeet']; ?></td>
                          </tr>
                          <tr>
                            <th>Vistor Enter Time</th>
                            <td colspan="3"><?php echo $row['EnterDate']; ?></td>
                          </tr>
                          <?php if ($row['remark'] == "") { ?>
                            <form method="post">
                              <tr>
                                <th>Outing Remark :</th>
                                <td colspan="3">
                                  <textarea name="remark" placeholder="" rows="6" cols="14" class="form-control wd-450" required="true"></textarea>
                                </td>
                              </tr>
                              <tr align="center">
                                <td colspan="4"><button type="submit" name="submit" class="btn btn-primary btn-sm">Out</button></td>
                              </tr>
                            </form>
                          <?php } else { ?>
                            <tr>
                              <th>Outing Remark </th>
                              <td><?php echo $row['remark']; ?></td>
                              <th>Out Time</th>
                              <td><?php echo $row['outtime']; ?> </td>
                            <?php } ?>
                            </tr>
                        </table>
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
<?php }  ?>