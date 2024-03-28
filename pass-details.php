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
        <?php
        $pid = $_GET['pid'];
        $ret = mysqli_query($con, "select * from  tblvisitorpass where id='$pid'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
        ?>
          <div class="container-fluid">
            <div class="layout-specing">
              <div class="d-md-flex justify-content-between">
                <h5 class="mb-0">@<?php echo $row['passnumber']; ?> &nbsp;Pass Details</h5>
              </div>
              <div class="row" >
                <div class="col-12 mt-4" id="divToPrint">
                  <table border="1" class="table table-bordered mg-b-0" width="100%" border="1">
                    <tr>
                      <th colspan="4" style="color:blue">Personal Details</th>
                    </tr>
                    <tr>
                      <th>Pass Number</th>
                      <td colspan="3"><?php echo $row['passnumber']; ?></td>
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
                      <th colspan="4" style="color:blue">Pass Details</th>
                    </tr>
                    <tr>
                      <th>Apartment no (Wing/Flat no.)</th>
                      <td><?php echo $row['ResidentID']; ?></td>
                     
                    </tr>
                    <tr>
                      <th>From Date</th>
                      <td><?php echo $row['fromDate']; ?></td>
                      <th>To Date</th>
                      <td><?php echo $row['toDate']; ?></td>
                    </tr>
                    <tr>
                      <th>Pass Description</th>
                      <td colspan="3"><?php echo $row['passDetails']; ?></td>
                    </tr>
                    <tr>
                      <th>Pass Creation Date</th>
                      <td colspan="3"><?php echo $row['creationDate']; ?></td>
                    </tr>
                  </table>
                </div>  
                <input type="button" name="" id="" class="btn btn-soft-primary col-md-2" onclick="PrintDiv();" value="Print Pass">
              </div>  
            </div>
          </div>  
          <?php include_once('includes/footer.php'); ?>
      </main>
    </div>
    <script type="text/javascript">
      function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=500,height=500');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
      }
    </script>
  </body>
  </html>
<?php }  ?>
<?php }  ?>