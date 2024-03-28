<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$catname=$_POST['category'];
$visname=$_POST['visname'];
$mobnumber=$_POST['mobilenumber'];
$add=$_POST['address'];
$apart=$_POST['apartment'];

$emailadd=$_POST['emailadd'];
$pdescription=$_POST['passdescription'];
$fdate=$_POST['inputdate'];
$tdate=$_POST['todate'];
$pno=mt_rand(10000000,99999999);
 $query=mysqli_query($con,"insert into tblvisitorpass(passnumber,categoryName,VisitorName,MobileNumber,Address,ResidentID,passDetails,fromDate,toDate,EmailAdd) value('$pno','$catname','$visname','$mobnumber','$add','$apart','$pdescription','$fdate','$tdate','$emailadd')");
if ($query) {
 echo "<script>alert('Pass Created successfully');</script>"; 
 echo "<script>window.location.href = 'create-pass.php'</script>";    
  }
  else
    {
 echo "<script>alert('Something Went wrong. Please Try agaian');</script>"; 
 echo "<script>window.location.href = 'visitors-form.php'</script>";    
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
                            <h5 class="mb-0">Add New Visitor</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 mt-4">
                                <div class="card border-0 p-4 rounded shadow">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                    <form class="mt-4" action="" method="post" enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Visitor Name</label>
                                                    <input id="visname" name="visname" type="text" class="form-control" placeholder="Visitor Name :" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile no.</label>
                                                    <input id="mobilenumber" name="mobilenumber" type="text" class="form-control" placeholder="Mobile no. :" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address :</label>
                                                    <input id="emailadd" name="emailadd" type="text" class="form-control" placeholder="Email Address :" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input name="address" id="address" type="text" class="form-control" placeholder="Address :" required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Apartment Number (Wing/Flat no)</label>
                                                    <input id="apartment" name="apartment" type="text" class="form-control" placeholder="Apartment No : (A21206)" required>
                                                </div>
                                            </div>  
                                              
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select name="category" class="form-select form-control">
                                                        <option value="">Select</option>
                                                        <?php
                                                        $ret = mysqli_query($con, "select * from tblcategory order by categoryName");
                                                        $cnt = 1;
                                                        while ($row = mysqli_fetch_array($ret)) {
                                                        ?>
                                                            <option><?php echo $row['categoryName']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">From Date</label>
                                                    <input id="inputdate" name="inputdate" type="date" class="form-control"  required>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">To Date</label>
                                                    <input id="todate" name="todate" type="date" class="form-control"  required>
                                                </div>
                                            </div>  
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Pass Description</label>
                                                    <input id="passdescription" name="passdescription"  type="text" class="form-control" placeholder="Pass Description :" required>
                                                </div>
                                            </div>  
                                        </div>  
                                        <button type="submit" name="submit" class="btn btn-primary">Add Visitor</button>
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