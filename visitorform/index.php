<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');

if (isset($_POST['submit'])) {
    $catname = $_POST['category'];
    $visname = $_POST['visname'];
    $mobnumber = $_POST['mobilenumber'];
    $add = $_POST['address'];
    $apart = $_POST['apartment'];
    $emailadd = $_POST['emailadd'];
    $whomtomeet = $_POST['whomtomeet'];
    $reasontomeet = $_POST['reasontomeet'];

    $query = mysqli_query($con, "INSERT INTO tblvisitor (categoryName, VisitorName, MobileNumber, Address, WhomtoMeet, ReasontoMeet, ResidentID, EmailAdd,status) VALUES ('$catname','$visname','$mobnumber','$add','$whomtomeet','$reasontomeet','$apart','$emailadd','NULL')");

    if ($query) {
        echo "<script>alert('Visitor Details added successfully');</script>";
        echo "<script>window.location.href = 'index.php'</script>";

        // Select resident's email address
        $query1 = mysqli_query($con, "SELECT EmailAdd FROM tblresident WHERE ResidentID = '$apart'");
        if ($query1) {
            $row = mysqli_fetch_assoc($query1);
            $resident_email = $row['EmailAdd'];

            // Send email notification to resident
            $to = $resident_email;
            $subject = "Visitor Arrival Notification";
            $message = "Dear Resident,\n\nA visitor is arriving to meet you. Details:\n\nVisitor Name: $visname\nMobile Number: $mobnumber\nAddress: $add\nWhom to Meet: $whomtomeet\nReason to Meet: $reasontomeet\n\nRegards,\nYour Building Management";
            mail($to, $subject, $message);
            echo "<script>alert('Notification email sent to resident');</script>";
        } else {
            echo "<script>alert('Error fetching resident's email');</script>";
        }
    } else {
        echo "<script>alert('Something Went wrong. Please Try again');</script>";
        echo "<script>window.location.href = 'index.php'</script>";
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
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <link href="../assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/a42f0dcdd6.js" crossorigin="anonymous"></script>
        <link href="../assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>
    <body>
    
        <section class="bg-home d-flex bg-light align-items-center" style="background: url('assets/images/bg/bg-lines-one.png') center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                        <img src="assets/images/logo-1.png" height="80" class="mx-auto d-block" alt="">
                        <h1 style="font-size: 22px; text-align:center; margin: 30px;" >
                        Resident Society Guest Registry !!!
                        </h1>
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="card login-page shadow mt-4 rounded border-0">
                            <div class="card-body">
                                <h4 class="text-center">Visitor Form</h4>  
                                <form class="mt-4" action="" method="post" enctype="multipart/form-data" class="login-form mt-4">
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
                                                    <label class="form-label">Email Address</label>
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
                                                    <label class="form-label">Apartment No. (Wing/Flat no.)</label>
                                                    <input id="apartment" name="apartment" type="text" class="form-control" placeholder="Apartment No : (A21206)" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Whom to meet</label>
                                                    <input id="whomtomeet" name="whomtomeet" type="text" class="form-control" placeholder="Whom to meet :" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Reason to meet</label>
                                                    <input name="reasontomeet" id="reasontomeet" type="text" class="form-control" placeholder="Reason to meet :" required>
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
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Visitor</button>
                                    </form>
                            </div>
                        </div>  
                    </div>   
                </div>  
            </div>   
        </section>  
    </body>
</html>
