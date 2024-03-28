<?php
$adminid=$_SESSION['rgemid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>   

<div class="top-header">
                    <div class="header-bar d-flex justify-content-between border-bottom">
                        <div class="d-flex align-items-center">
                            <a href="dashboard.php" class="logo-icon">
                                <img src="assets/images/logo-icon.png" height="30" class="small" alt="">
                                
                            </a>
                            <a id="close-sidebar" class="btn btn-icon btn-pills btn-soft-primary ms-2" href="#">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                            <div class="search-bar p-0 d-none d-lg-block ms-2">
                                <div id="search" class="menu-search mb-0">
                                    <form name="search" action="search-visitor.php" method="post" id="searchform" class="searchform ">
                                        <div>
                                            <input type="text" class="form-control border rounded-pill" ype="text" name="searchdata" id="searchdata" placeholder="Search Visitor by names &amp; mobile number...">
                                            <input type="submit" name="search" id="searchsubmit" value="Search" class="fa fa-magnifying-glass">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0">
                        
                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/user-gear.png" class="avatar avatar-ex-small rounded-circle" alt="Admin Profile" style="padding: 7px;"></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark" href="profile.html">
                                            <img src="assets/images/user-gear.png" class="avatar avatar-md-sm rounded-circle border shadow" alt="Admin Profile" style="padding: 7px;">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block mb-1"><?php echo $name; ?></span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </a>
                                    
                                        <a class="dropdown-item text-dark" href="admin-profile.php"><span class="mb-0 d-inline-block me-1"><i class="uil uil-setting align-middle h6"></i></span> Profile Settings</a>
                                        <a class="dropdown-item text-dark" href="change-password.php"><span class="mb-0 d-inline-block me-1"><i class="uil uil-lock align-middle h6"></i></span> Change Password</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>