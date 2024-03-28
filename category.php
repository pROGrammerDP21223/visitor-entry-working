<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (strlen($_SESSION['rgemid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $catname = $_POST['categoryname'];
        $query = mysqli_query($con, "insert into tblcategory(categoryName) value('$catname')");
        if ($query) {
            echo "<script>alert('Category Has been added');</script>";
            echo "<script>window.location.href = 'category.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
            echo "<script>window.location.href = 'category.php'</script>";
        }
    }
    if (isset($_GET['catid'])) {
        $catid = intval($_GET['catid']);
        $sql = mysqli_query($con, "delete from tblcategory where id='$catid'");
        echo "<script>alert('Category deleted');</script>";
        echo "<script>window.location.href = 'category.php'</script>";
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
                        <div class="subcribe-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" id="categoryname" name="categoryname" placeholder="Category Name" class="form-control" required="true" class="form-control rounded-pill shadow">
                                <button type="submit" name="submit" id="submit" class="btn btn-pills btn-primary">Add Category</button>
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
                                                        <th class="border-bottom p-3" style="min-width: 200px;">Category Name</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Date</th>
                                                        <th class="border-bottom p-3" style="min-width: 150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $ret = mysqli_query($con, "select *from tblcategory");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <th class="p-3"><?php echo $cnt; ?></th>
                                                            <td class="p-3"><?php echo $row['categoryName']; ?></td>
                                                            <td class="p-3"><?php echo $row['creationDate']; ?></td>
                                                            <td class="p-3"><a href="category.php?catid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-sm btn-soft-danger">Delete</a></td>
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