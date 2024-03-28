<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $apartment = $_POST['apartment'];
        $emailadd = $_POST['emailadd'];
        $mobilenumber = $_POST['mobilenumber'];
        $resident_name = $_POST['resident_name'];
    
    
    
        // Generate random password
        $password = generateRandomString(8); // Adjust length as needed
    
        // Encrypt password using MD5
        $encrypted_password = md5($password);
    
        // Insert resident data into tblresident table
        $query_resident = mysqli_query($con, "INSERT INTO tblresident(ResidentID, ResidentName, MobileNumber, EmailAdd) VALUES ('$apartment', '$resident_name', '$mobilenumber', '$emailadd')");
        $query_credentials = mysqli_query($con, "INSERT INTO tblresidentlogin(ResidentID, Password) VALUES ('$apartment', '$encrypted_password')");
        if ($query_resident) {
            // Insert username and encrypted password into separate table
          
    
            if ($query_credentials) {
                // Email username and password to the resident
                $to = $emailadd;
                $subject = "Your Resident Account Details";
                $message = "Hello $resident_name,\n\nYour username: $apartment\nYour password: $password\n\nPlease keep this information secure.\n\nRegards";
                $headers = "From: your_email@example.com";
    
                // Send email
                if (mail($to, $subject, $message, $headers)) {
                    echo "<script>alert('Resident has been added. Username and password have been sent to the resident's email.');</script>";
                    echo "<script>window.location.href = 'add-resident.php'</script>";
                } else {
                    echo "<script>alert('Failed to send email. Please try again.');</script>";
                    echo "<script>window.location.href = 'add-resident.php'</script>";
                }
            } else {
                // If insertion into tblcredentials fails
                echo "<script>alert('Failed to add resident credentials.');</script>";
                echo "<script>window.location.href = 'add-resident.php'</script>";
            }
        } else {
            // If insertion into tblresident fails
            echo "<script>alert('Failed to add resident. Please try again.');</script>";
            echo "<script>window.location.href = 'add-resident.php'</script>";
        }
    }
    

    
    
    // Function to generate random string
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    if (isset($_GET['resi_id'])) {
        $resi_id = intval($_GET['resi_id']);
        $sql = mysqli_query($con, "delete from tblresident where id='$resi_id'");
        echo "<script>alert('Resident deleted');</script>";
        echo "<script>window.location.href = 'add-resident.php'</script>";
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
                            <h5 class="mb-0">Add New Category</h5>
                        </div>
                        <br>
                        <div class="card border-0 p-4 rounded shadow">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Resident Name</label>
                                            <input id="visname" name="resident_name" type="text" class="form-control" placeholder="Resident Name :" required>
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
                                            <label class="form-label">Apartment No. (Wing/Flat no.)</label>
                                            <input id="apartment" name="apartment" type="text" class="form-control" placeholder="Apartment No : (A21206)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Add Visitor</button>
                                        </div>
                                    </div>



                                </div>



                            </form><!--end form-->
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive bg-white shadow rounded">
                                            <table class="table mb-0 table-center">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom p-3" style="min-width: 50px;">#</th>
                                                        <th class="border-bottom p-3" style="min-width: 200px;">Resident Name</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Apartment No. (Wing/Flat no.)</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Total Numer of Visitor</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $ret = mysqli_query($con, "select *from tblresident");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                                    $visitor1 = mysqli_query($con, "SELECT * FROM tblvisitor WHERE ResidentID = '" . $row['ResidentID'] . "'");
                                                    $num_visitors = mysqli_num_rows($visitor1);
                                                ?>
                                                    <tboDy>
                                                        <tr>
                                                            <th class="p-3"><?php echo $cnt; ?></th>
                                                            <td class="p-3"><?php echo $row['ResidentName']; ?></td>
                                                            <td class="p-3"><?php echo $row['ResidentID']; ?></td>
                                                            <td class="p-3"><?php echo $num_visitors; ?></td>
                                                            <td class="p-3"><a href="add-resident.php?resi_id=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-sm btn-soft-danger">Delete</a>
                                                            <a href="manage-resident.php?editid=<?php echo $row['ResidentID']; ?>" class="btn btn-sm btn-soft-primary">Edit</a>
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